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
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"  action="<?=base_url()?>index.php/admin/add_sales_party_click" method="post" data-valid autocomplete="off">
               <div class="m-portlet__body">	


                  <div class="form-group m-form__group row">
                     <label class="col-lg-1 col-form-label">Full Name:<span style="color:red">*</span></label>
                     <div class="col-lg-3">
                        <input type="text" name="name"  data-required-text-min-length="3" id="name" class="form-control m-input  name" placeholder="Full name">
                        <span class="m-form__help">Please enter your full name <span style="color:red">*</span></span>
                     </div>
                     <label class="col-lg-1 col-form-label">Email:</label>
                     <div class="col-lg-3">
                        <input type="text" name="email" id="email"  data-email class="form-control m-input" placeholder="Email">
                        <span class="m-form__help">Please enter your email</span>
                     </div>
                     <label class="col-lg-1 col-form-label">Mobile No.:</label>
                     <div class="col-lg-3">
                        <input type="text" name="mobile" data-mobile id="mobile" class="form-control m-input" placeholder="Mobile Number" >
                        <span class="m-form__help">Please enter your mobile number</span>
                     </div>
                  </div>	


                  <div class="form-group m-form__group row">
                     <label class="col-lg-1 col-form-label">Phone No.:</label>
                     <div class="col-lg-3">
                        <input type="text" name="phone" data-phone id="phone" class="form-control m-input" placeholder="Phone Number">
                        <span class="m-form__help">Please enter your phone number (if any)</span>
                     </div>
                     <label class="col-lg-1 col-form-label">GSTIN:</label>
                     <div class="col-lg-3">
                        <input type="text" name="gstin"  data-required data-gstin id="gstin" class="form-control m-input gstin" placeholder="GSTIN">
                        <span class="m-form__help">Please enter your GSTIN <span style="color:red">*</span></span>
                     </div>
                     <label class="col-lg-1 col-form-label">CIN:</label>
                     <div class="col-lg-3">
                        <input type="text" name="cin"id="cin" data-max-length="21" class="form-control m-input" placeholder="CIN">
                        <span class="m-form__help">Please enter your CIN</span>
                     </div>
                  </div>	


                  <div class="form-group m-form__group row">
                     <label class="col-lg-1 col-form-label">HSN:</label>
                     <div class="col-lg-3">
                        <input type="number" name="hsn" id="hsn" data-max-length="6"  class="form-control m-input" placeholder="HSN">
                        <span class="m-form__help">Please enter your HSN</span>
                     </div>
                     <label class="col-lg-1 col-form-label">PAN:</label>
                     <div class="col-lg-3">
                        <input type="text" name="pan" id="pan" class="form-control m-input" placeholder="PAN" data-pan>
                        <span class="m-form__help">Please enter your PAN</span>
                     </div>
                     <label class="col-lg-1 col-form-label">Country:<span style="color:red">*</span></label>
                     <div class="col-lg-3">
                        <input type="text" name="country"  data-required-text-min-length="3" id="country" class="form-control m-input country" placeholder="Country" value="India">
                        <span class="m-form__help">Please enter your county (By default India) <span style="color:red">*</span> </span>
                     </div>
                  </div>	


                  <div class="form-group m-form__group row">
                     <label class="col-lg-1 col-form-label">Address:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control m-input address" data-required data-min-length="3" id="address"  name="address" placeholder="Address" >
                        <span class="m-form__help">Please enter your address <span style="color:red">*</span></span>
                     </div>
                     <label class="col-lg-1 col-form-label">Landmark1:</label>
                     <div class="col-lg-3">
                        <input type="text" name="landmark1" data-min-length-only="3" class="form-control m-input" id="landmark1" placeholder="Landmark 1" >
                        <span class="m-form__help">Please enter your first landmark </span>
                     </div>
                     <label class="col-lg-1 col-form-label">Landmark2:</label>
                     <div class="col-lg-3">
                        <input type="text" name="landmark2" data-min-length-only="3" class="form-control m-input" id="landmark2" placeholder="Landmark 2"  >
                        <span class="m-form__help">Please enter your second landmark </span>
                     </div>
                  </div>


                  <div class="form-group m-form__group row">
                     <label class="col-lg-1 col-form-label">State:</label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control m-input state"  data-text-not-required="3" name="state" id="state" placeholder="State"  value="Maharashtra"  >
                        <span class="m-form__help">Please enter your state  (by default Mumbai) </span>
                     </div>
                     <label class="col-lg-1 col-form-label">City:<span style="color:red">*</span></label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control m-input city"  data-required-text-min-length="3"  name="city" id="city" placeholder="City" >
                        <span class="m-form__help">Please enter your city <span style="color:red">*</span></span>
                     </div>
                     <label class="col-lg-1 col-form-label">PIN Code:<span style="color:red">*</span></label>
                     <div class="col-lg-3">
                        <input type="text" class="form-control m-input pincode"  name="pincode"  data-required-number-min-length='5'   id="pincode" placeholder="PIN Code" >
                        <span class="m-form__help">Please enter your PIN code <span style="color:red">*</span></span>
                     </div>
                  </div>	

               </div>
               <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                  <div class="m-form__actions m-form__actions--solid">
                     <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-7">
                           <button type="submit" class="btn btn-brand" id="validate_button" disabled="disabled">Submit</button>
                           <!-- <button type="reset" class="btn btn-secondary">Cancel</button>-->
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <!--end::Form-->
         </div>
         <!--end::Portlet-->




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
                        <th>S No.</th>
                        <th>Action</th>
                        <th>Name</th>
                        <th>GSTIN</th>
                        <th>Address</th>
                        <th>Landmark1</th>
                        <th>Landmark2</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>City</th>
                        <th>PIN Code</th> 
                        <th>Email</th>
                        <th>Mobile No.</th>
                        <th>Phone No.</th> 
                        <th>CIN</th>
                        <th>HSN</th>
                        <th>PAN</th>
                     </tr>
                  </thead>

                  <tbody>

                     <?php $i=1; foreach($rows as $row){ ?>
                     <tr>
                        <td><?php echo $i++;?></td>
                        <td  class="delete_data">
                           <a href="<?=base_url()?>index.php/admin/update_sales_party/<?=$row->m03_id?>" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                              <i class="la la-edit"></i>
                           </a><a  id="delete_data" href="<?=base_url()?>index.php/admin/delete_sales_party/<?=$row->m03_id?>" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                           <i class="la la-trash"></i>
                           </a>
                        </td>
                        <td><?=$row->m03_name?></td>
                        <td><?=$row->m03_gstin?></td>
                        <td><?=$row->m03_address?></td>
                        <td><?=$row->m03_landmark1?></td>
                        <td><?=$row->m03_landmark2?></td>
                        <td><?=$row->m03_country?></td>
                        <td><?=$row->m03_state?></td>
                        <td><?=$row->m03_city?></td>
                        <td><?=$row->m03_pincode?></td>
                        <td><?=$row->m03_email?></td>
                        <td><?=$row->m03_mobile?></td>
                        <td><?=$row->m03_phone?></td>
                        <td><?=$row->m03_cin?></td>
                        <td><?=$row->m03_hsn?></td>
                        <td><?=$row->m03_pan?></td>
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


 
