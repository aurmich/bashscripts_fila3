---
# 📝 Documentazione Script Git

> **Revisione manuale:** File rivisto per eliminare duplicazioni, conflitti e marker. Strutturato per massima chiarezza, con esempi pratici e riferimenti architetturali.

> **Backlink:** [README globale](./README.md) · [scripts_conflict_resolution.md](./scripts_conflict_resolution.md)

---

## Obiettivo
Fornire una panoramica aggiornata e priva di conflitti sugli script bash per la gestione avanzata di Git e subtree nel progetto.

## Script principali

### `git_config_setup`
Funzione centralizzata (in `custom.sh`) per impostare:
- `core.ignorecase`, `core.fileMode`, `core.autocrlf`, `core.eol`, `core.symlinks`, `core.longpaths`

### `git_pull_subtrees.sh`
- Pull multiplo dei subtree
- Backup opzionale
- Gestione `gitmodules.ini` e organizzazioni custom

### `git_pull_subtree.sh`
- Pull di un singolo subtree
- Gestione errori e logging avanzato
- Supporto branch personalizzati

### `git_push_subtrees.sh`
- Push verso remoti multipli
- Logging e gestione errori

## Best Practice
- Usare sempre `git_config_setup`
- Eseguire backup prima di operazioni critiche
- Validare i log e aggiornare `gitmodules.ini`

## Risoluzione conflitti
- In caso di merge, usare script di backup e seguire la strategia documentata in [scripts_conflict_resolution.md](./scripts_conflict_resolution.md)

## Collegamenti
- [README globale](./README.md)
- [scripts_conflict_resolution.md](./scripts_conflict_resolution.md)
- [git_subtree_conflicts.md](./git_subtree_conflicts.md)

---

> Ogni modifica agli script va testata manualmente e tracciata nella documentazione.- `core.autocrlf`: false (no conversione automatica line endings)
<<<<<<< HEAD
<<<<<<< HEAD
=======
# Script Git per la Gestione dei Subtree
=======
>>>>>>> e9356a3a (.)
=======
>>>>>>> 42ab2308 (.)
- `core.eol`: lf (line ending di default)
- `core.symlinks`: false (no symlinks per Windows)
- `core.longpaths`: true (supporto path lunghi Windows)

### git_pull_subtrees.sh
Script principale per il pull dei subtree. Funzionalità:
1. Configurazione git tramite `git_config_setup`
2. Backup opzionale su disco esterno
3. Gestione dei subtree definiti in gitmodules.ini
4. Supporto per organizzazioni GitHub personalizzate

### git_pull_subtree.sh
Script per il pull di un singolo subtree. Caratteristiche:
1. Gestione errori robusta
2. Logging delle operazioni
3. Supporto per branch personalizzati

### git_push_subtrees.sh
Script per il push dei subtree. Funzionalità:
1. Push verso repository remoti
2. Supporto per organizzazioni multiple
3. Gestione errori e logging

## Best Practices
1. Utilizzare sempre `git_config_setup` per la configurazione
2. Gestire i backup prima delle operazioni critiche
3. Verificare i log per eventuali errori
4. Mantenere aggiornato gitmodules.ini

## Risoluzione Problemi Comuni
1. Conflitti di merge: utilizzare gli script di backup prima di risolvere
2. Errori di path: verificare la configurazione Windows
3. Problemi di permessi: controllare fileMode e symlinks

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> f198176d (.)
# Script Git
=======
=======
>>>>>>> 42ab2308 (.)
=======
# Script Git

Questi script sono utilizzati per automatizzare le operazioni Git nel progetto.

## Panoramica
Questa documentazione descrive gli script bash utilizzati per la gestione dei subtree git nel progetto Laraxot.

## Script Principali

### git_config_setup
Funzione centralizzata per la configurazione git, definita in `custom.sh`. Gestisce le seguenti impostazioni:
- `core.ignorecase`: false (case-sensitive)
- `core.fileMode`: false (ignora permessi)
- `core.autocrlf`: false (no conversione automatica line endings)
- `core.eol`: lf (line ending di default)
- `core.symlinks`: false (no symlinks per Windows)
- `core.longpaths`: true (supporto path lunghi Windows)

### git_pull_subtrees.sh
Script principale per il pull dei subtree. Funzionalità:
1. Configurazione git tramite `git_config_setup`
2. Backup opzionale su disco esterno
3. Gestione dei subtree definiti in gitmodules.ini
4. Supporto per organizzazioni GitHub personalizzate

