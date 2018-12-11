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
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"  action="<?=base_url()?>index.php/admin/update_purchase_party_click/<?=$row->m02_id?>" method="post" data-valid>
               <div class="m-portlet__body">	
                  <div class="form-group m-form__group row">
                     <label class="col-lg-1 col-form-label">Full Name:</label>
                     <div class="col-lg-3">
                        <input type="text" name="name" id="name" data-required-text-min-length="3" class="form-control m-input m-form--state" placeholder="Full name"  value="<?=$row->m02_name?>">
                        <span class="m-form__help">Please enter your full name <span style="color:red">*</span></span>
                     </div>
                     <label class="col-lg-1 col-form-label">Email:</label>
                     <div class="col-lg-3">
                        <input type="text" name="email" data-email id="email" class="form-control m-input" placeholder="Email" value="<?=$row->m02_email?>">
                        <span class="m-form__help">Please enter your email</span>
                     </div>
                     <label class="col-lg-1 col-form-label">Mobile No.:</label>
                     <div class="col-lg-3">
                        <input type="text" name="mobile" data-mobile id="mobile" class="form-control m-input" placeholder="Mobile Number"  value="<?=$row->m02_mobile?>">
                        <span class="m-form__help">Please enter your mobile number </span>
                     </div>
                  </div>	


                  <div class="form-group m-form__group row">
                     <label class="col-lg-1 col-form-label">Phone No.:</label>
                     <div class="col-lg-3">
                        <input type="text" data-phone name="phone" id="phone" class="form-control m-input" placeholder="Phone Number" value="<?=$row->m02_phone?>">
                        <span class="m-form__help">Please enter your phone number (if any)</span>
                     </div>
                     <label class="col-lg-1 col-form-label">GSTIN:</label>
                     <div class="col-lg-3">
                        <input type="text" name="gstin" data-required  data-gstin id="gstin" class="form-control m-input" placeholder="GSTIN"  value="<?=$row->m02_gstin?>">
                        <span class="m-form__help">Please enter your GSTIN <span style="color:red">*</span></span>
                     </div>
                     <label class="col-lg-1 col-form-label">CIN:</label>
                     <div class="col-lg-3">
                        <input type="text" name="cin"  data-max-length="21" id="cin" class="form-control m-input" placeholder="CIN" value="<?=$row->m02_cin?>">
                        <span class="m-form__help">Please enter your CIN</span>
                     </div>
                  </div>	


                  <div class="form-group m-form__group row">
                     <label class="col-lg-1 col-form-label">HSN:</label>
                     <div class="col-lg-3">
                        <input type="number" name="hsn"  data-max-length="6" id="hsn" class="form-control m-input" placeholder="HSN"  oninput="validity.valid||(value='');" min="0" value="<?=$row->m02_hsn?>">
                        <span class="m-form__help">Please enter your HSN</span>
                     </div>
                     <label class="col-lg-1 col-form-label">PAN:</label>
                     <div class="col-lg-3">
                        <input type="text" name="pan"id="pan" class="form-control m-input" placeholder="PAN" value="<?=$row->m02_pan?>" data-pan>
                        <span class="m-form__help">Please enter your PAN</span>
                     </div>
                     <label class="col-lg-1 col-form-label">Country:</label>
                     <div class="col-lg-3">
                        <input type="text" name="country" id="country" data-required-text-min-length="3" class="form-control m-input" placeholder="Country"  value="<?=$row->m02_country?>">
                        <span class="m-form__help">Please enter your county (By default India) <span style="color:red">*</span> </span>
                     </div>
                  </div>	


                  <div class="form-group m-form__group row">
                     <label class="col-lg-1 col-form-label">Address:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control m-input" data-required data-min-length="3" id="address" name="address" placeholder="Address" value="<?=$row->m02_address?>">
                        <span class="m-form__help">Please enter your address <span style="color:red">*</span></span>
                     </div>
                     <label class="col-lg-1 col-form-label">Landmark1:</label>
                     <div class="col-lg-3">
                        <input type="text" name="landmark1" id="landmark1" data-min-length-only="3" class="form-control m-input" placeholder="Landmark 1"value="<?=$row->m02_landmark1?>" >
                        <span class="m-form__help">Please enter your first landmark </span>
                     </div>
                     <label class="col-lg-1 col-form-label">Landmark2:</label>
                     <div class="col-lg-3">
                        <input type="text" name="landmark2"  data-min-length-only="3" id="landmark2" class="form-control m-input" placeholder="Landmark 2" value="<?=$row->m02_landmark2?>" >
                        <span class="m-form__help">Please enter your second landmark </span>
                     </div>
                  </div>	


                  <div class="form-group m-form__group row">
                     <label class="col-lg-1 col-form-label">State:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control m-input" data-required-text-not-required  data-min-length-only="3"  name="state"id="state" placeholder="State" value="<?=$row->m02_state?>">
                        <span class="m-form__help">Please enter your state  (by default Mumbai) <span style="color:red">*</span></span>
                     </div>
                     <label class="col-lg-1 col-form-label">City:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control m-input" data-required-text-min-length="3" name="city" id="city" placeholder="City"  value="<?=$row->m02_city?>">
                        <span class="m-form__help">Please enter your city *</span>
                     </div>
                     <label class="col-lg-1 col-form-label">PIN Code:<span style="color:red">*</span></label>
                     <div class="col-lg-3">
                        <input type="text" maxlength="6" class="form-control m-input"  name="pincode" id="pincode" placeholder="PIN Code" data-required-number-min-length='5'  value="<?=$row->m02_pincode?>">
                        <span class="m-form__help">Please enter your PIN code <span style="color:red">*</span></span>
                     </div>
                  </div>	

               </div>
               <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                  <div class="m-form__actions m-form__actions--solid">
                     <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-7">
                           <button type="submit" class="btn btn-brand" id="validate_button"  disabled="disabled">Update  </button>
                           <a type="reset" href="<?=base_url()?>index.php/admin/add_purchase_party" class="btn btn-secondary">Cancel</a>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <!--end::Form-->
         </div>
         <!--end::Portlet-->





         <!-- END EXAMPLE TABLE PORTLET-->	


      </div>
   </div>
</div>

 
