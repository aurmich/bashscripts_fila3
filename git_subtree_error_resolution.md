<<<<<<< HEAD
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
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
# Analisi e Risoluzione Errori Git Subtree

## Struttura degli Script

Il sistema è composto da tre script interconnessi:

1. `git_sync_subtree.sh` (Script principale)
2. `git_push_subtree.sh` (Gestisce le operazioni di push)
3. `git_pull_subtree.sh` (Gestisce le operazioni di pull)

## Flusso di Esecuzione

### 1. Script Principale (`git_sync_subtree.sh`)
- Riceve due parametri: `<path>` e `<remote_repo>`
- Rimuove eventuali caratteri CR (^M) dagli script di push e pull
- Imposta i permessi di esecuzione
- Chiama in sequenza:
  1. `git_push_subtree.sh`
  2. `git_pull_subtree.sh`

### 2. Push Script (`git_push_subtree.sh`)
Esegue una sequenza complessa di operazioni:
```bash
1. git add -A && git commit -am "."
2. git push -u origin $REMOTE_BRANCH
3. git subtree push -P $LOCAL_PATH $REMOTE_REPO $REMOTE_BRANCH
4. git push -f $REMOTE_REPO $(git subtree split --prefix=$LOCAL_PATH):$REMOTE_BRANCH
5. git subtree split --prefix=$LOCAL_PATH -b $TEMP_BRANCH
6. git push -f $REMOTE_REPO $TEMP_BRANCH:$REMOTE_BRANCH
7. git branch -D $TEMP_BRANCH
8. git subtree push -P $LOCAL_PATH $REMOTE_REPO $REMOTE_BRANCH
9. git rebase --rebase-merges --strategy subtree $REMOTE_BRANCH
```

### 3. Pull Script (`git_pull_subtree.sh`)
Esegue una sequenza con fallback:
```bash
1. git subtree pull -P $LOCAL_PATH $REMOTE_REPO $REMOTE_BRANCH --squash
2. Se fallisce, prova: git subtree pull -P $LOCAL_PATH $REMOTE_REPO $REMOTE_BRANCH
3. Se fallisce ancora:
   - git fetch $REMOTE_REPO $REMOTE_BRANCH --depth=1
   - git merge -s subtree FETCH_HEAD --allow-unrelated-histories
4. git rebase --rebase-merges --strategy subtree $REMOTE_BRANCH
```

## Analisi degli Errori

### 1. Errore: --prefix option mancante
```
fatal: you must provide the --prefix option
```
**Causa**: Il problema si verifica perché le variabili `current_path` e `current_url` nello script principale non sono definite, ma vengono usate nella funzione `sync_subtree`.

**Soluzione**:
Modificare la funzione `sync_subtree` in `git_sync_subtree.sh`:
```bash
sync_subtree() {
    sed -i -e 's/\r$//' "$script_dir/git_push_subtree.sh"
    sed -i -e 's/\r$//' "$script_dir/git_pull_subtree.sh"
    chmod +x "$script_dir/git_push_subtree.sh"
    chmod +x "$script_dir/git_pull_subtree.sh"
    if ! "$script_dir/git_push_subtree.sh" "$LOCAL_PATH" "$REMOTE_REPO" ; then
        log "⚠️ Push fallita per $LOCAL_PATH"
    fi
    if ! "$script_dir/git_pull_subtree.sh" "$LOCAL_PATH" "$REMOTE_REPO" ; then
        log "⚠️ Pull fallita per $LOCAL_PATH"
    fi
}
```

### 2. Errore: Push Rejected
```
! [rejected] dev -> dev (non-fast-forward)
```
**Causa**: Questo errore si verifica nella sequenza di push quando ci sono divergenze tra il repository locale e remoto.

**Soluzione**:
1. Prima del push, assicurarsi che il repository locale sia aggiornato:
```bash
git fetch origin $REMOTE_BRANCH
git merge origin/$REMOTE_BRANCH --allow-unrelated-histories
```

2. Modificare la sequenza di push per gestire meglio i conflitti:
```bash
if ! git push -u origin "$REMOTE_BRANCH"; then
    git pull --rebase origin "$REMOTE_BRANCH"
    git push -u origin "$REMOTE_BRANCH"
fi
```

## Best Practices per l'Uso

1. **Prima dell'Esecuzione**:
   - Committare o stashare modifiche pendenti
   - Assicurarsi di essere sul branch corretto
   - Verificare lo stato del repository remoto

2. **Durante l'Esecuzione**:
   - Monitorare l'output per errori specifici
   - Non interrompere gli script durante l'esecuzione

3. **Dopo l'Esecuzione**:
   - Verificare lo stato del subtree
   - Controllare la storia dei commit
   - Verificare la sincronizzazione con il remote

## Note sulla Manutenzione

1. Gli script utilizzano una strategia aggressiva con `--force` push in alcuni casi
2. Il rebase viene utilizzato per mantenere una storia pulita
3. Sono implementati meccanismi di fallback per il pull
4. La gestione degli errori potrebbe essere migliorata con più logging

## Suggerimenti per il Debugging

1. Aggiungere `set -x` all'inizio degli script per debug verbose
2. Implementare logging più dettagliato
3. Verificare i permessi degli script
=======
>>>>>>> origin/dev
# Analisi e Risoluzione Errori Git Subtree

