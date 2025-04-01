<h3>Dettaglio Qua00f</h3>
<table>

	<thead>
		<tr>
			<th>posiz</th>
			<th>qualifica</th>
			<th>oree</th>
			<th>oret</th>
			<th>dal</th>
			<th>al</th>
			<th>giorni</th>
		</tr>
	</thead>

	@php
	$gg_tot=0;
	$hh_tot=0;
	@endphp
	@foreach($row->qua00f as $qua)
	<tr>
		{{--
		<td>{{ $qua->ente }} {{ $qua->matr }}</td>
		--}}
		<td>{{ $qua->posiz }}] {{ $qua->posiz_txt }}</td>
		<td>{{ $qua->propro }} {{ $qua->posfun }}</td>
		<td>{{ $qua->oree }}</td>
		<td>{{ $qua->oret }}</td>
		<td>{{ $qua->qua2kd }}</td>
		<td>{{ $qua->qua2ka }}</td>
		<td>{{ $qua->giorni }}</td>
	</tr>
	@endforeach
</table>