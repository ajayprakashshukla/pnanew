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
                    'role' => '3',
                ]);
                return redirect('profile#tab_1_1')->with('success','Personal info successfully updated');
        }
        
        if (isset($data['Change_Avatar'])) {
                    $this->validate($request, [
                    'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $imageName = time().'.'.$request->img->getClientOriginalExtension();
                    $request->img->move(public_path('images'), $imageName);
                    $user->id;
                    User::where('id', $user->id)->update([
                    'img' => $imageName
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


  function newapplication(){
      $user = Auth::user();
      $facility_categories=facility_category::all();
     return view('user.newapplication')->with('user',$user)->with('facility_categories',$facility_categories);
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


function application_form(Request $request,$id){
      $user = Auth::user();
     $Facility= Facility::where('id',$id)->first();
     $facility_category= facility_category::where('id',$Facility->facility_categories)->first();
     $data=$request->input();
     if(isset($data) && count($data) >0){
  


  $filesArray=array();
   $files=$request->file;
if(isset($files) && (count($files)>0))
  foreach ($files as $key => $file) {
    $filetitle= isset($data['file_name'][$key])?$data['file_name'][$key]:$file->getClientOriginalName();
    $fileName = rand(5,15).time().'.'.$file->getClientOriginalExtension();
       $path=$file->move(public_path('upload'), $fileName);
       $filesArray[]=array('title'=>$filetitle,'name'=>$fileName);
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
         'salary_monthly' => 'required|numeric',
      ]);
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
      ]);
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
         
      ]);
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
         ];

      }

  
        echo Loan_application::create($data);

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

      $wallets= User_wallets::where('user_id',$user->id)
                            ->join('wallets', 'wallets.id', '=', 'user_wallets.wallet_id')
                            ->where('wallets.wallet_category_id',4)
                            ->select('user_wallets.wallet_id', 'wallets.wallet_name as wallet_name')
                            ->get();


      $app_data=Loan_application::join('facilities','facilities.id','=','loan_applications.facility_id')
        ->where('user_id',$user->id)->where('facility_category','1')
         ->select('loan_applications.*', 'facilities.name as facilities_name')
        ->get();
        return view('user.all_appications')->with('user',$user)->with('app_datas',$app_data)->with('facility_category','Loan');
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

}