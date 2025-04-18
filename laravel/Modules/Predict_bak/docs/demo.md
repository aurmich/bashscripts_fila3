# Funzioni utilizzate per la demo dell'andamento di un prediction market con due titoli

### 1. Funzione che calcola la probabilità di ciascun evento

```php
function probabilities($outstanding, $liq) {
    $result = array(0.0, 0.0);
    $denom = 0.0;

    // Calcola il denominatore
    for ($i = 0; $i < 2; ++$i) {
        $denom += exp($outstanding[$i] / $liq);
    }

    // Calcola le probabilità
    for ($i = 0; $i < 2; ++$i) {
        $result[$i] = exp($outstanding[$i] / $liq) / $denom;
    }

    return $result;
}
```

### 2. Funzione ausiliaria di *costOfTrans* per calcolare il costo di transazione per l'acquisto o la vendita di un titolo

```php
function cost($outstanding, $liq) {
    $sum = 0.0;

    // Calcola la somma esponenziale
    for ($i = 0; $i < 2; ++$i) {
        $sum += exp($outstanding[$i] / $liq);
    }

    return $liq * log($sum);
}
```

### 3. Funzione per calcolare il costo di una transazione (acquisto o vendita di azioni/contratti di un titolo)

```php
function costOfTrans($outstanding, $idx, $nShares, $liq) {
    $after = $outstanding;

    // Aggiorna il vettore "after"
    $after[$idx] += $nShares;
  
    return cost($after, $liq) - cost($outstanding, $liq);
}
```

### 4. Funzione per calcolare il prezzo di una singola azione/contratto di un titolo specifico. Serve per calcolare la probabilità di vittoria di ogni singolo evento in ogni momento

```php
// outstanding == somma totale crediti scommessi di tutti gli utenti di un'opzione
// liq == parametro di liquidità (b) impostato all'inizio

function costForOneShare($outstanding, $liq) {

    // results ha tanti elementi a 0.0 quante sono le opzioni
    $result = array(0.0, 0.0);

    // Calcola il costo per un'azione per entrambi gli indici
    $result[0] = costOfTrans($outstanding, 0, 1, $liq);
    $result[1] = costOfTrans($outstanding, 1, 1, $liq);
	...    =    ...
    $result[n] = costOfTrans($outstanding, n, 1, $liq);

    return $result;
}
```

### 5. Funzione per calcolare il numero di azioni acquistabili di una opzione specifica dando l'importo che si intende scommettere (param $amount)

```php
// idx == indice dell'opzione su cui l'utente vuole scommettere
// amout == somma che si vuole scommettere in quel momento
// liq == parametro di liquidità (b) impostato all'inizio

function sharesForAmount($outstanding, $idx, $amount, $liq) {
    $shares = 0;

    // Ciclo fino a quando il costo supera l'importo
    while (true) {
        $cost = costOfTrans($outstanding, $idx, $shares + 1, $liq);
        if ($cost > $amount) break;
        $shares++;
    }
  
    return $shares;
}
```

### 6. [Deprecated] Funzione per calcolare l'importo da scommettere per acquistare esattamente un determinato numero di azioni/contratti di un titolo (param $nShares)

```php
function amountForShares($outstanding, $idx, $nShares, $liq) {
    return cost($outstanding, $liq) - costOfTrans($outstanding, $idx, -$nShares, $liq);
}
```

# Risultato dell'esecuzione della demo

### L'inserimento di eventi di acquisto e vendita sono casuali e non sono stati riportati per evitare di rendere la lettura troppo verbosa

#### Demo di un'indagine con prediction market a tema sportivo. L'obbiettivo è predirre la squadra vincitrice utilizzando l'opinione degli utenti.

- La liquidità iniziale viene impostata a 1000,0 crediti
- Imposto il parametro di liquidità b ($liq) = 100,0
- Il numero iniziale di azioni possedute per le due squadre è:
  0 - 0
- Probabilità iniziali di vittoria (**Funzione 1.**):
  0,5000 - 0,5000
- I prezzi attuali per un'azione dei due titoli sono (**Funzione 4.**):
  $0,5012 - $0,5012

---

- Giocatore 1: vuole investire $50.0 in azioni di Boston
- Giocatore 1 può comprare 83 azioni (**Funzione 5.**) di Boston per $50.0
- Aggiornamento: GIOCATORE 1 compra 83 azioni di Boston
- Il costo dell'acquisto per l'investitore è: $49,87
- I nuovi valori di azioni possedute per le due squadre sono:
  83 - 0 (azioni totali acquistate)
- Nuove probabilità implicite calcolate (**Funzione 1.**):
  0,6964 - 0,3036
- Ora il prezzo corrente di un'azione per ciascun titolo (**Funzione 4**.)è:
  $0,6974 - $0,3047

---

- Giocatore 2 vuole investire $60.0 in azioni di Dallas
- Giocatore 2 può comprare 131 azioni di Dallas per $60.0
- Aggiornamento: GIOCATORE 2 compra 131 azioni di Dallas
- Il costo dell'acquisto per l'investitore è: $59,98
- I nuovi valori di azioni possedute per le due squadre sono:83 - 131 (azioni totali acquistate)
- Nuove probabilità implicite calcolate (**Funzione 1.**):
  0,3823 - 0,6177
- Ora il prezzo corrente di un'azione per ciascun titolo (**Funzione 4.**) è:
  $0,3834 - $0,6189

---

- Giocatore 2 vuole incestire $120.0 in azioni di Boston
- Giocatore 3 può comprare 195 azioni di Boston per $120.0
- Aggiornamento: GIOCATORE 3 compra 195 azioni di Boston
- Il costo dell'acquisto per l'investitore è: $119,53
- I nuovi valori di azioni possedute per le due squadre sono:
  195 - 131
- Nuove probabilità implicite calcolate:
  0,6548 - 0,3452
- Ora il prezzo corrente di un'azione per ciascun titolo è:
  $0,6559 - $0,3464

---

- Giocatore 1 vuole vendere 50 azioni che possiede di Boston
- Giocatore 1 può vendere 50 azioni di Boston per $-29,79 (**Funzione 5.**)
- (il credito è negativo in quanto spesa del creatore dell'indagine che deve dare quei crediti al Giocatore 1)
- Aggiornamento: GIOCATORE 1 vende 50 azioni di Boston
- Somma ricevuta dalla transazione: $-29,79
- Il nuovo numero di azioni possedute per i due titoli ora è:
  145 - 131
- Nuove probabilità implicite calcolate:
  0,5349 - 0,4651
- I prezzi attuali per un'azione di ciascun titolo sono:
  $0,5362 - $0,4663

---

- Aggiornamento: Mercato chiuso, Vittoria di Boston.

Una volta chiuso il mercato, verranno erogati a tutti i possessori di azioni Boston 1$ per azione posseduta

Fine della demo di un prediction market dicotomico
