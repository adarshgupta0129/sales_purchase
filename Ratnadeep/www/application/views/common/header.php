<!DOCTYPE html>

<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

   <head>
      <meta charset="utf-8" />

      <title>
         <?=$page_title?>
      </title>
      <meta name="description" content="Jqvmap examples">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

      <!--begin::Web font -->
      <script src="<?=base_url()?>assets/webfont/1.6.16/webfont.js"></script>
      <script>window.addEventListener("load", function() { document.getElementsByClassName('btn').disabled = false; }, false); </script>
      <!--      <script>
WebFont.load({
google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
active: function() {
sessionStorage.fonts = true;
}
});
</script>-->

      <style>

         input[type=number]::-webkit-inner-spin-button, 
         input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0; 
         }
.m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item>.m-menu__heading .m-menu__link-text, .m-aside-menu.m-aside-menu--skin-dark .m-menu__nav>.m-menu__item>.m-menu__link .m-menu__link-text {
     font-size: 16px;
}
#m_aside_header_menu_mobile_toggle{
   display:none!important;
}
@media only screen and (min-width: 1025px) {
.company_logo
   {
   width:150%;
   margin-top:-14px;
   float: none;
   }
}

@media only screen and (max-width:1024px) {
.company_logo
   {
   width:36%;
   margin-top:-14px;
   float: none;
   }
}
  
      </style>
      <!--end::Web font -->

      <!--begin::Global Theme Styles -->
      <link href="<?=base_url()?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
      <link href="<?=base_url()?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
      <!--end::Global Theme Styles -->

      <!--begin::Page Vendors Styles -->
      <link href="<?=base_url()?>assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
      <!--end::Page Vendors Styles -->


      <?php if($this->router->fetch_method() =='sales' || $this->router->fetch_method() =='purchase' || $this->router->fetch_method() =='update_purchase' || $this->router->fetch_method() =='update_sales'|| $this->router->fetch_method() =='credit_debit_entry'|| $this->router->fetch_method() =='update_credit_debit_entry' || $this->router->fetch_method() =='ledger' || $this->router->fetch_method() =='ledger_click' || $this->router->fetch_method() =='add_sales_party'|| $this->router->fetch_method() =='update_sales_party' || $this->router->fetch_method() =='add_purchase_party' || $this->router->fetch_method() =='update_purchase_party' || $this->router->fetch_method() =='update_mode_of_payment_party'|| $this->router->fetch_method() =='add_mode_of_payment_party' || $this->router->fetch_method() =='add_transport_party' || $this->router->fetch_method() =='update_transport_party' || $this->router->fetch_method() =='dashboard' ){ ?>
      <script src="<?=base_url()?>assets/app/js/jquery-v-3.3.1.min.js" type="text/javascript"></script>
      <script> var baseurl= "<?=base_url()?>" </script>
      <script>
$(document).ready(function(){
  $(":button,:submit").removeAttr("disabled");  
});
    </script>
      <?php } ?> 

      <link rel="shortcut icon" href="<?=base_url()?>assets/invoice/logo.png" />
   </head>
   <!-- end::Head -->
   <!-- begin::Body -->

   <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">



      <!-- begin:: Page -->u
      <div class="m-grid m-grid--hor m-grid--root m-page">

         <header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
            <div class="m-container m-container--fluid m-container--full-height">
               <div class="m-stack m-stack--ver m-stack--desktop">
                  <!-- BEGIN: Brand -->
                  <div class="m-stack__item m-brand  m-brand--skin-dark ">
                     <div class="m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-stack__item--middle m-brand__logo">
                           <a href="javascript:void(0)" class="m-brand__logo-wrapper">
                              <img alt="" class="company_logo" src="<?=base_url()?>assets/logo1.png" />
                           </a>
                        </div>
                        <div class="m-stack__item m-stack__item--middle m-brand__tools">

                           <!-- BEGIN: Left Aside Minimize Toggle -->
                           <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
                              <span></span>
                           </a>
                           <!-- END -->

                           <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                           <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                              <span></span>
                           </a>
                           <!-- END -->



                           <!-- BEGIN: Responsive Header Menu Toggler -->
                           <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                              <span></span>
                           </a>
                           <!-- END -->


                           <!-- BEGIN: Topbar Toggler -->
                           <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                              <i class="flaticon-more"></i>
                           </a>
                           <!-- BEGIN: Topbar Toggler -->
                        </div>
                     </div>
                  </div>
                  <!-- END: Brand -->
                  <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                     <!-- BEGIN: Horizontal Menu -->
                     <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>


                     <!-- END: Horizontal Menu -->
                     <!-- BEGIN: Topbar -->
                     <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">


                        <div class="m-stack__item m-topbar__nav-wrapper">
                           <ul class="m-topbar__nav m-nav m-nav--inline">

                              <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                 <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-topbar__userpic">
                                       <img src="<?=base_url()?>assets/invoice/logo.png" class="m--img-rounded m--marginless" alt="" />
                                    </span>
                                    <span class="m-topbar__username m--hide" style="color:black"><?$name?></span>
                                 </a>
                                 <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                       <div class="m-dropdown__header m--align-center" style="background: url(); background-size: cover;">
                                          <div class="m-card-user m-card-user--skin-dark">
                                             <div class="m-card-user__pic">
                                                <img src="<?=base_url()?>assets/invoice/logo.png" class="m--img-rounded m--marginless" alt="" />
                                                <!--
<span class="m-type m-type--lg m--bg-danger"><span class="m--font-light">S<span><span>
-->
                                             </div>
                                             <div class="m-card-user__details">
                                                <span class="m-card-user__name m--font-weight-500" style="color:black"> <?=$name?></span>
                                                <a href="#" class="m-card-user__email m--font-weight-300 m-link"><?=$email?></a>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="m-dropdown__body">
                                          <div class="m-dropdown__content">
                                             <ul class="m-nav m-nav--skin-light">
                                                <li class="m-nav__section m--hide">
                                                   <span class="m-nav__section-text">Section</span>
                                                </li>
                                                <li class="m-nav__item">
                                                   <a href="<?=base_url()?>index.php/admin/admin_detail" class="m-nav__link">
                                                      <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                      <span class="m-nav__link-title">
                                                         <span class="m-nav__link-wrap">
                                                            <span class="m-nav__link-text">My Profile</span>
                                                         </span>
                                                      </span>
                                                   </a>
                                                </li>
                                                <li class="m-nav__item">
                                                   <a href="#" class="m-nav__link">

                                                      <span class="m-nav__link-text"></span>
                                                   </a>
                                                </li>

                                                <li class="m-nav__item">
                                                   <a href="<?=base_url()?>index.php/admin/logout" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>


                           </ul>
                        </div>
                     </div>
                     <!-- END: Topbar -->
                  </div>
               </div>
            </div>
         </header>
