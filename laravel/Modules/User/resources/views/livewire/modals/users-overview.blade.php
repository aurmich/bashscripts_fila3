<x-wire-elements-pro::tailwind.modal on-submit="save" :content-padding="false">
    <x-slot name="title">Your Title</x-slot>

    <!-- No padding will be applied because the component attribute "content-padding" is set to false -->
    <div>
        <label>Your email</label>
            <input type="email" placeholder="demo@wire-elements.dev">
    </div>
    <x-filament::input.wrapper>
        <x-filament::input
            type="text"
            wire:model="name"
        />
    </x-filament::input.wrapper>

    <x-filament::input.wrapper
    suffix-icon="heroicon-m-check-circle"
    suffix-icon-color="success"
>
    <x-filament::input
        type="url"
        wire:model="domain"
    />
</x-filament::input.wrapper>

    <x-slot name="buttons">
        <button type="submit">
            Save Changes
        </button>
        <button type="button" wire:click="$dispatch('modal.close')">
            Cancel
        </button>
    </x-slot>
</x-wire-elements-pro::tailwind.modal>
