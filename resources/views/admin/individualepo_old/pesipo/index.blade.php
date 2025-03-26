@extends('adm_theme::layouts.app')
@section('page_heading','Pesi Pos. Organizzative')
@section('section')
<x-filament::badge> flash-message </x-filament::badge>



{!!  Form::bsBtnBack('pesipo') !!}
{!! Form::bsBtnCreate() !!}

<table class="table table-striped table-bordered">
<thead>
<tr>
<td>ID</td>
<td>lista_propro</td>
<td>descr</td>
@foreach($rows[0]->CriteriValutazione() as $vc)
	@php
		$sk=$vc->nome;
		$skp='peso_'.$sk;
		$skp=str_replace('_',' ',$skp);
	@endphp
	<td>{{ $skp }}</td>
@endforeach
<th>anno</th>

<td></td>
</tr>
</thead>
<tbody>
@foreach($rows as $k => $v)
<tr>
<td>{{ $v->id }}</td>
<td>{{ $v->lista_propro }}</td>
<td>{{ $v->descr }}</td>
@foreach($v->CriteriValutazione() as $vc)
	@php
		$sk=$vc->nome;
		$skp='peso_'.$sk;
	@endphp
	<td>{{ $v->$skp }}</td>
@endforeach
<td>{{ $v->anno }}</td>
<td>

{!! Form::bsBtnCrud(['id_spese'=>$v->id]) !!}
{!! Form::bsBtnClone(['id_spese'=>$v->id]) !!}

</td>
</tr>
@endforeach
</tbody>
</table>
{{ $rows->links() }}
@endsection
