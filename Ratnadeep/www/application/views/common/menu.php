<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

   <!-- BEGIN: Left Aside -->
   <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>

   <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
      <!-- BEGIN: Aside Menu -->
      <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
         <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
               <a href="<?=base_url()?>index.php/admin/dashboard" class="m-menu__link ">
                  <i class="m-menu__link-icon flaticon-line-graph"></i>
                  <span class="m-menu__link-title"> 
                     <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">Dashboard</span>
                        <span class="m-menu__link-badge">
                        </span>
                     </span>
                  </span>
               </a>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
               <a href="<?=base_url()?>index.php/admin/admin_detail" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon flaticon-user"></i>
                  <span class="m-menu__link-text">Admin Details</span>
               </a>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
               <a href="<?=base_url()?>index.php/admin/add_purchase_party" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon flaticon-user-add"></i>
                  <span class="m-menu__link-text">Add Purchase Party</span>
               </a>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
               <a href="<?=base_url()?>index.php/admin/add_sales_party" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon flaticon-user-add"></i>
                  <span class="m-menu__link-text">Add Sales Party</span>
               </a>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
               <a href="<?=base_url()?>index.php/admin/purchase" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon flaticon-edit"></i>
                  <span class="m-menu__link-text">Add Purchase Invoice</span>
               </a>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
               <a href="<?=base_url()?>index.php/admin/sales" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon flaticon-edit"></i>
                  <span class="m-menu__link-text">Add Sales Invoice</span>
               </a>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
               <a href="<?=base_url()?>index.php/admin/add_transport_party" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon flaticon-user-add"></i>
                  <span class="m-menu__link-text">Add Transport Party</span>
               </a>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
               <a href="<?=base_url()?>index.php/admin/add_mode_of_payment_party" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon flaticon-user-add"></i>
                  <span class="m-menu__link-text">Mode of Payment</span>
               </a>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
               <a href="<?=base_url()?>index.php/admin/credit_debit_entry" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon flaticon-edit"></i>
                  <span class="m-menu__link-text">Credit/Debit Entry</span>
               </a>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
               <a href="<?=base_url()?>index.php/admin/ledger" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon flaticon-eye"></i>
                  <span class="m-menu__link-text">View Ledger</span>
               </a>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
               <a href="<?=base_url()?>index.php/admin/download_db" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon flaticon-download"></i>
                  <span class="m-menu__link-text">Download DB</span>
               </a>
            </li>

            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
               <a href="<?=base_url()?>index.php/admin/logout" class="m-menu__link m-menu__toggle">
                  <i class="m-menu__link-icon flaticon-lock"></i>
                  <span class="m-menu__link-text">Logout</span>
               </a>
            </li>

         </ul>
      </div>
      <!-- END: Aside Menu -->
   </div>
   <!-- END: Left Aside -->
   <div class="m-grid__item m-grid__item--fluid m-wrapper">

      <!-- BEGIN: Subheader -->
      <div class="m-subheader ">
         <div class="d-flex align-items-center">
            <div class="mr-auto">
               <h3 class="m-subheader__title "><?=$page_title?></h3>
            </div>
            <div>
               <span class="m-subheader__daterange" >
                  <span class="m-subheader__daterange-label">
                     <span class="m-subheader__daterange-label">
                        <span class="m-subheader__daterange-title">Date:</span>
                        <span class="m-subheader__daterange-date m--font-brand"><?php echo date("l jS \of F ") ?></span>
                     </span>
                  </span>
               </span>
            </div>
         </div>
      </div>