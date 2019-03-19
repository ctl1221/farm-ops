<table class="table is-bordered is-fullwidth is-narrow">
	<tr>
		<th colspan="3" class="has-text-centered">Quantity Started</th>
	</tr>

	<tr>
		<td colspan="2" class="has-text-right">Net Day-Old Broilers Received</td>
		<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="gross_birds_received"></td>		
	</tr>
	
	<tr>
		<td colspan="2" class="has-text-right">DOB/Bird Adjustment</td>
		<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="birds_adjustments"></td>
	</tr>

	<tr>	
		<td colspan="2" class="has-text-right">Adjusted Quantity Started</td>
		<td class="has-text-right" style="padding-right:3.5rem">@{{ net_birds_received | numberFormat}}</td>
	</tr>	

	<tr>
		<th colspan="3" class="has-text-centered">Broilers Harvested</th>
	</tr>	

	<tr>	
		<td colspan="2" class="has-text-right">Broilers Harvested</td>
		<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="birds_harvested"></td>
	</tr>		

	<tr>
		<td colspan="2" class="has-text-right">Net Live Weight</td>
		<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="gross_weight"></td>
	</tr>	

	<tr>
		<td colspan="2" class="has-text-right">Staging Time Adjustment</td>
		<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="staging_adjustment"></td>
	</tr>	

	<tr>
		<td colspan="2" class="has-text-right">Adjusted Live Weight</td>
		<td class="has-text-right" style="padding-right:3.5rem">@{{ net_weight | currencyFormat }}</td>
	</tr>	

	<tr>
		<td colspan="2" class="has-text-right">Feed In Crop</td>
		<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="feed_in_crop"></td>
	</tr>	

	<tr>
		<th colspan="3" class="has-text-centered">Feed Consumption</th>
	</tr>

	<tr>
		<th class="has-text-centered">Feed Type</th>
		<th class="has-text-centered">Bags</th>
		<th class="has-text-centered">KG</th>
	</tr>

	<tr>
		<td class="has-text-centered">IBFP</td>
		<td><input class="input is-small has-text-right" style="padding-right:3rem" type="number" v-model="IBFP"></td>
		<td class="has-text-right" style="padding-right:4.2rem">@{{ (IBFP * 50) | numberFormat }}</td>
	</tr>

	<tr>
		<td class="has-text-centered">IBGP</td>
		<td><input class="input is-small has-text-right" style="padding-right:3rem" type="number" v-model="IBGP"></td>
		<td class="has-text-right" style="padding-right:4.2rem">@{{ (IBGP * 50) | numberFormat }}</td>
	</tr>

	<tr>
		<td class="has-text-centered">IBSC</td>
		<td><input class="input is-small has-text-right" style="padding-right:3rem" type="number" v-model="IBSC"></td>
		<td class="has-text-right" style="padding-right:4.2rem">@{{ (IBSC * 50) | numberFormat }}</td>
	</tr>

	<tr>
		<td class="has-text-centered">ICBC</td>
		<td><input class="input is-small has-text-right" style="padding-right:3rem" type="number" v-model="ICBC"></td>
		<td class="has-text-right" style="padding-right:4.2rem">@{{ (ICBC * 50) | numberFormat }}</td>
	</tr>

	<tr>
		<td></td>
		<td class="has-text-right" style="padding-right:4.5rem">@{{ total_feeds_bags | numberFormat }}</td>
		<td class="has-text-right" style="padding-right:4.2rem">@{{ (total_feeds_bags * 50) | numberFormat }}</td>
	</tr>

</table>