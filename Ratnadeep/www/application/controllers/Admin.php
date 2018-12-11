<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

   public function __construct(){
      parent::__construct();
      $this->is_login();


   }


   public function is_login(){
      if($this->session->userdata('email')== ''){
         $this->logout();
      }
   } 



   public function logout(){

      $this->session->sess_destroy();
      redirect('login/index');
   }



   public function view($page_name, $data=null)
   {

      $data['admin_details'] = $this->db->where('id',1)->get('m01_login')->row();
      $row = $this->db->where('id',1)->get('m01_login')->row();
      $data['email'] = $row->email;
      $data['name'] = $row->name;

      $this->load->view('common/header',$data);
      $this->load->view('common/menu');
      $this->load->view('admin/'.$page_name);
      $this->load->view('common/footer');
   }

   public function index()
   {
      redirect('admin/dashboard');
   }

   public function dashboard()
   {
      $data = $this->Admin_model->dashboard();
      $data['rows'] = $this->db->select('*')->group_by('m06_invoice_no')->order_by('m06_id','desc')->get('m06_sales')->result();
      $data['page_title'] = "Admin Dashboard";
      $data['page_heading'] = "Dashboard";
      $data['page_heading2'] = "View Sales";

      $this->view('dashboard',$data);
   }
   //admin login page
   public function admin_detail()
   {
      $data['page_title'] = "Admin Details";
      $data['page_heading'] = "Update Admin Login Detail";
      $data['page_heading2'] = "Update Admin Invoice Detail";
      $data['page_heading3'] = "Update Terms and Conditions";
      $data['login'] = $this->db->where('id',1)->get('m01_login')->row();
      $this->view('admin_detail',$data);
   }

   //On submit of admin login form
   public function admin_detail_click()
   {
      $email = $this->input->post('username');
      $password = $this->input->post('password');
      $row = $this->db->set('email',$email)->set('password',$password)->where('id',1)->update('m01_login');
      $this->session->set_flashdata('alert','Credentials updated successfully');

      redirect('admin/admin_detail');
   }
   //On submit of invoice details form
   public function admin_invoice_detail_click()
   {
      $data=array('name'=>$this->input->post('name'),
                  'manufacturer'=>$this->input->post('manufacturer'),
                  'bank'=>$this->input->post('bank'),
                  'account'=>$this->input->post('account'),
                  'ifsc'=>$this->input->post('ifsc'),
                  'branch'=>$this->input->post('branch'),
                  'gstin'=>$this->input->post('gstin'),
                  'address'=>$this->input->post('address'));

      $this->db->set($data)->where('id',1)->update('m01_login');
      $this->session->set_flashdata('alert','Invoice details updated successfully');

      redirect('admin/admin_detail');
   }

   //On submit of Terms and conditions form
   public function admin_terms_and_conditions_click()
   {
      $tandc = $this->input->post('tandc');
      $disclaimer = $this->input->post('disclaimer');
      $row = $this->db->set('tandc',$tandc)->set('disclaimer',$disclaimer)->where('id',1)->update('m01_login');
      // echo $this->db->last_query();die;
      $this->session->set_flashdata('alert','Terms and conditions updated successfully');

      redirect('admin/admin_detail');
   }


   //***************************************************************************//
   //*************************** PURCHASE PARTY : START ************************//
   //***************************************************************************//

   public function add_purchase_party()
   {
      $data['page_title'] = "Purchase Party";
      $data['page_heading'] = "Add Purchase Party";
      $data['page_heading2'] = "View Purchase Party";
      $data['rows'] = $this->db->order_by('m02_id','desc')->get('m02_purchase_party')->result();
      $this->view('add_purchase_party',$data);
   }
   //On submit of Purchase Party
   public function add_purchase_party_click(){

      $data=array('m02_name'=>$this->input->post('name'),
                  'm02_email'=>$this->input->post('email'),
                  'm02_mobile'=>$this->input->post('mobile'),
                  'm02_phone'=>$this->input->post('phone'),
                  'm02_gstin'=>$this->input->post('gstin'),
                  'm02_cin'=>$this->input->post('cin'),
                  'm02_hsn'=>$this->input->post('hsn'),
                  'm02_pan'=>$this->input->post('pan'),
                  'm02_landmark1'=>$this->input->post('landmark1'),
                  'm02_landmark2'=>$this->input->post('landmark2'),
                  'm02_address'=>$this->input->post('address'),
                  'm02_country'=>$this->input->post('country'),
                  'm02_state'=>$this->input->post('state'),
                  'm02_city'=>$this->input->post('city'),
                  'm02_pincode'=>$this->input->post('pincode'),
                  'm02_date'=>date('Y-m-d'),
                  'm02_flag'=>0,
                  'm02_create_date'=> date('Y-m-d H:i:s'),
                  'm02_status'=>1);
      //print_r($data);die;
      $this->db->insert('m02_purchase_party',$data);
      $this->session->set_flashdata('alert',$this->input->post('name')."'s data has been added successfully!");
      redirect('admin/add_purchase_party');

   }



   public function update_purchase_party()
   {
      $data['page_title'] = "Purchase Party";
      $data['page_heading'] = "Update Purchase Party";
      $data['page_heading2'] = "View Purchase Party";
      $id= $this->uri->segment(3);
      $data['row'] = $this->db->where('m02_id',$id)->get('m02_purchase_party')->row();
      $this->view('update_purchase_party',$data);
   }

   //On submit of update purchase party form
   public function update_purchase_party_click()
   {

      $id= $this->uri->segment(3);

      // First take the data from the table with where condition
      $old_data_temp = $this->db->where('m02_id',$id)->get('m02_purchase_party')->row_array();

      // Increse the flag by one to know how many times it has been updated
      $flag = $old_data_temp['m02_flag'] + 1;

      $data=array('m02_name'=>$this->input->post('name'),
                  'm02_email'=>$this->input->post('email'),
                  'm02_mobile'=>$this->input->post('mobile'),
                  'm02_phone'=>$this->input->post('phone'),
                  'm02_gstin'=>$this->input->post('gstin'),
                  'm02_cin'=>$this->input->post('cin'),
                  'm02_hsn'=>$this->input->post('hsn'),
                  'm02_pan'=>$this->input->post('pan'),
                  'm02_landmark1'=>$this->input->post('landmark1'),
                  'm02_landmark2'=>$this->input->post('landmark2'),
                  'm02_address'=>$this->input->post('address'),
                  'm02_country'=>$this->input->post('country'),
                  'm02_state'=>$this->input->post('state'),
                  'm02_city'=>$this->input->post('city'),
                  'm02_pincode'=>$this->input->post('pincode'),
                  'm02_date'=>date('Y-m-d'),
                  'm02_status'=>1,
                  'm02_flag'=>$flag);

      $diff = array_diff($data,$old_data_temp);
      if(!empty($diff)){
         $diff['m02_date'] = date('Y-m-d');
         $diff['m02_flag'] = $flag;
         $diff['m02_action'] = 'update';
         $diff['m02_create_date'] = date('Y-m-d H:i:s');
         $diff['m02_party_id'] = $old_data_temp['m02_id'];
         $diff['m02_status'] = 1;

         $this->db->insert('m02_purchase_party_updated',$diff);
      }
      $this->db->set($data)->where('m02_id',$id)->update('m02_purchase_party');
      $this->session->set_flashdata('alert',$this->input->post('name')."'s data has been updated successfully!");
      redirect('admin/add_purchase_party');

   }



   public function delete_purchase_party(){

      $id=$this->uri->segment(3);

      $old_data_temp = $this->db->where('m02_id',$id)->get('m02_purchase_party')->row_array();
      $flag = $old_data_temp['m02_flag'] + 1;

      $old_data_temp['m02_date'] = date('Y-m-d');
      $old_data_temp['m02_flag'] = $flag;
      $old_data_temp['m02_party_id'] = $old_data_temp['m02_id'];
      unset($old_data_temp['m02_id']);
      $old_data_temp['m02_action'] = 'delete';
      $old_data_temp['m02_create_date'] = date('Y-m-d H:i:s');
      $old_data_temp['m02_status'] = 1;

      $this->db->insert('m02_purchase_party_updated',$old_data_temp);

      $this->db->where('m02_id', $id)->delete('m02_purchase_party'); 
      $this->session->set_flashdata('alert',"Data has been deleted successfully!");
      redirect('admin/add_purchase_party');
   }

   //***************************************************************************//
   //*************************** PURCHASE PARTY : END **************************//
   //***************************************************************************//



   //***************************************************************************//
   //*************************** SALES PARTY : START ***************************//
   //***************************************************************************//

   public function add_sales_party()
   {
      $data['page_title'] = "Sales Party";
      $data['page_heading'] = "Add Sales Party";
      $data['page_heading2'] = "View Sales Party";
      $data['rows'] = $this->db->order_by('m03_id','desc')->get('m03_sales_party')->result();
      $this->view('add_sales_party',$data);
   }
   //On submit of add sales party form
   public function add_sales_party_click(){

      $data=array('m03_name'=>$this->input->post('name'),
                  'm03_email'=>$this->input->post('email'),
                  'm03_mobile'=>$this->input->post('mobile'),
                  'm03_phone'=>$this->input->post('phone'),
                  'm03_gstin'=>$this->input->post('gstin'),
                  'm03_cin'=>$this->input->post('cin'),
                  'm03_hsn'=>$this->input->post('hsn'),
                  'm03_pan'=>$this->input->post('pan'),
                  'm03_landmark1'=>$this->input->post('landmark1'),
                  'm03_landmark2'=>$this->input->post('landmark2'),
                  'm03_address'=>$this->input->post('address'),
                  'm03_country'=>$this->input->post('country'),
                  'm03_state'=>$this->input->post('state'),
                  'm03_city'=>$this->input->post('city'),
                  'm03_pincode'=>$this->input->post('pincode'),
                  'm03_date'=>date('Y-m-d'),
                  'm03_create_date'=>date('Y-m-d H:i:s'),
                  'm03_status'=>1);

      $this->db->insert('m03_sales_party',$data);
      $this->session->set_flashdata('alert',$this->input->post('name')."'s data has been added successfully!");
      redirect('admin/add_sales_party');
   }



   public function update_sales_party()
   {
      $data['page_title'] = "Sales Party";
      $data['page_heading'] = "Update Sales Party";
      $data['page_heading2'] = "View Sales Party";
      $id= $this->uri->segment(3);
      $data['row'] = $this->db->where('m03_id',$id)->get('m03_sales_party')->row();
      //print_r($data['row']);die;
      $this->view('update_sales_party',$data);
   }

   //On submit of update sales party form
   public function update_sales_party_click()
   {

      $id= $this->uri->segment(3);

      // First take the data from the table with where condition
      $old_data_temp = $this->db->where('m03_id',$id)->get('m03_sales_party')->row_array();

      // Increse the flag by one to know how many times it has been updated
      $flag = $old_data_temp['m03_flag'] + 1;

      $data=array('m03_name'=>$this->input->post('name'),
                  'm03_email'=>$this->input->post('email'),
                  'm03_mobile'=>$this->input->post('mobile'),
                  'm03_phone'=>$this->input->post('phone'),
                  'm03_gstin'=>$this->input->post('gstin'),
                  'm03_cin'=>$this->input->post('cin'),
                  'm03_hsn'=>$this->input->post('hsn'),
                  'm03_pan'=>$this->input->post('pan'),
                  'm03_landmark1'=>$this->input->post('landmark1'),
                  'm03_landmark2'=>$this->input->post('landmark2'),
                  'm03_address'=>$this->input->post('address'),
                  'm03_country'=>$this->input->post('country'),
                  'm03_state'=>$this->input->post('state'),
                  'm03_city'=>$this->input->post('city'),
                  'm03_pincode'=>$this->input->post('pincode'),
                  'm03_date'=>date('Y-m-d'),
                  'm03_flag'=>$flag,
                  'm03_status'=>1);

      $diff = array_diff($data,$old_data_temp);
      if(!empty($diff)){
         $diff['m03_date'] = date('Y-m-d');
         $diff['m03_flag'] = $flag;
         $diff['m03_action'] = 'update';
         $diff['m03_party_id'] = $old_data_temp['m03_id'];
         $diff['m03_status'] = 1;
         $diff['m03_create_date'] = date('Y-m-d H:i:s');
         $this->db->insert('m03_sales_party_updated',$diff);
      }
      $this->db->set($data)->where('m03_id',$id)->update('m03_sales_party');
      $this->session->set_flashdata('alert',$this->input->post('name')."'s data has been updated successfully!");
      redirect('admin/add_sales_party');

   }


   public function delete_sales_party(){

      $id=$this->uri->segment(3);


      $old_data_temp = $this->db->where('m03_id',$id)->get('m03_sales_party')->row_array();
      $flag = $old_data_temp['m03_flag'] + 1;

      $old_data_temp['m03_date'] = date('Y-m-d');
      $old_data_temp['m03_flag'] = $flag;
      $old_data_temp['m03_party_id'] = $old_data_temp['m03_id'];
      unset($old_data_temp['m03_id']);
      $old_data_temp['m03_action'] = 'delete';
      $old_data_temp['m03_create_date'] = date('Y-m-d H:i:s');
      $old_data_temp['m03_status'] = 1;

      $this->db->insert('m03_sales_party_updated',$old_data_temp);

      $this->db->where('m03_id', $id)->delete('m03_sales_party'); 
      $this->session->set_flashdata('alert',"Data has been deleted successfully!");
      redirect('admin/add_sales_party');
   }

   //***************************************************************************//
   //*************************** SALES PARTY : END *****************************//
   //***************************************************************************//


   //***************************************************************************//
   //*************************** Mode Of Payment : START ***********************//
   //***************************************************************************//

   public function add_mode_of_payment_party()
   {
      $data['page_title'] = "Mode Of Payment";
      $data['page_heading'] = "Add Mode Of Payment";
      $data['page_heading2'] = "View Mode Of Payment";
      $data['rows'] = $this->db->order_by('m07_id','desc')->get('m07_mode_of_payment')->result();
      $this->view('mode_of_payment',$data);
   }

   public function add_mode_of_payment_party_click(){

      $data=array('m07_mode'=>$this->input->post('name'),
                  'm07_date'=>date('Y-m-d'),
                  'm07_status'=>1,
                  'm07_flag'=>0);

      $this->db->insert('m07_mode_of_payment',$data);
      $this->session->set_flashdata('alert',$this->input->post('name')."'s name has been added successfully!");
      redirect('admin/add_mode_of_payment_party');

   }



   public function update_mode_of_payment_party()
   {
      $data['page_title'] = "Mode Of Payment";
      $data['page_heading'] = "Update Mode Of Payment";
      $data['page_heading2'] = "View Mode Of Payment";
      $id= $this->uri->segment(3);
      $data['row'] = $this->db->where('m07_id',$id)->get('m07_mode_of_payment')->row();
      $this->view('update_mode_of_payment',$data);
   }

   //On submit of update payment mode form
   public function update_mode_of_payment_party_click()
   {

      $id= $this->uri->segment(3);

      // First take the data from the table with where condition
      $old_data_temp = $this->db->where('m07_id',$id)->get('m07_mode_of_payment')->row_array();

      // Increse the flag by one to know how many times it has been updated
      $flag = $old_data_temp['m07_flag'] + 1;

      $data=array('m07_mode'=>$this->input->post('name'),
                  'm07_date'=>date('Y-m-d'),
                  'm07_status'=>1,
                  'm07_flag'=>$flag);

      $diff = array_diff($data,$old_data_temp);
      if(!empty($diff)){
         $diff['m07_date'] = date('Y-m-d');
         $diff['m07_flag'] = $flag;
         $diff['m07_status'] = 1;
         $diff['m07_action'] = 'update'; 

         $this->db->insert('m07_mode_of_payment_updated',$diff);
      }
      $this->db->set($data)->where('m07_id',$id)->update('m07_mode_of_payment');
      $this->session->set_flashdata('alert',$this->input->post('name')."'s name has been updated successfully!");
      redirect('admin/add_mode_of_payment_party');

   }


   public function delete_mode_of_payment_party(){

      $id=$this->uri->segment(3);

      $old_data_temp = $this->db->where('m07_id',$id)->get('m07_mode_of_payment')->row_array();
      $flag = $old_data_temp['m07_flag'] + 1;

      $old_data_temp['m07_date'] = date('Y-m-d');
      $old_data_temp['m07_flag'] = $flag;
      unset($old_data_temp['m07_id']);
      $old_data_temp['m07_action'] = 'delete';
      $old_data_temp['m07_status'] = 1;

      $this->db->insert('m07_mode_of_payment_updated',$old_data_temp);


      $this->db->where('m07_id', $id)->delete('m07_mode_of_payment'); 
      $this->session->set_flashdata('alert',"Data has been deleted successfully!");
      redirect('admin/add_mode_of_payment_party');
   }

   //***************************************************************************//
   //*************************** Mode Of Payment : END *************************//
   //***************************************************************************//




   //***************************************************************************//
   //****************************** SALES : START ******************************//
   //***************************************************************************//


   public function sales()
   {
      $data['page_title'] = "Sales";
      $data['page_heading'] = "Add Sales";
      $data['page_heading2'] = "View Sales";  
      $last_id = $this->db->select_max('m06_invoice_no')->get('m06_sales')->row()->m06_invoice_no + 1 ;
      $data['invoice'] = "RDS".$last_id;   
      $data['rows'] = $this->db->select('*')->order_by('m06_id','desc')->group_by('m06_invoice_no')->get('m06_sales')->result();
      $data['sales_party'] = $this->db->get('m03_sales_party')->result();
      $data['transport_party'] = $this->db->get('m04_transport_party')->result();
      $data['tandc'] = $this->db->get('m01_login')->row();
      $this->view('sales',$data);
   }

   public function get_sales_party_detail(){

      $id = $this->input->post('name_id');
      $data = get_sales_details($id);
      //print_r($data);die;
      echo json_encode($data);
   }

   public function getIndianCurrency(){

      $rupees = $this->input->post('rupees');
      echo ucfirst(getIndianCurrency($rupees));
   }
   //On submit of sales form
   public function sales_click(){

      $originalDate = $this->input->post('date');
      $newDate = date_format(date_create_from_format('d/m/Y', $originalDate), 'Y-m-d');
      $times_id = ($this->db->select_max('m06_times')->where('m06_sales_party_name',$this->input->post('name'))->get('m06_sales')->row()->m06_times ) + 1 ;
      $count = $this->input->post('total_item');
      $transport_name = $this->db->where('m04_id',$this->input->post('transport'))->get('m04_transport_party')->row()->m04_name;
      for($i=0; $i<$count; $i++){

         $data=array('m06_sales_party_name'=>$this->input->post('name'),
                     'm06_date'=>$newDate,
                     'm06_transport'=>$transport_name,
                     'm06_transport_party_id'=>$this->input->post('transport'),
                     'm06_sales_party_id'=>$this->input->post('party_id'),
                     'm06_gstin'=>$this->input->post('gstin'),
                     'm06_quantity'=>$this->input->post('quantity')[$i],
                     'm06_lrno'=>$this->input->post('lrno'),
                     'm06_particulars'=>$this->input->post('particulars')[$i],
                     'm06_hsn'=>$this->input->post('hsn')[$i],
                     'm06_rate'=>$this->input->post('rate')[$i],
                     'm06_item_total'=>$this->input->post('amount')[$i],
                     'm06_total_amount'=>$this->input->post('t_amount'),
                     'm06_amount_in_words'=>$this->input->post('rupeesinwords'),
                     'm06_landmark'=>$this->input->post('landmark'),
                     'm06_address'=>$this->input->post('address'),
                     'm06_state'=>$this->input->post('state'),
                     'm06_city'=>$this->input->post('city'),
                     'm06_invoice_no'=>preg_replace('/[^0-9]/', '', $this->input->post('invoice_no')),
                     'm06_pincode'=>$this->input->post('pincode'),
                     'm06_extra_comments'=>$this->input->post('extra_comments'),
                     'm06_times'=>$times_id,
                     'm06_create_date'=>date('Y-m-d H:i:s'),
                     'm06_status'=>1);

         // print_r($data);die;
         $this->db->insert('m06_sales',$data);
      }

      $this->session->set_flashdata('alert',$this->input->post('name')."'s data has been added successfully!");
      redirect('admin/sales');

   }


   public function delete_sales(){
      $id=$this->uri->segment(3);
      $this->db->where('m06_invoice_no', $id)->delete('m06_sales'); 
      $this->session->set_flashdata('alert',"Data has been deleted successfully!");
      redirect('admin/sales');

   }




   public function update_sales()
   {
      $data['page_title'] = "Sales";
      $data['page_heading'] = "Update Sales";
      $data['party_flag'] = 0;
      $data['transport_flag'] = 0;
      $data['create_party_date'] = '';
      $data['create_transport_date'] = '';
      $id=$this->uri->segment(3);

      $data['row1'] = $this->db->where('m06_invoice_no',$id)->get('m06_sales')->row();
      $party_id = $data['row1']->m06_sales_party_id;
      $transport_party_id = $data['row1']->m06_transport_party_id;

      $party_flag = $this->db->where('m03_id',$party_id)->get('m03_sales_party');
      $party = $this->db->where('m03_party_id',$party_id)->order_by('m03_id','desc')->get('m03_sales_party_updated');

      if($party_flag->num_rows()>0)
      {
         $data['party_flag'] = $party_flag->row()->m03_flag;
         $party = $party->row_array();
         $data['create_party_date'] = $party['m03_create_date'];
      }
      else
      {
         $data['party_flag'] = -1;
         $party = $party->row_array();
         $data['create_party_date'] = $party['m03_create_date'];
         $this->session->set_flashdata('alert',"Party data has been deleted in the 'Add Sales Party' section. You can not change the party data!");
      }
      if($data['party_flag'] > 0 )
      {
         $this->session->set_flashdata('alert',"Party data has been modified in the 'Add Sales Party' section. You can not change the party data!");
      } 

      $data['row_data'] = $this->db->where('m06_invoice_no',$id)->get('m06_sales')->result();
      $data['sales_party'] = $this->db->get('m03_sales_party')->result();
      $data['transport_party'] = $this->db->get('m04_transport_party');


      $transport_flag = $this->db->where('m04_id',$transport_party_id)->get('m04_transport_party');
      $transport_party = $this->db->where('m04_transport_id',$transport_party_id)->order_by('m04_id','desc')->get('m04_transport_party_updated');
      //      echo "<pre>";
      //      print_r($transport_party->result());exit;
      if($transport_flag->num_rows()>0)
      {
         $data['transport_flag'] = $transport_flag->row()->m04_flag;
         $transport_party = $transport_party->row_array();
         $data['create_transport_date'] = $transport_party['m04_create_date']; 
      }
      else
      {
         $data['transport_flag'] = -1;
         $transport_party = $transport_party->row_array();
         $data['create_transport_date'] = $transport_party['m04_create_date'];
         $this->session->set_flashdata('alert2',"Transport has been deleted in the 'Add Transport Party' section. You can not change the Transport data!");
      }


      if($data['transport_flag']>0)
      {
         $this->session->set_flashdata('alert2',"Transport has been modified in the 'Add Transport Party' section. You can not change the Transport data!");
      } 

      $data['tandc'] = $this->db->get('m01_login')->row();

      $this->view('update_sales',$data);
   }



   //On submit of update sales form
   public function update_sales_click($invoice_id){

      //  print_r($_POST); die;
      $originalDate = $this->input->post('date');
      $newDate = date_format(date_create_from_format('d/m/Y', $originalDate), 'Y-m-d');

      $query = $this->db->where('m06_invoice_no',$invoice_id)->get('m06_sales');   

      $transport_name = $this->db->where('m04_id',$this->input->post('transport'))->get('m04_transport_party')->row()->m04_name;
      //echo $transport_name;die;
      $count_before = $query->num_rows();

      $count = $this->input->post('total_item');

      $item_id = $this->input->post('item_id');

      if(!empty($item_id)){
         $this->db->where_in('m06_id', $item_id)->delete('m06_sales');     
      }

      for($i=0;$i<$count;$i++ )
      {
         if(isset($this->input->post('quantity')[$i])){

            $data=array('m06_sales_party_name'=>$this->input->post('name'),
                        'm06_date'=>$newDate,
                        'm06_transport'=>$transport_name,
                        'm06_transport_party_id'=>$this->input->post('transport'),
                        'm06_sales_party_id'=>$this->input->post('party_id'),
                        'm06_gstin'=>$this->input->post('gstin'),
                        'm06_quantity'=>$this->input->post('quantity')[$i],
                        'm06_lrno'=>$this->input->post('lrno'),
                        'm06_particulars'=>$this->input->post('particulars')[$i],
                        'm06_hsn'=>$this->input->post('hsn')[$i],
                        'm06_rate'=>$this->input->post('rate')[$i],
                        'm06_item_total'=>$this->input->post('amount')[$i],
                        'm06_total_amount'=>$this->input->post('t_amount'),
                        'm06_amount_in_words'=>$this->input->post('rupeesinwords'),
                        'm06_landmark'=>$this->input->post('landmark'),
                        'm06_state'=>$this->input->post('state'),
                        'm06_address'=>$this->input->post('address'),
                        'm06_city'=>$this->input->post('city'),
                        'm06_invoice_no'=>preg_replace('/[^0-9]/', '', $this->input->post('invoice_no')),
                        'm06_pincode'=>$this->input->post('pincode'),
                        'm06_extra_comments'=>$this->input->post('extra_comments'),
                        'm06_status'=>1);
            // print_r($data);die;
            $this->db->insert('m06_sales',$data);
         }

      }

      $this->session->set_flashdata('alert',$this->input->post('name')."'s Data has been updated successfully!");
      redirect('admin/sales');
   }

   public function print_sales_invoice($invoice_id,$id){
      $data['page_title'] = "Invoice";
      $data['page_heading'] = "Print Invoice";
      $data['row'] = $this->db->where('m06_id',$id)->get('m06_sales')->row();
      $data['rows'] = $this->db->where('m06_invoice_no',$invoice_id)->get('m06_sales')->result();
      $data['tandc'] = $this->db->get('m01_login')->row();
      $this->load->view('admin/sales_invoice',$data);

   }



   //***************************************************************************//
   //******************************* SALES : END *******************************//
   //***************************************************************************//


   //***************************************************************************//
   //****************************** PURCHASE : START ***************************//
   //***************************************************************************//





   public function purchase()
   {
      $data['page_title'] = "Purchase";
      $data['page_heading'] = "Add Purchase";
      $data['page_heading2'] = "View Purchase";  
      $last_id = $this->db->select_max('m05_invoice_no')->get('m05_purchase')->row()->m05_invoice_no + 1;
      $data['invoice'] = "RDP".$last_id;   
      $data['rows'] = $this->db->select('*')->group_by('m05_invoice_no')->order_by('m05_id','desc')->get('m05_purchase')->result();
      $data['purchase_party'] = $this->db->get('m02_purchase_party')->result();
      $data['transport_party'] = $this->db->get('m04_transport_party')->result();
      $data['tandc'] = $this->db->get('m01_login')->row();
      $this->view('purchase',$data);
   }

   public function get_purchase_party_detail(){

      $id = $this->input->post('name_id');
      $data = get_purchase_details($id);
      echo json_encode($data);
   }
   //On submit of purchase form
   public function purchase_click(){

      // $name = $this->db->where('m02_id',$this->input->post('name'))->get('m02_purchase_party')->row()->m02_name;
      $originalDate = $this->input->post('date');
      $newDate = date_format(date_create_from_format('d/m/Y', $originalDate), 'Y-m-d');
      $times_id = ($this->db->select_max('m05_times')->where('m05_purchase_party_name',$this->input->post('name'))->get('m05_purchase')->row()->m05_times ) + 1 ;
      $count = $this->input->post('total_item');
      $transport_name = $this->db->where('m04_id',$this->input->post('transport'))->get('m04_transport_party')->row()->m04_name;



      for($i=0; $i<$count; $i++){

         $data=array('m05_purchase_party_name'=>$this->input->post('name'),
                     'm05_date'=>$newDate,
                     'm05_purchase_party_id'=>$this->input->post('party_id'),
                     'm05_transport'=>$transport_name,
                     'm05_transport_party_id'=>$this->input->post('transport'),
                     'm05_gstin'=>$this->input->post('gstin'),
                     'm05_quantity'=>$this->input->post('quantity')[$i],
                     'm05_lrno'=>$this->input->post('lrno'),
                     'm05_particulars'=>$this->input->post('particulars')[$i],
                     'm05_hsn'=>$this->input->post('hsn')[$i],
                     'm05_rate'=>$this->input->post('rate')[$i],
                     'm05_gst'=>$this->input->post('gst')[$i],
                     'm05_cgst'=>$this->input->post('cgst')[$i],
                     'm05_sgst'=>$this->input->post('sgst')[$i],
                     'm05_igst'=>$this->input->post('igst')[$i],
                     'm05_igst_value'=>$this->input->post('igst_value')[$i],
                     'm05_item_total'=>$this->input->post('amount')[$i],
                     'm05_total_amount'=>$this->input->post('t_amount'),
                     'm05_amount_in_words'=>$this->input->post('rupeesinwords'),
                     'm05_landmark'=>$this->input->post('landmark'),
                     'm05_address'=>$this->input->post('address'),
                     'm05_state'=>$this->input->post('state'),
                     'm05_city'=>$this->input->post('city'),
                     'm05_invoice_no'=>preg_replace('/[^0-9]/', '', $this->input->post('invoice_no')),
                     'm05_pincode'=>$this->input->post('pincode'),
                     'm05_extra_comments'=>$this->input->post('extra_comments'),
                     'm05_times'=>$times_id,
                     'm05_create_date'=>date('Y-m-d H:i:s'),
                     'm05_status'=>1);
         //print_r($data);die;
         $this->db->insert('m05_purchase',$data);
      }

      $this->session->set_flashdata('alert',$this->input->post('name')."'s data has been added successfully!");
      redirect('admin/purchase');

   }


   public function delete_purchase(){
      $id=$this->uri->segment(3);
      $this->db->where('m05_invoice_no', $id)->delete('m05_purchase'); 
      $this->session->set_flashdata('alert',"Data has been deleted successfully!");
      redirect('admin/purchase');

   }




   public function update_purchase()
   {
      $data['page_title'] = "Purchase";
      $data['page_heading'] = "Update Purchase";
      $data['transport_flag'] = 0;
      $data['create_party_date'] = '';
      $data['create_transport_date'] = '';
      $id=$this->uri->segment(3);

      $data['row1'] = $this->db->where('m05_invoice_no',$id)->get('m05_purchase')->row();
      $party_id = $data['row1']->m05_purchase_party_id;
      $transport_party_id = $data['row1']->m05_transport_party_id;
      $party_flag = $this->db->where('m02_id',$party_id)->get('m02_purchase_party');
      $party = $this->db->where('m02_party_id',$party_id)->order_by('m02_id','desc')->get('m02_purchase_party_updated');

      if($party_flag->num_rows()>0)
      {
         $data['party_flag'] = $party_flag->row()->m02_flag;
         $party = $party->row_array();
         $data['create_party_date'] = $party['m02_create_date'];
      }
      else
      {
         $data['party_flag'] = -1;
         $party = $party->row_array();
         $data['create_party_date'] = $party['m02_create_date'];
         $this->session->set_flashdata('alert',"Party data has been deleted in the 'Add Sales Party' section. You can not change the party data!");
      }
      if($data['party_flag'] > 0 )
      {
         $this->session->set_flashdata('alert',"Party data has been modified in the 'Add Sales Party' section. You can not change the party data!");
      } 

      $data['row_data'] = $this->db->where('m05_invoice_no',$id)->get('m05_purchase')->result();
      $data['purchase_party'] = $this->db->get('m02_purchase_party')->result();
      $data['transport_party'] = $this->db->get('m04_transport_party');


      $transport_flag = $this->db->where('m04_id',$transport_party_id)->get('m04_transport_party');
      $transport_party = $this->db->where('m04_transport_id',$transport_party_id)->order_by('m04_id','desc')->get('m04_transport_party_updated');
      //print_r($transport_party->result());die;
      if($transport_flag->num_rows())
      {
         $data['transport_flag'] = $transport_flag->row()->m04_flag;
         $transport_party = $transport_party->row_array();
         $data['create_transport_date'] = $transport_party['m04_create_date'];
      }
      else
      {
         $data['transport_flag'] = -1;
         $transport_party = $transport_party->row_array();
         $data['create_transport_date'] = $transport_party['m04_create_date'];
         $this->session->set_flashdata('alert2',"Transport has been deleted in the 'Add Transport Party' section. You can not change the Transport data!");
      }
      if($data['transport_flag']>0)
      {
         $this->session->set_flashdata('alert2',"Transport has been modified in the 'Add Transport Party' section. You can not change the Transport data!");
      } 

      $data['tandc'] = $this->db->get('m01_login')->row();
      $this->view('update_purchase',$data);



   }
   //On submit of update purchase form
   public function update_purchase_click($invoice_id){


      $originalDate = $this->input->post('date');
      $newDate = date_format(date_create_from_format('d/m/Y', $originalDate), 'Y-m-d');
      $transport_name = $this->db->where('m04_id',$this->input->post('transport'))->get('m04_transport_party')->row()->m04_name;
      $query = $this->db->where('m05_invoice_no',$invoice_id)->get('m05_purchase');   

      $count_before = $query->num_rows();
      $count = $this->input->post('total_item');
      $item_id = $this->input->post('item_id');


      if(!empty($item_id)){
         $this->db->where_in('m05_id', $item_id)->delete('m05_purchase');     
      }


      for($i=0; $i<$count; $i++){
         if(isset($this->input->post('quantity')[$i])){

            $data=array('m05_purchase_party_name'=>$this->input->post('name'),
                        'm05_date'=>$newDate,
                        'm05_transport'=>$transport_name,
                        'm05_transport_party_id'=>$this->input->post('transport'),
                        'm05_purchase_party_id'=>$this->input->post('party_id'),
                        'm05_gstin'=>$this->input->post('gstin'),
                        'm05_quantity'=>$this->input->post('quantity')[$i],
                        'm05_lrno'=>$this->input->post('lrno'),
                        'm05_particulars'=>$this->input->post('particulars')[$i],
                        'm05_hsn'=>$this->input->post('hsn')[$i],
                        'm05_rate'=>$this->input->post('rate')[$i],
                        'm05_gst'=>$this->input->post('gst')[$i],
                        'm05_cgst'=>$this->input->post('cgst')[$i],
                        'm05_sgst'=>$this->input->post('sgst')[$i],
                        'm05_igst'=>$this->input->post('igst')[$i],
                        'm05_igst_value'=>$this->input->post('igst_value')[$i],
                        'm05_item_total'=>$this->input->post('amount')[$i],
                        'm05_total_amount'=>$this->input->post('t_amount'),
                        'm05_amount_in_words'=>$this->input->post('rupeesinwords'),
                        'm05_landmark'=>$this->input->post('landmark'),
                        'm05_address'=>$this->input->post('address'),
                        'm05_state'=>$this->input->post('state'),
                        'm05_city'=>$this->input->post('city'),
                        'm05_invoice_no'=>preg_replace('/[^0-9]/', '', $this->input->post('invoice_no')),
                        'm05_pincode'=>$this->input->post('pincode'),
                        'm05_extra_comments'=>$this->input->post('extra_comments'),
                        'm05_status'=>1);
            // print_r($data);die;
            $this->db->insert('m05_purchase',$data);

         }

      }


      $this->session->set_flashdata('alert',$this->input->post('name')."'s Data has been updated successfully!");
      redirect('admin/purchase');
   }

   public function print_purchase_invoice($invoice_id,$id){
      $data['page_title'] = "Invoice";
      $data['page_heading'] = "Print Invoice";
      $data['row'] = $this->db->where('m05_id',$id)->get('m05_purchase')->row();
      $data['rows'] = $this->db->where('m05_invoice_no',$invoice_id)->get('m05_purchase')->result();
      $data['tandc'] = $this->db->get('m01_login')->row();
      $this->load->view('admin/purchase_invoice',$data);

   }

   //***************************************************************************//
   //******************************* PURCHASE : END ****************************//
   //***************************************************************************//


   //***************************************************************************//
   //*************************** DOWNLOAD DATABASE : START *********************//
   //***************************************************************************//


   public function download_db(){

      $path =APPPATH."database/database.db";
      $name = 'database.db';
      $this->Admin_model->download($path,$name);

   }


   //***************************************************************************//
   //******************************* DOWNLOAD DATABASE : END *******************//
   //***************************************************************************//





   //***************************************************************************//
   //*************************** TRANSPORT PARTY : START ***********************//
   //***************************************************************************//

   public function add_transport_party()
   {
      $data['page_title'] = "Transport Party";
      $data['page_heading'] = "Add Transport Party";
      $data['page_heading2'] = "View Transport Party";
      $data['rows'] = $this->db->order_by('m04_id','desc')->get('m04_transport_party')->result();
      $this->view('add_transport_party',$data);
   }

   public function add_transport_party_click(){

      $data=array('m04_name'=>$this->input->post('name'),
                  'm04_date'=>date('Y-m-d'),
                  'm04_status'=>1,
                  'm04_flag'=>0);

      $this->db->insert('m04_transport_party',$data);
      $this->session->set_flashdata('alert',$this->input->post('name')."'s name has been added successfully!");
      redirect('admin/add_transport_party');

   }



   public function update_transport_party()
   {
      $data['page_title'] = "Transport Party";
      $data['page_heading'] = "Update Transport Party";
      $data['page_heading2'] = "View Transport Party";
      $id= $this->uri->segment(3);
      $data['row'] = $this->db->where('m04_id',$id)->get('m04_transport_party')->row();
      $this->view('update_transport_party',$data);
   }

   //On submit of update transport party form
   public function update_transport_party_click()
   {
      $id= $this->uri->segment(3);
      // First take the data from the table with where condition
      $old_data_temp = $this->db->where('m04_id',$id)->get('m04_transport_party')->row_array();

      // Increse the flag by one to know how many times it has been updated
      $flag = $old_data_temp['m04_flag'] + 1;

      $data=array('m04_name'=>$this->input->post('name'),
                  'm04_date'=>date('Y-m-d'),
                  'm04_status'=>1,
                  'm04_flag'=>$flag);

      $diff = array_diff($data,$old_data_temp);
      if(!empty($diff)){
         $diff['m04_date'] = date('Y-m-d');
         $diff['m04_flag'] = $flag;
         $diff['m04_status'] = 1;
         $diff['m04_transport_id'] = $old_data_temp['m04_id'];
         unset($old_data_temp['m04_id']);
         $diff['m04_create_date'] = date('Y-m-d H:i:s');
         $diff['m04_action'] = 'update'; 
         $this->db->insert('m04_transport_party_updated',$diff);
      }


      $this->db->set($data)->where('m04_id',$id)->update('m04_transport_party');
      $this->session->set_flashdata('alert',$this->input->post('name')."'s name has been updated successfully!");
      redirect('admin/add_transport_party');

   }


   public function delete_transport_party(){

      $id=$this->uri->segment(3);



      $old_data_temp = $this->db->where('m04_id',$id)->get('m04_transport_party')->row_array();
      $flag = $old_data_temp['m04_flag'] + 1;

      $old_data_temp['m04_date'] = date('Y-m-d');
      $old_data_temp['m04_flag'] = $flag;
      $old_data_temp['m04_transport_id'] = $old_data_temp['m04_id'];
      unset($old_data_temp['m04_id']);
      $old_data_temp['m04_action'] = 'delete';
      $old_data_temp['m04_create_date'] = date('Y-m-d H:i:s');
      $old_data_temp['m04_status'] = 1;

      $this->db->insert('m04_transport_party_updated',$old_data_temp);

      $this->db->where('m04_id', $id)->delete('m04_transport_party'); 
      $this->session->set_flashdata('alert',"Data has been deleted successfully!");
      redirect('admin/add_transport_party');
   }

   //***************************************************************************//
   //*************************** TRANSPORT PARTY : END *************************//
   //***************************************************************************//






   //***************************************************************************//
   //*************************** CREDIT/DEBIT ENTRY : START ********************//
   //***************************************************************************//

   public function credit_debit_entry()
   {
      $data['page_title'] = "Credit Debit";
      $data['page_heading'] = "Add Credit/Debit Entry";
      $data['page_heading2'] = "View Credit/Debit Entry";
      $data['rows1'] = $this->db->order_by('m08_id','desc')->get('m08_credit_debit')->result();
      $data['mode'] = $this->db->get('m07_mode_of_payment')->result();
      $this->view('credit_debit_entry',$data);
   }

   //On change of credit/debit select
   public function party_select_picker(){
      $credit_debit = $this->input->get('credit_debit');
      $data['type'] = $credit_debit;
      if($credit_debit==1){
         $data['sales_party'] = $this->db->select('distinct(m03_name)')->get('m03_sales_party')->result();
         $this->load->view('admin/party_select_picker',$data);
      }

      if($credit_debit==2){
         $data['sales_party'] = $this->db->select('distinct(m02_name)')->get('m02_purchase_party')->result();
         $this->load->view('admin/party_select_picker',$data);
      }
   }

   public function credit_debit_entry_click(){
      $originalDate = $this->input->post('date');
      $newDate = date_format(date_create_from_format('d/m/Y', $originalDate), 'Y-m-d');

      if($this->input->post('credit_debit') == 1){
         $credit=$this->input->post('amount');
         $debit=0;
      }

      if($this->input->post('credit_debit') == 2){
         $debit=$this->input->post('amount');
         $credit=0;
      }
      $data=array('m08_credit_debit'=>$this->input->post('credit_debit'),
                  'm08_date'=>$newDate,
                  'm08_party_name'=>$this->input->post('party_name'),
                  'm08_credit_amount'=>$credit,
                  'm08_debit_amount'=>$debit,
                  'm08_mode_of_payment'=>$this->input->post('mode_of_payment'),
                  'm08_comments'=>$this->input->post('comment'),
                  'm08_amount'=> 0,
                  'm08_status'=>1);

      $this->db->insert('m08_credit_debit',$data);
      $this->session->set_flashdata('alert',$this->input->post('party_name')."'s data has been added successfully!");
      redirect('admin/credit_debit_entry');
   }

   public function delete_credit_debit_entry(){
      $id=$this->uri->segment(3);
      $this->db->where('m08_id', $id)->delete('m08_credit_debit'); 
      $this->session->set_flashdata('alert',"Data has been deleted successfully!");
      redirect('admin/credit_debit_entry');

   }

   public function update_credit_debit_entry($id){
      $data['page_title'] = "Credit Debit";
      $data['page_heading'] = "Update Credit/Debit Entry";

      $data['sales_party1'] = $this->db->select('distinct(m03_name)')->get('m03_sales_party')->result();

      $data['sales_party2'] = $this->db->select('distinct(m02_name)')->get('m02_purchase_party')->result(); 

      $data['rows1'] = $this->db->where('m08_id',$id)->get('m08_credit_debit')->row();
      $data['mode'] = $this->db->get('m07_mode_of_payment')->result();

      $this->session->set_flashdata('alert',"You can not change the party data and mode of payment!");

      $this->view('update_credit_debit_entry',$data);

   }

   //On submit of update credit/debit form
   public function update_credit_debit_entry_click($id){ 
      $originalDate = $this->input->post('date');
      $newDate = date_format(date_create_from_format('d/m/Y', $originalDate), 'Y-m-d');

      if($this->input->post('credit_debit') == 1){
         $credit=$this->input->post('amount');
         $debit=0;
      }

      if($this->input->post('credit_debit') == 2){
         $debit=$this->input->post('amount');
         $credit=0;
      }
      $data=array('m08_credit_debit'=>$this->input->post('credit_debit'),
                  'm08_date'=>$newDate,
                  'm08_party_name'=>$this->input->post('party_name'),
                  'm08_credit_amount'=>$credit,
                  'm08_debit_amount'=>$debit,
                  'm08_mode_of_payment'=>$this->input->post('mode_of_payment'),
                  'm08_comments'=>$this->input->post('comment'),
                  'm08_amount'=> 0,
                  'm08_status'=>1);

      $this->db->set($data)->where('m08_id',$id)->update('m08_credit_debit');
      $this->session->set_flashdata('alert',$this->input->post('party_name').' s data updated successfully');
      redirect('admin/credit_debit_entry');

   }



   //***************************************************************************//
   //*************************** CREDIT/DEBIT ENTRY : END **********************//
   //***************************************************************************//



   //***************************************************************************//
   //*************************** LEDGER : START ********************//
   //***************************************************************************//



   public function ledger()
   {
      $data['page_title'] = "Ledger";
      $data['page_heading'] = "Ledger Table";
      $data['party_name'] = '0';
      $data['credit_debit'] = '0';
      $data['date'] = '';
      $data['invoice_id'] = $this->db->order_by("m06_invoice_no", "desc")->get('m06_sales')->result();
      $data['invoice_id1'] = $this->db->order_by("m05_invoice_no", "desc")->get('m05_purchase')->result(); 
      $data['invoice_id2'] = $this->db->order_by("m08_date", "desc")->get('m08_credit_debit')->result(); 
      $this->view('ledger',$data);
   }

   //On change of credit/debit select in ledger filter
   public function party_select_picker_ledger(){
      $credit_debit = $this->input->get('credit_debit');
      $data['type'] = $credit_debit;
      if($credit_debit==1){
         $data['sales_party'] = $this->db->select('distinct(m03_name)')->get('m03_sales_party')->result();
         $this->load->view('admin/party_select_picker_ledger',$data);
      }

      if($credit_debit==2){
         $data['sales_party'] = $this->db->select('distinct(m02_name)')->get('m02_purchase_party')->result();
         $this->load->view('admin/party_select_picker_ledger',$data);
      }

      if($credit_debit==0){
         $this->load->view('admin/party_select_picker_ledger',$data);
      }
   }

   //On submit of ledger filter form
   public function ledger_click()
   {
      $data['page_title'] = "Ledger";
      $data['page_heading'] = "Ledger Table";

      $data['sales_party1'] = $this->db->select('distinct(m03_name)')->get('m03_sales_party')->result();

      $data['sales_party2'] = $this->db->select('distinct(m02_name)')->get('m02_purchase_party')->result(); 
      $data['party_name'] = $this->input->post('party_name');
      $data['credit_debit'] = $this->input->post('credit_debit');  
      $data['date'] = '' ;

      $party_name = ''; 
      if($this->input->post('daterange'))
      {            
         $range = explode(' / ', $this->input->post('daterange'));
         $data['range'] = $range; 
         //echo 'sdfsd'.$range[0].'sdfsd'; die;
      }

      if($this->input->post('credit_debit') || $this->input->post('party_name') || $this->input->post('daterange'))
      {
         if($this->input->post('credit_debit'))
         {
            $this->db->select('*');
            $this->db->where("m08_credit_debit",$this->input->post('credit_debit'));
            // $credit_debit = $this->input->post('credit_debit');
         }
         if($this->input->post('party_name') != '0' )
         {
            $this->db->where("m08_party_name", $this->input->post('party_name'));
         }

         if($this->input->post('daterange'))
         {
            $this->db->where('m08_date>=',$range[0])->where('m08_date<=',$range[1]);
         }
         $data['invoice_id2'] =   $this->db->get('m08_credit_debit')->result(); 

         // echo $this->db->last_query().'<hr>';die;


         if($this->input->post('credit_debit') == 1 || $this->input->post('credit_debit')==0)
         { 
            $this->db->select('*');

            if($this->input->post('party_name') != '0')
            {
               $this->db->where("m06_sales_party_name", $this->input->post('party_name'));
            }

            if($this->input->post('daterange'))
            {
               $this->db->where('m06_date >= ',$range[0])->where('m06_date <= ',$range[1]);
            }
            $data['invoice_id'] =   $this->db->get('m06_sales')->result(); 
         }

         //   echo $this->db->last_query().'<hr>';

         if($this->input->post('credit_debit') == 2 || $this->input->post('credit_debit')==0)
         { 
            $this->db->select('*');

            if( $this->input->post('party_name') != '0' )
            {          
               $this->db->where("m05_purchase_party_name", $this->input->post('party_name'));
            }

            if($this->input->post('daterange'))
            {
               $this->db->where('m05_date >= ',$range[0])->where('m05_date <= ',$range[1]);
            }
            $data['invoice_id1'] =  $this->db->get('m05_purchase')->result(); 
         }

         //  echo $this->db->last_query().'<hr>';
      } 

      if($this->input->post('credit_debit') == 0 && $this->input->post('party_name') == 0 && $this->input->post('daterange') == '')
      {
         $data['invoice_id'] = $this->db->order_by("m06_invoice_no", "desc")->get('m06_sales')->result();
         //   echo $this->db->last_query().'<hr>';
         $data['invoice_id1'] = $this->db->order_by("m05_invoice_no", "desc")->get('m05_purchase')->result();
         //  echo $this->db->last_query().'<hr>';
         $data['invoice_id2'] = $this->db->order_by("m08_date", "desc")->get('m08_credit_debit')->result(); 
      }
      //echo $this->db->last_query();die;
      if($this->input->post('daterange'))
      {
         $data['date'] = $this->input->post('daterange');
      }


      $this->view('ledger',$data);
   }



   //On click of ledger download 
   public function ledger_download()
   {

      $data_tbl = $_POST['tbl_data'];

      //generate the PDF from the given html
      $myhtml = '<table><style>table, th, td {border: 1px solid black;border-collapse: collapse; padding:8px;text-align:center}table th {color:white}</style>
         <tr style="background-color:#213138">
            <th>Sr.No.</th>
            <th>Invoice No.</th> 
            <th>Party Name</th>
            <th>Type</th>
            <th>Date</th> 
            <th>Total Amount</th> 
            <th>Mode</th> 
            <th>Particulars</th>
            <th>Quantity</th> 
            <th>Rate</th> 
            <th>GST(%)</th> 
            <th>CGST (INR)</th> 
            <th>SGST (INR)</th> 
            <th>IGST(%)</th> 
            <th>IGST (INR)</th> 
            <th>Item Total (INR)</th> 
            <th>Transport</th>
            <th>Comment</th>
         </tr>';
      $myhtml .= strip_tags($data_tbl,'<tr> <td> <tbody>');
      $myhtml .='</table>';

      if($_POST['file_type'] == 'excel'){

         $this->ledger_excel($myhtml);
      } 

      if($_POST['file_type'] == 'pdf'){
         $this->ledger_pdf($myhtml);

      }


   }

   //for PDF download of ledger
   public function ledger_pdf($data){
      $pdfFilePath = "Ledger.pdf";

      //load mPDF library
      $this->load->library('m_pdf');
      $this->m_pdf->pdf->SetTitle('Ledger');
      $this->m_pdf->pdf->WriteHTML($data);

      //download it.
      $this->m_pdf->pdf->Output($pdfFilePath, "I"); 
      exit;
   }

   //for Excel download of ledger
   public function ledger_excel($data){
      $filename = "Ledger.xls";
      $this->load->library('Excel');
      // save $table inside temporary file that will be deleted later
      $tmpfile = tempnam(sys_get_temp_dir(), 'html');
      file_put_contents($tmpfile, $data);

      // insert $table into $objPHPExcel's Active Sheet through $excelHTMLReader
      $objPHPExcel     = new PHPExcel();
      $excelHTMLReader = PHPExcel_IOFactory::createReader('HTML');
      $excelHTMLReader->loadIntoExisting($tmpfile, $objPHPExcel);

      $objPHPExcel->getActiveSheet()
         ->getStyle('A1:P1')
         ->applyFromArray(
         array(
            'fill' => array(
               'type' => PHPExcel_Style_Fill::FILL_SOLID,
               'color' => array('rgb' => '3787E3')
            ),

            'font'  => array(
               'bold'  => true,
               'color' => array('rgb' => 'FFFFFF'),
               'size'  => 12,
            )
         )
      );

      $objPHPExcel->getActiveSheet()->setTitle('Ledger'); // Change sheet's title if you want

      $style = array(
         'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
         )
      );

      $objPHPExcel->getDefaultStyle()->applyFromArray($style);

      foreach(range('A','Z') as $columnID) {
         $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
            ->setAutoSize(true);
      }

      unlink($tmpfile); // delete temporary file because it isn't needed anymore

      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); // header for .xlxs file
      header('Content-Disposition: attachment;filename='.$filename); // specify the download file name
      header('Cache-Control: max-age=0');

      // Creates a writer to output the $objPHPExcel's content
      $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
      $writer->save('php://output');

      exit;

   }



   //***************************************************************************//
   //*************************** LEDGER : END **********************//
   //***************************************************************************//


}
