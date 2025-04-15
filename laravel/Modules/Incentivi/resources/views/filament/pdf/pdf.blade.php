<style type="text/css">
    <!--
    table.morpion {
        border: solid 1px #000000;
        width: 90%;
    }
    

    table.morpion th {
        font-size: 8pt;
        font-weight: bold;
        border-left: solid 1px #000000;
        border-bottom: solid 1px #000000;
        padding: 1px;
        text-align: center;
    }
    



    table.morpion td {
        font-size: 8pt;
        border: solid 1px #000000;
        border-left: solid 1px #000000;
        border-bottom: solid 1px #000000;
        text-align: center;
    }
    

    table.morpion td.j1 {
        color: #0A0;
    }
    

    table.morpion td.j2 {
        color: #A00;
    }
    

    .alt {
        background-color: #C0F0C0;
    }
    

    -->
</style>
<page backtop="20mm" backbottom="10mm" backleft="5mm" backright="5mm">
    <page_header>
        @include('ptv::intestazione')
    </page_header>
    {{-- <img src="{{ Theme::img_src('ptv::img/logo_ptv70px.gif') }}" alt="" style="height:70px;" height="70px"> --}}
    @php
    @endphp
    <h3 style="text-align:center;">
        Resoconto Progetto
    </h3>
    <br />
   

    <br /><br />


    {{ $viewParams->anno }}



    <table class="morpion" align="center">

        <tr>
            <th style="width: 25%; text-align: left; ">Fattore di valutazione</th>
            <th style="width: 55%; text-align: left; ">Descrittori di valutazione</th>
            <th style="width: 10%; text-align: left; ">Punteggio<br /> massimo<br /> attribuibile</th>
            <th style="width: 10%; text-align: left; ">Punteggio<br /> attrivuito<br /> dal<br /> dirigente</th>
        </tr>
        <tr class="alt">
            <td rowspan="3" style="width: 25%;">Grado di complessit&aacute; degli incarichi in relazione al livello di
                responsabilit&aacute;</td>
            <td style="width: 55%;">Responsabilit&aacute; collegate ad attivit&aacute; per la realizzazione delle quali
                &eacute; necessario gestire procedimenti <b>particolarmente complessi e non ripetitivi.</b> La
                particolare complessit&aacute; si misura in relazione al livello di discrezionalit&aacute;
                amministrativa o tecnica rimessa in capo al dipendente</td>
            <td style="width: 10%;">Sino a 40</td>
            <td rowspan="3" style="width: 10%;" align="right">test</td>
        </tr>
        <tr class="alt">
            <td style="width: 55%;">Responsabilit&aacute; collegate ad attivit&aacute; per la realizzazione delle quali
                &eacute; necessario gestire <b>procedimenti complessi anche se ripetitivi.</b> La complessit&aacute; si
                misura in relazione al livello di discezionalit&aacute; amministrativa o tecnica rimessa in capo al
                dipendente</td>
            <td style="width: 10%;">Sino a 25</td>
        </tr>
        <tr class="alt">
            <td style="width: 55%;">Responsabilit&aacute; collegate ad attivit&aacute; per la realizzzazione delle quali
                &eacute; necessario gestire <b>procedimenti non qualificati da complessit&aacute;</b> amministrativa o
                tecnica, di <b>carattere ripetitivo e standardizzato</b></td>
            <td style="width: 10%;">Sino a 15</td>
        </tr>
        <tr>
            <td rowspan="3" style="width: 25%;">Livello di coordinamento e autonomia</td>
            <td style="width: 55%;">Gestione procedimenti con <b>elevata autonomia</b> operativa in attivit&aacute;
                prevalentemente diversa e non definibile con <b>funzione di coordinamento</b></td>
            <td style="width: 10%;">Sino a 30</td>
            <td rowspan="3" style="width: 10%;" align="right">test</td>
        </tr>
        <tr>
            <td style="width: 55%;">Gestione di procedimenti secondo <b>programmi operativi definiti</b> e secondo una
                prassi consolidata</td>
            <td style="width: 10%;">Sino a 20</td>
        </tr>
        <tr>
            <td style="width: 55%;">Gestione di procedimenti con <b>modesta autornomia operativa</b> in attivit&aacute;
                standardizzata</td>
            <td style="width: 10%;">Sino a 10</td>
        </tr>
        <tr class="alt">
            <td rowspan="3" style="width: 25%;">Grado di responsabilit&aacute; verso l'interno e/o l'esterno</td>
            <td style="width: 55%;">Gestione procedimenti che comportano un esclusivo rilievo esterno, trattandosi di
                incarichi volti ad assolvere adempimenti previsti da leggi o regolamenti. Tali incarichi denotano anche
                relazioni e rapporti interorganici (istituzioni, enti, organi giurisdizionali, organi di massimo veritce
                politico, ecc)</td>
            <td style="width: 10%;">Sino a 30</td>
            <td rowspan="3" style="width: 10%;" align="right">test</td>
        </tr>
        <tr class="alt">
            <td style="width: 55%;">Gestione procedimenti che comportano anche un rilievo esterno di supporto ad
                attivit&aacute; assegnate ai responsabili della struttura di appartenenza</td>
            <td style="width: 10%;">Sino a 20</td>
        </tr>

        <tr class="alt">
            <td style="width: 55%;">Gestione procedimenti che comportano esclusivamente un rilievo interno all'Ente o
                alla struttura organizzativa di appartenenza</td>
            <td style="width: 10%;">Sino a 10</td>
        </tr>

        <tr>
            <th colspan="3">Totale punteggio attribuito</th>
        </tr>

        <tr>
            <td colspan="3" align="center">Valore Economico Calcolato</td>
        </tr>

        <tr>
            <th colspan="3" style="font-size:12pt;">Valore Economico Attribuito (1)</th>
        </tr>


    </table>
    {{-- (1) clausola di salvaguardia Art.24 comma 3 cci
<br/> gli importi non possono essere inferiori ai seguenti valori --}}
    <p>
    </p>

    <table border="1">
        <tr>
            <th>Categoria</th>
            <th>Importo Minimo</th>
            <th>Importo Massimo</th>
        </tr>
        <tr>
            
        </tr>
    </table>

    <br /><br /><br />

    <table style="width:100%;">
        <tr>
            <td style="width:33%;font-size:12pt;">Data
                <br /> test
            </td>
            <td style="width:66%;font-size:12pt;">IL DIRIGENTE DI SETTORE
                <br />_____________________________
            </td>

        </tr>
    </table>
</page>
