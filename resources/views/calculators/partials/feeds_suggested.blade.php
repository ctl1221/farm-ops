<section class="section" style="padding-top:1rem; padding-bottom:0rem;">
	<h4 class="subtitle is-4 has-text-centered has-background-warning" style="padding: 0.5rem; margin-top: 0.5rem; margin-bottom: 0rem">Suggested Data</h4>
	<table class="table is-bordered is-fullwidth is-narrow" style="padding: 0rem; margin: 0rem">
		<thead>
			<tr>
				<td></td>
				<th class="has-text-centered" v-for="farm in farms">@{{ farm }}</th>
			</tr>
		</thead>
		<tbody>
		    <tr>
		    	<th :colspan="n_farms + 1" class="has-text-centered has-background-light">Variables</th>
		    </tr>
		    	<th class="has-text-right" style="vertical-align: middle">Feeds Conversion Ratio (FCR)</th>
		        <td v-for="(farm, index) in farms">
		        	<input class="input" v-model="fcr[index]" type="text">
		        </td>
			</tr>

	    	<th class="has-text-right" style="vertical-align: middle">Broiler Production Index (BPI)</th>
		        <td v-for="(farm, index) in farms">
		        	<input class="input" v-model="bpi[index]" type="text">
		        </td>
			</tr>

			<th class="has-text-right" style="vertical-align: middle">Feeds Consumed</th>
		        <td v-for="(farm, index) in farms">
		        	<input class="input" v-model="feeds_consumed[index]" type="text">
		        </td>
			</tr>

			<tr>
		    	<th class="has-text-right">Total Feeds Consumed</th>
		    	<td class="has-text-centered" :colspan="n_farms + 1">@{{ total_feeds_consumed}}</td>
		    </tr>

		    <tr>
		    	<th :colspan="n_farms + 1" class="has-text-centered has-background-light">Rates</th>
		    </tr>

		    <tr>
		    	<th class="has-text-right" style="vertical-align: middle">HR Rates</th>
		        <td v-for="(farm, index) in farms">
		        	<input class="input" v-model="hr_grow_rates[index]" type="text">
		        </td>
			</tr>
			<tr>
		    	<th class="has-text-right" style="vertical-align: middle">FCR Rates</th>
		        <td v-for="(farm, index) in farms">
		        	<input class="input" v-model="fcr_grow_rates[index]" type="text">
		        </td>
			</tr>

			<tr>
		    	<th class="has-text-right" style="vertical-align: middle">FCRi Rates</th>
		        <td v-for="(farm, index) in farms">
		        	<input class="input" v-model="fcri_grow_rates[index]" type="text">
		        </td>
			</tr>

	    	<th class="has-text-right" style="vertical-align: middle">BPI Rates</th>
		        <td v-for="(farm, index) in farms">
		        	<input class="input" v-model="bpi_grow_rates[index]" type="text">
		        </td>
			</tr>

		    <tr>
		    	<th :colspan="n_farms + 1" class="has-text-centered has-background-light">Result</th>
		    </tr>

		    <tr>
		    	<th class="has-text-right">Income</th>
		    	<th :colspan="n_farms" class="has-text-centered">---</th>
		    </tr>

		    <tr>
		    	<th class="has-text-right">ALW Incentives</th>
		    	<th :colspan="n_farms" class="has-text-centered">---</th>
		    </tr>

		    <tr>
		    	<th class="has-text-right">Total Income</th>
		    	<th :colspan="n_farms" class="has-text-centered">---</th>
		    </tr>
		</tbody>
	</table>
</section>