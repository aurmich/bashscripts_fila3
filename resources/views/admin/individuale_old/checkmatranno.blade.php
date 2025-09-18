@extends('adm_theme::layouts.app')
@section('page_heading','Controlla Matr')
@section('section')
<x-filament::badge> flash-message </x-filament::badge>

<table>
	<tr>
		<td>
			<h3>Record</h3>
			<table>
				{{-- dd($rows->get()) --}}
				@foreach($rows->get() as $row)
				<tr>
					<td>{{ $row->id }}</td>
					<td>
						{{ $row->ente }}-{{ $row->matr }}<br/>
						{{ $row->cognome }}-{{ $row->nome }}<br/>
						email :{{ $row->email }}<br/>
						disci: {{ $row->disci }} {{ $row->disci_txt }}<br/>
						ha_diritto: @if($row->ha_diritto)
						<span style="color:green"><i class="glyphicon glyphicon-ok"></i>&nbsp;Si</span>
						@else
						<span style="color:red"><i class="glyphicon glyphicon-remove"></i>&nbsp;NO</span>
						@endif
						{{ $row->motivo }}
					</td>
					<td>
						{{ $row->stabi }}] {{ $row->stabi_txt }} <br/>
						{{ $row->repar }}] {{ $row->repar_txt }} <br/>
					</td>
					<td>
						{{ $row->propro }}-{{ $row->posfun }}<br/>
						{{ $row->categoria_eco }}<br/>
					</td>
					<td>{{ $row->dal }}</td>
					<td>{{ $row->al }}</td>
					<td>
						<table>
							<tr>
								<td>gg_tempo_determinato :</td>
								<td>{{ $row->gg_tempo_determinato }}</td>
							</tr>
							<tr>
								<td>gg_posiz_1_in_sede :</td>
								<td>{{ $row->gg_posiz_1_in_sede }}</td>
							</tr>
							<tr>
								<td>gg_assenza_anno :</td>
								<td>{{ $row->gg_assenza_anno }}</td>
							</tr>
							<tr>
								<td>ore_assenza :</td>
								<td>{{ $row->ore_assenza }}[ore e frazione ,50 = 30 minuti]
									{{round($row->ore_assenza_anno/7.2,2) }} [giornate e frazione]
								</td>
							</tr>
							<tr>
								<td>gg_presenza_anno :</td>
								<td>{{ $row->gg_presenza_anno }}</td>
							</tr>
							<tr>
								<td>decurtazione percentuale :</td>
								<td>{{ $row->decurtazione_perc }}</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			@include($view.'.qua00f')
		</td>
	</tr>
	<tr>
		<td>
			@include($view.'.sto00f')
		</td>
	</tr>
	<tr>
		<td>
			@include($view.'.asz00k1')
		</td>
	</tr>
	@endforeach
</table>
@endsection
