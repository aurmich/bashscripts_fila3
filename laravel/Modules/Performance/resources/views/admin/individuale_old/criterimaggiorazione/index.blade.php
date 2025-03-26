@extends('adm_theme::layouts.app')
@section('page_heading','criteri esclusione x anno')
@section('section')
<x-filament::badge> flash-message </x-filament::badge>



{!!  Form::bsBtnBack('codici_assenza') !!}
{!! Form::bsBtnCreate() !!}
<br class="clear-fix" />

<table class="table table-striped table-bordered">
<thead>
<tr>
<td>ID</td>
<td>min_valutaz_perf_ind </td>
<td>maggiorazione_perc </td>
<td>aventi_diritto_perc </td>
<td>anno </td>
<td></td>
</tr>
</thead>
<tbody>
@foreach($rows as $k => $v)
<tr>
<td>{{ $v->id }}</td>
<td>{{ $v->min_valutaz_perf_ind }}</td>
<td>{{ $v->maggiorazione_perc }}</td>
<td>{{ $v->aventi_diritto_perc }}</td>
<td>{{ $v->anno }}</td>
<td>

{!! Form::bsBtnCrud(['id_criteri_esclusione'=>$v->id]) !!}
{!! Form::bsBtnClone(['id_criteri_esclusione'=>$v->id]) !!}


</td>
</tr>
@endforeach
</tbody>
</table>
{{ $rows->links() }}
@endsection
