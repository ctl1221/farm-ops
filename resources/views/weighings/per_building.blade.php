@extends('master')

@section('content')

	Per pen ALW here

	<table border="1" >
		<thead>
			<tr>
				<th>Day</th>
				<th>Weigh No</th>
				<th>Pen 1</th>
				<th>Pen 2</th>
				<th>Pen 3</th>
				<th>Pen 4</th>
				<th>Pen 5</th>
				<th>Pen 6</th>
				<th>Pen 7</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($current_days as $x)
				<tr>
					<td rowspan="{{ $x->weighings->count() + 1 }}">{{ $x->day }}</td>
					@foreach($x->weighings as $y)
						<tr>
						<td>{{ $y->weigh_no }}</td>
						@foreach($y->pen_weighings as $z)
							<td>
								<form method="POST" action="/penWeighings/{{ $z->id }}">
									@csrf
									@method('patch')
									<input type="text" name="weight" value="{{ $z->weight }}">
									<input type="submit" value="U">
								</form>	
							</td>
						@endforeach
						</tr>
					@endforeach
				</tr>
			@endforeach 
		</tbody>
	</table>

@endsection