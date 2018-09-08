<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Debit_credit;
use App\User;
use App\Loan_application;
use App\Facility;
use App\Revenue;
class DashboardController extends Controller
{
    

    public function __construct()
    {    
     $this->middleware('auth');
      
    }
     public function index(Request $request){


      $user = Auth::user();
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


   $no_of_members=User::where('id','!=',1)->where('role','!=',3)->count();
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
                               ->with('wallet_amounts',$this->total_wallet_amount());
      }
      else if($user->role==2){
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











        return view('admin.approver_dashboard')->with('user',$user)->with('wallet_amounts',$this->total_wallet_amount())->with('loans_data',$loans_data)->with('facility_data',$facility_data)->with('project_data',$project_data);
      }
      else if($user->role==3){
          return view('user.dashboard')->with('user',$user)->with('total_amounts',$this->total_wallet_amount($user->id));
      }
      else {
        return redirect('/logout');
      }
    
   }

function total_wallet_amount($user_id=NULL){

  $total_amounts=array();
  $total_amounts[]='';


  if(isset($user_id) ){ 





 $userss = User::where('id',$user_id)->first();


  $debit= Debit_credit::where('email', $userss->email)
              ->where('type', '1')
              ->where('wallet_category','1')
              ->sum('amount');
  $credit= Debit_credit::where('email', $userss->email)
              ->where('type', '2')
              ->where('wallet_category','1')
              ->sum('amount');
$total_amounts[]=  $contributions=($debit-$credit);

  $debit= Debit_credit::where('email', $userss->email)
              ->where('type', '1')
              ->where('wallet_category','2')
              ->sum('amount');
  $credit= Debit_credit::where('email', $userss->email)
              ->where('type', '2')
              ->where('wallet_category','2')
              ->sum('amount');
 $total_amounts[]= $loans=($debit-$credit);

  $debit= Debit_credit::where('email', $userss->email)
              ->where('type', '1')
              ->where('wallet_category','3')
              ->sum('amount');
  $credit= Debit_credit::where('email', $userss->email)
              ->where('type', '2')
              ->where('wallet_category','3')
              ->sum('amount');
  $total_amounts[]=$quick_cash=($debit-$credit);


  $debit= Debit_credit::where('email', $userss->email)
              ->where('type', '1')
              ->where('wallet_category','4')
              ->sum('amount');
  $credit= Debit_credit::where('email', $userss->email)
              ->where('type', '2')
              ->where('wallet_category','4')
              ->sum('amount');
 $total_amounts[]= $projects=($debit-$credit);

  }else{
        $debit= Debit_credit::where('type', '1')
                    ->where('wallet_category','1')
                    ->sum('amount');
        $credit= Debit_credit::where('type', '2')
                    ->where('wallet_category','1')
                    ->sum('amount');
       $total_amounts[]=  $contributions=($debit-$credit);

        $debit= Debit_credit::where('type', '1')
                    ->where('wallet_category','2')
                    ->sum('amount');
        $credit= Debit_credit::where('type', '2')
                    ->where('wallet_category','2')
                    ->sum('amount');
       $total_amounts[]= $loans=($debit-$credit);

        $debit= Debit_credit::where('type', '1')
                    ->where('wallet_category','3')
                    ->sum('amount');
        $credit= Debit_credit::where('type', '2')
                    ->where('wallet_category','3')
                    ->sum('amount');
        $total_amounts[]=$quick_cash=($debit-$credit);


        $debit= Debit_credit::where('type', '1')
                    ->where('wallet_category','4')
                    ->sum('amount');
        $credit= Debit_credit::where('type', '2')
                    ->where('wallet_category','4')
                    ->sum('amount');
       $total_amounts[]= $projects=($debit-$credit);
  }

return $total_amounts;




}



}