### git_pull_subtree.sh
Script per il pull di un singolo subtree. Caratteristiche:
1. Gestione errori robusta
2. Logging delle operazioni
3. Supporto per branch personalizzati

### git_push_subtrees.sh
Script per il push dei subtree. Funzionalità:
1. Push verso repository remoti
2. Supporto per organizzazioni multiple
3. Gestione errori e logging

## Best Practices
1. Utilizzare sempre `git_config_setup` per la configurazione
2. Gestire i backup prima delle operazioni critiche
3. Verificare i log per eventuali errori
4. Mantenere aggiornato gitmodules.ini

## Risoluzione Problemi Comuni
1. Conflitti di merge: utilizzare gli script di backup prima di risolvere
2. Errori di path: verificare la configurazione Windows
3. Problemi di permessi: controllare fileMode e symlinks

=======
>>>>>>> 3c18aa7e (.)
# Script Git
<<<<<<< HEAD
>>>>>>> f1e7ef1046 (.)
>>>>>>> e9356a3a (.)
=======
>>>>>>> 42ab2308 (.)

Questi script sono utilizzati per automatizzare le operazioni Git nel progetto.

## Panoramica
Questa documentazione descrive gli script bash utilizzati per la gestione dei subtree git nel progetto Laraxot.

## Script Principali

### git_config_setup
Funzione centralizzata per la configurazione git, definita in `custom.sh`. Gestisce le seguenti impostazioni:
- `core.ignorecase`: false (case-sensitive)
- `core.fileMode`: false (ignora permessi)
- `core.autocrlf`: false (no conversione automatica line endings)
- `core.eol`: lf (line ending di default)
- `core.symlinks`: false (no symlinks per Windows)
- `core.longpaths`: true (supporto path lunghi Windows)

### git_pull_subtrees.sh
Script principale per il pull dei subtree. Funzionalità:
1. Configurazione git tramite `git_config_setup`
2. Backup opzionale su disco esterno
3. Gestione dei subtree definiti in gitmodules.ini
4. Supporto per organizzazioni GitHub personalizzate

### git_pull_subtree.sh
Script per il pull di un singolo subtree. Caratteristiche:
1. Gestione errori robusta
2. Logging delle operazioni
3. Supporto per branch personalizzati

### git_push_subtrees.sh
Script per il push dei subtree. Funzionalità:
1. Push verso repository remoti
2. Supporto per organizzazioni multiple
3. Gestione errori e logging

## Best Practices
1. Utilizzare sempre `git_config_setup` per la configurazione
2. Gestire i backup prima delle operazioni critiche
3. Verificare i log per eventuali errori
4. Mantenere aggiornato gitmodules.ini

## Risoluzione Problemi Comuni
1. Conflitti di merge: utilizzare gli script di backup prima di risolvere
2. Errori di path: verificare la configurazione Windows
3. Problemi di permessi: controllare fileMode e symlinks

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 3c18aa7e (.)
# Script Git

Questi script sono utilizzati per automatizzare le operazioni Git nel progetto.

## Panoramica
Questa documentazione descrive gli script bash utilizzati per la gestione dei subtree git nel progetto Laraxot.

## Script Principali

### git_config_setup
Funzione centralizzata per la configurazione git, definita in `custom.sh`. Gestisce le seguenti impostazioni:
- `core.ignorecase`: false (case-sensitive)
- `core.fileMode`: false (ignora permessi)
- `core.autocrlf`: false (no conversione automatica line endings)
- `core.eol`: lf (line ending di default)
- `core.symlinks`: false (no symlinks per Windows)
- `core.longpaths`: true (supporto path lunghi Windows)

### git_pull_subtrees.sh
Script principale per il pull dei subtree. Funzionalità:
1. Configurazione git tramite `git_config_setup`
2. Backup opzionale su disco esterno
3. Gestione dei subtree definiti in gitmodules.ini
4. Supporto per organizzazioni GitHub personalizzate

### git_pull_subtree.sh
Script per il pull di un singolo subtree. Caratteristiche:
1. Gestione errori robusta
2. Logging delle operazioni
3. Supporto per branch personalizzati

### git_push_subtrees.sh
Script per il push dei subtree. Funzionalità:
1. Push verso repository remoti
2. Supporto per organizzazioni multiple
3. Gestione errori e logging

## Best Practices
1. Utilizzare sempre `git_config_setup` per la configurazione
2. Gestire i backup prima delle operazioni critiche
3. Verificare i log per eventuali errori
4. Mantenere aggiornato gitmodules.ini

