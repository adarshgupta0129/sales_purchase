<div class="m-content">
   <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
         <?php if($this->session->flashdata('alert')) { ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>Great!</strong> <?=$this->session->flashdata('alert')?>					  	
         </div>
         <?php } ?>
      </div>


      <div class="col-lg-12">
         <div class="col-lg-6">
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
               <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"  action="<?=base_url()?>index.php/admin/update_mode_of_payment_party_click/<?=$row->m07_id?>" method="post"  data-valid>
                  <div class="m-portlet__body">	
                     <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">Full Name:</label>
                        <div class="col-lg-6">
                           <input type="text" name="name" class="form-control m-input m-form--state" data-required-text-min-length="3" placeholder="mode of payment" value="<?=$row->m07_mode?>">
                           <span class="m-form__help">Please enter mode of payment <span style="color:red">*</span></span>
                        </div> 
                     </div>	
                  </div>
                  <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                     <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                           <div class="col-lg-5"></div>
                           <div class="col-lg-7">
                              <button type="submit" class="btn btn-brand"  disabled="disabled">Update   </button>
                              <a type="reset" class="btn btn-secondary" href="<?=base_url()?>index.php/admin/add_mode_of_payment_party">Cancel</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
               <!--end::Form-->
            </div>
            <!--end::Portlet-->
         </div>

      </div>
   </div>
</div> 