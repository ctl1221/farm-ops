<div class="card">
	<header class="card-header">
    	<p class="card-header-title">Expenses</p>
  	</header>

  	<div class="card-content">
  		<div class="content">
  			<ul>
				<li>Medicine Expenses : {{ "PHP " . number_format(round($grow->sum_of_medicine_expenses(), 2), 2) }}</li>
				<li>Electricity Expenses : {{ "PHP " . number_format(round($grow->sum_of_electrical_expenses(), 2), 2) }}</li>
			</ul>
    	</div>
  	</div>
</div>

	