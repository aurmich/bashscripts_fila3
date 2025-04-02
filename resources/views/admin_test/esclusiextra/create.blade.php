@extends('adm_theme::layouts.app')
@section('page_heading','Aggiungi Escluso')
@section('section')
<x-filament::badge> flash-message </x-filament::badge>



{!! Form::bsOpen($row,'store') !!}
{{ Form::bsInteger('ente') }}
{{ Form::bsInteger('matr') }}
{{ Form::bsText('cognome') }}
{{ Form::bsText('nome') }}
{{ Form::bsTextarea('motivo') }}
{{ Form::bsText('anno') }}

{{Form::bsSubmit('Salva ed esci')}}
{!! Form::close() !!}


@endsection
