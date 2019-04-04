@extends('master')

@section('page_title')
	<div class="level">
		<div class="level-left">
			<div class="level-item">
				<h2 class="title">Grow Cycles</h2>
			</div>

			<div class="level-item">
			 	<my-modal>
					@include('grows.create')
				</my-modal>
			</div>
		</div>

		<div class="level-right">
			{{-- <div class="level-item">Year </div> --}}
            <div class="level-item">
                <div class="select">
                	<select>
	                    <option>2019</option>
	                    <option>2018</option>
                  	</select>
                </div>
            </div>
		</div>
	</div>

@endsection

@section('content')

	<table class="table is-bordered is-striped">
		<thead>
			<th>Cycle</th>
			<th>Start</th>
			<th>End</th>
			<th>Status</th>
		</thead>
			@foreach($grows as $grow)
				<tr>
					<td><a href="/grows/{{ $grow->id }}">{{ $grow->cycle }}</a></td>
					<td>{{ $grow->date_start }}</td>
					<td>{{ $grow->date_end }}</td>
					<td>{{ $grow->is_complete ? 'Complete' : 'Open' }}</td>
				</tr>
			@endforeach
	</table>

@endsection

@section('scripts')

	<script type="text/javascript">
		
		var app_body = new Vue({
		  el: '#app_body',
		})

	</script>

@endsection