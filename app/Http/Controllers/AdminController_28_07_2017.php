<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;
use Excel;
use App\User;
use App\Customer;
use App\Customers_contact;
use App\Customers_addresse;
use App\Api;
use App\Product;
use App\Machine;
use App\Original_purchase;
use App\Transaction;
use App\transactions_type;
use App\Used_part;
use App\Location;
use App\Xlsx\Xlsx;
use App\customer_xlsx\customer_xlsx;
use App\machinelocation_xlsx\machinelocation_xlsx;
use App\transcationtype_xlsx\transcationtype_xlsx;
use App\returnnotreceived_xlsx\returnnotreceived_xlsx;
use App\partquery_xlsx\partquery_xlsx;
use App\partfailure_xlsx\partfailure_xlsx;
use Response;
use Illuminate\Validation\Rule;
use Config;
use Illuminate\Routing\Route;

@require_once '/var/www/machdb/www/amazon/aws-autoloader.php';
use Aws\S3\MultipartUploader;
use Aws\Exception\MultipartUploadException;
use Aws\S3\S3Client;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Route $route)
    { 
		if($route->getActionName()!='App\Http\Controllers\AdminController@ImportData')
			$this->middleware('auth');
		
		
	}
    public function dashboard(){
        $user = Auth::user();
        $transactions_types=transactions_type::get();
        $Machine=Machine::get();
        $Product=Product::where('category','Parts')->get();
        $Customer=Customer::get();
        $Location=Location::get();
        
        
       $Machines=array();
       $Machines[]=['id'=>'','text'=>''];
       foreach($Machine as $Machines_D):
         $Machines[]=['id'=>$Machines_D->serial_no, 'text'=>$Machines_D->serial_no];  
       endforeach;
        
       $Products=array();
       $Products[]=['id'=>'','text'=>''];
       foreach($Product as $Product_D):
         $Products[]=['id'=>$Product_D->product_id,'text'=>$Product_D->name];  
       endforeach;
  
       $Customers=array();
       $Customers[]=['id'=>'','text'=>''];
       foreach($Customer as $Customer_D):
         $Customers[]=['id'=>$Customer_D->customer_id,'text'=>$Customer_D->name];  
       endforeach;
       
       $Locations=array();
       $Locations[]=['id'=>'','text'=>''];
       foreach($Location as $Location_D):
         $Locations[]=['id'=>$Location_D->id,'text'=>$Location_D->name];  
       endforeach; 
        
       return view('admin.dashboard')
               ->with('a',array("red","green","blue","purple"))
               ->with('transactions_types',$transactions_types)
               ->with('Machine',$Machines)
               ->with('Product',$Products)
               ->with('Customer',$Customers)
               ->with('Location',$Locations)
               ->with('user',$user);
    }

    
    function new_machine(Request $request){
        $data=$request->input();
		unset($data['q']);
        if(count($data)):
                    $this->validate($request, [
                   'serial_no' => 'required|unique:machines',
                   'type' => 'required',
                    ]);
        
        $machines = Machine::create($data);
        return redirect('machines')->with('success','New Machine  is successfully added');
        endif;
        $user = Auth::user();
        $type=[''=>''  ,'PC-11'=>'PC-11','PC-11W-PO-US'=>'PC-11W-PO-US'];
        return view('admin.new_machine')->with('user',$user)->with('type',$type);
    }
    function new_location(Request $request){
        $data=$request->input();
		unset($data['q']);
        if(count($data)):
                    $this->validate($request, [
                   'name' => 'required|max:255',
                    ]);
        
        $Location = Location::create($data);
        return redirect('location')->with('success','New location  is successfully added');
        endif;
        $user = Auth::user();
        return view('admin.new_location')->with('user',$user);
    }
    
    
    
   public function curlRequest($data=array()){
        $Api =   Api::first();
		$end_point=$data['end_point'];
        $method=$data['method'];
        $url=$Api->post_url.$end_point;
        $data=array();
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => $method,
	
		  CURLOPT_HTTPHEADER => array(
            "api-auth-accountid: ".$Api->api_auth_accountid,
            "api-auth-applicationkey:".$Api->api_auth_applicationkey,
            "cache-control: no-cache",
            "content-type: application/json"
          ),
	
		));
        $response = curl_exec($curl);
		
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
           echo "cURL Error #:" . $err;
        } else {
			
         return   $data= json_decode($response);
          
        }        
	}

 

public function ImportData(){
	
    $this->getCustomersDearData();
    $this->getProductsDearData();
}
        
    

 function getCustomersDearData(){
	  $data= $this->curlRequest(['method'=>'get','end_point'=>'/Customers?page=1']);

      if($data->Total){
          


          foreach ($data->Customers as $Customer):
				      $insertData['customer_id']= $Customer->ID; 
                      $insertData['name']= $Customer->Name ;
                      $insertData['currency']= $Customer->Currency ;
                      $insertData['payment_term']= $Customer->PaymentTerm ;
                      $insertData['discount']= $Customer->Discount ;
                      $insertData['tax_rule']= $Customer->TaxRule ; 
                      $insertData['carrier']= $Customer->Carrier ;
                      $insertData['sales_representative']= $Customer->SalesRepresentative ;
                      $insertData['location']= $Customer->Location ;
                      $insertData['comments']= $Customer->Comments ; 
                      $insertData['account_receivable']= $Customer->AccountReceivable;
                      $insertData['revenue_account']= $Customer->RevenueAccount ;
                      $insertData['price_tier']= $Customer->PriceTier ;
                      $insertData['tax_number']= $Customer->TaxNumber ;
                      $insertData['additionalAttribute1']= $Customer->AdditionalAttribute1 ;
                      $insertData['additionalAttribute2']= $Customer->AdditionalAttribute2 ;
                      $insertData['additionalAttribute3']= $Customer->AdditionalAttribute3 ;
                      $insertData['additionalAttribute4']= $Customer->AdditionalAttribute4 ;
                      $insertData['additionalAttribute5']= $Customer->AdditionalAttribute5 ; 
                      $insertData['additionalAttribute6']= $Customer->AdditionalAttribute6 ; 
                      $insertData['additionalAttribute7']= $Customer->AdditionalAttribute7 ; 
                      $insertData['additionalAttribute8']= $Customer->AdditionalAttribute8 ; 
                      $insertData['additionalAttribute9']= $Customer->AdditionalAttribute9 ; 
                      $insertData['additionalAttribute10']= $Customer->AdditionalAttribute10 ;
                      $insertData['attribute_set']= $Customer->AttributeSet ;
                      $insertData['tags']= $Customer->Tags ;
                      $insertData['status']= $Customer->Status ;
                      $insertData['last_modified_on']= $Customer->LastModifiedOn ; 
                      $insertData['credit_limit']= $Customer->CreditLimit ;
                      
                      $check= Customer::where('customer_id',$Customer->ID )->first();
                        if( !is_null($check) && $check->count()):
                            if(!($check->last_modified_on==$Customer->LastModifiedOn)):
                                Customer::where('customer_id',$Customer->ID)->update($insertData);
                            endif;
                          else:   

                            print_r($insertData);
                               Customer::create($insertData);
                        endif;
                        unset($insertData);
                     unset($insertData);
                      
                    //Customers_contact::where('customer_id',$Customer->ID )->create();
                    //Customers_addresse::where('customer_id',$Customer->ID )->create();
                     
                    foreach($Customer->Contacts as $Contact):
							$insertData['customer_id']= $Customer->ID; 
                            $insertData['contact_id']= $Contact->ID; 
                            $insertData['name']= $Contact->Name ;
                            $insertData['job_title']= $Contact->JobTitle ;
                            $insertData['phone']= $Contact->Phone ;
                            $insertData['mobile_phone']= $Contact->MobilePhone ;
                            $insertData['fax']= $Contact->Fax ;
                            $insertData['email']= $Contact->Email ; 
                            $insertData['website']= $Contact->Website ;
                            $insertData['defaults']= $Contact->Default ;
                            $insertData['comment']= $Contact->Comment ;
                            $insertData['include_in_email']= $Contact->IncludeInEmail ; 
						
						$check= Customers_contact::where('customer_id',$Customer->ID )->first();
						if( !is_null($check) && $check->count()):
                            if(!($check->updated_at==$Customer->LastModifiedOn)):
                                Customers_contact::where('customer_id',$Customer->ID)->update($insertData);
                            endif;
                          else:   

                            Customers_contact::create($insertData);
                        endif;
                        unset($insertData);
                      endforeach;
                      
                      foreach($Customer->Addresses as $address):
						
                            $insertData['customer_id']= $Customer->ID; 
                            $insertData['address_id']= $address->ID; 
                            $insertData['line1']= $address->Line1 ;
                            $insertData['line2']= $address->Line2 ;
                            $insertData['city']= $address->City ;
                            $insertData['state']= $address->State ;
                            $insertData['country']= $address->Country ;
                            $insertData['type']= $address->Type ; 
                            $insertData['default_for_type']= $address->DefaultForType ;
							
							$check= Customers_addresse::where('customer_id',$Customer->ID )->first();
							
							if( !is_null($check) && $check->count()):
								if(!($check->updated_at==$Customer->LastModifiedOn)):
									Customers_addresse::where('customer_id',$Customer->ID)->update($insertData);
								endif;
							  else:   

								Customers_addresse::create($insertData);
							endif;
                            unset($insertData);
                       endforeach;
                  endforeach; 
      }  
    }

    public function getProductsDearData(){
        $datas= $this->curlRequest(['method'=>'get','end_point'=>'/Products?page=1']);
       
        foreach ($datas->Products as $data):
                    $insertData['product_id']= $data->ID;
                    $insertData['sku']= $data->SKU;
                    $insertData['name']= $data->Name;
                    $insertData['category']= $data->Category; 
                    $insertData['brand']= $data->Brand;
                    $insertData['type']= $data->Type;
                    $insertData['costing_method']= $data->CostingMethod; 
                    $insertData['drop_ship_mode']= $data->DropShipMode;
                    $insertData['default_location']= $data->DefaultLocation;
                    $insertData['length']= $data->Length;
                    $insertData['width']= $data->Width;
                    $insertData['height']= $data->Height; 
                    $insertData['weight']= $data->Weight;
                    $insertData['uom']= $data->UOM; 
                    $insertData['barcode']= $data->Barcode; 
                    $insertData['tags']= $data->Tags;
                    $insertData['status']= $data->Status;
                    $insertData['last_modified_on']= $data->LastModifiedOn; 
                    $insertData['sellable']= $data->Sellable;
                    $insertData['all_data']= json_encode($data);
        
                        $check= Product::where('product_id',$data->ID )->first();
                        if( !is_null($check) && $check->count()):
                            if(!($check->last_modified_on==$data->LastModifiedOn)):
                                Product::where('product_id',$data->ID)->update($insertData);
                            endif;
                          else:   
                               Product::create($insertData);
                        endif;
                        unset($insertData);
        endforeach;
    }

    
    public function customers(){  
     $user = Auth::user();
     $Customer = Customer:: leftJoin('customers_addresses','customers_addresses.customer_id', '=', 'customers.customer_id')->where('customers_addresses.type','billing')->get();
     return view('admin.customer')->with('user',$user)->with('Customers',$Customer);
    }
    public function machines(Request $request){  
     $user = Auth::user();
     $machines = Machine::get();
     return view('admin.machines')->with('user',$user)->with('machines',$machines);
    }
    public function location(Request $request){  
     $user = Auth::user();
     $Location = Location::get();
     return view('admin.location')->with('user',$user)->with('locations',$Location);
    }


 function components(){
     $user = Auth::user();
     $components = Product::where('category', '!=' ,'Machine')->get();
     return view('admin.components')->with('user',$user)->with('components',$components);
  
 }




