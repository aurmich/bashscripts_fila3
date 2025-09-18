@extends('adm_theme::layouts.app')
@section('page_heading','Aggiungi Codice Assenza')

@section('section')
<x-filament::badge> flash-message </x-filament::badge>





{!! Form::bsOpen($row,'store') !!}

{{ Form::bsText('tipo') }}
{{ Form::bsText('codice') }}
{{ Form::bsTextarea('descr') }}
{{ Form::bsText('anno') }}


{{Form::submit('Salva ed esci',['class'=>'submit btn btn-success green-meadow'])}}
{!! Form::close() !!}

@endsection
