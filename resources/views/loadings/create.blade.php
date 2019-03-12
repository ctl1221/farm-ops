<form method="POST" action='/loadings'>
	@csrf

	<input type="hidden" name="farm_id" value="{{ $farm->id }}">
	<input type="hidden" name="net_delivered" :value="net_delivered">

	<div class="level">

		<div class="level-left">

			<div class="field is-horizontal">
				<div class="field-label is-normal">
					<label class="label">Supplier</label>
				</div>
				<div class="field-body">
					<div class="select">
						<select name="company_id">
							@foreach($chick_suppliers as $supplier)
							<option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>

		</div>

		<div class="level-right">

			<b>Net Delivered</b>
			&nbsp;&nbsp;&nbsp; 
			@{{ net_delivered | numberFormat }} Birds

		</div>			

	</div>

	<div class="columns">

		<div class="column">

			<div class="field">
				<label class="label">Date Depart Hatchery</label>
				<div class="control">
					<input class="input" type="date" name="date_dep_hatchery" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
				</div>
			</div>

			<div class="field">
				<label class="label">Time Arrived Farm</label>
				<div class="control">
					<input class="input" type="time" name="time_arr_farm" value="{{ Carbon\Carbon::now()->format('H:i') }}">
				</div>
			</div>

		</div>

		<div class="column">

			<div class="field">
				<label class="label">Total Delivered</label>
				<div class="control">
					<input class="input" name="total_delivered" v-model="total_delivered" value="0">
				</div>
			</div>

			<div class="field">
				<label class="label">DOA Delivered</label>
				<div class="control">
					<input class="input" name="doa_delivered" type="number" v-model="doa_delivered" value="0">
				</div>
			</div>

		</div>			

		<div class="column">
			<div class="field">
				<label class="label">Hatchery Source</label>
				<div class="control">
					<input class="input" type="text" name="hatchery_source">
				</div>
			</div>

			<div class="field">
				<label class="label">Truck Plate No</label>
				<div class="control">
					<input class="input" type="text" name="truck_plate_no" placeholder="ABC 1234">
				</div>
			</div>

		</div>


	</div>

	<div class="field">
		<label class="label">Notes</label>
		<div class="control">
			<textarea class="textarea" name="notes"></textarea>
		</div>
	</div>

	<div class="field">
		<div class="control">
			<button type="reset" class="button is-outlined is-danger" value="Reset">Reset</button>
			<button type="submit" class="button is-outlined is-success">Submit</button>
		</div>
	</div>

</form>