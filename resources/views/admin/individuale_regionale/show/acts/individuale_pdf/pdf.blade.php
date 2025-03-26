<style type="text/css">
    body {
        font-size: 6pt;
    }

    table.morpion {
        border: solid 1px #444444;
    }

    table.morpion td {
        border-left: solid 1px #000000;
        border-bottom: solid 1px #000000;
        text-align: left;
        valign: top;
        font-size: 6pt;
        height: 12px;
        padding: 1px;
    }

    table.morpion th {
        border-left: solid 1px #000000;
        border-bottom: solid 1px #000000;
        text-align: left;
        valign: top;
        font-size: 6pt;
        height: 40px;
    }

    td.verticale {
        writing-mode: tb-rl;
        filter: flipv fliph;
    }

    .alt {
        background-color: #C0F0C0;
    }

    .rot {
        rotate: 90;
        text-align: center;
        height: 100%;
        width: 100%;
        padding: 0px;
    }

    .thead {
        width: 30px;
        text-align: center;
        vertical-align: middle;
    }

</style>
<page>
    <h4 style="text-align:center;">SISTEMA DI MISURAZIONE E VALUTAZIONE DELLA PERFORMANCE INDIVIDUALE - Anno
        {{ $row->anno }}
        <br />

        {{-- $row --}}
        {!! $row->option('titolo') !!}
    </h4>
    <b>Dipendente:</b> {{ $row->cognome }} {{ $row->nome }} <b>matr:</b> {{ $row->matr }} <b>Email
        :</b>{{ $row->email }}<br />
    <b>Cat. Giur:</b> {{ $row->posizione_eco }} <b>Settore:</b> {{ $row->stabi_txt }} <b>Reparto:</b>
    {{ $row->repar_txt }}<br />
    <b>dal:</b> {{ $row->dal }} <b>al:</b> {{ $row->al }} <br />
    <br style="clear:both" />
    @php
        //$criteri = $row->options->where('name', 'criterio')->where('parent_id', 0);
         $criteri = $row->optionsCriteriOrdered();
    @endphp
    <table class="morpion" style="width:100%;border:1px solid gray;">
        <col style="width: 18%;font-size: 10px" class="col1" />
        <col style="width: 67%" />
        <col style="width: 5%" />
        <col style="width: 5%;text-align:right;" />
        <col style="width: 5%;text-align:right;" />

        <tr>
            <th>Comportamento<br /> atteso dalla persona</th>
            <th>Descrittori di giudizio / Punti Valore del descrittore di giudizio</th>
            <th>Peso del comport.</th>
            <th>Punti attribuiti alla persona</th>
            <th>Punteggio finale</th>
        </tr>

        @foreach ($criteri as $criterio)
            <tr>
                <td>{!! $criterio->txt !!}</td>
                <td style="padding:0;margin:0;">
                    <table style="width:100%">

                        <col style="width:87%" />
                        <col style="width: 13%" />

                        @foreach ($criterio->sons as $son)
                            <tr>
                                <td>{{ $son->txt }}</td>
                                <td>{{ $son->txt1 }}</td>
                            </tr>
                        @endforeach
                    </table>
                </td>


                @php
                    $name = $criterio->value;
                    $pk = 'peso_' . $name;
                @endphp
                <td align="right">
                    {{ $row->$pk }}
                </td>
                <td align="right">{{ $row->$name }}</td>
                <td>
                    <div id="tot_{{ $name }}"></div>
                </td>

            </tr>
        @endforeach
        <tr>
            <th colspan="2">Totale punteggio attribuito</th>
            <th colspan="2" align:"right">
                @if ($row->excellence)<b
                        style="darkred;text-align:right">Eccellente</b>@endif
            </th>
            <th align="right">{{ $row->totale_punteggio }}</th>
        </tr>
        {{-- <tr>
                <th colspan="4">Eccellente</th>
                <th >@if ($row->excellence)<b style="darkred">SI</b>@endif</th>
            </tr> --}}
    </table>
    <br />IL DIRIGENTE
    <br /><span style="font-size:14px">{{ $row->stabiDirigente->nome_diri }}</span>
    <br /><br />Treviso, li
    @if ($row->updated_at != '')
        {{ $row->updated_at->formatLocalized('%d/%m/%Y') }}
    @else
        {{ \Carbon\Carbon::now()->formatLocalized('%d/%m/%Y') }}
    @endif
</page>
