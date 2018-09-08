<?php
	// Devloped By : Ankitssss
	// To export xlsx of reports     
	namespace App\Xlsx;	
	
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
	
	
	class Xlsx {
      
		public function __construct(){
		
		}
		
		static function getTranctionDetailPopup($transactions_types,$TransactionId){    
			return $transactions_types;
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
			$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

			$objPHPExcel->getActiveSheet()->getStyle("A1:G1")->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ID');
			$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Date');
			$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Serial No');
			$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Transcation Type');
			$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Customer(with address)');
			$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Location(PNA)');
			$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Notes');
			
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

			if(count($Transaction)==0){
				$objPHPExcel->getActiveSheet()->mergeCells('A2:E2');
				//$objPHPExcel->getStyle("A2")->applyFromArray($style);
				$objPHPExcel->getActiveSheet()->getCell('A2')->setValue('No data available in table');
			}	

			else{
				foreach($Transaction as $key=>$val){
					$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $j++);
					$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $val->dates);
					$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $val->serial_no);
					$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, Xlsx::getTranctionDetailPopup($val->transactions_types,$val->id));
					$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $val->customers_name);
					$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $val->location);
					$objPHPExcel->getActiveSheet()->setCellValue('G'.$i++, strip_tags($val->notes_explanation));
				}
			}
			
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="machine_query_'.date('Y-m-d').'.xls"');
			header('Cache-Control: max-age=0');
			$writer = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			// Write file to the browser
			$writer->save('php://output');
		} 
	}
?>