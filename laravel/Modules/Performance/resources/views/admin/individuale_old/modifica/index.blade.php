@extends('adm_theme::layouts.app')
@section('page_heading','Modifica Manuale')

@section('section')
<x-filament::badge> flash-message </x-filament::badge>



{!! Form::bsFormSearch() !!}
<table class="table table-striped table-bordered">
<thead>
	<tr>
		<td>lavoratore</td>
		<td>categoria eco</td>
		<td>stabi repar</td>
		<td>ha diritto?</td>
		<td>valutazione/pesi</td>
		<td></td>
	</tr>
</thead>
<tbody>
	@each($view.'.item', $rows, 'v', $view.'.empty')
</tbody>
</table>
{{ $rows->links() }}
@endsection
