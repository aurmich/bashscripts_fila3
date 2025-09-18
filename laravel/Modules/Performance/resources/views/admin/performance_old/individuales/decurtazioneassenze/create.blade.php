@extends('adm_theme::layouts.app')
@section('page_heading','Aggiungi Fondo/Anno')

@section('section')
<x-filament::badge> flash-message </x-filament::badge>

{!! Form::bsOpen($row,'store') !!}

{{ Form::bsEuro('quota_individuale') }}
{{ Form::bsEuro('quota_organizzativa') }}
{{ Form::bsText('anno') }}



{{ Form::bsTextarea('note') }}


{{Form::submit('Salva ed esci',['class'=>'submit btn btn-success green-meadow'])}}
{!! Form::close() !!}

@endsection
