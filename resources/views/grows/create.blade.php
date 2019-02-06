<h5 class='title is-5'>Create New Grow</h5>

<br/>

<form method="POST" action='/grows'>
	@csrf

	<div class="field">
	  <label class="label">Grow Reference</label>
	  <div class="control">
	    <input class="input" type="text" name="cycle" placeholder="e.g. Grow 2019-01">
	  </div>
	</div>


	<div class="control">
	  <button class="button is-primary" type="submit">Submit</button>
	  <button class="button is-danger" @click="showModal = false">Cancel</button>
	</div>
</form>

