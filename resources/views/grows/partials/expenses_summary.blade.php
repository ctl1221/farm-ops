<h3>Expenses Summary</h3>

	<ul>
		<li>Medicine Expenses : {{ "PHP " . number_format(round($grow->sum_of_medicine_expenses(), 2), 2) }}</li>
		<li>Electricity Expenses : {{ "PHP " . number_format(round($grow->sum_of_electrical_expenses(), 2), 2) }}</li>
	</ul>