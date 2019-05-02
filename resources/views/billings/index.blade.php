@extends('master')

@section('page_title')
	<div class="level">
		<div class="level-left">
			<div class="level-item">
				<h2 class="title">Billings</h2>
			</div>

			<div class="level-item">
			 	<my-modal>
					@include('billings.create')
				</my-modal>
			</div>
		</div>

		<div class="level-right">
			{{-- <div class="level-item">Year </div> --}}
            <div class="level-item">
                <div class="select">
                	<select v-model="sel_year">
                		@foreach(range($latest_year, config('default.oldest_year'), -1) as $x)
	                    	<option>{{ $x }}</option>
	                    @endforeach
                  	</select>
                </div>
            </div>
		</div>
	</div>

@endsection

@section('content')

<table class="table is-bordered is-fullwidth is-narrow">
	<thead>
		<tr>
			<th>Biller</th>
			<th>Billing Type</th>
			<th>Start</th>
			<th>End</th>
			<th>Cost (PHP)</th>
		</tr>
	</thead>
	@foreach($billings as $billing)
	<tr>
		<td>{{ $billing->company->name }}</td>
		<td>{{ $billing->type }}</td>
		<td>{{ $billing->period_start }}</td>
		<td>{{ $billing->period_end }}</td>
		<td>{{ number_format($billing->amount, 2) }}</td>
	</tr>
	@endforeach
</table>

@endsection

@section('scripts')

	<script type="text/javascript">
		
		var app_body = new Vue({
		  el: '#app_body',
		  data: {
		  	sel_year: '{{ $selected_year }}',
		  	year_filter_href: '/billings?year=' + {{ $selected_year }},
		  },
		  watch: {
		  	sel_year: function(newVal, oldVal)
		  	{
		  		window.location.href = '/billings?year=' + newVal;
		  	}
		  }
		})

	</script>

@endsection