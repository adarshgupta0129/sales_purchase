<?php /*foreach($invoice_id as $row13){   $total_sales = 0; ?>

 <?php  $total_sales = $total_sales + $row13->m06_total_amount; echo $total_sales  ?>

<?php } die; */?>
<div class="m-content">
   <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4 ">
         <?php if($this->session->flashdata('alert')) { ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>Great!</strong> <?=$this->session->flashdata('alert')?>					  	
         </div>
         <?php } ?>
      </div>

      <script src="<?=base_url()?>assets/app/js/jquery-v-3.3.1.min.js" type="text/javascript"></script>
      <div class="col-lg-12">


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
            </div>


            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="<?=base_url()?>index.php/admin/ledger_click" method="post" id="validate_form"> 
               <div class="m-portlet__body">	
                  <div class="form-group m-form__group row">
                     <label class="col-lg-1 col-form-label">Credit/Debit:</label>
                     <div class="col-lg-3">
                        <select class="form-control m-bootstrap-select m_selectpicker credit_debit" name="credit_debit" id="credit_debit" >
                           <?php  if($credit_debit != '0'){ ?>
                           <option value="0">All</option>
                           <option  <?php if($credit_debit==1){ ?> selected  <?php } ?> value="1">Credit</option>
                           <option  <?php if($credit_debit==2){ ?> selected  <?php } ?> value="2">Debit</option>
                           <?php } else{ ?> 
                           <option selected value="0">All</option>
                           <option value="1">Credit</option>
                           <option value="2">Debit</option>
                           <?php  }  ?>
                        </select>
                     </div>

                     <label class="col-lg-1 col-form-label" id="select_party_name_label">Party Name:</label>
                     <div class="col-lg-3" id="select_party_name_div">


                        <?php if($credit_debit != '0') { ?>

                        <?php if($credit_debit == 1){ ?>
                        <select class="form-control m-bootstrap-select m_selectpicker" name="party_name" id="party_name">
                           <option value="0">All</option>
                           <?php foreach($sales_party1 as $row){
   if($party_name == $row->m03_name){ ?>
                           <option selected value="<?=$row->m03_name?>"><?=$row->m03_name?></option>
                           <?php } else {?>
                           <option value="<?=$row->m03_name?>"><?=$row->m03_name?></option>
                           <?php } } ?>

                        </select>
                        <?php }  else if($credit_debit ==2 ){ ?>

                        <select class="form-control m-bootstrap-select m_selectpicker" name="party_name" id="party_name">
                           <option  value="0">All</option>
                           <?php foreach($sales_party2 as $row) { 
   if($party_name == $row->m02_name){ ?>
                           <option selected value="<?=$row->m03_name?>"><?=$row->m03_name?></option>
                           <?php } else { ?>
                           <option value="<?=$row->m02_name?>"><?=$row->m02_name?></option>
                           <?php } } ?>

                        </select> 

                        <?php } } else { ?>


                        <select class="form-control m-bootstrap-select m_selectpicker credit_debit" name="party_name" id="party_name" data-name="credit or debit">
                           <option selected value="0">All</option> 
                        </select> 

                        <?php } ?> 


                        <span class="m-form__help"></span>
                     </div>

                     <label class="col-lg-1 col-form-label" >Select Date Range:</label>
                     <div class="col-lg-3">
                        <div class="input-group" id="m_daterangepicker_2">
                           <input type="text" class="form-control m-input" readonly="" placeholder="Select date range" name="daterange" <?php if(isset($credit_debit)){ ?> value="<?=$date?>" <?php } ?>>
                           <div class="input-group-append">
                              <span class="input-group-text"><i class="la la-calendar-check-o"></i></span>
                           </div>
                        </div>
                     </div>
                  </div>

               </div>
               <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                  <div class="m-form__actions m-form__actions--solid">
                     <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                           <button type="submit" class="btn btn-success" id="validate_button">Search</button>
                           <a type="reset" class="btn btn-default" href="<?=base_url()?>index.php/admin/ledger"> Reset Filter</a>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <!--end::Form-->
         </div>


         <style>
            .table-bordered th, .table-bordered td {
               text-align: center;
            }
         </style>
         <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
               <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                     <h3 class="m-portlet__head-text">
                        <?=$page_heading?>
                     </h3>
                  </div>
               </div>
               <div class="m-portlet__head-tools">
                  <ul class="m-portlet__nav">
                     <li class="m-portlet__nav-item">
                        <a href="javascript:void(0)" onclick="createPDF('pdf')" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                           <span>
                              <span>PDF</span>
                           </span>
                        </a>
                     </li>

                     <li class="m-portlet__nav-item">
                        <a href="javascript:void(0)" onclick="createPDF('excel')" class="btn btn-info m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                           <span>
                              <span>EXCEL</span>
                           </span>
                        </a>
                     </li> 
                  </ul>
               </div>
            </div>


            <div class="m-portlet__body">
               <!--begin: Datatable -->
               <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1" data-page-length='25'>
                  <thead>
                     <tr>

                        <th>View</th>
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

                     </tr>
                  </thead> 
                  <tbody class="export_html_data1">

                     <?php  $k=$m=$p=$q=$l=$n=$r=0;$alltotal=0;$total_sales=0;$total_purchase=0;$total_credit=0;$total_debit=0;$total_cgst=0;$total_sgst=0;$total_igst=0;   $i=$j=0; $total=0; ?>

                     <?php if(isset($invoice_id)){     ?>           

                     <?php foreach($invoice_id as $row13){  ?>
                     <?php $alltotal = $alltotal + $row13->m06_item_total ?>

                     <tr>
                        <?php $k = $row13->m06_invoice_no; ?>
                        <?php if($k!=$m )  {$invoice = $row13->m06_invoice_no; ?>

                        <?php $j++; ?>
                        <?php } else {?> <?php }?>
                        <?php $m = $row13->m06_invoice_no; ?>
                        <td  rowspan="1"><span style="display:block"><?php echo $j; ?> </span>
                           <a class=" btn btn-success btn-sm" target="_blank" href="<?=base_url()?>index.php/admin/print_sales_invoice/<?=$row13->m06_invoice_no?>/<?=$row13->m06_id?>/0" title="View">
                              <i class="la la-eye"></i>
                           </a> 
                        </td>
                        <td><?='RDS'.$row13->m06_invoice_no?></td>
                        <td><?=$row13->m06_sales_party_name?></td>
                        <td>Sales Invoice</td>
                        <td><?php echo date_format(date_create_from_format('Y-m-d', $row13->m06_date), 'd/m/Y');?></td>  
                        <td><?=$row13->m06_total_amount?></td>  
                        <td>NA</td>
                        <td><?=$row13->m06_particulars?></td>
                        <td><?=$row13->m06_quantity?></td>
                        <td><?=$row13->m06_rate?></td>
                        <td>NA</td>
                        <td>NA</td>
                        <td>NA</td>
                        <td>NA</td>
                        <td>NA</td>
                        <td><?=$row13->m06_item_total ?></td>  
                        <td><?=$row13->m06_transport ?></td> 
                        <td><?=$row13->m06_extra_comments ?></td>

                     </tr> 
                     <?php  $total_sales = $total_sales + $row13->m06_item_total; ?>
                     <?php } } ?>


                     <?php foreach($invoice_id2 as $row15){  ?>

                     <tr> 
                        <?php $j++; ?> 
                        <td rowspan="1"> <span style="display:block" ><?php  echo $j; ?></span>
                           <a class=" btn <?php echo ($row15->m08_credit_debit==1)? 'btn-success':'btn-danger' ?> btn-sm"  style="cursor:unset"  target="_blank" href="javascript:void(0)" title="<?php echo ($row15->m08_credit_debit==1)? 'Credit':'Debit' ?>">
                              <i class="la la-circle"></i> </a>
                        </td>
                        <td>NA</td>
                        <td><?=$row15->m08_party_name?></td>
                        <td><?php echo ($row15->m08_credit_debit==1)? 'Credit Entry':'Debit Entry' ?></td>
                        <td> <?php echo date_format(date_create_from_format('Y-m-d', $row15->m08_date), 'd/m/Y');   ?></td>
                        <td><?php echo ($row15->m08_credit_debit==1)?$row15->m08_credit_amount:$row15->m08_debit_amount ?></td>  
                        <td><?=$row15->m08_mode_of_payment?></td>
                        <td>NA</td>
                        <td>NA</td>
                        <td>NA</td>
                        <td>NA</td>
                        <td>NA</td>
                        <td>NA</td>
                        <td>NA</td>
                        <td>NA</td>
                        <td>NA</td> 
                        <td>NA</td> 
                        <td><?=$row15->m08_comments?></td> 

                     </tr>
                     <?php if($row15->m08_credit_debit==1){ $total_credit = $total_credit + $row15->m08_credit_amount; }
                                                           else{ $total_debit = $total_debit + $row15->m08_debit_amount; }?>
                     <?php }  ?>


                     <?php if(isset($invoice_id1)){ ?>
                     <?php foreach($invoice_id1 as $row14){  ?>

                     <tr>


                        <?php $k = $row14->m05_invoice_no; ?>
                        <?php if($k!=$m )  {$invoice = $row14->m05_invoice_no; ?>

                        <?php $j++; ?>
                        <?php } else {?> <?php }?>

                        <?php $m = $row14->m05_invoice_no; ?>
                        <td  rowspan="1"><span style="display:block"><?php  echo $j; ?> </span>
                           <a class=" btn btn-danger btn-sm"   target="_blank" href="<?=base_url()?>index.php/admin/print_purchase_invoice/<?=$row14->m05_invoice_no?>/<?=$row14->m05_id?>/0" title="View">
                              <i class="la la-eye"></i>
                           </a>
                        </td>
                        <td> <?='RDP'.$row14->m05_invoice_no?></td>
                        <td><?=$row14->m05_purchase_party_name?></td>
                        <td>Purchase Invoice</td>
                        <td> <?php echo date_format(date_create_from_format('Y-m-d', $row14->m05_date), 'd/m/Y');   ?></td>
                        <td><?=$row14->m05_total_amount?></td>  
                        <td>NA</td>
                        <td><?=$row14->m05_particulars?></td>
                        <td><?=$row14->m05_quantity?></td>
                        <td><?=$row14->m05_rate?></td>
                        <td><?=$row14->m05_gst?></td>
                        <td><?=$row14->m05_cgst?></td>
                        <td><?=$row14->m05_sgst?></td>
                        <td><?=$row14->m05_igst?></td>
                        <td><?=$row14->m05_igst_value?></td>
                        <td><?=$row14->m05_item_total ?></td> 
                        <td><?=$row14->m05_transport ?></td> 
                        <td><?=$row14->m05_extra_comments ?></td>

                     </tr>
                     <?php $total_purchase = $total_purchase + $row14->m05_item_total; ?>
                     <?php $total_cgst = $total_cgst + $row14->m05_cgst; ?>
                     <?php $total_sgst = $total_sgst + $row14->m05_sgst; ?>
                     <?php $total_igst = $total_igst + $row14->m05_igst_value; ?>
                     <?php } }  ?>
                  </tbody> 
                  <tbody class="export_html_data2">
                     <tr>
                        <td colspan="18"></td>
                     </tr>
                     <tr>
                        <td colspan="3"> Total Sales:</td>
                        <td colspan="2"><?php echo $total_sales?></td>
                        <td></td>
                        <td colspan="3"> Total Purchase:</td>
                        <td colspan="2"><?php echo $total_purchase?></td>
                        <td colspan="7"></td> 

                     </tr>

                     <tr>
                        <td colspan="3"> Total Credit:</td>
                        <td colspan="2"><?php echo $total_credit?></td>
                        <td></td> 
                        <td colspan="3"> Total Debit:</td>
                        <td colspan="2"><?php echo $total_debit?></td>
                        <td colspan="7"></td> 
                     </tr>



                     <tr>
                        <td colspan="3"> Net:</td>
                        <td colspan="2"><?php echo ($total_sales-$total_credit)?></td>
                        <td></td>
                        <td colspan="3"> Net:</td>
                        <td colspan="2"><?php echo ($total_purchase-$total_debit)?></td>
                        <td colspan="7"></td> 
                     </tr>

                     <tr>
                        <td colspan="18"></td>
                     </tr>

                     <tr>
                        <td colspan="3">GST(CGST + SGST)</td>
                        <td colspan="2"><?php echo $total_cgst + $total_sgst; ?></td>
                        <td> CGST:</td>
                        <td ><?php echo $total_cgst?></td>
                        <td> SGST:</td>
                        <td ><?php echo $total_sgst?></td>
                        <td> IGST:</td>
                        <td ><?php echo $total_igst?></td>
                        <td colspan="7"></td>
                     </tr>


                  </tbody>


               </table>
            </div>
         </div>
         <form style="disply:none;" method="post" id="frm_tmp" target="_blank" action="<?=base_url()?>index.php/admin/ledger_download">
            <input type="hidden" name="tbl_data" id="tmp_tbl_data" />
            <input type="hidden" name="file_type" id="tmp_tbl_type" />
         </form>

      </div>
   </div>
</div>
<script>
   function createPDF(f_type){
      var html = $("#m_table_1").find('.export_html_data1').html();
      html = html + $("#m_table_1").find('.export_html_data2').html();


      $('#tmp_tbl_data').val(html);
      $("#tmp_tbl_type").val(f_type);

      if(f_type == 'excel'){
         $('#frm_tmp').attr('target','');
      }

      $('#frm_tmp').submit();
   }
</script>


<script>


   $(document).ready(function(){
      $('#credit_debit').on('change', function() {
         var credit_debit = $('#credit_debit').val();

         if(credit_debit == 1)
         {$('#select_party_name_label').html('Select Sales Party:');}

         else if(credit_debit == 2)
         {$('#select_party_name_label').html('Select Purchase Party:');}


         else if(credit_debit == 0)
         {$('#select_party_name_label').html('Select Party:');}


         $("#select_party_name_div").load("<?=base_url()?>index.php/admin/party_select_picker_ledger?credit_debit="+credit_debit);

      });
   });

</script>

