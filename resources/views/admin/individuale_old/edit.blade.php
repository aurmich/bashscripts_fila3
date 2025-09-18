@if(Carbon\Carbon::now()>Carbon\Carbon::parse('2019-04-12'))
	TEMPO SCADUTO
@else
	@include($view.'_'.$row->anno)
@endif
