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
         var gst = 0;
         var cgst = 0;
         var sgst = 0;
         var igst = 0;
         var igst_value = 0;
         quantity = $('#quantity'+j).val();
         if(quantity > 0)
         {
            rate = $('#rate'+j).val();
            if(rate > 0)
            { 
               amount = parseFloat(quantity) * parseFloat(rate);
               $('#amount'+j).val(amount.toFixed(2)); 

               gst = $('#gst'+j).val();
               if(gst != '')
               {
                  cgst = parseFloat(amount) * parseFloat(gst)/parseFloat(200);
                  sgst = parseFloat(amount) * parseFloat(gst)/parseFloat(200);
                  $('#cgst'+j).val(cgst.toFixed(2));
                  $('#sgst'+j).val(sgst.toFixed(2));
                  $('#amount'+j).val((parseFloat(amount) +  parseFloat(cgst.toFixed(2)) +  parseFloat(sgst.toFixed(2))).toFixed(2));
               }
               else{
                  $('#cgst'+j).val('');
                  $('#sgst'+j).val('');

               }
               igst = $('#igst'+j).val();
               if(igst != '')
               {
                  igst_value = parseFloat(amount)*parseFloat(igst)/parseFloat(100);
                  $('#igst_value'+j).val(igst_value.toFixed(2));
                  var amt = (parseFloat(amount) +  parseFloat(igst_value.toFixed(2)) +  parseFloat(cgst.toFixed(2)) +  parseFloat(sgst)).toFixed(2)
                  $('#amount'+j).val(amt);
               }
               else{ 
                  $('#igst_value'+j).val('');

               }


               t_amount = parseFloat(t_amount.toFixed(2)) +  parseFloat(amount.toFixed(2)) +  parseFloat(cgst.toFixed(2)) +  parseFloat(sgst.toFixed(2)) +  parseFloat(igst_value.toFixed(2));
            }
         }
      }

      $('#t_amount').val(t_amount.toFixed(2));
      amount_in_words($('#t_amount').val());
   }


   function DOM_call_functions_quantity(element,count){
      data_required_quantity(element);
      cal_final_total(count);
   }

   function DOM_call_functions_number(element,count){
      data_required_number(element);
      cal_final_total(count);
   }  

   function DOM_call_functions_gst(element,count){
      data_gst_required(element);
      cal_final_total(count);
   }  


   function DOM_call_functions_required(element,count){
      data_required(element); 
   }  

   function remove_tr(element,count){
      if($(".table-bordered > #if_no_row").find('tr').length==1){
         alert("Invoice needs to have atleast one item. So this can not be deleted.");
      }
      else{
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
         amount_in_words($('#t_amount').val());


      }
   }
</script> 

