<script>
   function sequence_order(){
      var k = 1
      $('#if_no_row').find('tr').find('th:first').children('span').each(function(){
         $(this).html(k);
         k = k+1;
      });
   }
   function cal_final_total(count)
   {

      var t_amount = 0;
      for(j=1; j<=count; j++)
      {
         var quantity = 0;
         var rate = 0;
         var amount = 0;
         var amount1 = 0;
         quantity = $('#quantity'+j).val();
         if(quantity > 0)
         {
            rate = $('#rate'+j).val();
            if(rate > 0)
            { 
               amount = parseFloat(quantity) * parseFloat(rate);
               $('#amount'+j).val(amount.toFixed(2));
               t_amount = parseFloat(t_amount.toFixed(2)) +  parseFloat(amount.toFixed(2));
            }
         }
      }

      $('#t_amount').val(t_amount.toFixed(2));
      amount_in_words(t_amount);
   }


   function DOM_call_functions_quantity(element,count){
      data_required_quantity(element);
      cal_final_total(count);
   }

   function DOM_call_functions_number(element,count){
      data_required_number(element);
      cal_final_total(count);
   }  

   function DOM_call_functions_required(element,count){
      data_required(element); 
   }  

   function remove_tr(element,count){


      var row_id = $(element).attr("id");

      var amount = $('#amount'+row_id).val(); 

      var t_amount = $('#t_amount').val();
      var t_amount = (parseFloat(t_amount) - parseFloat(amount)).toFixed(2);  

      $('#t_amount').val(t_amount);


      $('#row_id_'+row_id).remove();

      var one_delete = $('#total_item').val();
      one_delete = one_delete-1;
      var one_delete = $('#total_item').val(one_delete);
      sequence_order();
      amount_in_words( $('#t_amount').val());


   }

