<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
@include('ptv::pdf.css01')
<page>
   
    <img src="{{ base_path('Modules/Ptv/resources/img/Logo-Provincia-orizzontale-neg.png') }}" style="height:50px" />
    <h3>{{ $title}}</h3>
    <br/><br/>
    <table>
        <colgroup>
            <col style="width: 5%" class="col1">
            <col style="width: 10%">
            <col style="width: 85%">
        </colgroup>
        <thead>
        <tr>
            <th>Matr</th>
            <th>Cognome Nome</th>
            <th>dettaglio</th>
        </tr>
        </thead>
        <tbody>
    
        <tr >
            <td style="border-bottom: solid 1px #ababab;">
                {{ $row->matr }}
            </td>
            <td style="border-bottom: solid 1px #ababab;">
                {{ $row->cognome }}<br/>{{ $row->nome }} 
            </td>
            <td style="border-bottom: solid 1px #ababab;">
                <table >
                    <colgroup>
                        <col style="width: 55%" class="col1">
                        <col style="width: 15%">
                        <col style="width: 15%">
                        <col style="width: 15%">
                    </colgroup>
                    
                    @foreach($row->ratings as $rating)
                        <tr>
                            <td> {!! $rating->txt !!} </td>
                            <td  align="right"><b>{{ $rating->pivot->value }}</b></td>
                        </tr>
                    @endforeach
                    

                </table>
            </td>
           
        </tr>
    
    </tbody>
    </table>
    
    @include('ptv::pdf.firma')
    
</page>
=======
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
@include('ptv::pdf.css02')
<page backtop="20mm">
    <page_header>
        @include('ptv::intestazione')
    </page_header>

    @php
        //dddx($row->schedaCriteri);
       
        $msg = $row->messages->keyBy('type');
        //dddx($row->valutatore);
        //dddx($msg);
        $stabi_diri = $row->stabiDirigente;
        if (is_object($stabi_diri)) {
            $nome_stabi = $stabi_diri->nome_stabi;
        } else {
            $nome_stabi = 'Da settare in SatbiDirigente';
        }
    @endphp

    <h3>
        {!! nl2br($msg['scheda_valutazione_su']->txt) !!}
        <br/><br/>

        {{-- $row->valutatore->nome_stabi --}}
        {{ $nome_stabi }}
    </h3>
    @include($view.'.head')
    <br />
    <table class="table morpion" style="width:100%;">
        <col style="width: 60%;" />
        <col style="width: 20%;" />
        <col style="width: 20%;" />
        <thead>
            <tr>
                <th>
                    Criteri di Valutazione
                </th>
                <th>
                    Peso attribuito ai criteri di valutazione
                </th>
                <th>
                    Punteggio
                </th>
            </tr>
        </thead>
        @foreach ($row->schedaCriteri as $k => $v)
            <tr>
                <td>
                    {!! $v->descr !!}
                </td>
                <td align="right">
                    {{ $v->peso }}
                </td>
                <td align="right">
                    {{ number_format(($row->convertedIn($v->field_name, $v->converted_in) * $v->peso) / 10, 2) }}
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2">Totale</td>
            <td align="right">{{ number_format($row->punt_progressione_finale, 2) }}</td>
        </tr>
    </table>
    <br />
   
    <page_footer>
        @include($view.'.foot')
    </page_footer>
</page>
<<<<<<< HEAD
>>>>>>> bcab6efe (first)
=======
WIP WIP
>>>>>>> 961ad402 (first)
=======
>>>>>>> f3d4311a (Squashed 'laravel/Modules/Progressioni/' content from commit 72d99eef1)
