@extends('adm_theme::layouts.app')
@section('page_heading','criteri esclusione x anno')
@section('section')
<x-filament::badge> flash-message </x-filament::badge>



{!!  Form::bsBtnBack('codici_assenza') !!}
{!! Form::bsBtnCreate() !!}
<br class="clear-fix" />
<div class="col-md-2">
<table class="table table-striped table-bordered">
	<caption><h4>Disci1</h4></caption>
	<tr><th>cod</th><th>descr</th></tr>
	<tr><td>203</td><td>regionali</td></tr>
	<tr><td>204</td><td>lavoro</td></tr>
</table>
</div>

<table class="table table-striped table-bordered">
<thead>
<tr>
<td>ID</td>
<td>min gg ruolo </td>
<td>lista posiz ruolo </td>
<td>min gg propro </td>
<td>min gg propro_posfun </td>
<td>min gg anno </td>
<td>min gg tempo determinato </td>
<td>lista posiz tempo determinato </td>
<td>min gg effettuati </td>
<td>noposiz list </td>
<td>nopropro list </td>
<td>noposfun list </td>
<td>nodisci1 list</td>
<td>anno </td>
<td></td>
</tr>
</thead>
<tbody>
@foreach($rows as $k => $v)
<tr>
<td>{{ $v->id }}</td>
<td>{{ $v->min_gg_ruolo }}</td>
<td>{{ $v->lista_posiz_ruolo }}</td>
<td>{{ $v->min_gg_propro }}</td>
<td>{{ $v->min_gg_propro_posfun }}</td>
<td>{{ $v->min_gg_anno }}</td>
<td>{{ $v->min_gg_tempo_determinato }}</td>
<td>{{ $v->lista_posiz_tempo_determinato }}</td>
<td>{{ $v->min_gg_effettuati }}</td>
<td>{{ $v->noposiz_list }}</td>
<td>{{ $v->nopropro_list }}</td>
<td>{{ $v->noposfun_list }}</td>
<td>{{ $v->nodisci1_list }}</td>
<td>{{ $v->anno }}</td>
<td>

{!! Form::bsBtnEdit(['id_criteri_esclusione'=>$v->id]) !!}
{!! Form::bsBtnClone(['id_criteri_esclusione'=>$v->id]) !!}
{!! Form::bsBtnDelete(['id_criteri_esclusione'=>$v->id]) !!}
@php
	$params=getRouteParameters();
	$params['anno']=$v->anno;
	$route=route('performance.individuale.trovaEsclusi',$params);
@endphp
<a href="{{ $route }}"> Trova esclusi</a>


</td>
</tr>
@endforeach
</tbody>
</table>
{{ $rows->links() }}
@endsection