## Struttura degli Script

Il sistema è composto da tre script interconnessi:

1. `git_sync_subtree.sh` (Script principale)
2. `git_push_subtree.sh` (Gestisce le operazioni di push)
3. `git_pull_subtree.sh` (Gestisce le operazioni di pull)

## Flusso di Esecuzione

### 1. Script Principale (`git_sync_subtree.sh`)
- Riceve due parametri: `<path>` e `<remote_repo>`
- Rimuove eventuali caratteri CR (^M) dagli script di push e pull
- Imposta i permessi di esecuzione
- Chiama in sequenza:
  1. `git_push_subtree.sh`
  2. `git_pull_subtree.sh`

### 2. Push Script (`git_push_subtree.sh`)
Esegue una sequenza complessa di operazioni:
```bash
1. git add -A && git commit -am "."
2. git push -u origin $REMOTE_BRANCH
3. git subtree push -P $LOCAL_PATH $REMOTE_REPO $REMOTE_BRANCH
4. git push -f $REMOTE_REPO $(git subtree split --prefix=$LOCAL_PATH):$REMOTE_BRANCH
5. git subtree split --prefix=$LOCAL_PATH -b $TEMP_BRANCH
6. git push -f $REMOTE_REPO $TEMP_BRANCH:$REMOTE_BRANCH
7. git branch -D $TEMP_BRANCH
8. git subtree push -P $LOCAL_PATH $REMOTE_REPO $REMOTE_BRANCH
9. git rebase --rebase-merges --strategy subtree $REMOTE_BRANCH
```

### 3. Pull Script (`git_pull_subtree.sh`)
Esegue una sequenza con fallback:
```bash
1. git subtree pull -P $LOCAL_PATH $REMOTE_REPO $REMOTE_BRANCH --squash
2. Se fallisce, prova: git subtree pull -P $LOCAL_PATH $REMOTE_REPO $REMOTE_BRANCH
3. Se fallisce ancora:
   - git fetch $REMOTE_REPO $REMOTE_BRANCH --depth=1
   - git merge -s subtree FETCH_HEAD --allow-unrelated-histories
4. git rebase --rebase-merges --strategy subtree $REMOTE_BRANCH
```

## Analisi degli Errori

### 1. Errore: --prefix option mancante
```
fatal: you must provide the --prefix option
```
**Causa**: Il problema si verifica perché le variabili `current_path` e `current_url` nello script principale non sono definite, ma vengono usate nella funzione `sync_subtree`.

**Soluzione**:
Modificare la funzione `sync_subtree` in `git_sync_subtree.sh`:
```bash
sync_subtree() {
    sed -i -e 's/\r$//' "$script_dir/git_push_subtree.sh"
    sed -i -e 's/\r$//' "$script_dir/git_pull_subtree.sh"
    chmod +x "$script_dir/git_push_subtree.sh"
    chmod +x "$script_dir/git_pull_subtree.sh"
    if ! "$script_dir/git_push_subtree.sh" "$LOCAL_PATH" "$REMOTE_REPO" ; then
        log "⚠️ Push fallita per $LOCAL_PATH"
    fi
    if ! "$script_dir/git_pull_subtree.sh" "$LOCAL_PATH" "$REMOTE_REPO" ; then
        log "⚠️ Pull fallita per $LOCAL_PATH"
    fi
}
>>>>>>> origin/dev
```

### 2. Errore: Push Rejected
```
! [rejected] dev -> dev (non-fast-forward)
```
<<<<<<< HEAD

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
=======
**Causa**: Questo errore si verifica nella sequenza di push quando ci sono divergenze tra il repository locale e remoto.

**Soluzione**:
1. Prima del push, assicurarsi che il repository locale sia aggiornato:
```bash
git fetch origin $REMOTE_BRANCH
git merge origin/$REMOTE_BRANCH --allow-unrelated-histories
```

2. Modificare la sequenza di push per gestire meglio i conflitti:
```bash
if ! git push -u origin "$REMOTE_BRANCH"; then
    git pull --rebase origin "$REMOTE_BRANCH"
    git push -u origin "$REMOTE_BRANCH"
fi
```

## Best Practices per l'Uso

1. **Prima dell'Esecuzione**:
   - Committare o stashare modifiche pendenti
   - Assicurarsi di essere sul branch corretto
   - Verificare lo stato del repository remoto

2. **Durante l'Esecuzione**:
   - Monitorare l'output per errori specifici
   - Non interrompere gli script durante l'esecuzione

3. **Dopo l'Esecuzione**:
   - Verificare lo stato del subtree
   - Controllare la storia dei commit
   - Verificare la sincronizzazione con il remote

## Note sulla Manutenzione

1. Gli script utilizzano una strategia aggressiva con `--force` push in alcuni casi
2. Il rebase viene utilizzato per mantenere una storia pulita
3. Sono implementati meccanismi di fallback per il pull
4. La gestione degli errori potrebbe essere migliorata con più logging

## Suggerimenti per il Debugging

1. Aggiungere `set -x` all'inizio degli script per debug verbose
2. Implementare logging più dettagliato
<<<<<<< HEAD
3. Verificare i permessi degli script 
=======
3. Verificare i permessi degli script
>>>>>>> origin/dev
4. Controllare la configurazione di git per il repository 
>>>>>>> origin/dev
>>>>>>> origin/dev
