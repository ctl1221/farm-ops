@extends('master')

@section('breadcrumb')

	<nav class="breadcrumb" aria-label="breadcrumbs">
	  <ul>
	    <li><a href="/grows">Grows</a></li>
	    <li class="is-active"><a href="#" aria-current="page">{{ $grow->cycle}}</a></li>
	  </ul>
	</nav>

@endsection

@section('page_title')

	<h3 class="title">{{ $grow->cycle }}</h2>

@endsection


@section('content')

<h1>Duration : {{ $period_start }} to {{ $period_end }} ({{ Carbon\Carbon::parse($period_end)->diffInDays(Carbon\Carbon::parse($period_start)) + 1 }} Days)</h1>

<br/>

@include('grows.partials.sales_summary')

<br/>

@include('grows.partials.expenses_summary')

<br/>

@include('grows.partials.records')

<br/>

@include('grows.partials.invoices')

<br/>

@include('grows.partials.employee_assignments')

<br/>

@include('grows.partials.building_assignments')
<form method="POST" action='/grows/createFarm'>
	@csrf

	<input type="text" name="name" placeholder="Farm Designation">
	<input type="hidden" name="grow_id" value="{{ $grow->id }}">
	<input type="submit" value="submit">
</form>

@endsection