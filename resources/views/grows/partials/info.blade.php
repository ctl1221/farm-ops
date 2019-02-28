<div class="card">
	<header class="card-header has-background-primary">
    	<p class="card-header-title">Basic Information</p>
  	</header>

  	<div class="card-content">
  		<div class="content">
  			@php
  				$m = $grow->sum_of_medicine_expenses();
  				$d = $grow->sum_of_disinfectant_expenses();
  			@endphp
  			Expenses: PHP {{ $m + $d }}
	  		<ul>
	  			<li>Medicine: PHP {{ $m }}</li>
	  			<li>Disinfectant: PHP {{ $d }}</li>
	  		</ul>
    	</div>
  	</div>
</div>
