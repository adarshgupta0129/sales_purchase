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
   </div>



   <div class="row">
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
            <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"  action="<?=base_url()?>index.php/admin/add_transport_party_click" method="post"  data-valid>
               <div class="m-portlet__body">	
                  <div class="form-group m-form__group row">
                     <label class="col-lg-3 col-form-label">Transporter Name:</label>
                     <div class="col-lg-6">
                        <input type="text" name="name" class="form-control m-input m-form--state name" data-required-text-min-length="3" placeholder="Full name">
                        <span class="m-form__help">Please enter your full name <span style="color:red">*</span></span>
                     </div> 
                  </div>	
               </div>
               <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                  <div class="m-form__actions m-form__actions--solid">
                     <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-7">
                           <button type="submit" id="validate_button" class="btn btn-brand">Submit</button>
                           <!--<button type="reset" class="btn btn-secondary">Cancel</button>-->
                        </div>
                     </div>
                  </div>
               </div>
            </form>
            <!--end::Form-->
         </div>
         <!--end::Portlet-->
      </div>

      <div class="col-lg-6">

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
                        <th>Date</th>
                     </tr>
                  </thead>

                  <tbody>

                     <?php $i=1; foreach($rows as $row){ ?>
                     <tr>
                        <td><?php echo $i++;?></td>
                        <td class="delete_data">
                           <a href="<?=base_url()?>index.php/admin/update_transport_party/<?=$row->m04_id?>" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                              <i class="la la-edit"></i>
                           </a><a id="delete_data" href="<?=base_url()?>index.php/admin/delete_transport_party/<?=$row->m04_id?>" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                           <i class="la la-trash"></i>
                           </a>
                        </td>
                        <td><?=$row->m04_name?></td>
                        <td><?=$row->m04_date?></td>

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
 
 