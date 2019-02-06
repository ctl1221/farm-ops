@extends('master')

@section('content')

	Per pen mortality here

	<table border="1" >
		<thead>
			<tr>
				<th></th>
				<th colspan="7">A.M.</th>
				<th colspan="7">P.M.</th>
				<th></th>
			</tr>
			<tr>
				<th>Day</th>
				<th>Pen 1</th>
				<th>Pen 2</th>
				<th>Pen 3</th>
				<th>Pen 4</th>
				<th>Pen 5</th>
				<th>Pen 6</th>
				<th>Pen 7</th>
				<th>Pen 1</th>
				<th>Pen 2</th>
				<th>Pen 3</th>
				<th>Pen 4</th>
				<th>Pen 5</th>
				<th>Pen 6</th>
				<th>Pen 7</th>
				<th>Subtotal</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($current_days as $x)
				<tr>
					<td>{{ $x->day }}</td>
					@php
						$current_total = 0;
						$current_pens_mortalities = $x->mortalities->pluck('quantity');
					@endphp

					@foreach($x->mortalities as $y)
						<td>
							<form method="POST" action="/mortalities/{{ $y->id }}">
								@csrf
								@method('patch')
								<input type="test" name="quantity" value="{{ $y->quantity }}">
								<input type="submit" value="U">
							</form>
						</td>
						@php
							$current_total += $y->quantity;
						@endphp
					@endforeach
					<td>{{ $current_total }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection