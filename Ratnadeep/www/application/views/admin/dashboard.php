


<div class="m-content">

   <!--Begin::Section-->
   <div class="m-portlet">
      <div class="m-portlet__body  m-portlet__body--no-padding">
         <div class="row m-row--no-padding m-row--col-separator-xl">
            <div class="col-xl-4">
               <!--begin:: Widgets/Blog-->
               <div class="m-portlet m-portlet--head-overlay m-portlet--full-height  m-portlet--rounded-force">
                  <div class="m-portlet__head m-portlet__head--fit-">
                     <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                           <h3 class="m-portlet__head-text m--font-light">
                              Total Sales
                           </h3>
                        </div>
                     </div>

                  </div>
                  <div class="m-portlet__body">
                     <div class="m-widget27 m-portlet-fit--sides">
                        <div class="m-widget27__pic">
                           <img src="<?=base_url()?>assets/bg-4.jpg" alt="">
                           <h3 class="m-widget27__title m--font-light">
                              <span><span>₹</span><span id="total_sales"></span></span>
                           </h3>
                           <div class="m-widget27__btn">
                              <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--bolder">Inclusive All Items</button>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
               <!--end:: Widgets/Blog-->


            </div>
            <div class="col-xl-4">
               <!--begin:: Widgets/Blog-->
               <div class="m-portlet m-portlet--head-overlay m-portlet--full-height  m-portlet--rounded-force">
                  <div class="m-portlet__head m-portlet__head--fit-">
                     <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                           <h3 class="m-portlet__head-text m--font-light">
                              Total Purchase
                           </h3>
                        </div>
                     </div>

                  </div>
                  <div class="m-portlet__body">
                     <div class="m-widget27 m-portlet-fit--sides">
                        <div class="m-widget27__pic">
                           <img src="<?=base_url()?>assets/bg-1.jpg" alt="">
                           <h3 class="m-widget27__title m--font-light">
                              <span><span>₹</span><span id="total_purchase"></span></span>
                           </h3>
                           <div class="m-widget27__btn">
                              <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--bolder">Inclusive All Items</button>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
               <!--end:: Widgets/Blog-->


            </div>
            <div class="col-xl-4">
               <!--begin:: Widgets/Profit Share-->
               <div class="m-widget14">
                  <div class="m-widget14__header">
                     <h3 class="m-widget14__title">
                        Profit Share
                     </h3>
                     <span class="m-widget14__desc">
                        Profit Share between sales and purchase
                     </span>
                  </div>
                  <div class="row  align-items-center">
                     <div class="col">
                        <div id="m_chart_profit_share" class="m-widget14__chart" style="height: 160px">
                           <!--       <div class="m-widget14__stat">45</div>-->
                        </div>
                     </div>
                     <div class="col">
                        <div class="m-widget14__legends">
                           <div class="m-widget14__legend">
                              <span class="m-widget14__legend-bullet m--bg-accent"></span>
                              <span class="m-widget14__legend-text">Sales</span>
                           </div>
                           <div class="m-widget14__legend">
                              <span class="m-widget14__legend-bullet m--bg-warning"></span>
                              <span class="m-widget14__legend-text">Purchase</span>
                           </div>
                           <div class="m-widget14__legend">
                              <span class="m-widget14__legend-bullet m--bg-brand"></span>
                              <span class="m-widget14__legend-text">Others</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--end:: Widgets/Profit Share-->
            </div>
         </div>
      </div>
   </div>
   <!--End::Section-->

   <!--Begin::Section-->
   <div class="row">
      <div class="col-xl-12">

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
                        <th>Sr No.</th>
                        <th>Action</th>
                        <th>Invoice No.</th>
                        <th>Name</th> 
                        <th>GSTIN</th> 
                        <th>Amount</th>
                        <th>Date</th>
                        <th>State</th>
                        <th>City</th>
                        <th>PIN Code</th>
                        <th>Landmark</th>
                        <th>L. R. No.</th>
                        <th>Amount in Words</th>
                        <th>Extra Comments</th>
                     </tr>
                  </thead>

                  <tbody>
                     <?php $i=1; foreach($rows as $row){ ?>
                     <tr>
                        <td><?php echo $i++;?></td>
                        <td class="delete_data" nowrap>
                           <span class="dropdown" title="Print">
                              <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">
                                 <i class="la la-ellipsis-h"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-32px, 26px, 0px);">
                                 <a class="dropdown-item" href="<?=base_url()?>index.php/admin/print_sales_invoice/<?=$row->m06_invoice_no?>/<?=$row->m06_id?>/1"><i class="la la-print"></i> Original Copy</a>
                                 <a class="dropdown-item" href="<?=base_url()?>index.php/admin/print_sales_invoice/<?=$row->m06_invoice_no?>/<?=$row->m06_id?>/4"><i class="la la-print"></i> Record Copy</a>
                                 <a class="dropdown-item" href="<?=base_url()?>index.php/admin/print_sales_invoice/<?=$row->m06_invoice_no?>/<?=$row->m06_id?>/2"><i class="la la-print"></i> Duplicate Copy</a>
                                 <a class="dropdown-item" href="<?=base_url()?>index.php/admin/print_sales_invoice/<?=$row->m06_invoice_no?>/<?=$row->m06_id?>/3"><i class="la la-print"></i> Transport Copy</a>

                              </div>
                           </span> 
                           <a href="<?=base_url()?>index.php/admin/update_sales/<?=$row->m06_invoice_no?>" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                              <i class="la la-edit"></i>
                           </a><a id="delete_data" href="<?=base_url()?>index.php/admin/delete_sales/<?=$row->m06_invoice_no?>"class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                           <i class="la la-trash"></i>
                           </a>
                        </td>
                        <td>RDS<?=$row->m06_invoice_no?></td>
                        <td><?=$row->m06_sales_party_name?></td>
                        <td><?=$row->m06_gstin?></td> 
                        <td><?=$row->m06_total_amount?></td>
                        <td><?php echo date_format(date_create_from_format('Y-m-d', $row->m06_date), 'd/m/Y');   ?></td>
                        <td><?=$row->m06_state?></td>
                        <td><?=$row->m06_city?></td>
                        <td><?=$row->m06_pincode?></td>
                        <td><?=$row->m06_landmark?></td>
                        <td><?=$row->m06_lrno?></td>
                        <td nowrap><?=$row->m06_amount_in_words?></td>
                        <td><?=$row->m06_extra_comments?></td>
                     </tr>
                     <?php } ?>

                  </tbody>


               </table>
            </div>


         </div>
      </div>
   </div>
   <!--End::Section-->


</div>
<script>

   function indian_currency_comma(a,x){
      x=x.toString();
      var afterPoint = '';
      if(x.indexOf('.') > 0)
         afterPoint = x.substring(x.indexOf('.'),x.length);
      x = Math.floor(x);
      x=x.toString();
      var lastThree = x.substring(x.length-3);
      var otherNumbers = x.substring(0,x.length-3);
      if(otherNumbers != '')
         lastThree = ',' + lastThree;
      var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + afterPoint;

      if(a==1){$('#total_sales').html(res);}
      if(a==2){$('#total_purchase').html(res);}
   }
   indian_currency_comma(1,<?=$total_purchase?>);
   indian_currency_comma(2,<?=$total_sales?>);

</script>

