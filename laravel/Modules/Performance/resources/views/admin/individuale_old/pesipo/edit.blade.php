@extends('adm_theme::layouts.app')
@section('page_heading','Modifica ')

@section('section')
<x-filament::badge> flash-message </x-filament::badge>


{!! Form::bsOpen($row,'update') !!}
{{ Form::bsText('lista_propro') }}
{{ Form::bsText('descr') }}
@foreach($row->CriteriValutazione() as $vc)
	@php
		$sk=$vc->nome;
		$skp='peso_'.$sk;
	@endphp
	{{ Form::bsText($skp,null,['label'=>$vc->label]) }}
@endforeach
{{ Form::bsText('anno') }}
{{Form::bsSubmit('Salva ed esci')}}
{!! Form::close() !!}
@endsection
