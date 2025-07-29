<<<<<<< HEAD
#!/bin/bash

# 📋 Controlla se il nome del branch è stato passato come parametro
if [ -z "$1" ]; then
    echo "⚠️ Errore: specificare il nome del branch!"
    echo "👉 Uso: $0 <nome-del-branch>"
    exit 1
fi

BRANCH_NAME=$1
COMMITS_TO_KEEP=5

# ✅ Assicurati di essere sulla branch corretta
echo "🔍 Controllo che tu sia sulla branch '$BRANCH_NAME'..."
git checkout "$BRANCH_NAME" || { echo "⚠️ Errore nel checkout del branch"; exit 1; }

# 📦 Inizializza il rebase interattivo
echo "📝 Iniziamo il rebase interattivo per mantenere gli ultimi $COMMITS_TO_KEEP commit..."
git rebase -i HEAD~$COMMITS_TO_KEEP || { echo "⚠️ Errore durante il rebase!"; exit 1; }

# 💬 Istruzioni per l'utente
echo "📝 Dopo aver modificato i commit, salva e chiudi l'editor per completare il rebase."

# ✅ Controlla se ci sono conflitti
echo "🔍 Verifica conflitti..."
git status

# 💥 Forza il push al repository remoto (se necessario)
read -p "Vuoi forzare il push delle modifiche al repository remoto? (y/n): " force_push
if [[ "$force_push" == "y" ]]; then
    echo "🚀 Spingiamo i cambiamenti al repository remoto (forzato)..."
    git push --force origin "$BRANCH_NAME" || { echo "⚠️ Errore durante il push forzato!"; exit 1; }
    echo "✅ Push completato con successo!"
else
    echo "📂 Non è stato fatto il push forzato. Devi farlo manualmente se necessario."
fi

echo "✅ Il processo è completato!"
=======
#!/bin/bash

# 📋 Controlla se il nome del branch è stato passato come parametro
if [ -z "$1" ]; then
    echo "⚠️ Errore: specificare il nome del branch!"
    echo "👉 Uso: $0 <nome-del-branch>"
    exit 1
fi

BRANCH_NAME=$1
COMMITS_TO_KEEP=5

# ✅ Assicurati di essere sulla branch corretta
echo "🔍 Controllo che tu sia sulla branch '$BRANCH_NAME'..."
git checkout "$BRANCH_NAME" || { echo "⚠️ Errore nel checkout del branch"; exit 1; }

# 📦 Inizializza il rebase interattivo
echo "📝 Iniziamo il rebase interattivo per mantenere gli ultimi $COMMITS_TO_KEEP commit..."
git rebase -i HEAD~$COMMITS_TO_KEEP || { echo "⚠️ Errore durante il rebase!"; exit 1; }

# 💬 Istruzioni per l'utente
echo "📝 Dopo aver modificato i commit, salva e chiudi l'editor per completare il rebase."

# ✅ Controlla se ci sono conflitti
echo "🔍 Verifica conflitti..."
git status

# 💥 Forza il push al repository remoto (se necessario)
read -p "Vuoi forzare il push delle modifiche al repository remoto? (y/n): " force_push
if [[ "$force_push" == "y" ]]; then
    echo "🚀 Spingiamo i cambiamenti al repository remoto (forzato)..."
    git push --force origin "$BRANCH_NAME" || { echo "⚠️ Errore durante il push forzato!"; exit 1; }
    echo "✅ Push completato con successo!"
else
    echo "📂 Non è stato fatto il push forzato. Devi farlo manualmente se necessario."
fi

echo "✅ Il processo è completato!"
>>>>>>> c142b7c (.)
