@include('ptv::pdf.css')
<page>
    @include('ptv::intestazione')
    @php
        $criteri = $row->criteriValutazione->sortBy('posizione');
    @endphp
    <h4 style="text-align:center;">SISTEMA DI MISURAZIONE E VALUTAZIONE DELLA PERFORMANCE INDIVIDUALE -
        Anno {{ $row->anno }}
        <br />
        {!! $row->option('titolo') !!}
    </h4>
    <table class="morpion" style="width:100%;">
        <col style="width: 5%;" />
        <col style="width: 20%" />
        <col style="width: 20%;" />
        <col style="width: 7%;text-align:right;" />
        <col style="width: 7%;text-align:right;" />
        <col style="width: 7%;text-align:right;" />
        <col style="width: 7%;text-align:right;" />
        <col style="width: 7%;text-align:right;" />
        <col style="width: 7%;text-align:right;" />
        <col style="width: 7%;text-align:center;" />

        <thead>
            <tr>
                <td>matr</td>
                <td>lavoratore</td>
                <td>categoria eco</td>
                @foreach ($criteri as $criterio)
                    <td>{{ $criterio->label }}</td>
                @endforeach
                <td><b>Totale Punteggio</b></td>
                <td><b>Eccellente</b></td>
            </tr>
        </thead>
        @php
            /*
            $rows=$rows->where('ha_diritto', 1);
            $sql = Str::replaceArray('?', $rows->getBindings(), $rows->toSql());
            dddx($sql);
            */
        @endphp


        @foreach ($rows->where('ha_diritto', 1)->get() as $row)
            <tr>
                <td>{{ $row->matr }}<br />[{{ $row->id }}]</td>
                <td>{{ $row->cognome }} {{ $row->nome }}<br /> {{ $row->email }}]</td>
                <td>{{ $row->posizione_eco }}</td>
                @foreach ($criteri as $criterio)
                    <td>{{ $row->{$criterio->nome} }}</td>
                @endforeach
                <td>{{ $row->totale_punteggio }}</td>
                <td>
                    @if ($row->excellence)<b style="darkred">SI</b>@endif
                </td>
            </tr>
        @endforeach
    </table>
    <br />IL DIRIGENTE
    <br /><span style="font-size:14px">{{ $row->stabiDirigente->nome_diri }}</span>
    <br /><br />Treviso, li
    {{-- @if ($row->updated_at != '')
        {{ $row->updated_at->formatLocalized('%d/%m/%Y') }}
    @else
        {{ \Carbon\Carbon::now()->formatLocalized('%d/%m/%Y') }}
    @endif --}}
    {{ \Carbon\Carbon::now()->formatLocalized('%d/%m/%Y') }}
</page>