function machine_detail(Request $request ,$serial_no){
    
   $Machine=  Machine::where('serial_no',$serial_no )->first();
            $data=$request->input();

   
   $user = Auth::user();
     $transactions_type=transactions_type::get();
     return view('admin.machine_detail')
             ->with('Machine',$Machine)
             ->with('user',$user)
             ->with('transactions_types',$transactions_type);
    }
    
    
  



 function machine_query(){
    $user = Auth::user();
    $transactions_type = transactions_type::pluck('name','id');
    $Customers=    Customer::pluck('name','customer_id');
    $location=Location::pluck('name','id');
    $Machine=Machine::pluck('serial_no','serial_no');
   return view('report.machine_query')->with('user',$user)->with('transactions_types',$transactions_type)->with('Customers',$Customers)->with('location',$location)->with('Machine',$Machine);
 }

 function  machine_query_report(Request $request){
     $searcharray=array();
	 $orderarray=array();
	 
	 $data= $request->input();

    if(isset($data['date_from']) && isset($data['date_to']) ) {
                $from=date('Y-m-d',strtotime($data['date_from']));
                $to  =date('Y-m-d',strtotime($data['date_to'])); 
				
				$searcharray['date_from']=$data['date_from'];
				$searcharray['date_to']=$data['date_to'];
    }    
    if(isset($data['transactions_types'])){
        $transactions_types=  $data['transactions_types'];
		$searcharray['transactions_types']=$data['transactions_types'];
    }
    if(isset($data['customer_id'])){
        $customer_id=  $data['customer_id'];
		$searcharray['customer_id']=$data['customer_id'];
    }
    if(isset($data['location'])){
        $location=  $data['location'];
		$searcharray['location']=$data['location'];
    }
    if(isset($data['serial_no'])){
        $serial_no=  $data['serial_no'];
		$searcharray['serial_no']=$data['serial_no'];
    }     
   
     
      $Transaction = Transaction:: leftJoin('customers','customers.customer_id', '=', 'transactions.customer_id')
                              ->leftJoin('transactions_types','transactions_types.id', '=', 'transactions.transactions_types')
                              ->leftJoin('locations','transactions.location', '=', 'locations.id');
                              

                                if(isset($from) && isset($to) ) {
                                     $Transaction= $Transaction->whereBetween('transactions.dates' , [$from, $to]);
                                 }     
                                 if(isset($customer_id)){
                                   
                                      $Transaction= $Transaction->where('transactions.customer_id', $customer_id);
                                 }    
                                  if(isset($transactions_types)){
                                     
                                      $Transaction= $Transaction->where('transactions.transactions_types', $transactions_types);
                                 }  
                                 if(isset($location)){
                                      $Transaction= $Transaction->where('transactions.location', $location);
                                 }                     
                                 if(isset($serial_no)){
                                      $Transaction= $Transaction->where('transactions.serial_no', $serial_no);
                                 }                     


  $Transaction=$Transaction->get();
    
  
//     Start Filtering
  $iTotalRecords = $Transaction->count();
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);
  
  $records = array();
  $records["data"] = array(); 

  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
  
  
  // sorting order 
   $orderBy='id';
   $order='desc';
   $sort=$data['order'][0];
    if($sort['column']==1){$orderBy='dates'; $order=$sort['dir']; $orderarray['orderby']='dates'; $orderarray['order']=$sort['dir'];}
    if($sort['column']==2){$orderBy='serial_no'; $order=$sort['dir']; $orderarray['orderby']='serial_no'; $orderarray['order']=$sort['dir'];}
    if($sort['column']==3){$orderBy='transactions_types'; $order=$sort['dir']; $orderarray['orderby']='transactions_types'; $orderarray['order']=$sort['dir'];}
    if($sort['column']==4){$orderBy='customers_name'; $order=$sort['dir']; $orderarray['orderby']='customers_name'; $orderarray['order']=$sort['dir'];}
    if($sort['column']==5){$orderBy='location'; $order=$sort['dir']; $orderarray['orderby']='location'; $orderarray['order']=$sort['dir'];}
    if($sort['column']==6){$orderBy='notes_explanation'; $order=$sort['dir']; $orderarray['orderby']='notes_explanation'; $orderarray['order']=$sort['dir'];}
  
  // Searching 
   $Transaction = Transaction:: leftJoin('customers','customers.customer_id', '=', 'transactions.customer_id')
                              ->leftJoin('transactions_types','transactions_types.id', '=', 'transactions.transactions_types')
                              ->leftJoin('locations','transactions.location', '=', 'locations.id')
                              ->take($iDisplayLength)
                              ->skip($iDisplayStart)
                              ->select('transactions.id as id','transactions.serial_no as serial_no', 'transactions.dates as dates','locations.name as location','transactions_types.name as transactions_types','transactions.notes_explanation as notes_explanation','customers.name as customers_name')
                              ->orderBy($orderBy,$order);

                                if(isset($from) && isset($to) ) {
                                     $Transaction= $Transaction->whereBetween('transactions.dates' , [$from, $to]);
                                 }     
                                 if(isset($customer_id)){
                                   
                                      $Transaction= $Transaction->where('transactions.customer_id', $customer_id);
                                 }    
                                  if(isset($transactions_types)){
                                     
                                      $Transaction= $Transaction->where('transactions.transactions_types', $transactions_types);
                                 }  
                                 if(isset($location)){
                                      $Transaction= $Transaction->where('transactions.location', $location);
                                 }                     
                                 if(isset($serial_no)){
                                      $Transaction= $Transaction->where('transactions.serial_no', $serial_no);
                                 } 

  $Transaction=$Transaction->get();

        
  foreach ($Transaction as $TransactionData):
       $records["data"][] = [ 
             ++$iDisplayStart,
            $TransactionData->dates,
            $TransactionData->serial_no,
            $this->getTranctionDetailPopup($TransactionData->transactions_types,$TransactionData->id),
            $TransactionData->customers_name,
            $TransactionData->location,
            $TransactionData->notes_explanation];    
  endforeach;
  
  

  

  $records["draw"] = $sEcho;
  $records["recordsTotal"] = $iTotalRecords;
  $records["recordsFiltered"] = $iTotalRecords;
  session(['conditions' => $searcharray]);
  session(['sorting' => $orderarray]);
  echo json_encode($records);        
//     End Filtering
 }

 
 function customerNameById($customer_id){
     $Customers=    Customer::where('customer_id',$customer_id)->first();
     return  $Customers['name'];
 }
  
 
  function transactionTypeById($id){
     $transactions_type=    transactions_type::where('id',$id)->first();
     return  $transactions_type['name'];
 }
 
 function getLocationNameById($id=NULL){
      $location=    Location::where('id',$id)->first();
      return  $location['name'];
 }
 
 
 function getPartNameById($product_id){
         $Product=    Product::where('product_id',$product_id)->first();
      return  $Product['name'];
     
 }
 
 function all_customers(){
    $Customers=    Customer::get();
    $CustomerData= array();
    foreach($Customers as $Customer):
      //  print_r($Customer);
      $CustomerData[]=['id'=>$Customer->customer_id,'text'=>$Customer->name]; 
    endforeach;
     echo json_encode($CustomerData);
    
 } 
 
 function  all_parts(){
    $Products= Product::where('category','Parts')->get();
     $ProductData= array();
    foreach($Products as $Product):
      //  print_r($Customer);
      $ProductData[]=['id'=>$Product->product_id,'text'=>$Product->name]; 
    endforeach;
     echo json_encode($ProductData);
     
 }
  function  all_parts_array(){
    $Products= Product::where('category','Parts')->pluck('serial_no','serial_no');
     $ProductData= array();
    foreach($Products as $Product):
      //  print_r($Customer);
      $ProductData[]=['id'=>$Product->product_id,'text'=>$Product->name]; 
    endforeach;
    return $ProductData;
     
 }
 
    function save_transactions(Request $request){
	  $keys = DB::table('apis') 
					->where('apis.id', '2')
					->get()
					->first();
					
      $data=$request->input();
	  $s3Client = new S3Client([
									'version' => 'latest',
									'region'  => 'us-east-1',
									'credentials' => array(
															'key' => $keys->api_auth_accountid,
															'secret'  => $keys->api_auth_applicationkey,
														  )
								]);
           $filesArray=array();
             $files=$request->file;
             if(isset($files) && (count($files)>0)){
				  foreach ($files as $key => $file) {
					 $filetitle= isset($data['file_name'][$key])?$data['file_name'][$key]:$file->getClientOriginalName();
					 $fileName = rand(5,15).time().'.'.$file->getClientOriginalExtension();
					$uploader = new MultipartUploader($s3Client, $_FILES['file']['tmp_name'][$key], [
													'bucket' => 'pnamachdb',
													'key'    => $fileName,
												]);
													
					 $result = $uploader->upload();
				     $filesArray[]=array('title'=>$filetitle,'name'=>$fileName);
				 }
		  } 
           
         $data['files']=  json_encode($filesArray);
         $parts_used=array();
         if($data['transactions_types']==7):
             foreach($data['parts'] as $key=>$value  ){
                   $parts_used[]= ['parts'=>$value,'qry'=>$data['qry'][$key],'failure'=>$data['failure'][$key]];
             }
           unset($data['parts'],$data['qry'],$data['failure'])  ;
         endif;
         $Transaction=Transaction::create($data);
         if($data['transactions_types']==7):
                foreach($parts_used as $parts):
                $parts['transaction_id']=$Transaction->id;
                Used_part::create($parts);
                endforeach;
            endif;
    }
    
    
    function customer_query(Request $request,$customer_id=NULL){
       $user = Auth::user();
       $Customers=    Customer::pluck('name','customer_id');


       return view('report.customer_query',compact('Customers','user','customer_id'));
    }
    
 function customer_query_report(Request $request,$customer_id=NULL){
   $data= $request->input();
   $orderarray=array();
   $seracharray=array();
   $Transaction=Transaction::where('customer_id' ,'!=','');
        if(!empty($customer_id)):
           $Transaction->where('customer_id',$customer_id);
		    $seracharray['customer_id']=$customer_id;
        endif;
       $Transaction=  $Transaction->get();
          
//     Start Filtering
  $iTotalRecords = $Transaction->count();
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);
  
  $records = array();
  $records["data"] = array(); 

  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
  
   $orderBy='id';
   $order='desc';
   $sort=$data['order'][0];
    if($sort['column']==1){$orderBy='transactions.dates'; $order=$sort['dir']; $orderarray['orderby']='transactions.dates'; $orderarray['order']=$sort['dir'];}
    if($sort['column']==2){$orderBy='transactions_types.name'; $order=$sort['dir']; $orderarray['orderby']='transactions_types.name'; $orderarray['order']=$sort['dir'];}
    if($sort['column']==3){$orderBy='transactions.serial_no'; $order=$sort['dir']; $orderarray['orderby']='transactions.serial_no'; $orderarray['order']=$sort['dir'];}
    if($sort['column']==4){$orderBy='transactions.notes_explanation'; $order=$sort['dir']; $orderarray['orderby']='transactions.notes_explanation'; $orderarray['order']=$sort['dir'];}
	
	$Transaction = Transaction::where('customer_id' ,'!=','')
                ->leftJoin('transactions_types','transactions_types.id', '=', 'transactions.transactions_types')
                ->select('transactions.*','transactions_types.name as transactions_types')
                ->orderBy($orderBy,$order)
                ->take($iDisplayLength)
                ->skip($iDisplayStart);
  
                if(!empty($customer_id)):
                  $Transaction->where('customer_id',$customer_id);
                endif;
                $Transaction=     $Transaction->get();
  
          
                                            
                
                
                
                
  foreach ($Transaction as $TransactionData):

       $records["data"][] = [  
             ++$iDisplayStart,
            $TransactionData->dates,
            $this->getTranctionDetailPopup($TransactionData->transactions_types,$TransactionData->id),
            $TransactionData->serial_no,
            $TransactionData->notes_explanation ];    
  endforeach;
  
  

  
  $records["draw"] = $sEcho;
  $records["recordsTotal"] = $iTotalRecords;
  $records["recordsFiltered"] = $iTotalRecords;
  session(['cutomer_query_sort' => $orderarray]);
  session(['cutomer_query_search' => $seracharray]);
  echo json_encode($records);        
