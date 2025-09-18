@extends('adm_theme::layouts.app')
@section('page_heading','Modifica Criteri Maggiorazione Anno')

@section('section')
<x-filament::badge> flash-message </x-filament::badge>


{!! Form::bsOpen($row,'update') !!}

{{ Form::bsNumber('min_valutaz_perf_ind') }}
{{ Form::bsNumber('maggiorazione_perc') }}
{{ Form::bsNumber('aventi_diritto_perc') }}
{{ Form::bsNumber('anno') }}


{{Form::bsSubmit('Salva ed esci')}}
{!! Form::close() !!}
@endsection
