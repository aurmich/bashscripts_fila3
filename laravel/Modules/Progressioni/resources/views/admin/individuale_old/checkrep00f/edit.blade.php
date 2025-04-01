@extends('adm_theme::layouts.app')
@section('page_heading','check Rep00f')
@section('section')
<x-filament::badge> flash-message </x-filament::badge>


controllo {{ $anno }}
<table>
	<thead>
		<tr>
			<th>Lavoratore</th>
			<th>Diritto</th>
			<th>Stabi Repar</th>
			<th>rep2kd</th>
			<th>rep2ka</th>
			<th>qua2kd</th>
			<th>qua2ka</th>
			<th>dal</th>
			<th>al</th>
		</tr>
	</thead>
	@foreach($rows->get() as $row)
	<tr>
		<td>
			[{{ $row->id }}]<br/>
			{{ $row->ente }} {{ $row->matr }}<br/>
			{{ $row->cognome }} {{ $row->nome }}<br/>
		</td>
		<td>{{ $row->ha_diritto }}<br>{{ $row->motivo }}</td>
		<td>
			{{ $row->stabi }}] {{ $row->stabi_txt }}<br/>
			{{ $row->repar }}] {{ $row->repar_txt }}<br/>
		</td>
		<td>{{ $row->rep2kd }}</td>
		<td>{{ $row->rep2ka }}</td>
		<td>{{ $row->qua2kd }}</td>
		<td>{{ $row->qua2ka }}</td>
		<td>{{ $row->dal }}</td>
		<td>{{ $row->al }}</td>
	</tr>
	@endforeach
</table>

@endsection
