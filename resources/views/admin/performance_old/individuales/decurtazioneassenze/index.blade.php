@extends('adm_theme::layouts.app')
@section('page_heading','Decurtazione Assenze')
@section('section')
<x-filament::badge> flash-message </x-filament::badge>



{{--  Form::bsBtnBack('pesi') --}}
{!! Form::bsBtnCreate() !!}

<table class="table table-striped table-bordered">
<thead>
<tr>
<td>ID</td>
<th>anno</th>
<td>min_perc</td>
<td>max_perc</td>
<td>min_gg_365</td>
<td>max_gg_365</td>
<td>decurtazione_perc</td>

<td></td>
</tr>
</thead>
<tbody>
@foreach($rows as $k => $v)
<tr>
<td>{{ $v->id }}</td>
<td>{{ $v->anno }}</td>
<td>{{ $v->min_perc }}</td>
<td>{{ $v->max_perc }}</td>
<td>{{ $v->min_gg_365 }}</td>
<td>{{ $v->max_gg_365 }}</td>
<td>{{ $v->decurtazione_perc }}</td>

<td>

{!! Form::bsBtnEdit(['id_decurtazioneassenze'=>$v->id]) !!}
{!! Form::bsBtnDelete(['id_decurtazioneassenze'=>$v->id]) !!}

</td>
</tr>
@endforeach
</tbody>
</table>
@endsection
