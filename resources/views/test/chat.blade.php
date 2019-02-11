@extends('master')

@section('content')

<form method="post" action="http://10.238.10.20:5000/webapi/entry.cgi?api=SYNO.Chat.External&method=incoming&version=2&token=%22HuBcPtmcPoYdscXJLyUanfiTGUdcyrgWj8YR4vMZ1G3A3tykHWhkcuD6hz7M1uJf%22" enctype="application/x-www-form-urlencoded">
	<input type="hidden" name="payload" value='{"text":"charles stephen"}'>
	<input type="submit">
</form>

@endsection