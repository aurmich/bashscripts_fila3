<x-filament-widgets::widget>
    <x-filament::section>


    <div class="w-full p-4 bg-white rounded-lg shadow sm:p-6 dark:bg-gray-800">
        <h5 class="mb-3 font-bold text-gray-900 text-2xl dark:text-white">
        Azioni rapide
        </h5>
        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Crea rapidamente un nuovo <span class="italic">Progetto </span> o un nuovo <span class="italic">Gruppo di Lavoro </span></p>
        <ul class="my-4 space-y-3">
            <li>
                <x-filament::button
                    href="../admin/workgroups/create"
                    tag="a" color="info" icon="heroicon-m-arrow-long-right" icon-position="after">
                    Nuovo Gruppo di Lavoro
                </x-filament::button>
            </li>
            <li>
                <x-filament::button
                    href="../admin/projects/create"
                    tag="a" color="primary" icon="heroicon-m-arrow-long-right" icon-position="after">
                    Nuovo Progetto
                </x-filament::button>
            </li>
        </ul>

    </div>
        
    </x-filament::section>
</x-filament-widgets::widget>
