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