</script>
<div class="m-content">
   <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6 ">
         <?php if($this->session->flashdata('alert')) { ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>Great!</strong> <?=$this->session->flashdata('alert')?>					  	
         </div>
         <?php } ?>
      </div>

      <div class="col-lg-12">
         <!--begin::Portlet-->
         <div class="m-portlet">
            <div class="m-portlet__head">
               <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                     <span class="m-portlet__head-icon m--hide">
                        <i class="la la-gear"></i>
                     </span>
                     <h3 class="m-portlet__head-text">
                        <?=$page_heading?>
                     </h3>
                  </div>
               </div>
               <span class=" pull-right" style="margin-top: 24px; display:block;color:#606267;" >(<span style="color:red">*</span>) Denotes Required Field</span>
            </div> 

            <style>
               div.dataTables_wrapper div.dataTables_length select {
                  padding: 5px 20px;
               }
               .form-control, .form-control[readonly] { 
                  padding: 10px 1px;
               }
            </style>

            <!--begin::Form-->

            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="<?=base_url()?>index.php/admin/sales_click" method="post" data-valid>



               <style>
                  .custom-table.table thead th{vertical-align:top;border-bottom:2px solid #f4f5f8}h1{font:700 100% sans-serif;letter-spacing:3px;text-align:center;text-decoration:underline;text-transform:uppercase}.custom-table table{font-size:75%;table-layout:fixed;width:100%;border-collapse:collapse;border:1px solid #000}.header h1,td,th{border-radius:.25em}.add,.cut,td,th{border-width:1px}.add,.cut,td{border-color:#000}td,th{padding:.5em;position:relative;text-align:left;border-style:solid;font-weight:400}.header{margin:0 auto;max-width:810px;}.header:after{clear:both;content:"";display:table}.header h1{color:#000;margin:0 0 1em;padding:.5em 0}.header address{float:left;font-size:75%;font-style:normal;line-height:1.25;margin:0 1em 1em 0}.header address p{margin:0 0 .25em}.header span,header img{display:block;float:right}.header span{margin:0 0 1em 1em;max-height:25%;max-width:60%;position:relative}.cut,.header input{opacity:0;position:absolute;top:0}.header img{max-height:100%;max-width:100%}.header input{cursor:pointer;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";height:100%;left:0;width:100%}.add,.cut{display:block;font-size:.8rem;padding:.25em .5em;float:left;text-align:center;width:.6em;background:#9AF;box-shadow:0 1px 2px rgba(0,0,0,.2);background-image:-moz-linear-gradient(#00ADEE 5%,#0078A5 100%);background-image:-webkit-linear-gradient(#00ADEE 5%,#0078A5 100%);border-radius:.5em;color:#FFF;cursor:pointer;font-weight:700;text-shadow:0 -1px 2px rgba(0,0,0,.333)}.add{margin:-2.5em 0 0}.cut{left:-1.5em;-webkit-transition:opacity .1s ease-in}@page{margin:0}#invoice_id{padding:30px;text-align:center!important}.heading{width:100%}.ratnadeep-head h1{background:unset;color:#da251c;letter-spacing:5px;font-family:Onstage;font-size:30px;margin-bottom:4px;line-height:11px;padding-top:28px}.ratnadeep-head h4{font-size:15px;font-size:17px;margin-top:6px}.ratnadeep-head .img1{height:20px;width:95px;margin-left:10px}.ratnadeep-head .img2{height:18px;width:86px}.custom-table table.balance,.custom-table table.meta{float:right;width:100%}.float-left{float:left}.brand{width:54%}.first-col{width:10%}.second-col{width:auto}.third-col{width:10%}.img-content{margin-bottom:10px;margin-right:-15px}.custom-table .table-bordered>thead>tr>th{border:1px solid #000!important;border-top:1px solid #000!important;border-bottom:1px solid #000!important;border-left:1px solid #000!important;border-right:1px solid #000!important}ul{list-style:none}form{width:100%;max-width:100%;margin:0 auto}.col-md-8{text-align:-webkit-center}.custom-table table th{padding:8px 2px;vertical-align:top}#address,#city_pincode,#gstin,#landmark,#state{font-size:16px}@media print{body *{visibility:hidden}#invoice_id,#invoice_id *{visibility:visible}#invoice_id{position:absolute;left:0;top:0}}input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{-webkit-appearance:none;-moz-appearance:none;appearance:none;margin:0}

               </style>

               <div id=invoice_id>

                  <header class="header">
                     <h1>Invoice</h1>
                     <address  class="heading">
                        <div class="row">
                           <div class="col-md-2 float-left">
                              <img src="<?=base_url()?>assets/invoice/logo.png" height="120px" width="140px">
                           </div>
                           <div class="col-md-8 ratnadeep-head">
                              <ul style="list-style:none">
                                 <li><img  class="img-content" src="<?=base_url()?>assets/invoice/logo-content.png" height="50px" width="500px"> </li>
                                 <li><h4>MANUFACTURERS : <?=$admin_details->manufacturer?></h4></li>
                                 <li><h4 class="brand">BRAND : <img  class="img1" src="<?=base_url()?>assets/invoice/khazana.png" height="20px" width="110px"><img class="img2" src="<?=base_url()?>assets/invoice/shaifali.png" height="20px" width="110px"> </h4>
                                 </li>
                                 <li><h4>GSTIN : <?=$admin_details->gstin?> </h4></li>
                              </ul>
                           </div>
                        </div>
                     </address>

                  </header>
                  <div class="row">

                     <div class="col-md-12">
                        <h6> <?=$admin_details->address?></h6>
                     </div>

                  </div>
                  <article class="custom-table">
                     <table class="table table-bordered" id="invoice_form">
                        <thead>
                           <tr>
                              <th colspan="10">
                                 Name:<span style="color:red">*</span>
                                 <select class="form-control m-bootstrap-select m_selectpicker" name="name"  id="name" data-name="party name" data-required-select>
                                    <option disabled selected value="">Select Name</option>
                                    <?php foreach($sales_party as $row) { ?>
                                    <option value="<?=$row->m03_name?>"><?=$row->m03_name?></option>
                                    <?php } ?>

                                 </select>
                                 <span class="m-form__help"></span>

                              </th>
                              <th colspan="10">
                                 Invoice No.:<span style="color:red">*</span> 
                                 <input type="text" name="invoice_no" id="invoice_no" value="<?=$invoice?>" class="form-control m-input" data-required>
                                 <span class="m-form__help"></span>
                              </th>
                           </tr>
                        </thead>
                        <thead>
                           <tr>
                              <th colspan="10">
                                 Add.: 
                                 <input type="text" id="address" name="address" class="form-control m-input" readonly> 
                              </th>
                              <th colspan="10">
                                 Select Date:<span style="color:red">*</span> 
                                 <input type="text" name="date" class="form-control" id="m_datepicker_1"  data-date-format="dd/mm/yyyy" value="<?php echo date('d/m/Y') ?>" readonly placeholder="Select date" data-required />
                                 <span class="m-form__help"></span>
                              </th>
                           </tr>
                        </thead>
                        <thead>
                           <tr>
                              <th colspan="10"><input type="text" id="landmark"  class="form-control m-input" readonly></th>
                              <th colspan="10">L. R. No. <input type="text" name="lrno" class="form-control m-input"  >
                                 <span class="m-form__help"></span></th>
                           </tr>
                        </thead> 
                        <input type="hidden" name="state" id="state" class="form-control m-input" readonly>
                        <input type="hidden" name="landmark" id="landmark_hidden" class="form-control m-input" readonly>
                        <input type="hidden" name="party_id" id="party_id" class="form-control m-input" readonly>
                        <thead>
                           <tr><input type="hidden" name="city" id="city" class="form-control m-input" readonly>
                              <input type="hidden" name="pincode" id="pincode" class="form-control m-input" readonly>
                              <th colspan="10"> 
                                 <input  type="text" id="city_pincode" name="city_pincode" class="form-control m-input" readonly></th>
                              <th colspan="10">Transport:<span style="color:red">*</span> 
                                 <select class="form-control m-bootstrap-select m_selectpicker"  name="transport" id="transport" data-name="transport" data-required-select>
                                    <option disabled selected value="">Select Transport</option>
                                    <?php foreach($transport_party as $row) { ?>
                                    <option value="<?=$row->m04_id?>"><?=$row->m04_name?></option>
                                    <?php } ?>
                                 </select>
                                 <span></span>
                              </th>
                           </tr>
                        </thead>
                        <thead>
                           <tr>
                              <th colspan="10" >
                                 GSTIN: 
                                 <input type="text" id="gstin" name="gstin" class="form-control m-input" readonly >
                              </th>
                              <th colspan="10"></th>
                           </tr>
                        </thead>
                        <thead>
                           <tr>
                              <th colspan="1">Sr. No.</th>
                              <th colspan="9"><b><center>PARTICULARS<span style="color:red">*</span></center></b></th>
                              <th colspan="2">HSN Code</th>
                              <th colspan="2">Quantity<span style="color:red">*</span></th>
                              <th colspan="2">Rate<span style="color:red">*</span></th>
                              <th colspan="4" >Amount (INR) </th>
                           </tr>
                        </thead>
                        <thead id="if_no_row">
                           <tr>
                              <th colspan="1"></th>
                              <th colspan="9"><center>KUM KUM BINDI</center></th>
                              <th colspan="2"><center>3384</center></th>
                              <th colspan="2"></th>
                              <th colspan="2"></th>
                              <th colspan="4"></th>     
                           </tr>
                           <tr id="row_id_1" style="height:50px" >
                              <th style="vertical-align:top;font-size: 15px;padding: 16px 0px 0px 15px;" id="sr_no">
                                 <span>1</span>
                              </th>
                              <th colspan="9" style="vertical-align:top">
                                 <input type="text" name="particulars[]" id="particulars1" class="form-control m-input particulars" placeholder="Particulars" data-required>
                                 <span class="m-form__help"></span>
                              </th>
                              <th colspan="2" style="vertical-align:top">
                                 <input type="text" name="hsn[]" id="hsn1" class="form-control m-input hsn" disabled>
                                 <span class="m-form__help"></span>
                              </th>
                              <th colspan="2" style="vertical-align:top">
                                 <input  type="text" autocomplete="off" name="quantity[]" id="quantity1" class="form-control m-input quantity"  placeholder="0" data-required-quantity>
                                 <span class="m-form__help"></span>
                              </th>
                              <th colspan="2" style="vertical-align:top">
                                 <input  type="text"  autocomplete="off" name="rate[]" id="rate1" class="form-control m-input rate" placeholder="0" data-required-number>
                                 <span class="m-form__help"></span>
                              </th>
                              <th colspan="3" style="vertical-align:top">
                                 <input  type="text" autocomplete="off"  name="amount[] " id="amount1" class="form-control m-input amount" placeholder="0" readonly> 
                                 <span class="m-form__help"></span>
                              </th>
                              <th colspan="1"></th>
                           </tr>

                        </thead>
                        <thead>
                           <tr>
                              <th colspan="1" style="height: 150px;"></th>
                              <th colspan="9"></th>
                              <th colspan="2" rowspan="2"></th>
                              <th colspan="2" rowspan="2"></th>
                              <th colspan="2" rowspan="2"></th>
                              <th colspan="4" rowspan="2"> 
                                 <div align="right">
                                    <button type="button" name="add_row" id="add_row" class="btn btn-success btn-xs" title="Add Row">+</button>
                                 </div>
                              </th>     
                           </tr>


                           <tr>
                              <th colspan="10">
                                 <h4 style="font-size: 20px;"><b>GST EXEMPTED</b></h4>
                                 <p>Rated under GST ACT VIDE</p>
                                 <p>Entry under chapter 33(33049940 Dt. 01-07-2017)</p>
                              </th> 

                           </tr>
                           <tr>
                              <th colspan="14">Price in words: <textarea class="form-control m-input m-input--air" name="rupeesinwords"  id="rupeesinwords" rows="1" placeholder="Amount in rupees" readonly></textarea></th>
                              <th colspan="2">Total Payable<br> Amount  <br> (INR) </th> <input type="hidden" name="total_item" id="total_item" value="1" />
                              <th colspan="4"><input type="text"  name="t_amount" id="t_amount" autocomplete="off" class="form-control m-input" placeholder="0" readonly></th>
                           </tr> 
                           <tr>
                              <th colspan="10" ><?=$tandc->disclaimer?></th>
                              <th colspan="10" rowspan="2" style="vertical-align:top;position:relative"><img  class="img-content" src="<?=base_url()?>assets/invoice/extra-comments.png" style="height: 10px;width: 150px;left: 125px;position: absolute;"><br>
                                 <textarea class="form-control m-input m-input--air" name="extra_comments" rows="3"  placeholder="Extra Comments"></textarea></th>
                           </tr>

                           <tr>
                              <th colspan="6"><b>Terms and conditions: </b> <br><?=$tandc->tandc?></th>
                              <th colspan="4"><b>Bank Details:</b><br> <?=$tandc->bank?><br>A/c No.:<?=$tandc->account?><br>IFSC: <?=$tandc->ifsc?><br>Branch: <?=$tandc->branch?>
                              </th>
                           </tr>
                        </thead>
                     </table>
                  </article>

               </div>

               <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                  <div class="m-form__actions m-form__actions--solid">
                     <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-7">
                           <button type="submit" class="btn btn-brand"  disabled="disabled">Submit</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>

            <!--end::Form-->
         </div>


         <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
               <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                     <h3 class="m-portlet__head-text">
                        <?=$page_heading2?>
                     </h3>
                  </div>
               </div>
            </div>
            <div class="m-portlet__body">
               <!--begin: Datatable -->
               <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                  <thead>
                     <tr>
                        <th>Sr No.</th>
                        <th>Action</th>
                        <th>Invoice No.</th>
                        <th>Name</th> 
                        <th>GSTIN</th> 
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Address</th>
                        <th>Landmark</th>
                        <th>State</th>
                        <th>City</th>
                        <th>PIN Code</th>
                        <th>L. R. No.</th>
                        <th>Amount in Words</th>
                        <th>Extra Comments</th>
                     </tr>
                  </thead>

                  <tbody>
                     <?php $i=1; foreach($rows as $row){ ?>
                     <tr>
                        <td><?php echo $i++;?></td>
                        <td class="delete_data" nowrap>
                           <span class="dropdown" title="Print">
                              <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
                                 <i class="la la-ellipsis-h"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 26px, 0px);">
                                 <a class="dropdown-item"  target="_blank" href="<?=base_url()?>index.php/admin/print_sales_invoice/<?=$row->m06_invoice_no?>/<?=$row->m06_id?>/1"><i class="la la-print"></i> Original Copy</a>
                                 <a class="dropdown-item"  target="_blank" href="<?=base_url()?>index.php/admin/print_sales_invoice/<?=$row->m06_invoice_no?>/<?=$row->m06_id?>/4"><i class="la la-print"></i> Record Copy</a>
                                 <a class="dropdown-item"  target="_blank" href="<?=base_url()?>index.php/admin/print_sales_invoice/<?=$row->m06_invoice_no?>/<?=$row->m06_id?>/2"><i class="la la-print"></i> Duplicate Copy</a>
                                 <a class="dropdown-item"  target="_blank" href="<?=base_url()?>index.php/admin/print_sales_invoice/<?=$row->m06_invoice_no?>/<?=$row->m06_id?>/3"><i class="la la-print"></i> Transport Copy</a>

                              </div>
                           </span> 
                           <a class=" m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" target="_blank" href="<?=base_url()?>index.php/admin/print_sales_invoice/<?=$row->m06_invoice_no?>/<?=$row->m06_id?>/0" title="View">
                              <i class="la la-eye"></i>
                           </a>
                           <a href="<?=base_url()?>index.php/admin/update_sales/<?=$row->m06_invoice_no?>" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                              <i class="la la-edit"></i>
                           </a><a id="delete_data" href="<?=base_url()?>index.php/admin/delete_sales/<?=$row->m06_invoice_no?>"class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                           <i class="la la-trash"></i>
                           </a>
                        </td>
                        <td>RDS<?=$row->m06_invoice_no?></td>
                        <td><?=$row->m06_sales_party_name?></td>
                        <td><?=$row->m06_gstin?></td> 
                        <td><?=$row->m06_total_amount?></td>
                        <td><?php echo date_format(date_create_from_format('Y-m-d', $row->m06_date), 'd/m/Y');   ?></td>
                        <td><?=$row->m06_address?></td>
                        <td><?=$row->m06_landmark?></td>
                        <td><?=$row->m06_state?></td>
                        <td><?=$row->m06_city?></td>
                        <td><?=$row->m06_pincode?></td>
                        <td><?=$row->m06_lrno?></td>
                        <td nowrap><?=$row->m06_amount_in_words?></td>
                        <td><?=$row->m06_extra_comments?></td>
                     </tr>
                     <?php } ?>

                  </tbody>


               </table>
            </div>


         </div>
         <!-- END EXAMPLE TABLE PORTLET-->	




      </div>
   </div>
