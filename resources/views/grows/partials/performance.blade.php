<div class="card">
	<header class="card-header has-background-primary">
    	<p class="card-header-title">Performance</p>
  	</header>

  	<div class="card-content">
  		<div class="content">

  			<table class="table is-bordered is-fullwidth">

  				<tr>
  					<th>Building</th>
  					<th>Days Recorded</th>
  					<th colspan="2">%HR</th>
  					<th colspan="2">ALW</th>
  					<th colspan="2">FCR</th>
  					<th colspan="2">BPI</th>
  				</tr>

  				@foreach($grow->farms as $t => $farm)
  					@foreach($farm->buildings as $i => $x)
	  				<tr>
	  					<td>
	  						{{ $x->name}}
	  					</td>
	  					<td>
	  						{{-- <span class="tag is-link"> --}}
	  							{{ $days_recorded[$t][$i] }}
	  						{{-- <span> --}}
	  					</td>
	  					<td>---</td>
	  					@if($i == 0)
	  						<td rowspan="2">---</td>
	  					@endif
	  					<td>---</td>
	  					@if($i == 0)
	  						<td rowspan="2">---</td>
	  					@endif
	  					<td>---</td>
	  					@if($i == 0)
	  						<td rowspan="2">---</td>
	  					@endif
	  					<td>---</td>
	  					@if($i == 0)
	  						<td rowspan="2">---</td>
	  					@endif
	  				</tr>
  					@endforeach
  				@endforeach
  			</table>

    	</div>
  	</div>
</div>
