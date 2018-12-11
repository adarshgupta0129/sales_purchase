<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

   public function index(){

      $this->load->view('login/login');

   }


   public function login_click(){

      $email = $this->input->post('username');
      $password = $this->input->post('password');

      $row = $this->db->get_where('m01_login',array('email' => $email, 'password' => $password));


      if($row->num_rows()>0){

         $this->session->set_userdata(array('email'=>$email));

         redirect('admin/dashboard');

      }
      else{

         $this->session->set_flashdata('credentials', 'Wrong email or password. Please try again.');
         redirect('login/index');

      }

   }



   public function forgot_password_click(){

      $email = $this->input->post('email'); 
      $query=$this->db->where('id',1)->get('m01_login')->row();
      $username = $query->email;
      $password = $query->password;
      $this->sendMail($email,$username,$password);
      $this->session->set_flashdata('credentials', 'Check your email for credentials.');
      redirect('login/index');
   }

/* In case user forget password and also, there is no other option to retrive details. */
   public function admin_all_details_developer(){
      print_r($this->db->get('m01_login')->row());die;
   }








   function sendMail($email,$username,$password)
   {
      $this->load->library('PhpMailerLib');
      $mail = $this->phpmailerlib->load();
      try {
         //Server settings
         //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
         $mail->isSMTP();                                      // Set mailer to use SMTP
         $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
         $mail->SMTPAuth = true;                               // Enable SMTP authentication
         $mail->Username = 'jcasp@gmail.com';                 // SMTP username
         $mail->Password = '';                           // SMTP password
         $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
         $mail->Port = 587;                                    // TCP port to connect to

         //Recipients
         $mail->setFrom('jcasp@gmail.com', 'Adarsh');
         $mail->addAddress($email, 'Ratnadeep');     // Add a recipient
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
         $body = $body."<h4>username: $username <br></h4>";
         $body = $body."<h4>password: $password </h4>";
         $mail->Body    = $body;
         // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

         $mail->send();
      } catch (Exception $e) {
         echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }
      return;
   }




}
