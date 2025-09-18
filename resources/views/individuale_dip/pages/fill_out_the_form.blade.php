<x-filament::page>
    @include($view.'.head')
	<x-filament-tables::table>
        <x-filament-tables::row  >
			<x-filament-tables::cell class="fi-table-cell-txt">
                Criterio
            </x-filament-tables::cell>   
            <x-filament-tables::cell class="fi-table-cell-txt">
                Descrizione
            </x-filament-tables::cell>   

            
            <x-filament-tables::cell class="fi-table-cell-txt">
                Valutazione
            </x-filament-tables::cell>   
            <x-filament-tables::cell class="fi-table-cell-txt">
                Peso
            </x-filament-tables::cell>   
        </x-filament-tables::row  >
		@foreach($criteri_options_root as $root)
		<x-filament-tables::row  >
			<x-filament-tables::cell class="fi-table-cell-txt">
                <div class="flex whitespace-normal " >
                    <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "style="" >
                        {!! $root->txt !!}
                    </span>
                </div>
			</x-filament-tables::cell>
            <x-filament-tables::cell class="fi-table-cell-txt" >
                <x-filament-tables::table>
                    @php   
                        $sons=$root->sons()->where('option_type', 'dip')->ordered()->get();
                    @endphp
                @foreach($sons as $son)
                    <x-filament-tables::row  >
                        <x-filament-tables::cell class="fi-table-cell-txt">
                            <div class="flex whitespace-normal max-w-max" >
                                <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white  "style="" >
                                    {!! $son->txt !!}
                                </span>
                            </div>
                        </x-filament-tables::cell>
                         <x-filament-tables::cell class="fi-table-cell-txt">
                            <div class="flex whitespace-normal max-w-max " >
                                <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white "style="" >
                                    {!! $son->txt1 !!}
                                </span>
                            </div>
                        </x-filament-tables::cell>
                    </x-filament-tables::row  >
                @endforeach
                </x-filament-tables::table>



            </x-filament-tables::cell>
            <x-filament-tables::cell class="fi-table-cell-txt">
                {{-- $root->value --}}
                <x-filament::input.wrapper  :valid="! $errors->has('data.'.$root->value)">
                    <x-filament::input
                        type="text"
                        wire:model.live="data.{{  $root->value }}"
                    />
                </x-filament::input.wrapper>
                @error('data.'.$root->value) 
                <x-filament::section>
                    <span class="text-danger-600 hover:text-danger-700" style="" >
                        {{ $message }}
                    </span>
                </x-filament::section>
               @enderror
            </x-filament-tables::cell>

            <x-filament-tables::cell class="fi-table-cell-txt ml-20">
                &nbsp;{{ $record->getPeso($root->value) }}
            </x-filament-tables::cell>
		</x-filament-tables::row>
		@endforeach
        <x-filament-tables::row>
            <x-filament-tables::cell class="fi-table-cell-txt ml-20">
                &nbsp;
            </x-filament-tables::cell>
            <x-filament-tables::cell class="fi-table-cell-txt ml-20">
                <label>
                    <x-filament::input.checkbox wire:model="excellence" />
                    <span>
                        Eccellente ?
                    </span>
                </label>
            </x-filament-tables::cell>
            <x-filament-tables::cell class="fi-table-cell-txt ml-20">
                <b>Totale</b>
            </x-filament-tables::cell>
            <x-filament-tables::cell class="fi-table-cell-txt ml-20">
                {{ $totale }}
                 <x-filament::icon-button
                        icon="heroicon-o-arrow-path"
                        wire:click="recalculate()"
                        label="Ricalcola"
                        tooltip="Ricalcola"
                    >
                    ricalcola
                </x-filament::icon-button>
            </x-filament-tables::cell>
        </x-filament-tables::row>
	</x-filament-tables::table>

    @if ($errors->any())
    <div class="text-danger-600 hover:text-danger-700">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    
   <x-filament::tabs>
     <x-filament::tabs.item>
        <x-filament::icon-button
            icon="heroicon-o-arrow-uturn-left"
            wire:click="back()"
            label="Torna alla lista"
            tooltip="Torna alla lista"
        >
        Back
        </x-filament::icon-button>
    </x-filament::tabs.item>
    <x-filament::tabs.item>
        <x-filament::icon-button
            icon="fas-save"
            wire:click="save()"
            label="Conferma"
            tooltip="Conferma"
        >
        Conferma
        </x-filament::icon-button>
    </x-filament::tabs.item>
    </x-filament::tabs>
    <br /><br />
    <br />
    <br />
    <br />
    {{--  
    <pre>{{  print_r($data,true) }}</pre>
    --}}
</x-filament::page>
