
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
            </div>


            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="<?=base_url()?>index.php/admin/admin_detail_click" method="post" data-valid-admin >
               <div class="m-portlet__body">	
                  <div class="form-group m-form__group row">
                     <label class="col-lg-2 col-form-label">Username:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control m-input" placeholder="your username" data-required-username value="<?=$login->email?>" name="username" id="username">
                        <span class="m-form__help">Please enter your username</span>
                     </div>
                     <label class="col-lg-2 col-form-label">Password: <span style="color:red">*</span></label>
                     <div class="col-lg-3">
                        <div class="input-group date">
                           <input type="password" class="form-control m-input" id="password_hidden" data-required-password placeholder="your password" name="password" value="<?=$login->password?>">
                           <div class="input-group-append" id="show_password" title="Show Password">
                              <i class="input-group-text flaticon-eye"></i> 
                           </div>

                        </div>
                        <span class="m-form__help">Please enter your password</span>
                     </div>
                  </div>	           
               </div>
               <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                  <div class="m-form__actions m-form__actions--solid">
                     <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                           <button type="submit" class="btn btn-success">Update</button>
                           <button type="reset" class="btn btn-secondary" onClick="window.location.reload()">Cancel</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <!--end::Form-->
         </div>




         <div class="m-portlet">
            <div class="m-portlet__head">
               <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                     <span class="m-portlet__head-icon m--hide">
                        <i class="la la-gear"></i>
                     </span>
                     <h3 class="m-portlet__head-text">
                        <?=$page_heading2?>
                     </h3>
                  </div>
               </div>
            </div>


            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="<?=base_url()?>index.php/admin/admin_invoice_detail_click" method="post" data-valid >
               <div class="m-portlet__body">	
                  <div class="form-group m-form__group row">
                     <label class="col-lg-2 col-form-label">Name:<span style="color:red">*</span></label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control m-input" placeholder=" full name"  data-required-text-min-length="3" value="<?=$login->name?>" name="name" id="name">
                        <span class="m-form__help">Please enter your name</span>
                     </div>
                     <label class="col-lg-2 col-form-label">Manufacturer:<span style="color:red">*</span></label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control m-input" placeholder=" manufacturer" data-required-text-min-length="3" id="manufacturer" name="manufacturer"  value="<?=$login->manufacturer?>">
                        <span class="m-form__help">Please enter manufacturer</span>
                        <div class="input-group-append" title="Show Password">
                        </div>
                     </div>
                  </div>


                  <div class="form-group m-form__group row">
                     <label class="col-lg-2 col-form-label">Bank:<span style="color:red">*</span></label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control m-input" placeholder="Enter bank name" data-required-text-min-length="3" value="<?=$login->bank?>" name="bank" id="bank">

                        <span class="m-form__help">Please enter your bank name</span>
                     </div>
                     <label class="col-lg-2 col-form-label">Account No.:<span style="color:red">*</span></label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control m-input" placeholder=" your bank account number" id="account" data-account  name="account"  value="<?=$login->account?>">
                        <span class="m-form__help">Please enter manufacturer</span>
                        <div class="input-group-append" >
                        </div>
                     </div>
                  </div>

                  <div class="form-group m-form__group row">
                     <label class="col-lg-2 col-form-label">IFSC:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control m-input" placeholder=" ifsc" data-required-ifsc value="<?=$login->ifsc?>" name="ifsc" id="ifsc">
                        <span class="m-form__help">Please enter your IFSC</span>
                     </div>
                     <label class="col-lg-2 col-form-label">Branch:<span style="color:red">*</span></label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control m-input" placeholder=" your branch" data-required-text-min-length="3" name="branch" id="branch"  value="<?=$login->branch?>">
                        <span class="m-form__help">Please enter your branch</span>
                        <div class="input-group-append" >
                        </div>

                     </div>
                  </div>

                  <div class="form-group m-form__group row">
                     <label class="col-lg-2 col-form-label">GSTIN:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control m-input" placeholder=" GSTIN" data-required data-gstin  value="<?=$login->gstin?>" name="gstin" id="gstin">
                        <span class="m-form__help">Please enter your GSTIN</span>
                     </div>
                     <label class="col-lg-2 col-form-label">Address:</label>
                     <div class="col-lg-3">

                        <input type="text" class="form-control m-input" placeholder=" your address" data-required name="address" id="address"  value="<?=$login->address?>">
                        <span class="m-form__help">Please enter your address</span>
                        <div class="input-group-append">

                        </div>

                     </div>
                  </div>


               </div>
               <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                  <div class="m-form__actions m-form__actions--solid">
                     <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                           <button type="submit" class="btn btn-success">Update</button>
                           <button type="reset" class="btn btn-secondary" onClick="window.location.reload()">Cancel</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <!--end::Form-->
         </div>


         <!--begin::Portlet-->
         <div class="m-portlet">
            <div class="m-portlet__head">
               <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                     <span class="m-portlet__head-icon m--hide">
                        <i class="la la-gear"></i>
                     </span>
                     <h3 class="m-portlet__head-text">
                        <?=$page_heading3?>
                     </h3>
                  </div>
               </div>
            </div>


            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="<?=base_url()?>index.php/admin/admin_terms_and_conditions_click" method="post" data-valid >
               <div class="m-portlet__body">	
                  <div class="form-group m-form__group row">
                     <label class="col-lg-2 col-form-label">T & C:</label>
                     <div class="col-lg-3">
                        <textarea class="form-control m-input m-input--air" name="tandc" id="tandc"  rows="4"><?=$login->tandc?></textarea>
                        <span class="m-form__help">Please enter your terms and conditions</span>
                     </div>
                     <label class="col-lg-2 col-form-label">Disclaimer:</label>
                     <div class="col-lg-3">
                        <div class="input-group date">
                           <textarea class="form-control m-input m-input--air" name="disclaimer" id="disclaimer"  rows="4"><?=$login->disclaimer?></textarea>
                        </div>
                        <span class="m-form__help">Please enter your disclaimer</span>
                     </div>
                  </div>	           
               </div>
               <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                  <div class="m-form__actions m-form__actions--solid">
                     <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                           <button type="submit" class="btn btn-success" >Submit</button>
                           <button type="reset" class="btn btn-secondary" onClick="window.location.reload()">Cancel</button>
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

   document.getElementById("show_password").style.cursor = "pointer";
   document.getElementById('show_password').onclick = function()
   {document.getElementById('password_hidden').setAttribute('type','text')} ;



</script>