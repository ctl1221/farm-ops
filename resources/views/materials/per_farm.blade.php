@extends('master')

@section('content')
	
	@foreach ($material_types as $material_type)

		<h4 class="subtitle is-4">{{ $material_type }}</h4>

		<table class="table is-bordered is-narrow is-fullwidth is-striped">
			<thead class="has-background-light">
				<tr>
					<td><strong>Material Code</strong></td>
					<td><strong>Medicine Name</strong></td>
					<td><strong>UOM</strong></td>
					<td><strong>Quantity</strong></td>
				</tr>
			</thead>

			<tbody>
				@foreach ($list_of_medicines_delivered as $x)
					@if($x->material_type == "App\\" . $material_type)
						<tr>
							<td>{{ $x->material->code }}</td>
							<td>{{ $x->material->description }}</td>
							<td>{{ $x->material->uom }}</td>
							<td>{{ $x->quantity }}</td>
						</tr>
					@endif
				@endforeach
			</tbody>
		</table>

	@endforeach

@endsection