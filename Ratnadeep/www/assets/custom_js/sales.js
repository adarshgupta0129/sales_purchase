
function amount_in_words(t_amount){      
   $.ajax({
      type: "POST",
      url: baseurl+"index.php/admin/getIndianCurrency",
      data: {'rupees':t_amount},
      success: function(data)
      {
         $("#rupeesinwords").val(data);
      }
   });
}


$(document).ready(function(){
   $('#name').on('change', function() {
      var name = $('#name').val();

      $.ajax({
         type: "POST",
         url:  baseurl+"index.php/admin/get_sales_party_detail",
         data: {'name_id':name},
         success: function(data)
         {
            var object = $.parseJSON(data);

            $("#gstin").attr('value',object.m03_gstin);
            $("#address").attr('value',object.m03_address);
            $("#state").attr('value',object.m03_state);
            if(object.m03_landmark1!='' || object.m03_landmark2!=''){
               object.m03_landmark1='';
               object.m03_landmark2='';
            }
            $("#landmark_hidden").attr('value',object.m03_landmark1+' '+object.m03_landmark2);
            $("#landmark").attr('value',object.m03_landmark1+' '+object.m03_landmark2+' '+object.m03_state);
            $("#state").attr('value',object.m03_state);
            $("#city").attr('value',object.m03_city);
            $("#pincode").attr('value',object.m03_pincode);
            $("#city_pincode").attr('value',object.m03_city + " - " + object.m03_pincode);

         }
      });

   });
});
 
$(document).ready(function(){
   var final_total_amt = $('#t_amount').val();
   var count = 1;

   $(document).on('click', '#add_row', function(){
      count++;

      $('#total_item').val(count);

      var html_code = '';


      html_code += '<tr id="row_id_'+count+'">';
      html_code += '<th  colspan="1"><span id="sr_no" style="font-size: 15px;padding: 16px 0px 0px 15px;">'+count+'</span></th>';

      html_code += '<th colspan="9" style="vertical-align:top"> <input type="text" name="particulars[]" id="particulars'+count+'" placeholder="Particulars"  class="form-control m-input particulars" data-required><span class="m-form__help"></span></th>';


      html_code += '<th  colspan="2" style="vertical-align:top"><input type="text" name="hsn[]" id="hsn'+count+'" class="form-control m-input hsn" disabled></th>';


      html_code += '<th  colspan="2" style="vertical-align:top"><input  type="text" autocomplete="off" name="quantity[]" id="quantity'+count+'" class="form-control m-input quantity"  placeholder="0" data-required-quantity><span class="m-form__help"></span></th>';


      html_code += ' <th  colspan="2" style="vertical-align:top"><input  type="text"  autocomplete="off" name="rate[]" id="rate'+count+'" class="form-control m-input rate" placeholder="0" data-required-number><span class="m-form__help"></span></th>';



      html_code += '<th  colspan="3" style="vertical-align:top"><input  type="text" autocomplete="off"  name="amount[] " id="amount'+count+'" class="form-control m-input amount" placeholder="0" readonly> </th>';



      html_code += '<th  colspan="1"> <div align="right"><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></th></div>';
      html_code += '</tr>';
      var rem = count -1;

      $('#row_id_'+rem).after(html_code);
   });



   $(document).on('click', '.remove_row', function(){
      var row_id = $(this).attr("id");
      var amount = $('#amount'+row_id).val();
      var t_amount = $('#t_amount').val();
      var t_amount = parseFloat(t_amount) - parseFloat(amount);
      $('#t_amount').val(t_amount);
      $('#row_id_'+row_id).remove();
      count--;
      $('#total_item').val(count);

      amount_in_words(t_amount);
       cal_final_total(count);

   });

$('input').on('input', function() {
 cal_final_total(count);
});


   function cal_final_total(count)
   {
      var t_amount = 0;
      for(j=1; j<=count; j++)
      {
         var quantity = 0;
         var rate = 0;
         var amount = 0;
         var amount1 = 0;
         quantity = $('#quantity'+j).val();
         if(quantity > 0)
         {
            rate = $('#rate'+j).val();
            if(rate > 0)
            { 
               amount = parseFloat(quantity) * parseFloat(rate);
               $('#amount'+j).val(amount.toFixed(2));
               t_amount = parseFloat(t_amount) +  parseFloat(amount);
            }
         }
      }

      $('#t_amount').val(t_amount.toFixed(2));
      amount_in_words(t_amount);
   }

   $(document).on('blur', '.amount', function(){
      cal_final_total(count);
   });

   $(document).on('blur', '.quantity', function(){
      cal_final_total(count);
   });

   $(document).on('blur', '.rate', function(){
      cal_final_total(count);
   });


$('[data-valid]').submit(function() {
   cal_final_total(count);
});


});