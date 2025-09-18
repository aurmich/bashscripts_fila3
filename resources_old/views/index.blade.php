<<<<<<< HEAD
@extends('media::layouts.master')
=======
@extends('user::layouts.master')
>>>>>>> e83070fd (.)

@section('content')
    <h1>Hello World</h1>

<<<<<<< HEAD
    <p>Module: {!! config('media.name') !!}</p>
=======
    <p>
        This view is loaded from module: {!! config('user.name') !!}
    </p>
>>>>>>> e83070fd (.)
@endsection
