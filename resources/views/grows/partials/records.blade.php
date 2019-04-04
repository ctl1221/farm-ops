<div class="card" id="records">
	<header class="card-header has-background-warning">
    	<p class="card-header-title">Records</p>
  	</header>

  	<div class="card-content has-background-light">
  		<div class="content">
  			<table class="table is-narrow is-fullwidth is-bordered">
				<thead>
					<th>Farm Designation</th>

					<th class="has-text-centered">
						<i class="fas fa-crow"></i>
						<i class="fas fa-arrow-right"></i>
						<i class="fas fa-home"></i>
					</th>

					<th class="has-text-centered"><i class="fas fa-book"></i></th>

					<th class="has-text-centered">
						<i class="fas fa-cookie"></i>
						<i class="fas fa-prescription-bottle-alt"></i>
						<i class="fas fa-spray-can"></i>
					</th>

					<th class="has-text-centered">
						<i class="fas fa-home"></i>
						<i class="fas fa-arrow-right"></i>
						<i class="fas fa-crow"></i>
					</th>

					<th class="has-text-centered">
						<i class="fab fa-earlybirds"></i>
						<i class="fas fa-arrow-right"></i>
						<i class="fas fa-drumstick-bite"></i>
					</th>
					
					<th class="has-text-centered"><i class="fas fa-file-invoice"></i></th>

					<th class="has-text-centered"><i class="fas fa-file-invoice-dollar"></i></th>

					@canAtLeast(['sales_record.view'])
						<th class="has-text-centered"><i class="fas fa-money-check-alt"></i></th>
					@endCanAtLeast

				</thead>

				<tbody>
					<tr v-for="(farm, farm_index) in farms">
						<td>@{{ farm.name }}</td>	
						<td class="has-text-centered"><a :href="'/loadings/farms/' + farm.id">View</a></td>
						<td class="has-text-centered"><a :href="'/days/farms/' + farm.id">View</a></td>
						<td class="has-text-centered"><a :href="'/materials/farms/' + farm.id">View</a></td>
						<td class="has-text-centered"><a :href="'/harvests/farms/' + farm.id">View</a></td>
						<td class="has-text-centered"><a :href="'/deliveries/farms/' + farm.id">View</a></td>
						<td class="has-text-centered"><a :href="'/receivings/farms/' + farm.id">View</a></td>
						<td class="has-text-centered"><a :href="'/invoices/farms/' + farm.id">View</a></td>
						@canAtLeast(['sales_record.view'])
						<td class="has-text-centered">
							@canAtLeast(['sales_record.create'])
							<a :href="'/sales/' + farm.id + '/create'" v-if="! farm.sales">Create SM Liquidation</a>&nbsp;
							@canAtLeast(['sales_record.create'])
							<a :href="'/sales/' + farm.id + '/compare'" v-if="farm.sales">Compare</a>&nbsp;
							<a :href="'/sales/' + farm.id + '/view_ops'">View 8Star</a>&nbsp;
						</td>
						@endCanAtLeast
					</tr>
				</tbody>
			</table>
    	</div>
  	</div>
</div>
