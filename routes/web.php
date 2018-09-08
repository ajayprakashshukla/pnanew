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

Route::get('/',function(){
        return  redirect('/login');

});
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login','UserController@login');
Route::get('/getcustomers','UserController@getcustomers');
$this->get('/dashboard', 'AdminController@dashboard');
$this->get('/machine_detail/{product_id}', 'AdminController@machine_detail');
$this->post('/machine_detail/{product_id}', 'AdminController@machine_detail');
Route::post('/transactions_form', 'AdminController@transactions_form');



Route::post('all_customers', 'AdminController@all_customers');
Route::post('save_transactions', 'AdminController@save_transactions');
Route::get('all_parts', 'AdminController@all_parts');





Route::get('/customer', 'AdminController@customers');
Route::get('/machines', 'AdminController@machines');
Route::get('/components', 'AdminController@components');
Route::get('/machine_query', 'AdminController@machine_query');

Route::post('/machine_query_report', 'AdminController@machine_query_report');



Route::get('/customer_query/{customer_id?}', 'AdminController@customer_query');
Route::post('/customer_query_report/{customer_id?}', 'AdminController@customer_query_report');

Route::get('/machine_location_query/{serial_no?}', 'AdminController@machine_location_query');
Route::post('/machine_location_query_report/{serial_no?}', 'AdminController@machine_location_query_report');

Route::get('/transaction_type_query/{id?}', 'AdminController@transaction_type_query');
Route::post('/transaction_type_query_report/{id?}', 'AdminController@transaction_type_query_report');


Route::get('/part_query', 'AdminController@part_query');
Route::post('/part_query_report', 'AdminController@part_query_report');

Route::get('/part_failure_query/{product_id?}', 'AdminController@part_failure_query');
Route::post('/part_failure_query_report/{product_id?}', 'AdminController@part_failure_query_report');

Route::get('/return_not_received', 'AdminController@return_not_received');
Route::post('/return_not_received_report', 'AdminController@return_not_received_report');

 


Route::get('/new_machine', 'AdminController@new_machine');
Route::post('/new_machine', 'AdminController@new_machine');

Route::get('/upload_machines', 'AdminController@upload_machines');
Route::post('/upload_machines', 'AdminController@upload_machines');

Route::get('/location', 'AdminController@location');
Route::get('/new_location', 'AdminController@new_location');
Route::post('/new_location', 'AdminController@new_location');
Route::get('/machine_query_xls', 'AdminController@machine_query_xls');
Route::get('/customer_query_xls', 'AdminController@customer_query_xls');
Route::get('/machinelocation_query_xls', 'AdminController@machinelocation_query_xls');
Route::get('/transcationtype_query_xls', 'AdminController@transcationtype_query_xls');
Route::get('/returnnotreceived_xlsx', 'AdminController@returnnotreceived_xlsx');
Route::get('/partquery_xlsx', 'AdminController@partquery_xlsx');
Route::get('/partfailure_xlsx', 'AdminController@partfailure_xlsx');
Route::get('/customer_csv', 'AdminController@customer_csv');
Route::get('/machine_location_csv', 'AdminController@machine_location_csv');
Route::get('/transcation_type_csv', 'AdminController@transcation_type_csv');
Route::get('/return_not_received_csv', 'AdminController@return_not_received_csv');
Route::get('/part_failure_csv', 'AdminController@part_failure_csv');
Route::get('/part_query_csv', 'AdminController@part_query_csv');
Route::get('/machine_query_csv', 'AdminController@machine_query_csv');
Route::get('/getconfiguration', 'AdminController@getconfiguration');
Route::get('/getUsedParts/{transaction_id}', 'AdminController@getUsedParts');

Route::get('/getOriginalPurchase/{transaction_id}', 'AdminController@getOriginalPurchase');
Route::get('/getCustomerPlacement/{transaction_id}', 'AdminController@getCustomerPlacement');
Route::get('/getCustomerReplacement/{transaction_id}', 'AdminController@getCustomerReplacement');
Route::get('/getDefectiveReturn/{transaction_id}', 'AdminController@getDefectiveReturn');
Route::get('/getCustomerReturn/{transaction_id}', 'AdminController@getCustomerReturn');
Route::get('/getReceipt/{transaction_id}', 'AdminController@getReceipt');
Route::get('/getDisposal/{transaction_id}', 'AdminController@getDisposal');
Route::get('/getTransfer/{transaction_id}', 'AdminController@getTransfer');


Route::get('/users', 'AdminController@users');
Route::get('/new_user', 'AdminController@new_user');
Route::post('/new_user', 'AdminController@new_user');
Route::get('/profile/{user_id}', 'AdminController@profile');
Route::post('/profile/{user_id}', 'AdminController@profile');




Route::get('/import', 'AdminController@ImportData');

Route::auth();
Route::get('/logout',function(){
	Auth::logout();
	return redirect('/');
});


Route::get('/home', function(){
  return	redirect('/dashboard');
});





