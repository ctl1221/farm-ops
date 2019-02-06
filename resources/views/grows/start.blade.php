@extends('master')

@section('content')

Start a New Grow Here

<form method="POST" action="/grows/start">
@csrf
	<input type="text" name="cycle" placeholder="cycle number">
	<button type="submit">Submit</button>	
</form>

@endsection