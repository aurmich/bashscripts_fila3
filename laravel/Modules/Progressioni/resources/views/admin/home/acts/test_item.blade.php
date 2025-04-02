@extends('adm_theme::layouts.app')
@section('content')
    {!! Form::model($row, ['url' => Request::fullUrl()]) !!}
    @method('put')
    <input type="text" name="test" class="form-control" />
    {{ Form::bsSubmit('go') }}
    {{ Form::close() }}

@endsection