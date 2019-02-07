@extends('master')

@section('breadcrumb')

	<nav class="level">
		<div class="level-left">
		    <div class="level-item">
				<nav class="breadcrumb" aria-label="breadcrumbs" style="margin-top: 0.5rem">
				  <ul>
				    <li><a href="/grows"><h3 class="title is-3 has-text-link">Grows</h3></a></li>
				    <li><a href="/grows"><h3 class="title is-3 has-text-link">Grow Specific</h3></a></li>
				    <li class="is-active"><a><h3 class="title is-3">New Invoice</h3></a></li>
				  </ul>
				</nav>
			</div>
	  	</div>

	  <!-- Right side -->
		<div class="level-right">
	    	<h4 class="subtitle is-4 level-item">
	    	</h4>
	  	</div>
	</nav>


</h3>

@endsection

@section('content')

	<form method="POST" action="/invoices">
		@csrf
	    <table class="table is-fullwidth is-bordered">
	        <tr>
	            <th>Date</th>
	            <th>Supplier Invoice No.</th>
	            <th>SO Reference No.</th>
	            <th>DR Reference No.</th>
	        </tr>
        	<tr>
	            <th>Date</th>
	            <th>Supplier Invoice No.</th>
	            <th>SO Reference No.</th>
	            <th>DR Reference No.</th>
	        </tr>
	        <tr>
	            <th>Date</th>
	            <th>Supplier Invoice No.</th>
	            <th>SO Reference No.</th>
	            <th>DR Reference No.</th>
	        </tr>
	    </table>

		<invoice-list ref="invoice_lines"></invoice-list>

		<a class="button is-outlined" @click="addLineItem">Add Item</a>

		<input class="button" type="submit" name="submit" @click.prevent="submitForm">

	</form>

@endsection

@section('scripts')

	<script type="text/javascript">
		
		var app_body = new Vue({
			el: '#app_body',
			data: {
				'lines': []
			},

			methods: {
				addLineItem: function () {
		            var invoice_lines = this.$refs.invoice_lines;
					invoice_lines.addItem();
				},

				submitForm: function ()
				{
					var invoice_lines = this.$refs.invoice_lines;
					this.lines = invoice_lines.$data.lines;

					axios.post('/api/invoices', this.$data).then(response => window.location.href = response.data);
				}
			},
		})

	</script>

@endsection