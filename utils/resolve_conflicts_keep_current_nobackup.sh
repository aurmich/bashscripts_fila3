
#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(pwd)"
INCLUDE_HIDDEN=false
EXTENSIONS=""
GIT_ONLY=false
CONFIRM=false
VERBOSE=false

log(){ printf "[%s] %s
" "$1" "$2"; }

while [[ $# -gt 0 ]]; do
  case "$1" in
    --root) ROOT_DIR="$2"; shift 2;;
    --include-hidden) INCLUDE_HIDDEN=true; shift;;
    --extensions) EXTENSIONS="$2"; shift 2;;
    --git-only) GIT_ONLY=true; shift;;
    --confirm) CONFIRM=true; shift;;
    --verbose) VERBOSE=true; shift;;
    -h|--help)
      cat <<EOF
Usage: $0 [--root PATH] [--git-only] [--extensions "php,md"] [--include-hidden] [--confirm] [--verbose]
Resolves git conflict markers keeping CURRENT (HEAD) changes. NO BACKUPS are created.
EOF
      exit 0;;
    *) echo "Unknown option: $1"; exit 2;;
  esac
done

[[ -d "$ROOT_DIR" ]] || { echo "Root not found: $ROOT_DIR"; exit 2; }

mapfile -t CANDIDATES < <(
  if [[ "$GIT_ONLY" == true ]]; then
    (cd "$ROOT_DIR" && git ls-files --full-name | sed "s|^|$ROOT_DIR/|")
  else
    find "$ROOT_DIR" -type f       $( [[ "$INCLUDE_HIDDEN" == false ]] && printf %s "! -path '*/.*/*' ! -name '.*'" )       ! -path '*/.git/*' ! -path '*/vendor/*' ! -path '*/node_modules/*'
  fi
)

if [[ -n "$EXTENSIONS" ]]; then
  IFS=',' read -r -a EXTS <<< "$EXTENSIONS"
  TMP=( )
  for f in "${CANDIDATES[@]}"; do
    for e in "${EXTS[@]}"; do
      [[ "$f" == *."$e" ]] && { TMP+=("$f"); break; }
    done
  done
  CANDIDATES=("${TMP[@]}")
fi

mapfile -t FILES < <(printf '%s
' "${CANDIDATES[@]}" | xargs -r -n 100 grep -IlE '^[<]{2,}[ ]*HEAD|^=======$|^[>]{7}[ ]' || true)

if [[ ${#FILES[@]} -eq 0 ]]; then
  log OK "Nessun conflitto in $ROOT_DIR"; exit 0
fi

log INFO "Trovati ${#FILES[@]} file con conflitti (no-backup)"
if [[ "$CONFIRM" == false ]]; then
  printf ' - %s
' "${FILES[@]:0:50}"
  read -r -p "Procedere a mantenere HEAD su tutti i file? [y/N] " ans || true
  case "${ans:-}" in y|Y|yes|YES) :;; *) echo "Annullato"; exit 0;; esac
fi

process(){
  local file="$1"; local tmp
  tmp=$(mktemp)
  awk '
    BEGIN {state="OUT"}
    /^<{2,}[ ]*HEAD[ ]*$/ {state="HEAD"; next}
    /^=======$/ {if (state=="HEAD") state="OTHER"; next}
    /^>{7}/ {if (state=="OTHER") state="OUT"; next}
    { if (state=="OUT" || state=="HEAD") print $0 }
  ' "$file" > "$tmp"
  if grep -qE '^[<]{2,}[ ]*HEAD|^=======$|^[>]{7}' "$tmp"; then
    log WARN "Marcatori residui in $file"
  fi
  mv "$tmp" "$file"
  log OK "Risolto (HEAD): $file"
}

COUNT=0
for f in "${FILES[@]}"; do
  [[ -f "$f" ]] && { process "$f"; COUNT=$((COUNT+1)); }
done
log OK "Completato. File modificati: $COUNT (senza backup)"
