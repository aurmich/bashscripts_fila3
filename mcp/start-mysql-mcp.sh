#!/bin/bash

# Script per avviare il server MCP MySQL personalizzato con le configurazioni dal file .env di Laravel
# Autore: Cascade AI Assistant
# Data: 2025-05-13

PROJECT_DIR="/var/www/html/_bases/base_predict_fila3_mono"
LOGS_DIR="$PROJECT_DIR/storage/logs/mcp"
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 4f97354 (.)
=======
>>>>>>> 829c80f (.)
=======
CONNECTOR_SCRIPT="$PROJECT_DIR/bashscripts/mcp/mysql-db-connector.js"
=======
<<<<<<< HEAD
>>>>>>> ec52a6b4 (.)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> e0c964a3 (first)
=======
>>>>>>> 4f97354 (.)
=======
=======
>>>>>>> e0c964a3 (first)
>>>>>>> 829c80f (.)
CONNECTOR_SCRIPT="$PROJECT_DIR/bashscripts/mcp/mysql-db-connector.js"
=======
CONNECTOR_SCRIPT="$PROJECT_DIR/scripts/mysql-db-connector.js"
>>>>>>> 59901687 (.)
=======
CONNECTOR_SCRIPT="$PROJECT_DIR/scripts/mysql-db-connector.js"
>>>>>>> f198176d (.)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 4f97354 (.)
=======
>>>>>>> 829c80f (.)
=======
CONNECTOR_SCRIPT="$PROJECT_DIR/bashscripts/mcp/mysql-db-connector.js"
>>>>>>> e9356a3a (.)
=======
CONNECTOR_SCRIPT="$PROJECT_DIR/scripts/mysql-db-connector.js"
>>>>>>> 42ab2308 (.)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> f52d0712 (.)
=======
>>>>>>> develop
>>>>>>> 71ff9e32 (.)
>>>>>>> ec52a6b4 (.)
=======
CONNECTOR_SCRIPT="$PROJECT_DIR/bashscripts/mcp/mysql-db-connector.js"
>>>>>>> ea169dcc (.)
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> e0c964a3 (first)
=======
>>>>>>> 4f97354 (.)
=======
=======
>>>>>>> e0c964a3 (first)
>>>>>>> 829c80f (.)

# Crea la directory dei log se non esiste
mkdir -p "$LOGS_DIR"
chmod -R 777 "$LOGS_DIR"

# Verifica se il connector script esiste
if [ ! -f "$CONNECTOR_SCRIPT" ]; then
    echo "❌ Script connector MySQL non trovato: $CONNECTOR_SCRIPT"
    exit 1
fi

# Verifica se il server è già in esecuzione
pid=$(ps aux | grep "mysql-db-connector.js" | grep -v grep | awk '{print $2}')
if [ -n "$pid" ]; then
    echo "⚠️ Il server MCP MySQL personalizzato è già in esecuzione con PID $pid"
    echo "   Arresto del server in corso..."
    kill -9 "$pid" 2>/dev/null
    sleep 2
fi

# Avvia il server MCP MySQL personalizzato
echo "🚀 Avvio del server MCP MySQL personalizzato..."

# Avvia il connector script
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 4f97354 (.)
=======
>>>>>>> 829c80f (.)
=======
=======
<<<<<<< HEAD
>>>>>>> ec52a6b4 (.)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> e9356a3a (.)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> f52d0712 (.)
=======
>>>>>>> develop
>>>>>>> 71ff9e32 (.)
>>>>>>> ec52a6b4 (.)
=======
>>>>>>> ea169dcc (.)
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> e0c964a3 (first)
=======
>>>>>>> 4f97354 (.)
=======
=======
>>>>>>> e0c964a3 (first)
>>>>>>> 829c80f (.)
# Imposta una dimensione di schermo standard per evitare errori
export COLUMNS=80
export LINES=24

# Avvia il connector senza utilizzare screen
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 4f97354 (.)
=======
>>>>>>> 829c80f (.)
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> ec52a6b4 (.)
>>>>>>> 59901687 (.)
=======
>>>>>>> f198176d (.)
=======
>>>>>>> e9356a3a (.)
=======
>>>>>>> 42ab2308 (.)
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> f52d0712 (.)
=======
>>>>>>> develop
>>>>>>> 71ff9e32 (.)
>>>>>>> ec52a6b4 (.)
=======
>>>>>>> ea169dcc (.)
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 829c80f (.)
=======
=======
>>>>>>> 59901687 (.)
=======
>>>>>>> f198176d (.)
>>>>>>> e0c964a3 (first)
<<<<<<< HEAD
=======
>>>>>>> 4f97354 (.)
=======
>>>>>>> 829c80f (.)
cd "$PROJECT_DIR" && node "$CONNECTOR_SCRIPT" > "$LOGS_DIR/mysql.log" 2>&1 &

# Attendi che il server si avvii
sleep 3

# Verifica se il server è stato avviato correttamente
pid=$(ps aux | grep "mysql-db-connector.js" | grep -v grep | awk '{print $2}')
if [ -n "$pid" ]; then
    echo "✅ Server MCP MySQL personalizzato avviato con PID $pid"
    echo "   Le informazioni di connessione sono state lette dal file .env di Laravel"
else
    echo "❌ Errore nell'avvio del server MCP MySQL personalizzato"
    echo "📋 Ultimi log:"
    tail -n 10 "$LOGS_DIR/mysql.log"
fi