## Risoluzione Problemi Comuni
1. Conflitti di merge: utilizzare gli script di backup prima di risolvere
2. Errori di path: verificare la configurazione Windows
3. Problemi di permessi: controllare fileMode e symlinks

<<<<<<< HEAD
=======
>>>>>>> f000df5 (.)
>>>>>>> 3c18aa7e (.)
=======
>>>>>>> 1831d11e78 (.)
=======
>>>>>>> 3a6821ae8 (aggiornamento cartella bashscripts)
=======
=======
>>>>>>> f000df5 (.)
>>>>>>> 3c18aa7e (.)
>>>>>>> f71d08e230 (.)
>>>>>>> e9356a3a (.)
=======
<<<<<<< HEAD
=======
>>>>>>> f000df5 (.)
>>>>>>> 3c18aa7e (.)
>>>>>>> 42ab2308 (.)
# Script Git

Questi script sono utilizzati per automatizzare le operazioni Git nel progetto.

## Panoramica
Questa documentazione descrive gli script bash utilizzati per la gestione dei subtree git nel progetto Laraxot.

## Script Principali

### git_config_setup
Funzione centralizzata per la configurazione git, definita in `custom.sh`. Gestisce le seguenti impostazioni:
- `core.ignorecase`: false (case-sensitive)
- `core.fileMode`: false (ignora permessi)
- `core.autocrlf`: false (no conversione automatica line endings)
- `core.eol`: lf (line ending di default)
- `core.symlinks`: false (no symlinks per Windows)
- `core.longpaths`: true (supporto path lunghi Windows)

### git_pull_subtrees.sh
Script principale per il pull dei subtree. Funzionalità:
1. Configurazione git tramite `git_config_setup`
2. Backup opzionale su disco esterno
3. Gestione dei subtree definiti in gitmodules.ini
4. Supporto per organizzazioni GitHub personalizzate

### git_pull_subtree.sh
Script per il pull di un singolo subtree. Caratteristiche:
1. Gestione errori robusta
2. Logging delle operazioni
3. Supporto per branch personalizzati

### git_push_subtrees.sh
Script per il push dei subtree. Funzionalità:
1. Push verso repository remoti
2. Supporto per organizzazioni multiple
3. Gestione errori e logging

## Best Practices
1. Utilizzare sempre `git_config_setup` per la configurazione
2. Gestire i backup prima delle operazioni critiche
3. Verificare i log per eventuali errori
4. Mantenere aggiornato gitmodules.ini

## Risoluzione Problemi Comuni
1. Conflitti di merge: utilizzare gli script di backup prima di risolvere
2. Errori di path: verificare la configurazione Windows
3. Problemi di permessi: controllare fileMode e symlinks
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

<<<<<<< HEAD
>>>>>>> 59901687 (.)
=======
>>>>>>> f198176d (.)
=======
=======
>>>>>>> 59901687 (.)
>>>>>>> 85c5198c (.)
=======
>>>>>>> 9de04485 (.)
=======
>>>>>>> 59901687 (.)
>>>>>>> 85c5198c (.)
=======
>>>>>>> 59901687 (.)
=======
>>>>>>> f198176d (.)
>>>>>>> d20d0523 (.)
>>>>>>> e9356a3a (.)
=======

>>>>>>> 42ab2308 (.)
# Script Git

Questi script sono utilizzati per automatizzare le operazioni Git nel progetto.

## Panoramica
Questa documentazione descrive gli script bash utilizzati per la gestione dei subtree git nel progetto Laraxot.

## Script Principali

### git_config_setup
Funzione centralizzata per la configurazione git, definita in `custom.sh`. Gestisce le seguenti impostazioni:
- `core.ignorecase`: false (case-sensitive)
- `core.fileMode`: false (ignora permessi)
- `core.autocrlf`: false (no conversione automatica line endings)
- `core.eol`: lf (line ending di default)
- `core.symlinks`: false (no symlinks per Windows)
- `core.longpaths`: true (supporto path lunghi Windows)

### git_pull_subtrees.sh
Script principale per il pull dei subtree. Funzionalità:
1. Configurazione git tramite `git_config_setup`
2. Backup opzionale su disco esterno
3. Gestione dei subtree definiti in gitmodules.ini
4. Supporto per organizzazioni GitHub personalizzate

### git_pull_subtree.sh
Script per il pull di un singolo subtree. Caratteristiche:
1. Gestione errori robusta
2. Logging delle operazioni
3. Supporto per branch personalizzati

