<h3>Dettaglio Assenze</h3>
<table>
	<thead>
		<tr>
			<th>giorno dal</th>
			<th>giorno al</th>
			<th>ore dal</th>
			<th>ore al</th>
			<th>durata (da nemho)</th>
			<th>descr</th>
			<th>unita'</th>
			<th>durata GG<br/>(calcolata)</th>
			<th>durata HH<br/>(aszdur)<br/>ore e frazione ,50 = 30 minuti</th>
			<th>valido </th>
		</tr>
	</thead>
	@php
	$gg_tot=0;
	$hh_tot=0;
	@endphp
	@foreach($row->asz00k1 as $asz)
	<tr>
		<td>{{ $asz->asz2kd }}</td>
		<td>{{ $asz->asz2ka }}</td>
		<td>{{ $asz->aszini }}</td>
		<td>{{ $asz->aszfin }}</td>
		<td>{{ $asz->aszdur }}</td>
		<td>{{ $asz->asztip }}-{{ $asz->aszcod }}<br/>
			{{ $asz->aszdescr }}
		</td>
		<td>
			{{ $asz->aszumi }}
		</td>
		<td align="right">
			@php
			$gg=$asz->gg(['date_min'=>$row->dal,'date_max'=>$row->al]);
			$hh=$asz->hhDecimal(['date_min'=>$row->dal,'date_max'=>$row->al]);
			//$hh=$asz->hh(['date_min'=>$row->dal,'date_max'=>$row->al]);
			$is_in_assenze=$row->is_in_assenze(['tipo'=>$asz->asztip,'codice'=> $asz->aszcod ]);
			if($is_in_assenze){
			$gg_tot+=$gg;
			$hh_tot+=$hh;
			}
			@endphp
			{{ $gg }}
		</td>
		<td align="right">
			{{ $hh }}
		</td>
		<td align="center">
			@if($is_in_assenze)<i class="fa fa-check"></i>SI @endif
		</td>
	</tr>
	@endforeach
	<tr>
		<td colspan="7"><b>Tot</b></td>
		<td align="right"><b>{{ $gg_tot }}</b></td>
		<td align="right"><b>{{ $hh_tot }}</b></td>
		<td></td>
	</tr>
</table>