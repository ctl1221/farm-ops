<div class="card">
	<header class="card-header has-background-success">
    	<p class="card-header-title">Sales</p>
  	</header>

  	<div class="card-content has-background-light">
  		<div class="content" style="padding-bottom: 1.25rem">
  			<table>
  				<thead>
  					<tr>
  						<th>Farm Designation</th>
  						<th>Link</th>
  					</tr>
  				</thead>

  				<tbody>
  					@foreach ($grow->farms as $x)
  						<tr>
  							<td>{{ $x->name }}</td>
  							<td><a href="/sales/{{ $x->id }}/create">View</a></td>
  						</tr>
  					@endforeach
  				</tbody>
  			</table>

    	</div>
  	</div>
</div>