### git_push_subtrees.sh
Script per il push dei subtree. Funzionalità:
1. Push verso repository remoti
2. Supporto per organizzazioni multiple
3. Gestione errori e logging

## Best Practices
1. Utilizzare sempre `git_config_setup` per la configurazione
2. Gestire i backup prima delle operazioni critiche
3. Verificare i log per eventuali errori
4. Mantenere aggiornato gitmodules.ini

## Risoluzione Problemi Comuni
1. Conflitti di merge: utilizzare gli script di backup prima di risolvere
2. Errori di path: verificare la configurazione Windows
3. Problemi di permessi: controllare fileMode e symlinks

# Script Git

Questi script sono utilizzati per automatizzare le operazioni Git nel progetto.

## Panoramica
Questa documentazione descrive gli script bash utilizzati per la gestione dei subtree git nel progetto Laraxot.

## Script Principali

### git_config_setup
Funzione centralizzata per la configurazione git, definita in `custom.sh`. Gestisce le seguenti impostazioni:
- `core.ignorecase`: false (case-sensitive)
- `core.fileMode`: false (ignora permessi)
- `core.autocrlf`: false (no conversione automatica line endings)
- `core.eol`: lf (line ending di default)
- `core.symlinks`: false (no symlinks per Windows)
- `core.longpaths`: true (supporto path lunghi Windows)

### git_pull_subtrees.sh
Script principale per il pull dei subtree. Funzionalità:
1. Configurazione git tramite `git_config_setup`
2. Backup opzionale su disco esterno
3. Gestione dei subtree definiti in gitmodules.ini
4. Supporto per organizzazioni GitHub personalizzate

### git_pull_subtree.sh
Script per il pull di un singolo subtree. Caratteristiche:
1. Gestione errori robusta
2. Logging delle operazioni
3. Supporto per branch personalizzati

### git_push_subtrees.sh
Script per il push dei subtree. Funzionalità:
1. Push verso repository remoti
2. Supporto per organizzazioni multiple
3. Gestione errori e logging

## Best Practices
1. Utilizzare sempre `git_config_setup` per la configurazione
2. Gestire i backup prima delle operazioni critiche
3. Verificare i log per eventuali errori
4. Mantenere aggiornato gitmodules.ini

## Risoluzione Problemi Comuni
1. Conflitti di merge: utilizzare gli script di backup prima di risolvere
2. Errori di path: verificare la configurazione Windows
3. Problemi di permessi: controllare fileMode e symlinks
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> f198176d (.)
=======
=======
=======
>>>>>>> 9de04485 (.)
=======
=======
>>>>>>> 85c5198c (.)
=======
=======
=======
>>>>>>> f198176d (.)
>>>>>>> d20d0523 (.)
>>>>>>> e9356a3a (.)
=======
>>>>>>> 42ab2308 (.)

# Script Git

Questi script sono utilizzati per automatizzare le operazioni Git nel progetto.

## Panoramica
Questa documentazione descrive gli script bash utilizzati per la gestione dei subtree git nel progetto Laraxot.

## Script Principali

### git_config_setup
Funzione centralizzata per la configurazione git, definita in `custom.sh`. Gestisce le seguenti impostazioni:
- `core.ignorecase`: false (case-sensitive)
- `core.fileMode`: false (ignora permessi)
- `core.autocrlf`: false (no conversione automatica line endings)
- `core.eol`: lf (line ending di default)
- `core.symlinks`: false (no symlinks per Windows)
- `core.longpaths`: true (supporto path lunghi Windows)

### git_pull_subtrees.sh
Script principale per il pull dei subtree. Funzionalità:
1. Configurazione git tramite `git_config_setup`
2. Backup opzionale su disco esterno
3. Gestione dei subtree definiti in gitmodules.ini
4. Supporto per organizzazioni GitHub personalizzate

### git_pull_subtree.sh
Script per il pull di un singolo subtree. Caratteristiche:
1. Gestione errori robusta
2. Logging delle operazioni
3. Supporto per branch personalizzati

### git_push_subtrees.sh
Script per il push dei subtree. Funzionalità:
1. Push verso repository remoti
2. Supporto per organizzazioni multiple
3. Gestione errori e logging

## Best Practices
1. Utilizzare sempre `git_config_setup` per la configurazione
2. Gestire i backup prima delle operazioni critiche
3. Verificare i log per eventuali errori
4. Mantenere aggiornato gitmodules.ini

