<x-filament::widget>
    <x-filament::section>
        <x-slot name="heading">
            Firma
        </x-slot>
        <x-filament-panels::form wire:submit.prevent="save">
            {{ $this->form }}
            {{--  
            <x-filament-panels::form.actions 
                :actions="$this->getFormActions()"
            />
            --}}
            <x-filament::button type="submit" class="flex items-center justify-end" >
                {{ __('Aggiorna Firma') }}
            </x-filament::button>
        </x-filament-panels::form>
    </x-filament::section>
</x-filament::widget>