//     End Filtering
 }
  
 function machine_location_query($serial_no=NULL){
    $user = Auth::user();
    $transactions_types = transactions_type::pluck('name','id');
    $Customers=    Customer::pluck('name','customer_id');
    $location=Location::pluck('name','id');
    $Machine=Machine::pluck('serial_no','serial_no');
    return view('report.machine_location_query',compact('Machine','user','serial_no','location','Customers','transactions_types'));
 }

  function machine_location_query_report(Request $request,$serial_no=NULL){
    $data= $request->input();
	$searchlocationarray=array();
	$orderlocationarray=array();
	$transcationsids=DB::table('transactions')
					->where('transactions.id' ,'!=',NULL)
					->leftJoin('customers','customers.customer_id', '=', 'transactions.customer_id')
					->leftJoin('transactions_types','transactions_types.id', '=', 'transactions.transactions_types')
					->leftJoin('locations','transactions.location', '=', 'locations.id') 
					->groupBy('serial_no');	
					
	$Transactionid= $transcationsids->groupBy('transactions.serial_no')->get([DB::raw('MAX(transactions.id) as id')]);
	
	$serialnumber=array();
	$transcationid=array();
	
	foreach ($Transactionid as $TransactionData):
		$transcationid[]=$TransactionData->id;
	endforeach;		

   
    if(isset($data['date_from']) && isset($data['date_to']) ) {
      $from=date('Y-m-d',strtotime($data['date_from']));
      $to  =date('Y-m-d',strtotime($data['date_to']));  
	  
	  $searchlocationarray['date_from']=$data['date_from'];
	  $searchlocationarray['date_to']=$data['date_to'];
    }    
    if(isset($data['transactions_types'])){
      $transactions_types=  $data['transactions_types'];
	  $searchlocationarray['transactions_types']=$data['transactions_types'];
    }
    if(isset($data['customer_id'])){
      $customer_id=  $data['customer_id'];
	  $searchlocationarray['customer_id']=$data['customer_id'];
    }
    if(isset($data['location'])){
      $location=  $data['location'];
	  $searchlocationarray['location']=$data['location'];
    }
    if(isset($data['serial_no'])){
      $serial_no=  $data['serial_no'];
	  $searchlocationarray['serial_no']=$data['serial_no'];
    }     
    
    $Transaction=Transaction::where('id' ,'!=',NULL);
    if(!empty($serial_no)):
       $Transaction->where('serial_no',$serial_no);
	   $searchlocationarray['serial_no']=$serial_no;
    endif;
      
    if(isset($from) && isset($to) ) {
      $Transaction= $Transaction->whereBetween('transactions.dates' , [$from, $to]);
    }     
    if(isset($customer_id)){
      $Transaction= $Transaction->where('transactions.customer_id', $customer_id);
    }    
    if(isset($transactions_types)){
      $Transaction= $Transaction->where('transactions.transactions_types', $transactions_types);
    }  
    if(isset($location)){
	  	
      $Transaction= $Transaction->where('transactions.return_location', $location);
    }                     
    if(isset($serial_no)){
      $Transaction= $Transaction->where('transactions.serial_no', $serial_no);
    }  
    
    //$Transaction=  $Transaction->groupBy('id')->get();          
    //     Start Filtering    
    $iTotalRecords = $Transaction->count();
    $iDisplayLength = intval($_REQUEST['length']);
    $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
    $iDisplayStart = intval($_REQUEST['start']);
    $sEcho = intval($_REQUEST['draw']);

    $records = array();
    $records["data"] = array(); 

    $end = $iDisplayStart + $iDisplayLength;
    $end = $end > $iTotalRecords ? $iTotalRecords : $end;
 
    $orderBy='id';
    $order='desc';

    $sort=$data['order'][0];
    if($sort['column']==1){$orderBy='transactions.dates'; $order=$sort['dir']; $orderlocationarray['orderby']='transactions.dates'; $orderlocationarray['order']=$sort['dir'];}
    if($sort['column']==2){$orderBy='transactions.serial_no'; $order=$sort['dir']; $orderlocationarray['orderby']='transactions.serial_no'; $orderlocationarray['order']=$sort['dir'];}
    if($sort['column']==3){$orderBy='transactions.customer_id'; $order=$sort['dir']; $orderlocationarray['orderby']='transactions.customer_id'; $orderlocationarray['order']=$sort['dir'];}
    if($sort['column']==4){$orderBy='transactions.transactions_types'; $order=$sort['dir']; $orderlocationarray['orderby']='transactions.transactions_types'; $orderlocationarray['order']=$sort['dir'];}
    if($sort['column']==5){$orderBy='transactions.transactions_types'; $order=$sort['dir']; $orderlocationarray['orderby']='transactions.transactions_types'; $orderlocationarray['order']=$sort['dir'];}
    if($sort['column']==6){$orderBy='transactions.serial_no'; $order=$sort['dir']; $orderlocationarray['orderby']='transactions.serial_no'; $orderlocationarray['order']=$sort['dir'];}
    if($sort['column']==7){$orderBy='transactions.return_location'; $order=$sort['dir']; $orderlocationarray['orderby']='transactions.return_location'; $orderlocationarray['order']=$sort['dir'];}  
	
	/*
    $Transaction = Transaction::where('transactions.id' ,'!=',NULL)
	  ->leftJoin('customers','customers.customer_id', '=', 'transactions.customer_id')
      ->leftJoin('transactions_types','transactions_types.id', '=', 'transactions.transactions_types')
      ->leftJoin('locations','transactions.location', '=', 'locations.id')
      //->select('transactions.*','transactions_types.name as transactions_types', 'customers.name as customer_id' )
	  ->select(['transactions.id','transactions.dates','transactions.serial_no','transactions.customer_id','transactions.return_location','transactions_types.name as transactions_types', 'customers.name as customer_id'])
	  ->orderBy($orderBy,$order)
      ->take($iDisplayLength)
      ->skip($iDisplayStart)
	  ->groupBy('transactions.serial_no');
	*/
	$Transaction=DB::table('transactions')
					->where('transactions.id' ,'!=',NULL)
					->leftJoin('customers','customers.customer_id', '=', 'transactions.customer_id')
					->leftJoin('transactions_types','transactions_types.id', '=', 'transactions.transactions_types')
					->leftJoin('locations','transactions.location', '=', 'locations.id') 
					->orderBy($orderBy,$order)
					->take($iDisplayLength)
					->skip($iDisplayStart) 
					->groupBy('serial_no');	
    
	if(isset($from) && isset($to) ) {
      $Transaction= $Transaction->whereBetween('transactions.dates' , [$from, $to]);
    }     
    if(isset($customer_id)){
      $Transaction= $Transaction->where('transactions.customer_id', $customer_id);
    }    
    if(isset($transactions_types)){
      $Transaction= $Transaction->where('transactions.transactions_types', $transactions_types);
    }  
    if(isset($location)){
      $Transaction= $Transaction->where('transactions.return_location', $location);
    }                     
    if(isset($serial_no)){
      $Transaction= $Transaction->where('transactions.serial_no', $serial_no);
    }  
    
    if(!empty($serial_no)):
      $Transaction->where('transactions.serial_no',$serial_no);
    endif;
	
      //$Transaction= $Transaction->groupBy('transactions.serial_no')->get([DB::raw('MAX(transactions.id) as id'),'transactions.serial_no','transactions.customer_id','transactions.return_location','transactions_types.name as transactions_types','customers.name as customer_id', DB::raw('MAX(transactions.dates) as dates')]);
    	
	  
	$Transaction= $Transaction->whereIn('transactions.id', $transcationid)->groupBy('transactions.serial_no')->get(['transactions.*','transactions_types.name as transactions_types', 'customers.name as customer_id']); 
	  	
	
    foreach ($Transaction as $TransactionData):
       
	   $records["data"][] = [ 
        ++$iDisplayStart, 
        $TransactionData->dates,
        $TransactionData->customer_id,
        $this->getTranctionDetailPopup($TransactionData->transactions_types,$TransactionData->id),
        $TransactionData->serial_no,
        $this->getLocationNameById($TransactionData->return_location),
        ''];    
    endforeach;
	
    $records["draw"] = $sEcho;
    //$records["recordsTotal"] = $iTotalRecords;
    $records["recordsTotal"] = count($Transaction);
    //$records["recordsFiltered"] = $iTotalRecords;
    $records["recordsFiltered"] = count($Transaction);
	session(['conditions' => $searchlocationarray]);
	session(['sorting' => $orderlocationarray]);
    echo json_encode($records);        
    //     End Filtering
  }  


