<div id="material_slips" class="card">
	<header class="card-header has-background-warning">
		<nav class="level">
			<div class="level-left">
				<div class="level-item">
		      		<p class="card-header-title">Material Slips</p>
		      		<a class="button is-small is-outlined" href="/receivings/grows/{{ $grow->id }}/create">Create</a>
		    	</div>
		  	</div>
		</nav>
  	</header>

  	<div class="card-content has-background-light">
  		<div class="content">
  			<table class="table is-narrow is-fullwidth is-bordered">
				<thead>
					<th>Date</th>
					<th>Farm</th>
					<th>Reference</th>
					<th>Weight</th>
					<th>Company Weight</th>
				</thead>

				<tbody>
					@foreach($material_slips as $x)
						<tr>
							<td>{{ $x->receiving->date }}</td>
							<td>{{ $x->receiving->farm->name }}</td>
							<td>Reference</td>
							<td>{{ $x->receiving->total_declared_weight() }}</td>
							<td>Company Weight</td>
						</tr>
					@endforeach
				</tbody>
					
			</table>
    	</div>
  	</div>
</div>