</div>
<!--end::Portlet-->




<script>

   function amount_in_words(t_amount){      
      $.ajax({
         type: "POST",
         url: "<?=base_url()?>index.php/admin/getIndianCurrency",
         data: {'rupees':t_amount},
         success: function(data)
         {
            $("#rupeesinwords").val(data);
         }
      });
   }

</script>


<script>

   $(document).ready(function(){
      $('#name').on('change', function() {
         var name = $('#name').val();
         // alert(select_value);

         $.ajax({
            type: "POST",
            url: "<?=base_url()?>index.php/admin/get_sales_party_detail",
            data: {'name_id':name},
            success: function(data)
            {
               var object = $.parseJSON(data);

               $("#gstin").attr('value',object.m03_gstin);
               $("#address").attr('value',object.m03_address);
               $("#party_id").attr('value',object.m03_id);
               $("#state").attr('value',object.m03_state);
               if(object.m03_landmark1!='' || object.m03_landmark2!=''){
                  $("#landmark_hidden").attr('value',object.m03_landmark1+' '+object.m03_landmark2);
               }

               $("#landmark").attr('value',object.m03_landmark1+', '+object.m03_landmark2+' '+object.m03_state);
               $("#state").attr('value',object.m03_state);
               $("#city").attr('value',object.m03_city);
               $("#pincode").attr('value',object.m03_pincode);
               $("#city_pincode").attr('value',object.m03_city + " - " + object.m03_pincode);
            }
         });



      });
   });


   $(document).ready(function(){

      var final_total_amt = $('#t_amount').val();

      var count = 1;

      $(document).on('click', '#add_row', function(){

         count++;

         var last = $(".table-bordered > thead:nth-last-child(2)").find('tr:nth-last-child(1)').attr('id');
         var total = $('#total_item').val();
         $('#total_item').val(parseInt(total)+1);

         var total_rows = parseInt($(".table-bordered > #if_no_row").find('tr').length) ;


         var html_code = '';


         html_code += '<tr id="row_id_'+count+'">';
         html_code += '<th  colspan="1"><span id="sr_no" style="font-size: 15px;padding: 16px 0px 0px 15px;">'+total_rows+'</span></th>';

         html_code += '<th colspan="9" style="vertical-align:top"> <input type="text" name="particulars[]" oninput="DOM_call_functions_required(this,'+count+')" onfocusout="DOM_call_functions_required(this,'+count+')" id="particulars'+count+'" placeholder="Particulars"  class="form-control m-input particulars" data-required><span class="m-form__help"></span></th>';


         html_code += '<th  colspan="2" style="vertical-align:top"><input type="text" name="hsn[]" id="hsn'+count+'" class="form-control m-input hsn" disabled></th>';


         html_code += '<th  colspan="2" style="vertical-align:top"><input  type="text" autocomplete="off" name="quantity[]" oninput="DOM_call_functions_quantity(this,'+count+')" onfocusout="DOM_call_functions_quantity(this,'+count+')" id="quantity'+count+'" class="form-control m-input quantity"  placeholder="0" data-required-quantity><span class="m-form__help"></span></th>';


         html_code += ' <th  colspan="2" style="vertical-align:top"><input  type="text"  autocomplete="off" name="rate[]" oninput="DOM_call_functions_number(this,'+count+')" onfocusout="DOM_call_functions_number(this,'+count+')" id="rate'+count+'" class="form-control m-input rate" placeholder="0" data-required-number><span class="m-form__help"></span></th>';



         html_code += '<th  colspan="3" style="vertical-align:top"><input  type="text" autocomplete="off"  name="amount[] " id="amount'+count+'" class="form-control m-input amount" placeholder="0" readonly> </th>';



         html_code += '<th  colspan="1"> <div align="right"><button type="button" name="remove_row" id="'+count+'" onclick="remove_tr(this,'+count+')" class="btn btn-danger btn-xs remove_row">X</button></th></div>';
         html_code += '</tr>';

         $('#'+last).after(html_code);
         sequence_order();


      });






      $('input').on('input', function() {
         cal_final_total(count);
      });






      $(document).on('blur', '.amount', function(){
         cal_final_total(count);
      });

      $(document).on('blur', '.quantity', function(){
         cal_final_total(count);
      });

      $(document).on('blur', '.rate', function(){
         cal_final_total(count);
      });



   });
</script>


