<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Excel;
use App\User;
use App\Wallet;
use App\wallet_category;
use App\setting;
use App\facility_category;
use App\Facility;
use App\User_wallets;
use App\Loan_application;
use App\Debit_credit;
use App\Payment_schedule;
use App\Repayment_plan;
 use PDF;
use App\mpdf\mpdf;
use App\Common\Common;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

function home(){
  
  $user = Auth::user();
  return view('user.home')->with('user',$user);
}
   
    
    function profile(Request $request){
        $user = Auth::user();
        $data=$request->input();
        if(count($data)){
            if (isset($data['persional_info'])) {
                    $this->validate($request, [
                    'name' => 'required|max:255',
                    'middle_name' => 'required|max:255',

                    'email' => 'required|email|max:255|email_domain:' . $data['email'] . '|unique:users'. ($user->id ? ",id,$user->id" : ''),
                    'secondary_email' => 'required|email|max:191',
                    'mobile_no' => 'required|min:10|max:11',
                    'office_extension' => 'required|max:5',
                    'next_of_kin' => 'required|max:191',
                    'relationship_with_next_of_kin' => 'required|max:255',
                    'next_of_kin_phone_number' => 'required|min:10|max:10',

                    'sharp_id' => 'required',
                    'proposed_monthly_income' => 'required',
                    'lastname' => 'required',

                    'address' => 'required|max:191',
                    'state' => 'required',
                    'country' => 'required',
                 ]);
                 User::find($user->id)->update([
                    'name' => $data['name'],
                    
                    'middle_name' => $data['middle_name'],
                    'lastname' => isset($data['lastname'])?$data['lastname']:'',
                    'email' => $data['email'],
                    'secondary_email' => $data['secondary_email'],
                    'mobile_no' => $data['mobile_no'],
                    'office_extension' => $data['office_extension'],
                    'next_of_kin' => $data['next_of_kin'],
                    'relationship_with_next_of_kin' => $data['relationship_with_next_of_kin'],
                    'next_of_kin_phone_number' => $data['next_of_kin_phone_number'],
                    'address' => $data['address'],
                    'state' => $data['state'],
                    'country' => $data['country'],
                    'proposed_monthly_income' => $data['proposed_monthly_income'],
                    'sharp_id' => $data['sharp_id'],


                    'role' => '3',
                ]);
                return redirect('profile#tab_1_1')->with('success','Personal info successfully updated');
        }
        
        if (isset($data['Change_Avatar'])) {
                    $this->validate($request, [
                    'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                     $files=$request->img;
                   $upload= Common::upload($user->id,$files,'profile');
                    User::where('id', $user->id)->update([
                    'img' => $upload
                    ]);

                    return redirect('profile#tab_1_1')->with('success','Profile image successfully updated');
        }
        if (isset($data['Change_Password'])) {
                $this->validate($request, [
                    'password' => 'required|min:6|confirmed',
                    'password_confirmation' => 'required|min:6',
                    'current_password' => 'required|min:6|current_password',
                 ]);
                User::where('id', $user->id)->update([
                'password' => bcrypt($data['password'])
                ]);
                return redirect('profile#tab_1_1')->with('success','password successfully updated');





        }
      }

  
       
      if($user->role=='3'){  return view('user.profile')->with('user',$user); }      
    }
    
    
     function contributions(){
        $user = Auth::user();
         $wallets= User_wallets::where('user_id',$user->id)
                            ->join('wallets', 'wallets.id', '=', 'user_wallets.wallet_id')
                            ->where('wallets.wallet_category_id',1)
                            ->select('user_wallets.wallet_id', 'wallets.wallet_name as wallet_name')
                            ->get();
       return view('user.walletlist')->with('user',$user)->with('wallets',$wallets); 
     }

     function quickcash(){
         $user = Auth::user();
         $wallets= User_wallets::where('user_id',$user->id)
                            ->join('wallets', 'wallets.id', '=', 'user_wallets.wallet_id')
                            ->where('wallets.wallet_category_id',3)
                            ->select('user_wallets.wallet_id', 'wallets.wallet_name as wallet_name')
                            ->get();
       return view('user.walletlist')->with('user',$user)->with('wallets',$wallets); 
     }

    function loans(){ 
     $user = Auth::user();
     $wallets= User_wallets::where('user_id',$user->id)
                            ->join('wallets', 'wallets.id', '=', 'user_wallets.wallet_id')
                            ->where('wallets.wallet_category_id',2)
                            ->select('user_wallets.wallet_id', 'wallets.wallet_name as wallet_name')
                            ->get();
       return view('user.walletlist')->with('user',$user)->with('wallets',$wallets); 
     }
    function projects(){
       $user = Auth::user();
        $wallets= User_wallets::where('user_id',$user->id)
                            ->join('wallets', 'wallets.id', '=', 'user_wallets.wallet_id')
                            ->where('wallets.wallet_category_id',4)
                            ->select('user_wallets.wallet_id', 'wallets.wallet_name as wallet_name')
                            ->get();
       return view('user.walletlist')->with('user',$user)->with('wallets',$wallets);  
     }


  function newapplication(Request $request,$id=NULL){
  $data=$request->input();
  $user = Auth::user();
  if(count($data) && !isset($id)){
           $this->validate($request, [
                    'facility_id' => 'required',
                    'amount_requested' => 'required',
                    'tenors' => 'required',
                    'payment_schedule' => 'required',
                    'bank_verification_no' => 'required',
                    'payslip_1' => 'required',
                    'payslip_2' => 'required',
                    'account_statment' => 'required',
                    'bank_verification_no'=>'required'
                 ]);


    $paytermAmount=$this->paytermAmount($data['amount_requested'],$data['payment_schedule'],$data['tenors']);

     $data['quarterly_payment']=$paytermAmount['quarterly_payment'];
     $data['monthly_payment']=$paytermAmount['monthly_payment'];
     $data['annually_payment']=$paytermAmount['annually_payment'];
     $data['user_id']=$user->id; 
     $data['tenor']=$data['tenors'];    
     $data['payslip_1']= $payslip_1=Common::upload($user->id,$request->payslip_1,'payslip');
     $data['payslip_2']= $payslip_2=Common::upload($user->id,$request->payslip_2,'payslip');
     $data['account_statment']= $account_statment=Common::upload($user->id,$request->account_statment,'account_statment');
     $data['created_at']= \Carbon\Carbon::now();
     $data['updated_at']= \Carbon\Carbon::now();





     unset($data['_token']);
    $Loan_application=Loan_application::create($data);

         $payment_plan=  $this->payment_plan($data);
      foreach ($payment_plan as $key => $value) {

          $value['loan_id']=$Loan_application->id;
          $value['user_id']=$user->id;
          $value['s_no']=$key+1;
         Repayment_plan::create($value);
      }

      return redirect('newapplication/'.$Loan_application->id);
    }


      $loan_application=NULL;
      $repayment_plan=NULL;
      $facility_detail=null;
      if(isset($id)){

        if(isset($request->direct_debit_auth_print)):

 $direct_debit_auth_print=Common::upload($user->id,$request->direct_debit_auth_print,'direct_debit_auth_print');
   loan_application::where('id',$id)->update(['direct_debit_auth_print'=>$direct_debit_auth_print,'status'=>'1']);
        endif;

 
      

         $loan_application= loan_application::where('id',$id)->first();
         $repayment_plan= Repayment_plan::where('loan_id',$id)->get();
         $facility_detail= $this->load_facility_detail($loan_application->facility_id,$type='array');
         $facility=Facility::where('id',$loan_application->facility_id)->pluck('name','id');



        if($loan_application->status==1){
            return redirect('application/loans');
          }else{
            return view('user.newapplication', compact('user','facility','loan_application','repayment_plan','facility_detail'));
          }
      }else{
        $facility=Facility::where('status',1)->pluck('name','id');
        return view('user.newapplication', compact('user','facility','loan_application','repayment_plan','facility_detail'));
      }


      


      
}

function load_facility($id){
       $user = Auth::user();
       $facility_category= Facility::where('facility_categories',$id )->get();
       $user_wallet=array();
       foreach ($facility_category as  $value) {
          $user_wallet[]=['id'=>$value->id,'name'=>$value->name];
       }
      echo json_encode($user_wallet);
}


function load_facility_detail($id,$type='json'){
       $user = Auth::user();
       $months=Common::$month;
       $facility= Facility::where('id',$id )->first();

       $quarterly_payment_date=json_decode($facility['quarterly_payment_date']);
       $quarterly_payment_dates='';
       foreach ($quarterly_payment_date as $key => $value) {
          
          $quarterly_payment_dates= $quarterly_payment_dates. ' '.$months[$value->month].' '.$value->date .',';
       }

       $payment_schedule=json_decode($facility['payment_schedule']);
       $payment_schedules='';
       $selectschedule='';
       foreach ($payment_schedule as $key => $value) {
               $Payment_schedule=  Payment_schedule::where('id',$value)->first();
               $payment_schedules= $payment_schedules. ' '.$Payment_schedule["name"].',';
               $selectschedule[]=['id'=>$value,'name'=>$Payment_schedule["name"]];
       }
       $quarterly_payment_dates= trim($quarterly_payment_dates,',');
       $payment_schedules= trim($payment_schedules,',');

      $annualy_payment_date=json_decode($facility['annualy_payment_date']);
      $annualy_payment_date=$months[$annualy_payment_date->month].' '.$annualy_payment_date->date;

    $select_tenor='';
    for($i=1 ;$i <= ($facility['maximum_tenor']*12);$i++):
     $select_tenor[$i]=$i;
    endfor;
    $select_tenor=json_encode($select_tenor);
    $selectschedule=json_encode($selectschedule);

       $returnData=([
        'facility_id'=>$id,
       'name'=>$facility['name'],
       'description'=>$facility['description'],
       'min_amount'=>$facility['min_amount'],
       'max_amount'=>$facility['max_amount'],
       'interest_rate'=>$facility['interest_rate'],
       'maximum_tenor'=>$facility['maximum_tenor'],
       'payment_schedule'=>$payment_schedules,
       'monthly_payment_date'=> $facility['monthly_payment_date'].Common::ordinal_suffix($facility['monthly_payment_date']),
       'quarterly_payment_date'=>$quarterly_payment_dates,
       'annualy_payment_date'=>$annualy_payment_date,
       'monthly_interest_payment_date'=> $facility['monthly_interest_payment_date'].Common::ordinal_suffix($facility['monthly_interest_payment_date']) ,
       'processing_fee'=>$facility['processing_fee'].'%',
       'insurance_fee'=>$facility['insurance_fee'].'%',
       'management_fee'=>$facility['management_fee'].'%',
       'select_tenor'=>$select_tenor,
       'selectschedule'=>$selectschedule,
      ]);
       
     if($type=='json'){ echo json_encode($returnData);}else{ return $returnData;}

}





function application_form(Request $request,$id){
      $user = Auth::user();
     $Facility= Facility::where('id',$id)->first();
     $facility_category= facility_category::where('id',$Facility->facility_categories)->first();
     $data=$request->input();
     if(isset($data) && count($data) >0){
  


   $filesArray=array();
   $files=$request->file;
   if(count($files)>0){
       foreach ($files as $key => $file) {
         $title=$data['file_name'];
          $filesArray[]=['file'=>Common::upload($user->id,$file,'Identity Proof'),'title'=>$title[$key]];
       }
      }
  

if($data['facility_category']==1){
 $this->validate($request, [
         'company' => 'required',
         'dept_location' => 'required' ,
         'amount_in_words' => 'required',
         'amount_in_figure' => 'required|numeric',
         'tenor' => 'required' ,
         'purpose_for_cash_request' => 'required',
         'thrift_loan_of' => 'required',
         'thrift_loan_of_n' => 'required|numeric' ,
         'deduction_amount' => 'required',
         'deduction_amount_n' => 'required|numeric' ,
         'effect_from' => 'required',
         'signature'=> 'required',
         'salary_monthly' => 'required|numeric',
         'file'=> 'required',
      ]);
  $signature= Common::upload($user->id,$request->signature,'signature');
    $data=   [
               'company' => $data['company'],
               'dept_location' => $data['dept_location'],
               'amount_in_words' => $data['amount_in_words'],
               'amount_in_figure' => $data['amount_in_figure'],
               'tenor' => $data['tenor'],
               'purpose_for_cash_request' => $data['purpose_for_cash_request'],
               'thrift_loan_of' => $data['thrift_loan_of'],
               'thrift_loan_of_n' => $data['thrift_loan_of_n'],
               'deduction_amount' => $data['deduction_amount'],
               'deduction_amount_n' => $data['deduction_amount_n'],
               'effect_from' => $data['effect_from'],
               'salary_monthly' => $data['salary_monthly'],
               'files' => json_encode($filesArray),
               'user_id' => $user->id,
               'facility_id' => $data['facility_id'],
               'facility_category' => $data['facility_category'],
               'signature' => $signature,
         ];

      }

      if($data['facility_category']==2){

      $this->validate($request, [
         'company' => 'required',
         'dept_location' => 'required' ,
         'car_brand' => 'required',
         'car_color' => 'required',
         'car_reg_name' => 'required' ,
         'car_reg_add' => 'required',
         'company2' => 'required',
       'car_delevery_add' => 'required',
         'payment_option' => 'required',
         'deduction_amount_n' => 'required|numeric' ,
         'deduction_amount_anual' => 'required|numeric',
         'signature'=> 'required',
           'file'=> 'required',
      ]);
       $signature= Common::upload($user->id,$request->signature,'signature');
    $data=   [
               'company' => $data['company'],
               'dept_location' => $data['dept_location'],
               'car_brand' => $data['car_brand'],
               'car_color' => $data['car_color'],
               'car_reg_name' => $data['car_reg_name'],
               'car_reg_add' => $data['car_reg_add'],
                'car_delevery_add' => $data['car_delevery_add'],
                'payment_option' => $data['payment_option'],
               'company2' => $data['company2'],
         
               'deduction_amount_n' => $data['deduction_amount_n'],
               'deduction_amount_anual' => $data['deduction_amount_anual'],
               'files' => json_encode($filesArray),
               'user_id' => $user->id,
               'facility_id' => $data['facility_id'],
               'facility_category' => $data['facility_category'],
               'signature' => $signature,
         ];
      }

      if($data['facility_category']==3){
$this->validate($request, [
         'company' => 'required',
         'dept_location' => 'required' ,
         'amount_in_words' => 'required',
         'amount_in_figure' => 'required|numeric',
         'repayment_duration' => 'required',
         'salary_monthly' => 'required',
         'purpose_for_cash_request' => 'required',
         'cash_loan_of' => 'required',
         'cash_loan_of_n' => 'required|numeric' ,
         'deduction_amount' => 'required',
         'deduction_amount_n' => 'required|numeric' ,
         'effect_from' => 'required',
         'signature'=> 'required',
           'file'=> 'required',
         
      ]);
 $signature= Common::upload($user->id,$request->signature,'signature');
    $data=   [
               'company' => $data['company'],
               'dept_location' => $data['dept_location'],
               'amount_in_words' => $data['amount_in_words'],
               'amount_in_figure' => $data['amount_in_figure'],
              'salary_monthly' => $data['salary_monthly'],
               'purpose_for_cash_request' => $data['purpose_for_cash_request'],
               'cash_loan_of' => $data['cash_loan_of'],
               'cash_loan_of_n' => $data['cash_loan_of_n'],
               'deduction_amount' => $data['deduction_amount'],
               'deduction_amount_n' => $data['deduction_amount_n'],
               'files' => json_encode($filesArray),
               'repayment_duration' => $data['repayment_duration'],
               'effect_from' => $data['effect_from'],
               'user_id' => $user->id,
               'facility_id' => $data['facility_id'],
               'facility_category' => $data['facility_category'],
               'signature' => $signature,
         ];

      }

  
         Loan_application::create($data);

          return redirect('dashboard')->with('success','password successfully updated');
    }
   
















     if($facility_category->id==1){
           return view('user.application_form_loan')->with('user',$user)->with('Facility',$Facility)->with('facility_category',$facility_category);
     }

     if($facility_category->id==2){
           return view('user.application_form_projects')->with('user',$user)->with('Facility',$Facility)->with('facility_category',$facility_category);
     }

    if($facility_category->id==3){
           return view('user.application_form_facility')->with('user',$user)->with('Facility',$Facility)->with('facility_category',$facility_category);
     }

}


function saveapplication_form(Request $request){
$user = Auth::user();
   $data=$request->input();
   if(count($data)):
         $this->validate($request, [
             'company' => 'required',
             'dept_location' => 'required' ,
             'amount_in_words' => 'required',
             'amount_in_figure' => 'required',
             'repayment_duration' => 'required' ,
             'purpose_for_cash_request' => 'required',
             'deduct_monthly' => 'required',
             'deduct_annually' => 'required' ,
          ]);
        $data=   [
               'company' => $data['company'],
               'dept_location' => $data['dept_location'],
               'amount_in_words' => $data['amount_in_words'],
               'amount_in_figure' => $data['amount_in_figure'],
               'repayment_duration' => $data['repayment_duration'],
               'purpose_for_cash_request' => $data['purpose_for_cash_request'],
               'deduct_monthly' => $data['deduct_monthly'],
               'deduct_annually' => $data['deduct_annually'],
               'facility_category' => $data['facility_category'],
               'user_id' => $user->id,
              'facility_id' => $data['facility_id'],

         ];

        echo Loan_application::create($data);
        $msg="Your application is submitted successfully";

        else:   
         return view('user.newapplication')->with('user',$user);     
        endif; 

}


 function app_loans(){
      $user = Auth::user();
        
         $data = array( );
         $app_data=Loan_application::where('user_id',$user->id)->get();
         foreach ($app_data as $key => $app_datas) {
           $data['id']=$app_datas->id;
           $data['facility_id']=$app_datas->facility_id;
           $Facility= Facility::where('id',$app_datas->facility_id)->first();
           $data['facility_name']=$Facility->name;
           $data['tenors']=$app_datas->tenors ;

           $Payment_schedule=Payment_schedule::where('id',$app_datas->payment_schedule)->first();
          $data['payment_schedule']=$Payment_schedule['name'];
           $data['status']=$app_datas->status;

           $data['approvel_status']=$app_datas->approvel_status;
        
         }
        return view('user.all_appications',compact('user','data'));
  }

     


   function app_facility(){
      $user = Auth::user();

     
      $app_data=Loan_application::join('facilities','facilities.id','=','loan_applications.facility_id')
        ->where('user_id',$user->id)->where('facility_category','3')
         ->select('loan_applications.*', 'facilities.name as facilities_name')
        ->get();
        return view('user.all_appications')->with('user',$user)->with('app_datas',$app_data)->with('facility_category','Facility');
  }

   function app_projects(){
      $user = Auth::user();

     
      $app_data=Loan_application::join('facilities','facilities.id','=','loan_applications.facility_id')
        ->where('user_id',$user->id)->where('facility_category','2')
         ->select('loan_applications.*', 'facilities.name as facilities_name')
        ->get();
        return view('user.all_appications')->with('user',$user)->with('app_datas',$app_data)->with('facility_category','Project');
  }

  /* function app_facility(){
      $user = Auth::user();
      $facility_categories=facility_category::all();
     return view('user.newapplication')->with('user',$user)->with('facility_categories',$facility_categories);
  }
   function app_projects(){
      $user = Auth::user();
      $facility_categories=facility_category::all();
     return view('user.newapplication')->with('user',$user)->with('facility_categories',$facility_categories);
  }*/



function view_my_application($id){
    $user = Auth::user();

     
      $app_data=Loan_application::join('facilities','facilities.id','=','loan_applications.facility_id')
        ->where('loan_applications.user_id',$user->id)->where('loan_applications.id',$id)
         ->select('loan_applications.*', 'facilities.name as facilities_name')
        ->first();

     $Facility= Facility::where('id',$app_data->facility_id)->first();
     $facility_category= facility_category::where('id',$Facility->facility_categories)->first();


     if($facility_category->id==1){
           return view('user.view_form_loan')->with('user',$user)->with('Facility',$Facility)->with('facility_category',$facility_category)->with('app_datas',$app_data);
     }

     if($facility_category->id==2){
    
             return view('user.view_form_projects')->with('user',$user)->with('Facility',$Facility)->with('facility_category',$facility_category)->with('app_datas',$app_data);
     }

    if($facility_category->id==3){
           return view('user.view_form_facility')->with('user',$user)->with('Facility',$Facility)->with('facility_category',$facility_category)->with('app_datas',$app_data);
     }






}




function wallet_summary($wallet_id){
  $user = Auth::user();
  $WalletUsers =$user;
  $wallet_category=wallet_category::where('id',$wallet_id)->first();


  $no_of_deposit=Debit_credit::where('email', $WalletUsers->email)
              ->where('type', '1')
              ->where('wallet_category',$wallet_id)
              ->count();
  $no_of_withdrawals=Debit_credit::where('email', $WalletUsers->email)
              ->where('type', '2')
              ->where('wallet_category',$wallet_id)
              ->count();


  echo $debit= Debit_credit::where('email', $WalletUsers->email)
              ->where('type', '1')
              ->where('wallet_category',$wallet_id)
              ->sum('amount');

              echo '<br>';
  echo $credit= Debit_credit::where('email', $WalletUsers->email)
              ->where('type', '2')
              ->where('wallet_category',$wallet_id)
              ->sum('amount');
              echo '<br>';
 echo  $total_amount=($debit-$credit);


 $Wallets= Wallet::where('wallet_category_id',$wallet_id)
           ->where('status','1')
           ->pluck('wallet_name', 'id');


$Wallets_amts= Wallet::where('wallet_category_id',$wallet_id)->get();
$WalletsDetails=array();
foreach ($Wallets_amts as $key => $Wallets_amt) {


        $debit= Debit_credit::where('email', $WalletUsers->email)
                    ->where('wallet_id',$Wallets_amt->id)
                    ->where('type', '1')
                    ->sum('amount');
         $credit= Debit_credit::where('email', $WalletUsers->email)
                    ->where('wallet_id',$Wallets_amt->id)
                    ->where('type', '2')
                    ->sum('amount');
         $total=($debit-$credit);

    if($Wallets_amt->status==1){$Wallets_amt->status='Active';}else{$Wallets_amt->status='Deactive';}

$WalletsDetails[]=['id'=>$Wallets_amt->id,'wallet_name'=>$Wallets_amt->wallet_name,'status'=>$Wallets_amt->status,'debit'=>$debit,'credit'=>$credit,'total_amount'=>$total];
}




  return  view('user.wallet_summary')->with('user',$user)->with('WalletUsers',$WalletUsers)->with('wallet_category',$wallet_category)->with('total_amount',$total_amount)->with('debit',$debit)->with('credit',$credit)->with('no_of_deposit',$no_of_deposit)->with('no_of_withdrawals',$no_of_withdrawals)->with('Wallets',$Wallets)->with('WalletsDetails',$WalletsDetails);
}



    function debit_credit_summary(Request $request,$user_id,$wallet_category){

  $user = Auth::user();
  $data=$request->input(); 
  if(count($data)>0){
/*=======================================================*/
  if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
   if(isset($_REQUEST["id"])){
         foreach ($_REQUEST["id"] as $key => $value) {
          $this->change_status('users',$value);
         }
     }
    $records["customActionStatus"] = "OK"; 
    $records["customActionMessage"] = "Group action successfully has been completed. !"; 
  }
  $Debit_credit = Debit_credit::where('user_id', $user_id)->where('wallet_category',$wallet_category)->get();
  $iTotalRecords = $Debit_credit->count();
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);
  $records = array();
  $records["data"] = array(); 
  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
  $Debit_credit = Debit_credit::where('user_id', $user_id)
                   ->where('wallet_category',$wallet_category)
                  ->take($iDisplayLength)
                  ->skip($iDisplayStart)
                  ->orderBy('id','DESC')
                  ->get();
  $i = $iDisplayStart;

 $debit= Debit_credit::where('user_id', $user_id)
              ->where('type', '1')
              ->where('wallet_category',$wallet_category)
              ->sum('amount');
  $credit= Debit_credit::where('user_id', $user_id)
              ->where('type', '2')
              ->where('wallet_category',$wallet_category)
              ->sum('amount');
            
  $ttl= $debit-$credit;

 $records["data"][]=['','','','','<h4>'.$ttl.'</h4>'] ;


  foreach ( $Debit_credit as $key => $value) {
           $date=date('Y-m-d',strtotime($value['created_at']));
           $debit='';
           $credit='';
           if($value['type']==1){$debit= $value['amount']; }
           if($value['type']==2){$credit= $value['amount']; }
           $description=$value['discription'];
           $total='';



     
        $status=$value->status?'checked':'' ;
        $records["data"][] = [$date,$debit,$credit,$description,$total];
  $i++;}








  $records["draw"] = $sEcho;
  $records["recordsTotal"] = $iTotalRecords;
  $records["recordsFiltered"] = $iTotalRecords;
  
  echo json_encode($records);
/*=======================================================*/



  }else{
    $all_users = User::where('role', '3')->get();
    return view('admin.userlist')->with('user',$user)->with('all_users',$all_users);
  }
  



}



