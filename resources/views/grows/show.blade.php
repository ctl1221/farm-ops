@extends('master')

@section('breadcrumb')

	

@endsection

@section('content')

<h1>{{ $grow->cycle }}</h1>
<h1>Duration : {{ $period_start }} to {{ $period_end }} ({{ Carbon\Carbon::parse($period_end)->diffInDays(Carbon\Carbon::parse($period_start)) + 1 }} Days)</h1>

@include('grows.partials.sales_summary')

@include('grows.partials.expenses_summary')

@include('grows.partials.records')

@include('grows.partials.invoices')

@include('grows.partials.employee_assignments')

@include('grows.partials.building_assignments')

<br/>

<form method="POST" action='/grows/createFarm'>
	@csrf

	<input type="text" name="name" placeholder="Farm Designation">
	<input type="hidden" name="grow_id" value="{{ $grow->id }}">
	<input type="submit" value="submit">
</form>

@endsection