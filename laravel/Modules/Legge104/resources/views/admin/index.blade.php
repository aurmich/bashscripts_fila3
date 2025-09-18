@extends('adm_theme::layouts.app')
<<<<<<< HEAD
@section('page_heading','Europa')
=======
@section('page_heading','Sindacati')
>>>>>>> 55edff60 (.)
@section('content')
<x-filament::badge> flash-message </x-filament::badge>


<<<<<<< HEAD
<h1>Benvenuto nel programma EUROPA</h1>

=======
<h1>Benvenuto nel programma Sindacati</h1>
@userLevel(3)
	livello >=3
@else
	livello <3
@endif
>>>>>>> 55edff60 (.)
@endsection
