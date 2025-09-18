<tr>
	<td>[<a href="#{{ $v->id }}" id="{{ $v->id }}">{{ $v->id }}</a>]
		<br/>{{ $v->ente }}-{{ $v->matr }}
		<br/>{{ $v->cognome }}&nbsp;{{ $v->nome }}
		<br/>{{ $v->email }}
	</td>
	<td>
		{{ $v->propro }}-{{ $v->posfun }}
		<br/>{{ $v->categoria_eco }}
	</td>
	<td>
		-- stabi repar --<br/>
		{{ $v->stabi }}] {{ $v->stabi_txt }}<br/>
		{{ $v->repar }}] {{ $v->repar_txt }}<br/>
		<br/>
		-- stabi repar val--<br/>
		{{ $v->stabival }} {{ $v->reparval }}<br/>
		Dal-Al: {{ $v->dal }} - {{ $v->al }}
	</td>
	@if($v->ha_diritto)
	<td>
		SI
	</td>
	<td>
	@if (session('status_'.$v->id))
    <div class="alert alert-success">
        {{ session('status_'.$v->id) }}
    </div>
	@endif
		<table class="table table-striped table-bordered">
			<thead>
			<tr><th>criterio</th><th>valutazione</th><th>peso</th></tr>
			</thead>
			@foreach($v->CriteriValutazione() as $vc)
				@php
					$sk=$vc->nome;
					$skp='peso_'.$sk;
				@endphp
			<tr>
				<td>{{ __('performance.'.$sk) }}</td>
				<td align="right">{{ $v->$sk }}</td>
				<td align="right">{{ $v->$skp }}</td>
			</tr>
			@endforeach
			<tr><th>totale </th><th colspan="2" style="text-align:center" >{{ $v->totale_punteggio }}</th></tr>
		</table>
	</td>
	<td>
	{!! Form::bsBtnEdit(['id_individuale'=>$v->id]) !!}
	@if($v->totale_punteggio!="")
	{{--
	{!! Form::bsBtnRoute(['from'=>'index','to'=>'rowpdf','icons'=>'fa fa-file-pdf-o','extra'=>['id_individuale'=>$v->id]]) !!}
	{!! Form::bsBtnRoute(['from'=>'index','to'=>'sendmail','icons'=>'fa fa-paper-plane-o','extra'=>['id_individuale'=>$v->id]]) !!}
	--}}
	@endif
	</td>
	@else
	<td colspan="3">
	NO
	<br/>{{ $v->motivo }}
	</td>
	@endif
</tr>