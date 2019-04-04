<div class="card">
	<header class="card-header has-background-primary">
    	<p class="card-header-title">Basic Information</p>
  	</header>

  	<div class="card-content">
  		<div class="content">
  			@php
  				$m = $grow->sum_of_medicine_expenses();
  				$d = $grow->sum_of_disinfectant_expenses();
          $l = $grow->sum_of_labor_expenses();
          $e = $grow->sum_of_electrical_expenses();
          $total = $m + $d + $l + $e;
  			@endphp
  			Expenses: PHP {{ number_format($total,2) }}
	  		<ul>
	  			<li>Medicine: PHP {{ number_format($m,2) }}</li>
	  			<li>Disinfectant: PHP {{ number_format($d,2) }}</li>
          @if($grow->date_end)
            <li>Direct Labor: PHP {{ number_format($l,2) }} </li>
            <li>Electricity: PHP {{ number_format($e,2) }}</li>
          @endif
	  		</ul>
    	</div>
  	</div>
</div>
