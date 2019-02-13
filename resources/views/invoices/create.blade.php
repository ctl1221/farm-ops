@extends('master')

@section('breadcrumb')

	<nav class="level">
		<div class="level-left">
		    <div class="level-item">
				<nav class="breadcrumb" aria-label="breadcrumbs" style="margin-top: 0.5rem">
				  <ul>
				    <li><a href="/grows"><h3 class="title is-3 has-text-link">Grows</h3></a></li>
				    <li>
				    	<a href="/grows/{{$grow->id}}">
						    <h3 class="title is-3 has-text-link">{{ $grow->cycle}}</h3>
						   </a>
					</li>
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

	    <table class="table is-fullwidth is-bordered">
	        <tr>
	            <th style="width:50px">Date</th>
	            <th style="width:300px">
	            	<input class="input is-small" style="width:300px" type="date" v-model="date">
	            </th>
	            <th style="width:150px">
	            	Supplier Invoice No.
	            </th>
	            <th style="width:300px">
	            	<input class="input is-small" style="width:300px" type="text" v-model="supplier_invoice_no" required>
	            </th>
	        </tr>
        	<tr>
	            <th>Farm</th>
	            <th>
	            	<div class="select is-small">
	            		<select style="width:300px" v-model="farm_id">
	            			@foreach($grow->farms as $x)
	            				<option value="{{ $x->id }}">{{$x->name}}</option>
	            			@endforeach
	            		</select>
	            	</div>
	            </th>
	            <th>SO Reference No.</th>
	            <th>DR Reference No.</th>
	        </tr>
	    </table>

	    <a class="button is-outlined" @click="addLineItem">Add Item</a>
	    <a class="button is-outlined" @click="updateAggregates">Update Total</a>

		<input v-if="supplier_invoice_no && n_lines > 0" @click.prevent="submitForm" class="button" type="submit">

		<br/>
		<br/>

		<invoice-list ref="invoice_list" 
			@subtract_n_lines="n_lines--">
		</invoice-list>

		<div class="is-pulled-right">
		<table class="table is-bordered">

            <tr>
                <th>Total Sales</th>
                <td>@{{ total }}</td>
            </tr>
            <tr>
                <th>Vat</th>
                <td>---</td>
            </tr>
            <tr>
                <th>Total Amount Payable</th>
                <td>---</td>
            </tr>
    	</table>
    </div>

@endsection

@section('scripts')

	<script type="text/javascript">
		
		var app = new Vue({
			el: '#app_body',
			data: {
				'n_lines': 0,
				'grow_id': '{!! $grow->id !!}',
				'date': '{!! Carbon\Carbon::now()->format('Y-m-d') !!}',
				'farm_id': '{!! $grow->farms->first()->id !!}',
				'supplier_invoice_no':'',
				'lines': [],
				'total': 0,
			},

			methods: {
				addLineItem: function () {

					this.n_lines++;

		            var invoice_list = this.$refs.invoice_list;
					invoice_list.addItem();

				},

				submitForm: function ()
				{
					var invoice_list = this.$refs.invoice_list;
					this.lines = invoice_list.$data.lines;

					axios.post('/invoices', this.$data).then(response => window.location.href = response.data);
				},

				updateAggregates: function ()
				{
					var invoice_list = this.$refs.invoice_list;
					this.total = invoice_list.$data.total;
				},
			},
		})

	</script>

@endsection