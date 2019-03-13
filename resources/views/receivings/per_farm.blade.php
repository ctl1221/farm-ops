@extends('master')

@section('breadcrumb')

<nav class="level">
	<div class="level-left">
		<div class="level-item">
			<nav class="breadcrumb" aria-label="breadcrumbs" style="margin-top: 0.5rem">
				<ul>
					<li><a href="/grows"><h3 class="title is-3 has-text-link">Grows</h3></a></li>
					<li>
						<a href="/grows/{{$farm->grow->id}}#records">
							<h3 class="title is-3 has-text-link">{{ $farm->grow->cycle}}</h3>
						</a>
					</li>
					<li class="is-active"><a><h3 class="title is-3">{{ $farm->name }}</h3></a></li>
					<li class="is-active"><a><h3 class="title is-3">Material Slips</h3></a></li>
				</ul>
			</nav>
		</div>
	</div>

	<!-- Right side -->
	<div class="level-right">
		<h4 class="subtitle is-4 level-item">
			<a class="button is-small is-outlined" href="/receivings/grows/{{ $farm->grow->id }}/create">Create</a>
		</h4>
	</div>
</nav>


</h3>

@endsection

@section('content')

	<receivings :farm="{{ $farm }}"></receivings>

@endsection

@section('scripts')

<script type="text/javascript">

	var app = new Vue({
		el: '#app_body',
		data: {}

	});

</script>

@endsection