<?php
	// Devloped By : Ankitssss
	// To export xlsx of reports     
	namespace App\transcationtype_xlsx;
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
	
	
	class transcationtype_xlsx {
      
		public function __construct(){
		
		}
		
		static function transactionTypeById($id){
			$transactions_type=    transactions_type::where('id',$id)->first();
			return  $transactions_type['name'];
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
						
			$objPHPExcel->getActiveSheet()->getStyle("A1:G1")->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('A1', 'S.No#');
			$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Date');
			$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Transcation Type');
			$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Serial No#');
			$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Notes');
			
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
			
			if(count($Transaction)==0){
				$objPHPExcel->getActiveSheet()->mergeCells('A2:E2');
				$objPHPExcel->getActiveSheet()->getCell('A2')->setValue('No data available in table');
			}
			else{
				foreach($Transaction as $key=>$val){
					$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $j++);
					$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $val->dates);
					$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, transcationtype_xlsx::transactionTypeById($val->transactions_types));
					$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $val->serial_no);
					$objPHPExcel->getActiveSheet()->setCellValue('E'.$i++, strip_tags($val->notes_explanation));
				}
			}
	
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="transcation_type_query_'.date('Y-m-d').'.xls"');
			header('Cache-Control: max-age=0');
			$writer = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			// Write file to the browser
			$writer->save('php://output');
		} 
	}
?>