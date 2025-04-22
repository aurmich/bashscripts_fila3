#!/bin/bash

# 🚀 Importa le funzioni di utilità
source ./bashscripts/lib/custom.sh

# ✅ Validazione input
if [ $# -ne 3 ]; then
    echo "❌ Errore: parametri mancanti"
    echo "👉 Uso: $0 <path> <remote_repo> <branch>"
    exit 1
fi

# 📌 Configurazione
LOCAL_PATH="$1"
REMOTE_REPO="$2"
BRANCH="$3"
CURR_DIR=$(pwd)

# 🎯 Log iniziale
echo "🚀 Inizio push subtree"
echo "📁 Path locale: $LOCAL_PATH"
echo "🌐 Repository remoto: $REMOTE_REPO"
echo "🌿 Branch: $BRANCH"

# 🔄 Setup repository
cd "$LOCAL_PATH" || { echo "❌ Impossibile accedere a $LOCAL_PATH"; exit 1; }
git init || { echo "❌ Errore nell'inizializzazione git"; exit 1; }
git checkout -b "$BRANCH" || { echo "❌ Errore nella creazione del branch"; exit 1; }

# 🔗 Configurazione remoto
git remote add origin "$REMOTE_REPO" || { echo "❌ Errore nell'aggiunta del remote"; exit 1; }
git fetch --all || { echo "❌ Errore nel fetch"; exit 1; }

# 💾 Commit e push
git add -A || { echo "❌ Errore nell'add"; exit 1; }
git commit -am "🔧 Aggiornamento subtree" || { echo "'❌ Errore nel commit"; exit 1; }
git merge origin/"$BRANCH" --allow-unrelated-histories || { echo "❌ Errore nel merge"; exit 1; }
git add -A || { echo "❌ Errore nell'add post-merge"; exit 1; }
git commit -am "🔄 Merge subtree" || { echo "❌ Errore nel commit post-merge"; exit 1; }
git push -u origin "$BRANCH" || { echo "❌ Errore nel push"; exit 1; }

# 🧹 Pulizia
rm -rf .git || { echo "⚠️ Attenzione: impossibile rimuovere .git"; }
cd "$CURR_DIR" || { echo "⚠️ Attenzione: impossibile tornare alla directory originale"; }

echo "✅ Push subtree completato con successo!"