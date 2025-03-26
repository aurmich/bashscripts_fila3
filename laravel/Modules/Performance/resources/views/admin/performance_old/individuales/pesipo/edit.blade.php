@extends('adm_theme::layouts.app')
@section('page_heading','Modifica Spese Trasferta')

@section('section')
<x-filament::badge> flash-message </x-filament::badge>


{!! Form::bsOpen($row,'update') !!}
{{ Form::bsEuro('euro') }}
{{ Form::bsSelect('id_spese',null,$row->id_spese_opts()) }}
{{ Form::bsTextarea('note') }}
{{Form::submit('Salva ed esci',['class'=>'submit btn btn-success green-meadow'])}}
{!! Form::close() !!}
@endsection
