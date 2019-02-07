<article class="message is-primary">

	<div class="message-header">
		<h5 class='title is-5 has-text-centered'>Create New Grow</h5>
		<button class="delete" aria-label="delete" @click="showModal = false"></button>
	</div>

	<div class="message-body">
		<form method="POST" action='/grows'>
			@csrf

			<div class="field">
				<label class="label">Grow Reference</label>
				<div class="control">
					<input class="input" type="text" name="cycle" placeholder="e.g. Grow 2019-01">
				</div>
			</div>

			<div class="control">
				<button class="button is-outlined is-primary" type="submit">Submit</button>
			</div>
		</form>
  </div>

</article>






