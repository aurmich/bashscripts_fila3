<<<<<<< HEAD
# Documentazione degli Script Bash

Questo file contiene la documentazione di tutti gli script bash del progetto SaluteOra, organizzati per categoria.

## Indice
- [Script PHPStan](#script-phpstan)
- [Script Git](#script-git)
- [Script Subtrees](#script-subtrees)
- [Script Submodules](#script-submodules)
- [Script Utilità](#script-utils)
- [Script Composer](#script-composer)
- [Script Aggiornamento Docs](#script-docs-update)
- [Script Tools](#script-tools)

## Script PHPStan

Gli script relativi all'analisi statica del codice con PHPStan si trovano nella directory `bashscripts/phpstan/`.

### run_phpstan.sh
Script per eseguire PHPStan sull'intero progetto.

### run_phpstan_modules.sh
Script per eseguire PHPStan su moduli specifici.

### phpstan_analyze.sh
Script per analizzare il codice con PHPStan e salvare i risultati.

### phpstan_analyze_modules.sh
Script per analizzare tutti i moduli con PHPStan dal livello 1 al 10.

### phpstan_docs_generator.sh
Script per generare documentazione PHPStan per tutti i moduli.

### phpstan_docs_generator_single.sh
Script per generare documentazione PHPStan per un singolo modulo.

### analyse_module.sh
Script per analizzare un singolo modulo con PHPStan.

### analyze_all_modules.sh
Script per analizzare tutti i moduli con PHPStan.

### analyze_module.sh
Script per analizzare un modulo specifico con PHPStan.

### analyze_modules.sh
Script per analizzare più moduli in sequenza.

### analyze_phpstan.sh
Script per eseguire analisi PHPStan avanzata.

### check_before_phpstan.sh
Script per verificare la struttura delle directory prima di eseguire PHPStan.

### create_phpstan_readme.sh
Script per creare file README.md nella cartella docs/phpstan di ogni modulo.

### generate_phpstan_summary.sh
Script per generare un report riassuntivo dell'analisi PHPStan per tutti i moduli.

## Script Git

Gli script relativi alla gestione di Git si trovano nella directory `bashscripts/git/`.

### git_up.sh
Script per aggiornare il repository git e eseguire operazioni di manutenzione.

### git_rebase.sh
Script per eseguire rebase di branch git.

### git_rebase_noai.sh
Script di rebase senza assistenza AI.

### git_remote_add_org.sh
Script per aggiungere remote org al repository.

### git_sync_org.sh
Script per sincronizzare il repository con l'origine org.

### git_up_noai.sh
Script per aggiornare il repository senza assistenza AI.

### git_up_oco.sh
Script di aggiornamento ottimizzato per repository OCO.

### git_up_quick.sh
Script di aggiornamento rapido per repository.

### git_up_quick_noai.sh
Script di aggiornamento rapido senza assistenza AI.

### rebase_keep_last_commits.sh
Script per eseguire rebase mantenendo gli ultimi commit.

### resolve_git_conflict.sh
Script per risolvere conflitti git specifici.

### resolve_git_conflicts.sh
Script per risolvere tutti i conflitti git in modo automatico.

### resolve_head_conflicts.sh
Script per risolvere conflitti git di tipo HEAD.

### git_change_full_org.sh
Script per cambiare completamente l'organizzazione git.

### git_change_org.sh
Script per cambiare l'organizzazione git.

### git_delete_history_recursive.sh
Script per eliminare la storia git in modo ricorsivo.

### git_delete_old_branches.sh
Script per eliminare branch git obsoleti.

### git_init.sh
Script per inizializzare un repository git.

### git_prune.sh
Script per eseguire prune di oggetti git non utilizzati.

### git_pull_org.sh
Script per eseguire pull dall'origine org.

### git_push_org.sh
Script per eseguire push verso l'origine org.

## Script Subtrees

Gli script relativi alla gestione dei subtrees si trovano nella directory `bashscripts/subtrees/`.

### git_add_subtrees.sh
Script per aggiungere subtree al repository.

### git_push_subtree.sh
Script per eseguire il push di un singolo subtree.

### git_push_subtrees.sh
Script per eseguire il push di tutti i subtree.

### git_pull_subtree.sh
Script per eseguire il pull di un singolo subtree.

### git_pull_subtrees.sh
Script per eseguire il pull di tutti i subtree.

### git_sync_subtree.sh
Script per sincronizzare un singolo subtree (pull + push).

### git_sync_subtrees.sh
Script per sincronizzare tutti i subtree (pull + push).

### init-subtrees.sh
Script per inizializzare i subtree da un file di configurazione.

### reset_subtrees.sh
Script per resettare i subtree.

## Script Submodules

Gli script relativi alla gestione dei submodules si trovano nella directory `bashscripts/submodules/`.

### sync_submodules.sh
Script per sincronizzare i submodules.

### parse_gitmodules_ini.sh
Script per analizzare il file .gitmodules e estrarre informazioni sui submodules.

## Script Utils

Gli script di utilità generica si trovano nella directory `bashscripts/utils/`.

### fix_directory_structure.sh
Script per correggere la struttura delle directory.

### fix_errors.sh
Script per correggere errori comuni.

### fix_structure.sh
Script per correggere problemi di struttura del progetto.

### sync_to_disk.sh
Script per sincronizzare i file su disco.

### test_parse.sh
Script per testare il parsing di file.

### backup.sh
Script per eseguire backup del progetto.

### check_mysql.sh
Script per verificare la connessione MySQL.

### check_mysql_win.sh
Script per verificare la connessione MySQL su Windows.

## Script Composer

Gli script relativi a Composer si trovano nella directory `bashscripts/composer/`.

### composer_init.sh
Script per inizializzare Composer in un nuovo progetto.

### get_composer.sh
Script per scaricare e installare Composer.

## Script Docs Update

Gli script per l'aggiornamento della documentazione si trovano nella directory `bashscripts/docs_update/`.

### update_docs.sh
Script per aggiornare la documentazione generale.

### update_module_roadmaps_links.sh
Script per aggiornare i link nelle roadmap dei moduli.

### update_roadmap_phpstan_links.sh
Script per aggiornare i link della roadmap di PHPStan.

## Script Tools

Gli script di utilità avanzata e tools si trovano nella directory `bashscripts/tools/`.

### copy_to_mono.sh
Script per copiare file nel repository monolitico.

### generate_phpstan_docs.php
Script PHP per generare documentazione PHPStan.

### check_form_schema.php
Script PHP per verificare gli schemi dei form.

## Note

Gli script sono stati organizzati in categorie per facilitare la manutenzione e la comprensione. Tutti i file di documentazione relativi agli script si trovano nella directory `bashscripts/docs/`.
=======
# 🚀 Script Bash: La Tua Guida Definitiva

## 📋 Indice
- [Introduzione](#-introduzione)
- [Script di Sviluppo](#-script-di-sviluppo)
- [Script di Deployment](#-script-di-deployment)
- [Script di Manutenzione](#-script-di-manutenzione)
- [Script di Sicurezza](#-script-di-sicurezza)
- [Script di Monitoraggio](#-script-di-monitoraggio)

## 🌟 Introduzione

Benvenuto nella documentazione degli script bash! Questa guida ti accompagnerà attraverso tutti gli script presenti nel progetto, spiegando nel dettaglio cosa fanno e come utilizzarli al meglio.

## 🛠 Script di Sviluppo

### 🔄 `sync_to_disk.sh`
**Cosa fa:** Sincronizza il tuo progetto su un disco esterno in modo sicuro e organizzato.
**Perché ti serve:** Perfetto per backup rapidi o per lavorare su più macchine.
**Come usarlo:** `./sync_to_disk.sh /percorso/disco`

### 🔄 `git_sync_subtrees.sh`
**Cosa fa:** Sincronizza tutti i submodule Git del progetto in un colpo solo.
**Perché ti serve:** Risparmia ore di lavoro manuale nella gestione dei submodule.
**Come usarlo:** `./git_sync_subtrees.sh`

### 🔄 `fix_conflicts.sh`
**Cosa fa:** Risolve automaticamente i conflitti Git più comuni.
**Perché ti serve:** Elimina lo stress dei conflitti di merge.
**Come usarlo:** `./fix_conflicts.sh`

## 🚀 Script di Deployment

### 🔄 `deploy.sh`
**Cosa fa:** Deploy automatico del progetto con rollback integrato.
**Perché ti serve:** Deployment sicuro e senza sorprese.
**Come usarlo:** `./deploy.sh ambiente`

### 🔄 `setup_server.sh`
**Cosa fa:** Configura un nuovo server da zero in pochi minuti.
**Perché ti serve:** Risparmia giorni di configurazione manuale.
**Come usarlo:** `./setup_server.sh`

## 🔧 Script di Manutenzione

### 🔄 `cleanup.sh`
**Cosa fa:** Pulisce il progetto da file temporanei e cache.
**Perché ti serve:** Mantiene il progetto pulito e performante.
**Come usarlo:** `./cleanup.sh`

### 🔄 `update_deps.sh`
**Cosa fa:** Aggiorna tutte le dipendenze in modo sicuro.
**Perché ti serve:** Mantieni il progetto sempre aggiornato.
**Come usarlo:** `./update_deps.sh`

## 🔒 Script di Sicurezza

### 🔄 `check_security.sh`
**Cosa fa:** Scansiona il progetto per vulnerabilità note.
**Perché ti serve:** Dormi sonni tranquilli sapendo che il tuo codice è sicuro.
**Come usarlo:** `./check_security.sh`

### 🔄 `backup.sh`
**Cosa fa:** Crea backup crittografati del progetto.
**Perché ti serve:** Proteggi il tuo lavoro da qualsiasi imprevisto.
**Come usarlo:** `./backup.sh`

## 📊 Script di Monitoraggio

### 🔄 `monitor.sh`
**Cosa fa:** Monitora le performance del progetto in tempo reale.
**Perché ti serve:** Identifica i colli di bottiglia prima che diventino problemi.
**Come usarlo:** `./monitor.sh`

### 🔄 `logs.sh`
**Cosa fa:** Analizza i log del progetto in modo intelligente.
**Perché ti serve:** Trova e risolvi i problemi in pochi secondi.
**Come usarlo:** `./logs.sh`

## 🔗 Collegamenti Utili

- [README.md](../README.md) - Panoramica generale del progetto
- [Documentazione Tailwind](../docs/TAILWIND_CONFIG.md) - Configurazione CSS
- [Best Practices](../docs/BEST_PRACTICES.md) - Linee guida per lo sviluppo

## 📝 Note per gli Sviluppatori

- Tutti gli script sono testati su Ubuntu 20.04 LTS
- Assicurati di avere i permessi di esecuzione (`chmod +x script.sh`)
- Leggi sempre la documentazione prima di eseguire uno script
- Fai backup prima di eseguire script di modifica
>>>>>>> d2064db (.)
