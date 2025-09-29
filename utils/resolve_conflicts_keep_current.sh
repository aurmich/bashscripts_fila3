#!/usr/bin/env bash
set -euo pipefail

# resolve_conflicts_keep_current.sh
# Safely resolve Git merge conflicts by keeping the current (HEAD) side across all matched files.
# - Scans for conflict markers (<<<<<<< HEAD / ======= / >>>>>>> ...)
# - Backs up files before modifying
# - Supports dry-run mode to preview changes
# - Skips common heavy directories by default (vendor/, node_modules/, .git/)
# - Can restrict to Git-tracked files only
#
# Usage:
#   ./bashscripts/utils/resolve_conflicts_keep_current.sh [options]
#
# Options:
#   --root <path>          Root directory to scan (default: current directory)
#   --dry-run              Preview actions without modifying files
#   --backup-dir <path>    Directory to store backups (default: .conflict_backups_YYYYmmdd_HHMMSS)
#   --include-hidden       Include hidden files and directories in scan
#   --extensions "ext1,ext2" Limit processing to files with these extensions (comma-separated)
#   --git-only             Only consider Git-tracked files (ignores untracked/ignored files)
#   --confirm              Proceed without interactive confirmation
#   --verbose              Verbose output
#   -h|--help              Show help
#
# Exit codes:
#   0 success (or no conflicts found)
#   1 generic error
#   2 validation error (bad options)

ROOT_DIR="$(pwd)"
DRY_RUN=false
INCLUDE_HIDDEN=false
BACKUP_DIR=""
EXTENSIONS=""
GIT_ONLY=false
CONFIRM=false
VERBOSE=false

log() {
  local level="$1"; shift
  local msg="$*"
  case "$level" in
    info)    printf "[INFO] %s\n" "$msg" ;;
    warn)    printf "[WARN] %s\n" "$msg" ;;
    error)   printf "[ERROR] %s\n" "$msg" >&2 ;;
    success) printf "[OK] %s\n" "$msg" ;;
    *)       printf "[LOG] %s\n" "$msg" ;;
  esac
}

die() {
  log error "$*"
  exit 1
}

show_help() {
  sed -n '1,80p' "$0" | sed 's/^# \{0,1\}//' | sed '1,3d'
}

# Parse args
while [[ $# -gt 0 ]]; do
  case "$1" in
    --root)
      [[ $# -ge 2 ]] || die "--root requires a path"
      ROOT_DIR="$2"; shift 2 ;;
    --dry-run)
      DRY_RUN=true; shift ;;
    --backup-dir)
      [[ $# -ge 2 ]] || die "--backup-dir requires a path"
      BACKUP_DIR="$2"; shift 2 ;;
    --include-hidden)
      INCLUDE_HIDDEN=true; shift ;;
    --extensions)
      [[ $# -ge 2 ]] || die "--extensions requires a value"
      EXTENSIONS="$2"; shift 2 ;;
    --git-only)
      GIT_ONLY=true; shift ;;
    --confirm)
      CONFIRM=true; shift ;;
    --verbose)
      VERBOSE=true; shift ;;
    -h|--help)
      show_help; exit 0 ;;
    *)
      die "Unknown option: $1" ;;
  esac
done

# Validate ROOT_DIR
[[ -d "$ROOT_DIR" ]] || die "Root directory not found: $ROOT_DIR"

# Default backup dir
if [[ -z "$BACKUP_DIR" ]]; then
  BACKUP_DIR="$ROOT_DIR/.conflict_backups_$(date +%Y%m%d_%H%M%S)"
fi

if [[ "$DRY_RUN" == false ]]; then
  mkdir -p "$BACKUP_DIR"
fi

# Build file list
mapfile -t CANDIDATES < <(
  if [[ "$GIT_ONLY" == true ]]; then
    (
      cd "$ROOT_DIR" >/dev/null 2>&1 || exit 1
      # Only tracked, not deleted
      git ls-files --full-name | while read -r f; do
        printf '%s\n' "$ROOT_DIR/$f"
      done
    )
  else
    # Use find with common excludes
    # shellcheck disable=SC2016
    find "$ROOT_DIR" -type f \
      $( [[ "$INCLUDE_HIDDEN" == false ]] && printf %s "! -path '*/.*/*' ! -name '.*'" ) \
      ! -path '*/.git/*' \
      ! -path '*/vendor/*' \
      ! -path '*/node_modules/*'
  fi
)

