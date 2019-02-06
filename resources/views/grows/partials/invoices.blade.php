<div class="card">
	<header class="card-header">
    	<p class="card-header-title">Invoices</p>
  	</header>

  	<div class="card-content">
  		<div class="content">
  			<table class="table is-narrow is-fullwidth is-bordered">
				<thead>
					<th>Date</th>
					<th>Farm</th>
					<th>Reference</th>
					<th>Amount</th>
					<th>Details</th>
				</thead>

				<tbody>
					@foreach ($grow->invoices as $invoice)
					<tr>
						<td>{{ $invoice->date }}</td>
						<td>{{ $invoice->farm->name }}</td>
						<td>{{ $invoice->supplier_invoice_no }}</td>
						<td>{{ $invoice->total_invoice_amount() }}</td>
						<td><a href="/invoiceLines/invoices/{{ $invoice->id }}">View</td>
					</tr>
					@endforeach
				</tbody>
					
			</table>
    	</div>
  	</div>
</div>

<form method="POST" action="/invoices">
		@csrf
	
		<input type="date" name="date">
		<select name="farm_id">
			@foreach ($grow->farms as $farm)
				<option value="{{ $farm->id }}">{{ $farm->name }}</option>
			@endforeach
		</select>
		<input type="text" name="supplier_invoice_no" placeholder="supplier invoice no">
		<input type="submit" value="create invoice">
</form>