function transaction_type_query($id=NULL){
       $user = Auth::user();
       $transactions_type= transactions_type::pluck('name','id');
       return view('report.transaction_type_query',compact('transactions_type','user','id'));
}

function transaction_type_query_report(Request $request,$id=NULL){
   $data= $request->input();
	$transcationtypesearcharray=array();
	$transcationtypeorderarray=array();
   $Transaction=Transaction::where('id' ,'!=','');
        if(!empty($id)):
           $Transaction->where('transactions_types',$id);
        endif;
       $Transaction=  $Transaction->get();
          
//     Start Filtering
  $iTotalRecords = $Transaction->count();
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);
  
  $records = array();
  $records["data"] = array(); 

  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
  
     if(isset($data['date_from']) && isset($data['date_to']) ) {
                $from=date('Y-m-d',strtotime($data['date_from']));
                $to  =date('Y-m-d',strtotime($data['date_to']));  
    } 

  
    $orderBy='id'; 
    $order='desc';
    $sort=$data['order'][0];
    if($sort['column']==1){$orderBy='dates'; $order=$sort['dir']; $transcationtypeorderarray['orderby']='dates'; $transcationtypeorderarray['order']=$sort['dir'];}
    if($sort['column']==2){$orderBy='transactions_types'; $order=$sort['dir']; $transcationtypeorderarray['orderby']='transactions_types'; $transcationtypeorderarray['order']=$sort['dir'];}
    if($sort['column']==3){$orderBy='serial_no'; $order=$sort['dir']; $transcationtypeorderarray['orderby']='serial_no'; $transcationtypeorderarray['order']=$sort['dir'];}
    if($sort['column']==4){$orderBy='notes_explanation'; $order=$sort['dir']; $transcationtypeorderarray['orderby']='notes_explanation'; $transcationtypeorderarray['order']=$sort['dir'];}
     
  
  $Transaction = Transaction::where('id' ,'!=','')
          ->orderBy($orderBy,$order )
        ->take($iDisplayLength)
        ->skip($iDisplayStart);
  
  
         if(isset($from) && isset($to) ) {
                                     $Transaction= $Transaction->whereBetween('dates' , [$from, $to]);
									 
									 $transcationtypesearcharray['date_from']=$data['date_from'];
									 $transcationtypesearcharray['date_to']=$data['date_to'];
                                 } 
  
  
        if(!empty($id)):
          $Transaction->where('transactions_types',$id);
		  $transcationtypesearcharray['transactions_types']=$id;
        endif;
     $Transaction=     $Transaction->get();
  
  foreach ($Transaction as $TransactionData):
       $records["data"][] = [ 
       ++$iDisplayStart , 
            $TransactionData->dates,
             $this->getTranctionDetailPopup($this->transactionTypeById($TransactionData->transactions_types),$TransactionData->id),
            
            $TransactionData->serial_no,
            $TransactionData->notes_explanation,
           ''];    
  endforeach;
  
  

  $records["draw"] = $sEcho;
  $records["recordsTotal"] = $iTotalRecords;
  $records["recordsFiltered"] = $iTotalRecords;
  session(['conditions' => $transcationtypesearcharray]);
  session(['sorting' => $transcationtypeorderarray]);
  echo json_encode($records);        
//     End Filtering
 }
 
 function part_query(){
     
     $transactions_type = transactions_type::pluck('name','id');
    $Customers=    Customer::pluck('name','customer_id');
    $location=Location::pluck('name','id');
    $Machine=Machine::pluck('serial_no','serial_no');
      $Parts= Product::where('category','Parts')->pluck('name','product_id');

            $user = Auth::user();
            return view('report.part_query',compact('user','Machine','location','Customers','Parts'));
     
 }
 
 function part_query_report(Request $request){
	$data= $request->input();
	$searcharray=array();
	$orderarray=array();
    if(isset($data['date_from']) && isset($data['date_to']) ) {
                $from=date('Y-m-d',strtotime($data['date_from']));
                $to  =date('Y-m-d',strtotime($data['date_to'])); 
				$searcharray['date_from']=$data['date_from'];
				$searcharray['date_to']=$data['date_to'];
    }    

    if(isset($data['location'])){
        $location=  $data['location'];
		$searcharray['location']=$data['location'];
    }
    if(isset($data['serial_no'])){
        $serial_no=  $data['serial_no'];
		$searcharray['serial_no']=$data['serial_no'];
    }
   
     if(isset($data['part'])){
        $part=  $data['part'];
		$searcharray['part']=$data['part'];
    }
      if(isset($data['customers'])){
        $customers=  $data['customers'];
		$searcharray['customers']=$data['customers'];
    }




   $Transaction=Transaction::where('transactions.transactions_types' ,'7');
  
                                if(isset($from) && isset($to) ) {
                                     $Transaction= $Transaction->whereBetween('transactions.dates' , [$from, $to]);
                                 }     
                                 
                                 if(isset($location)){
                                      $Transaction= $Transaction->where('transactions.location', $location);
                                 }                     
                                 if(isset($serial_no)){
                                      $Transaction= $Transaction->where('transactions.serial_no', $serial_no);
                                 }
                                  if(isset($customers)){
                                      $Transaction= $Transaction->where('transactions.customer_id', $customers);
                                 }
                                 if(isset($part)){

                                      $Transaction=$Transaction->leftJoin('used_parts','used_parts.transaction_id','=','transactions.id')->where('used_parts.parts', $part);
                                  
                                 }
   
   
   $Transaction=  $Transaction->get();
          
//     Start Filtering
  $iTotalRecords = $Transaction->count();
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);
  
  $records = array();
  $records["data"] = array(); 

  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
   $orderBy='transactions.id';
    $order='desc';
    $sort=$data['order'][0];
    if($sort['column']==1){$orderBy='transactions.dates'; $order=$sort['dir']; $orderarray['orderby']='transactions.dates'; $orderarray['order']=$sort['dir'];}
    if($sort['column']==2){$orderBy='customers.serial_no'; $order=$sort['dir']; $orderarray['orderby']='customers.serial_no'; $orderarray['order']=$sort['dir'];}
    if($sort['column']==3){$orderBy='transactions.customer_id'; $order=$sort['dir']; $orderarray['orderby']='transactions.customer_id'; $orderarray['order']=$sort['dir'];}
    if($sort['column']==4){$orderBy='transactions.location'; $order=$sort['dir']; $orderarray['orderby']='transactions.location'; $orderarray['order']=$sort['dir'];}
  
  
  
  $Transaction = Transaction::where('transactions.transactions_types' ,'7');
     $Transaction=   $Transaction-> leftJoin('customers','customers.customer_id', '=', 'transactions.customer_id')
        ->leftJoin('locations','transactions.location', '=', 'locations.id')
        ->take($iDisplayLength)
        ->skip($iDisplayStart)
        ->select('transactions.*', 'locations.name as location','customers.name as customers', 'customers.name as customers_name')
        ->orderBy($orderBy,$order);
  
  
                              if(isset($from) && isset($to) ) {
                                     $Transaction= $Transaction->whereBetween('transactions.dates' , [$from, $to]);
                                 }     
                                 
                                 if(isset($location)){
                                      $Transaction= $Transaction->where('transactions.location', $location);
                                 }                     
                                 if(isset($serial_no)){
                                      $Transaction= $Transaction->where('transactions.serial_no', $serial_no);
                                 }
                                if(isset($part)){

                                      $Transaction=$Transaction->leftJoin('used_parts','used_parts.transaction_id','=','transactions.id')->where('used_parts.parts', $part);
                                  
                                 }
                                 if(isset($customers)){
                                      $Transaction= $Transaction->where('transactions.customer_id', $customers);
                                 }

     $Transaction=     $Transaction->get();
  
  foreach ($Transaction as $TransactionData):
      
       $Used_parts= Used_part::where('transaction_id',$TransactionData->id)->get();
       $part_used_table='<table width="100%" class="table"><tr><th width="70%" style="text-align: left;" >Part #</th><th width="15%">Qty</th><th width="15%" >Failure</th></tr>';
       foreach ($Used_parts as $Used_part):
         $part_used_table.='<tr><td style="text-align: left;">'.$this->getPartNameById($Used_part->parts).'</td><td>'.$Used_part->qry.'</td><td>'.$Used_part->failure.'</td></tr>';  
       endforeach;
       $part_used_table.='</table>';
       $records["data"][] = [  
            ++$iDisplayStart,
            $TransactionData->dates,
            $TransactionData->serial_no,
             $this->getTranctionDetailPopup($this->transactionTypeById($TransactionData->transactions_types),$TransactionData->id),
            $TransactionData->customers_name,
            $TransactionData->location,
            $part_used_table];    
  endforeach;
  
  

 
  $records["draw"] = $sEcho;
  $records["recordsTotal"] = $iTotalRecords;
  $records["recordsFiltered"] = $iTotalRecords;
  session(['conditions' => $searcharray]);
  session(['sorting' => $orderarray]);
  echo json_encode($records);        
//     End Filtering
 }
 

function  part_failure_query($product_id=NULL){
       $user = Auth::user();
       $parts= Product::where('category','Parts')->pluck('name','product_id');

       return view('report.part_failure_query',compact('parts','user','product_id'));
}

