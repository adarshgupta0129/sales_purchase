<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

 include_once APPPATH.'/third_party/mpdf/mpdf.php';

class M_pdf {

    public $param;
    public $pdf;

    public function __construct($param = "'','A4',0,'',25,25,26,26,19, 19, 'L'")
    {
        $this->param =$param;
        $this->pdf = new mPDF('c', 'A3-L'); 
    }
}
