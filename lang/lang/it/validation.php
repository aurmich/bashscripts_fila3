<?php

declare(strict_types=1);

return [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    'accepted' => ':attribute deve essere accettato.',
    'active_url' => ':attribute non è un URL valido.',
    'after' => ':attribute deve essere una data successiva a :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => ':attribute può contenere solo lettere.',
    'alpha_dash' => ':attribute può contenere solo lettere, numeri e trattini.',
    'alpha_num' => ':attribute può contenere solo lettere e numeri.',
    'array' => ':attribute deve essere un array.',
    'before' => ':attribute deve essere una data precedente al :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => ':attribute deve avere un valore tra :min e :max.',
        'file' => ':attribute deve essere tra :min e :max kilobytes.',
        'string' => ':attribute deve avere tra :min e :max caratteri.',
        'array' => ':attribute deve contenere tra :min e :max elementi.',
    ],
    'boolean' => ':attribute può essere solo vero o falso.',
    'confirmed' => 'La conferma di :attribute non corrisponde.',
    'date' => ':attribute non è una data valida.',
    'date_format' => ':attribute non corrisponde al formato :format.',
    'different' => ':attribute e :other devono essere diversi.',
    'digits' => ':attribute deve avere :digits cifre.',
    'digits_between' => ':attribute deve avere tra :min e :max cifre.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => ':attribute deve essere un indirizzo email valido.',
    'exists' => 'La selezione per :attribute non è valida.',
    'file' => 'The :attribute must be a file.',
    'filled' => ':attribute è obbligatorio.',
    'image' => ":attribute deve essere un'immagine.",
    'in' => 'La selezione per :attribute non è valida.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => ':attribute deve essere un numero intero.',
    'ip' => ':attribute deve essere un indirizzo IP valido.',
    'json' => ':attribute deve essere una stringa JSON valida.',
    'max' => [
        'numeric' => ':attribute non può essere più grande di :max.',
        'file' => ':attribute non può superare i :max kilobytes.',
        'string' => ':attribute non può superare i :max caratteri.',
        'array' => ':attribute non può avere più di :max elementi.',
    ],
    'mimes' => ':attribute deve essere un file di questo formato: :values.',
    'min' => [
        'numeric' => ':attribute deve essere almeno :min.',
        'file' => ':attribute deve essere di almeno :min kilobytes.',
        'string' => ':attribute deve contenere almeno :min caratteri.',
        'array' => ':attribute deve avere almeno :min elementi.',
    ],
    'not_in' => 'Il valore selezionato per :attribute non è valido.',
    'numeric' => ':attribute deve essere un numero.',
