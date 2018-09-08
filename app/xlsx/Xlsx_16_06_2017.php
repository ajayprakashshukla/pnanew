<?php
// Devloped By : Ankitssss
// To export xlsx of reports     
namespace App\Xlsx;
use Excel;
class Xlsx {
      
public function __construct(){
    
}
      
static function exportXlsx($datas=array()){
      $data = array(
    array('data1', 'data2'),
    array('data1', 'data2'),
    array('data3', 'data4')
);

Excel::create('Filename', function($excel) use($data) {

    $excel->sheet('Sheetname', function($sheet) use($data) {

        $sheet->fromArray($data);

    });

})->export('xls');
}  
      
      
      
      
  }




?>