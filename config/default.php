<?php
return [
    'oldest_year' => 2017,
    'n_farms' => 5,
    'n_days' => 25,
    'weighing_days' => [7, 14, 21, 28],
    'n_chicks_weighed' => [7 => 1, 14 => 1, 21 => 1, 28 => 1],
    'n_weighs' => 1,
    'farm_names' => ['Farm A', 'Farm B', 'Farm C', 'Farm D', 'Farm E'],
    'building_assignments' => [[1,2],[3,4],[5,6],[7,8],[9,10]],
    'billing_types' => ['Electricity','Security'],
    'material_types' => ['Feed','Medicine','Disinfectant'],	
    'delayed_plant_weighing_pct' => ['D' => 0.0056, 'N' => 0.0046],
    'delayed_plant_weighing_treshold' => ['D' => 1, 'N' => 2],
    'feeds_consumed_days_breakdown' => ['ICBC' => [1, 12], 'IBSC' => [13, 20], 'IBGP' => [21, 26], 'IBFP' => [27, 50]],
];