<div class="m-content">
   <div class="row">

       
      <?php if(($party_flag > 0 || $party_flag == -1) && strtotime($create_party_date) > strtotime($row1->m05_create_date) ){ ?>
      <div class="col-lg-2"></div>
      <div class="col-lg-8 ">
         <?php if($this->session->flashdata('alert')) { ?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <?=$this->session->flashdata('alert')?>					  	
         </div>
         <?php } ?>
      </div>
      <div class="col-lg-2"></div>
      <?php } ?>
      <?php if(($transport_flag > 0 || $transport_flag == -1 ) && strtotime($create_transport_date) > strtotime($row1->m05_create_date) ){ ?>
      <div class="col-lg-2"></div>
      <div class="col-lg-8 ">
         <?php if($this->session->flashdata('alert2')) { ?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <?=$this->session->flashdata('alert2')?>					  	
         </div>
         <?php } ?>
      </div>
      <div class="col-lg-2"></div>
      <?php } ?>







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


            <!--begin::Form-->

            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="<?=base_url()?>index.php/admin/update_purchase_click/<?=$row1->m05_invoice_no?>" method="post" data-valid>

               <style>
                  .custom-table.table thead th{vertical-align:top;border-bottom:2px solid #f4f5f8}h1{font:700 100% sans-serif;letter-spacing:3px;text-align:center;text-decoration:underline;text-transform:uppercase}.custom-table table{font-size:75%;table-layout:fixed;width:100%;border-collapse:collapse;border:1px solid #000}.header h1,td,th{border-radius:.25em}.add,.cut,td,th{border-width:1px}.add,.cut,td{border-color:#000}td,th{padding:.5em;position:relative;text-align:left;border-style:solid;font-weight:400}.header{margin:0 0 0 2em}.header:after{clear:both;content:"";display:table}.header h1{color:#000;margin:0 0 1em;padding:.5em 0}.header address{float:left;font-size:75%;font-style:normal;line-height:1.25;margin:0 1em 1em 0}.header address p{margin:0 0 .25em}.header span,header img{display:block;float:right}.header span{margin:0 0 1em 1em;max-height:25%;max-width:60%;position:relative}.cut,.header input{opacity:0;position:absolute;top:0}.header img{max-height:100%;max-width:100%}.header input{cursor:pointer;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";height:100%;left:0;width:100%}.add,.cut{display:block;font-size:.8rem;padding:.25em .5em;float:left;text-align:center;width:.6em;background:#9AF;box-shadow:0 1px 2px rgba(0,0,0,.2);background-image:-moz-linear-gradient(#00ADEE 5%,#0078A5 100%);background-image:-webkit-linear-gradient(#00ADEE 5%,#0078A5 100%);border-radius:.5em;color:#FFF;cursor:pointer;font-weight:700;text-shadow:0 -1px 2px rgba(0,0,0,.333)}.add{margin:-2.5em 0 0}.cut{left:-1.5em;-webkit-transition:opacity .1s ease-in}@page{margin:0}#invoice_id{padding:30px;text-align:center!important}.heading{width:100%}.ratnadeep-head h1{background:unset;color:#da251c;letter-spacing:5px;font-family:Onstage;font-size:30px;margin-bottom:4px;line-height:11px;padding-top:28px}.ratnadeep-head h4{font-size:15px;font-size:19px;margin-top:6px}.ratnadeep-head .img1{height:20px;width:95px;margin-left:10px}.ratnadeep-head .img2{height:18px;width:86px}.custom-table table.balance,.custom-table table.meta{float:right;width:100%}.float-left{float:left}.brand{width:54%}.first-col{width:10%}.second-col{width:auto}.third-col{width:10%}.img-content{margin-bottom:10px;margin-right:-15px}.custom-table .table-bordered>thead>tr>th{border:1px solid #000!important;border-top:1px solid #000!important;border-bottom:1px solid #000!important;border-left:1px solid #000!important;border-right:1px solid #000!important}ul{list-style:none}form{width:100%;max-width:100%;margin:0 auto}.col-md-8{text-align:-webkit-center}.custom-table table th{padding:2px;vertical-align:top}#address,#city_pincode,#gstin,#landmark,#state{font-size:16px}@media print{body *{visibility:hidden}#invoice_id,#invoice_id *{visibility:visible}#invoice_id{position:absolute;left:0;top:0}}input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button{-webkit-appearance:none;-moz-appearance:none;appearance:none;margin:0}.form-control{padding:10px 1px}
                  div.dataTables_wrapper div.dataTables_length select {
                     padding: 10px 20px;
                  }

               </style>

               <div id=invoice_id>

                  <header class="header">
                     <h1>Invoice</h1>
                  </header> 
                  <article class="custom-table">
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th colspan="12">
                                 Name:<span style="color:red">*</span>
                                 <?php if(($party_flag > 0 || $party_flag == -1) && strtotime($create_party_date) > strtotime($row1->m05_create_date) ){ ?>
                                 <input type="hidden" name="name" value="<?=$row1->m05_purchase_party_name?>">
                                 <?php   }  ?>
                                 <?php ?>

                                 <select class="form-control m-bootstrap-select m_selectpicker" name="name" id="name" data-name="party name" data-required-select
                                         <?php  if(($party_flag > 0 || $party_flag == -1) && strtotime($create_party_date) > strtotime($row1->m05_create_date) ){ echo 'disabled';  ?>>
                                    <option selected value="<?=$row1->m05_purchase_party_name?>"><?=$row1->m05_purchase_party_name?></option> <?php } else{ ?>>

                                    <?php foreach($purchase_party as $row) { if($row->m02_id==$row1->m05_purchase_party_id){ ?>
                                    <option selected value="<?=$row->m02_name?>"><?=$row->m02_name?></option><?php  }  else{?>

                                    <option value="<?=$row->m02_name?>"><?=$row->m02_name?></option>
                                    <?php } } } ?>
                                 </select>
                                 <span class="m-form__help"></span>
                              </th>
                              <th colspan="12">
                                 Invoice No.:<span style="color:red">*</span> 
                                 <input type="text" name="invoice_no" id="invoice_no" data-required data-name="invoice number" value="RDP<?=$row1->m05_invoice_no?>" class="form-control m-input">
                                 <span class="m-form__help"></span>
                              </th>
                           </tr>
                        </thead>
                        <thead> 
                           <tr>
                              <th colspan="12">Add.: <input type="text" id="address" name="address" class="form-control m-input" readonly  value="<?=$row1->m05_address?>"> </th>
                              <th  colspan="12">Select Date:<span style="color:red">*</span> <input type="text" name="date" data-required class="form-control" id="m_datepicker_1" value="<?php echo(date_format(date_create_from_format('Y-m-d', $row1->m05_date), 'd/m/Y'));?>"  data-date-format="dd/mm/yyyy"   readonly placeholder="Select date" />
                                 <span class="m-form__help"></span>
                              </th>
                           </tr>

                        </thead>
                        <thead>
                           <input type="hidden" id="state" name="state"   class="form-control m-input" value="<?=$row1->m05_state?>" readonly>
                           <input type="hidden" name="landmark" id="landmark_hidden" class="form-control m-input" readonly value="<?=$row1->m05_landmark?>">
                           <input type="hidden" name="party_id" id="party_id" value="<?=$row1->m05_purchase_party_id?>" class="form-control m-input" readonly>
                           <tr>
                              <th colspan="12">
                                 <input type="text" id="landmark" class="form-control m-input"  value="<?=$row1->m05_landmark?> <?=$row1->m05_state?>" readonly></th>
                              <th colspan="12">
                                 L. R. No.
                                 <input type="text"  class="form-control m-input" name="lrno" value="<?=$row1->m05_lrno?>"></th>
                           </tr>
                        </thead>
                        <thead>
                           <tr> 
                              <input type="hidden" name="city" id="city" class="form-control m-input" readonly value="<?=$row1->m05_city?>">
                              <input type="hidden" name="pincode" id="pincode" class="form-control m-input" readonly value="<?=$row1->m05_pincode?>">
                              <th colspan="12"> 
                                 <input  type="text" id="city_pincode" name="city_pincode" class="form-control m-input" readonly value="<?=$row1->m05_city?>-<?=$row1->m05_pincode?>"></th>
                              <th colspan="12">Transport: <span style="color:red">*</span>

                                 <?php  if(($transport_flag > 0 || $transport_flag == -1)  && strtotime($create_transport_date) > strtotime($row1->m05_create_date) ){ ?>
                                 <input type="hidden" name="transport" value="<?=$row1->m05_transport_party_id?>">
                                 <?php } ?>

                                 <select class="form-control m-bootstrap-select m_selectpicker"  name="transport" id="transport"  data-name="transport" data-required-select  <?php  if(($transport_flag > 0 || $transport_flag == -1)  && strtotime($create_transport_date) > strtotime($row1->m05_create_date) ){ echo 'disabled'  ?>>

                                    <option selected value="<?=$row1->m05_transport_party_id?>"><?=$row1->m05_transport?></option> <?php } else{ ?>>

                                    <option disabled selected value="">Select Transport</option>
                                    <?php foreach($transport_party->result() as $row) { if($row->m04_id==$row1->m05_transport_party_id){ ?>
                                    <option selected value="<?=$row->m04_id?>"><?=$row->m04_name?></option><?php  } else{ ?>

                                    <option value="<?=$row->m04_id?>"><?=$row->m04_name?></option>
                                    <?php }}} ?>
                                 </select>
                                 <span class="m-form__help"></span>
                              </th>
                           </tr>
                        </thead>
                        <thead>
                           <tr>
                              <th colspan="12" >GSTIN: <input type="text" id="gstin" name="gstin" class="form-control m-input" value="<?=$row1->m05_gstin?>" readonly ></th>
                              <th colspan="12"></th>
                           </tr>
                        </thead>
                        <thead>
                           <tr>
                              <th  colspan="1">Sr. No.</th>
                              <th  colspan="2" ><b><center>ITEMS<span style="color:red">*</span></center></b></th>
                              <th  colspan="2" >HSN Code</th>
                              <th  colspan="2">Quantity<span style="color:red">*</span></th>
                              <th  colspan="2">Rate<span style="color:red">*</span></th>
                              <th  colspan="2">GST(%)</th>
                              <th  colspan="2">SGST (INR)</th>
                              <th  colspan="2">CGST (INR)</th>
                              <th  colspan="2">IGST(%)</th>
                              <th  colspan="2">IGST (INR)</th>
                              <th  colspan="4">Amount (INR) </th>
                              <th  colspan="1"></th>
                           </tr>
                        </thead>
                        <thead id="if_no_row">

                           <?php $i=0; foreach($row_data as $row2) { $i++; ?>
                           <span><input type="hidden" name="item_id[]" value="<?=$row2->m05_id?>"></span>
                           <tr id="row_id_<?=$i?>" style="height:50px" >
                              <th  colspan="1" style="vertical-align:top;font-size: 15px;padding: 16px 0px 0px 15px;" id="sr_no">
                                 <span><?=$i?></span></th>
                              <th  colspan="2" style="vertical-align:top">
                                 <input type="text" name="particulars[]" data-required value="<?=$row2->m05_particulars?>" id="particulars<?=$i?>" class="form-control m-input particulars" >
                                 <span class="m-form__help"></span>
                              </th>
                              <th  colspan="2" style="vertical-align:top">
                                 <input type="text" name="hsn[]" id="hsn<?=$i?>" class="form-control m-input hsn" value="<?=$row2->m05_hsn?>">
                              </th>
                              <th  colspan="2" style="vertical-align:top">
                                 <input  type="text" autocomplete="off" name="quantity[]" data-required-quantity id="quantity<?=$i?>"  value="<?=$row2->m05_quantity?>" class="form-control m-input quantity"  placeholder="0" >
                                 <span class="m-form__help"></span>
                              </th>
                              <th  colspan="2" style="vertical-align:top">
                                 <input  type="text"  autocomplete="off" data-required-number name="rate[]" id="rate<?=$i?>" class="form-control m-input rate" placeholder="0"  value="<?=$row2->m05_rate?>" >
                                 <span class="m-form__help"></span>
                              </th>
                              <th  colspan="2" style="vertical-align:top">
                                 <input  type="text"  autocomplete="off" name="gst[]" id="gst<?=$i?>" class="form-control m-input gst" placeholder="0" data-gst-percent  value="<?=$row2->m05_gst?>" >
                              </th>
                              <th  colspan="2" style="vertical-align:top">
                                 <input  type="text"  autocomplete="off" name="sgst[]" id="sgst<?=$i?>" class="form-control m-input sgst" placeholder="0"  readonly  value="<?=$row2->m05_sgst?>">
                              </th>
                              <th  colspan="2" style="vertical-align:top">
                                 <input  type="text"  autocomplete="off" name="cgst[]" id="cgst<?=$i?>" class="form-control m-input cgst" placeholder="0"  readonly  value="<?=$row2->m05_cgst?>">
                              </th>
                              <th  colspan="2" style="vertical-align:top">
                                 <input  type="text"  autocomplete="off" name="igst[]" id="igst<?=$i?>" class="form-control m-input igst" placeholder="0" data-gst-percent  value="<?=$row2->m05_igst?>">
                              </th>
                              <th  colspan="2" style="vertical-align:top">
                                 <input  type="text"  autocomplete="off" name="igst_value[]" id="igst_value<?=$i?>" class="form-control m-input igst_value" placeholder="0" readonly  value="<?=$row2->m05_igst_value?>">
                              </th>
                              <th  colspan="4" style="vertical-align:top">
                                 <input  type="text" autocomplete="off"  name="amount[] " id="amount<?=$i?>" class="form-control m-input amount" placeholder="0" readonly value="<?=$row2->m05_item_total?>">
                              </th>
                              <th  colspan="1">
                                 <div align="right">
                                    <button type="button" name="remove_row" id='<?=$i?>' onclick="remove_tr(this,<?=$i?>)"  class="btn btn-danger btn-xs remove_row">X</button>
                                 </div>
                              </th>
                           </tr>

                           <?php }?>

                        </thead>
                        <thead>
                           <input type="hidden" name="total_item" id="total_item" value="<?=$i?>" />
                           <tr>
                              <th colspan="1" style="height: 150px;"></th>
                              <th colspan="2"></th>
                              <th colspan="2"></th>
                              <th colspan="2"></th>
                              <th colspan="2"></th>
                              <th colspan="2"></th>
                              <th colspan="2"></th>
                              <th colspan="2"></th>
                              <th colspan="2"></th>
                              <th colspan="2"></th>
                              <th colspan="4"></th>
                              <th colspan="1" > 
                                 <div align="right">
                                    <button type="button" name="add_row" id="add_row" class="btn btn-success btn-xs" title="Add Row">+</button>
                                 </div>
                              </th>     
                           </tr>

                           <tr>
                              <th colspan="14" >Price in words: <textarea class="form-control m-input m-input--air" name="rupeesinwords"  id="rupeesinwords" rows="1" placeholder="Amount in rupees" readonly><?=$row1->m05_amount_in_words?></textarea></th>
                              <th colspan="6">Total  Payable Amount (INR) </th>
                              <th colspan="4"><input type="text"  name="t_amount" id="t_amount" autocomplete="off" class="form-control m-input" placeholder="0" readonly value="<?=$row1->m05_total_amount?>"></th>
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
                           <button type="submit" class="btn btn-brand"  disabled="disabled">Update</button>
                           <a type="reset" href="<?=base_url()?>index.php/admin/purchase" class="btn btn-secondary">Cancel</a>
                        </div>
                     </div>
                  </div>
               </div>
            </form>

            <!--end::Form-->
         </div>

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

         $.ajax({
            type: "POST",
            url: "<?=base_url()?>index.php/admin/get_purchase_party_detail",
            data: {'name_id':name},
            success: function(data)
            {
               var object = $.parseJSON(data);


               $("#gstin").attr('value',object.m02_gstin);
               $("#address").attr('value',object.m02_address);
               $("#party_id").attr('value',object.m02_id);
               $("#state").attr('value',object.m02_state);
               if(object.m02_landmark1!='' || object.m02_landmark2!=''){
                  $("#landmark_hidden").attr('value',object.m02_landmark1+' '+object.m02_landmark2);
               }

               $("#landmark").attr('value',object.m02_landmark1+', '+object.m02_landmark2+' '+object.m02_state);
               $("#state").attr('value',object.m02_state);
               $("#city").attr('value',object.m02_city);
               $("#pincode").attr('value',object.m02_pincode);
               $("#city_pincode").attr('value',object.m02_city + " - " + object.m02_pincode);

            }
         });

      });
   });

   $(document).ready(function(){

      var final_total_amt = $('#t_amount').val();

      var count = $(".table-bordered > thead:nth-last-child(2)").find('tr:nth-last-child(1)').find('th:nth-last-child(1)').find('button').attr('id');
      $(document).on('click', '#add_row', function(){

         var count = $(".table-bordered > thead:nth-last-child(2)").find('tr:nth-last-child(1)').find('th:nth-last-child(1)').find('button').attr('id');

         if(typeof count == 'undefined'){ count = $(".table-bordered > #if_no_row").find('tr').length ;}

         count++;
         var total_rows = parseInt($(".table-bordered > #if_no_row").find('tr').length) + 1;


         var total = $('#total_item').val();
         $('#total_item').val(parseInt(total)+1);

         var html_code = '';


         html_code += '<tr id="row_id_'+count+'">';
         html_code += '<th  colspan="1"><span id="sr_no" style="font-size: 15px;padding: 16px 0px 0px 15px;">'+total_rows+'</span></th>';

         html_code += '<th  colspan="2" style="vertical-align:top;"> <input type="text" name="particulars[]" data-required id="particulars'+count+'"  oninput="DOM_call_functions_required(this,'+count+')" onfocusout="DOM_call_functions_required(this,'+count+')" class="form-control m-input particulars" > <span class="m-form__help"></span></th>';


         html_code += '<th  colspan="2" style="vertical-align:top"><input type="text" name="hsn[]" id="hsn'+count+'" class="form-control m-input hsn"></th>';


         html_code += '<th  colspan="2" style="vertical-align:top"><input  type="text" data-required-number autocomplete="off" name="quantity[]" id="quantity'+count+'" class="form-control m-input quantity"  placeholder="0" oninput="DOM_call_functions_quantity(this,'+count+')" onfocusout="DOM_call_functions_quantity(this,'+count+')"><span class="m-form__help"></span></th>';


         html_code += ' <th  colspan="2" style="vertical-align:top"><input  type="text"  data-required-number autocomplete="off" name="rate[]" id="rate'+count+'" class="form-control m-input rate" placeholder="0" oninput="DOM_call_functions_number(this,'+count+')" onfocusout="DOM_call_functions_number(this,'+count+')"><span class="m-form__help"></span></th>';


         html_code += ' <th  colspan="2" style="vertical-align:top"><input  type="text"  data-gst-percent autocomplete="off" name="gst[]" id="gst'+count+'" class="form-control m-input gst" placeholder="0" oninput="DOM_call_functions_gst(this,'+count+')" onfocusout="DOM_call_functions_gst(this,'+count+')"> <span class="m-form__help"></span></th>';


         html_code += ' <th  colspan="2" style="vertical-align:top"><input  type="text"  autocomplete="off" name="sgst[]" id="sgst'+count+'" class="form-control m-input sgst" placeholder="0"  readonly></th>';


         html_code += ' <th  colspan="2" style="vertical-align:top"><input  type="text"  autocomplete="off" name="cgst[]" id="cgst'+count+'" class="form-control m-input cgst" placeholder="0"  readonly></th>';


         html_code += ' <th  colspan="2" style="vertical-align:top"><input  type="text" data-gst-percent  autocomplete="off" name="igst[]" id="igst'+count+'" class="form-control m-input igst" placeholder="0" oninput="DOM_call_functions_gst(this,'+count+')" onfocusout="DOM_call_functions_gst(this,'+count+')"><span class="m-form__help"></span></th>';


         html_code += ' <th  colspan="2" style="vertical-align:top"><input  type="text"  autocomplete="off" name="igst_value[]" id="igst_value'+count+'" class="form-control m-input igst_value" placeholder="0" readonly></th>';



         html_code += '<th  colspan="4" style="vertical-align:top"><input  type="text" autocomplete="off"  name="amount[] " id="amount'+count+'" class="form-control m-input amount" placeholder="0" value="0" readonly> </th>';



         html_code += '<th  colspan="1"> <div align="right"><button type="button" name="remove_row" id="'+count+'" onclick="remove_tr(this,'+count+')" class="btn btn-danger btn-xs remove_row">X</button></th></div>';
         html_code += '</tr>';

         var last = $(".table-bordered > thead:nth-last-child(2)").find('tr:nth-last-child(1)').attr('id');

         $('#'+last).after(html_code);

         sequence_order();


      });


      $('input').on('input', function() {
         cal_final_total(count);
      });


      $(document).on('blur', '.gst', function(){
         cal_final_total(count);

      });
      $(document).on('blur', '.igst', function(){
         cal_final_total(count);
      });


   });

</script>

