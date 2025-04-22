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

# Push con gestione errori
if ! git push -u origin "$BRANCH"; then
    git pull --rebase origin "$BRANCH"
    git push -u origin "$BRANCH"
fi
```

## ✅ Best Practices

### 1. Pre-Operazioni
- Commit o stash modifiche pendenti
- Verifica branch corrente
- Controllo stato repository remoto

### 2. Durante l'Operazione
- Monitoraggio output
- Gestione errori
- Log dettagliato

### 3. Post-Operazione
- Verifica stato repository
- Pulizia risorse temporanee
- Documentazione modifiche

## 🔍 Debug Avanzato

### 1. Analisi Stato Repository
```bash
git status
git log --oneline
git remote -v
```

### 2. Risoluzione Conflitti
```bash
# Identifica conflitti
git status

# Risolvi conflitti
git mergetool

# Completa merge
git commit -m "🔄 Risoluzione conflitti"
```

### 3. Ripristino Stato
```bash
# Annulla ultima operazione
git reset --hard HEAD~1

# Ripristina da remoto
git fetch origin
git reset --hard origin/$BRANCH
```
