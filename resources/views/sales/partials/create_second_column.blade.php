<table class="table is-bordered is-fullwidth is-narrow">
	
	<tr>
		<th colspan="5" class="has-text-centered">Efficiencies and Incentives</th>
	</tr>

	<tr>
		<td></td>
		<th class="has-text-centered">%HR</th>
		<th class="has-text-centered">FCR</th>
		<th class="has-text-centered">ALW</th>
		<th class="has-text-centered">AGE</th>
	</tr>

	<tr>
		<td class="has-text-right">Adjusted Efficiencies</td>
		<td class="has-text-centered">@{{ pct_hr | currencyFormat }}</td>
		<td class="has-text-centered">@{{ fcr | fcrFormat }}</td>
		<td class="has-text-centered">@{{ alw | weightFormat }}</td>
		<td><input class="input is-small has-text-centered" type="number" v-model="age"></td>
	</tr>


	<tr>
		<td class="has-text-right">Broiler Production Index</td>
		<td class="has-text-centered">@{{ bpi | currencyFormat }}</td>
		<td colspan="3"></td>
	</tr>

	<tr>
		<th class="has-text-centered">Basic Grower's Fee</th>
		<td colspan="3"></td>
		<td class="has-text-right" style="padding-right:3rem">@{{ basic_fees | currencyFormat }}</td>
	</tr>

	<tr>
		<td class="has-text-right">on Live Weight (ALW)</td>
		<td class="has-text-right" style="padding-right:1.5rem">@{{ alw_rate | currencyFormat }}</td>
		<td colspan="2"><input class="input is-small has-text-right" style="padding-right: 2.1rem" type="number" v-model="alw_fee"></td>
		<td></td>
	</tr>

	<tr>
		<td class="has-text-right">on Feed Conversion Ratio (FCR)</td>
		<td class="has-text-right" style="padding-right:1.5rem">@{{ fcr_rate | currencyFormat }}</td>
		<td colspan="2" class="has-text-right" style="padding-right:3.5rem">@{{ (fcr_rate * birds_harvested) | currencyFormat }}</td>
		<td></td>
	</tr>

	<tr>
		<td class="has-text-right">on Harvest Recovery (HR)</td>
		<td class="has-text-right" style="padding-right:1.5rem">@{{ hr_rate | currencyFormat }}</td>
		<td colspan="2" class="has-text-right" style="padding-right:3.5rem">@{{ (hr_rate * birds_harvested) | currencyFormat }}</td>
		<td></td>
	</tr>

	<tr>
		<th class="has-text-centered">Incentives/Subsidies</th>
		<td colspan="4"></td>
	</tr>

	<tr>
		<td class="has-text-right">BPI Incentive</td>
		<td class="has-text-right" style="padding-right:1.5rem">@{{ bpi_rate | currencyFormat }}</td>
		<td colspan="2"></td>
		<td class="has-text-right" style="padding-right:3rem">@{{ (bpi_rate * birds_harvested) | currencyFormat }}</td>
	</tr>

	<tr>
		<td class="has-text-right">Feed Efficiency Bonus</td>
		<td class="has-text-right" style="padding-right:1.5rem">@{{ fcri_rate | currencyFormat }}</td>
		<td colspan="2"></td>
		<td class="has-text-right" style="padding-right:3rem">@{{ (fcri_rate * birds_harvested) | currencyFormat }}</td>
		
	</tr>

	<tr>
		<td class="has-text-right">Class A</td>
		<td></td>
		<td colspan="2"></td>
		<td><input class="input is-small has-text-right" style="padding-right:1.5rem" type="number" v-model="class_a_fee"></td>
	</tr>

	<tr>
		<td class="has-text-right">Growing Defectives</td>
		<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="growing_defectives_rate"></td>
		<td colspan="2"></td>
		<td class="has-text-right" style="padding-right:3rem">@{{ (growing_defectives_rate * birds_harvested) | currencyFormat }}</td>
	</tr>

	<tr>
		<td class="has-text-right">Hauling Defectives</td>
		<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="hauling_defectives_rate"></td>
		<td colspan="2"></td>
		<td class="has-text-right" style="padding-right:3rem">@{{ (hauling_defectives_rate * birds_harvested) | currencyFormat }}</td>
	</tr>

	<tr>
		<td class="has-text-right">LPG</td>
		<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="lpg_rate"></td>
		<td colspan="2"></td>
		<td class="has-text-right" style="padding-right:3rem">@{{ (lpg_rate * birds_harvested) | currencyFormat }}</td>
	</tr>

	<tr>
		<td class="has-text-right">Other Incentive 1</td>
		<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="incentive_1_rate"></td>
		<td colspan="2"></td>
		<td class="has-text-right" style="padding-right:3rem">@{{ (incentive_1_rate * birds_harvested) | currencyFormat }}</td>
	</tr>

	<tr>
		<td class="has-text-right">Other Incentive 2</td>
		<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="incentive_2_rate"></td>
		<td colspan="2"></td>
		<td class="has-text-right" style="padding-right:3rem">@{{ (incentive_2_rate * birds_harvested) | currencyFormat }}</td>
	</tr>

	<tr>
		<th class="has-text-centered">Penalties</th>
		<td colspan="4"></td>
	</tr>

	<tr>
		<td class="has-text-right">Feed in Crop (FIC)</td>
		<td></td>
		<td colspan="2"></td>
		<td></td>
	</tr>

	<tr>
		<th class="has-text-centered">Adjustments</th>
		<td colspan="4"></td>
	</tr>

	<tr>
		<td class="has-text-right">FIC Waive</td>
		<td></td>
		<td colspan="2"></td>
		<td></td>
	</tr>

	<tr>
		<td class="has-text-right">Power Subsidy for CCS</td>
		<td></td>
		<td colspan="2"></td>
		<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="power_subsidy"></td>
	</tr>

	<tr>
		<td class="has-text-right">Vetmed & Disinfectant Rebate</td>
		<td></td>
		<td colspan="2"></td>
		<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="vetmed_disinfectant_rebate"></td>
	</tr>

	<tr><td colspan="5" style="padding: 1.90rem"></td></tr>
	
	<tr>
		<th class="has-text-right">Total Grower's Fee</th>
		<td></td>
		<td colspan="2"></td>
		<td class="has-text-centered">@{{ total_growers_fee | currencyFormat }}</td>
	</tr>

	<tr>
		<th class="has-text-right">Gross Fee Per Bird Harvested</th>
		<td class="has-text-right" style="padding-right:3rem">@{{ (total_growers_fee / birds_harvested) | currencyFormat }}</td>
		<td colspan="2"></td>
		<td></td>
	</tr>

	<tr><td colspan="5" style="padding: 1.90rem"></td></tr>

	<tr>
		<th class="has-text-centered">Chargeable to Grower</th>
		<td colspan="4"></td>
	</tr>

	<tr>
		<th class="has-text-right">DOB Vaccination</th>
		<td></td>
		<td colspan="2"></td>
		<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="dob_vaccination"></td>
	</tr>

	<tr>
		<th class="has-text-right">Unaccounted Depletion</th>
		<td></td>
		<td colspan="2"></td>
		<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="depletion"></td>
	</tr>

	<tr>
		<th class="has-text-right">Fly Control Charges</th>
		<td><input class="input is-small has-text-right" style="padding-right:2rem" type="number" v-model="fly_charges_rate"></td>
		<td colspan="2"></td>
		<td class="has-text-right" style="padding-right:3rem">@{{ (fly_charges_rate * birds_harvested) | currencyFormat }}</td>
	</tr>				

	<tr>
		<th class="has-text-right">Total Chargeable to Grower</th>
		<td></td>
		<td colspan="2"></td>
		<td class="has-text-right" style="padding-right:3rem">@{{ total_chargeable | currencyFormat }}</td>
	</tr>

	<tr>
		<th class="has-text-right">Net Grower's Fee</th>
		<td></td>
		<td colspan="2"></td>
		<td class="has-text-centered">@{{ net_growers_fee | currencyFormat }}</td>
	</tr>

	<tr>
		<th class="has-text-right">Net Fee Per Bird Harvested</th>
		<td class="has-text-right" style="padding-right:3rem">@{{ (net_growers_fee / birds_harvested) | currencyFormat }}</td>
		<td colspan="2"></td>
		<td></td>
	</tr>

</table>