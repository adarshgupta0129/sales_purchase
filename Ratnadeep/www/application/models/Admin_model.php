<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {


   public function dashboard(){

      $m06_invoice_no = $this->db->select('m06_id')->group_by('m06_invoice_no')->get('m06_sales')->result();
      $invoice_no = array();
      $invoice_no[] = 0;
      foreach($m06_invoice_no as $row){
         $invoice_no[] = $row->m06_id;
      }
      $sales = $this->db->select_sum('m06_total_amount')->where_in('m06_id', $invoice_no)->from('m06_sales')->get()->row()->m06_total_amount;

      $m05_invoice_no = $this->db->select('m05_id')->group_by('m05_invoice_no')->get('m05_purchase')->result();
      $invoice_no = array();
      $invoice_no[] = 0;
      foreach($m05_invoice_no as $row){
         $invoice_no[] = $row->m05_id;
      }
      $purchase = $this->db->select_sum('m05_total_amount')->where_in('m05_id', $invoice_no)->from('m05_purchase')->get()->row()->m05_total_amount;

      //setlocale(LC_MONETARY, 'en_IN');
      $data['total_sales'] = $sales;
     
      $data['total_purchase'] = $purchase;
      
      
      
      
      /*
      $data['total_sales'] = money_format('%!i', $sales);
      $data['total_purchase'] = money_format('%!i', $purchase);*/


      return $data;

   }


   public function download($path=null, $name=null)
   {

      if(is_file($path))
      {

         // required for IE
         if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off'); }

         // get the file mime type using the file extension
         $this->load->helper('file');

         $mime = get_mime_by_extension($path);

         // Build the headers to push out the file properly.
         header('Pragma: public');     // required
         header('Expires: 0');         // no cache
         header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
         header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($path)).' GMT');
         header('Cache-Control: private',false);
         header('Content-Type: '.$mime);  // Add the mime type from Code igniter.
         header('Content-Disposition: attachment; filename="'.basename($name).'"');  // Add the file name
         header('Content-Transfer-Encoding: binary');
         header('Content-Length: '.filesize($path)); // provide file size
         header('Connection: close');
         readfile($path); // push it out
         exit();
      }
   }




   function sendMail()
   {
      $mail = $this->phpmailerlib->load();
      try {
         //Server settings
         //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
         $mail->isSMTP();                                      // Set mailer to use SMTP
         $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
         $mail->SMTPAuth = true;                               // Enable SMTP authentication
         $mail->Username = 'adarsh@jcasptechnologies.com';                 // SMTP username
         $mail->Password = '';                           // SMTP password
         $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
         $mail->Port = 587;                                    // TCP port to connect to

         //Recipients
         $mail->setFrom('adarsh@jcasptechnologies.com', 'Mehul');
         $mail->addAddress('adarsh@jcasptechnologies.com', 'Joe User');     // Add a recipient
         /* $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');*/

         //Attachments
         /*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/

         //Content
         $mail->isHTML(true);                                  // Set email format to HTML
         $mail->Subject = 'Admin username and password';
         $body = "<h1>Forgot your password? Don't worry, here are the credentials:<br></h1>";
         $body = $body."<h4>username: admin <br></h4>";
         $body = $body."<h4>password: admin </h4>";
         $mail->Body    = $body;
         // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

         $mail->send();
         echo 'Message has been sent';
      } catch (Exception $e) {
         echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }

   }



}




