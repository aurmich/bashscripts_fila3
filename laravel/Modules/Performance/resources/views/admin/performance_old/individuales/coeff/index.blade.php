@extends('adm_theme::layouts.app')
@section('page_heading','coeff categoria')
@section('section')
<x-filament::badge> flash-message </x-filament::badge>



{!!  Form::bsBtnBack('coeff') !!}
{!! Form::bsBtnCreate() !!}

<table class="table table-striped table-bordered">
<thead>
<tr>
<td>ID</td>
<td>lista_propro</td>
<td>descr</td>
<td>coeff</td>
<th>anno</th>
<td></td>
</tr>
</thead>
<tbody>
@foreach($rows as $k => $v)
<tr>
<td>{{ $v->id }}</td>
<td>{{ $v->lista_propro }}</td>
<td>{{ $v->descr }}</td>
<td>{{ $v->coeff }}</td>
<td>{{ $v->anno }}</td>
<td>

{!! Form::bsBtnEdit(['id_spese'=>$v->id]) !!}
{!! Form::bsBtnDelete(['id_spese'=>$v->id]) !!}

</td>
</tr>
@endforeach
</tbody>
</table>
{{ $rows->links() }}
@endsection