## Risoluzione Problemi Comuni
1. Conflitti di merge: utilizzare gli script di backup prima di risolvere
2. Errori di path: verificare la configurazione Windows
3. Problemi di permessi: controllare fileMode e symlinks

[Torna alla documentazione principale](/docs/maintenance.md#git-management) 
[Torna alla documentazione principale](/docs/maintenance.md#git-management) 
[Torna alla documentazione principale](/docs/maintenance.md#git-management) 
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

[Torna alla documentazione principale](/docs/maintenance.md#git-management) 
3. Problemi di permessi: controllare fileMode e symlinks
>>>>>>> a013e8e (.)
=======

=======
=======
>>>>>>> 42ab2308 (.)
=======

[Torna alla documentazione principale](/docs/maintenance.md#git-management) 
3. Problemi di permessi: controllare fileMode e symlinks
>>>>>>> a013e8e (.)
=======

=======
<<<<<<< HEAD
>>>>>>> 0c55086029 (.)
=======
>>>>>>> f000df5 (.)
>>>>>>> f1e7ef1046 (.)
# Script Git

Questi script sono utilizzati per automatizzare le operazioni Git nel progetto.

## Panoramica
Questa documentazione descrive gli script bash utilizzati per la gestione dei subtree git nel progetto Laraxot.

## Script Principali

### git_config_setup
Funzione centralizzata per la configurazione git, definita in `custom.sh`. Gestisce le seguenti impostazioni:
- `core.ignorecase`: false (case-sensitive)
- `core.fileMode`: false (ignora permessi)
- `core.autocrlf`: false (no conversione automatica line endings)
- `core.eol`: lf (line ending di default)
- `core.symlinks`: false (no symlinks per Windows)
- `core.longpaths`: true (supporto path lunghi Windows)

### git_pull_subtrees.sh
Script principale per il pull dei subtree. Funzionalità:
1. Configurazione git tramite `git_config_setup`
2. Backup opzionale su disco esterno
3. Gestione dei subtree definiti in gitmodules.ini
4. Supporto per organizzazioni GitHub personalizzate

### git_pull_subtree.sh
Script per il pull di un singolo subtree. Caratteristiche:
1. Gestione errori robusta
2. Logging delle operazioni
3. Supporto per branch personalizzati

### git_push_subtrees.sh
Script per il push dei subtree. Funzionalità:
1. Push verso repository remoti
2. Supporto per organizzazioni multiple
3. Gestione errori e logging

## Best Practices
1. Utilizzare sempre `git_config_setup` per la configurazione
2. Gestire i backup prima delle operazioni critiche
3. Verificare i log per eventuali errori
4. Mantenere aggiornato gitmodules.ini

## Risoluzione Problemi Comuni
1. Conflitti di merge: utilizzare gli script di backup prima di risolvere
2. Errori di path: verificare la configurazione Windows
3. Problemi di permessi: controllare fileMode e symlinks

=======
=======
>>>>>>> d83fe8da (.)
[Torna alla documentazione principale](/docs/maintenance.md#git-management) 
>>>>>>> 1831d11e78 (.)
=======
[Torna alla documentazione principale](/docs/maintenance.md#git-management) 
>>>>>>> 0c55086029 (.)
=======
[Torna alla documentazione principale](../../docs/maintenance.md#git-management) 
>>>>>>> 04d882f8f6 (.)
=======
=======
>>>>>>> e9356a3a (.)
=======
>>>>>>> 42ab2308 (.)
>>>>>>> 4d4d6cb7 (.)
=======
>>>>>>> d83fe8da (.)
[Torna alla documentazione principale](/docs/maintenance.md#git-management) 
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 3c18aa7e (.)
>>>>>>> 9c02579 (.)
<<<<<<< HEAD
>>>>>>> 59901687 (.)
=======
>>>>>>> f198176d (.)
=======
=======
>>>>>>> 3c18aa7e (.)
>>>>>>> 9c02579 (.)
=======
>>>>>>> 59901687 (.)
>>>>>>> 85c5198c (.)
=======
>>>>>>> 9de04485 (.)
=======
>>>>>>> 59901687 (.)
>>>>>>> 85c5198c (.)
=======
>>>>>>> 59901687 (.)
=======
>>>>>>> f198176d (.)
>>>>>>> d20d0523 (.)
>>>>>>> f71d08e230 (.)
>>>>>>> e9356a3a (.)
=======
>>>>>>> 3c18aa7e (.)
>>>>>>> 9c02579 (.)
>>>>>>> 42ab2308 (.)
