@extends('master')

@section('breadcrumb')

<nav class="level">
	<div class="level-left">
		<div class="level-item">
			<nav class="breadcrumb" aria-label="breadcrumbs" style="margin-top: 0.5rem">
				<ul>
					<li><a href="/grows"><h3 class="title is-3 has-text-link">Grows</h3></a></li>
					<li>
						<a href="/grows/{{$farm->grow->id}}#records">
							<h3 class="title is-3 has-text-link">{{ $farm->grow->cycle}}</h3>
						</a>
					</li>
					<li class="is-active"><a><h3 class="title is-3">{{ $farm->name }}</h3></a></li>
					<li class="is-active"><a><h3 class="title is-3">Invoices</h3></a></li>
				</ul>
			</nav>
		</div>
	</div>

	<!-- Right side -->
	<div class="level-right">
		<h4 class="subtitle is-4 level-item">
		</h4>
	</div>
</nav>


</h3>

@endsection

@section('content')

<table class="table is-narrow is-fullwidth is-bordered is-striped">
	<thead>
		<th>Date</th>
		<th>Reference</th>
		<th>Amount</th>
		<th>Description</th>
		<th>Quantity</th>
		<th>Price</th>
	</thead>

	<tbody>
		@foreach ($farm->invoices as $invoice)
		<tr>
			<td rowspan="{{$invoice->invoice_lines->count()}}">{{ $invoice->date }}</td>
			<td rowspan="{{$invoice->invoice_lines->count()}}">{{ $invoice->supplier_invoice_no }}</td>
			<td rowspan="{{$invoice->invoice_lines->count()}}">{{ $invoice->total_invoice_amount() }}</td>

			@foreach($invoice->invoice_lines as $i => $x)
				<td>{{ $x->material->description}}</td>
				<td>{{ $x->quantity}}</td>
				<td>{{ $x->price}}</td>	
				</tr>
			@endforeach
		@endforeach
		</tbody>

	</table>

	@endsection

	@section('scripts')

	<script type="text/javascript">
		
		var app = new Vue({
			el: '#app_body',
			data: {}

		});

	</script>

	@endsection