<template slot="title">Create New Billing</template>

<template slot="body">
	<form method="POST" action='/billings'>
		@csrf

		<div class="field">
			<label class="label">Billing Type</label>
			<div class="select control">
				<select name="type">
					@foreach(config('default.billing_types') as $x)
						<option>{{ $x }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="field">
			<label class="label">Biller</label>
			<div class="select control">
				<select name="supplier_id">
					@foreach($billers as $biller)
						<option value="{{$biller->id}}">{{ $biller->name }}</option> 
					@endforeach
				</select>
			</div>
		</div>

		<div class="field">
			<label class="label">Date Start</label>
			<div class="control">
				<input class="input" type="date" name="period_start" value="{{\Carbon\Carbon::now()->toDateString()}}" required>
			</div>
		</div>

		<div class="field">
			<label class="label">Date End</label>
			<div class="control">
				<input class="input" type="date" name="period_end" value="{{\Carbon\Carbon::now()->toDateString()}}" required>
			</div>
		</div>

		<div class="field">
			<label class="label">Amount</label>
			<div class="control">
				<input class="input" type="number" name="amount" min="0" required>
			</div>
		</div>

		<div class="control">
			<button class="button is-outlined is-primary" type="submit" value="0">Submit</button>
		</div>
		
	</form>
</template>