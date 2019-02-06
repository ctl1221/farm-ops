@extends('master')

@section('content')

Payrolls

<table border="1">
	<thead>
		<th>Period Start</th>
		<th>Period End</th>
		<th>View</th>	
	</thead>

	<tbody>
		@foreach ($payrolls as $payroll)
		<tr>
			<td>{{ $payroll->period_start }}</td>
			<td>{{ $payroll->period_end }}</td>
			<td><a href="/payrolls/{{ $payroll->id }}">Details</a></td>
		</tr>
		@endforeach
	</tbody>
</table>

<form method="POST" action="/payrolls">
	@csrf

	<input type="date" name="period_start">
	<input type="date" name="period_end">
	<input type="submit" value="submit">
	
</form>

@endsection