<?php
	// Devloped By : Ankitssss
	// To export xlsx of reports     
	namespace App\partquery_xlsx;
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
	
	
	class partquery_xlsx {
      
		public function __construct(){
		
		}
		
		static function getPartNameById($product_id){
			$Product=    Product::where('product_id',$product_id)->first();
			return  $Product['name'];
		}
		
		static function transactionTypeById($id){
			 $transactions_type=    transactions_type::where('id',$id)->first();
			 return  $transactions_type['name'];
		}
		
		static function exportXlsx($datas=array()){
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
			$i=3;
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
			$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
						
			$objPHPExcel->getActiveSheet()->getStyle("A1:G1")->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle("G2:I2")->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('A1', 'S.No#');
			$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Date');
			$objPHPExcel->getActiveSheet()->setCellValue('C1', 'serial');
			$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Transcation');
			$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Customer');
			$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Location(PNA)');
			$objPHPExcel->getActiveSheet()->mergeCells('G1:I1');
			$objPHPExcel->getActiveSheet()->getCell('G1')->setValue('Parts used in repair');
			$objPHPExcel->getActiveSheet()->getCell('G2')->setValue('Part #');
			$objPHPExcel->getActiveSheet()->getCell('H2')->setValue('Qty');
			$objPHPExcel->getActiveSheet()->getCell('I2')->setValue('Failure');
						
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
			
			foreach ($Transaction as $TransactionData):
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $j++);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $TransactionData->dates);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $TransactionData->serial_no);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, partquery_xlsx::transactionTypeById($TransactionData->transactions_types));
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $TransactionData->customer_id);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $TransactionData->location);
				
				$Used_parts= DB::table('used_parts')->where('transaction_id',$TransactionData->id)->get();
				foreach ($Used_parts as $Used_part):
					$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, partquery_xlsx::getPartNameById($Used_part->parts));
					$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $Used_part->qry);
					$objPHPExcel->getActiveSheet()->setCellValue('I'.$i++, $Used_part->failure);
				endforeach;
			endforeach;
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="part_query_'.date('Y-m-d').'.xls"');
			header('Cache-Control: max-age=0');
			$writer = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			// Write file to the browser
			$writer->save('php://output');
		} 
	}
?>