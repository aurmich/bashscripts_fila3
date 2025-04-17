# Dettaglio dei Moduli Principali

## Xot (Core Module)

### Scopo
Modulo fondamentale che fornisce funzionalità di base e utility per tutti gli altri moduli.

### Funzionalità Chiave
- Gestione configurazioni
- Helpers e Traits comuni
- Gestione middleware
- Service provider base

## Blog

### Scopo
Gestione di contenuti e articoli, base per il modulo Predict.

### Caratteristiche
- Sistema di articoli
- Categorizzazione
- Tag e metadati
- Gestione autori
- Versionamento contenuti

### Estensioni
- Esteso da Predict per funzionalità di previsione
- Integrazione con Rating per valutazioni
- Sistema commenti integrato

## Predict

### Scopo
Estensione del modulo Blog per gestione previsioni e scommesse.

### Caratteristiche
- Previsioni basate su articoli
- Sistema di scommesse
- Calcolo quote e probabilità
- Rating e statistiche
- Event Sourcing

### Integrazioni
- Blog per contenuti base
- Rating per valutazioni
- Chart per visualizzazioni
- Notify per notifiche

## Rating

### Scopo
Sistema di valutazione e feedback.

### Caratteristiche
- Valutazioni numeriche
- Recensioni testuali
- Calcolo medie
- Punteggi ponderati
- Anti-gaming

### Integrazioni
- Blog per recensioni
- Predict per valutazioni previsioni
- Activity per logging

## User

### Scopo
Gestione utenti e autorizzazioni.

### Caratteristiche
- Autenticazione
- Ruoli e permessi
- Profili utente
- Social login
- GDPR compliance

### Integrazioni
- Tenant per multi-tenancy
- Activity per logging
- Notify per notifiche

## UI

### Scopo
Componenti interfaccia e temi base.

### Caratteristiche
- Componenti riutilizzabili
- Layout responsivi
- Temi personalizzabili
- Helpers frontend

### Integrazioni
- Theme per personalizzazione
- Lang per internazionalizzazione

## Media

### Scopo
Gestione file e media.

### Caratteristiche
- Upload file
- Ottimizzazione immagini
- Conversione formati
- Storage configurabile
- CDN integration

### Integrazioni
- Blog per media articoli
- UI per preview
- Theme per asset

## Notify

### Scopo
Sistema di notifiche multi-canale.

### Caratteristiche
- Email
- Push notifications
- SMS
- Webhook
- Code asincrone

### Integrazioni
- User per destinatari
- Job per processing
- Activity per logging 