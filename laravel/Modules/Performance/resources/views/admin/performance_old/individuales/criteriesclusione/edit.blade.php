@extends('adm_theme::layouts.app')
@section('page_heading','Modifica Criteri Esclusione')

@section('section')
<x-filament::badge> flash-message </x-filament::badge>


{!! Form::bsOpen($row,'update') !!}

{{ Form::bsText('min_gg_ruolo') }}
{{ Form::bsText('lista_posiz_ruolo') }}
{{ Form::bsText('min_gg_propro') }}
{{ Form::bsText('min_gg_propro_posfun') }}
{{ Form::bsText('min_gg_anno') }}
{{ Form::bsText('min_gg_tempo_determinato') }}
{{ Form::bsText('lista_posiz_tempo_determinato') }}
{{ Form::bsText('min_gg_effettuati') }}
{{ Form::bsText('noposiz_list') }}
{{ Form::bsText('nopropro_list') }}
{{ Form::bsText('noposfun_list') }}
{{ Form::bsText('anno') }}

{{Form::submit('Salva ed esci',['class'=>'submit btn btn-success green-meadow'])}}
{!! Form::close() !!}
@endsection
