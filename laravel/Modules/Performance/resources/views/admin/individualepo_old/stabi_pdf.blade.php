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
<img src="{{ asset('img/logo_ptv235x50.gif') }}" />
<h3 style="text-align:center;">SISTEMA DI MISURAZIONE E VALUTAZIONE DELLA PERFORMANCE INDIVIDUALE - Anno
 {{$anno}}
<br/>
@if(is_object($rows->first()))
@if(isset($params['stabi']))
{{$rows->first()->stabiDirigente()->first()->nome_stabi}}
@endif
@endif
 </h3>

<table class="morpion" style="width:100%;border:1px solid gray;">

<col style="width: 5%;"/>
<col style="width: 20%" />
<col style="width: 6%" />
<col style="width: 9%" />
<col style="width: 9%;" />
<col style="width: 9%;" />
<col style="width: 9%;" />
<col style="width: 9%;" />
<col style="width: 9%;" />
<col style="width: 15%;" />

<thead>
	<tr>
		<td>matr</td>
		<td>lavoratore</td>
		<td>categoria eco</td>
		@foreach($rows->first()->CriteriValutazione() as $vc)
			@php
				$sk=$vc->nome;
				$skp='peso_'.$sk;
			@endphp

			<td>{{ __('performance.'.$sk) }}</td>
		@endforeach
		<td><b>Totale Punteggio</b></td>
		<td>Note</td>
	</tr>
</thead>
<tbody>
@foreach($rows as $k => $v)
<tr>
	<td>{{ $v->matr }}
	<br/>[{{ $v->id }}]</td>
	<td>{{ $v->cognome }} {{ $v->nome }}
	<br/><span style="color:blue">{{ $v->email }}</span>
	</td>
	<td>{{ $v->categoria_eco }}</td>
	@foreach($rows->first()->CriteriValutazione() as $vc)
		@php
			$sk=$vc->nome;
			$skp='peso_'.$sk;
		@endphp

		<td align="right">{{ $v->$sk }}</td>
	@endforeach

	<td align="right"><b>{{ $v->totale_punteggio }}</b></td>
	<td>{{ $v->note }}</td>
</tr>
@endforeach
</tbody>
</table>
<br />IL DIRIGENTE
   @if(isset($params['stabi']))
  <br/><span style="font-size:14px">{{$rows->first()->stabiDirigente()->first()->nome_diri}}</span>
  @endif

  <br /><br />Treviso, li
  @if($rows->first()->datemod!='')
  {{$rows->first()->datemod}}
  @else
  {{ \Carbon\Carbon::now()->formatLocalized('%d/%m/%Y') }}
  @endif

</page>