=======
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
    /*
    |--------------------------------------------------------------------------
    | Messaggi di validazione
    |--------------------------------------------------------------------------
    |
    | Le seguenti righe contengono i messaggi di errore predefiniti utilizzati
    | dalla classe di validazione. Alcune di queste regole hanno più versioni,
    | come le regole di dimensione. Sentiti libero di modificare ciascuno di
    | questi messaggi.
    |
    */

    'accepted' => 'Il campo :attribute deve essere accettato.',
    'active_url' => 'Il campo :attribute non è un URL valido.',
    'after' => 'Il campo :attribute deve essere una data successiva a :date.',
    'after_or_equal' => 'Il campo :attribute deve essere una data successiva o uguale a :date.',
    'alpha' => 'Il campo :attribute può contenere solo lettere.',
    'alpha_dash' => 'Il campo :attribute può contenere solo lettere, numeri, trattini e trattini bassi.',
    'alpha_num' => 'Il campo :attribute può contenere solo lettere e numeri.',
    'array' => 'Il campo :attribute deve essere un array.',
    'before' => 'Il campo :attribute deve essere una data precedente a :date.',
    'before_or_equal' => 'Il campo :attribute deve essere una data precedente o uguale a :date.',
    'between' => [
        'numeric' => 'Il campo :attribute deve essere compreso tra :min e :max.',
        'file' => 'Il campo :attribute deve essere compreso tra :min e :max kilobyte.',
        'string' => 'Il campo :attribute deve essere compreso tra :min e :max caratteri.',
        'array' => 'Il campo :attribute deve avere tra :min e :max elementi.',
    ],
    'boolean' => 'Il campo :attribute deve essere vero o falso.',
    'confirmed' => 'La conferma del campo :attribute non corrisponde.',
    'date' => 'Il campo :attribute non è una data valida.',
    'date_equals' => 'Il campo :attribute deve essere una data uguale a :date.',
    'date_format' => 'Il campo :attribute non corrisponde al formato :format.',
    'different' => 'I campi :attribute e :other devono essere diversi.',
    'digits' => 'Il campo :attribute deve essere di :digits cifre.',
    'digits_between' => 'Il campo :attribute deve essere compreso tra :min e :max cifre.',
    'dimensions' => 'Il campo :attribute ha dimensioni dell\'immagine non valide.',
    'distinct' => 'Il campo :attribute ha un valore duplicato.',
    'email' => 'Il campo :attribute deve essere un indirizzo email valido.',
    'ends_with' => 'Il campo :attribute deve terminare con uno dei seguenti valori: :values.',
    'exists' => 'Il valore selezionato per :attribute non è valido.',
    'file' => 'Il campo :attribute deve essere un file.',
    'filled' => 'Il campo :attribute deve avere un valore.',
    'gt' => [
        'numeric' => 'Il campo :attribute deve essere maggiore di :value.',
        'file' => 'Il campo :attribute deve essere maggiore di :value kilobyte.',
        'string' => 'Il campo :attribute deve essere maggiore di :value caratteri.',
        'array' => 'Il campo :attribute deve avere più di :value elementi.',
    ],
    'gte' => [
        'numeric' => 'Il campo :attribute deve essere maggiore o uguale a :value.',
        'file' => 'Il campo :attribute deve essere maggiore o uguale a :value kilobyte.',
        'string' => 'Il campo :attribute deve essere maggiore o uguale a :value caratteri.',
        'array' => 'Il campo :attribute deve avere :value elementi o più.',
    ],
    'image' => 'Il campo :attribute deve essere un\'immagine.',
    'in' => 'Il valore selezionato per :attribute non è valido.',
    'in_array' => 'Il campo :attribute non esiste in :other.',
    'integer' => 'Il campo :attribute deve essere un numero intero.',
    'ip' => 'Il campo :attribute deve essere un indirizzo IP valido.',
    'ipv4' => 'Il campo :attribute deve essere un indirizzo IPv4 valido.',
    'ipv6' => 'Il campo :attribute deve essere un indirizzo IPv6 valido.',
    'json' => 'Il campo :attribute deve essere una stringa JSON valida.',
    'lt' => [
        'numeric' => 'Il campo :attribute deve essere minore di :value.',
        'file' => 'Il campo :attribute deve essere minore di :value kilobyte.',
        'string' => 'Il campo :attribute deve essere minore di :value caratteri.',
        'array' => 'Il campo :attribute deve avere meno di :value elementi.',
    ],
    'lte' => [
        'numeric' => 'Il campo :attribute deve essere minore o uguale a :value.',
        'file' => 'Il campo :attribute deve essere minore o uguale a :value kilobyte.',
        'string' => 'Il campo :attribute deve essere minore o uguale a :value caratteri.',
        'array' => 'Il campo :attribute non deve avere più di :value elementi.',
    ],
    'max' => [
        'numeric' => 'Il campo :attribute non può essere maggiore di :max.',
        'file' => 'Il campo :attribute non può essere maggiore di :max kilobyte.',
        'string' => 'Il campo :attribute non può essere maggiore di :max caratteri.',
        'array' => 'Il campo :attribute non può avere più di :max elementi.',
    ],
    'mimes' => 'Il campo :attribute deve essere un file di tipo: :values.',
    'mimetypes' => 'Il campo :attribute deve essere un file di tipo: :values.',
    'min' => [
        'numeric' => 'Il campo :attribute deve essere almeno :min.',
        'file' => 'Il campo :attribute deve essere almeno di :min kilobyte.',
        'string' => 'Il campo :attribute deve contenere almeno :min caratteri.',
        'array' => 'Il campo :attribute deve avere almeno :min elementi.',
    ],
    'multiple_of' => 'Il campo :attribute deve essere un multiplo di :value.',
    'not_in' => 'Il valore selezionato per :attribute non è valido.',
    'not_regex' => 'Il formato del campo :attribute non è valido.',
    'numeric' => 'Il campo :attribute deve essere un numero.',
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 0d55b583 (first)
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
    'password' => [
        'letters' => 'Il campo :attribute deve contenere almeno una lettera.',
        'mixed' => 'Il campo :attribute deve contenere almeno una lettera maiuscola e una minuscola.',
        'numbers' => 'Il campo :attribute deve contenere almeno un numero.',
        'symbols' => 'Il campo :attribute deve contenere almeno un simbolo.',
        'uncompromised' => 'Il :attribute fornito è apparso in una violazione di dati. Scegli un :attribute diverso, per favore.',
    ],
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    'present' => 'The :attribute field must be present.',
    'regex' => 'Il formato di :attribute non è valido.',
    'required' => ':attribute è richiesto.',
    'required_if' => ':attribute è richiesto quando :other è :value.',
    'required_unless' => ':attribute è richiesto se :other non è tra :values.',
    'required_with' => ':attribute è richiesto quando :values è presente.',
    'required_with_all' => ':attribute è richiesto quando :values è presente.',
    'required_without' => ':attribute è richiesto quando :values non è presente.',
    'required_without_all' => ':attribute è richiesto quando nessuno tra :values è presente.',
    'same' => ':attribute e :other devono essere identici.',
    'size' => [
        'numeric' => ':attribute deve essere :size.',
        'file' => ':attribute deve essere di :size kilobytes.',
        'string' => ':attribute deve contenere :size caratteri.',
        'array' => ':attribute deve contenere :size elementi.',
    ],
    'string' => ':attribute deve essere una stringa.',
    'timezone' => ':attribute deve essere un fuso orario valido.',
    'unique' => ':attribute è già stato utilizzato.',
    'url' => 'Il formato di :attribute non è valido.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'attributes' => [
        'backend' => [
            'access' => [
                'permissions' => [
                    'associated_roles' => 'Ruoli associati',
                    'dependencies' => 'Dipendenze',
                    'display_name' => 'Nome visualizzato',
                    'group' => 'Gruppo',
                    'group_sort' => 'Ordina gruppo',
                    'groups' => [
                        'name' => 'Nome gruppo',
                    ],
                    'name' => 'Nome',
                    'system' => 'Sistema?',
                ],
                'roles' => [
                    'associated_permissions' => 'Permessi associati',
                    'name' => 'Nome',
                    'sort' => 'Ordina',
                ],
                'users' => [
                    'active' => 'Attivo',
                    'associated_roles' => 'Ruoli associati',
                    'confirmed' => 'Confermato',
                    'email' => 'Indirizzo e-mail',
                    'name' => 'Nome',
                    'other_permissions' => 'Altri permessi',
                    'password' => 'Password',
                    'password_confirmation' => 'Conferma password',
                    'send_confirmation_email' => 'Invia e-mail di conferma',
                ],
            ],
        ],
        'frontend' => [
            'email' => 'Indirizzo e-mail',
            'name' => 'Nome',
            'password' => 'Password',
            'password_confirmation' => 'Conferma password',
            'old_password' => 'Vecchia password',
            'new_password' => 'Nuova password',
            'new_password_confirmation' => 'Conferma nuova password',
        ],
