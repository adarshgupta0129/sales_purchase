<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

{


   function get_sales_details($id){
      $ci=& get_instance();
      $row =  $ci->db->where('m03_name',$id)->get('m03_sales_party')->row(); 
      return $row;
   }



   function get_purchase_details($id){
      $ci=& get_instance();
      $row =  $ci->db->where('m02_name',$id)->get('m02_purchase_party')->row(); 
      return $row;
   }

   function moneyFormatIndia($num){
      $explrestunits = "" ;
      if(strlen($num)>3){
         $lastthree = substr($num, strlen($num)-3, strlen($num));
         $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
         $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
         $expunit = str_split($restunits, 2);
         for($i=0; $i<sizeof($expunit); $i++){
            // creates each of the 2's group and adds a comma to the end
            if($i==0){
               $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            }else{
               $explrestunits .= $expunit[$i].",";
            }
         }
         $thecash = $explrestunits.$lastthree;
      } else {
         $thecash = $num;
      }
      return $thecash; // writes the final format where $currency is the currency symbol.
   }


   function getIndianCurrency(float $number)
   {
      if($number < 999999999999999999){
         $decimal = round($number - ($no = floor($number)), 2) * 100;
         $hundred = null;
         $digits_length = strlen($no);
         $i = 0;
         $str = array();
         $words = array(0 => '', 1 => 'one', 2 => 'two',
                        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
                        7 => 'seven', 8 => 'eight', 9 => 'nine',
                        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
                        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
                        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
                        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
                        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
                        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
         $digits = array('', 'hundred','thousand','lakh', 'crore','arab','kharab','neel','padma','shankh','gulshan');
         while( $i < $digits_length ) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
               $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
               $hundred = ($counter == 1 && $str[0]) ? 'and ' : null;
               $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str[] = null;
         }
         $Rupees = implode('', array_reverse($str));
         if($decimal < 20  && $decimal > 10 ){
            $paise = ($decimal) ? "and " . ($words[($decimal)]) . ' paise' : '';
         }else if($decimal % 10 != 0){
            $paise = ($decimal) ? "and " . ($words[($decimal) - ($decimal % 10)] . " " . $words[$decimal % 10]) . ' paise' : '';
         }
         else{
            $paise = ($decimal) ? "and " . ($words[($decimal) - ($decimal % 10)])  .' paise' : '';
         }
         return ($Rupees ? $Rupees . 'rupees ' : '') . $paise ;
      }
      else{
         return 'Too much amount!';
      }
   }



   function get_party_name($id=null,$type=null){
      $ci=& get_instance();
      if($type==1 )
      { $row = $ci->db->where('m03_id',$id)->get('m03_sales_party')->row()->m03_name; }
      if($type==2)
      { $row = $ci->db->where('m02_id',$id)->get('m02_purchase_party')->row()->m02_name; }
      return $row;
   }



   function get_mode_name($id=null){
      $ci=& get_instance();
      $row = $ci->db->where('m07_id',$id)->get('m07_mode_of_payment')->row()->m07_mode;  
      return $row;
   }



   function get_invoice_details($invoice_id){
      $ci=& get_instance();
      $invoice_details  = $ci->db->where('m06_invoice_no',$invoice_id)->get('m06_sales');  

      print_r($invoice_details->result());
   }


}