function get_repayment_schedule(Request $request){
        $data= $request->input();
        echo json_encode($this->payment_plan($data));
}



function payment_plan($data=NULL){

        if(isset($data['facility_id'])){
          $facility=$data['facility']=$data['facility_id'];
        }

        $amount_requested=$data['amount_requested'];
        $tenors= $data['tenors'] ;
        $facility=$data['facility'];
        $payment_schedule=$data['payment_schedule'] ;
           
           $Monthly=0;
           $Quarterly=0;
           $Annually=0;

           //Monthly
           if($payment_schedule==1){
            $Monthly= ($amount_requested)/$tenors;
           }
            //Quarterly
           if($payment_schedule==2){
             $Quarterly= ($amount_requested *3)/$tenors ;
           }
          //Annually
           if($payment_schedule==3){
             $Annually= ($amount_requested *12)/$tenors ;
           }

           //Monthly/Quarterly

            if($payment_schedule==4){
              $Monthly= $amount_requested/(2*$tenors);
              $Quarterly=(3*$amount_requested)/(2*$tenors);
            }

            //Monthly/Quarterly Annually
            if($payment_schedule==5){
              $Monthly=$amount_requested/(3*$tenors);
              $Quarterly=$amount_requested/$tenors;
              $Annually=4*$amount_requested/$tenors;
            }

          //Quarterly/Annually
            if($payment_schedule==6){
              $Quarterly=($amount_requested*3)/(2*$tenors);
              $Annually=($amount_requested*6)/(2*$tenors);

            }

           // Monthly/Annually
            if($payment_schedule==7){
              $Monthly=$amount_requested/(2*$tenors);
              $Annually=(6*$amount_requested)/($tenors);
            }



////////////////////////////////////////////////////////////
 //     Facility Detail Start
/////////////////////////////////////////////////////////////
       $facility= Facility::where('id',$data['facility'])->first();


       $monthly_payment_date= $facility['monthly_payment_date'];

       $quarterly_payment_date=json_decode($facility['quarterly_payment_date']);
       foreach ($quarterly_payment_date as $key => $value) {
          $quarterly_payment_dates[$key]=$value->month.'-'.$value->date ;
       }

      $annualy_payment_date=json_decode($facility['annualy_payment_date']);
      $annualy_payment_date=$annualy_payment_date->month.'-'.$annualy_payment_date->date;


////////////////////////////////////////////////////////////
     // Facility Detail Closed
/////////////////////////////////////////////////////////////


$repayment_array=[];

//monthly cycle 
  if($Monthly>0){
       $start_date=date('Y-m-').$monthly_payment_date;
      if(date('d')>$monthly_payment_date){
       $start_date=$this->addOneMonth($start_date);
       }
            for ($i=0; $i < $tenors; $i++) { 

               
                     $interest=  ($Monthly*$facility['interest_rate'])/(100*12);
                     $repayment_array[]=[
                                         'date' =>date('Y-m-d',strtotime($this->addOneMonth($start_date,$i))) ,
                                         'cycle'=>'Monthly'  ,
                                         'amount'=> $Monthly ,
                                         'interest'=>$interest
                                         ];                                
            }
  }
  
//quarterly 

if($Quarterly>0){
      $no_of_quarters=$tenors/3;
      
      $quarterly_payment_date_1=date('Y-m-d',strtotime('2017-'.$quarterly_payment_dates[1]));
       $quarterly_payment_date_2=date('Y-m-d',strtotime('2017-'.$quarterly_payment_dates[2]));
      $quarterly_payment_date_3=date('Y-m-d',strtotime('2017-'.$quarterly_payment_dates[3]));
      $quarterly_payment_date_4=date('Y-m-d',strtotime('2017-'.$quarterly_payment_dates[4]));


     $start_date=date('Y-m-d');
     $qcycle=[];
     if(strtotime($quarterly_payment_date_1)>=strtotime($start_date)){
       $start_date=$quarterly_payment_date_1;

        $qcycle[]=$quarterly_payment_date_1;
        $qcycle[]=$quarterly_payment_date_2;
        $qcycle[]=$quarterly_payment_date_3;
        $qcycle[]=$quarterly_payment_date_4;

     }elseif (strtotime($quarterly_payment_date_2)>=strtotime($start_date)) {
         $start_date=$quarterly_payment_date_2;
        
        $qcycle[]=$quarterly_payment_date_2;
        $qcycle[]=$quarterly_payment_date_3;
        $qcycle[]=$quarterly_payment_date_4;
        $qcycle[]=$quarterly_payment_date_1;

     }elseif (strtotime($quarterly_payment_date_3)>=strtotime($start_date)) {
         $start_date=$quarterly_payment_date_3;

       
        $qcycle[]=$quarterly_payment_date_3;
        $qcycle[]=$quarterly_payment_date_4;
        $qcycle[]=$quarterly_payment_date_1;
        $qcycle[]=$quarterly_payment_date_2;

     }elseif (strtotime($quarterly_payment_date_4)>=strtotime($start_date)) {
         $start_date=$quarterly_payment_date_4;


        $qcycle[]=$quarterly_payment_date_4;
        $qcycle[]=$quarterly_payment_date_1;
        $qcycle[]=$quarterly_payment_date_2;
        $qcycle[]=$quarterly_payment_date_3;
     }else{

        $start_date=$quarterly_payment_date_1;

        $qcycle[]=$quarterly_payment_date_1;
        $qcycle[]=$quarterly_payment_date_2;
        $qcycle[]=$quarterly_payment_date_3;
        $qcycle[]=$quarterly_payment_date_4;
     }
    $start_date;
    $m=0;
    $prev=date('Y-m-d');

    for ($i=0; $i < $no_of_quarters; $i++) { 
    $date=$qcycle[$m++];

        if(strtotime($prev) > strtotime($date)){
          $py=date('Y',strtotime($prev));
          $date=$py.'-'.date('m-d',strtotime($date));
               if(strtotime($prev) > strtotime($date)){
                $date=($py+1).'-'.date('m-d',strtotime($date));
               }
          }
          $interest=  ($Monthly*$facility['interest_rate']*3)/(100*12);
        $repayment_array[]=[
                                             'date' =>date('Y-m-d',strtotime($date)),
                                             'cycle'=>'Quarterly'  ,
                                             'amount'=> $Quarterly  ,
                                             'interest'=>$interest
                                             ];    
          $prev=$date;
          if($m==4){$m=0;}
          }
}

//Annually
if ($Annually >0) {
  $no_of_years = $tenors/12;
  $start_date=date('Y').'-'.$annualy_payment_date;
  if(strtotime(date('Y-m-d')) > strtotime($start_date)){
    $start_date=$this->addOneYear($start_date,1);
  }
  
  for ($i=0; $i <  $no_of_years; $i++) { 
          $interest=  ($Monthly*$facility['interest_rate'])/(100);
    //interest_rate
   $repayment_array[]=[
                                             'date' =>date('Y-m-d',strtotime($this->addOneYear($start_date,$i))) ,
                                             'cycle'=>'Annually'  ,
                                             'amount'=> $Annually ,
                                             'interest'=>$facility['interest_rate'] 
                                             ];   
  }

}

$this->aasort($repayment_array,"date");

$repayment_data=[];
foreach($repayment_array as $value){
  $repayment_data []=$value;
}

 return $repayment_data;
}


 function addOneMonth($date,$n=1){
  $time = strtotime($date);
  $final = date("Y-m-d", strtotime("+".$n." month", $time));
   return $final ;
 }

