<br/><br/><br/>
<table style="width:100%;">
	<tr>
		<td style="width:33%;font-size:12pt;">Data
		{{--
		@if($row->updated_at!=null)
		<br/> {{ $row->updated_at->format('d/m/Y') }}
		@else
		<br/> {{ \Carbon\Carbon::now()->format('d/m/Y') }}
		@endif
		--}}
		<br/>{{ trans('progressioni::MaxCatecoPosfunAnno.data_firma') }}
		</td>

		<td style="width:66%;font-size:12pt;">IL DIRIGENTE DI SETTORE
		<br/><b>{{-- $row->stabiDirigente->nome_diri --}}{{ trans('progressioni::MaxCatecoPosfunAnno.nome_diri') }}</b>
		<br/>_____________________________</td>
	</tr>
</table>