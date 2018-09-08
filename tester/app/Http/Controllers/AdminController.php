<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Excel;
use App\User;
use App\Admin;
use App\Wallet;
use App\wallet_category;
use App\setting;
use App\facility_category;
use App\Facility;
use App\Revenue;
use App\User_wallets;
use App\Loan_application;
use App\Debit_credit;
use App\Payment_schedule;
use App\Common\Common;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

public function __construct()
{
 $this->middleware('auth:admin');

}


public function index(Request $request){
      $user = Auth::user();

     if(!$user->password_match){
      return redirect('admin/profile#tab_1_3')->with('success','Please chenge the password');
     }

      if($user->role==1){

 
    $created_at=User::get();
    $date=array();
    $month=array();
    $year=array();
    foreach ($created_at as $value) {
            $date[]=date('Y-m-d',strtotime($value->created_at));
            $month[]=date('m-Y',strtotime($value->created_at));
            $year[]=date('Y',strtotime($value->created_at));
    }

    $date=array_unique($date);
    $month=array_unique($month);
    $year=array_unique($year);

   $user_daily=   [] ;
   $member_daily=  []  ;
   foreach ($date as $value) {
       $users = User::whereDate('created_at', $value)->where('role',3)->count();
       $members = User::whereDate('created_at', $value)->where('id','!=',1)->where('role','!=','3')->count();
       if($users){$user_daily[$value]= $users; }
       if($members){$member_daily[$value]= $members ;}
   }

$user_monthly=  []  ;
$member_monthly= []   ;
foreach ($month as $value) {
       $users = User::whereMonth('created_at', $value)->where('role',3)->count();
       $members = User::whereMonth('created_at', $value)->where('id','!=',1)->where('role','!=','3')->count();
       if($users){$user_monthly[$value]= $users; }
       if($members){$member_monthly[$value]= $members ;}
   }



$user_yearly=   [] ;
$member_yearly=  []  ;
foreach ($year as $value) {
       $users = User::whereYear('created_at', $value)->where('role',3)->count();
       $members = User::whereYear('created_at', $value)->where('role','!=','3')->where('id','!=',1)->count();
       if($users){$user_yearly[$value]= $users; }
       if($members){$member_yearly[$value]= $members ;}
   }


   $no_of_members=Admin::count();
   $revenues=Revenue::get();
   $total_revenue=Revenue::sum('revenue');
   $total_loan_amount=  Loan_application::sum('approved_ammount');
   

//////////////////////////for revenue chart///////////////////////////
/*
var revenue_monthly;
var revenue_yearly;
var revenue_daily;
*/


$total_revenue=Revenue::sum('revenue');
$revenue=Revenue::get();
    $date=array();
    $month=array();
    $year=array();
    foreach ($revenue as $value) {
            $date[]=date('Y-m-d',strtotime($value->dates));
            $month[]=date('m-Y',strtotime($value->dates));
            $year[]=date('Y',strtotime($value->dates));
    }

    $date=array_unique($date);
    $month=array_unique($month);
    $year=array_unique($year);
  $revenue_daily=[];
  $revenue_monthly=[];
  $revenue_yearly=[];
    foreach ($date as $key => $value) {
         $revenue_daily[$value] = (Revenue::whereDate('dates', $value)->sum('revenue'));
    }

    foreach ($month as $key => $value) {
         $revenue_monthly[$value] = (Revenue::whereMonth('dates', $value)->sum('revenue'));
    }

    foreach ($year as $key => $value) {
         $revenue_yearly[$value] = (Revenue::whereYear('dates', $value)->sum('revenue'));
    }


////////////////////loan 

/*var Contribution_monthly;
var Contribution_yearly;
var Contribution_daily;


var loan_daily;
var loan_monthly;
var loan_yearly;*/

$loan_application=Loan_application::where('status',1)->get();
    $date=array();
    $month=array();
    $year=array();
    foreach ($loan_application as $value) {
            $date[]=date('Y-m-d',strtotime($value->approvel_date));
            $month[]=date('m-Y',strtotime($value->approvel_date));
            $year[]=date('Y',strtotime($value->approvel_date));
    }

    $date=array_unique($date);
    $month=array_unique($month);
    $year=array_unique($year);
  $loan_daily=[];
  $loan_monthly=[];
  $loan_yearly=[];
    foreach ($date as $key => $value) {
         $loan_daily[$value] = (Loan_application::whereDate('approvel_date', $value)->sum('approved_ammount'));
    }

    foreach ($month as $key => $value) {
         $loan_monthly[$value] = (Loan_application::whereMonth('approvel_date', $value)->sum('approved_ammount'));
    }

    foreach ($year as $key => $value) {
         $loan_yearly[$value] = (Loan_application::whereYear('approvel_date', $value)->sum('approved_ammount'));
    }



////////////////////////////////////////////////////////////////////////


  return view('admin.dashboard',compact(['user_daily','member_daily','user_monthly','member_monthly','user_yearly','member_yearly','no_of_members','revenues','total_revenue','total_loan_amount','loan_daily','loan_monthly','loan_yearly','revenue_monthly','revenue_yearly','revenue_daily']))
                               ->with('user',$user)
                               ->with('wallet_amounts','10000000');
      }
      elseif($user->role==2){
      $loans_data=Loan_application::join('facilities','facilities.id','=','loan_applications.facility_id')
         ->leftjoin('facility_categories','facility_categories.id','=','loan_applications.facility_category')
          ->leftjoin('users','users.id','=','loan_applications.user_id')
         ->where('loan_applications.facility_category',1)
         ->where('loan_applications.status',0)
         ->select('loan_applications.*', 'facilities.name as facilities_name','facility_categories.name as facility_category_name','users.name as user_name')
         ->limit(5)
         ->orderBy('loan_applications.id', 'desc')
        ->get();
      $facility_data=Loan_application::join('facilities','facilities.id','=','loan_applications.facility_id')
         ->leftjoin('facility_categories','facility_categories.id','=','loan_applications.facility_category')
          ->leftjoin('users','users.id','=','loan_applications.user_id')
         ->where('loan_applications.facility_category',3)
         ->where('loan_applications.status',0)
         ->select('loan_applications.*', 'facilities.name as facilities_name','facility_categories.name as facility_category_name','users.name as user_name')
         ->limit(5)
         ->orderBy('loan_applications.id', 'desc')
        ->get();

       $project_data=Loan_application::join('facilities','facilities.id','=','loan_applications.facility_id')
         ->leftjoin('facility_categories','facility_categories.id','=','loan_applications.facility_category')
         ->leftjoin('users','users.id','=','loan_applications.user_id')
         ->where('loan_applications.facility_category',2)
         ->select('loan_applications.*', 'facilities.name as facilities_name','facility_categories.name as facility_category_name','users.name as user_name')
         ->limit(5)
         ->orderBy('loan_applications.id', 'desc')
        ->get();











        return view('admin.approver_dashboard')->with('user',$user)->with('wallet_amounts','500')->with('loans_data',$loans_data)->with('facility_data',$facility_data)->with('project_data',$project_data);
      

      }

      else {
        return redirect('/logout');
      }
    
   }

function home(){
  $user = Auth::user();
  return view('admin.home')->with('user',$user);
}

public function users(Request $request){
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
    $records["customActionMessage"] = "Group action successfully has been completed. Well done!"; 
  }

  

$all_users = User::where('role', '3')->orderBy('id', 'desc');
if(isset($data['name'])){  $all_users =$all_users ->where('name', 'like','%'.$data['name'].'%') ; }
if(isset($data['email'])){ $all_users =$all_users ->where('email', 'like','%'.$data['email'].'%') ; }
if(isset($data['sharp_id'])){$all_users =$all_users ->where('sharp_id', 'like','%'.$data['sharp_id'].'%') ;  }
if(isset($data['mobile_no'])){ $all_users =$all_users ->where('mobile_no', 'like','%'.$data['mobile_no'].'%') ; }
if(isset($data['secondary_email'])){ $all_users =$all_users ->where('secondary_email', 'like','%'.$data['secondary_email'].'%') ; }
if(isset($data['proposed_monthly_income'])){ $all_users =$all_users ->where('proposed_monthly_income', 'like','%'.$data['proposed_monthly_income'].'%') ; }
     
$all_users=$all_users->get();

  $iTotalRecords = $all_users->count();
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);
  $records = array();
  $records["data"] = array(); 
  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;



  
  $all_users = User::where('role', '3')->orderBy('id', 'desc');
