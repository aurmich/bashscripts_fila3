@extends('adm_theme::layouts.app')
@section('page_heading','codici assenza individuale')
@section('section')
<x-filament::badge> flash-message </x-filament::badge>



{!!  Form::bsBtnBack('codici_assenza') !!}
{!! Form::bsBtnCreate() !!}
@if($rows->count()==0)
	{{ (\Xot\Performance\Models\IndividualeAssenze::populate()) }}
@endif

<table class="table table-striped table-bordered">
<thead>
<tr>
<td>ID</td>
<td>tipo</td>
<td>codice</td>
<td>descr</td>
<th>anno</th>
<td></td>
</tr>
</thead>
<tbody>
@foreach($rows as $k => $v)
<tr>
<td>{{ $v->id }}</td>
<td>{{ $v->tipo }}</td>
<td>{{ $v->codice }}</td>
<td>{{ $v->descr }}</td>
<td>{{ $v->anno }}</td>
<td>

{!! Form::bsBtnEdit(['id_codici_assenza'=>$v->id]) !!}
{!! Form::bsBtnDelete(['id_codici_assenza'=>$v->id]) !!}

</td>
</tr>
@endforeach
</tbody>
</table>
{{ $rows->links() }}
@endsection
