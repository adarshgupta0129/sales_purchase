
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
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="<?=base_url()?>index.php/admin/credit_debit_entry_click" method="post" data-valid> 
               <div class="m-portlet__body">	
                  <div class="form-group m-form__group row">
                     <label class="col-lg-2 col-form-label">Credit/Debit:<span style="color:red">*</span></label>
                     <div class="col-lg-3">
                        <select class="form-control m-bootstrap-select m_selectpicker credit_debit" name="credit_debit" id="credit_debit" data-required-select data-name="credit or debit">
                           <option disabled selected value="">Select Credit/Debit</option>
                           <option value="1">Credit</option>
                           <option value="2">Debit</option>
                        </select>
                        <span class="m-form__help"></span>
                     </div>
                     <label class="col-lg-2 col-form-label"  id="select_party_name_label">Party:<span style="color:red">*</span></label>
                     <div class="col-lg-3" id="select_party_name_div">
                        <select class="form-control m-bootstrap-select m_selectpicker party_name" name="party_name" id="party_name" data-required-select data-name="party name">
                           <option disabled selected value="">Please select credit or debit first</option>
                        </select>
                        <span class="m-form__help"></span>
                     </div>
                  </div>


                  <div class="form-group m-form__group row">
                     <label class="col-lg-2 col-form-label">Mode Of Payment:<span style="color:red">*</span></label>
                     <div class="col-lg-3">
                        <select class="form-control m-bootstrap-select m_selectpicker mode_of_payment" name="mode_of_payment" id="mode_of_payment" data-required-select data-name="mode of payment" >
                           <option disabled selected value="">Select mode of payment</option>
                           <?php foreach($mode as $rows) { ?>
                           <option value="<?=$rows->m07_mode?>"><?=$rows->m07_mode?></option>
                           <?php } ?>
                        </select>             
                        <span class="m-form__help"></span>
                     </div>
                     <label class="col-lg-2 col-form-label">Amount:</label>
                     <div class="col-lg-3">
                        <input type="text" name="amount" id="amount" class="form-control m-input amount" placeholder="amount" data-required-number data-required />  
                        <span class="m-form__help"></span>
                     </div>
                  </div>

                  <div class="form-group m-form__group row">
                     <label class="col-lg-2 col-form-label">Date:</label>
                     <div class="col-lg-3">
                        <input type="text" name="date" class="form-control date" id="m_datepicker_1" data-date-format="dd/mm/yyyy" value="<?php echo date('d/m/Y') ?>" data-required readonly placeholder="Select date" />
                        <span class="m-form__help">Please enter date</span>
                     </div>
                     <label class="col-lg-2 col-form-label">Comment:</label>
                     <div class="col-lg-3">
                        <textarea class="form-control m-input m-input--air" name="comment" rows="3"></textarea>
                        <span class="m-form__help">Please enter your comment</span>
                     </div>
                  </div>


               </div>
               <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                  <div class="m-form__actions m-form__actions--solid">
                     <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                           <button type="submit" class="btn btn-success"  disabled="disabled">Submit</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <!--end::Form-->
         </div>
         <!--begin::Portlet-->

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
                        <th>Sr. No.</th>
                        <th>Action</th>
                        <th>Party Name/Type</th>
                        <th>Credit</th>
                        <th>Debit</th>
                        <!--  <th>Final Amount</th>-->
                        <th>Mode</th>
                        <th>Comments</th>
                        <th>Date</th>
                     </tr>
                  </thead> 
                  <tbody> 
                     <?php $i=1; foreach($rows1 as $row){ ?>
                     <tr>
                        <td><?php echo $i++;?></td>
                        <td class="delete_data" nowrap> 
                           <a href="<?=base_url()?>index.php/admin/update_credit_debit_entry/<?=$row->m08_id?>" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                              <i class="la la-edit"></i>
                           </a><a id="delete_data" href="<?=base_url()?>index.php/admin/delete_credit_debit_entry/<?=$row->m08_id?>"class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                           <i class="la la-trash"></i>
                           </a>
                        </td>
                        <td><?php echo $row->m08_party_name ;echo '/';  echo ($row->m08_credit_debit==1? 'Sales':'Purchase'); ?></td>
                        <td><?=$row->m08_credit_amount?></td>
                        <td><?=$row->m08_debit_amount?></td>
                        <!--     <td><?=$row->m08_amount?></td>-->
                        <td><?=$row->m08_mode_of_payment?></td>
                        <td><?=$row->m08_comments?></td>
                        <td><?php echo date_format(date_create_from_format('Y-m-d', $row->m08_date), 'd/m/Y');   ?></td>
                     </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>




      </div>
   </div>
</div>
<!--end::Portlet-->



<script>


   $(document).ready(function(){
      $('#credit_debit').on('change', function() {
         var credit_debit = $('#credit_debit').val();
         if(credit_debit == 1)
         { $('#select_party_name_label').html('Select Sales Party<span style="color:red">*</span>');}
         else
         {  $('#select_party_name_label').html('Select Purchase Party<span style="color:red">*</span>');}

         $("#select_party_name_div").load("<?=base_url()?>index.php/admin/party_select_picker?credit_debit="+credit_debit);

      });
   });

</script>
