@extends('adm_theme::layouts.app')
@section('page_heading','Performance stabi repar anno')
@section('section')
<x-filament::badge> flash-message </x-filament::badge>


@php
	//$route=performance.stabi_repar_anno_individuale.index
	$firma=null;
	if(isset($rows[0]) ) {
		$firma=$rows[0]->stabiDirigente()->first();
	}
@endphp

@if($firma!=null)


{{ Form::model($firma, ['route' => ['performance.individuale.firma.update', 'id_firma'=>$firma->id ] ]) }}
{{ csrf_field() }}
{{ method_field('PUT') }}
{{ Form::bsText('nome_stabi') }}
{{ Form::bsText('nome_diri') }}
{{Form::submit('modifica firma',['class'=>'submit btn btn-success green-meadow'])}}
{{ Form::close() }}

<hr/>

@endif


<a class="btn btn-small btn-info"  data-toggle="tooltip" title="Torna alla ricerca" href="{{  route('performance.individuale.searchStabiReparAnno') }}"><i class="fa fa-step-backward fa-fw" aria-hidden="true"></i>&nbsp;</a>

<a class="btn btn-small btn-default" data-toggle="tooltip" title="Crea XLS" href="{{  route('performance.stabi_repar_anno_individuale.xls',$params) }}"><i class="fa fa-file-excel-o fa-fw" aria-hidden="true"></i>&nbsp;</a>

<a class="btn btn-small btn-default" data-toggle="tooltip" title="Crea ZIP delle schede pdf" href="{{  route('performance.stabi_repar_anno_individuale.pdf',$params) }}"><i class="fa fa-file-archive-o fa-fw" aria-hidden="true"></i>&nbsp;</a>

<a class="btn btn-small btn-default" data-toggle="tooltip" title="Crea pdf valutazione Stabi/repar" href="{{  route('performance.stabi_repar_anno_individuale.stabi_pdf',$params) }}"><i class="fa fa-file-pdf-o fa-fw" aria-hidden="true"></i>&nbsp;</a>

<a class="btn btn-small btn-default" data-toggle="tooltip" title="Filtro invia Mail" href="{{  route('performance.stabi_repar_anno_individuale.filtersendmail',$params) }}">
<i class="fa fa-paper-plane-o fa-fw" aria-hidden="true"></i>&nbsp;</a>


<table class="table table-striped table-bordered">
<thead>
	<tr>
		<td>lavoratore</td>
		<td>categoria eco</td>
		<td>ha diritto?</td>
		<td>valutazione/pesi</td>
		<td></td>
	</tr>
</thead>
<tbody>
@foreach($rows as $k => $v)
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
	{!! Form::bsBtnRoute(['from'=>'index','to'=>'rowpdf','icons'=>'fa fa-file-pdf-o','extra'=>['id_individuale'=>$v->id]]) !!}

	{!! Form::bsBtnRoute(['from'=>'index','to'=>'sendmail','icons'=>'fa fa-paper-plane-o','extra'=>['id_individuale'=>$v->id]]) !!}
	@endif
	</td>
	@else
	<td colspan="3">
	NO
	<br/>{{ $v->motivo }}
	</td>
	@endif
</tr>
@endforeach
</tbody>
</table>
{{ $rows->links() }}

@endsection
