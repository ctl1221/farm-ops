@extends('master')

@section('content')

Payslips

<form method="POST" action="/payslips">
	@csrf
	
	<input type="hidden" name="payroll_id" value="{{ $payroll->id }}">
	<input type="text" name="reference" placeholder="reference no">
	<select name="employee_id">
		@foreach ($employees as $employee)
			<option value="{{ $employee->id }}">{{ $employee->last_name . ", " . $employee->first_name }}</option>
		@endforeach
	</select>
	<input type="text" name="days_absent" placeholder="no of days absent">
	<input type="submit" value="submit">
</form>

<table border="1">
	<thead>
		<th>Reference</th>
		<th>Name</th>
		<th>Days Absent</th>
		<th>Amount</th>
	</thead>

	<tbody>
		@foreach ($payroll->payslips as $x)
			<tr>
				<td>{{ $x->reference }}</td>
				<td>{{ $x->employee->last_name . ", " . $x->employee->first_name  }}</td>
				<td>{{ $x->days_absent }}</td>
				<td>{{ $x->amount }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

@endsection