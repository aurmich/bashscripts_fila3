<h3>Dettaglio Sto00f</h3>
<table>

	<thead>
		<tr>
			<th>assunzione</th>
			<th>dimissioni</th>
			<th>giorni</th>

		</tr>
	</thead>

	@php

	@endphp
	@foreach($row->sto00f as $sto)
	<tr>
		{{--
		<td>{{ $sto->ente }} {{ $sto->matr }}</td>
		--}}

		<td>{{ $sto->dal }}</td>
		<td>{{ $sto->al }}</td>
		<td>{{ $sto->giorni }}</td>

	</tr>
	@endforeach
</table>