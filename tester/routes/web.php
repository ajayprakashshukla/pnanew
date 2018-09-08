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


    Route::get('/verify/{id}','LoginController@verify');
   Route::post('/verify/{id}','LoginController@verify');


    Route::prefix('admin')->group(function() {
    Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('login');
    Route::get('/login',function(){ return view('admin.login');});
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/dashboard', 'AdminController@index');

    Route::get('/logout',function(){
	  Auth::guard('admin')->logout();
	        return redirect('/admin');
    });
    Route::get('/approvers/new','AdminController@newApprovers');
    Route::post('/approvers/new','AdminController@newApprovers');
    Route::get('/approvers/{id}','AdminController@editApprover');
    Route::post('/approvers/{id}','AdminController@editApprover');
    Route::get('/approvers','AdminController@approvers');
    Route::post('/userDelete','AdminController@userDelete');
    Route::post('/approversDelete','AdminController@approversDelete');
    Route::get('/user/{id}','AdminController@usersDetail');
    Route::post('/user/{id}','AdminController@usersDetail');
    Route::get('/home', 'AdminController@home');
    Route::get('/wallets','AdminController@wallets');
    Route::post('/wallets','AdminController@wallets');
    
    Route::post('/getwallet/{id}','AdminController@getwallet');
    Route::get('/update_wallet_ind','AdminController@update_wallet_ind');
    Route::post('/update_wallet_ind','AdminController@update_wallet_ind');

    Route::get('/update_wallet_group','AdminController@update_wallet_group');
    Route::post('/update_wallet_group','AdminController@update_wallet_group');
    Route::post('/getwallets','AdminController@getwallets');
    Route::get('/payment_schedule_monthly','AdminController@payment_schedule_monthly');
    Route::post('/payment_schedule_monthly','AdminController@payment_schedule_monthly');
    Route::post('/userduewallet/{company_email}','AdminController@userduewallet');
    Route::post('/delete_facility','AdminController@facilityDelete');
  });

Route::get('/',function(){
	return  redirect('/login');

});

Route::get('/success',function(){
	return  view('success');

});


Route::get('test','AdminController@check_authAdmin');


Route::get('/create_act/{data}',function($data){
      $data=substr(base64_decode($data), 6);
      $data=explode('ASH', $data);
      if(isset($data[0]) && isset($data[1])){
      	 return  view('create_act')->with('email',$data[1])->with('id',$data[0]);
      }

	 
});






Route::post('/review','LoginController@review');

Route::post('/final_register','LoginController@final_register');
Route::post('/preview','LoginController@preview');


Route::get('/admin','LoginController@adminlogin');
Route::post('/admin','LoginController@adminlogin');
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login','LoginController@userlogin');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');
//Route::get('/admin/dashboard','DashboardController@index');
Route::get('/admin/user_wallets/{user_id}','AdminController@user_wallets');
Route::get('/admin/wallet_summary/{user_id}/{wallet_id}','AdminController@wallet_summary');
Route::post('/admin/debit_credit_form_submit','AdminController@debit_credit_form_submit');
Route::post('/admin/debit_credit_summary/{user_id}/{wallet_category}','AdminController@debit_credit_summary');
Route::post('/debit_credit_summary/{user_id}/{wallet_category}','UserController@debit_credit_summary');


Route::get('/wallet_summary/{wallet_id}','UserController@wallet_summary');


Route::get('/admin/wallets/new','AdminController@newWallet');
Route::post('/admin/wallets/new','AdminController@newWallet');
Route::get('admin/wallet/delete/{id}','AdminController@walletDelete');
Route::get('/admin/editwallets/{id}','AdminController@editwallets')->where(['id'=>"[0-9]+"]);
Route::post('/admin/editwallets/{id}','AdminController@editwallets')->where(['id'=>"[0-9]+"]);
Route::get('/admin/wallets/import/{wallet_id?}','AdminController@importWallet')->where(['wallet_id'=>"[0-9]+"]);;
Route::post('/admin/wallets/import/{wallet_id?}','AdminController@importWallet')->where(['wallet_id'=>"[0-9]+"]);;
Route::get('/admin/get_wallet_users_list/{wallet_id}','AdminController@get_wallet_users_list');
Route::get('/admin/chengeApplicationStatus/{app_id}/{status}','AdminController@chengeApplicationStatus');
Route::get('/admin/view_application/{id}','AdminController@view_application');
Route::post('/admin/view_application/{id}','AdminController@view_application');


Route::get('/admin/facility','AdminController@facility');
Route::post('/admin/facility/new','AdminController@newfacility');
Route::get('/admin/facility/new','AdminController@newfacility');
Route::get('/admin/facility/{id}','AdminController@newfacility')->where(['id'=>"[0-9]+"]);
Route::post('/admin/facility/{id}','AdminController@newfacility')->where(['id'=>"[0-9]+"]);




Route::get('admin/user/edit/{id}','AdminController@userEdit');






Route::get('admin/send_mail','AdminController@sendMail');








Route::get('/admin/users/','AdminController@users');
Route::post('/admin/users/','AdminController@users');


Route::get('admin/company_domain_name','AdminController@company_domain_name');
Route::post('admin/company_domain_name','AdminController@company_domain_name');
Route::get('admin/change_status/{table}/{id}','AdminController@change_status');
Route::get('admin/profile','AdminController@profile');
Route::post('admin/profile','AdminController@profile');

Route::get('/admin/applications','AdminController@applications');

Route::get('/admin/app_loans','AdminController@app_loans');
Route::get('/admin/app_facility','AdminController@app_facility');
Route::get('/admin/app_projects','AdminController@app_projects');
Route::get('admin/import_user','AdminController@import_user');
Route::post('admin/import_user','AdminController@import_user');

Route::get('admin/app_users','AdminController@app_users');

Route::get('admin/add_single_user','AdminController@add_single_user');
Route::post('admin/add_single_user','AdminController@add_single_user');
Route::get('admin/getApprovedLoans/{user_id}','AdminController@getApprovedLoans');

Route::auth();




Route::get('/logout',function(){
	Auth::logout();
	return redirect('/');
});


Route::get('/home', 'UserController@home');

Route::get('dashboard','DashboardController@index');
Route::get('profile','UserController@profile');
Route::post('profile','UserController@profile');
Route::get('contributions','UserController@contributions');
Route::get('quickcash','UserController@quickcash');
Route::get('loans','UserController@loans');
Route::get('projects','UserController@projects');
Route::get('newapplication/{id?}','UserController@newapplication');
Route::post('newapplication/{id?}','UserController@newapplication');
Route::get('load_facility/{id}','UserController@load_facility');
Route::get('application_form/{id}','UserController@application_form');
Route::post('application_form/{id}','UserController@application_form');
Route::post('load_facility_detail/{id}','UserController@load_facility_detail');
Route::get('get_repayment_schedule','UserController@get_repayment_schedule');


Route::post('application_form/save','UserController@saveapplication_form');

Route::get('application/loans','UserController@app_loans');
Route::get('application/facility','UserController@app_facility');
Route::get('application/projects','UserController@app_projects');
Route::get('view_my_application/{id}','UserController@view_my_application');




Route::post('send_otp_user_verification','OtpController@send_otp_user_verification');
Route::post('approve_user_reg','OtpController@approve_user_reg');
Route::get('direct_debit_authorization_pdf/{id}','UserController@direct_debit_authorization_pdf');
Route::get('application_package_print/{id}','UserController@application_package_print');


