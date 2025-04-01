@extends('adm_theme::layouts.app')
@section('page_heading','Fondo')
@section('section')
<x-filament::badge> flash-message </x-filament::badge>



{!!  Form::bsBtnBack('pesi') !!}
{!! Form::bsBtnCreate() !!}

<table class="table table-striped table-bordered">
<thead>
<tr>
<td>ID</td>
<td>quota_individuale</td>
<td>quota_organizzativa</td>
<th>anno</th>
<td>note</td>

<td></td>
</tr>
</thead>
<tbody>
@foreach($rows as $k => $v)
<tr>
<td>{{ $v->id }}</td>
<td>{{ $v->quota_individuale }}</td>
<td>{{ $v->quota_organizzativa }}</td>
<td>{{ $v->anno }}</td>
<td>{{ $v->note }}</td>

<td>

{!! Form::bsBtnEdit(['id_fondo'=>$v->id]) !!}
{!! Form::bsBtnDelete(['id_fondo'=>$v->id]) !!}

</td>
</tr>
@endforeach
</tbody>
</table>
@endsection
