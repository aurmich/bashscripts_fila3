@extends('adm_theme::layouts.app')
@section('page_heading','Modifica Valutazione')

@section('section')
<x-filament::badge> flash-message </x-filament::badge>

<h3 style="color:green;"> valutazioni valide da 0 a 4 </h3>

@php
 $table=$row->getTable();
@endphp

{!! Form::bsBtnBack('edit','index') !!}

{!! Form::bsOpen($row,'update') !!}
<table class="table table-striped table-bordered">
<thead>
<tr>
	<th>Criterio
	 Valutazione</th>
	<th>Peso</th>
	<th></th>
</tr>
</thead>
<tbody>
@foreach($row->CriteriValutazione() as $vc)
	@php
		$sk=$vc->nome;
		$skp='peso_'.$sk;
	@endphp

	<tr>
		<td>{{ Form::bsDecimal($sk) }}</td>
		<td align="right">{{ $row->$skp }}</td>
		<td> </td>
	</tr>
@endforeach
</tbody>
</table>
{{Form::submit('Salva ed esci',['class'=>'submit btn btn-success green-meadow'])}}
{!! Form::close() !!}
@endsection

