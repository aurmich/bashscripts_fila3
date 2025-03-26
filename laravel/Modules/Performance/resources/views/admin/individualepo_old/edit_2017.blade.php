@extends('adm_theme::layouts.app')
@section('page_heading','Modifica Valutazione')

@section('section')
<x-filament::badge> flash-message </x-filament::badge>


<style>
	label{display:none;}
	input{width:5em;}
	input[type=text] {
		width:5em;
	}
</style>

{{ $row->updatePesiPo() }}

{!! Form::bsBtnBack('edit') !!}

<h3 style="text-align:center;">
	SISTEMA DI MISURAZIONE E VALUTAZIONE DELLA PERFORMANCE INDIVIDUALE <br/> Anno {{  $row->anno }}
</h3>
<h4>Scheda di valutazione del PERSONALE INCARICATO .P.O.</h4>
<br/>
{!! Form::bsOpen($row,'update') !!}
<b>Dipendente:</b> {{$row->cognome}} {{$row->nome}} <b>matr:</b> {{$row->matr}} <b>Cat. Giur:</b> {{$row->categoria_eco }} <br/>
<b>Settore:</b> {{$row->stabi_txt}} <b>Reparto:</b> {{$row->repar_txt}}
<br/>
<b>dal:</b> {{ $row->dal }} <b>al:</b> {{ $row->al }}
{{--<b>Inizio :</b>{$FormData.dalr.html}<br style="clear:both"/> <b>Fine:</b>{$FormData.alr.html}--}}
<br/><b>email</b>{{ Form::bsText('email',null,['style'=>"width:30em"]) }}
<br/><b>Note</b>{{ Form::bsTextarea('note') }}
<br/><br/><br/>
<br style="clear:both"/>
<table border="1">
	<tr>
		<th>Comportamento<br/> atteso dalla persona</th>
		<th>Descrittori di giudizio</th>
		<th>Punti Valore del descrittore di giudizio</th>
		<th>Peso del comportamento</th>
		<th>Punti attribuiti alla persona</th>
		<th>Punteggio finale</th>
	</tr>
	<tr>
		<td rowspan="4">
			<!--(risultati_ottenuti)--><b>Conseguimento degli obiettivi</b> assegnati mediante la realizzazione dei prodotti richiesti e necessari alle attivit&aacute; dei processi di diretto coinvolgimento, con livello qualitativo / quantitativo adeguato a garantire prodotti finali di qualit&aacute; nel rispetto dei tempi di consegna
		</td>
		<td>Consegue gli obiettivi assegnati mediante la realizzazione dei prodotti richiesti senza la sufficiente perizia non consentendo esaustivit&aacute; contenutistica e correttezza formale nel livello quali/quantitativo richiesto, non rispettando i tempi di consegna </td>
		<td>da 0 a 1</td>
		<td rowspan="4">
			<div id="peso_risultati_ottenuti">{{  $row->peso_risultati_ottenuti }}</div>
		</td>
		<td rowspan="4">{{ Form::bsText('risultati_ottenuti') }}</td>
		<td rowspan="4">
			<div id="tot_risultati_ottenuti"></div>
		</td>
	</tr>
	<tr>
		<td>Consegue gli obiettivi assegnati realizzando i prodotti richiesti con la sufficiente perizia, senza significativi gap di contenuti e di forma rispetto al livello quali/quantitativo richiesto, non sempre rispettando i tempi di consegna</td>
		<td>da 1,1 a 2</td>
	</tr>
	<tr>
		<td>Consegue gli obiettivi assegnati mediante la realizzazione dei prodotti richiesti con perizia, in modo corretto contenutisticamente e perfettibile formalmente, garantendo il livello quali/quantitativo richiesto, rispettando sempre i tempi di consegna</td>
		<td>da 2,1 a 3</td>
	</tr>
	<tr>
		<td>Consegue gli obiettivi assegnati relaizzando i prodotti richiesti con perizia, in modo corretto sia contenutisticamente che formalmente, garantendo il livello quali/quantitativo richiesto, rispettando sempre i tempi di consegna, a volte anticipandoli, favorendo l'ottimizzazione del tempo complessivo di processo</td>
		<td>da 3,1 a 4</td>
	</tr>
	</tr>
	<tr>
		<td rowspan="4">
			<!--(qualita_prestazione)--><b>Rapporto con l'utenza
			interna ed esterna</b> con stile comunicativo verbale e metaverbale di successo, con etica professionale, rilevando i bisogni e favorendo la risposta attivando i necessari comportamenti organizzativi per garantire tempestivamente quanto richiesto con evidenti feedback positivi
		</td>
		<td>Non usa un adeguato stile comunicativo con l'utenza, non  ne rileva esaustivamente i bisogni  e non attiva  comportamenti organizzativi funzionali ad esaudire tempestivamente la richiesta</td>
		<td>da 0 a 1</td>
		<td rowspan="4">
			<div id="peso_qualita_prestazione">{{ $row->peso_qualita_prestazione }}</div>
		</td>
		<td rowspan="4">{{ Form::bsText('qualita_prestazione') }}</td>
		<td rowspan="4">
			<div id="tot_qualita_prestazione"></div>
		</td>
	</tr>
	<tr>
		<td>Usa un adeguato stile comunicativo con l'utenza ma non  ne rileva esaustivamente i bisogni  e non attiva  comportamenti organizzativi funzionali ad esaudire tempestivamente la richiesta</td>
		<td>da 1,1 a 2</td>
	</tr>
	<tr>
		<td>Usa un adeguato stile comunicativo con l'utenza   ne rileva esaustivamente i bisogni  ma non attiva  comportamenti organizzativi funzionali ad esaudire tempestivamente la richiesta</td>
		<td>da 2,1 a 3</td>
	</tr>
	<tr>
		<td>Usa un adeguato stile comunicativo con l'utenza, ne rileva esaustivamente i bisogni  ed attiva  comportamenti organizzativi funzionali ad esaudire tempestivamente la richiesta</td>
		<td>da 3,1 a 4</td>
	</tr>
	<!---------------->
	<tr>
		<td rowspan="4">
			<!--(arricchimento_professionale)--><b>Proposte di azioni migliorative</b>
			relativamente ai processi ed ai prodotti attesi dall'unit&aacute; operativa di appartenenza
		</td>
		<td>Non propone azioni migliorative funzionalmente all'ottimizzazione dei processi in cui &eacute; coinvolto e con riferimento all'unit&aacute; operativa di appartenenza</td>
		<td>da 0 a 1</td>
		<td rowspan="4">
			<div id="peso_arricchimento_professionale">{{ $row->peso_arricchimento_professionale }}</div>
		</td>
		<td rowspan="4">{{ Form::bsText('arricchimento_professionale') }}</td>
		<td rowspan="4">
			<div id="tot_arricchimento_professionale"></div>
		</td>
	</tr>
	{{--  <tr>
		<td>Propone azioni migliorative di rilevant</td>
		<td rowspan="4">
			<div id="tot_arricchimento_professionale"></div>
		</td>
	</tr>
	--}}
	<tr>
		<td>Propone azioni migliorative di non elevata significativit&aacute; funzionalmente all'ottimizzazione dei processi in cui &eacute; coinvolto e con riferimento all'unit&aacute; operativa di appartenenza</td>
		<td>da 1,1 a 2</td>
	</tr>
	<tr>
		<td>Propone azioni migliorative di rilevante significativit&aacute; funzionalmente all'ottimizzazione dei processi in cui &eacute; coinvolto e con riferimento all'unit&aacute; operativa di appartenenza</td>
		<td>da 2,1 a 3</td>
	</tr>
	<tr>
		<td>e significativit&aacute; funzionalmente all'ottimizzazione dei processi in cui &eacute; coinvolto e con impatti positivi su processi correlati riferibili anche ad altre unit&aacute; operative oltre a quella di appartenenza</td>
		<td>da 3,1 a 4</td>
	</tr>
	<!----------------------->
	<!---------------->
	<tr>
		<td rowspan="4">
			<!--(impegno)--><b>Favorisce il raggiungimento degli obiettivi</b> previsti dall'unit&aacute; operativa di appartenenza
		</td>
		<td>Evidenzia difficolt&aacute; di integrazione con le attivit&aacute; svolte dai colleghi ed a lavorare in linea con le finalit&aacute; complessive del proprio gruppo</td>
		<td>da 0 a 1</td>
		<td rowspan="4">
			<div id="peso_impegno">{{$row->peso_impegno}}</div>
		</td>
		<td rowspan="4">{{ Form::bsText('impegno') }}</td>
		<td rowspan="4">
			<div id="tot_impegno"></div>
		</td>
	</tr>
	<tr>
		<td>Si integra con le attivit&aacute; svolte dai colleghi e si attiva perseguendo le finalit&aacute; complessive del proprio gruppo di lavoro, solo se richiesto</td>
		<td>da 1,1 a 2</td>
	</tr>
	<tr>
		<td>Si integra con le attivit&aacute; svolte dai colleghi e dimostra orientamento nell'allargare le proprie competenze funzionalmente al raggiungimento dei risultati attesi dal proprio gruppo di lavoro</td>
		<td>da 2,1 a 3</td>
	</tr>
	<tr>
		<td>Si integra con le attivit&aacute; svolte dai colleghi risultando determinante nel perseguire le finalit&aacute; complessive del gruppo di lavoro</td>
		<td>da 3,1 a 4</td>
	</tr>
	<!----------------------->
	<!---------------->
	<tr>
		<td rowspan="4">
			<!--(esperienza_acquisita)--><b>Gestisce le risorse affidate con orientamento all'efficienza</b> complessiva ed all'ottimizzazione del rapporto costi / benefici, progetta e realizza strumenti funzionali all'organizzazione delle attivit&aacute; e dei processi per garantire i prodotti attesi, relativamente all'unit&aacute; operativa di appartenenza
		</td>
		<td>Non propone soluzioni funzionali ad elevare il grado di efficienza ed all'ottimizzazione del rapporto costi / benefici e non progetta e non realizza strumenti funzionali a gestire le attivit&aacute; concatenate nei processi in cui &eacute; coinvolto</td>
		<td>da 0 a 1</td>
		<td rowspan="4">
			<div id="peso_esperienza_acquisita">{{ $row->peso_esperienza_acquisita }}</div>
		</td>
		<td rowspan="4">{{ Form::bsText('esperienza_acquisita') }}</td>
		<td rowspan="4">
			<div id="tot_esperienza_acquisita"></div>
		</td>
	</tr>
	<tr>
		<td>Saltuariamente propone soluzioni funzionali ad elevare il grado di efficienza ed all'ottimizzazione del rapporto costi / benefici, su indicazioni fornite realizza strumenti basilari funzionali a gestire le attivit&aacute; concatenate nei processi in cui &eacute; coinvolto</td>
		<td>da 1,1 a 2</td>
	</tr>
	<tr>
		<td>Spesso propone soluzioni funzionali ad elevare il grado di efficienza ed all'ottimizzazione del rapporto costi / benefici, progetta e realizza semplici strumenti funzionali, a gestire le attivit&aacute; concatenate nei processi in cui &eacute; coinvolto </td>
		<td>da 2,1 a 3</td>
	</tr>
	<tr>
		<td>Con significativa frequenza  propone soluzioni funzionali ad elevare il grado di efficienza ed all'ottimizzazione del rapporto costi / benefici, progetta e realizza strumenti anche di significativa complessit&aacute;, funzionali a gestire le attivit&aacute; concatenate nei processi in cui &eacute; coinvolto</td>
		<td>da 3,1 a 4</td>
	</tr>
	<tr>
		<th colspan="5">Totale punteggio attribuito</th>
		<th>
			<div id="tot">...</div>

			<div style="display:none;">{{ Form::bsText('totale_punteggio') }}</div>
		</th>
	</tr>
	{{--
	<tr>
		<td colspan="3" align="center">Valore Economico Calcolato</td>
		<td>
			<div id="valEco" align="center">...</div>
		</td>
	</tr>
	<tr>
		<th colspan="3" style="font-size:20pt;">Valore Economico Attribuito (1)</th>
		<th>
			<div id="valEcoAttr" style="font-size:20pt;">...</div>
		</th>
	</tr>
	--}}
	<tr>
		<td colspan="6" align="center">
			{{Form::submit('Salva ed esci',['class'=>'submit btn btn-success green-meadow'])}}
		</td>
	</tr>
