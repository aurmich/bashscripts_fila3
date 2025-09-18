<<<<<<< HEAD
<?php return array (
  'table' => 
  array (
    'heading' => 'Attività',
  ),
  'fields' => 
  array (
    'nome' => 
    array (
      'label' => 'Nome',
    ),
    'tipo' => 
    array (
      'label' => 'Tipo',
    ),
    'appartiene_a_liquidazione_a_fasi' => 
    array (
      'label' => 'Appartiene a liquidazione a fasi?',
    ),
    'liquidazione_fasi' => 
    array (
      'label' => 'Fasi di liquidazione',
    ),
    'quota_percentuale' => 
    array (
      'label' => 'Quota percentuale',
    ),
    'importo' => 
    array (
      'label' => 'Importo',
    ),
    'anno_competenza' => 
    array (
      'label' => 'Anno competenza',
    ),
    'project_id' => 
    array (
      'label' => 'ID Progetto',
    ),
    'employees' => 
    array (
      'cognome' => 
      array (
        'label' => 'Dipendenti',
      ),
    ),
    'project' => 
    array (
      'nome' => 
      array (
        'label' => 'Nome Progetto',
      ),
    ),
    'phase_id' => 
    array (
      'label' => 'phase_id',
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
  ),
  'navigation' => 
  array (
    'label' => 'Attività',
    'group' => 'Incentivi',
    'icon' => 'incentivi-activity',
    'sort' => 4,
  ),
);
=======
<?php

return [
    'navigation' => [
        'name' => 'Attività',
        'plural' => 'Attività',
        'group' => [
            'name' => 'Monitoraggio',
            'description' => 'Monitoraggio delle attività di sistema',
        ],
        'label' => 'Attività',
        'sort' => 60,
        'icon' => 'activity-activity-animated',
    ],
    'fields' => [
        'user' => [
            'label' => 'Utente',
            'name' => 'Nome',
            'email' => 'Email',
            'role' => 'Ruolo',
        ],
        'action' => [
            'label' => 'Azione',
            'created' => 'Creato',
            'updated' => 'Modificato',
            'deleted' => 'Eliminato',
            'viewed' => 'Visualizzato',
            'downloaded' => 'Scaricato',
            'uploaded' => 'Caricato',
            'logged_in' => 'Accesso',
            'logged_out' => 'Uscita',
        ],
        'subject' => [
            'label' => 'Oggetto',
            'type' => 'Tipo',
            'id' => 'ID',
            'name' => 'Nome',
        ],
        'description' => 'Descrizione',
        'ip_address' => 'Indirizzo IP',
        'user_agent' => 'User Agent',
        'created_at' => 'Data',
        'properties' => [
            'label' => 'Proprietà',
            'old' => 'Vecchio Valore',
            'new' => 'Nuovo Valore',
        ],
    ],
    'filters' => [
        'user' => 'Utente',
        'action' => 'Azione',
        'subject_type' => 'Tipo Oggetto',
        'date_range' => 'Intervallo Date',
        'ip_address' => 'Indirizzo IP',
    ],
    'actions' => [
        'view_details' => 'Visualizza Dettagli',
        'export' => 'Esporta',
        'clear_old' => 'Pulisci Vecchie',
    ],
    'messages' => [
        'no_activities' => 'Nessuna attività trovata',
        'cleared' => 'Attività vecchie eliminate con successo',
        'exported' => 'Attività esportate con successo',
    ],
    'export' => [
        'formats' => [
            'csv' => 'CSV',
            'excel' => 'Excel',
            'pdf' => 'PDF',
        ],
        'columns' => [
            'date' => 'Data',
            'user' => 'Utente',
            'action' => 'Azione',
            'subject' => 'Oggetto',
            'ip' => 'IP',
        ],
    ],
];
>>>>>>> 793bd7f9 (Squashed 'laravel/Modules/Activity/' content from commit 40cd7abb1)
