@extends('master')

@section('content')

Electricity Billing

<form method="POST" action='/utilityBills'>
	@csrf

	<input type="date" name="period_start">
	<input type="date" name="period_end">
	<select name="supplier_id">
		@foreach($suppliers as $supplier)
			<option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
		@endforeach
	</select>
	<input type="text" name="kwh" placeholder="kwh">
	<input type="text" name="amount" placeholder="amount">
	<input type="submit" value="submit">
</form>

@endsection