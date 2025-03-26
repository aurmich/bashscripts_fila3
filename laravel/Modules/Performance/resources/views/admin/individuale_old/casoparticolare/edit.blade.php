@extends('adm_theme::layouts.app')
@section('page_heading','Modifica Manuale')

@section('section')
<x-filament::badge> flash-message </x-filament::badge>


<table class="table table-striped table-bordered">
<thead>
	<tr>
		<td>lavoratore</td>
		<td>categoria eco</td>
		<td>stabi repar</td>
		<td>ha diritto?</td>
		<td>valutazione/pesi</td>
		<td></td>
	</tr>
</thead>
<tbody>
	{{--
@include($view.'.item',['v'=>$row])
	--}}
</tbody>
</table>

{!! Form::bsOpen($row,'update') !!}
{{-- Form::bsNumber('esperienza_acquisita') --}}

{{ Form::bsText('email') }}
{{ Form::bsText('stabi') }}
{{ Form::bsText('stabi_txt') }}
{{ Form::bsText('repar') }}
{{ Form::bsText('repar_txt') }}
{{ Form::bsText('stabival') }}
{{ Form::bsText('reparval') }}
{{ Form::bsText('rep2kd') }}
{{ Form::bsText('rep2ka') }}
{{ Form::bsText('qua2kd') }}
{{ Form::bsText('qua2ka') }}
{{ Form::bsText('dal') }}
{{ Form::bsText('al') }}
{{ Form::bsText('ha_diritto') }}
{{ Form::bsText('motivo') }}



{{Form::bsSubmit('Salva ed esci')}}
{!! Form::close() !!}
@endsection
