<x-filament::widget>
    <x-filament::card>
        {{-- Widget content --}}
        @php
            // Debug information if needed
            // dddx([
            //     'get_defined_vars()' => get_defined_vars(),
            //     '$this' => $this,
            //     'get_class_methods' => get_class_methods($this),
            // ]);
        @endphp
<<<<<<< HEAD:resources/views/filament/resources/user-resource/widgets/user-overview.blade.php
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        {{ $record-> }}
=======
        {{ $record?->id }}
>>>>>>> b7483fd0 (first)
=======
        {{ $record-> }}
>>>>>>> e83070fd (.)
=======
        {{ $record-> }}
>>>>>>> bdeae81f (first)
=======
        {{ $record->name ?? 'Utente' }}
>>>>>>> 900f6485 (.):laravel/Modules/User/resources/views/filament/resources/user-resource/widgets/user-overview.blade.php
    </x-filament::card>
</x-filament::widget>