function  part_failure_query_report(Request $request,$product_id=NULL){
   $data= $request->input();
    
	$searcharray=array();
	$orderarray=array();
	 
   if(isset($data['date_from']) && isset($data['date_to']) ) {
                $from=date('Y-m-d',strtotime($data['date_from']));
                $to  =date('Y-m-d',strtotime($data['date_to']));  
    }   
   
   $Used_part=Used_part::where('used_parts.id' ,'!=','')
   ->where('transactions.id' ,'!=','')
   ->leftJoin('transactions','transactions.id', '=', 'used_parts.transaction_id');
        if(!empty($product_id)):
           $Used_part->where('used_parts.parts',$product_id);
        endif;
        if(isset($from) && isset($to) ) {
                                     $Used_part= $Used_part->whereBetween('used_parts.created_at' , [$from, $to]);
									
                                 }    
                                 
       $Used_part=  $Used_part->get();
          
//     Start Filtering
  $iTotalRecords = $Used_part->count();
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);
  
  $records = array();
  $records["data"] = array(); 

  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
  
  $Used_part=Used_part::where('used_parts.id' ,'!=','')
	->where('transactions.id' ,'!=','')
	->leftJoin('transactions','transactions.id', '=', 'used_parts.transaction_id');
        if(!empty($product_id)):
           $Used_part->where('used_parts.parts',$product_id);
        endif;
          if(isset($from) && isset($to) ) {
                                     $Used_part= $Used_part->whereBetween('used_parts.created_at' , [$from, $to]);
                                 } 
       $Used_part=  $Used_part->get();
 
  //$orderBy='used_parts.id';
  //$orderBy='used_parts.dates';
  //$order='desc';
     $sort=$data['order'][0];

    if($sort['column']==1){$orderBy='products.name'; $order=$sort['dir']; $orderarray['orderby']='products.name'; $orderarray['order']=$sort['dir'];}
    if($sort['column']==2){$orderBy='products.sku'; $order=$sort['dir']; $orderarray['orderby']='products.sku'; $orderarray['order']=$sort['dir'];}
    if($sort['column']==3){$orderBy='transactions.serial_no'; $order=$sort['dir']; $orderarray['orderby']='transactions.serial_no'; $orderarray['order']=$sort['dir'];}
    //if($sort['column']==4){$orderBy='id'; $order=$sort['dir']; $orderarray['orderby']='id'; $orderarray['order']=$sort['dir'];}
    
   

    if($sort['column']==4){$orderBy='used_parts.created_at'; $order=$sort['dir']; $orderarray['orderby']='used_parts.created_at'; $orderarray['order']=$sort['dir'];}
    if($sort['column']==5){$orderBy='used_parts.qry'; $order=$sort['dir']; $orderarray['orderby']='used_parts.qry'; $orderarray['order']=$sort['dir'];}
	
	
  
  $Used_part = Used_part::where('used_parts.id' ,'!=','')
		 ->where('transactions.id' ,'!=','')	
         ->leftJoin('transactions','transactions.id', '=', 'used_parts.transaction_id')
         ->leftJoin('products','products.product_id', '=', 'used_parts.parts')
        ->take($iDisplayLength)
        ->skip($iDisplayStart)
          ->select('used_parts.id as id','used_parts.*','products.name as part_name','products.sku as sku','transactions.notes_explanation as notes_explanation','transactions.serial_no as serial_no','transactions.id as tr_id')
        ->orderBy($orderBy,$order);
		
  if(isset($from) && isset($to) ) {
                                     $Used_part= $Used_part->whereBetween('used_parts.created_at' , [$from, $to]);
									 $searcharray['date_from']=$from;
									 $searcharray['date_to']=$to;
                                 } 
                                 
        if(!empty($product_id)):
          $Used_part->where('parts',$product_id);
		  $searcharray['parts']=$product_id;
        endif;
     $Used_part=     $Used_part->get();
  $i=0;
  foreach ($Used_part as $Used_partData):
	   
       $records["data"][] = [ 

             ++$iDisplayStart, 
              $Used_partData->part_name,
              $this->getPartFailedQueryPopup($Used_partData->sku,$Used_partData->tr_id),
              $Used_partData->serial_no,
              date('Y-m-d',strtotime($Used_partData->created_at)),
           
            
            $Used_partData->qry];    
			$i++;
  endforeach;
  
  


  $records["draw"] = $sEcho;
  $records["recordsTotal"] = $iTotalRecords;
  $records["recordsFiltered"] = $iTotalRecords;
  session(['conditions' => $searcharray]);
  session(['sorting' => $orderarray]);
  echo json_encode($records);        
//     End Filtering
 }


function return_not_received(){
    
     $user = Auth::user();
      $Customers=    Customer::pluck('name','customer_id');
            return view('report.return_not_received',compact('user','Customers'));
}

function  return_not_received_machins(){

$Transaction = Transaction::groupBy('serial_no')->get();

  $allMachines=array();
  foreach ($Transaction as $key => $value) {
    $allMachines[]=$value->serial_no;
  }
  $not_received=array();
  foreach ($allMachines as $value) {
     
	 $idddd=$value;
      $defective_r = Transaction::where('transactions_types','4')->where('serial_no',$value)->orderBy('id','desc')->limit(1)->get();
      $customer_r = Transaction::where('transactions_types','5')->where('serial_no',$value)->orderBy('id','desc')->limit(1)->get();
      $reciept = Transaction::where('transactions_types','6')->where('serial_no',$value)->orderBy('id','desc')->limit(1)->get();

      $defective_r_id=0;
      $customer_r_id=0;
      $reciept_id=0;


      foreach ($defective_r as $key => $value) {
        $defective_r_id=$value->id;
      }
      foreach ($customer_r as $key => $value) {
         $customer_r_id=$value->id;
      }
      foreach ($reciept as $key => $value) {
        $reciept_id=$value->id;
      }

		
     if($defective_r_id || $customer_r_id){
        $returnId='';
        if($defective_r_id>$customer_r_id ){$returnId=$defective_r_id;}
        if($defective_r_id<$customer_r_id ){$returnId=$customer_r_id;}
      
       if($returnId>$reciept_id){
           //$not_received[]= $idddd;
           $not_received[]= $returnId;
       }


     }

   } 
   
return ($not_received);
}


function  return_not_received_report(Request $request){
	$searcharray=array();
	$orderarray=array();
	 
    $not_received= $this->return_not_received_machins();
	$types=array(4,5);
	
   $data= $request->input();
      if(isset($data['date_from']) && isset($data['date_to']) ) {
                $from=date('Y-m-d',strtotime($data['date_from']));
                $to  =date('Y-m-d',strtotime($data['date_to']));  
				
				$searcharray['date_from']=$data['date_from'];
				$searcharray['date_to']=$data['date_to'];
     }    

    if(isset($data['customer_id'])){
        $customer_id=  $data['customer_id'];
		$searcharray['customer_id']=$data['customer_id'];
    }
    
     $Transaction = Transaction::leftJoin('customers','customers.customer_id', '=', 'transactions.customer_id')
				  //->whereIn('transactions.serial_no', $not_received)
				  ->whereIn('transactions.id', $not_received);
        
      if(isset($from) && isset($to) ) {
                                     $Transaction= $Transaction->whereBetween('transactions.dates' , [$from, $to]);
                                 } 

      if(isset($customer_id)){
                                   
                                      $Transaction= $Transaction->where('transactions.customer_id', $customer_id);
                                 } 


     $Transaction=$Transaction->orderBy('transactions.id','desc')->groupBy('transactions.serial_no')->get();
   
          
//     Start Filtering
  $iTotalRecords = $Transaction->count();
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);
  
  $records = array();
  $records["data"] = array(); 

  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;
  
  $orderBy='transactions.id';
  $order='desc';
    $sort=$data['order'][0];
    if($sort['column']==1){$orderBy='dates'; $order=$sort['dir']; $orderarray['orderby']='dates'; $orderarray['order']=$sort['dir'];}
     if($sort['column']==2){$orderBy='serial_no'; $order=$sort['dir']; $orderarray['orderby']='dates'; $orderarray['order']=$sort['dir'];}
     
     if($sort['column']==3){$orderBy='customers.name'; $order=$sort['dir']; $orderarray['orderby']='dates'; $orderarray['order']=$sort['dir'];}
    if($sort['column']==4){$orderBy='return_location'; $order=$sort['dir']; $orderarray['orderby']='dates'; $orderarray['order']=$sort['dir'];}
  
  
          $Transaction = Transaction::leftJoin('customers','customers.customer_id', '=', 'transactions.customer_id')
				->leftJoin('transactions_types','transactions_types.id', '=', 'transactions.transactions_types')
                ->whereIn('transactions.id', $not_received)->take($iDisplayLength) ->skip($iDisplayStart) ->orderBy($orderBy,$order)->groupBy('transactions.serial_no');
        
         if(isset($from) && isset($to) ) {
                                     $Transaction= $Transaction->whereBetween('transactions.dates' , [$from, $to]);
                                 }  
         if(isset($customer_id)){
                                   
                                      $Transaction= $Transaction->where('transactions.customer_id', $customer_id);
                                 } 
        
        $Transaction=$Transaction->select('transactions.*','transactions_types.name as types_name','customers.name as customers_name' );
        $Transaction=$Transaction->get();
  
    //print_r($Transaction); exit();
  
  

  foreach ($Transaction as $TransactionData):
   if($TransactionData->transactions_types==4){ $TransactionData->transactions_types='Defective Return';}
   if($TransactionData->transactions_types==5){ $TransactionData->transactions_types='Customer Return';}

       $records["data"][] = [  
           ++ $iDisplayStart,
            $TransactionData->dates,
            $TransactionData->serial_no,
            $this->getTranctionDetailPopup($TransactionData->types_name,$TransactionData->id),
            $TransactionData->customers_name,
            $this->getLocationNameById($TransactionData->return_location) ];    
  endforeach;
  
  


  $records["draw"] = $sEcho;
  $records["recordsTotal"] = $iTotalRecords;
  $records["recordsFiltered"] = $iTotalRecords;
  session(['conditions' => $searcharray]);
  session(['sorting' => $orderarray]);
  echo json_encode($records);        
//     End Filtering
 }

 function machine_query_xls(){     
	Xlsx::exportXlsx();
 }

 function  getUsedParts($transaction_id){
     
  $Used_parts= Used_part::where('transaction_id',$transaction_id)->get();  

  $jsonData['t_data']=$this->tranactionById($transaction_id);
  $part=[];
  foreach($Used_parts as $Used_part ){
      
  $part[]=['name'=>$this->getPartNameById($Used_part->parts),'qty'=>$Used_part->qry, 'failure'=>$Used_part->failure];    
      
   }

   $jsonData['parts']=   $part; 
   echo json_encode($jsonData)  ;
 }





function getOriginalPurchase ($transaction_id=NULL){
 echo json_encode($this->tranactionById($transaction_id));
}


function getCustomerPlacement ($transaction_id=NULL){
echo json_encode($this->tranactionById($transaction_id));
}


function getCustomerReplacement ($transaction_id=NULL){
echo json_encode($this->tranactionById($transaction_id));
}



function getDefectiveReturn ($transaction_id=NULL){
echo json_encode($this->tranactionById($transaction_id));
}


function getCustomerReturn ($transaction_id=NULL){
echo json_encode($this->tranactionById($transaction_id));
}


function getReceipt ($transaction_id=NULL){
echo json_encode($this->tranactionById($transaction_id));
}



function getDisposal ($transaction_id=NULL){
echo json_encode($this->tranactionById($transaction_id));
}


