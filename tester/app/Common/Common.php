<?php
  /**
  * 
  */
  namespace App\Common;
  use App\User;
    use App\Admin;
  use App\Document;
  use Illuminate\Support\Facades\Hash;
  class Common
  {
  	 static $date=['',1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
     static $month= array("1"=>"January","2"=>"February","3"=>"March","4"=>"April","5"=>"May","6"=>"June","7"=>"July","8"=>"August","9"=>"September","10"=>"October","11"=>"November","12"=>"December");

     static $one_100=['',1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100];

 



  	function __construct()
  	{
  	  

  	}

  static function percent(){
          $percent=[];
          for($i=0; $i<=100;$i=$i+.25):
          $percent[]=$i;
          endfor;
          return $percent;
   }


  	static function sendMail(array $data)
    {
       $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://quickairtime.com/webservices/api.php?cmd=100&from=Procoop Nigeria',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $data
        ));
        return  $resp = curl_exec($curl);
        curl_close($curl);
    }

    static function SendSms(array $data){
       $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://quickairtime.com/webservices/v2/index.php/noksms/pay?authtoken=d08fb2ccbd980508740a8feacef09939c9d53f00&client_id=NDM4NDU&tranx_id='.time().'&payment_gateway_id=11&transaction_amount=0.01&transaction_currency=244&transaction_email=info@mycoremobile.com&sender_country_code=172&sender_id=Procoop&merchant_email=info@mycoremobile.com&merchant_password=dW4R7NP6&gateway_type=3',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $data,
        ));
        return  $resp = curl_exec($curl);
        curl_close($curl);
	}


     static function sendLoginOtp(array $data){
     	$validate=false;
    	if(isset($data['email'])&& isset($data['password'])){

             if(isset($data['user_type']) && ($data['user_type']=='admin')){


              $userDetail= Admin::where('email',$data['email'])
                    ->first();   

             }else{
              $userDetail= User::where('email',$data['email'])
                    ->first();  

             }
if(isset($userDetail->id)){
    					if (Hash::check($data['password'], $userDetail->password)) {
                             $mobile_no= ($userDetail->mobile_no_country).(ltrim($userDetail->mobile_no,'0'));
                             $otp=mt_rand(100000, 999999);
                             $message= 'Dear '.($userDetail->name).',  ';
                             $message= $message.' Your login OTP is '.$otp;
                             $smsreturn= self::SendSms(['sms_message'=>$message,'recipients[]'=>ltrim($mobile_no,"0")]);

                             $message= '<h4>Dear '.($userDetail->name).', </h4> ';
                             $message= $message.'<b> Your login OTP is </b>: '.$otp;
                            self::sendMail(['message'=>$message,'subject'=> 'Login OTP','recipients[]'=>$userDetail->email]);


                             $smsreturn = json_decode($smsreturn);
                             if(isset($smsreturn->STATUS) && ($smsreturn->STATUS)=='SUCCESS'){
                              $validate=$otp;
                             }
    					} 
              }           
    	    }
       return   $validate; 
     }
  

    static function upload($user_id,$file,$type){
      $return=[];
        if(isset($file) && (count($file)>0)):
              $document_title= $file->getClientOriginalName();
              $document = rand(5,15).time().'.'.$file->getClientOriginalExtension();
                 $path=$file->move(public_path('upload'), $document);
                 $Document= Document::create(['user_id'=>$user_id, 'document_title'=>$document_title,'document'=>$document,'type'=>$type]);
                $return=$Document->id;
        endif;
        return ($return);
    }


  static function getFile($data=array()){
         $document= Document::where('id','!=','');
         if(!empty($data['user_id']) ):
             $document->where('user_id',$data['user_id']);
         endif;
        
         if(!empty($data['type']) ):
             $document->where('type',$data['type']);
         endif;

        if(!empty($data['id']) ):
             $document->where('id',$data['id']);
         endif;

         if(!empty($data['id']) ):
             $document= $document->first();
            return $document->document;
          else:
             return $document->get();
         endif;
   
  }


 static function getUserNameById($id=Null,$type=NULL){


    $userDetail= User::where('id',$id)->first();
    if(!empty($userDetail['name'])):
      return $userDetail['name'];
    endif;
    
  }


static function ordinal_suffix($num){
    $num = $num % 100; // protect against large numbers
    if($num < 11 || $num > 13){
         switch($num % 10){
            case 1: return 'st';
            case 2: return 'nd';
            case 3: return 'rd';
        }
    }
    return 'th';
}
}

