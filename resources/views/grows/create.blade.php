@extends('master')

@section('content')

Create cycles here

<form method="POST" action='/grows'>
	@csrf

	<input type="text" name="cycle" placeholder="cycle number">
	<input type="submit">
</form>

@endsection