function getTransfer ($transaction_id=NULL){
 echo json_encode($this->tranactionById($transaction_id));
}



 function tranactionById($transaction_id){
  $Transactions= Transaction::where('id',$transaction_id)->first();
  $data['transactions_types']=$Transactions['transactions_types'];
  $data['serial_no']=$Transactions['serial_no'];
  $data['dates']=$Transactions->dates;
  $data['invoice_no']=$Transactions['invoice_no'];  
  

  $file= json_decode($Transactions['files']);
  if(isset($file[0]->title)){
  $data['files_title']=$file[0]->title;
  $keys = DB::table('apis') 
					->where('apis.id', '2')
					->get()
					->first();

  $s3Client = new S3Client([
									'version' => 'latest',
									'region'  => 'us-east-1',
									'credentials' => array(
															'key' => $keys->api_auth_accountid,
															'secret'  => $keys->api_auth_applicationkey,
														  )
							]);
  $cmd = $s3Client->getCommand('GetObject', [
    'Bucket' => 'pnamachdb',
    'Key'    => $file[0]->name
  ]);
  $request = $s3Client->createPresignedRequest($cmd, '+20 minutes');
  $data['files_url'] = (string) $request->getUri();
  }else{
    $data['files_title']='';
   $data['files_url']='';
  }

  $data['customer_name']=$this->customerNameById($Transactions['customer_id']) ;
  $data['shipping_carrier']=$Transactions['shipping_carrier'];
  $data['shipping_tracking']=$Transactions['shipping_tracking'];
  $data['return_location']=$this->getLocationNameById($Transactions['return_location']);
  $data['notes_explanation']=(!empty($Transactions['notes_explanation']) || trim($Transactions['notes_explanation'])!='') ? strip_tags($Transactions['notes_explanation']) : 'NA';
  $data['location']=$this->getLocationNameById($Transactions['location'])  ;
  $data['to_location']=$this->getLocationNameById( $Transactions['to_location']) ;
  $data['from_location']=$this->getLocationNameById($Transactions['from_location'])  ;
  $data['updated_at']=$Transactions['updated_at'];
  $data['created_at']=$Transactions['created_at'];
  return $data;
 }


function getTranctionDetailPopup($transactions_types,$TransactionId){    
    if($transactions_types=='Original Purchase'){
          $transactions_types= '<a href="#" data-toggle="modal" data-target="#myModal" onclick="getOriginalPurchase('.$TransactionId.')" >'.$transactions_types.'</a>'; 
        }

        if($transactions_types=='Customer Placement'){
          $transactions_types= '<a href="#" data-toggle="modal" data-target="#myModal" onclick="getCustomerPlacement('.$TransactionId.')" >'.$transactions_types.'</a>'; 
        }

        if($transactions_types=='Customer Replacement'){
          $transactions_types= '<a href="#" data-toggle="modal" data-target="#myModal" onclick="getCustomerReplacement('.$TransactionId.')" >'.$transactions_types.'</a>'; 
        }

        if($transactions_types=='Defective Return'){
          $transactions_types= '<a href="#" data-toggle="modal" data-target="#myModal" onclick="getDefectiveReturn('.$TransactionId.')" >'.$transactions_types.'</a>'; 
        }

        if($transactions_types=='Customer Return'){
           $transactions_types= '<a href="#" data-toggle="modal" data-target="#myModal" onclick="getCustomerReturn('.$TransactionId.')" >'.$transactions_types.'</a>'; 
        }

        if($transactions_types=='Receipt'){
          $transactions_types= '<a href="#" data-toggle="modal" data-target="#myModal" onclick="getReceipt('.$TransactionId.')" >'.$transactions_types.'</a>'; 
        }

        if($transactions_types=='Refurbish'){
          $transactions_types= '<a href="#" data-toggle="modal" data-target="#myModal" onclick="getRefurbish('.$TransactionId.')" >'.$transactions_types.'</a>'; 
        }

         if($transactions_types=='Disposal'){
          $transactions_types= '<a href="#" data-toggle="modal" data-target="#myModal" onclick="getDisposal('.$TransactionId.')" >'.$transactions_types.'</a>'; 
        }

         if($transactions_types=='Transfer'){
          $transactions_types= '<a href="#" data-toggle="modal" data-target="#myModal" onclick="getTransfer('.$TransactionId.')" >'.$transactions_types.'</a>'; 
        }
        return $transactions_types;
      }

  function getPartFailedQueryPopup($transactions_sku,$TransactionId){    
    if($TransactionId !=''){
      //$transactions_sku= '<a href="#" data-toggle="modal" data-target="#myModal" onclick="getTransfer('.$TransactionId.')" >'.$transactions_sku.'</a>'; 
	  
      $transactions_sku= '<a href="#" data-toggle="modal" data-target="#myModal" onclick="getRefurbish('.$TransactionId.')" >'.$transactions_sku.'</a>'; 
    }
    return $transactions_sku;
  }



