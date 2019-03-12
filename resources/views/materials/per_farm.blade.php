@extends('master')

@section('breadcrumb')

	<nav class="level">
		<div class="level-left">
		    <div class="level-item">
				<nav class="breadcrumb" aria-label="breadcrumbs" style="margin-top: 0.5rem">
				  <ul>
				    <li><a href="/grows"><h3 class="title is-3 has-text-link">Grows</h3></a></li>
				    <li><a href="/grows/{{ $farm->grow->id }}#records"><h3 class="title is-3 has-text-link">{{ $farm->grow->cycle }}</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">{{ $farm->name }}</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">Materials Received</h3></a></li>
				  </ul>
				</nav>
			</div>
	  	</div>

	  <!-- Right side -->
		<div class="level-right">
	    	{{-- {{  $farm->loadings->sum('net_received') - $farm->buildings->sum('pivot.birds_started') }} --}}</h4>

	  	</div>
	</nav>

@endsection

@section('content')
	
	@foreach ($material_types as $material_type)

		<h4 class="subtitle is-4"><u>{{ $material_type }}s</u></h4>

		<table class="table is-bordered is-narrow is-fullwidth is-striped">
			<thead class="has-background-light">
				<tr>
					<td><strong>Reference</strong></td>
					<td><strong>Material Code</strong></td>
					<td><strong>Medicine Name</strong></td>
					<td><strong>UOM</strong></td>
					<td><strong>Quantity</strong></td>
				</tr>
			</thead>

			<tbody>
				@foreach ($all_materials_received as $x)
					@if($x['material_type'] == "App\\" . $material_type)
						<tr>
							@if(array_key_exists('receiving', $x))
								<td style="width:20%">
									<span class="tag is-warning">
										Material Slip
									</span>
									{{ $x['receiving']['doc_no']}}
								</td>
							@else
								<td style="width:20%">
									<span class="tag is-danger">
										Invoice
									</span>
									{{ $x['invoice']['supplier_invoice_no']}}
								</td>
							@endif
							<td style="width:20%">{{ $x['material']['code'] }}</td>
							<td style="width:40%">{{ $x['material']['description'] }}</td>
							<td style="width:10%">{{ $x['material']['uom'] }}</td>
							<td style="width:10%">{{ $x['quantity'] }}</td>
						</tr>
					@endif
				@endforeach
			</tbody>
		</table>

	@endforeach

@endsection

@section('scripts')

	<script type="text/javascript">
		
		var app = new Vue({
			el: '#app_body',
			data: {}
				
		});

	</script>

@endsection