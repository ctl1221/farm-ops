<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/testAPI', function(){
	return response()->json(["text" => "Hello Life"]);
});

Route::get('/vue', function(){
	return view('test.vue');
});

Route::get('/allBuildings', function(){
	$buildings = App\Building::all();
	return $buildings;
});

Route::post('/addBuilding', function(){
	App\Building::create([
		'name' => 'Nikki'
	]);
});


Route::get('/grows/start','GrowController@start');
Route::resource('grows', 'GrowController');
Route::post('/grows/start','GrowController@scaffoldCreate');
Route::post('/grows/createFarm','GrowController@createFarm');

Route::get('/mortalities/farms/{farm}/buildings/{building}', 'MortalityController@per_building');
Route::post('/mortalities', 'MortalityController@store');
Route::patch('/mortalities/{mortality}', 'MortalityController@update');

Route::post('/buildings/farm/{farm}/assign','BuildingController@assignFarm');
Route::post('/update_bird_started','BuildingController@updateBirdStarted');
Route::post('/assign_building_supervisor','BuildingController@assignBuildingSupervisor');
Route::post('/unassign_building_supervisor','BuildingController@unassignBuildingSupervisor');
Route::post('/assign_building_caretaker','BuildingController@assignBuildingCaretaker');
Route::post('/unassign_building_caretaker','BuildingController@unassignBuildingCaretaker');

Route::get('/days/farms/{farm}', 'DayController@per_farm');
Route::post('/days', 'DayController@store');

Route::patch('/feeds_consumptions/{feedsConsumption}', 'FeedsConsumptionController@update');

Route::get('/loadings/farms/{farm}', 'LoadingController@per_farm');
Route::post('/loadings', 'LoadingController@store');

Route::get('/harvests/farms/{farm}', 'HarvestController@per_farm');
Route::post('/harvests', 'HarvestController@store');

Route::get('/weighings/farms/{farm}/buildings/{building}', 'WeighingController@per_building');

Route::patch('/penWeighings/{penWeighing}', 'PenWeighingController@update');

Route::post('/invoices', 'InvoiceController@store');
Route::get('/invoiceLines/invoices/{invoice}', 'InvoiceLineController@create');
Route::post('/invoiceLines', 'InvoiceLineController@store');

Route::get('/medicines/farms/{farm}', 'MedicineController@per_farm');

Route::get('/receivings/farms/{farm}', 'ReceivingController@per_farm');
Route::post('/receivings', 'ReceivingController@store');

Route::post('/receivingLines', 'ReceivingLineController@store');

Route::post('/truckWeighings', 'TruckWeighingController@store');

Route::get('/', function()
{
	$name = 'Nikki';

	$pdf = PDF::loadView('pdf.test',compact('name'));
	return $pdf->stream('test.pdf');
});

Route::resource('utilityBills', 'UtilityBillController');

Route::resource('payrolls', 'PayrollController');
Route::resource('payslips', 'PaySlipController');
