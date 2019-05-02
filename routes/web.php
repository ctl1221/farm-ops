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

Route::get('/chat', function(){

	//working 

	//http -f POST http://10.238.10.20:5000/webapi/entry.cgi\?api\=SYNO.Chat.External\&method\=incoming\&version\=2\&token\=%22HuBcPtmcPoYdscXJLyUanfiTGUdcyrgWj8YR4vMZ1G3A3tykHWhkcuD6hz7M1uJf%22 payload='{"text":"yahoo"}'

	return view('test.chat');
});

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

Route::get('/sales/{farm}/view_ops', 'SalesController@view_ops');
Route::get('/sales/{farm}/compare', 'SalesController@compare');
Route::get('/sales/{farm}/create', 'SalesController@create');
Route::post('/sales', 'SalesController@store');

Route::get('/grows/start','GrowController@start');
Route::resource('/grows','GrowController');

Route::post('/farms','FarmController@store');

Route::get('/mortalities/farms/{farm}/buildings/{building}', 'MortalityController@per_building');
Route::post('/mortalities', 'MortalityController@store');
Route::post('/mortalities/{mortality}', 'MortalityController@update');

Route::post('/buildings/farm/{farm}/assign','BuildingController@assignFarm');
Route::post('/update_bird_started','BuildingController@updateBirdStarted');


Route::post('/assign_building_manager','BuildingController@assignBuildingManager');
Route::post('/unassign_building_manager','BuildingController@unassignBuildingManager');
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
Route::get('/deliveries/farms/{farm}', 'DeliveryController@per_farm');
Route::post('/harvests', 'HarvestController@store');
Route::post('/harvests/weigh', 'HarvestController@harvest_weigh');
Route::post('/deliveries', 'DeliveryController@store');

Route::get('/weighings/farms/{farm}/buildings/{building}', 'WeighingController@per_building');

Route::post('/penWeighings/{penWeighing}', 'PenWeighingController@update');

Route::get('/invoices/farms/{farm}', 'InvoiceController@per_farm');
Route::get('/invoices/farms/{farm}/create', 'InvoiceController@create');
Route::post('/invoices', 'InvoiceController@store');
// Route::get('/invoiceLines/invoices/{invoice}', 'InvoiceLineController@create');
Route::post('/invoiceLines', 'InvoiceLineController@store');

Route::get('/materials/farms/{farm}', 'MaterialController@per_farm');

Route::get('/receivings/farms/{farm}', 'ReceivingController@per_farm');
Route::get('/receivings/grows/{grow}/create', 'ReceivingController@create');
Route::post('/receivings', 'ReceivingController@store');

Route::post('/receivingLines', 'ReceivingLineController@store');

Route::post('/truckWeighings', 'TruckWeighingController@store');

Route::get('/', function()
{
	$name = 'Nikki';

	$pdf = PDF::loadView('pdf.test',compact('name'));
	return $pdf->stream('test.pdf');
});

Route::resource('/billings', 'BillingController');
Route::resource('/payslips', 'PaySlipController');

Route::get('/feeds_input','CalculatorController@input_feeds');
Route::post('/feeds_calculate','CalculatorController@calculate_feeds');

Route::get('/api/getAllFeeds','APIController@getAllFeeds');
Route::get('/api/getAllMaterials','APIController@getAllMaterials');
Route::get('/api/getAllDressingPlants','APIController@getAllDressingPlants');
Route::get('/api/getAllPaySlips','APIController@getAllPaySlips');
Route::get('/api/getFarmsOfGrow/{grow}','APIController@getFarmsOfGrow');
Route::get('/api/getReceivingsOfFarm/{farm}','APIController@getReceivingsOfFarm');
Route::get('/api/getHarvestsOfFarm/{farm}','APIController@getHarvestsOfFarm');
Route::get('/api/getEmployeeAssignmentsOfGrow/{grow}','APIController@getEmployeeAssignmentsOfGrow');

Route::post('/api/invoices','APIController@store_invoice');




$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('register', 'Auth\RegisterController@register');

// // Password Reset Routes...
// $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
// $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
// $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
// $this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