function new_user(Request $request){
        $data=$request->input();
		unset($data['q']);
        if(count($data)):
                    $this->validate($request, [
                   'name' => 'required|max:255',
                   'email' => 'required|email|max:255|unique:users',
                   'password' => 'required|min:6|confirmed',
                    ]);
        



        $User = User::create(['name'=>$data['name'],'email'=>$data['email'],'password'=>bcrypt($data['password']),'show_password'=>$data['password']] );
        return redirect('users')->with('success','New user  is successfully added');
        endif;
        $user = Auth::user();
        return view('admin.new_user')->with('user',$user);
}

	function users(){
		$user = Auth::user();
		$users = User::where('id','!=','1')->orderBy('id','DESC')->get();
		return view('admin.users')->with('user',$user)->with('users',$users);
	}

	function customer_query_xls(){     
		customer_xlsx::exportXlsx();
	}

	function machinelocation_query_xls(){     
		machinelocation_xlsx::exportXlsx();
	}
	
	function transcationtype_query_xls(){     
		transcationtype_xlsx::exportXlsx();
	}
	
	function returnnotreceived_xlsx(){     
		returnnotreceived_xlsx::exportXlsx();
	}
	
	function partquery_xlsx(){     
		partquery_xlsx::exportXlsx();
	}
	
	function partfailure_xlsx(){     
		partfailure_xlsx::exportXlsx();
	}
	
	function customer_csv(){
		 $sorting=session('sorting');
		 $search=session('cutomer_query_search');
		 $j=1;
		 $headers = array(
							"Content-type" => "text/csv",
							"Content-Disposition" => "attachment; filename=file.csv",
							"Pragma" => "no-cache",
							"Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
							"Expires" => "0"
						);

		//$reviews = Reviews::getReviewExport($this->hw->healthwatchID)->get();
		$Transaction =  DB::table('transactions')
								->where('customer_id' ,'!=','')
								->leftJoin('transactions_types','transactions_types.id', '=', 'transactions.transactions_types')
								->select('transactions.*','transactions_types.name as transactions_types')
								->orderBy($sorting['orderby'],$sorting['order']);
		if(isset($search['customer_id']))
			$Transaction->where('customer_id',$search['customer_id']);
		$Transaction=$Transaction->get();						
		
		if(count($Transaction)>0){
			$tot_record_found=1;
			 
			$CsvData=array('S.No#,Date,Transcation Type,Serial No#,Notes');          
			foreach($Transaction as $value){              
				$CsvData[]=$j++.','.$value->dates.','.$value->transactions_types.','.$value->serial_no.','.strip_tags($value->notes_explanation);
			}
			 
			$filename="customer_query_".date('Y-m-d').".csv";
			$file_path=base_path().'/'.$filename;   
			$file = fopen($file_path,"w+");
			foreach ($CsvData as $exp_data){
			  fputcsv($file,explode(',',$exp_data));
			}   
			fclose($file);          
	 
			$headers = ['Content-Type' => 'application/csv'];
			return response()->download($file_path,$filename,$headers )->deleteFileAfterSend(true);
		}
		else{
			$CsvData=array('S.No#,Date,Transcation Type,Serial No#,Notes');          
			$filename="customer_query_".date('Y-m-d').".csv";
			$file_path=base_path().'/'.$filename;   
			$file = fopen($file_path,"w+");
			foreach ($CsvData as $exp_data){
			  fputcsv($file,explode(',',$exp_data));
			}   
			fclose($file);          
	 
			$headers = ['Content-Type' => 'application/csv'];
			return response()->download($file_path,$filename,$headers )->deleteFileAfterSend(true);
		}
		return view('download',['record_found' =>$tot_record_found]);   
	}
	
	function machine_location_csv(){
		$condition=session('conditions');
		$sorting=session('sorting');
			
		 $j=1;
		 $headers = array(
							"Content-type" => "text/csv",
							"Content-Disposition" => "attachment; filename=file.csv",
							"Pragma" => "no-cache",
							"Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
							"Expires" => "0"
						);

		//$reviews = Reviews::getReviewExport($this->hw->healthwatchID)->get();
		$transcationsids=DB::table('transactions')
					->where('transactions.id' ,'!=',NULL)
					->leftJoin('customers','customers.customer_id', '=', 'transactions.customer_id')
					->leftJoin('transactions_types','transactions_types.id', '=', 'transactions.transactions_types')
					->leftJoin('locations','transactions.location', '=', 'locations.id') 
					->groupBy('serial_no');	
					
		$Transactionid= $transcationsids->groupBy('transactions.serial_no')->get([DB::raw('MAX(transactions.id) as id')]);
		
		$serialnumber=array();
		$transcationid=array();
		
		foreach($Transactionid as $TransactionData):
			$transcationid[]=$TransactionData->id;
		endforeach;		

		$Transaction=DB::table('transactions')
							->where('transactions.id' ,'!=',NULL)
							->leftJoin('customers','customers.customer_id', '=', 'transactions.customer_id')
							->leftJoin('transactions_types','transactions_types.id', '=', 'transactions.transactions_types')
							->leftJoin('locations','transactions.location', '=', 'locations.id') 
							->orderBy($sorting['orderby'],$sorting['order'])
							->groupBy('serial_no');	
							
		if(isset($condition['date_from']) && isset($condition['date_to']) ) {
		  $Transaction= $Transaction->whereBetween('transactions.dates' , [$condition['date_from'], $condition['date_to']]);
		}     
		if(isset($condition['customer_id'])){
		  $Transaction= $Transaction->where('transactions.customer_id', $condition['customer_id']);
		}    
		if(isset($condition['transactions_types'])){
		  $Transaction= $Transaction->where('transactions.transactions_types', $condition['transactions_types']);
		}  
		if(isset($condition['location'])){
		  $Transaction= $Transaction->where('transactions.return_location', $condition['location']);
		}                     
		if(isset($condition['serial_no'])){
		  $Transaction= $Transaction->where('transactions.serial_no', $condition['serial_no']);
		} 
				
		$Transaction= $Transaction->whereIn('transactions.id', $transcationid)->groupBy('transactions.serial_no')->get(['transactions.*','transactions_types.name as transactions_types', 'customers.name as customer_id']); 
			
		
		if(count($Transaction)>0){
			$tot_record_found=1;
			 
			$CsvData=array('S.No#,Date,Customer,Transcation Type,Serial No#,Return Location');          
			foreach($Transaction as $value){              
				$CsvData[]=$j++.','.$value->dates.','.$value->customer_id.','.$value->transactions_types.','.$value->serial_no.','.$this->getLocationNameById($value->return_location);
			}
			 
			$filename="machine_location_query_".date('Y-m-d').".csv";
			$file_path=base_path().'/'.$filename;   
			$file = fopen($file_path,"w+");
			foreach ($CsvData as $exp_data){
			  fputcsv($file,explode(',',$exp_data));
			}   
			fclose($file);          
	 
			$headers = ['Content-Type' => 'application/csv'];
			return response()->download($file_path,$filename,$headers )->deleteFileAfterSend(true);
		}
		else{
			$CsvData=array('S.No#,Date,Customer,Transcation Type,Serial No#,Return Location');          
						 
			$filename="machine_location_query_".date('Y-m-d').".csv";
			$file_path=base_path().'/'.$filename;   
			$file = fopen($file_path,"w+");
			foreach ($CsvData as $exp_data){
			  fputcsv($file,explode(',',$exp_data));
			}   
			fclose($file);          
	 
			$headers = ['Content-Type' => 'application/csv'];
			return response()->download($file_path,$filename,$headers )->deleteFileAfterSend(true);
		}
		return view('download',['record_found' =>$tot_record_found]);   
	}
	
	function transcation_type_csv(){
		$condition=session('conditions');
		$sorting=session('sorting');
			
		 $j=1;
		 $headers = array(
							"Content-type" => "text/csv",
							"Content-Disposition" => "attachment; filename=file.csv",
							"Pragma" => "no-cache",
							"Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
							"Expires" => "0"
						);

		//$reviews = Reviews::getReviewExport($this->hw->healthwatchID)->get();
		$Transaction=DB::table('transactions')
							->where('id' ,'!=','')
							->orderBy($sorting['orderby'],$sorting['order']);	
			
		if(isset($condition['date_from']) && isset($condition['date_to']) ) {
		  $Transaction= $Transaction->whereBetween('transactions.dates' , [$condition['date_from'], $condition['date_to']]);
		}   

		if(isset($condition['transactions_types'])){
		  $Transaction= $Transaction->where('transactions.transactions_types', $condition['transactions_types']);
		}   
						
		$Transaction= $Transaction->get();
			
		
		if(count($Transaction)>0){
			$tot_record_found=1;
			 
			$CsvData=array('S.No#,Date,Transcation Type,Serial No#,Notes');          
			foreach($Transaction as $value){              
				$CsvData[]=$j++.','.$value->dates.','.$this->transactionTypeById($value->transactions_types).','.$value->serial_no.','. strip_tags($value->notes_explanation);
			}
			 
			$filename="transcation_type_query_".date('Y-m-d').".csv";
			$file_path=base_path().'/'.$filename;   
			$file = fopen($file_path,"w+");
			foreach ($CsvData as $exp_data){
			  fputcsv($file,explode(',',$exp_data));
			}   
			fclose($file);          
	 
			$headers = ['Content-Type' => 'application/csv'];
			return response()->download($file_path,$filename,$headers )->deleteFileAfterSend(true);
		}
		
		else{
			$CsvData=array('S.No#,Date,Transcation Type,Serial No#,Notes');          
			
			$filename="transcation_type_query_".date('Y-m-d').".csv";
			$file_path=base_path().'/'.$filename;   
			$file = fopen($file_path,"w+");
			foreach ($CsvData as $exp_data){
			  fputcsv($file,explode(',',$exp_data));
			}   
			fclose($file);          
	 
			$headers = ['Content-Type' => 'application/csv'];
			return response()->download($file_path,$filename,$headers )->deleteFileAfterSend(true);
		}
		return view('download',['record_found' =>$tot_record_found]);   
	}
	
	function return_not_received_csv(){
		$condition=session('conditions');
		$sorting=session('sorting');
			
		 $j=1;
		 $headers = array(
							"Content-type" => "text/csv",
							"Content-Disposition" => "attachment; filename=file.csv",
							"Pragma" => "no-cache",
							"Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
							"Expires" => "0"
						);

		$not_received=$this->return_not_received_machins();
		
		$Transaction = DB::table('transactions')
							  ->leftJoin('customers','customers.customer_id', '=', 'transactions.customer_id')
							  ->leftJoin('transactions_types','transactions_types.id', '=', 'transactions.transactions_types')
							  ->whereIn('transactions.id', $not_received)
							  ->orderBy('transactions.id','DESC')
							  ->groupBy('transactions.serial_no');

		if(isset($condition['date_from']) && isset($condition['date_to']) ) {
		  $Transaction= $Transaction->whereBetween('transactions.dates' , [$condition['date_from'], $condition['date_to']]);
		}   

		if(isset($condition['customer_id'])){
			
		  $Transaction= $Transaction->where('transactions.customer_id', $condition['customer_id']);
		}   
		
		$Transaction=$Transaction->select('transactions.*','transactions_types.name as types_name','customers.name as customers_name' );
		$Transaction=$Transaction->get();

			
		
		if(count($Transaction)>0){
			$tot_record_found=1;
			 
			$CsvData=array('S.No#,Date,Serial,Transcation Type,Customer Name,Return Location(PNA)');          
			foreach($Transaction as $value){   
				if($value->transactions_types==4)
					$transcation_type='Defective Return';
				else
					$transcation_type='Customer Return';
				
				$CsvData[]=$j++.','.$value->dates.','.$value->serial_no.','.$transcation_type.','.$value->customers_name.','. $this->getLocationNameById($value->return_location);
			}
			 
			$filename="Return_not_received_".date('Y-m-d').".csv";
			$file_path=base_path().'/'.$filename;  
			$file = fopen($file_path,"w+");
			foreach ($CsvData as $exp_data){
			  fputcsv($file,explode(',',$exp_data));
			}   
			fclose($file);          
	 
			$headers = ['Content-Type' => 'application/csv'];
			return response()->download($file_path,$filename,$headers )->deleteFileAfterSend(true);
		}
		else{
			$tot_record_found=1;
			 
			$CsvData=array('S.No#,Date,Serial,Transcation Type,Customer Name,Return Location(PNA)');          
			
			$filename="Return_not_received_".date('Y-m-d').".csv";
			$file_path=base_path().'/'.$filename;  
			$file = fopen($file_path,"w+");
			foreach ($CsvData as $exp_data){
			  fputcsv($file,explode(',',$exp_data));
			}   
			fclose($file);          
	 
			$headers = ['Content-Type' => 'application/csv'];
			return response()->download($file_path,$filename,$headers )->deleteFileAfterSend(true);
		}
		return view('download',['record_found' =>$tot_record_found]);   
		
	}
	
	function part_failure_csv(){
		$condition=session('conditions');
		$sorting=session('sorting');
			
		 $j=1;
		 $headers = array(
							"Content-type" => "text/csv",
							"Content-Disposition" => "attachment; filename=file.csv",
							"Pragma" => "no-cache",
							"Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
							"Expires" => "0"
						);

		$Used_part =  DB::table('used_parts')
									->where('used_parts.id' ,'!=','')
									->where('transactions.id' ,'!=','')	
									->leftJoin('transactions','transactions.id', '=', 'used_parts.transaction_id')
									->leftJoin('products','products.product_id', '=', 'used_parts.parts')
									->select('used_parts.id as id','used_parts.*','products.name as part_name','products.sku as sku','transactions.notes_explanation as notes_explanation','transactions.serial_no as serial_no','transactions.id as tr_id')
									->orderBy($sorting['orderby'],$sorting['order']);
							
		if(isset($condition['date_from']) && isset($condition['date_to']) ) {
			$Used_part= $Used_part->whereBetween('used_parts.created_at' , [$condition['date_from'], $condition['date_to']]);
		} 	

		if(!empty($condition['parts'])):
			$Used_part->where('parts',$condition['parts']);
		endif;

		$Used_part=$Used_part->get();
			
		
		if(count($Used_part)>0){
			$tot_record_found=1;
			 
			$CsvData=array('S.No#,Part,Description,Serial No,Date,Qty');          
			foreach($Used_part as $value){   
				$CsvData[]=$j++.','.$value->part_name.','.$value->sku.','.$value->serial_no.','.date('Y-m-d',strtotime($value->created_at)).','.$value->qry;
			}
			 
			$filename="part_failure_".date('Y-m-d').".csv";
			$file_path=base_path().'/'.$filename;  
			$file = fopen($file_path,"w+");
			foreach ($CsvData as $exp_data){
			  fputcsv($file,explode(',',$exp_data));
			}   
			fclose($file);          
	 
			$headers = ['Content-Type' => 'application/csv'];
			return response()->download($file_path,$filename,$headers )->deleteFileAfterSend(true);
		}
		else{
			$tot_record_found=1;
			 
			$CsvData=array('S.No#,Part,Description,Serial No,Date,Qty');          
						 
			$filename="part_failure_".date('Y-m-d').".csv";
			$file_path=base_path().'/'.$filename;  
			$file = fopen($file_path,"w+");
			foreach ($CsvData as $exp_data){
			  fputcsv($file,explode(',',$exp_data));
			}   
			fclose($file);          
	 
			$headers = ['Content-Type' => 'application/csv'];
			return response()->download($file_path,$filename,$headers )->deleteFileAfterSend(true);
		}
		return view('download',['record_found' =>$tot_record_found]);   
	}
	/*
	function part_failure_csv(){
		$condition=session('conditions');
		$sorting=session('sorting');
			
		 $j=1;
		 $headers = array(
							"Content-type" => "text/csv",
							"Content-Disposition" => "attachment; filename=file.csv",
							"Pragma" => "no-cache",
							"Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
							"Expires" => "0"
						);

		$Used_part =  DB::table('used_parts')
									->where('used_parts.id' ,'!=','')
									->where('transactions.id' ,'!=','')	
									->leftJoin('transactions','transactions.id', '=', 'used_parts.transaction_id')
									->leftJoin('products','products.product_id', '=', 'used_parts.parts')
									->select('used_parts.id as id','used_parts.*','products.name as part_name','products.sku as sku','transactions.notes_explanation as notes_explanation','transactions.serial_no as serial_no','transactions.id as tr_id')
									->orderBy($sorting['orderby'],$sorting['order']);
							
		if(isset($condition['date_from']) && isset($condition['date_to']) ) {
			$Used_part= $Used_part->whereBetween('used_parts.created_at' , [$condition['date_from'], $condition['date_to']]);
		} 	

		if(!empty($condition['parts'])):
			$Used_part->where('parts',$condition['parts']);
		endif;

		$Used_part=$Used_part->get();
			
		
		if(count($Used_part)>0){
			$tot_record_found=1;
			 
			$CsvData=array('S.No#,Part,Description,Serial No,Date,Qty');          
			foreach($Used_part as $value){   
				$CsvData[]=$j++.','.$value->part_name.','.$value->sku.','.$value->serial_no.','.date('Y-m-d',strtotime($value->created_at)).','.$value->qry;
			}
			 
			$filename="part_failure_".date('Y-m-d').".csv";
			$file_path=base_path().'/'.$filename;  
			$file = fopen($file_path,"w+");
			foreach ($CsvData as $exp_data){
			  fputcsv($file,explode(',',$exp_data));
			}   
			fclose($file);          
	 
			$headers = ['Content-Type' => 'application/csv'];
			return response()->download($file_path,$filename,$headers )->deleteFileAfterSend(true);
		}
		return view('download',['record_found' =>$tot_record_found]);   
	}
	*/
	function part_query_csv(){
		$condition=session('conditions');
		$sorting=session('sorting');
			
		 $j=1;
		 $headers = array(
							"Content-type" => "text/csv",
							"Content-Disposition" => "attachment; filename=file.csv",
							"Pragma" => "no-cache",
							"Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
							"Expires" => "0"
						);

		$Transaction = DB::table('transactions')->where('transactions.transactions_types' ,'7');
			$Transaction=  $Transaction->leftJoin('customers','customers.customer_id', '=', 'transactions.customer_id')
										->leftJoin('locations','transactions.location', '=', 'locations.id')
										->select('transactions.*', 'locations.name as location','customers.name as customers', 'customers.name as customers_name')
										->orderBy($sorting['orderby'],$sorting['order']);
										
			if(isset($condition['date_from']) && isset($condition['date_to']) ) {
				 $Transaction= $Transaction->whereBetween('transactions.dates' , [$condition['date_from'], $condition['date_to']]);
			 }     
			 
			 if(isset($condition['location'])){
				  $Transaction= $Transaction->where('transactions.location', $condition['location']);
			 }                     
			 if(isset($condition['serial_no'])){
				  $Transaction= $Transaction->where('transactions.serial_no', $condition['serial_no']);
			 }
			if(isset($condition['part'])){

				  $Transaction=$Transaction->leftJoin('used_parts','used_parts.transaction_id','=','transactions.id')->where('used_parts.parts', $condition['part']);
			  
			 }
			 if(isset($condition['customers'])){
				  $Transaction= $Transaction->where('transactions.customer_id', $condition['customers']);
			 }										
		$Transaction = $Transaction->get();
			
		
		if(count($Transaction)>0){
			$tot_record_found=1;
			 
			$CsvData=array('S.No#,Date,Serial,Transcation,Customer,Location,Parts used in repair,Part,Quantity,Failure');          
			foreach($Transaction as $value){   
				$CsvData[]=$j++.','.$value->dates.','.$value->serial_no.','.$this->transactionTypeById($value->transactions_types).','.$value->customer_id.','.$value->location;
				
				$Used_parts= DB::table('used_parts')->where('transaction_id',$value->id)->get();
				
				foreach ($Used_parts as $Used_part){
					$CsvData[].=",".$this->getPartNameById($Used_part->parts).",".$Used_part->qry.",".$Used_part->failure;
				}
			}
			 
			$filename="part_query_".date('Y-m-d').".csv";
			$file_path=base_path().'/'.$filename;  
			$file = fopen($file_path,"w+");
			foreach ($CsvData as $exp_data){
			  fputcsv($file,explode(',',$exp_data));
			}   
			fclose($file);          
	 
			$headers = ['Content-Type' => 'application/csv'];
			return response()->download($file_path,$filename,$headers )->deleteFileAfterSend(true);
		}
		else{
			$tot_record_found=1;
			 
			$CsvData=array('S.No#,Date,Serial,Transcation,Customer,Location,Parts used in repair,Part,Quantity,Failure');          
						 
			$filename="part_query_".date('Y-m-d').".csv";
			$file_path=base_path().'/'.$filename;  
			$file = fopen($file_path,"w+");
			foreach ($CsvData as $exp_data){
			  fputcsv($file,explode(',',$exp_data));
			}   
			fclose($file);          
	 
			$headers = ['Content-Type' => 'application/csv'];
			return response()->download($file_path,$filename,$headers )->deleteFileAfterSend(true);
		}
		return view('download',['record_found' =>$tot_record_found]);   
	}
	
	function machine_query_csv(){
		$condition=session('conditions');
		$sorting=session('sorting');
			
		 $j=1;
		 $headers = array(
							"Content-type" => "text/csv",
							"Content-Disposition" => "attachment; filename=file.csv",
							"Pragma" => "no-cache",
							"Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
							"Expires" => "0"
						);
			
			$Transaction = DB::table('transactions') 
							  ->leftJoin('customers','customers.customer_id', '=', 'transactions.customer_id')
                              ->leftJoin('transactions_types','transactions_types.id', '=', 'transactions.transactions_types')
                              ->leftJoin('locations','transactions.location', '=', 'locations.id')
                              ->select('transactions.id as id','transactions.serial_no as serial_no', 'transactions.dates as dates','locations.name as location','transactions_types.name as transactions_types','transactions.notes_explanation as notes_explanation','customers.name as customers_name')
                              ->orderBy($sorting['orderby'],$sorting['order']);
							  
			if(isset($condition['date_from']) && isset($condition['date_to'])){
				$Transaction= $Transaction->whereBetween('transactions.dates' , [$condition['date_from'], $condition['date_to']]);
			}     
			
			if(isset($condition['customer_id'])){
				$Transaction= $Transaction->where('transactions.customer_id', $condition['customer_id']);
			 }  
			 
			if(isset($condition['transactions_types'])){
				$Transaction= $Transaction->where('transactions.transactions_types', $condition['transactions_types']);
			}  
			
			if(isset($condition['location'])){
				$Transaction= $Transaction->where('transactions.location', $condition['location']);
			}                     
			
			if(isset($condition['serial_no'])){
				$Transaction= $Transaction->where('transactions.serial_no', $condition['serial_no']);
			} 
			
			$Transaction=$Transaction->get();	

		
		if(count($Transaction)>0){
			$tot_record_found=1;
			 
			$CsvData=array('Id,Date,Serial No.,Transcation Type,Customer(with address),Location(PNA),Notes');          
			foreach($Transaction as $value){   
				$CsvData[]=$j++.','.$value->dates.','.$value->serial_no.','.strip_tags($this->getTranctionDetailPopup($value->transactions_types,$value->id)).','.$value->customers_name.','.$value->location.','.strip_tags($value->notes_explanation);
			}
			 
			$filename="machine_query_".date('Y-m-d').".csv";
			$file_path=base_path().'/'.$filename;  
			$file = fopen($file_path,"w+");
			foreach ($CsvData as $exp_data){
			  fputcsv($file,explode(',',$exp_data));
			}   
			fclose($file);          
	 
			$headers = ['Content-Type' => 'application/csv'];
			return response()->download($file_path,$filename,$headers )->deleteFileAfterSend(true);
		}
		else{
			$CsvData=array('Id,Date,Serial No.,Transcation Type,Customer(with address),Location(PNA),Notes');          
			
			 
			$filename="machine_query_".date('Y-m-d').".csv";
			$file_path=base_path().'/'.$filename;  
			$file = fopen($file_path,"w+");
			foreach ($CsvData as $exp_data){
			  fputcsv($file,explode(',',$exp_data));
			}   
			fclose($file);          
	 
			$headers = ['Content-Type' => 'application/csv'];
			return response()->download($file_path,$filename,$headers )->deleteFileAfterSend(true);
		}
		return view('download',['record_found' =>$tot_record_found]);   
	}
	
	function profile($id=null,Request $request){
		$data=$request->input();
		unset($data['q']);
		if(count($data)==0):
			$userinfo = DB::table('users')->where('users.id', base64_decode($id))->get()->first();
			return view('admin.profile')->with('user',$userinfo);
		endif;
		
        if(count($data)):
                    $this->validate($request, [
                   'name' => 'required|max:255',
                   'email' => [
									'required',
									'email',
									 Rule::unique('users')->ignore(base64_decode($id)),
							],
               	    'secondary_email' => [
									'required',
									'email',
									 Rule::unique('users')->ignore(base64_decode($id)),
							]
                    ]);
		
		$user = User::find(base64_decode($id));
		$user->name=$data['name'];
		$user->email=$data['email'];
		$user->secondary_email=$data['secondary_email'];
		$user->save();
        
		return redirect('profile/'.$id)->with('success','Profile has been updated successfully');
        endif;
        
		$user = Auth::user();
        return view('admin.profile')->with('user',$userinfo);
	}
	
	public function getconfiguration(){
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
				echo("success<br>");
				echo "<pre>";
				print_r($results);
			}
		}
	}

	function upload_machines(Request $request){
       $user = Auth::user();
	   $data=$request->input();
	   unset($data['q']);
	   if(count($data)):
			$mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
			if(!in_array($_FILES['csv']['type'],$mimes)){
				 return redirect('upload_machines')->with('error','Please upload a valid csv file');
			}
			
			$filename=$_FILES["csv"]["tmp_name"];	
			$i=0;
			if($_FILES["csv"]["size"] > 0)
			 {
				 $file = fopen($filename, "r");
				 while (($getData = fgetcsv($file, 10000, ",")) !== FALSE){
					 //$data=array('serial_no'=>$getData[0],'name'=>$getData[1],'type'=>$getData[2],'type'=>$getData[2],'created_at'=>date('Y-m-d h:i:s'));
					 				 
					 if($i==0){
						 $i++;
						 continue;
					 }
					 
					 $Machine=Machine::where('serial_no',$getData[0])->where('type',$getData[1])->get()->count();
					
					if($Machine==0){
						$data=array('serial_no'=>$getData[0],'type'=>$getData[1],'created_at'=>date('Y-m-d h:i:s'));
						$machines = Machine::create($data);
					 }
				 }
				 fclose($file);	
			 }
			  return redirect('machines')->with('success','New Machines are successfully added');
	   endif;
       return view('admin.upload_machine')->with('user',$user);
	}	

}

