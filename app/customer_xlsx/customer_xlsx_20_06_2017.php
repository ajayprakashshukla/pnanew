<?php
	namespace App\customer_xlsx;
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
	require_once public_path().'/PHPExcel/Classes/PHPExcel.php';
		
	class customer_xlsx {
		  
		public function __construct(){
			
		}
			  
		static function exportXlsx($datas=array()){
			$i=2;
			$j=1;
			$sorting=session('sorting');
			$objPHPExcel=new \PHPExcel();
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

			$Transaction =  DB::table('transactions')
								->where('customer_id' ,'!=','')
								->leftJoin('transactions_types','transactions_types.id', '=', 'transactions.transactions_types')
								->select('transactions.*','transactions_types.name as transactions_types')
								->orderBy($sorting['orderby'],$sorting['order']);
  
	        $Transaction=$Transaction->get();	
			 
			 foreach($Transaction as $key=>$val){
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $j++);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $val->dates);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $val->transactions_types);
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $val->serial_no);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i++, strip_tags($val->notes_explanation));
			 }
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="customer_query_'.date('Y-m-d').'.xls"');
			header('Cache-Control: max-age=0');
			$writer = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			// Write file to the browser
			$writer->save('php://output');
		}
	}

?>