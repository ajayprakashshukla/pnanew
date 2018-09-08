<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Customer;
use App\Customers_contact;
use App\Customers_addresse;
use App\User;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }


    function login(Request $request){
     
        $data=$request->input();

        if(count($data)){
                     if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'role' => 3])) 
                    { 
                        return redirect('/dashboard');
                    }
                else{
                    return view('auth.login')->with('error' , 'These credentials do not match our records');
                   }
        }else{
                      return view('auth.login');
        }
    }
    
    function profile(){
        $user = Auth::user();
       if($user->role==3){
          return view('user.profile')->with('user',$user);
      }
    }
	
	public function getcustomers(){
		$naked_dear_url = 'https://inventory.dearsystems.com/ExternalApi/Customers?ModifiedSince='.date('Y-m-d', strtotime(' -1 day'));
		//$data = array ('Page' => '1', 'Limit' => '100');
		$data = array ();
		$data = http_build_query($data);
		$context_options = array (
        'http' => array (
            'method' => 'GET',
            'header'=> "Content-type: application/json\r\n"
                . "Content-Length: " . strlen($data) . "\r\n"
                . "api-auth-accountid: " . env('DEAR_ACCOUNT_ID') . "\r\n"
                . "api-auth-applicationkey: " . env('DEAR_APPLICATION_ID') . "\r\n",
            'content' => $data
            )
        );
		
		$context = stream_context_create($context_options);

		$contents = file_get_contents($naked_dear_url, false, $context);
		if (!$contents)
		{
			echo("file_get_contents: returned FALSE<br>");    // this is where the code ends up - what am i doing wrong?
		}
		else
		{
			$results = json_decode($contents);
			if (!$results)
			{
				echo("json_decode returned FALSE<br>");
			}
			else
			{
				
				foreach($results->Customers as $key=>$val){
					$customer = new Customer;
					$customer->customer_id = $val->ID;
					$customer->name = $val->Name;
					$customer->currency = $val->Currency;
					$customer->payment_term = $val->PaymentTerm;
					$customer->discount = $val->Discount;
					$customer->tax_rule = $val->TaxRule;
					$customer->carrier = $val->Carrier;
					$customer->sales_representative = $val->SalesRepresentative;
					$customer->location = $val->Location;
					$customer->comments = $val->Comments;
					$customer->account_receivable = $val->AccountReceivable;
					$customer->revenue_account = $val->RevenueAccount;
					$customer->price_tier = $val->PriceTier;
					$customer->tax_number = $val->TaxNumber;
					$customer->additionalAttribute1 = $val->AdditionalAttribute1;
					$customer->additionalAttribute2 = $val->AdditionalAttribute2;
					$customer->additionalAttribute3 = $val->AdditionalAttribute3;
					$customer->additionalAttribute4 = $val->AdditionalAttribute4;
					$customer->additionalAttribute5 = $val->AdditionalAttribute5;
					$customer->additionalAttribute6 = $val->AdditionalAttribute6;
					$customer->additionalAttribute7 = $val->AdditionalAttribute7;
					$customer->additionalAttribute8 = $val->AdditionalAttribute8;
					$customer->additionalAttribute9 = $val->AdditionalAttribute9;
					$customer->additionalAttribute10 = $val->AdditionalAttribute10;
					$customer->attribute_set = $val->AttributeSet;
					$customer->tags = $val->Tags;
					$customer->status = $val->Status;
					$customer->last_modified_on = $val->LastModifiedOn;
					$customer->credit_limit = $val->CreditLimit;
					$customer->created_at = date('Y-m-d h:i:s');
				
					$customer->save();
				}
			}
		}
	}
    




}