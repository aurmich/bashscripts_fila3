# Progetto Futurely.net - Prediction Market

## Panoramica

Futurely.net è una piattaforma di prediction market che consente agli utenti di fare previsioni su eventi futuri e guadagnare in base all'accuratezza delle loro previsioni. Il sistema utilizza il modello matematico LMSR (Logarithmic Market Scoring Rule) per determinare i prezzi e le probabilità degli eventi.

## Architettura

Il progetto è sviluppato utilizzando Laravel con un'architettura modulare. I principali moduli includono:

- **Predict**: Il core del sistema di prediction market
- **User**: Gestione degli utenti e dell'autenticazione
- **Rating**: Sistema di valutazione e opzioni di previsione
- **Transaction**: Gestione delle transazioni e dei crediti
- **Blog**: Contenuti informativi e articoli
- **UI**: Componenti dell'interfaccia utente

## Modello Matematico

Il sistema utilizza il modello LMSR (Logarithmic Market Scoring Rule) per:

1. Calcolare la probabilità di vittoria di ciascun evento
2. Determinare il costo delle transazioni per l'acquisto o la vendita di azioni
3. Calcolare il prezzo corrente di ogni opzione

Le formule principali includono:

- **Probabilità di vittoria**: `p_i = exp(q_i/b) / ∑_j exp(q_j/b)`
- **Costo di transazione**: `C(q + Δq) - C(q)`
- **Funzione di costo**: `C(q) = b * log(∑_j exp(q_j/b))`

Dove:
- `q_i` è il numero di azioni per l'opzione i
- `b` è il parametro di liquidità
- `Δq` è la variazione nel numero di azioni

## Competitors

I principali competitor nel mercato sono:

1. **Polymarket**: Piattaforma decentralizzata basata su blockchain
2. **Metaculus**: Focalizzato su previsioni a lungo termine e scientifiche
3. **Kalshi**: Regolamentato dalla CFTC negli Stati Uniti
4. **PredictIt**: Piattaforma di previsioni politiche
5. **Manifold Markets**: Mercato di previsioni con focus sulla comunità

## Obiettivi del Progetto

1. Creare un'interfaccia utente intuitiva e accessibile
2. Implementare un sistema di market making efficiente basato su LMSR
3. Sviluppare meccanismi di ricompensa per previsori accurati
4. Garantire la scalabilità e le performance del sistema
5. Implementare funzionalità sociali e di community

## Stato Attuale

Il progetto ha implementato:

- Modello base di prediction market con LMSR
- Sistema di autenticazione e gestione utenti
- Meccanismo di transazioni e crediti
- Interfaccia utente di base con Livewire

## Roadmap di Sviluppo

Vedere il file [roadmap.md](roadmap.md) per i dettagli completi sulle fasi di sviluppo pianificate.
