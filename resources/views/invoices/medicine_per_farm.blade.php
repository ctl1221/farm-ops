@extends('master')

@section('content')

	<h3>Medicine Invoices</h3>

	@foreach ($farm->invoices as $invoice)
		<table border="1">
			<thead>
				<th>Date</th>
				<th>Supplier Invoice No.</th>
				<th>SO Reference No.</th>
				<th>DR Reference No.</th>
				<th>PO Reference No.</th>
			</thead>

			<tbody>
				<tr>
					<td>{{ $invoice->date }}</td>
					<td>{{ $invoice->supplier_invoice_no }}</td>
					<td>---</td>
					<td>---</td>
					<td>---</td>
				</tr>

				<tr><td colspan="9">&nbsp;</td></tr>

				<tr>
					<th>Material Code</th>
					<th>Description</th>
					<th>Unit</th>
					<th>Quantity</th>
					<th>Net Weight</th>
					<th>Unit Price</th>
					<th>Amount</th>
					<th>Tax</th>
					<th>Transaction Type</th>
				</tr>

				@php 
					$total = 0; 
					$tax_total = 0;
				@endphp
				@foreach($invoice->invoice_lines as $x)
					@php 
						$tax_total += $x->quantity * $x->price * 0.12 / 1.12;
						$total += $x->quantity * $x->price;

					@endphp
					<tr>
						<td>{{ $x->material->code }}</td>
						<td>{{ $x->material->description }}</td>
						<td>{{ $x->material->uom }}</td>
						<td>{{ $x->quantity }}</td>
						<td>{{ $x->material->kg_weight * $x->quantity }}</td>
						<td>{{ $x->price }}</td>
						<td>{{ $x->quantity * $x->price}}</td>
						<td>{{ number_format(round($x->quantity * $x->price * 0.12 / 1.12, 2), 2) }}</td>
						<td>{{ $x->material->vatable }}</td>
					</tr>
				@endforeach

				<tr><td colspan="9">&nbsp;</td></tr>
				<tr>
					<td colspan="7"></td>
					<th>Total Sales</th>
					<td>{{ number_format(round($total - $tax_total, 2), 2) }}</td>
				</tr>

				<tr>
					<td colspan="7"></td>
					<th>Vat</th>
					<td>{{ number_format(round($tax_total, 2), 2) }}</td>
				</tr>

				<tr>
					<td colspan="7"></td>
					<th>Total Amount Payable</th>
					<td>{{ number_format(round($total, 2), 2) }}</td>
				</tr>

				<tr><td colspan="9">&nbsp;</td></tr>

				<form method="POST" action="/invoiceLines">
					@csrf
					<input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
					<tr>
						<td>
							<select name="medicine_id">
								@foreach($medicines as $medicine)
								<option value="{{ $medicine->id }}">
									{{ $medicine->code }}
								</option>
								@endforeach
							</select>
						</td>
						<td></td>
						<td></td>
						<td>
							<input type="text" name="quantity">
						</td>
						<td></td>
						<td>
							<input type="text" name="price">
						</td>
						<td></td>
						<td colspan="2"><input type="submit" value="Add New Line"></td>
					</tr>
				</form>	
			</tbody>
		</table>

		<br/>
	@endforeach

@endsection