if(isset($data['name'])){  $all_users =$all_users ->where('name', 'like','%'.$data['name'].'%') ; }
if(isset($data['email'])){ $all_users =$all_users ->where('email', 'like','%'.$data['email'].'%') ; }
if(isset($data['sharp_id'])){$all_users =$all_users ->where('sharp_id', 'like','%'.$data['sharp_id'].'%') ;  }
if(isset($data['mobile_no'])){ $all_users =$all_users ->where('mobile_no', 'like','%'.$data['mobile_no'].'%') ; }
if(isset($data['secondary_email'])){ $all_users =$all_users ->where('secondary_email', 'like','%'.$data['secondary_email'].'%') ; }
if(isset($data['proposed_monthly_income'])){ $all_users =$all_users ->where('proposed_monthly_income', 'like','%'.$data['proposed_monthly_income'].'%') ; }
     

                       $all_users=$all_users->take($iDisplayLength)->skip($iDisplayStart)->orderBy('id','desc');
                       $all_users=$all_users->get();
  












  


  $i = $iDisplayStart;
  $n=0;
  foreach ( $all_users as $key => $value) {
        $status=$value->status?'checked':'' ;




       $identity_proof=  json_decode($value->identity_proof);
        $document='#';
       if(isset($identity_proof)){
           $identity_proof=($identity_proof);
           $document=$identity_proof ? url('public/upload/').'/'.$identity_proof:'#';
          $document="<a class='btn btn-success btn-sm' href='".$document."' style='background-color: blue;border-color: blue;'>Docs</a>";
       }else{
           $document="<span class='btn btn-sm' style='background-color: gray;border-color: gray;'>Docs</span>";
       }

        if(($value->password)!=''):
            $online_status="<span class='btn btn-sm' style='background-color: green;border-color: green;'>Online</span>";
        else:
           $online_status="<span class='btn btn-sm ' style='background-color: gray;border-color: gray;' >Offline</span>";
        endif;

          
       
        $records["data"][] = array(
        ++$n,
        $value->name,
        $value->email,
        $value->sharp_id,
        $value->mobile_no,
        $value->secondary_email,
        $value->proposed_monthly_income,
        '<table><tr><td>'.$online_status.'</td></tr></table>',
         '<table><tr><td>'.$document.'</td><td><a id="deleteannun" href="javascript:void(0)" onclick ="deletedata('."'userDelete'".','.$value->id.')" class="btn btn-sm btn-danger  ">Delete</a></td><td><a href="'.url('admin/user/'.$value->id).'" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-search"></i> View</a></td></tr></table>
        ',
        );
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


public function usersDetail(Request $request,$id){ 
     $user = Auth::user();
     $details = User::where('id', $id)->first();

        $data=$request->input();
        if(count($data)){
            if (isset($data['persional_info'])) {
                    $this->validate($request, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|email_domain:' . $data['email'] . '|unique:users'. ($details->id ? ",id,$user->id" : ''),
                    'secondary_email' => 'required|email|max:191',
                    'mobile_no' => 'required|min:10|max:11',
                    'office_extension' => 'required|min:5|max:5',
                    'next_of_kin' => 'required|max:191',
                    'relationship_with_next_of_kin' => 'required|max:255',
                    'next_of_kin_phone_number' => 'required|min:10|max:10',
                    'address' => 'required|max:191',
                    'state' => 'required',
                    'country' => 'required',
                    'sharp_id' => 'required',
                    'proposed_monthly_income' => 'required',
                    'lastname' => 'required',
                 ]);
           
                 User::where('id',$details->id)->update([
                    'name' => $data['name'],
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
                    'lastname' => $data['lastname'],
                    'middle_name' => $data['middle_name'],
                    'sharp_id' => $data['sharp_id'],
                    'proposed_monthly_income' => $data['proposed_monthly_income'],
                ]);

                
              return redirect('admin/user/'.$id.'#tab_1_1')->with('success','Personal info successfully updated');
        }
        
        if (isset($data['Change_Avatar'])) {
                    $this->validate($request, [
                    'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $imageName = time().'.'.$request->img->getClientOriginalExtension();
                    $request->img->move(public_path('images'), $imageName);
                    $details->id;
                    User::where('id', $details->id)->update([
                    'img' => $imageName
                    ]);
                    return redirect('admin/user/'.$id.'#tab_1_2')->with('success','Profile image successfully updated');
        }
        if (isset($data['Change_Password'])) {
                $this->validate($request, [
                    'password' => 'required|min:6|confirmed',
                    'password_confirmation' => 'required|min:6',
                    'current_password' => 'required|min:6|current_password',
                 ]);
                User::where('id', $details->id)->update([
                'password' => bcrypt($data['password'])
                ]);
                return redirect('admin/user/'.$id.'#tab_1_3')->with('success','password successfully updated');





        }
      }



      $wallets= User_wallets::where('wallets.user_id',$id)
                            ->join('wallets', 'wallets.id', '=', 'user_wallets.wallet_id')
                            ->select('user_wallets.wallet_id', 'wallets.wallet_name as wallet_name')
                            ->get();

    return view('admin.userdetail')->with('user',$user)->with('details',$details)->with('wallets',$wallets)->with('total_amounts',$this->total_wallet_amount($id));
}



public function  wallets(Request $request)
{
   $user = Auth::user();
   $wallets = Wallet::get();
   $data=$request->input();
   if(count($data)){


/*=======================================================*/
 

  

$all_wallet = Wallet::orderBy('id', 'desc');
if(isset($data['creation_date'])){  $all_wallet =$all_wallet ->where('creation_date', 'like','%'.$data['creation_date'].'%') ; }
if(isset($data['wallet_name'])){ $all_wallet =$all_wallet ->where('wallet_name', 'like','%'.$data['wallet_name'].'%') ; }
if(isset($data['wallet_type'])){$all_wallet =$all_wallet ->where('wallet_type', 'like','%'.$data['wallet_type'].'%') ;  }
if(isset($data['company_email'])){ $all_wallet =$all_wallet ->where('company_email', 'like','%'.$data['company_email'].'%') ; }
if(isset($data['sharp_id'])){ $all_wallet =$all_wallet ->where('sharp_id', 'like','%'.$data['sharp_id'].'%') ; }
if(isset($data['monthly_payment'])){ $all_wallet =$all_wallet ->where('monthly_payment', 'like','%'.$data['monthly_payment'].'%') ; }

if(isset($data['quarterly_payment'])){ $all_wallet =$all_wallet ->where('quarterly_payment', 'like','%'.$data['quarterly_payment'].'%') ; }

if(isset($data['annual_payment'])){ $all_wallet =$all_wallet ->where('annual_payment', 'like','%'.$data['annual_payment'].'%') ; }

if(isset($data['wallet_balance'])){ $all_wallet =$all_wallet ->where('wallet_balance', 'like','%'.$data['wallet_balance'].'%') ; }    
$all_wallet=$all_wallet->get();

  $iTotalRecords = $all_wallet->count();
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);
  $records = array();
  $records["data"] = array(); 
  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;



  
  $all_wallet = Wallet::orderBy('id', 'desc');
if(isset($data['creation_date'])){  $all_wallet =$all_wallet ->where('creation_date', 'like','%'.$data['creation_date'].'%') ; }
if(isset($data['wallet_name'])){ $all_wallet =$all_wallet ->where('wallet_name', 'like','%'.$data['wallet_name'].'%') ; }
if(isset($data['wallet_type'])){$all_wallet =$all_wallet ->where('wallet_type', 'like','%'.$data['wallet_type'].'%') ;  }
if(isset($data['company_email'])){ $all_wallet =$all_wallet ->where('company_email', 'like','%'.$data['company_email'].'%') ; }
if(isset($data['sharp_id'])){ $all_wallet =$all_wallet ->where('sharp_id', 'like','%'.$data['sharp_id'].'%') ; }
if(isset($data['monthly_payment'])){ $all_wallet =$all_wallet ->where('monthly_payment', 'like','%'.$data['monthly_payment'].'%') ; }

if(isset($data['quarterly_payment'])){ $all_wallet =$all_wallet ->where('quarterly_payment', 'like','%'.$data['quarterly_payment'].'%') ; }

if(isset($data['annual_payment'])){ $all_wallet =$all_wallet ->where('annual_payment', 'like','%'.$data['annual_payment'].'%') ; }

if(isset($data['wallet_balance'])){ $all_wallet =$all_wallet ->where('wallet_balance', 'like','%'.$data['wallet_balance'].'%') ; } 

                       $all_wallet=$all_wallet->take($iDisplayLength)->skip($iDisplayStart)->orderBy('id','desc');
                       $all_wallet=$all_wallet->get();

  $i = $iDisplayStart;
  $n=1;
  foreach ( $all_wallet as $key => $value) {
        $status=$value->status?'checked':'' ;

       $identity_proof=  json_decode($value->identity_proof);
        $document='#';
       if(isset($identity_proof)){
           $identity_proof=($identity_proof);
           $document=$identity_proof ? url('public/upload/').'/'.$identity_proof:'#';
          $document="<a class='btn btn-success' href='".$document."' style='background-color: blue;border-color: blue;'>Docs</a>";
       }else{
           $document="<span class='btn ' style='background-color: gray;border-color: gray;'>Docs</span>";
       }

        if(($value->password)!=''):
            $online_status="<span class='btn btn-success' style='background-color: green;border-color: green;'>Online</span>";
        else:
           $online_status="<span class='background-color: gray;border-color: gray;' >Offline</span>";
        endif;

          
       
        $records["data"][] = array(
        $n++,
        date('Y-m-d',strtotime($value->creation_date)),
        $value->wallet_name,
        $value->wallet_type,
        $value->company_email,
        $value->sharp_id,
        $value->monthly_payment,
        $value->quarterly_payment,
        $value->annual_payment,
        $value->wallet_balance,

        '<table><tr><td><a id="deleteannun" href="javascript:void(0)" onclick ="ViewWallet('.$value->id.')" class="btn btn-sm btn-success  ">View</a></td><td><a  href="'.url('admin/editwallets/'.$value->id).'"  class="btn btn-sm btn-primary  ">Edit</a></td></tr></table>',
        );
  $i++;}








  $records["draw"] = $sEcho;
  $records["recordsTotal"] = $iTotalRecords;
  $records["recordsFiltered"] = $iTotalRecords;
  
  echo json_encode($records);




  
    /*==================================================================*/
   }else{
    return view('admin.wallet')->with('user',$user)->with('wallets',$wallets);
   }  


}

function getwallet($id){
 $Wallet= Wallet::where('id',$id)->first();

echo json_encode(['creation_date'=>$Wallet['creation_date'], 'wallet_name'=>$Wallet['wallet_name'], 'wallet_type'=>$Wallet['wallet_type'], 'company_email'=>$Wallet['company_email'], 'sharp_id'=>$Wallet['sharp_id'], 'monthly_payment'=>$Wallet['monthly_payment'], 'quarterly_payment'=>$Wallet['quarterly_payment'] ,'annual_payment'=>$Wallet['annual_payment'], 'wallet_balance'=>$Wallet['wallet_balance']]);
}



public function newWallet(Request $request,$id=NULL   ){ 
    $data=$request->input();

      if(count($data)): 
      $this->validate($request, [
            'wallet_category_id' => 'required',
            'wallet_name' => 'required',
            'loan_applications_id' => 'required',
            'user_id' => 'required',
        ]);

    $Wallet=  Wallet::create(['user_id'=>$data['user_id'],'loan_applications_id'=>$data['loan_applications_id'],'wallet_category_id'=>$data['wallet_category_id'],'wallet_name'=>$data['wallet_name']]);
  /* $wallet_id=$Wallet->id;
     foreach ($data['user_id'] as $key => $value) {
         User_wallets::create(['user_id'=>$value,'wallet_id'=>$wallet_id]);
   }*/
   return redirect('admin/wallets')->with('success','Wallet created successfully');
     endif;

      $user = Auth::user();
      $all_users=User::where('role', 3)->pluck('name', 'id');
      $WalletCategory=wallet_category::all();
      return view('admin.new_wallet')->with('user',$user)->with('WalletCategory',$WalletCategory)->with('all_users',$all_users);
}



public function editwallets(Request $request,$id=NULL   ){ 
   $user = Auth::user();
    $data=$request->input();

      if(count($data)): 

      $this->validate($request, [
            'creation_date' => 'required',
            'wallet_name' => 'required',
            'wallet_type' => 'required',
            'company_email' => 'required',
            'sharp_id' => 'required',
        ]);
unset($data['_token']);
    $Wallet=  Wallet::where('id',$id)->update($data);

  
    return redirect('admin/wallets')->with('success','Wallet created successfully');
     endif;



      $Wallet=  Wallet::where('id',$id)->first();
     
 
 return view('admin.editwallet')->with('user',$user)->with('wallet',$Wallet);
}




 function newApprovers(Request $request, $id=NULL){
   $data=$request->input();

   if(count($data)):
          $password=$data['password'];
         $this->validate($request, [
             'name' => 'required',
             'lastname' => 'required',
             'email' => 'required|email|max:255|unique:admins|email_domain:' . $data['email'] ,
             'mobile_no' => 'required|numeric|unique:admins',
             'password' => 'required',
          ]);
        $data=   [
               'name' => $data['name'],
               'email' => $data['email'],
               'middle_name' => $data['middle_name'],
               'lastname' => $data['lastname'],
               'password' => bcrypt($data['password']),
               'mobile_no' => $data['mobile_no'],
               'role' => $data['role'],
               
         ];
      
        if(isset($id)){
            Admin::where('id',$id)->update($data);
            $msg="Approver updated successfully";



        } else{
            Admin::create($data);
           $msg="Approver created successfully";

          $subject='Procoop Approver Notification';
          $mail='Dear <b> '.$data['name'].'</b> ';
          $mail=$mail.'<br>You have been added as an Approver on Procoop Delegation of Authority Application.';
          $mail=$mail.'<br>Please login with temporary password  <b>'.$password.'</b> at https://www.procoop.net/admin.' ;
          $mail=$mail.'<br> Please change your password immediately after login.';
          $mail=$mail.'<br><br><h4>Regards</h4>Procoop Team';





          $sms =' You have been added as Approver for Procoop. Your temporary password is '.$password.'  . Please change your paasword within 24hrs';

    Common::sendMail(['message'=>$mail,'subject'=> $subject,'recipients[]'=>$data['email']]);
    Common::SendSms(['sms_message'=>$sms,'recipients[]'=>'234'.ltrim($data['mobile_no'],'0')]);


        }   
        return redirect('admin/approvers')->with('success',$msg);
    endif; 




     $user = Auth::user();
     if(isset($id)){
        $approvers = Admin::where('id',$id)->first();
       
        return view('admin.newApprovers')->with('user',$user)->with('approvers',$approvers);
      }else{
      return view('admin.newApprovers')->with('user',$user);
     }
}

function editApprover(Request $request, $id=NULL){

   $data=$request->input();
   if(count($data)):
         $this->validate($request, [
             'name' => 'required',
             'lastname' => 'required',
             'email' => 'required|email|max:255|email_domain:' . $data['email'] ,
             'mobile_no' => 'required|numeric',
             'password' => 'required',
          ]);
        $data=   [
               'name' => $data['name'],
               'email' => $data['email'],
               'middle_name' => $data['middle_name'],
               'lastname' => $data['lastname'],
               'password' => bcrypt($data['password']),
               'mobile_no' => $data['mobile_no'],
               'role' => $data['role'],
               
         ];
            Admin::where('id',$id)->update($data);
            $msg="Approver updated successfully";
            return redirect('admin/approvers')->with('success',$msg);
    endif; 

     $user = Auth::user();
     if(isset($id)){
        $approvers = Admin::where('id',$id)->first();
       
        return view('admin.newApprovers')->with('user',$user)->with('approvers',$approvers);
      }else{
       return redirect('admin/approvers')->with('user',$user);
     }



}


function approvers(){
  
     $user = Auth::user();
     $approvers = Admin::where('role','!=','3')
                       ->where('id','!=','1')
                      ->get();
     return view('admin.approvers')->with('user',$user)->with('approvers',$approvers);
}


function userEdit($id){

}

function userDelete(Request $request){
        $data=$request->input();
     
        $potp=base64_decode(trim($data['potp']));
        if(isset($data['potp']) && isset($data['otp'])  && ($potp==trim($data['otp'])) ){
             User::where('id',$data['user_id'])->delete();
            echo "User is deleted successfully"; 
        }else{
            echo "Something went wrong"; 
        }
       
        
}
function walletDelete($id){
        Wallet::where('id',$id)->delete();
        User_wallets::where('wallet_id',$id)->delete();
        return redirect('admin/wallets')->with('success','wallet deleted successfully');   
}
function approversDelete(Request $request){
      $data=$request->input();
     
        $potp=base64_decode(trim($data['potp']));
        if(isset($data['potp']) && isset($data['otp'])  && ($potp==trim($data['otp'])) ){
             Admin::where('id',$data['user_id'])->delete();
            echo "User is deleted successfully"; 
        }else{
            echo "Something went wrong"; 
        }
       
}

function approversEdit($id){
     $user = Auth::user();
     $approvers = User::where('role','2')->where('id',$id)->first();
     return view('admin.editApprovers')->with('user',$user)->with('approvers',$approvers);

}


function facilityDelete(Request $request){
    $user = Auth::user();
       $data=$request->input();
        $potp=base64_decode(trim($data['potp']));
        if(isset($data['potp']) && isset($data['otp'])  && ($potp==trim($data['otp'])) ){
             Facility::where('id',$data['id'])->delete();
            echo "Facility  deleted successfully"; 
        }else{
            echo "Something went wrong"; 
        }
}




function importWallet(Request $request,$wallet_id=NULL){
   $user = Auth::user();
   if($request->hasFile('import_file')){
      $path = $request->file('import_file')->getRealPath();
      $data = Excel::load($path, function($reader) {})->get();



      if(!empty($data) && $data->count()){

        //validation Start 
        $error=[];
        foreach ($data->toArray() as $key => $value) {
         if(!(isset($value['wallet_name'])&& isset($value['wallet_type']) && isset($value['company_email'])&& isset($value['sharp_id'])) ){
            $error[]='Please insert data in required field' ;
         }
   
        $duplicate= Wallet::where('wallet_name',$value['wallet_name'])
               ->Where('wallet_type',$value['wallet_type'])
               ->Where('company_email',$value['company_email'])
               ->Where('sharp_id',$value['sharp_id'])
               ->count();
                if($duplicate>0){
                  $error[]='Wellet "'.$value['wallet_name'].'" of  "' .$value['wallet_type'].'" already assign to the user "'.$value['company_email'];
                }
        }

  
        if(count($error)>0){
         return redirect('admin/wallets/import')->with('errors',$error);
        }
        else{
          foreach ($data->toArray() as $key => $value) {
            $value['xls_id']=$value['id'];

            $value['creation_date']=date($value['creation_date']);
            unset($value['id']);
             Wallet::create($value);
           }
           
           return redirect('admin/wallets')->with('success','successfully imported');
        }




        //validation Close
      }

     }else{
     return view('admin.importxlsx')->with('user',$user);
   }
}


 function company_domain_name(Request $request){
  $user = Auth::user();
   $data=$request->input();
   if(count($data)):
         $this->validate($request, [
             'company_domain_name' => 'required|domainname',
          ]);
        $setting = setting::where('pkey','company_domain_name')->get();
        if(count($setting)){
               setting::where('pkey','company_domain_name')->update(['pkey'=>'company_domain_name','pvalue'=>$data['company_domain_name']]);
        }else{
               setting::create(['pkey'=>'company_domain_name','pvalue'=>$data['company_domain_name']]);
        }
        return redirect('admin/company_domain_name')->with('success','Company Domain Name Added');
     /// 
    endif;
      $setting = setting::where('pkey','company_domain_name')->first();
      return view('admin.company_domain_name')->with('user',$user)->with('company_domain_name',$setting->pvalue);

 } 
  

function change_status($table,$id){
     if ($table=='users') {
                $users = User::where('id',$id)->first();
                if($users->status){
                
                   User::where('id', $id)->update(['status'=>'0']);
                }else{
              
                   User::where('id', $id)->update(['status'=>'1']);
                }
     }else if ($table=='wallets') {
               $wallet=Wallet::where('id',$id)->first();
               if($wallet->status){
                   Wallet::where('id', $id)->update(['status'=>0]);
               }else{
                   Wallet::where('id', $id)->update(['status'=>1]);
               }
     }else if ($table=='facilities') {
               $Facility=Facility::where('id',$id)->first();
               if($Facility->status){
                   Facility::where('id', $id)->update(['status'=>0]);
               }else{
                   Facility::where('id', $id)->update(['status'=>1]);
               }
     }else{
     }



}




 function profile(Request $request){
        $user = Auth::user();
        $data=$request->input();
        if(count($data)){
            if (isset($data['persional_info'])) {
                    $this->validate($request, [
                    'name' => 'required|max:255',
                    'lastname' => 'required',
                    'email' => 'required|email|max:255|email_domain:' . $data['email'] . '|unique:admins'. ($user->id ? ",id,$user->id" : ''),
                    'mobile_no' => 'required|min:10|max:11',
                    
                 ]);
                 Admin::where('id',$user->id)->update([
                    'name' => $data['name'],
                    'lastname' => $data['lastname'],
                    'middle_name' => $data['middle_name'],
                    'email' => $data['email'],
                    'mobile_no' => $data['mobile_no'],
                    
                    
                ]);
                return redirect('admin/profile#tab_1_1')->with('success','Personal info successfully updated');
        }
        
        if (isset($data['Change_Avatar'])) {
                    $this->validate($request, [
                    'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $imageName = time().'.'.$request->img->getClientOriginalExtension();
                    $request->img->move(public_path('images'), $imageName);
                    $user->id;
                    Admin::where('id', $user->id)->update([
                    'img' => $imageName
                    ]);
                    return redirect('admin/profile#tab_1_2')->with('success','Profile image successfully updated');
        }
        if (isset($data['Change_Password'])) {
                $this->validate($request, [
                    'password' => 'required|min:6|confirmed',
                    'password_confirmation' => 'required|min:6',
                    'current_password' => 'required|min:6|current_password',
                 ]);
                Admin::where('id', $user->id)->update([
                'password' => bcrypt($data['password']),'password_match'=>'1'
                ]);
                return redirect('admin/profile#tab_1_1')->with('success','password successfully updated');





        }
      }
       return view('admin.profile')->with('user',$user);    
    }


   function get_wallet_users_list($wallet_id){
      $user = Auth::user();
      $users= User_wallets::where('wallet_id',$wallet_id)
                            ->join('users', 'users.id', '=', 'user_wallets.user_id')
                            ->select('user_wallets.id', 'user_wallets.user_id as user_id', 'users.name as name')
                            ->get();
     $userData=array();
     foreach ($users as $user) {
      $userData[]=['user_id'=>$user->user_id, 'name'=>$user->name];
     }
    echo json_encode($userData);
   }




 function newfacility(Request $request, $id=NULL){
   $data=$request->input();
   if(count($data)):
         $this->validate($request, [
                'name' => 'required',
                'description' => 'required',
                'facility_categories' =>'required|numeric',
                'min_amount' => 'required|numeric',
                'max_amount' => 'required|numeric',
                'interest_rate' => 'required|numeric',
                'maximum_tenor' => 'required|numeric',
                'payment_schedule' => 'required',
                'monthly_payment_date' => 'required|numeric',
                'quarterly_payment_month_1' => 'required|numeric',
                'quarterly_payment_date_1' => 'required|numeric',
                'quarterly_payment_month_2' => 'required|numeric',
                'quarterly_payment_date_2' => 'required|numeric',
                'quarterly_payment_month_3' => 'required|numeric',
                'quarterly_payment_date_3' => 'required|numeric',
                'quarterly_payment_month_4' => 'required|numeric',
                'quarterly_payment_date_4' => 'required|numeric',
                'annual_payment_month' => 'required|numeric',
                'annual_payment_date' => 'required|numeric',
                'monthly_interest_payment_date' => 'required|numeric',
                'processing_fee' => 'required|numeric',
                'insurance_fee' => 'required|numeric',
                'management_fee' => 'required|numeric',
          ]);


          $quarterly_payment_date['1']=['date'=>$data['quarterly_payment_date_1'],'month'=>$data['quarterly_payment_month_1']];
          
          $quarterly_payment_date['2']=['date'=>$data['quarterly_payment_date_2'],'month'=>$data['quarterly_payment_month_2']];

          $quarterly_payment_date['3']=['date'=>$data['quarterly_payment_date_3'],'month'=>$data['quarterly_payment_month_3']];

          $quarterly_payment_date['4']=['date'=>$data['quarterly_payment_date_4'],'month'=>$data['quarterly_payment_month_4']];

           $quarterly_payment_date=json_encode($quarterly_payment_date);

           $annualy_payment_date=json_encode(['date'=>$data['annual_payment_date'],'month'=>$data['annual_payment_month']]);

        $data=   [
               'name' => $data['name'],
               'description' => $data['description'],
               'facility_categories' => $data['facility_categories'],
               'min_amount' => $data['min_amount'],
               'max_amount' => $data['max_amount'],
               'interest_rate' => $data['interest_rate'],
               'maximum_tenor' => $data['maximum_tenor'],
               'payment_schedule' => json_encode($data['payment_schedule']),
               'monthly_payment_date' => $data['monthly_payment_date'],
               'quarterly_payment_date' => $quarterly_payment_date,
               'annualy_payment_date' => $annualy_payment_date,
               'monthly_interest_payment_date' => $data['monthly_interest_payment_date'],
               'processing_fee' => $data['processing_fee'],
               'insurance_fee' => $data['insurance_fee'],
               'management_fee' => $data['management_fee'],

         ];
        if(isset($id)){
           Facility::where('id',$id)->update($data);
           $msg="facility updated successfully";
        } else{
            Facility::create($data);
           $msg="facility created successfully";
        }   
        return redirect('admin/facility')->with('success',$msg);
    endif; 

     
     
      




   
       $user = Auth::user();
       $facility_categories=facility_category::get();
       $payment_schedule  =Payment_schedule::pluck('name','id');
       $month=Common::$month;
       $date=Common::$date;
       $years=Common::$one_100;
       $percent=Common::percent();

      if(isset($id)){
            $facility_detail=Facility::where('id',$id)->first();
            $quarterly_payment_dates= (json_decode($facility_detail['quarterly_payment_date']));
            $quarterly_payment_date=[];
            foreach ($quarterly_payment_dates as $key => $value) {              
                $quarterly_payment_date['quarterly_payment_date_'.$key]=$value->date;
                $quarterly_payment_date['quarterly_payment_month_'.$key]=$value->month;

            }
           $annualy_payment_dates=(json_decode($facility_detail['annualy_payment_date']));
           $annual_payment_date=$annualy_payment_dates->date;
           $annual_payment_month=$annualy_payment_dates->month;
           
           $paymentSchedule=json_decode($facility_detail['payment_schedule']);

            return view('admin.newfacility', compact('percent','years','payment_schedule','month','date','facility_detail','user','facility_categories','quarterly_payment_date','annual_payment_date','annual_payment_month','paymentSchedule'));
      }else{
         return view('admin.newfacility', compact('percent','years','payment_schedule','month','date','facility_categories'))->with('user',$user);
      }
     

}

function facility(){
  
     $user = Auth::user();
     
      $facility=Facility::join('facility_categories', 'facility_categories.id', '=', 'facilities.facility_categories')
                            ->select('facilities.*', 'facility_categories.name as categories_name')
                            ->get();
     return view('admin.facility')->with('user',$user)->with('Facilities',$facility);
}

function applications(){
     $user = Auth::user();
     $app_data=Loan_application::join('facilities','facilities.id','=','loan_applications.facility_id')
         ->leftjoin('facility_categories','facility_categories.id','=','loan_applications.facility_category')
          ->leftjoin('users','users.id','=','loan_applications.user_id')
         ->select('loan_applications.*', 'facilities.name as facilities_name','facility_categories.name as facility_category_name','users.name as user_name')
         ->orderBy('loan_applications.id', 'desc')
        ->get();
    

    return view('admin.all_appications')->with('user',$user)->with('app_datas',$app_data)->with('status',['0'=>'Pending','1'=>'Approved','2'=>'Rejected']);
}




function app_users(){
     $user = Auth::user();
      $allusers=  User::where('status','0')
                  ->where('approved_by',0)
                  ->where('password','!=','')
                  ->where('role',3)
                  ->get();

    return view('admin.app_users')->with('user',$user)->with('allusers',$allusers)->with('status',['0'=>'Pending','1'=>'Approved','2'=>'Rejected']);
}


function app_projects(){
     $user = Auth::user();

   if($user->role==2) :
     $app_data=Loan_application::join('facilities','facilities.id','=','loan_applications.facility_id')
         ->leftjoin('facility_categories','facility_categories.id','=','loan_applications.facility_category')
         ->leftjoin('users','users.id','=','loan_applications.user_id')
         ->where('loan_applications.facility_category',2)
          ->where('loan_applications.status',0)
         ->select('loan_applications.*', 'facilities.name as facilities_name','facility_categories.name as facility_category_name','users.name as user_name')
         ->orderBy('loan_applications.id', 'desc')
        ->get();
    
  else:
     $app_data=Loan_application::join('facilities','facilities.id','=','loan_applications.facility_id')
         ->leftjoin('facility_categories','facility_categories.id','=','loan_applications.facility_category')
         ->leftjoin('users','users.id','=','loan_applications.user_id')
         ->where('loan_applications.facility_category',2)
         ->select('loan_applications.*', 'facilities.name as facilities_name','facility_categories.name as facility_category_name','users.name as user_name')
         ->orderBy('loan_applications.id', 'desc')
        ->get();
    

  endif;
    return view('admin.all_appications')->with('user',$user)->with('app_datas',$app_data)->with('status',['0'=>'Pending','1'=>'Approved','2'=>'Rejected']);
}
function app_loans(){
     $user = Auth::user();


     if ($user->role==1) :
     $app_data=Loan_application::join('facilities','facilities.id','=','loan_applications.facility_id')
         ->leftjoin('facility_categories','facility_categories.id','=','loan_applications.facility_category')
          ->leftjoin('users','users.id','=','loan_applications.user_id')
         ->where('loan_applications.facility_category',1)
         ->select('loan_applications.*', 'facilities.name as facilities_name','facility_categories.name as facility_category_name','users.name as user_name')
         ->orderBy('loan_applications.id', 'desc')
        ->get();
    
    else :

      $app_data=Loan_application::join('facilities','facilities.id','=','loan_applications.facility_id')
         ->leftjoin('facility_categories','facility_categories.id','=','loan_applications.facility_category')
          ->leftjoin('users','users.id','=','loan_applications.user_id')
         ->where('loan_applications.facility_category',1)
         ->where('loan_applications.status',0)
         ->select('loan_applications.*', 'facilities.name as facilities_name','facility_categories.name as facility_category_name','users.name as user_name')
         ->orderBy('loan_applications.id', 'desc')
        ->get();

    endif;

    return view('admin.all_appications')->with('user',$user)->with('app_datas',$app_data)->with('status',['0'=>'Pending','1'=>'Approved','2'=>'Rejected']);
}




function app_facility(){
     $user = Auth::user();

     if ($user->role==2) :
     $app_data=Loan_application::join('facilities','facilities.id','=','loan_applications.facility_id')
         ->leftjoin('facility_categories','facility_categories.id','=','loan_applications.facility_category')
          ->leftjoin('users','users.id','=','loan_applications.user_id')
         ->where('loan_applications.facility_category',3)
         ->where('loan_applications.status',0)
         ->select('loan_applications.*', 'facilities.name as facilities_name','facility_categories.name as facility_category_name','users.name as user_name')
         ->orderBy('loan_applications.id', 'desc')
        ->get();
    else:
     $app_data=Loan_application::join('facilities','facilities.id','=','loan_applications.facility_id')
         ->leftjoin('facility_categories','facility_categories.id','=','loan_applications.facility_category')
          ->leftjoin('users','users.id','=','loan_applications.user_id')
         ->where('loan_applications.facility_category',3)
         ->select('loan_applications.*', 'facilities.name as facilities_name','facility_categories.name as facility_category_name','users.name as user_name')
         ->orderBy('loan_applications.id', 'desc')
        ->get();
     endif;   
    return view('admin.all_appications')->with('user',$user)->with('app_datas',$app_data)->with('status',['0'=>'Pending','1'=>'Approved','2'=>'Rejected']);
}


  function chengeApplicationStatus($app_id,$status){
    $user = Auth::user();
    Loan_application::where('id',$app_id)->update(['status'=>$status,'approved_by'=>$user->id]);
  }






  function view_application(Request $request,$id){
    $user = Auth::user();
    $data=$request->input();
    if (count($data)>0) {

     
          if(!empty($data['project'])):
                $this->validate($request, [
                    'car_price' => 'required',
                    'less_initial_deposit' => 'required',
                    'loan_amount' => 'required',
                    'interest' => 'required',
                    'total_monthly_deductions' => 'required',
                    'annual_principal_repayment' => 'required',
                    'approved_ammount'=>'required',
                    'approvel_date'=>'required',
                    'status' => 'required',
                 ]);
                 Loan_application::where('id',$id)->update([
                    'car_price' => $data['car_price'],
                    'less_initial_deposit' => $data['less_initial_deposit'],
                    'loan_amount' => $data['loan_amount'],
                    'interest' => $data['interest'],
                    'total_monthly_deductions' => $data['total_monthly_deductions'],
                    'annual_principal_repayment' => $data['annual_principal_repayment'],
                    'approved_ammount' => $data['approved_ammount'],
                    'status' => $data['status'],
                    'approvel_date' => $data['approvel_date'],
                    'approved_by'=>$user->id,
                ]);
            endif;

              if(!empty($data['loan'])):
                $this->validate($request, [
                     'approved_ammount'=>'required',
                    'approvel_date'=>'required',
                    'status' => 'required',
                 ]);
                 Loan_application::where('id',$id)->update([
                    'approved_ammount' => $data['approved_ammount'],
                    'status' => $data['status'],
                    'approvel_date' => $data['approvel_date'],
                    'approved_by'=>$user->id,
                ]);
            endif;

             if(!empty($data['facility'])):
                $this->validate($request, [
                    'approved_ammount'=>'required',
                    'approvel_date'=>'required',
                    'status' => 'required',
                 ]);
                 Loan_application::where('id',$id)->update([
                    'approved_ammount' => $data['approved_ammount'],
                    'status' => $data['status'],
                    'approvel_date' => $data['approvel_date'],
                    'approved_by'=>$user->id,
                ]);
            endif;

    }






      $app_data=Loan_application::join('facilities','facilities.id','=','loan_applications.facility_id')
        ->where('loan_applications.id',$id)
         ->select('loan_applications.*', 'facilities.name as facilities_name')
        ->first();


    $applicant = User::where('id', $app_data->user_id)->first();



     $Facility= Facility::where('id',$app_data->facility_id)->first();
     $facility_category= facility_category::where('id',$Facility->facility_categories)->first();


     if($facility_category->id==1){
           return view('admin.view_form_loan')->with('user',$user)->with('Facility',$Facility)->with('facility_category',$facility_category)->with('app_datas',$app_data)->with('applicant',$applicant)->with('status',['0'=>'Pending','1'=>'Approved','2'=>'Rejected']);
     }

     if($facility_category->id==2){
    
             return view('admin.view_form_projects')->with('user',$user)->with('Facility',$Facility)->with('facility_category',$facility_category)->with('app_datas',$app_data)->with('applicant',$applicant)->with('status',['0'=>'Pending','1'=>'Approved','2'=>'Rejected']);
     }

    if($facility_category->id==3){
           return view('admin.view_form_facility')->with('user',$user)->with('Facility',$Facility)->with('facility_category',$facility_category)->with('app_datas',$app_data)->with('applicant',$applicant)->with('status',['0'=>'Pending','1'=>'Approved','2'=>'Rejected']);
     }






}


/*  Wallet Start here */


function user_wallets ($user_id){
  $user = Auth::user();









  $WalletUsers = User::where('id', $user_id)->first();
  return  view('admin.user_wallets')->with('user',$user)->with('WalletUsers',$WalletUsers)->with('total_amounts',$this->total_wallet_amount($user_id));

}

function total_wallet_amount($user_id){

  $total_amounts=array();
  $total_amounts[]='';
  $WalletUsers = User::where('id', $user_id)->first();
  
  $debit= Debit_credit::where('email', $WalletUsers->email)
              ->where('type', '1')
              ->where('wallet_category','1')
              ->sum('amount');
  $credit= Debit_credit::where('email', $WalletUsers->email)
              ->where('type', '2')
              ->where('wallet_category','1')
              ->sum('amount');
$total_amounts[]=  $contributions=($debit-$credit);

  $debit= Debit_credit::where('email', $WalletUsers->email)
              ->where('type', '1')
              ->where('wallet_category','2')
              ->sum('amount');
  $credit= Debit_credit::where('email', $WalletUsers->email)
              ->where('type', '2')
              ->where('wallet_category','2')
              ->sum('amount');
 $total_amounts[]= $loans=($debit-$credit);

  $debit= Debit_credit::where('email', $WalletUsers->email)
              ->where('type', '1')
              ->where('wallet_category','3')
              ->sum('amount');
  $credit= Debit_credit::where('email', $WalletUsers->email)
              ->where('type', '2')
              ->where('wallet_category','3')
              ->sum('amount');
  $total_amounts[]=$quick_cash=($debit-$credit);


  $debit= Debit_credit::where('email', $WalletUsers->email)
              ->where('type', '1')
              ->where('wallet_category','4')
              ->sum('amount');
  $credit= Debit_credit::where('email', $WalletUsers->email)
              ->where('type', '2')
              ->where('wallet_category','4')
              ->sum('amount');
 $total_amounts[]= $projects=($debit-$credit);



return $total_amounts;




}
 


function wallet_summary($user_id,$wallet_id){
  $user = Auth::user();
  $WalletUsers = User::where('id', $user_id)->first();
  $wallet_category=wallet_category::where('id',$wallet_id)->first();


  $no_of_deposit=Debit_credit::where('email', $WalletUsers->email)
              ->where('type', '1')
              ->where('wallet_category',$wallet_id)
              ->count();
  $no_of_withdrawals=Debit_credit::where('email', $WalletUsers->email)
              ->where('type', '2')
              ->where('wallet_category',$wallet_id)
              ->count();


  $debit= Debit_credit::where('email', $WalletUsers->email)
              ->where('type', '1')
              ->where('wallet_category',$wallet_id)
              ->sum('amount');
  $credit= Debit_credit::where('email', $WalletUsers->email)
              ->where('type', '2')
              ->where('wallet_category',$wallet_id)
              ->sum('amount');
  $total_amount=($debit-$credit);


 $Wallets= Wallet::where('wallet_category_id',$wallet_id)
           ->where('status','1')
           ->where('user_id',$user_id)
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




  return  view('admin.wallet_summary')->with('user',$user)->with('WalletUsers',$WalletUsers)->with('wallet_category',$wallet_category)->with('total_amount',$total_amount)->with('debit',$debit)->with('credit',$credit)->with('no_of_deposit',$no_of_deposit)->with('no_of_withdrawals',$no_of_withdrawals)->with('Wallets',$Wallets)->with('WalletsDetails',$WalletsDetails);
}


function debit_credit_form_submit(Request $request){
  $data=$request->input();
  $data['dates']=date('Y-m-d',strtotime($data['dates']));
  
  $res= Debit_credit::create($data);
  $this->saveRevenue($data,$res->id);
  if($data['type']==1){
  $msg='This account is successfully Debited';
  }
  if($data['type']==2){
  $msg='This account is successfully Credited';
  }

   $debit= Debit_credit::where('email', trim($data['email']))
              ->where('type', '1')
              ->where('wallet_category',$data['wallet_category'])
              ->sum('amount');
  $credit= Debit_credit::where('email', trim($data['email']))
              ->where('type', '2')
              ->where('wallet_category',$data['wallet_category'])
              ->sum('amount');
  $total_amount=($debit-$credit);




  $no_of_deposit=Debit_credit::where('email', trim($data['email']))
              ->where('type', '1')
              ->where('wallet_category',$data['wallet_category'])
              ->count();
  $no_of_withdrawals=Debit_credit::where('email', trim($data['email']))
              ->where('type', '2')
              ->where('wallet_category',$data['wallet_category'])
              ->count();



  echo json_encode(['msg'=>$msg,'total_amounts'=>$total_amount,'no_of_deposit'=>$no_of_deposit,'total_debit'=>$debit,'no_of_withdrawals'=>$no_of_withdrawals,'total_credit'=>$credit]);
}

function debit_credit_summary(Request $request,$user_id,$wallet_category){

  $user = Auth::user();

  $WalletUsers = User::where('id', $user_id)->first();
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
  $Debit_credit = Debit_credit::where('email', $WalletUsers->email)->where('wallet_category',$wallet_category)->get();
  $iTotalRecords = $Debit_credit->count();
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);
  $records = array();
  $records["data"] = array(); 
  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
  $Debit_credit = Debit_credit::where('email', $WalletUsers->email)
                   ->where('wallet_category',$wallet_category)
                  ->take($iDisplayLength)
                  ->skip($iDisplayStart)
                  ->orderBy('id','DESC')
                  ->get();
  $i = $iDisplayStart;

 $debit= Debit_credit::where('email', $WalletUsers->email)
              ->where('type', '1')
              ->where('wallet_category',$wallet_category)
              ->sum('amount');
  $credit= Debit_credit::where('email', $WalletUsers->email)
              ->where('type', '2')
              ->where('wallet_category',$wallet_category)
              ->sum('amount');
            
  $ttl= $debit-$credit;

 $records["data"][]=['','','','','<h4>'.$ttl.'</h4>'] ;


  foreach ( $Debit_credit as $key => $value) {
           $date=date('Y-m-d',strtotime($value->dates));
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
    //$all_users = User::where('role', '3')->get();
    //return view('admin.userlist')->with('user',$user)->with('all_users',$all_users);
  }
  



}


  function sendMail(){
   Common::sendMail(['message'=>'hey wake up','subject'=>'test mail','recipients[]'=>'aashishkumarmishra@live.com']);


    Common::SendSms(['sms_message'=>'hello trest mdgf','recipients[]'=>'918564904050']);
  }




function import_user(Request $request){
$duplicate_users=array();
   $user = Auth::user();

   $check=0;$check2=0;$check3=0;
   if($request->hasFile('import_file')){
      $path = $request->file('import_file')->getRealPath();
      $data = Excel::load($path, function($reader) {})->get();
      if(!empty($data) && $data->count()){


//////////////////////////////

$check_redudency_email=array();
$check_redudency_sharp_id=array();
foreach ($data->toArray() as $key => $value) {
 if(!empty($value['company_email']) && !empty($value['company_identification_number']) && !empty($value['full_name'])):
                     $value['company_email']=trim($value['company_email']);
                     $check=   User::where('email',$value['company_email'])->count();
                     $check2=   User::where('sharp_id',$value['company_identification_number'])->count(); 
                    $company_domain_name=setting::where('pkey','company_domain_name')->first();
                      $company_domain_name['pvalue'];
                      $company_emails=   explode("@", trim($value['company_email']));
                     $check3=0;


$check_redudency_email[]=$value['company_email'];
$check_redudency_sharp_id[]=$value['company_identification_number'];
               if(isset($company_emails[1])){
                                  if($company_emails[1] != $company_domain_name['pvalue']) { $check3=1;    }else{$check3=0; }                 

                     }else{ $check3=1;}
                      
                     if($check || $check2 ||$check3) :
                          if($check2>0) {
                           $duplicate_users[]='The sharp id '.$value['company_identification_number'].' Already in Used';
                          }
                         else if($check3){
                          $duplicate_users[]='This mail '.$value['company_email'].' have not a valid domain';
                         }
                         else{
                          $duplicate_users[]=$value['company_email'].' is already in used';
                            }
                      endif; 
               
   endif;                 
}


if(count($check_redudency_email) !=count(array_unique($check_redudency_email))|| count($check_redudency_sharp_id) !=count(array_unique($check_redudency_sharp_id))   ){
$duplicate_users[]='Duplicate email or company id available';
$check3=1;
}



/////////////////////////


 if(($check || $check2 ||$check3)) :
return redirect('admin/import_user')->with('duplicate_users',$duplicate_users)->with('success','Something went wrong');

endif;


foreach ($data->toArray() as $key => $value) {
          
$User = User::where('email',$value['company_email'])->first();
           if(count($User)){  
             $duplicate_users[]=$value['company_email'];
           }else{

if(!empty($value['company_email']) && !empty($value['company_identification_number']) && !empty($value['full_name'])):
              $insert=User::create(['email'=>$value['company_email'],'role'=>'3','sharp_id'=>$value['company_identification_number'],'name'=>$value['full_name']]); 



              $link=(url('')).'/create_act/'.base64_encode(mt_rand(100000, 999999).($insert->id).'ASH'.$value['company_email']);
              $msg= '<h4>Dear Procoop User,<h4>';
              $msg= $msg.' Your Account is created by Procoop Admin, to Access Your Account Please click on link below, and fill all details';
              $msg=$msg.'<h4><a href ="'.$link.'">Click here..</a></h4>';
              $msg=$msg.'<br><br><h4>Thanks</h4>';
              $subject='Procoop : User Registration';
              Common::sendMail(['message'=>$msg,'subject'=>$subject,'recipients[]'=>$value['company_email']]);
 endif;
           }

      }

      return redirect('admin/users')->with('duplicate_users',$duplicate_users)->with('success','User imported successfully');
    }
  }

else{
     return view('admin.import_user')->with('user',$user)->with('duplicate_users',$duplicate_users);
   }


}


public function add_single_user(Request $request){
   $user = Auth::user();
   $duplicate_users=array();

   $check_redudency_email;
$check_redudency_sharp_id;
   $data= $request->input();
   if(!empty($data)){
             $this->validate($request, [
                    'company_id' => 'required',
                    'company_email' => 'required',
              ]);
       $company_id= explode("\n", $data['company_id']);
        $company_email= explode("\n", $data['company_email']);


           $check =0;
           $check2=0;
           $check3=0;

           if (count($company_id) == count($company_email)) :
                 foreach ($company_id as $key => $value) :
$company_email[$key]=trim($company_email[$key]);
                     $check=   User::where('email',$company_email[$key])->count();
                     $check2=   User::where('sharp_id',$value)->count(); 
                    $company_domain_name=setting::where('pkey','company_domain_name')->first();
                      $company_domain_name['pvalue'];
                      $company_emails=   explode("@", trim($company_email[$key]));
                     $check3=0;
$check_redudency_email[]=$company_email[$key];
$check_redudency_sharp_id[]=$value;





               if(isset($company_emails[1])){
                                  if($company_emails[1] != $company_domain_name['pvalue']) { $check3=1;    }else{$check3=0; }                 

                     }else{ $check3=1;}
                      
                     if($check || $check2 ||$check3) :
                          if($check2>0) {
                           $duplicate_users[]='The sharp id '.$value.' Already in Used';
                          }
                         else if($check3){
                          $duplicate_users[]='This email '.$company_email[$key].' is not a valid **@'.$company_domain_name['pvalue'].'** email address';
                         }
                         else{
                          $duplicate_users[]=$company_email[$key].' is already in used';
                            }
                      endif; 
                 endforeach;
                 endif; 

if(count($check_redudency_email) !=count(array_unique($check_redudency_email))|| count($check_redudency_sharp_id) !=count(array_unique($check_redudency_sharp_id))   ){
$duplicate_users[]='Duplicate email or company id available';
$check3=1;
}






                if (count($company_id) == count($company_email)) :
                         if(!($check || $check2 ||$check3)) :
                              foreach ($company_id as $key => $value) :

$company_email[$key]=trim($company_email[$key]);
                                $insert=User::create(['email'=>$company_email[$key],'role'=>'3','sharp_id'=>$value]); 



/* send email start*/

 $link=(url('')).'/create_act/'.base64_encode(mt_rand(100000, 999999).($insert->id).'ASH'.$company_email[$key]);
              $msg= '<h4>Dear Procoop User,<h4>';
              $msg= $msg.' Your Account is created by Procoop Admin, to Access Your Account Please click on link below, and fill all details';
              $msg=$msg.'<h4><a href ="'.$link.'">Click here..</a></h4>';
              $msg=$msg.'<br><br><h4>Thanks</h4>';
              $subject='Procoop : User Registration';
              Common::sendMail(['message'=>$msg,'subject'=>$subject,'recipients[]'=>$company_email[$key]]);













                              endforeach;
                              return redirect('admin/users')->with('success','Users added successfully');
                         else:
                               return redirect('admin/add_single_user')->with('duplicate_users',$duplicate_users)->with('success','Something went wrong');
                         endif;


               else:
                return redirect('admin/add_single_user')->with('duplicate_users',$duplicate_users)->with('success','No of company email and Company Id must be equal');
               


                endif;



                        
                      
                 
  

   }




   return view('admin.add_single_user')->with('user',$user);
}


function getApprovedLoans($user_id=NULL){
 $loan_application= Loan_application::where('user_id',$user_id)->where('status',1)->get();
 $loan_application_array=[];
 foreach ($loan_application as $key => $value) {
  $facility_id=$value->facility_id;
  $facility_category=$value->facility_category;

    $facility_category=facility_category::where('id',$facility_category)->first();
    $Facility=Facility::where('id',$facility_id)->first();

     $name=$facility_category->name.'('.$Facility->name.')';

   $loan_application_array[]=['name'=>$name,'id'=>$value->id];
 }
 echo json_encode($loan_application_array);
}


function saveRevenue(array $data,$debit_credits_id){
   // [email] => aashishkumarmishra@live.com
   // [wallet_category] => 1
   // [wallet_id] => 1
    //[amount] => 4334
    //[type] => 1
    //[discription] => 100
    //[dates] => 1494892800
    //`revenue`, `revenue_per`, `wallet_id`, `loan_applications_id`, `description`,'$debit_credits_id',


     $wallet=Wallet::where('id',$data['wallet_id'])->first();
     $loan_applications_id=($wallet['loan_applications_id']);
      
    $loan_application=Loan_application::where('id',$loan_applications_id)->first();
    $facility_id=($loan_application['facility_id']);
    $facility= facility::where('id',$facility_id)->first();
    $revenue_per=($facility['revenue']);
    $revenue= ($data['amount']*$revenue_per)/100;
    $wallet_id=$data['wallet_id'];
    $loan_applications_id= $loan_applications_id;
    $description= number_format($revenue,2).' revenue for loan id '.$loan_applications_id;
   if($data['type']==1){
     $insertData=[
          'revenue'=>$revenue,
          'revenue_per'=>$revenue_per,
          'wallet_id'=>$wallet_id,
          'loan_applications_id'=>$loan_applications_id,
          'description'=>$description,
          'dates'=>$data['dates'],
          'debit_credits_id'=>$debit_credits_id
      ];

  Revenue::create($insertData);


   }

}

 
function check_authAdmin(){
$email='admins@ankits.com';
$password='123456';
  if (Auth::attempt(['email' => $email, 'password' => $password, 'role' => 1])){
    echo "haaaaaaaa";
  }else{
    echo "nooooooo";
  }
}

 function update_wallet_group(Request $request){
   $success='';
   $user = Auth::user();
      if($request->hasFile('import_file')){
      $path = $request->file('import_file')->getRealPath();
      $data = Excel::load($path, function($reader) {})->get();
      if(!empty($data) && $data->count()){
        $error=[];
        

        foreach ($data->toArray() as $key => $value) {

$wallet_id='';
$wid=Wallet::where('company_email',$value['company_email'] )
        ->where('wallet_name',$value['wallet_name'])
        ->where('wallet_type',$value['wallet_type'])
        ->first();
        if(isset($wid->id)){ $wallet_id=$wid->id; }
    $insertData[]=[
     'sharp_id'=> $value['sharp_id'],
     'amount'=>$value['amount_received'],
     'wallet_name'=>$value['wallet_name'],
      'wallet_id'=>$wallet_id,
     'type'=>  $value['wallet_type'],
     'email'=> $value['company_email'],
     'created_at'=>\Carbon\Carbon::now(),
     ];
    Debit_credit::insert($insertData);
           $success=' Wallets updated successfully'  ;    
        }
      }
     }
         return view('admin.update_wallet_group')->with('user',$user)->with('success', $success);
    

 }
 
function update_wallet_ind(Request $request){
  $success=NULL;
   $user = Auth::user();
   $data=$request->input();
   if(count($data)>0){
     $this->validate($request, [
                    'wallet'=> 'required',
                    'amount' => 'required',
                    'description' => 'required',
              ]);

     $wallet= Wallet::where('id',$data['wallet'])->first();

     $insertData[]=[
     'sharp_id'=> $wallet->sharp_id,
     'amount'=>$data['amount'],
     'wallet_name'=> $wallet->wallet_name,
     'wallet_id'=>$data['wallet'],
     'type'=> $wallet->wallet_type,
     'email'=> $wallet->company_email,
     'created_at'=>\Carbon\Carbon::now(),
     ];
    Debit_credit::insert($insertData);
    $success="Amount successfully added";
   }
       $sharp_ids=  User:: pluck('sharp_id','id');
       $names=  User:: pluck('name','id' );
       $emails=  User:: pluck('email','id' );
       return view('admin.update_wallet_ind', compact('sharp_ids','names','emails','success'))->with('user',$user);
    }
 
      function getwallets(Request $request){
          $data=$request->input();
         
          $return=[];
          if(isset($data['search_by'])){

                $userdata=User::where('id',$data['value'])->first();
                $company_email=($userdata['email']);
                 $data=  Wallet::where('company_email',$company_email)->get();
                 foreach ($data as $key => $value) {
                  $return[$value->id]=$value->wallet_name;
                 }
       
      echo json_encode($return);
          }
      }

    function payment_schedule_monthly(Request $request){
     $user = Auth::user();
    $data= $request->input();


    $users= User::get();
    $dueData=[];

    foreach ($users as $key => $usersvalue) {
      $totalDueAmount=0;

      $wallet= Wallet::where('company_email',$usersvalue->email)->get();
      foreach ($wallet as $key => $walletvalue) {
         $dateTo=date('Y-m-d');
         if(isset($data['search_month'])){
          $search_month=$data['search_month'];
          $search_year=$data['search_year'];

          $dateTo=$search_year.'-'.$search_month.'-'.date('d');
          $dateTo=date('Y-m-d',strtotime($dateTo));

         }
        

        
         $creation_date=date('Y-m-d',strtotime($walletvalue->creation_date));
         $total_amount= $this->noOfmonthsBetbeenDate($creation_date,$dateTo) * $walletvalue->monthly_payment;
        
         $deposits=Debit_credit::where('email',$walletvalue->company_email )
                       ->where('wallet_name',$walletvalue->wallet_name )
                       ->where('type',$walletvalue->wallet_type )
                       ->get();
          $ttl_deposit=0;
          foreach ($deposits as $key => $value) {
            $ttl_deposit+= $value->amount;
          }
          
        $totalDueAmount= $totalDueAmount+ ($total_amount-$ttl_deposit);
      }
      if($totalDueAmount>0){
       $dueData[]=['company_email'=>$usersvalue->email,'sharp_id'=>$usersvalue->sharp_id,'due_amount'=>$totalDueAmount];
      }
    }

    return view('admin.payment_schedule_monthly',compact('user','dueData','data'));
    }


    function noOfmonthsBetbeenDate($ts1,$ts2){
              $ts1 = strtotime($ts1);
              $ts2 = strtotime($ts2);

              $year1 = date('Y', $ts1);
              $year2 = date('Y', $ts2);

              $month1 = date('m', $ts1);
              $month2 = date('m', $ts2);
              
              return (($year2 - $year1) * 12) + ($month2 - $month1);
    }


function userduewallet(Request $request, $company_email){
 
      
      $data=[];
      $wallet= Wallet::where('company_email',$company_email)->get();
      foreach ($wallet as $key => $walletvalue) {
         $dateTo=date('Y-m-d');
         if(isset($data['search_month'])){
          $search_month=$data['search_month'];
          $search_year=$data['search_year'];

          $dateTo=$search_year.'-'.$search_month.'-'.date('d');
          $dateTo=date('Y-m-d',strtotime($dateTo));

         }
        

        
         $creation_date=date('Y-m-d',strtotime($walletvalue->creation_date));
         $total_amount= $this->noOfmonthsBetbeenDate($creation_date,$dateTo) * $walletvalue->monthly_payment;
        
         $deposits=Debit_credit::where('email',$walletvalue->company_email )
                       ->where('wallet_name',$walletvalue->wallet_name )
                       ->where('type',$walletvalue->wallet_type )
                       ->get();
          $ttl_deposit=0;
          foreach ($deposits as $key => $value) {
            $ttl_deposit+= $value->amount;
          }
         $totalDueAmount= ($total_amount-$ttl_deposit);
            if($totalDueAmount>0){
             $data[]=[
                     'creation_date'=>date('Y-m-d',strtotime($walletvalue->creation_date)),
                     'wallet_name'=>$walletvalue->wallet_name,
                     'wallet_type'=>$walletvalue->wallet_type,
                     'monthly_payment'=>$walletvalue->monthly_payment,
                     'quarterly_payment'=>$walletvalue->quarterly_payment,
                     'annual_payment'=>$walletvalue->annual_payment,
                     'wallet_balance'=>$walletvalue->wallet_balance,
                     'due_amount'=>$totalDueAmount,
                     'paid_amount'=>$ttl_deposit,
                  ];
            }
      }
      


     echo json_encode($data);

}

}