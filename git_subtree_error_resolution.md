# 🚀 Gestione Errori Git Subtree

## 📋 Struttura del Sistema

Il sistema di gestione dei subtree è composto da tre componenti principali:

1. `git_sync_subtree.sh` - Script principale di sincronizzazione
2. `git_push_subtree.sh` - Gestore delle operazioni di push
3. `git_pull_subtree.sh` - Gestore delle operazioni di pull

## 🔄 Flusso Operativo

### 1. Script Principale (`git_sync_subtree.sh`)
- **Input**: `<path>` e `<remote_repo>`
- **Preparazione**:
  - Normalizzazione CRLF
  - Impostazione permessi
- **Sequenza**:
  1. Push subtree
  2. Pull subtree

### 2. Push Script (`git_push_subtree.sh`)
```bash
# 1. Inizializzazione
git init
git checkout -b "$BRANCH"

# 2. Configurazione remoto
git remote add origin "$REMOTE_REPO"
git fetch --all

# 3. Commit e push
git add -A
git commit -am "🔧 Aggiornamento subtree"
git merge origin/"$BRANCH" --allow-unrelated-histories
git push -u origin "$BRANCH"
```

### 3. Pull Script (`git_pull_subtree.sh`)
```bash
# 1. Pull standard
git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$BRANCH" --squash

# 2. Fallback 1
git subtree pull -P "$LOCAL_PATH" "$REMOTE_REPO" "$BRANCH"

# 3. Fallback 2
git fetch "$REMOTE_REPO" "$BRANCH" --depth=1
git merge -s subtree FETCH_HEAD --allow-unrelated-histories
```

## 🚨 Analisi Errori Comuni

### 1. Errore: Prefix Mancante
```
fatal: you must provide the --prefix option
```

**Causa**: Variabili `LOCAL_PATH` o `REMOTE_REPO` non definite

**Soluzione**:
```bash
# Verifica variabili
if [ -z "$LOCAL_PATH" ] || [ -z "$REMOTE_REPO" ]; then
    echo "❌ Error: Missing required variables"
    exit 1
fi
```

### 2. Errore: Push Rejected
```
! [rejected] dev -> dev (non-fast-forward)
```

**Causa**: Divergenze tra repository locale e remoto

**Soluzione**:
```bash
# Aggiorna repository locale
git fetch origin "$BRANCH"
git merge origin/"$BRANCH" --allow-unrelated-histories

# Riprova push
if ! git push -u origin "$BRANCH"; then
    git pull --rebase origin "$BRANCH"
    git push -u origin "$BRANCH"
fi
```

## 🛠️ Best Practices

### 1. Prima dell'Esecuzione
- ✔️ Commit/stash delle modifiche pendenti
- ✔️ Verifica branch corrente
- ✔️ Controllo stato repository

### 2. Durante l'Esecuzione
- 👀 Monitora l'output
- ⏳ Non interrompere gli script
- 📝 Controlla i log

### 3. Dopo l'Esecuzione
- 🔍 Verifica stato subtree
- 📊 Controlla storia commit
- 🔄 Verifica sincronizzazione

## 📝 Note sulla Manutenzione

1. **Strategia Push**:
   - Utilizzo di `--force` push in casi specifici
   - Rebase per storia pulita
   - Meccanismi di fallback per pull

2. **Gestione Errori**:
   - Logging dettagliato
   - Verifica permessi
   - Controlli pre-esecuzione

## 🔍 Suggerimenti per il Debugging

1. **Debug Verbose**:
   ```bash
   set -x  # Attiva debug verbose
   ```

2. **Logging Dettagliato**:
   ```bash
   log() {
       echo "[$(date +'%Y-%m-%d %H:%M:%S')] $1"
   }
   ```

3. **Verifica Permessi**:
   ```bash
   chmod +x *.sh
   ```

## 📚 Documentazione Aggiuntiva

- [Git Subtree Documentation](https://git-scm.com/book/en/v2/Git-Tools-Advanced-Merging)
- [Git Subtree Tutorial](https://www.atlassian.com/git/tutorials/git-subtree)
- [Git Subtree vs Submodule](https://git-scm.com/book/en/v2/Git-Tools-Submodules)

---

<div align="center">
  <sub>Built with ❤️ by the development team</sub>
</div>
