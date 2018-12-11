
<div class="m-content">
   <div class="row">
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

      <script src="<?=base_url()?>assets/app/js/jquery-v-3.3.1.min.js" type="text/javascript"></script>
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
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="<?=base_url()?>index.php/admin/update_credit_debit_entry_click/<?=$rows1->m08_id?>" method="post" data-valid> 
               <div class="m-portlet__body">	
                  <div class="form-group m-form__group row">
                     <label class="col-lg-2 col-form-label">Credit/Debit:<span style="color:red">*</span></label>
                     <div class="col-lg-3">
                        <input type="hidden" name="credit_debit" value="<?=$rows1->m08_credit_debit?>">
                        <select class="form-control m-bootstrap-select m_selectpicker credit_debit" name="credit_debit" id="credit_debit" data-required-select data-name="credit or debit" disabled>
                           <option disabled value="">Select Credit/Debit</option>

                           <option <?php if($rows1->m08_credit_debit == 1) {?> selected <?php } ?> value="1">Credit</option>
                           <option <?php if($rows1->m08_credit_debit == 2) {?> selected <?php } ?> value="2">Debit</option>
                        </select>
                        <span class="m-form__help"></span>
                     </div>
                     <label class="col-lg-2 col-form-label"  id="select_party_name_label">Party:<span style="color:red">*</span></label>
                     <div class="col-lg-3" id="select_party_name_div">
 <input type="hidden" name="party_name" value="<?=$rows1->m08_party_name?>">
                       
                        <?php if($rows1->m08_credit_debit == 1){ ?>
                        <select class="form-control m-bootstrap-select m_selectpicker" name="party_name" id="party_name" data-required-select data-name="party name" disabled>
                           <option disabled value="">Select Name</option>
                           <?php foreach($sales_party1 as $row){
   if($rows1->m08_party_name == $row->m03_name){ ?>
                           <option selected value="<?=$rows1->m08_party_name?>"><?=$rows1->m08_party_name?></option>
                           <?php } else {?>
                           <option value="<?=$row->m03_name?>"><?=$row->m03_name?></option>
                           <?php } } ?>

                        </select>
                        <?php } 

                               else if($rows1->m08_credit_debit ==2 ){ ?>

                        <select class="form-control m-bootstrap-select m_selectpicker" name="party_name" id="party_name" data-required-select data-name="party name" disabled>
                           <option disabled value="">Select Name</option>
                           <?php foreach($sales_party2 as $row) { 
                                  if($rows1->m08_party_name == $row->m02_name){ ?>
                           <option selected value="<?=$rows1->m08_party_name?>"><?=$rows1->m08_party_name?></option>
                           <?php } else { ?>
                           <option value="<?=$row->m02_name?>"><?=$row->m02_name?></option>
                           <?php } } ?>

                        </select> 

                        <?php } ?>

                        <span class="m-form__help"></span>
                     </div>
                  </div>

                  <div class="form-group m-form__group row">
                     <label class="col-lg-2 col-form-label">Mode Of Payment:<span style="color:red">*</span></label>
                     <div class="col-lg-3">
                        <input type="hidden" name="mode_of_payment" value="<?=$rows1->m08_mode_of_payment?>">
                        <select class="form-control m-bootstrap-select m_selectpicker mode_of_payment" name="mode_of_payment" id="mode_of_payment" data-required-select data-name="mode of payment" disabled>



                           <option disabled value="">Select mode of payment</option>

                           <?php foreach($mode as $rows) { 
   if($rows1->m08_mode_of_payment==$rows->m07_mode){?>
                           <option selected value="<?=$rows->m07_mode?>"><?=$rows->m07_mode?></option><?php  } else{?>

                           <option value="<?=$rows->m07_mode?>"><?=$rows->m07_mode?></option>
                           <?php }} ?>

                        </select>             
                        <span class="m-form__help"></span>
                     </div>
                     <label class="col-lg-2 col-form-label">Amount:</label>
                     <div class="col-lg-3">
                        <input type="text" name="amount" id="amount" class="form-control m-input amount" placeholder="amount" 
                               value="<?php echo ($rows1->m08_credit_debit==1)?$rows1->m08_credit_amount:$rows1->m08_debit_amount ?>" data-required-number data-required />  
                        <span class="m-form__help"></span>
                     </div>
                  </div>

                  <div class="form-group m-form__group row">
                     <label class="col-lg-2 col-form-label">Date:</label>
                     <div class="col-lg-3">
                        <input type="text" name="date" class="form-control date" id="m_datepicker_1"  data-date-format="dd/mm/yyyy"  value="<?php echo date('d/m/Y',strtotime($rows1->m08_date))?>" data-required readonly placeholder="Select date" />
                        <span class="m-form__help">Please enter date</span>
                     </div>
                     <label class="col-lg-2 col-form-label">Comment:</label>
                     <div class="col-lg-3">
                        <textarea class="form-control m-input m-input--air" name="comment" rows="3"><?=$rows1->m08_comments?></textarea>
                        <span class="m-form__help">Please enter your comment</span>
                     </div>
                  </div>


               </div>
               <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                  <div class="m-form__actions m-form__actions--solid">
                     <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                           <button type="submit" class="btn btn-success">Update</button>
                           <a type="reset" class="btn btn-default" href="<?=base_url()?>index.php/admin/credit_debit_entry">Cancel</a>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <!--end::Form-->
         </div>
         <!--begin::Portlet-->



      </div>
   </div>
</div>
<!--end::Portlet-->



<script>


   $(document).ready(function(){
      $('#credit_debit').on('change', function() {
         var credit_debit = $('#credit_debit').val();
         if(credit_debit == 1)
         { $('#select_party_name_label').html('Select Sales Party:<span style="color:red">*</span>');}
         else
         {  $('#select_party_name_label').html('Select Purchase Party:<span style="color:red">*</span>');}

         $("#select_party_name_div").load("<?=base_url()?>index.php/admin/party_select_picker?credit_debit="+credit_debit);

      });
   });

</script>
