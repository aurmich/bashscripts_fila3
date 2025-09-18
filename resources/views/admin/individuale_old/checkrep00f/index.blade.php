@extends('adm_theme::layouts.app')
@section('page_heading','check Rep00f')
@section('section')
<x-filament::badge> flash-message </x-filament::badge>


controllo {{ $anno }}
<h3>Mancanti</h3>
<table>
	<thead>
		<tr>
			<td>N</td>
			<td>ente-matr</td>
			<td>stabi-repar</td>
			<td>rep2kd</td>
			<td>rep2ka</td>
			<td></td>
		</tr>
	</thead>
@foreach($rows as $k=>$row)
	<tr>
		<td>{{ $k+1 }}</td>
		<td>{{ $row->ente }}-{{ $row->matr }}</td>
		<td>{{ $row->stabi }}-{{ $row->repar }}</td>
		<td>{{ $row->rep2kd }}</td>
		<td>{{ $row->rep2ka }}</td>
		<td>{!! Form::bsBtnEdit(['id_checkrep00f'=>$row->ente.'-'.$row->matr]) !!}</td>
	</tr>
@endforeach
</table>
<h3>Troppi Giorni</h3>
<table>
	<thead>
		<tr>
			<td>N</td>
			<td>ente-matr</td>
			<td>giorni</td>
			<td></td>
		</tr>
	</thead>
@foreach($rows1 as $k=>$row)
	<tr>
		<td>{{ $k+1 }}</td>
		<td>{{ $row->ente }}-{{ $row->matr }}</td>
		<td>{{ $row->giorni }}</td>
		<td>{!! Form::bsBtnEdit(['id_checkrep00f'=>$row->ente.'-'.$row->matr]) !!}</td>
	</tr>
@endforeach
</table>

@endsection
