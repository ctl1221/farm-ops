@extends('master')

@section('breadcrumb')

<nav class="level">
	<div class="level-left">
		<div class="level-item">
			<nav class="breadcrumb" aria-label="breadcrumbs" style="margin-top: 0.5rem">
				<ul>
					<li><a href="/grows"><h3 class="title is-3 has-text-link">Grows</h3></a></li>
					<li><a href="/grows/{{ $farm->grow->id}}#records"><h3 class="title is-3 has-text-link">{{ $farm->grow->cycle }}</h3></a></li>
					<li class="is-active"><a><h3 class="title is-3">{{ $farm->name }}</h3></a></li>
					<li class="is-active"><a><h3 class="title is-3">Loadings</h3></a></li>
				</ul>
			</nav>
		</div>
	</div>

	<!-- Right side -->
	<div class="level-right">
		<div class="level-item">
		</div>
	</div>
</nav>

@endsection

@section('content')

<div class="box has-background-light">
	<table class="table is-bordered is-narrow is-fullwidth">
		<thead>
			<tr>
				<th>Date</th>
				<th>Hatchery Source</th>
				<th>Net Received</th>
				<th>Truck Plate No.</th>
				<th>Seal No.</th>
				<th>Notes</th>
			</tr>
		</thead>

		<tbody>
			@foreach($loadings as $loading)
			<tr>
				<td>{{ $loading->date_dep_hatchery . ' - ' . $loading->time_arr_farm }}</td>
				<td>{{ $loading->hatchery_source }}</td>
				<td>{{ $loading->net_delivered }}</td>
				<td>{{ $loading->truck_plate_no }}</td>
				<td>{{ $loading->doa_delivered }}</td>
				<td>{!! $loading->notes !!}</span></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<header>
	<h4 class="title is-size-4 has-text-centered has-text-primary" style="padding-top:2rem; padding-bottom: 0.5rem">
		Create New Loading
	</h4>
</header>
<div class="box has-background-light">
	
	@include('loadings.create')

</div>

@endsection

@section('scripts')

<script type="text/javascript">

	var app = new Vue({
		el: '#app_body',

		data: {
			total_delivered:0,
			doa_delivered:0,
			hatchery_source:'',
		},

		computed: {
			net_delivered: function () {
				return this.total_delivered - this.doa_delivered;
			}
		}
	});

</script>

@endsection