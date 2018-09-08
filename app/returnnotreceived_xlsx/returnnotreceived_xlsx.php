<?php
	// Devloped By : Ankitssss
	// To export xlsx of reports     
	namespace App\returnnotreceived_xlsx;
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
	
	
	class returnnotreceived_xlsx {
      
		public function __construct(){
		
		}
		
		 static function getLocationNameById($id=NULL){
			  $location=    Location::where('id',$id)->first();
			  return  $location['name'];
		 }
		
		static function return_not_received_machins(){

			$Transaction = DB::table('transactions')->groupBy('serial_no')->get();

			  $allMachines=array();
			  foreach ($Transaction as $key => $value) {
				$allMachines[]=$value->serial_no;
			  }
			  $not_received=array();
			  foreach ($allMachines as $value) {
				 
				 $idddd=$value;
				  $defective_r = DB::table('transactions')->where('transactions_types','4')->where('serial_no',$value)->orderBy('id','desc')->limit(1)->get();
				  $customer_r = DB::table('transactions')->where('transactions_types','5')->where('serial_no',$value)->orderBy('id','desc')->limit(1)->get();
				  $reciept = DB::table('transactions')->where('transactions_types','6')->where('serial_no',$value)->orderBy('id','desc')->limit(1)->get();

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
		
		static function exportXlsx($datas=array()){
			$i=2;
			$j=1;
			$condition=session('conditions');
			$sorting=session('sorting');
			
			error_reporting(E_ALL);
			ini_set('display_errors', TRUE);
			ini_set('display_startup_errors', TRUE);
			date_default_timezone_set('Europe/London');
			define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
			/** Include PHPExcel */
			require_once public_path().'/PHPExcel/Classes/PHPExcel.php';
			// Create new PHPExcel object
			$i=2;
			$j=1;
			
			$style = array(
				'alignment' => array(
					'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);
			
			$objPHPExcel = new \PHPExcel();
			$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
						
			$objPHPExcel->getActiveSheet()->getStyle("A1:G1")->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('A1', 'S.No#');
			$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Date');
			$objPHPExcel->getActiveSheet()->setCellValue('C1', 'serial #');
			$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Transcation Type');
			$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Customer Name');
			$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Return Location(PNA)');
			
			$not_received=returnnotreceived_xlsx::return_not_received_machins();
			
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

			if(count($Transaction)==0){
				$objPHPExcel->getActiveSheet()->mergeCells('A2:E2');
				$objPHPExcel->getActiveSheet()->getCell('A2')->setValue('No data available in table');
			}
			else{
				foreach($Transaction as $key=>$val){
					if($val->transactions_types==4)
						$transcation_type='Defective Return';
					else
						$transcation_type='Customer Return';
					
					$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $j++);
					$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $val->dates);
					$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $val->serial_no);
					$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $transcation_type);
					$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $val->customers_name);
					$objPHPExcel->getActiveSheet()->setCellValue('F'.$i++, returnnotreceived_xlsx::getLocationNameById($val->return_location));
				}
			}	
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Return_not_received_'.date('Y-m-d').'.xls"');
			header('Cache-Control: max-age=0');
			$writer = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			// Write file to the browser
			$writer->save('php://output');
		} 
	}
?>