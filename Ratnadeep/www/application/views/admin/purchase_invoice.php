<html lang="en" class="printing-class">
   <head>
      <meta charset="UTF-8"><meta name="robots" content="noindex">
      <style class="cp-pen-styles">/* reset */
         *
         {
            border: 1;
            box-sizing: content-box;
            color: inherit;
            font-family: inherit;
            font-size: inherit;
            font-style: inherit;
            line-height: inherit;
            list-style: none;
            margin: 0;
            padding: 0;
            text-decoration: none;
            vertical-align: top;
         }


         /* heading */

         h1 {     font: bold 100% sans-serif;
            letter-spacing: 3px;
            text-align: center;
            text-decoration: underline;
            text-transform: uppercase; }

         /* table */

         table { font-size: 75%;  table-layout: fixed; width: 100%;     border-collapse: collapse;
            border: 1px solid black;}
         /*table { border-collapse: separate; border-spacing: 2px; }*/
         th, td { border-width: 1px; padding:4px;font-size: 11px;position: relative; text-align: left; }
         th, td { border-radius: 0.25em; border-style: solid;    font-weight: 400; }
         /*th { background: #EEE; border-color: #BBB; }*/
         td { border-color: #000; }

         /* page */

         html {  overflow: auto; }
         html { background: #999; cursor: default; }

         body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
         body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

         /* header */

         header { margin: 0 0 3em 2em; }
         header:after { clear: both; content: ""; display: table; }

         header h1 { ; border-radius: 0.25em; color: #000; margin: 0 0 1em; padding: 0.5em 0; }
         header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
         header address p { margin: 0 0 0.25em; }
         header span, header img { display: block; float: right; }
         header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
         header img { max-height: 100%; max-width: 100%; }
         header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }


         .add, .cut
         {
            border-width: 1px;
            display: block;
            font-size: .8rem;
            padding: 0.25em 0.5em;	
            float: left;
            text-align: center;
            width: 0.6em;
         }

         .add, .cut
         {
            background: #9AF;
            box-shadow: 0 1px 2px rgba(0,0,0,0.2);
            background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
            background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
            border-radius: 0.5em;
            border-color: #000;
            color: #FFF;
            cursor: pointer;
            font-weight: bold;
            text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
         }

         .add { margin: -2.5em 0 0; }

         .cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
         .cut { -webkit-transition: opacity 100ms ease-in; }

         @page { margin: 0; }



         @font-face {
            font-family: OnStage;
            src: url(OnStage.ttf);
         }
         .heading{
            width:100%;

         }
         .ratnadeep-head h1{
            background: unset;
            color: #da251c;
            letter-spacing: 5px;
            font-family: Onstage;
            font-size: 30px;
            margin-bottom: 4px;
            line-height: 11px;
            padding-top: 28px;
            /* padding: 0; */
         }
         .ratnadeep-head h4{
            font-size: 15px;
            font-size: 19px;
            margin-top: 6px;
         }
         .ratnadeep-head .img1{
            height: 20px;
            width: 95px;
            margin-left: 10px;
         }
         .ratnadeep-head .img2{
            height: 18px;
            width: 86px;
         }
         table.meta, table.balance {
            float: right;
            width: 100%;
         }
         .float-left{
            float:left;
         }
         .brand{

            width:54%;
         }
         .first-col{
            width:10%;
         }
         .second-col{
            width:auto;
         }
         .third-col{
            width:10%;
         }

         .img-content{margin-bottom: 10px;margin-right: -15px;}

         .table-bordered>thead>tr>th {
            border: 1px solid #000!important;
            border-top: 1px solid #000!important;
            border-bottom: 1px solid #000!important;
            border-left: 1px solid #000!important;
            border-right: 1px solid #000!important;


         }
         .row {
            margin-right: -15px;
            margin-left: -15px;
         }
         .col-md-2 {
            width: 16.66666667%;
         }

         .col-md-8 {
            width: 69.66666667%;   
            float:left; 
         }
         .col-md-12 {
            width: 100%;
         }

         h2{text-align: right;}
         @media print{


            @font-face {
               font-family: OnStage;
               src: url(OnStage.ttf);
            }
            .heading{
               width:100%;

            }
            .ratnadeep-head h1{
               background: unset;
               color: #da251c;
               letter-spacing: 5px;
               font-family: Onstage;
               font-size: 30px;
               margin-bottom: 4px;
               line-height: 11px;
               padding-top: 28px;
               /* padding: 0; */
            }
            .ratnadeep-head h4{
               font-size: 15px;
            }
            .ratnadeep-head .img1{
               height: 20px!important;
               width: 95px!important;
               margin-left: 10px!important;
            }
            .ratnadeep-head .img2{
               height: 18px!important;
               width: 86px!important;
            }
            table.meta, table.balance {
               float: right;
               width: 100%;
            }
            .float-left{
               float:left;
            }
            .brand{

               width:54%!important;

            }
            .img-content{width:560px!important;margin-bottom: 10px;margin-right: -5px!important;}

            .table-bordered>thead>tr>th {
               border: 1px solid #000!important;
            }
            h2{text-align: right;}
         }
      </style>

   </head>
   <body>



      <meta charset="utf-8">
      <title>Invoice</title>

      <h2>
         <?php if($this->uri->segment(5)==1) {echo 'Original Copy';}?>
         <?php if($this->uri->segment(5)==2) {echo 'Duplicate Copy';}?>
         <?php if($this->uri->segment(5)==3) {echo 'Transport Copy';}?>
         <?php if($this->uri->segment(5)==4) {echo 'Record Copy';}?>

      </h2>
      <center>

         <header>
            <h1>Invoice</h1>
 
         </header>
      </center>
      <article>
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th colspan="6"><b>Mrs.: </b><?=$row->m05_purchase_party_name?></th>
                  <th  colspan="6"><b>Invoice No.: </b><?=$row->m05_invoice_no?></th>
               </tr>
            </thead>

            <thead>
               <tr>
                  <th colspan="6"><b>Add.:</b> <?=$row->m05_address?></th>
                  <th  colspan="6"><b>Date: </b><?php echo date_format(date_create_from_format('Y-m-d', $row->m05_date), 'd/m/Y'); ?></th>
               </tr>
            </thead>

            <thead>
               <tr>
                  <th colspan="6"><?=$row->m05_landmark?>&nbsp;<?=$row->m05_state?></th>
                  <th colspan="6"><b>L. R. No. </b><?=$row->m05_lrno?></th>
               </tr>
            </thead>

            <thead>
               <tr>
                  <th colspan="6"><?=$row->m05_city?>-<?=$row->m05_pincode?></th>
                  <th colspan="6"><b>Transport: </b><?=$row->m05_transport?></th>
               </tr>
            </thead>

            <thead>
               <tr>
                  <th colspan="6"><b>GSTIN: </b><?=$row->m05_gstin?></th>
                  <th colspan="6"></th>
               </tr>
            </thead>

            <thead>
               <tr>
                  <th>Sr. No.</th>
                  <th><b><center>ITEMS</center></b></th>
                  <th >HSN Code</th>
                  <th>Quantity</th>
                  <th>Rate</th>
                  <th>GST(%)</th>
                  <th>SGST (INR)</th>
                  <th>CGST (INR)</th>
                  <th>IGST(%)</th>
                  <th>IGST (INR)</th>
                  <th  colspan="2">Amount (INR)</th>
                </tr>
            </thead>

            <thead>

               <?php $i=0; foreach($rows as $row1){ $i++; ?>
               <tr>
                  <th style="vertical-align:top"><?=$i?></th>
                  <th style="vertical-align:top"><center><?=$row1->m05_particulars?></center></th>
                  <th style="vertical-align:top"><center><?=$row1->m05_hsn?></center></th>
                  <th style="vertical-align:top"><center><?=$row1->m05_quantity?></center></th>
                  <th style="vertical-align:top"><center><?=$row1->m05_rate?></center></th>
                  <th style="vertical-align:top"><center><?=$row1->m05_gst?></center></th>
                  <th style="vertical-align:top"><center><?=$row1->m05_sgst?></center></th>
                  <th style="vertical-align:top"><center><?=$row1->m05_cgst?></center></th>
                  <th style="vertical-align:top"><center><?=$row1->m05_igst?></center></th>
                  <th style="vertical-align:top"><center><?=$row1->m05_igst_value?></center></th>
                  <th style="vertical-align:top" colspan="2"><center><?=$row1->m05_item_total?></center></th>
           

               </tr>
               <?php } ?>


               <tr>
                  <th style="height: 150px;"></th>
                  <th colspan="1"></th>
                  <th colspan="1"></th>
                  <th colspan="1"></th>
                  <th colspan="1"></th>
                  <th colspan="1"></th>
                  <th colspan="1"></th>
                  <th colspan="1"></th>
                  <th colspan="1"></th>
                  <th colspan="1"></th>
                  <th colspan="2"></th>
          
               </tr>

               <tr>
                  <th colspan="7"><b>Rupees (In words): </b><?=$row->m05_amount_in_words?></th>
                  <th colspan="3"><b>Payable Amount</b> (INR) </th>
                  <th colspan="2"><center><?=$row->m05_total_amount?>&nbsp;/-</center></th>
               </tr>
               <!--

<tr>
<th colspan="5" ><?=$tandc->disclaimer?></th>
<th colspan="5" rowspan="2" style="vertical-align:top">For <b><?=$tandc->name?></b><br><br><?=$row->m05_extra_comments?></th>
</tr>

<tr>
<th colspan="3" ><b>Terms and conditions: </b> <br><br><?=$tandc->tandc?></th>
<th colspan="2"><b>Bank Details:</b><br> <?=$tandc->bank?><br>A/c No.:<?=$tandc->account?><br>IFSC: <?=$tandc->ifsc?><br>Branch: <?=$tandc->branch?></th>
</tr>-->

            </thead>
         </table>
      </article>
   </body>
</html>

<?php  if($this->uri->segment(5) != 0) { ?>
<script>

   window.print();
   setTimeout(function () { window.history.back(); }, 100);

</script>

<?php }?>

