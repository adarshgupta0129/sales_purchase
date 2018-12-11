
$(document).ready(function(){


   $('#name').on('change', function() {
      var name = $('#name').val();


      $.ajax({
         type: 'POST',
         url: baseurl+'index.php/admin/get_purchase_party_detail',
         data: {'name_id':name},
         success: function(data)
         {
            var object = $.parseJSON(data);


            $("#gstin").attr('value',object.m02_gstin);
            $("#address").attr('value',object.m02_address);
            $("#state").attr('value',object.m02_state);
            if(object.m02_landmark1!='' || object.m02_landmark2!=''){
               object.m02_landmark1='';
               object.m02_landmark2='';
            }
            $
            $("#landmark_hidden").attr('value',object.m02_landmark1+' '+object.m02_landmark2);
            $("#landmark").attr('value',object.m02_landmark1+' '+object.m02_landmark2+' '+object.m02_state);
            $("#state").attr('value',object.m02_state);
            $("#city").attr('value',object.m02_city);
            $("#pincode").attr('value',object.m02_pincode);
            $("#city_pincode").attr('value',object.m02_city + " - " + object.m02_pincode);

         }
      });

   });
});


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
   var final_total_amt = $('#t_amount').val();
   var count = 1;

   $(document).on('click', '#add_row', function(){
      count++;

      $('#total_item').val(count);

      var html_code = '';


      html_code += '<tr id="row_id_'+count+'">';
      html_code += '<th><span id="sr_no" style="font-size: 15px;padding: 16px 0px 0px 15px;">'+count+'</span></th>';

      html_code += '<th style="vertical-align:top"> <input type="text" name="particulars[]" id="particulars'+count+'" data-required class="form-control m-input particulars" ><span class="m-form__help"></span></th>';


      html_code += '<th style="vertical-align:top"><input type="text" name="hsn[]" id="hsn'+count+'" class="form-control m-input hsn"></th>';


      html_code += '<th style="vertical-align:top"><input  type="text" autocomplete="off" name="quantity[]" data-required-quantity id="quantity'+count+'" class="form-control m-input quantity"  placeholder="0" ><span class="m-form__help"></span></th>';


      html_code += ' <th style="vertical-align:top"><input  type="text"  autocomplete="off" name="rate[]" data-required-number id="rate'+count+'" class="form-control m-input rate" placeholder="0" ><span class="m-form__help"></span></th>';


      html_code += ' <th style="vertical-align:top"><input  type="text" data-gst-percent autocomplete="off" name="gst[]" id="gst'+count+'" class="form-control m-input gst" placeholder="0" ></th>';


      html_code += ' <th style="vertical-align:top"><input  type="text"  autocomplete="off" name="sgst[]" id="sgst'+count+'" class="form-control m-input sgst" placeholder="0"  readonly></th>';


      html_code += ' <th style="vertical-align:top"><input  type="text"  autocomplete="off" name="cgst[]" id="cgst'+count+'" class="form-control m-input cgst" placeholder="0"  readonly></th>';


      html_code += ' <th style="vertical-align:top"><input  type="text" data-gst-percent autocomplete="off" name="igst[]" id="igst'+count+'" class="form-control m-input igst" placeholder="0" ></th>';


      html_code += ' <th style="vertical-align:top"><input  type="text"  autocomplete="off" name="igst_value[]" id="igst_value'+count+'" class="form-control m-input igst_value" placeholder="0" readonly></th>';



      html_code += '<th style="vertical-align:top"><input  type="text" autocomplete="off"  name="amount[] " id="amount'+count+'" class="form-control m-input amount" placeholder="0" readonly> </th>';



      html_code += '<th> <div align="right"><button type="button" name="remove_row" id="'+count+'" class="btn btn-danger btn-xs remove_row">X</button></th></div>';
      html_code += '</tr>';
      var rem = count -1;

      $('#row_id_'+rem).after(html_code);
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
         var gst = 0;
         var cgst = 0;
         var sgst = 0;
         var igst = 0;
         var igst_value = 0;
         quantity = $('#quantity'+j).val();
         if(quantity > 0)
         {
            rate = $('#rate'+j).val();
            if(rate > 0)
            { 
               amount = parseFloat(quantity) * parseFloat(rate);
               $('#amount'+j).val(amount.toFixed(2));

                      gst = $('#gst'+j).val();
                  if(gst != '')
                  {
                     cgst = parseFloat(amount) * parseFloat(gst)/parseFloat(200);
                     sgst = parseFloat(amount) * parseFloat(gst)/parseFloat(200);
                     $('#cgst'+j).val(cgst.toFixed(2));
                     $('#sgst'+j).val(sgst.toFixed(2));
                     $('#amount'+j).val((parseFloat(amount) +  parseFloat(cgst) +  parseFloat(sgst)).toFixed(2));
                  }
                  else{
                        $('#cgst'+j).val('');
                     $('#sgst'+j).val('');
                      
                  }
                  
                  igst = $('#igst'+j).val();
                 
                  if(igst != '')
                  {
                      
                     igst_value = parseFloat(amount)*parseFloat(igst)/parseFloat(100);
                     $('#igst_value'+j).val(igst_value.toFixed(2));
                    var amt = (parseFloat(amount) +  parseFloat(igst_value) +  parseFloat(cgst) +  parseFloat(sgst)).toFixed(2)
                     $('#amount'+j).val(amt);
                  }
                  else{
                      
                        $('#igst_value'+j).val('0');
                  }

               t_amount = parseFloat(t_amount.toFixed(2)) +  parseFloat(amount.toFixed(2)) +  parseFloat(cgst.toFixed(2)) +  parseFloat(sgst.toFixed(2)) +  parseFloat(igst_value.toFixed(2));
            }
         }
      }

      $('#t_amount').val(t_amount.toFixed(2));
      amount_in_words(t_amount);
   }

    function DOM_call_functions_quantity(element,count){
        data_required_quantity(element);
        cal_final_total(count);
    }
      
    function DOM_call_functions_number(element,count){
        data_required_number(element);
        cal_final_total(count);
    }  
    
    function DOM_call_functions_gst(element,count){
        data_gst_required(element);
        cal_final_total(count);
    }  
    
    
    function DOM_call_functions_required(element,count){
        data_required(element); 
    }  
    
     function remove_tr(element,count){
        
 
         var row_id = $(element).attr("id");
        
         var amount = $('#amount'+row_id).val(); 
         
         var t_amount = $('#t_amount').val();
         var t_amount = parseFloat(t_amount) - parseFloat(amount); 
         
         $('#t_amount').val(t_amount);
            
             
        $('#row_id_'+row_id).remove();
        
        var one_delete = $('#total_item').val();
        one_delete = one_delete-1;
        var one_delete = $('#total_item').val(one_delete);
        
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

   $(document).on('blur', '.gst', function(){
      cal_final_total(count);
   });

   $(document).on('blur', '.cgst', function(){
      cal_final_total(count);
   });

   $(document).on('blur', '.sgst', function(){
      cal_final_total(count);
   });

   $(document).on('blur', '.igst', function(){
      cal_final_total(count);
   });

   $(document).on('blur', '.igst_value', function(){
      cal_final_total(count);
   });

   $(window).blur(function() {

      cal_final_total(count);

   });


/*$('[data-valid]').submit(function() {
   cal_final_total(count);
});*/


});