# Optional extension filter
if [[ -n "$EXTENSIONS" ]]; then
  IFS=',' read -r -a EXTS <<< "$EXTENSIONS"
  TMP_CAND=( )
  for f in "${CANDIDATES[@]}"; do
    for e in "${EXTS[@]}"; do
      if [[ "$f" == *."$e" ]]; then
        TMP_CAND+=("$f")
        break
      fi
    done
  done
  CANDIDATES=("${TMP_CAND[@]}")
fi

# Detect files containing conflict markers (support some variants)
mapfile -t FILES_WITH_CONFLICTS < <(
  if [[ ${#CANDIDATES[@]} -gt 0 ]]; then
    printf '%s\n' "${CANDIDATES[@]}" | xargs -r -n 100 grep -IlE '^[<]{2,}\s*HEAD|^=======$|^[>]{7}\s' || true
  fi
)

if [[ ${#FILES_WITH_CONFLICTS[@]} -eq 0 ]]; then
  log success "Nessun conflitto trovato in: $ROOT_DIR"
  exit 0
fi

log info "Trovati ${#FILES_WITH_CONFLICTS[@]} file con conflitti"
if [[ "$CONFIRM" == false ]]; then
  echo "Elenco (primi 50):"
  printf ' - %s\n' "${FILES_WITH_CONFLICTS[@]:0:50}"
  read -r -p "Procedere a mantenere la versione HEAD su tutti i file? [y/N] " ans || true
  case "${ans:-}" in
    y|Y|yes|YES) : ;; 
    *) log warn "Operazione annullata"; exit 0 ;;
  esac
fi

# Function to process a single file keeping HEAD side
process_file() {
  local file="$1"
  local rel
  rel="${file#$ROOT_DIR/}"

  # Backup
  if [[ "$DRY_RUN" == false ]]; then
    local bdir
    bdir="$BACKUP_DIR/$(dirname "$rel")"
    mkdir -p "$bdir"
    cp -a "$file" "$bdir/"
  fi

  # AWK state machine:
  # - Outside conflict: print lines
  # - On <<<<<<< HEAD: enter CONFLICT state, print lines into HEAD buffer
  # - On =======: switch to OTHER side, stop collecting HEAD
  # - On >>>>>>>: end conflict, emit HEAD buffer only
  # - Nested conflicts are handled linearly; multiple conflicts per file supported
  local tmp
  tmp="$(mktemp)"
  awk '
    BEGIN {state="OUT"}
    /^<{2,}[ ]*HEAD[ ]*$/ {state="HEAD"; next}
    /^=======$/ {if (state=="HEAD") state="OTHER"; next}
    /^>{7}/ {if (state=="OTHER") state="OUT"; next}
    {
      if (state=="OUT") {
        print $0
      } else if (state=="HEAD") {
        print $0
      } else {
        # state == OTHER -> skip
      }
    }
  ' "$file" > "$tmp"

  # Ensure conflict markers removed
  if grep -qE '^[<]{2,}[ ]*HEAD|^=======$|^[>]{7}' "$tmp"; then
    log warn "Rilevati marcatori residui dopo il processamento: $file"
  fi

  if [[ "$DRY_RUN" == true ]]; then
    if [[ "$VERBOSE" == true ]]; then
      log info "[DRY-RUN] Diff per $file"
      diff -u --strip-trailing-cr "$file" "$tmp" || true
    else
      log info "[DRY-RUN] Verificato file: $file"
    fi
    rm -f "$tmp"
  else
    mv "$tmp" "$file"
    log success "Risolto mantenendo HEAD: $file"
  fi
}

# Process files
COUNT=0
for f in "${FILES_WITH_CONFLICTS[@]}"; do
  if [[ -f "$f" ]]; then
    process_file "$f"
    COUNT=$((COUNT+1))
  fi
done

if [[ "$DRY_RUN" == true ]]; then
  log success "Dry-run completato. File verificati: $COUNT"
else
  log success "Risoluzione completata. File modificati: $COUNT. Backup in: $BACKUP_DIR"
fi
