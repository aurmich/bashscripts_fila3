<h3 style="text-align:center;">
SISTEMA DI MISURAZIONE E VALUTAZIONE DELLA PERFORMANCE INDIVIDUALE - Anno {$anno}
</h3>
<h4>Scheda di valutazione del PERSONALE INCARICATO .P.O.</h4>
<br/>
 <form {$FormData.attributes}>
<b>Dipendente:</b> {$anag.cognome} {$anag.nome} <b>matr:</b> {$anag.matr} <b>Cat. Giur:</b> {$anag.categoria_eco|replace:"Posizione economica":""} <br/>
{*<b>Posizione di Lavoro:</b><span style="color:red">{$FormData.posizione_lavoro.error}</span>
{$FormData.posizione_lavoro.html}<br/>*}
<b>Settore:</b> {$anag.stabi_txt} <b>Reparto:</b> {$anag.repar_txt}
<br/>
<b>dal:</b> {date("d/m/Y",strtotime($anag.dal))} <b>al:</b> {date("d/m/Y",strtotime($anag.al))}
{*<b>Inizio :</b>{$FormData.dalr.html}<br style="clear:both"/> <b>Fine:</b>{$FormData.alr.html}*}
<br/><b>Email :</b>{$FormData.email.html}
<br/><br/><br/>
<br style="clear:both"/>
{* $FormData.header.__header__ *}

     {$FormData.hidden}


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
		<td rowspan="4"><!--(risultati_ottenuti)--><b>Conseguimento degli obiettivi</b>, assegnati all'unità organizzativa di diretta responsabilità, presidiando la programmazione delle attività funzionali ai processi tesi a garantire i prodotti attesi con il target espresso nel piano delle performance organizzative.</td>

		<td>Consegue gli obiettivi assegnati all'U.O. gestita, con riferimento ai valori attesi e indicati nel piano della performance organizzativa, con scostamenti non significativi rispetto alla raggiungibilità del valore previsto </td>
		<td>da 0 a 1</td>
		<td rowspan="4"><div id="peso_risultati_ottenuti">{$anag.peso_risultati_ottenuti}</div></td>
		<td rowspan="4"><span style="color:red">{$FormData.risultati_ottenuti.error}</span>
		{$FormData.risultati_ottenuti.html}</td>
		<td rowspan="4"><div id="tot_risultati_ottenuti"></td>
	</tr>
	<tr>
		<td>Consegue gli obiettivi assegnati all'.U.O. gestita, con riferimento ai valori attesi e indicati nel piano della performance organizzativa, senza scostamenti rispetto al target</td>
		<td>da 1,1 a 2</td>
	</tr>
	<tr>
		<td>Consegue gli obiettivi assegnati all'.U.O. gestita, con riferimento ai valori attesi e indicati nel piano della performance organizzativa, con valori coerenti con il target previsto e prodotti di accettabile standard qualitativo (comporta un miglioramento rispetto a quello atteso: minor costi)</td>
		<td>da 2,1 a 3</td>
	</tr>
	<tr>
		<td>Consegue gli obiettivi assegnati al settore gestito direttamente, con riferimento ai valori attesi e indicati nel piano della performance organizzativa, con valori superiori rispetto al target previsto e prodotti di elevato standard qualitativo (i risultati sono eccellenti: si realizzano economie di spesa)</td>
		<td>da 3,1 a 4</td>
	</tr>

	</tr>
	<tr>
		<td rowspan="4"><!--(qualita_prestazione)--><b>Monitoraggio delle attività afferenti i processi</b> dell'unità organizzativa di cui è responsabile, le relazioni ed i risultati, per garantire la risposta alle attese, individuando i punti essenziali dei fenomeni ed intervenire tempestivamente in caso di scostamenti e/o situazioni impreviste</td>

		<td>Individua i punti essenziali dei fenomeni rilevando le eventuali criticità e, definite modalità di controllo che possano influire sull'andamento dei programmi di lavoro , interviene non sempre con tempestività nella riduzione di scostamenti e nell'affrontare situazioni impreviste</td>
		<td>da 0 a 1</td>
		<td rowspan="4"><div id="peso_qualita_prestazione">{$anag.peso_qualita_prestazione}</div></td>
		<td rowspan="4"><span style="color:red">{$FormData.qualita_prestazione.error}</span>{$FormData.qualita_prestazione.html}</td>
		<td rowspan="4"><div id="tot_qualita_prestazione"></div></td>
	</tr>
	<tr>
		<td>Individua i punti essenziali dei fenomeni rilevando le eventuali criticità e, definite modalità di controllo che possano influire sull'andamento dei programmi di lavoro , interviene con tempestività nella riduzione di scostamenti e nell'affrontare situazioni impreviste</td>
		<td>da 1,1 a 2</td>
	</tr>
	<tr>
		<td>Individua i punti essenziali dei fenomeni rilevando le eventuali criticità e, definite modalità di controllo che possano influire sull'andamento dei programmi di lavoro , interviene con tempestività ed efficacia nella riduzione di scostamenti e nell'affrontare situazioni impreviste</td>
		<td>da 2,1 a 3</td>
	</tr>
	<tr>
		<td>Individua i punti essenziali dei fenomeni rilevando le eventuali criticità e, definite modalità di controllo che possano influire sull'andamento dei programmi di lavoro , interviene con tempestività, efficacia ed efficienza nella riduzione di scostamenti e nell'affrontare situazioni impreviste</td>
		<td>da 3,1 a 4</td>
	</tr>
	<!---------------->
	<tr>
		<td rowspan="4"><!--(arricchimento_professionale)--><b>Attuazione di strategie di Miglioramento del "clima lavorativo"</b> all'interno dell'unità organizzativa di cui è responsabile adottando strategie relazionali orientate alla condivisione dei valori ed allo scambio delle informazioni strategiche nell'ottica di garantire i servizi dell'organizzazione con un elevato standard qualitativo</td>

		<td>Adotta strategie relazionali di non elevata incidenza nel favorire il miglioramento del clima lavorativo, non sempre condividendo con i propri collaboratori le linee gestionali dell'unità organizzativa e contribuendo parzialmente al miglioramento del flusso comunicativo qualificante nel contesto organizzativo</td>
		<td>da 0 a 1</td>
		<td rowspan="4"><div id="peso_arricchimento_professionale">{$anag.peso_arricchimento_professionale}</div></td>
		<td rowspan="4"><span style="color:red">{$FormData.arricchimento_professionale.error}</span>
		{$FormData.arricchimento_professionale.html}</td>
		<td rowspan="4"><div id="tot_arricchimento_professionale"></div></td>
	</tr>
	<tr>
		<td>Adotta strategie relazionali che favoriscono il miglioramento del clima lavorativo, condividendo non sempre con i propri collaboratori le linee gestionali dell'unità organizzativa e contribuendo al miglioramento del flusso comunicativo qualificante nel contesto organizzativo secondo uno standard minimo di accettabilità.</td>
		<td>da 1,1 a 2</td>
	</tr>
	<tr>
		<td>Adotta strategie relazionali che incidono significativamente sul miglioramento del clima lavorativo, condividendo con i propri collaboratori le linee gestionali dell'unità organizzativa con propensione all'accoglimento di suggerimenti e contribuendo al miglioramento del flusso comunicativo qualificante nel contesto organizzativo</td>
		<td>da 2,1 a 3</td>
	</tr>
	<tr>
		<td>Adotta strategie relazionali che migliorano evidentemente il clima lavorativo, condividendo sempre con i propri collaboratori le linee gestionali del settore con forte propensione all'accoglimento di suggerimenti e proposte e contribuendo al miglioramento del flusso comunicativo qualificante nel contesto organizzativo secondo uno standard qualitativo elevato. </td>
		<td>da 3,1 a 4</td>
	</tr>
	<!----------------------->
	<!---------------->
	<tr>
		<td rowspan="4"><!--(impegno)--><b>Organizzazione della programmazione delle attività</b> dell'unità organizzativa di responsabilità, gestendo le risorse affidate nell'ottica dell'efficienza  con presidio dei processi e monitoraggio nell'ottica dell'applicazione del ciclo di P.D.C.A. (plan do check act), assicurando lo standard di produttività.</td>

		<td>Organizza la programmazione delle attività non sempre nel rispetto dei tempi e gestendo le risorse con inadeguata "sensibilità" economica" per quanto attiene in particolare l'efficienza  esprimibile dall'ottimizzazione dei rapporti costi / benefici , risorse investite / risultati</td>
		<td>da 0 a 1</td>
		<td rowspan="4"><div id="peso_impegno">{$anag.peso_impegno}</div></td>
		<td rowspan="4"><span style="color:red">{$FormData.impegno.error}</span>
		{$FormData.impegno.html}</td>
		<td rowspan="4"><div id="tot_impegno"></div></td>
	</tr>
	<tr>
		<td>Organizza la programmazione delle attività nel rispetto dei tempi e gestendo le risorse con la necessaria "sensibilità" economica" per quanto attiene in particolare l'efficienza  esprimibile dall'ottimizzazione dei rapporti costi / benefici , risorse investite / risultati</td>
		<td>da 1,1 a 2</td>
	</tr>
	<tr>
		<td>Organizza la programmazione delle attività nel rispetto dei tempi e a volte anticipando  le scadenze favorendo le attività correlate e gestendo le risorse con accettabile "sensibilità" economica" per quanto attiene in particolare l'efficienza  esprimibile dall'ottimizzazione dei rapporti costi / benefici , risorse investite / risultati</td>
		<td>da 2,1 a 3</td>
	</tr>
	<tr>
		<td>Organizza la programmazione delle attività nel massimo rispetto dei tempi e spesso anticipando congruamente le scadenze favorendo le attività correlate e gestendo le risorse con elevata "sensibilità" economica" per quanto attiene in particolare l'efficienza  esprimibile dall'ottimizzazione dei rapporti costi / benefici , risorse investite / risultati</td>
		<td>da 3,1 a 4</td>
	</tr>
	<!----------------------->
	<!---------------->
	<tr>
		<td rowspan="4"><!--(esperienza_acquisita)--><b>Focalizzazione dei processi di comunicazione sulla condivisione dei risultati</b> da raggiungere, intesi come output intermedi nei processi lavorativi, come prodotti finali di processo e target previsti nel piano della performance organizzativa.</td>

		<td>Orienta verso i risultati previsti / desiderati  le risorse umane che in sinergia devono operare all'interno dei processi lavorativi, focalizzando i processi comunicativi in funzione della meta.</td>
		<td>da 0 a 1</td>
		<td rowspan="4"><div id="peso_esperienza_acquisita">{$anag.peso_esperienza_acquisita}</div></td>
		<td rowspan="4"><span style="color:red">{$FormData.esperienza_acquisita.error}</span>
		{$FormData.esperienza_acquisita.html}</td>
		<td rowspan="4"><div id="tot_esperienza_acquisita"></div></td>
	</tr>
	<tr>
		<td>Orienta verso i risultati previsti / desiderati  le risorse umane che in sinergia devono operare all'interno dei processi lavorativi, focalizzando i processi comunicativi in funzione della meta, interagendo con i propri collaboratori stimolandoli al confronto costruttivo.</td>
		<td>da 1,1 a 2</td>
	</tr>
	<tr>
		<td>Orienta verso i risultati previsti / desiderati  le risorse umane che in sinergia devono operare all'interno dei processi lavorativi, focalizzando i processi comunicativi in funzione della meta, interagendo con i propri collaboratori stimolandoli al confronto costruttivo e senza "perdere di vista" il risultato.</td>
		<td>da 2,1 a 3</td>
	</tr>
	<tr>
		<td>Orienta verso i risultati previsti / desiderati  le risorse umane che in sinergia devono operare all'interno dei processi lavorativi, focalizzando i processi comunicativi in funzione della meta, interagendo con i propri collaboratori stimolandoli al confronto costruttivo, senza "perdere di vista" il risultato e facendo rilevare le priorità di azioni in rapporto agli obiettivi</td>
		<td>da 3,1 a 4</td>
	</tr>
	<!----------------------->



	<tr><th colspan="5">Totale punteggio attribuito</th>
	<th><div id="tot">...</div><div style="display:none">{$FormData.totale_punteggio.html}</div> </th></tr>
	{*<tr><td colspan="3" align="center">Valore Economico Calcolato</td><td><div id="valEco" align="center">...</div>  </td></tr>
	<tr><th colspan="3" style="font-size:20pt;">Valore Economico Attribuito (1)</th><th><div id="valEcoAttr" style="font-size:20pt;">...</div>  </th></tr>*}
	<tr><td colspan="6" align="center">{$FormData.__submit__.html}</td></tr>

</table>
<div style="display:none">
{* $FormData.tot.html *}
{* $FormData.valore_economico_calcolato.html *}
{* $FormData.valore_economico_attribuito.html *}
</div>
</form>
{*
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
*}
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
	//alert($(this).val());
	aggiornaTot();
});
aggiornaTot();

</script>