function addOneYear($date,$n=1){
  return date("Y-m-d", strtotime(date("Y-m-d", strtotime($date)) . " + ".$n." year"));
}

function aasort (&$array, $key) {
    $sorter=array();
    $ret=array();
    reset($array);
    foreach ($array as $ii => $va) {
        $sorter[$ii]=$va[$key];
    }
    asort($sorter);
    foreach ($sorter as $ii => $va) {
        $ret[$ii]=$array[$ii];
    }
    $array=$ret;
}

function paytermAmount($amount_requested=0,$payment_schedule=0,$tenors=0){
  $Monthly=0;
  $Quarterly=0;
  $Annually=0;

 //$Monthly
 if($payment_schedule==1){
  $Monthly= ($amount_requested)/$tenors;
 }
  //$Quarterly
 if($payment_schedule==2){
   $Quarterly= ($amount_requested *3)/$tenors ;
 }
//$Annually
 if($payment_schedule==3){
   $Annually= ($amount_requested *12)/$tenors ;
 }

 //$Monthly/$Quarterly

  if($payment_schedule==4){
    $Monthly= $amount_requested/(2*$tenors);
    $Quarterly=(3*$amount_requested)/(2*$tenors);
  }

  //$Monthly/$Quarterly $Annually
  if($payment_schedule==5){
    $Monthly=$amount_requested/(3*$tenors);
    $Quarterly=$amount_requested/$tenors;
    $Annually=4*$amount_requested/$tenors;
  }

//$Quarterly/$Annually
  if($payment_schedule==6){
    $Quarterly=($amount_requested*3)/(2*$tenors);
    $Annually=($amount_requested*6)/(2*$tenors);

  }

 // $Monthly/$Annually
  if($payment_schedule==7){
    $Monthly=$amount_requested/(2*$tenors);
    $Annually=(6*$amount_requested)/($tenors);
  }
return  array('monthly_payment' =>  $Monthly,'quarterly_payment'=>$Quarterly,'annually_payment'=>$Annually );

 }
 
 function direct_debit_authorization_pdf($id=NULL){
   
 $user = Auth::user();
 $loan_application=Loan_application::where('id',$id)->first();
 $repayment_plan=Repayment_plan::where('loan_id',$id)->where('s_no','1')->first();
 $pdf = PDF::loadView('user.direct_debit_authorization_pdf', compact('user', 'loan_application','repayment_plan'));
 return $pdf->stream('Direct Debit Authorization.pdf','D');
 

 }

function application_package_print($id=null){
$user = Auth::user();
 $loan_application=Loan_application::where('id',$id)->first();
 $repayment_plan=Repayment_plan::where('loan_id',$id)->where('s_no','1')->first();


$data=['facility_id'=>$loan_application->facility_id, 'amount_requested'=>$loan_application->amount_requested,'tenors'=>$loan_application->tenors,'payment_schedule'=>$loan_application->payment_schedule];
$payment_plan=$this-> payment_plan($data);


 $pdf = PDF::loadView('user.direct_debit_authorization_pdf', compact('user', 'loan_application','repayment_plan'));
 return $pdf->stream('Application Package.pdf','D');
 

}



}

