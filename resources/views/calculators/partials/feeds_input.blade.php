<section class="section" style="padding-top:1rem; padding-bottom:0rem;">
	<h4 class="subtitle is-4 has-text-centered has-background-info" style="padding: 0.5rem; margin-bottom: 0rem">Inputted Data</h4>
	<table class="table is-bordered is-fullwidth is-narrow" style="padding: 0rem; margin: 0rem">
		<thead>
			<tr>
				<td></td>
				<th class="has-text-centered" v-for="farm in farms">@{{ farm }}</th>
			</tr>
		</thead>
		<tbody>
			<tr>
		    	<th class="has-text-right" style="vertical-align: middle">Birds Harvested</th>
		        <td v-for="(farm, index) in farms">
		        	<input class="input" v-model="birds_harvested[index]" type="text">
		        </td>
			</tr>
			<tr>
		    	<th class="has-text-right" style="vertical-align: middle">Quantity Started</th>
		        <td v-for="(farm, index) in farms">
		        	<input class="input" v-model="quantity_started[index]" type="text">
		        </td>
			</tr>

			<tr>
		    	<th class="has-text-right" style="vertical-align: middle">Age</th>
		        <td v-for="(farm, index) in farms">
		        	<input class="input" v-model="age[index]" type="text">
		        </td>
			</tr>

	    	<th class="has-text-right" style="vertical-align: middle">Average Live Weight (ALW)</th>
		        <td v-for="(farm, index) in farms">
		        	<input class="input" v-model="alw[index]" type="text">
		        </td>
			</tr>

	    	<th class="has-text-right" style="vertical-align: middle">Harvest Recovery (HR)</th>
		        <td v-for="(farm, index) in farms">
		        	<input class="input" v-model="hr[index]" type="text">
		        </td>
			</tr>

		</tbody>
	</table>
</section>