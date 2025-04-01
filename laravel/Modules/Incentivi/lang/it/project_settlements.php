<?php return array (
  'navigation' => 
  array (
    'name' => 'Liquidazione Progetto',
    'plural' => 'Liquidazioni Progetti',
    'group' => 
    array (
      'name' => 'Incentivi',
      'description' => 'Gestione delle liquidazioni per progetti',
    ),
    'label' => 'liquidazioni_progetti',
    'sort' => 22,
    'icon' => 'incentivi-project-settlements',
  ),
  'fields' => 
  array (
    'progetto' => 
    array (
      'label' => 'Progetto',
      'placeholder' => 'Seleziona il progetto',
      'help' => 'Progetto di riferimento',
    ),
    'importo_totale' => 
    array (
      'label' => 'Importo Totale',
      'placeholder' => 'Inserisci l\'importo totale',
      'help' => 'Importo totale della liquidazione',
    ),
    'stato_progetto' => 
    array (
      'label' => 'Stato Progetto',
      'placeholder' => 'Seleziona lo stato',
      'help' => 'Stato attuale del progetto',
      'options' => 
      array (
        'in_corso' => 'In Corso',
        'completato' => 'Completato',
        'sospeso' => 'Sospeso',
        'annullato' => 'Annullato',
      ),
    ),
    'data_inizio' => 
    array (
      'label' => 'Data Inizio',
      'placeholder' => 'Seleziona la data di inizio',
      'help' => 'Data di inizio del progetto',
    ),
    'data_fine' => 
    array (
      'label' => 'Data Fine',
      'placeholder' => 'Seleziona la data di fine',
      'help' => 'Data di fine del progetto',
    ),
    'responsabile' => 
    array (
      'label' => 'Responsabile',
      'placeholder' => 'Seleziona il responsabile',
      'help' => 'Responsabile del progetto',
    ),
    'partecipanti' => 
    array (
      'label' => 'Partecipanti',
      'placeholder' => 'Seleziona i partecipanti',
      'help' => 'Dipendenti coinvolti nel progetto',
    ),
    'documenti' => 
    array (
      'label' => 'Documenti',
      'placeholder' => 'Carica i documenti',
      'help' => 'Documenti relativi alla liquidazione',
    ),
    'note' => 
    array (
      'label' => 'Note',
      'placeholder' => 'Inserisci eventuali note',
      'help' => 'Note aggiuntive sulla liquidazione',
    ),
    'toggleColumns' => 
    array (
      'label' => 'toggleColumns',
    ),
    'reorderRecords' => 
    array (
      'label' => 'reorderRecords',
    ),
    'resetFilters' => 
    array (
      'label' => 'resetFilters',
    ),
    'applyFilters' => 
    array (
      'label' => 'applyFilters',
    ),
    'openFilters' => 
    array (
      'label' => 'openFilters',
    ),
    'tipologia' => 
    array (
      'label' => 'tipologia',
    ),
    'denominazione' => 
    array (
      'label' => 'denominazione',
    ),
    'download' => 
    array (
      'label' => 'download',
    ),
    'created_at' => 
    array (
      'label' => 'created_at',
    ),
    'updated_at' => 
    array (
      'label' => 'updated_at',
    ),
    'project' => 
    array (
      'nome' => 
      array (
        'label' => 'project.nome',
      ),
    ),
    'nuova-liquidazione-unica' => 
    array (
      'label' => 'nuova-liquidazione-unica',
    ),
    'view' => 
    array (
      'label' => 'view',
    ),
    'edit' => 
    array (
      'label' => 'edit',
    ),
    'detach' => 
    array (
      'label' => 'detach',
    ),
    'importo' => 
    array (
      'label' => 'importo',
    ),
  ),
  'actions' => 
  array (
    'calculate' => 
    array (
      'label' => 'Calcola Liquidazione',
      'success' => 'Liquidazione calcolata con successo',
      'error' => 'Errore durante il calcolo',
    ),
    'distribute' => 
    array (
      'label' => 'Distribuisci',
      'success' => 'Importi distribuiti con successo',
      'error' => 'Errore durante la distribuzione',
    ),
    'approve' => 
    array (
      'label' => 'Approva',
      'success' => 'Liquidazione approvata con successo',
      'error' => 'Errore durante l\'approvazione',
    ),
    'reject' => 
    array (
      'label' => 'Rifiuta',
      'success' => 'Liquidazione rifiutata con successo',
      'error' => 'Errore durante il rifiuto',
    ),
    'export' => 
    array (
      'label' => 'Esporta Report',
      'success' => 'Report esportato con successo',
      'error' => 'Errore durante l\'esportazione',
    ),
  ),
  'messages' => 
  array (
    'validation' => 
    array (
      'importo_totale' => 
      array (
        'required' => 'L\'importo totale è obbligatorio',
        'numeric' => 'L\'importo deve essere numerico',
        'min' => 'L\'importo deve essere maggiore di zero',
      ),
      'progetto' => 
      array (
        'required' => 'Il progetto è obbligatorio',
        'exists' => 'Il progetto selezionato non esiste',
      ),
      'date' => 
      array (
        'required' => 'Le date sono obbligatorie',
        'date' => 'Le date devono essere valide',
        'after' => 'La data di fine deve essere successiva all\'inizio',
      ),
    ),
    'errors' => 
    array (
      'project_incomplete' => 'Progetto non completato',
      'budget_exceeded' => 'Budget del progetto superato',
      'missing_participants' => 'Nessun partecipante assegnato',
      'invalid_distribution' => 'Distribuzione importi non valida',
    ),
    'warnings' => 
    array (
      'high_amount' => 'Importo totale superiore alla media',
      'pending_tasks' => 'Attività in sospeso',
      'deadline_approaching' => 'Scadenza progetto imminente',
    ),
    'info' => 
    array (
      'distribution_ready' => 'Pronto per la distribuzione',
      'approvals_pending' => 'In attesa di approvazioni',
      'documents_required' => 'Documenti richiesti per procedere',
    ),
  ),
  'title' => 'project settlements',
);