
</div>


</div>
<!-- end:: Body -->
<!-- begin::Footer -->
<footer class="m-grid__item		m-footer ">
   <div class="m-container m-container--fluid m-container--full-height m-page__container">
      <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
         <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
            <span class="m-footer__copyright">
               <?php echo date('Y');?> &copy; Developed by <a href="http://jcasptechnologies.com" class="m-link">JCasp Technologies</a>
            </span>
         </div>
      </div>
   </div>
</footer>
<!-- end::Footer -->

</div>



<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
   <i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->
<script>

   var baseurl = "<?=base_url()?>";
   <?php if($this->router->fetch_method() !='dashboard'){ ?>
   $('.m-form__help').hide();
   <?php } ?>

   <?php if($this->router->fetch_method() !='update_sales' && $this->router->fetch_method() !='update_purchase' && $this->router->fetch_method() !='update_credit_debit_entry'){?>
   setTimeout(function() {
      $(".alert").hide()
   }, 3000);
   <?php } ?>


</script>



<!--begin::Global Theme Bundle -->
<script src="<?=base_url()?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<!--end::Global Theme Bundle -->



<?php if($this->router->fetch_method() =='dashboard'){ ?>

<!--begin::Page Vendors -->
<script src="<?=base_url()?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
<!--end::Page Vendors -->

<!--begin::Page Scripts -->
<script src="<?=base_url()?>assets/app/js/dashboard.js" type="text/javascript"></script>

<!--end::Page Scripts -->

<?php } ?>

<script src="<?=base_url()?>assets/demo/default/custom/components/base/sweetalert2.js" type="text/javascript"></script>
<?php if($this->router->fetch_method() =='sales' || $this->router->fetch_method() =='purchase' || $this->router->fetch_method() =='update_purchase' || $this->router->fetch_method() =='update_sales'|| $this->router->fetch_method() =='credit_debit_entry'|| $this->router->fetch_method() =='update_credit_debit_entry' || $this->router->fetch_method() =='ledger' || $this->router->fetch_method() =='ledger_click' ){ ?>


<script src="<?=base_url()?>assets/demo/default/custom/crud/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>




<?php } ?>

<?php if($this->router->fetch_method() =='ledger' || $this->router->fetch_method() =='ledger_click' ){ ?>
<script src="<?=base_url()?>assets/demo/default/custom/crud/forms/widgets/bootstrap-daterangepicker.js" type="text/javascript"></script>
<?php } ?>

<script src="<?=base_url()?>assets/demo/default/custom/crud/forms/validation/form-controls.js" type="text/javascript"></script>


<?php if($this->router->fetch_method() !='dashboard'){ ?>
<script src="<?=base_url()?>assets/custom_validation/valid.js" type="text/javascript"></script>
<?php } ?>

<!--begin::Page Scripts -->


<?php if($this->router->fetch_method() =='ledger' || $this->router->fetch_method() =='ledger_click'){ ?>
<script src="<?=base_url()?>assets/app/js/ledger_buttons.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/app/js/datatables_bundles_ledger.js" type="text/javascript"></script>
<?php } else{ ?>
<script src="<?=base_url()?>assets/demo/default/custom/crud/datatables/extensions/buttons.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<?php } ?>

<script src="<?=base_url()?>assets/demo/default/custom/crud/datatables/basic/scrollable.js" type="text/javascript"></script>

<!--end::Page Scripts -->