=======
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)

    'password.letters' => 'Il campo :attribute deve contenere almeno una lettera.',
    'password.mixed' => 'Il campo :attribute deve contenere almeno una lettera maiuscola e una minuscola.',
    'password.numbers' => 'Il campo :attribute deve contenere almeno un numero.',
    'password.symbols' => 'Il campo :attribute deve contenere almeno un simbolo.',
    'password.uncompromised' => 'Il :attribute fornito è apparso in una violazione di dati. Scegli un :attribute diverso, per favore.',

    'present' => 'Il campo :attribute deve essere presente.',
    'regex' => 'Il formato del campo :attribute non è valido.',
    'required' => 'Il campo :attribute è obbligatorio.',
    'required_if' => 'Il campo :attribute è obbligatorio quando :other è :value.',
    'required_unless' => 'Il campo :attribute è obbligatorio a meno che :other non sia in :values.',
    'required_with' => 'Il campo :attribute è obbligatorio quando :values è presente.',
    'required_with_all' => 'Il campo :attribute è obbligatorio quando sono presenti :values.',
    'required_without' => 'Il campo :attribute è obbligatorio quando :values non è presente.',
    'required_without_all' => 'Il campo :attribute è obbligatorio quando nessuno di :values è presente.',
    'same' => 'I campi :attribute e :other devono corrispondere.',
    'size' => [
        'numeric' => 'Il campo :attribute deve essere :size.',
        'file' => 'Il campo :attribute deve essere di :size kilobyte.',
        'string' => 'Il campo :attribute deve essere di :size caratteri.',
        'array' => 'Il campo :attribute deve contenere :size elementi.',
    ],
    'starts_with' => 'Il campo :attribute deve iniziare con uno dei seguenti valori: :values.',
    'string' => 'Il campo :attribute deve essere una stringa.',
    'timezone' => 'Il campo :attribute deve essere una zona valida.',
    'unique' => 'Il campo :attribute è già presente.',
    'uploaded' => 'Il campo :attribute non è riuscito a caricare.',
    'url' => 'Il formato del campo :attribute non è valido.',
    'uuid' => 'Il campo :attribute deve essere un UUID valido.',

    /*
    |--------------------------------------------------------------------------
    | Personalizzazione degli attributi
    |--------------------------------------------------------------------------
    |
    | Qui puoi specificare attributi personalizzati per i messaggi di validazione
    | utilizzando la convenzione "attribute.rule" per nominare le linee. Questo
    | rende facile specificare un messaggio di attributo personalizzato.
    |
    */

    'attributes' => [
        'data.password' => 'zu',
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 0d55b583 (first)
=======
>>>>>>> e83070fd (.)
=======
>>>>>>> bdeae81f (first)
    ],
];
