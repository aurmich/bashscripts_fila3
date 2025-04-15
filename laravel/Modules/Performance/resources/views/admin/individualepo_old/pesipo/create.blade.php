@extends('adm_theme::layouts.app')
@section('page_heading','Crea')

@section('section')
<x-filament::badge> flash-message </x-filament::badge>


{!! Form::bsOpen($row,'store') !!}
{{ Form::bsText('lista_propro') }}
{{ Form::bsText('descr') }}
@foreach($row->CriteriValutazione() as $vc)
	@php
		$sk=$vc->nome;
		$skp='peso_'.$sk;
	@endphp
	{{ Form::bsText($skp) }}
@endforeach
{{ Form::bsText('anno') }}
{{Form::bsSubmit('Salva ed esci')}}

{!! Form::close() !!}

@endsection
