<template slot="title">Create New Grow</template>

<template slot="body">
	<form method="POST" action='/grows'>
		@csrf

		<div class="field">
			<label class="label">Grow Reference</label>
			<div class="control">
				<input class="input" type="text" name="cycle" placeholder="e.g. Grow 2019-01">
			</div>
		</div>

		<div class="field">
			<label class="label">Date Start</label>
			<div class="control">
				<input class="input" type="date" name="date_start" value="{{\Carbon\Carbon::now()->toDateString()}}">
			</div>
		</div>

		<div class="control">
			<button class="button is-outlined is-primary" type="submit">Submit</button>
		</div>
		
	</form>
</template>