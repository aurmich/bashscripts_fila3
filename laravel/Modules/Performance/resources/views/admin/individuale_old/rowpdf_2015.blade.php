 <style type="text/css">
table.morpion{

    border:     solid 1px #444444;

}


table.morpion td{
    border-left:            solid 1px #000000;
    border-bottom:          solid 1px #000000;
    text-align:     left;
    valign:top;
    font-size: 8pt;
    height:12px;
    padding:4px;
}

table.morpion th{
    border-left:            solid 1px #000000;
    border-bottom:          solid 1px #000000;
    text-align:     left;
    valign:top;
    font-size: 8pt;
    height:40px;
}

td.verticale{
    writing-mode: tb-rl;
    filter: flipv fliph;
}
.alt{
    background-color:#C0F0C0;
}

.rot{
    rotate:90;
    text-align:center;
    height:100%;
    width:100%;
    padding: 0px;

}

.thead {
    width:30px;
    text-align:center;
    vertical-align:middle;

}
</style>
 <page>
 <h3 style="text-align:center;">SISTEMA DI MISURAZIONE E VALUTAZIONE DELLA PERFORMANCE INDIVIDUALE - Anno
 {{$row->anno}}</h3>
 {{-- $row --}}

    <h4>Scheda di valutazione del PERSONALE NON DIRIGENZIALE</h4><br />
    <b>Dipendente:</b> {{$row->cognome}} {{$row->nome}} <b>matr:</b> {{$row->matr}}
    <b>Cat. Giur:</b> {{$row->categoria_eco}}<br />
    <b>Settore:</b> {{$row->stabi_txt}} <b>Reparto:</b> {{$row->repar_txt}}<br />
    <b>dal:</b> {{ $row->dal }} <b>al:</b> {{ $row->al }} <br />
    <b>Email :</b>{{$row->email}}<br />
    <br />
    <br />
    <br style="clear:both" />

    <table class="morpion" style="width:100%;border:1px solid gray;">
     <col style="width: 20%;font-size: 11px" class="col1" />
	 <col style="width: 45%" />
	 <col style="width: 8%" />
    <col style="width: 8%" />
    <col style="width: 7%;text-align:right;" />
    <col style="width: 7%;" />
        <tr>
            <th>Comportamento<br />
            atteso dalla persona</th>

            <th>Descrittori di giudizio</th>

            <th>Punti Valore del descrittore di giudizio</th>

            <th>Peso del comport.</th>

            <th>Punti attribuiti alla persona</th>

            <th>Punteggio finale</th>
        </tr>

        <tr>
            <td rowspan="4"><!--(risultati_ottenuti)--><b>Conseguimento degli obiettivi</b> assegnati mediante la realizzazione dei prodotti richiesti e necessari alle attivit&agrave; dei processi di
            diretto coinvolgimento, con livello qualitativo / quantitativo adeguato a garantire prodotti finali di qualit&agrave; nel rispetto dei tempi di consegna</td>

            <td>Consegue gli obiettivi assegnati mediante la realizzazione dei prodotti richiesti senza la sufficiente perizia non consentendo esaustivit&agrave; contenutistica e correttezza formale
            nel livello quali/quantitativo richiesto, non rispettando i tempi di consegna</td>

            <td>da 0 a 1</td>

            <td rowspan="4">
                <div id="peso_risultati_ottenuti">
                    {{$row->peso_risultati_ottenuti}}
                </div>
            </td>

            <td rowspan="4">{{$row->risultati_ottenuti}}</td>

            <td rowspan="4">
                <div id="tot_risultati_ottenuti"></div>
            </td>
        </tr>

        <tr>
            <td>Consegue gli obiettivi assegnati realizzando i prodotti richiesti con la sufficiente perizia, senza significativi gap di contenuti e di forma rispetto al livello quali/quantitativo
            richiesto, non sempre rispettando i tempi di consegna</td>

            <td>da 1,1 a 2</td>
        </tr>

        <tr>
            <td>Consegue gli obiettivi assegnati mediante la realizzazione dei prodotti richiesti con perizia, in modo corretto contenutisticamente e perfettibile formalmente, garantendo il livello
            quali/quantitativo richiesto, rispettando sempre i tempi di consegna</td>

            <td>da 2,1 a 3</td>
        </tr>

        <tr>
            <td>Consegue gli obiettivi assegnati relaizzando i prodotti richiesti con perizia, in modo corretto sia contenutisticamente che formalmente, garantendo il livello quali/quantitativo
            richiesto, rispettando sempre i tempi di consegna, a volte anticipandoli, favorendo l'ottimizzazione del tempo complessivo di processo</td>

            <td>da 3,1 a 4</td>
        </tr>

        <tr>
            <td rowspan="4"><!--(qualita_prestazione)--><b>Rapporto con l'utenza interna ed esterna</b> con stile comunicativo verbale e metaverbale di successo, con etica professionale, rilevando i
            bisogni e favorendo la risposta attivando i necessari comportamenti organizzativi per garantire tempestivamente quanto richiesto con evidenti feedback positivi</td>

            <td>Non usa un adeguato stile comunicativo con l'utenza, non ne rileva esaustivamente i bisogni e non attiva comportamenti organizzativi funzionali ad esaudire tempestivamente la
            richiesta</td>

            <td>da 0 a 1</td>

            <td rowspan="4">
                <div id="peso_qualita_prestazione">
                    {{$row->peso_qualita_prestazione}}
                </div>
            </td>

            <td rowspan="4">{{$row->qualita_prestazione}}</td>

            <td rowspan="4">
                <div id="tot_qualita_prestazione"></div>
            </td>
        </tr>

        <tr>
            <td>Usa un adeguato stile comunicativo con l'utenza ma non ne rileva esaustivamente i bisogni e non attiva comportamenti organizzativi funzionali ad esaudire tempestivamente la
            richiesta</td>

            <td>da 1,1 a 2</td>
        </tr>

        <tr>
            <td>Usa un adeguato stile comunicativo con l'utenza ne rileva esaustivamente i bisogni ma non attiva comportamenti organizzativi funzionali ad esaudire tempestivamente la richiesta</td>

            <td>da 2,1 a 3</td>
        </tr>

        <tr>
            <td>Usa un adeguato stile comunicativo con l'utenza, ne rileva esaustivamente i bisogni ed attiva comportamenti organizzativi funzionali ad esaudire tempestivamente la richiesta</td>

            <td>da 3,1 a 4</td>
        </tr><!--============-->

        <tr>
            <td rowspan="4"><!--(arricchimento_professionale)--><b>Proposte di azioni migliorative</b> relativamente ai processi ed ai prodotti attesi dall'unit&agrave; operativa di appartenenza</td>

            <td>Non propone azioni migliorative funzionalmente all'ottimizzazione dei processi in cui &egrave; coinvolto e con riferimento all'unit&agrave; operativa di appartenenza</td>

            <td>da 0 a 1</td>

            <td rowspan="4">
                <div id="peso_arricchimento_professionale">
                    {{$row->peso_arricchimento_professionale}}
                </div>
            </td>

            <td rowspan="4">{{$row->arricchimento_professionale}}</td>

            <td rowspan="4">
                <div id="tot_arricchimento_professionale"></div>
            </td>
        </tr>

        <tr>
            <td>Propone azioni migliorative di non elevata significativit&agrave; funzionalmente all'ottimizzazione dei processi in cui &egrave; coinvolto e con riferimento all'unit&agrave; operativa
            di appartenenza</td>

            <td>da 1,1 a 2</td>
        </tr>

        <tr>
            <td>Propone azioni migliorative di rilevante significativit&agrave; funzionalmente all'ottimizzazione dei processi in cui &egrave; coinvolto e con riferimento all'unit&agrave; operativa
            di appartenenza</td>

            <td>da 2,1 a 3</td>
        </tr>

        <tr>
            <td>Propone azioni migliorative di rilevante significativit&agrave; funzionalmente all'ottimizzazione dei processi in cui &egrave; coinvolto e con impatti positivi su processi correlati
            riferibili anche ad altre unit&agrave; operative oltre a quella di appartenenza</td>

            <td>da 3,1 a 4</td>
        </tr><!--===================-->
        <!--============-->

        <tr>
            <td rowspan="4"><!--(impegno)--><b>Favorisce il raggiungimento degli obiettivi</b> previsti dall'unit&agrave; operativa di appartenenza</td>

            <td>Evidenzia difficolt&agrave; di integrazione con le attivit&agrave; svolte dai colleghi ed a lavorare in linea con le finalit&agrave; complessive del proprio gruppo</td>

            <td>da 0 a 1</td>

            <td rowspan="4">
                <div id="peso_impegno">
                    {{$row->peso_impegno}}
                </div>
            </td>

            <td rowspan="4">{{$row->impegno}}</td>

            <td rowspan="4">
                <div id="tot_impegno"></div>
            </td>
        </tr>

        <tr>
            <td>Si integra con le attivit&agrave; svolte dai colleghi e si attiva perseguendo le finalit&agrave; complessive del proprio gruppo di lavoro, solo se richiesto</td>

            <td>da 1,1 a 2</td>
        </tr>

        <tr>
            <td>Si integra con le attivit&agrave; svolte dai colleghi e dimostra orientamento nell'allargare le proprie competenze funzionalmente al raggiungimento dei risultati attesi dal proprio
            gruppo di lavoro</td>

            <td>da 2,1 a 3</td>
        </tr>

        <tr>
            <td>Si integra con le attivit&agrave; svolte dai colleghi risultando determinante nel perseguire le finalit&agrave; complessive del gruppo di lavoro</td>

            <td>da 3,1 a 4</td>
        </tr><!--===================-->
        <!--============-->

        <tr>
            <td rowspan="4"><!--(esperienza_acquisita)--><b>Gestisce le risorse affidate con orientamento all'efficienza</b> complessiva ed all'ottimizzazione del rapporto costi / benefici, progetta
            e realizza strumenti funzionali all'organizzazione delle attivit&agrave; e dei processi per garantire i prodotti attesi, relativamente all'unit&agrave; operativa di appartenenza</td>

            <td>Non propone soluzioni funzionali ad elevare il grado di efficienza ed all'ottimizzazione del rapporto costi / benefici e non progetta e non realizza strumenti funzionali a gestire le
            attivit&agrave; concatenate nei processi in cui &egrave; coinvolto</td>

            <td>da 0 a 1</td>

            <td rowspan="4"><div>{{$row->peso_esperienza_acquisita}}</div></td>

            <td rowspan="4">{{$row->esperienza_acquisita}}</td>

            <td rowspan="4">
                <div id="tot_esperienza_acquisita"></div>
            </td>
        </tr>

        <tr>
            <td>Saltuariamente propone soluzioni funzionali ad elevare il grado di efficienza ed all'ottimizzazione del rapporto costi / benefici, su indicazioni fornite realizza strumenti basilari
            funzionali a gestire le attivit&agrave; concatenate nei processi in cui &egrave; coinvolto</td>

            <td>da 1,1 a 2</td>
        </tr>

        <tr>
            <td>Spesso propone soluzioni funzionali ad elevare il grado di efficienza ed all'ottimizzazione del rapporto costi / benefici, progetta e realizza semplici strumenti funzionali, a gestire
            le attivit&agrave; concatenate nei processi in cui &egrave; coinvolto</td>

            <td>da 2,1 a 3</td>
        </tr>

        <tr>
            <td>Con significativa frequenza propone soluzioni funzionali ad elevare il grado di efficienza ed all'ottimizzazione del rapporto costi / benefici, progetta e realizza strumenti anche di
            significativa complessit&agrave;, funzionali a gestire le attivit&agrave; concatenate nei processi in cui &egrave; coinvolto</td>

            <td>da 3,1 a 4</td>
        </tr>

        <tr>
            <th colspan="5">Totale punteggio attribuito</th>

            <th align="right">{{$row->totale_punteggio}}</th>
        </tr>
    </table>
    <p>{{$row->note}}</p>

  <br />IL DIRIGENTE

  <br/><span style="font-size:14px">{{$row->stabiDirigente()->first()->nome_diri}}</span>

  <br /><br />Treviso, li
  @if($row->datemod!='')
  {{$row->datemod}}
  @else
  {{ $row->updated_at->formatLocalized('%d/%m/%Y') }}
  @endif
</page>