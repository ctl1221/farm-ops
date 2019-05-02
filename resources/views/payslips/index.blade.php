@extends('master')

@section('page_title')
<div class="level">
	<div class="level-left">
		<div class="level-item">
			<h2 class="title">Payslips</h2>
		</div>
	</div>

	<div class="level-right">
		{{-- <div class="level-item">Year </div> --}}
		<div class="level-item">
			<div class="select">
				<select v-model="sel_year">
					<option v-for="year in year_range">@{{ year }}</option>
				</select>
			</div>
		</div>

		<div class="level-item">
			<div class="select">
				<select v-model="sel_month">
					<option value="1">January</option>
					<option value="2">February</option>
					<option value="3">March</option>
					<option value="4">April</option>
					<option value="5">May</option>
					<option value="6">June</option>
					<option value="7">July</option>
					<option value="8">August</option>
					<option value="9">September</option>
					<option value="10">October</option>
					<option value="11">November</option>
					<option value="12">December</option>
				</select>
			</div>
		</div>
	</div>
</div>

@endsection

@section('content')

<table class="table is-bordered is-striped is-fullwidth">
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
			sel_year: '{{ $selected_year }}',
			sel_month: '{{ $selected_month }}',
			latest_year: '{{ $latest_year}}',
			oldest_year: '{{ config('default.oldest_year') }}',
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
			},

			year_range: function() {

				let array = [];
				for(let i = this.latest_year; i >= this.oldest_year; i--)
				{
					array.push(i);
				}
				return array;
			}
		},

		watch: {
			sel_year: function(newVal, oldVal)
			{
				window.location.href = '/payslips?year=' + newVal + '&month=' + this.sel_month;
			},

			sel_month: function(newVal, oldVal)
			{
				window.location.href = '/payslips?year=' + this.sel_year + '&month=' + newVal;
			}
		},

		methods: {

			getAllPaySlips: function() {
				axios.get('/api/getAllPaySlips', {
					params: {
						year: this.sel_year,
						month: this.sel_month,
					}
				}).then(response => {
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

					if(this.sel_year == response.data.year && this.sel_month == response.data.month)
					{
						this.getAllPaySlips();
			  			this.reference = '';
			  			this.amount = 0;
			  			this.$refs.reference.focus();
					}
					else
					{
						window.location.href = "/payslips?year=" + response.data.year + "&month=" + response.data.month;
					}
				});
			}
		},

		created: function() {
			this.getAllPaySlips();

		},
		mounted: function() {
			this.$refs.reference.focus();
		}

	})

</script>

@endsection