</table>
<div style="display:none">
	{{-- $FormData.tot.html --}}
	{{-- $FormData.valore_economico_calcolato.html --}}
	{{-- $FormData.valore_economico_attribuito.html --}}
</div>
{!! Form::close() !!}
{{--
(1) clausola di salvaguardia Art.24 comma 3 cci
<br/> gli importi non possono essere inferiori ai seguenti valori
<table border="1">
	<tr>
		<th>Categoria</th>
		<th>Importo Minimo</th>
	</tr>
	{foreach $allImporti as $el}
	<tr>
		<td align="center">{$el->categoria}</td>
		<td align="right">{$el->min}</td>
	</tr>
	{/foreach}
</table>
--}}
@endsection

@push('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
	function aggiornaTot(){
		var tot = 0;

		var fieldz=new Array("risultati_ottenuti","qualita_prestazione","arricchimento_professionale","impegno","esperienza_acquisita");
		for(i in fieldz){
			k=fieldz[i];
			//alert(k);
			v=$( "input[name='"+k+"']").val();
			v=parseFloat(v);
			p=$('#peso_'+k+'').html();
			p=parseInt(p);
			t=v*p/4;
			$('#tot_'+k+'').html(t.toFixed(2));
			tot+=t;
		}

		$('#tot').html(tot.toFixed(2));
		$( "input[name='totale_punteggio']").val(tot.toFixed(2));
		//$( "input[name='tot']").val(tot);


	}


	$("input:text").on("keyup", function(e) {
		//alert('pippo');
		//alert($(this).val());
		aggiornaTot();
	});
	aggiornaTot();

</script>
@endpush
