<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Export extends CI_Controller {

    // construct
    public function __construct() {
        parent::__construct();
        // load model

       $this->load->model('Export_model', 'export');

    }
    public function index(){
        $data['title'] = 'Display Feedback Data';
        $data['feedbackInfo'] = $this->export->employeeList();
        $this->load->view('users/feedbacklist',$data);
    
    }
    public function createXLS(){
        $this->load->library('excel');
        $object = new PHPExcel();
//as excel have many sheets ,setActiveSheetIndex will set the sheet=0
  $object->setActiveSheetIndex(0);

  $table_columns = array("Name", "Email", "Feedback");

  $column = 0;

  foreach($table_columns as $field)
  { //setCellValueByColumnAndRow(column,row,value) function takes three parameters
    //  viz column,row and the value to be filled in that particular cell
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $feedbackInfo = $this->export->employeeList();

  $excel_row = 2;


  foreach($feedbackInfo as $row)
  {
   

   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->name);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->email);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->feedback1);
   $excel_row++;
  }
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="feedback Data.xls"');
        $object_writer->save('php://output');

    }
}