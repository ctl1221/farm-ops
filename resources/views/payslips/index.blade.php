@extends('master')

@section('content')

Payslips

<table class="table is-bordered is-striped">
	<thead>
		<tr>
			<td><input type="text" v-model="reference" ref="reference"></td>
			<td><select v-model="employee_id">
				<option v-for="employee in employees_list" :value="employee.id">@{{ employee.display_name }}</option>
				</select>
			</td>
			<td><input type="date" v-model="date_bill"></td>
			<td><input type="date" v-model="period_end"></td>
			<td><input type="date" v-model="period_start"></td>
			<td><input type="number" v-model="amount"></td>
			<td><button :disabled="submittable" @click="submitForm">+</button></td>
		</tr>
		<tr>
			<th>Check Voucher</th>
			<th>Employee Name</th>
			<th>Bill Date</th>
			<th>Period Start</th>
			<th>Period End</th>
			<th>Amount</th>
		</tr>	
	</thead>

	<tbody>
		<tr v-for="payslip in payslips">
			<td>@{{ payslip.reference }}</td>
			<td>@{{ payslip.employee.display_name }}</td>
			<td>@{{ payslip.date_bill }}</td>
			<td>@{{ payslip.period_start }}</td>
			<td>@{{ payslip.period_end }}</td>
			<td>@{{ payslip.amount }}</td>
		</tr>
	</tbody>
</table>

@endsection

@section('scripts')

	<script type="text/javascript">
		
		var app_body = new Vue({
		  el: '#app_body',
		  
		  data: {
		  	employees_list: {!! $employees_list !!},
		  	payslips: '',
		  	reference: '',
		  	employee_id: {!! $employees_list[0]->id !!},
		  	date_bill: '',
		  	period_start: '',
		  	period_end: '',
		  	amount: 0,
		  },
		  
		  computed: {
		  	submittable: function() {
		  		if(this.reference && this.date_bill && this.period_start && this.period_end && this.amount) 
			  		return false;

			  	return true;
		  	}
		  },
		  
		  methods: {
		  	getAllPaySlips: function() {
		  		axios.get('/api/getAllPaySlips').then(response => {
		  			this.payslips = response.data.payslips;
		  		});
		  	},
		  	submitForm: function() {
		  		axios.post('/payslips', {
		  			reference: this.reference,
		  			employee_id: this.employee_id,
		  			date_bill: this.date_bill,
		  			period_start: this.period_start,
		  			period_end: this.period_end,
		  			amount: this.amount,
		  		}).then(response => {
		  			this.getAllPaySlips();
		  			this.reference = '';
		  			this.amount = 0;
		  			this.$refs.reference.focus();
		  		});
		  	}
		  },

		  created: function() {
		  	this.getAllPaySlips();
		  },

		})

	</script>

@endsection