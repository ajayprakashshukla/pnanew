<?php
	// Devloped By : Ankitssss
	// To export xlsx of reports     
	namespace App\partfailure_xlsx;
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
	
	
	class partfailure_xlsx {
      
		public function __construct(){
		
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
									
			$objPHPExcel->getActiveSheet()->getStyle("A1:G1")->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle("G2:I2")->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('A1', 'S.No#');
			$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Part');
			$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Description');
			$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Serial No');
			$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Date');
			$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Qty');		

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
			
			foreach ($Used_part as $Used_partData):	
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $j++);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $Used_partData->part_name);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $Used_partData->sku);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $Used_partData->serial_no);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, date('Y-m-d',strtotime($Used_partData->created_at)));
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i++, $Used_partData->qry);
			endforeach;
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="part_failure_'.date('Y-m-d').'.xls"');
			header('Cache-Control: max-age=0');
			$writer = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			// Write file to the browser
			$writer->save('php://output');
		} 
	}
?>