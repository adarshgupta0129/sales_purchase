


$('[data-required]').each(function() {

   $(this).parent().prev('label').append('<span style="color:red">*</span>');

});


$('[data-required-ifsc]').each(function() {

   $(this).parent().prev('label').append('<span style="color:red">*</span>');

});


$('[data-required-text]').each(function() {

   $(this).parent().prev('label').append('<span style="color:red">*</span>');

});




$('[data-required-username]').on('input',function(event){

   var txtval = $(this).val();
   var space = /^[a-zA-Z0-9]+?$/;
   var txtname = $(this).attr('placeholder');
   if(txtval == ''){
      $(this).next('span').show();
      $( this ).next('span').html('Please enter '+txtname);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;
   } 

   else if(!space.test(txtval))
   {
      $(this).next('span').show();
      $( this ).next('span').html('Use only characters and digits only'); 
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      setTimeout(function() { $(this).next('span').hide(); }, 2000);
      valid = false;
   }
   else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
});



$('[data-required-username]').on('focusout',function(event){

   var txtval = $(this).val();
   var space = /^[a-zA-Z0-9]+?$/;
   var txtname = $(this).attr('placeholder');
   if(txtval == ''){
      $(this).next('span').show();
      $( this ).next('span').html('Please enter '+txtname);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;
   } 

   else if(!space.test(txtval))
   {
      $(this).next('span').show();
      $( this ).next('span').html('Use only characters and digits only'); 
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      setTimeout(function() { $(this).next('span').hide(); }, 2000);
      valid = false;
   }
   else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
});


$('[data-required-password]').on('focusout',function(event){


   var txtval = $(this).val();
   var space = /^[a-zA-Z0-9(@)(#)(_)(-)(!)($)(%)(*)(&)]*?$/;
   var txtname = $(this).attr('placeholder');
   if(txtval == ''){
      $( this ).parent().next('span').show();
      $( this ).parent().next('span').html('Please enter '+txtname);
      $( this ).parent().next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;
   } 

   else if(!space.test(txtval))
   {
      $(this).parent().next('span').show();
      $( this ).parent().next('span').html('Use characters, digits and special characters only'); 
      $( this ).parent().next('span').css('color','red');
      $( this ).parent().css('border-color','red');
      setTimeout(function() { $(this).next('span').hide(); }, 2000);
      valid = false;
   }
   else {
      $( this ).parent().next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).parent().next('span').hide();
   }
});


$('[data-required-password]').on('input',function(event){

   var txtval = $(this).val();
   var space = /^[a-zA-Z0-9(@)(#)(_)(-)(!)($)(%)(*)(&)]*?$/;
   var txtname = $(this).attr('placeholder');
   if(txtval == ''){
      $( this ).parent().next('span').show();
      $( this ).parent().next('span').html('Please enter '+txtname);
      $( this ).parent().next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;
   } 

   else if(!space.test(txtval))
   {
      $(this).parent().next('span').show();
      $( this ).parent().next('span').html('Use characters, digits and special characters only'); 
      $( this ).parent().next('span').css('color','red');
      $( this ).parent().css('border-color','red');
      setTimeout(function() { $(this).next('span').hide(); }, 2000);
      valid = false;
   }
   else {
      $( this ).parent().next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).parent().next('span').hide();
   }
});


$('[data-valid-admin]').submit(function(event){
   var valid = true;


   $('[data-required-username]').each(function() {
      var txtval = $(this).val();
      var space = /^[a-zA-Z0-9]+?$/;
      var txtname = $(this).attr('placeholder');
      if(txtval == ''){
         $(this).next('span').show();
         $( this ).next('span').html('Please enter '+txtname);
         $( this ).next('span').css('color','red');
         $( this ).css('border-color','red');
         valid = false;
      } 

      else if(!space.test(txtval))
      {
         $(this).next('span').show();
         $( this ).next('span').html('Use only characters and digits only'); 
         $( this ).next('span').css('color','red');
         $( this ).css('border-color','red');
         setTimeout(function() { $(this).next('span').hide(); }, 2000);
         valid = false;
      }
      else {
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();
      }


   });

   $('[data-required-password]').each(function() {
      var txtval = $(this).val();
      var space = /^[a-zA-Z0-9(@)(#)(_)(-)(!)($)(%)(*)(&)]*?$/;
      var txtname = $(this).attr('placeholder');
      if(txtval == ''){
         $( this ).parent().next('span').show();
         $( this ).parent().next('span').html('Please enter '+txtname);
         $( this ).parent().next('span').css('color','red');
         $( this ).css('border-color','red');
         valid = false;
      } 

      else if(!space.test(txtval))
      {
         $(this).parent().next('span').show();
         $( this ).parent().next('span').html('Use characters, digits and special characters only'); 
         $( this ).parent().next('span').css('color','red');
         $( this ).parent().css('border-color','red');
         setTimeout(function() { $(this).next('span').hide(); }, 2000);
         valid = false;
      }
      else {
         $( this ).parent().next('span').css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).parent().next('span').hide();
      }


   });

   if(valid != true){
      event.preventDefault();
   }


});




$('[data-valid]').submit(function(event){
   var valid = true;


   $('[data-required]').each(function() {

      var txtval = $(this).val();
      if(txtval == ''){

         $(this).next('span').show();
         var txtname = $(this).attr('placeholder');
         if(typeof txtname == 'undefined')
         {$( this ).next('span').html('This field is required');}
         else
         {$( this ).next('span').html('Please enter '+txtname);}
         $( this ).next('span').css('color','red');
         $( this ).css('border-color','red');
         valid = false;
      } else {
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();
      }
   });


   $('[data-min-length]').each(function() {

      var val = $(this).val();
      var txtval = $(this).val().length;
      var inputedlength = $(this).attr('data-min-length');

      if(txtval==0){
      }
      else if(txtval < inputedlength){
         var txtname = $(this).attr('placeholder');
         $( this ).next('span').html('Please enter miminum length '+inputedlength);
         $( this ).next('span').css('color','red');
         $( this ).css('border-color','red');
         $(this).next('span').show();
         valid = false;
      } else {
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();

      }
   });


   $('[data-account]').each(function() {

      var mobile = $(this).val();
      var txtvallength = $(this).val().length;
      var inputedlength = 11;
      var reggst = /^\d*(?:\.\d{1,2})?$/;
      if(mobile == ''){ 

         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();
      } 


      else if(!reggst.test(mobile)) {     
         $(this).next('span').show();
         $(this).val($(this).val().replace(/[^0-9]/gi,''));
         var txtname = $(this).attr('placeholder');
         $( this ).next('span').html('Please enter numbers only');
         $( this ).next('span').css('color','red');
         $( this ).css('border-color','red');
         valid = false;  
      } 

      else if(txtvallength < 11){
         $(this).next('span').show();
         var txtname = $(this).attr('placeholder');
         $( this ).next('span').html('Please enter length between 11 and 16' );
         $( this ).next('span').css('color','red');
         $( this ).css('border-color','red');
         valid = false;  
      } 
      else if (this.value.length > 16) {
         this.value = this.value.slice(0,16); 
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();        

      }
      else
      {
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();
      }
   });


   $('[data-required-text-min-length]').each(function() { 

      var txtval = $(this).val();
      var txtvallen = $(this).val().length;
      var reggst =/^[a-zA-Z ]+$/;
      var space = /^[a-zA-Z]+(\s[a-zA-Z]+)*?$/;
      var txtname = $(this).attr('placeholder');
      $(this).next('span').show();
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      var inputedlength = $(this).attr('data-required-text-min-length');

      if(txtval == ''){
         $( this ).next('span').css('color','red');
         $( this ).css('border-color','red');
         $( this ).next('span').html('Please enter '+txtname);
         valid = false;
      } 
      else if(!reggst.test(txtval))
      {
         $( this ).next('span').html('Enter text only');
         $(this).val($(this).val().replace(/[^a-zA-Z ]/g,''));
         setTimeout(function() { $(this).next('span').hide(); }, 2000);
         valid = false;
      }

      else if(!space.test(txtval))
      {
         $( this ).next('span').html('Remove extra space'); 
         setTimeout(function() { $(this).next('span').hide(); }, 2000);
         valid = false;
      }
      else if(txtvallen < inputedlength){
         $( this ).next('span').html('Please enter miminum length '+inputedlength);
         $( this ).next('span').css('color','red');
         $( this ).css('border-color','red');
         $(this).next('span').show();
         valid = false;

      } 
      else {
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();

      }
   });


   $('[data-required-number-min-length]').each(function() {

      var txtval = $(this).val();
      var txtvallen = $(this).val().length;
      var reggst =/^(\d|,)*\.?\d*$/;
      var txtname = $(this).attr('placeholder');
      $(this).next('span').show();
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      var inputedlength = $(this).attr('data-required-number-min-length');

      if(txtval == ''){
         $( this ).next('span').css('color','red');
         $( this ).css('border-color','red');
         $( this ).next('span').html('Please enter '+txtname);
         valid = false;
      } 
      else if(!reggst.test(txtval))
      {
         $( this ).next('span').html('Enter numbers only');
         valid = false;
      }
      else if(txtvallen < inputedlength){
         $( this ).next('span').html('Please enter miminum length '+inputedlength);
         $( this ).next('span').css('color','red');
         $( this ).css('border-color','red');
         $(this).next('span').show();
         valid = false;
      }
      else if(txtvallen > 6 ){
         $( this ).next('span').html('Please enter maximum length 6');
         $( this ).next('span').css('color','red');
         $( this ).css('border-color','red');
         $(this).next('span').show();
         valid = false; 

      }
      else {
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();

      }
   });

   $('[data-text-not-required]').each(function() {


      var txtval = $(this).val();
      var txtvallen = $(this).val().length;
      var reggst =/^[a-zA-Z ]*$/;
      var space = /^[a-zA-Z]+(\s[a-zA-Z]+)*?$/;
      var txtname = $(this).attr('placeholder');
      $(this).next('span').show();
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red'); 
      var inputedlength = $(this).attr('data-text-not-required');

      if(txtval == ''){
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();
      } 
      else if(!reggst.test(txtval))
      {
         $( this ).next('span').html('Enter text only');
         $(this).val($(this).val().replace(/[^a-zA-Z ]/g,''));
         valid = false; 
      }
      else if(!space.test(txtval))
      {
         $( this ).next('span').html('Remove extra space'); 
         setTimeout(function() { $(this).next('span').hide(); }, 2000);
         valid = false;
      }

      else if(txtvallen < inputedlength){
         $( this ).next('span').html('Please enter miminum length '+inputedlength);
         $( this ).next('span').css('color','red');
         $( this ).css('border-color','red');
         $(this).next('span').show();
         valid = false;
      }

      else {
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();

      }
   });

   $('[data-required-number]').each(function() {

      var txtval = $(this).val();
      var reggst =/^(\d|,)*\.?\d*$/;
      $(this).next('span').show();
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      if(txtval == ''){
         $( this ).next('span').html('Required field');
         valid = false;
      }
      else if(parseFloat(txtval) < 0)
      {
         $( this ).next('span').html('Enter value greater than zero');
         valid = false;
      }
      else if(!reggst.test(txtval))
      {
         $( this ).next('span').html('Enter valid number');
         valid = false;
      }
      else {
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();

      }
   });


   $('[data-required-quantity]').each(function() {

      var txtval = $(this).val();
      var reggst =/^\d+$/;
      $(this).next('span').show();
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      if(txtval == ''){
         $( this ).next('span').html('Required field');
         valid = false;
      }
      else if(parseFloat(txtval) < 0)
      {
         $( this ).next('span').html('Enter value greater than zero');
         valid = false;
      }
      else if(!reggst.test(txtval))
      {
         $( this ).next('span').html('Enter valid number');
         $(this).val($(this).val().replace(/[^0-9]/gi,''));
         valid = false;
      }
      else {
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();

      }
   });


   $('[data-email]').each(function() {

      var email = $(this).val();
      var reggst = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

      if(email == ''){  
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();
      } 
      else if(!reggst.test(email)) {     
         $(this).next('span').show();
         var txtname = $(this).attr('placeholder');
         $( this ).next('span').html('Please enter valid '+txtname);
         $( this ).next('span').css('color','red');
         $( this ).css('border-color','red');

         valid = false;
      } else {
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();
      }
   });


   $('[data-required-select]').each(function() {

      var select = $(this).next('button').attr('class');
      var txtname = $(this).attr('data-name');
      if(select == 'btn dropdown-toggle bs-placeholder btn-light'){      

         $(this).parent().next('span').show();
         $( this ).parent().next('span').html('Please select '+txtname+' from here');
         $( this ).parent().next('span').css('color','red');
         $( this ).next('button').css('border-color','red');

         valid = false;
      } else {
         $( this ).next('button').css('border-color','#ebedf2');
         $(this).parent().next('span').hide();
      }
   });


   $('[data-pan]').each(function() {

      var pan = $(this).val();
      var reggst =/^([a-zA-Z]{5})(\d{4})([a-zA-Z]{1})$/;


      if(pan == ''){      
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();
      } 
      else if(!reggst.test(pan)) {     
         $(this).next('span').show();
         var txtname = $(this).attr('placeholder');
         $( this ).next('span').html('Please enter valid '+txtname);
         $( this ).next('span').css('color','red');
         $( this ).css('border-color','red');
         valid = false;
      } else {
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();
      }
   });


   $('[data-mobile]').each(function() {

      var mobile = $(this).val();
      var txtvallength = $(this).val().length;
      var inputedlength = 10;
      var reggst = /^\d*(?:\.\d{1,2})?$/;
      if(mobile == ''){    

         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();
      } 
      else  if(!reggst.test(mobile)) {     
         $(this).next('span').show();
         var txtname = $(this).attr('placeholder');
         $( this ).next('span').html('Please enter valid '+txtname);
         $( this ).next('span').css('color','red');
         valid = false; 

      }

      else if(txtvallength != inputedlength){
         $(this).next('span').show();
         var txtname = $(this).attr('placeholder');
         $( this ).next('span').html('Please enter '+inputedlength+' digits' );
         $( this ).next('span').css('color','red');
         $( this ).css('border-color','red');
         valid = false; 
      }

      else
      {
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();
      }
   });


   $('[data-phone]').each(function() {

      var mobile = $(this).val();
      var txtvallength = $(this).val().length;
      var inputedlength = 11;
      var reggst = /^\d*(?:\.\d{1,2})?$/;
      if(mobile == ''){ 

         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();
      } 
      else if(!reggst.test(mobile)) {     
         $(this).next('span').show();
         var txtname = $(this).attr('placeholder');
         $( this ).next('span').html('Please enter valid '+txtname);
         $( this ).next('span').css('color','red');
         valid = false; 
         return false;
      } 

      else if(txtvallength > inputedlength || txtvallength < 8){
         $(this).next('span').show();
         var txtname = $(this).attr('placeholder');
         $( this ).next('span').html('Please enter length between 8 and '+inputedlength+' ' );
         $( this ).next('span').css('color','red');
         $( this ).css('border-color','red');
         valid = false; 
         return false;
      } 
      else
      {
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();
      }
   });


   $('[data-gstin]').each(function() {

      var gstin = $(this).val();
      var reggst =  /\d{2}[A-Z]{5}\d{4}[A-Z]{1}\d[Z]{1}[A-Z\d]{1}/;

      if(gstin == ''){      
      } 
      else if(!reggst.test(gstin)) {     
         $(this).next('span').show();
         var txtname = $(this).attr('placeholder');
         $( this ).next('span').html('Please enter valid '+txtname);
         $( this ).next('span').css('color','red');
         $( this ).css('border-color','red');
         valid = false;
      } else {
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();
      }
   });


   $('[data-min-length-only]').each(function() {

      var val = $(this).val();
      var txtval = $(this).val().length;
      var inputedlength = $(this).attr('data-min-length-only');

      if(txtval==0){
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('color','#ebedf2');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();
      }
      else if(txtval < inputedlength){
         var txtname = $(this).attr('placeholder');
         $( this ).next('span').html('Please enter miminum length '+inputedlength);
         $( this ).next('span').css('color','red');
         $( this ).css('border-color','red');
         $(this).next('span').show();
         valid = false;
      } else {
         $( this ).next('span').css('color','#7b7e8a');
         $( this ).css('color','#7b7e8a');
         $( this ).css('border-color','#ebedf2');
         $(this).next('span').hide();

      }
   });


   $('[data-max-length]').each(function() {

   var txtvalue = $(this).val();
   var txtval = $(this).val().length;
   var inputedlength = $(this).attr('data-max-length');
   var space = /^[a-zA-Z0-9]+?$/;

   if(txtval=='')
   {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }

   else if(!space.test(txtvalue))
   {
      $(this).next('span').show();
      $( this ).next('span').html('Use characters and digits only'); 
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;
   }  

   else if(txtval > inputedlength){
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter maximum length '+inputedlength);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      $(this).next('span').show();
      valid = false;
      if (this.value.length > inputedlength) {
         this.value = this.value.slice(0,inputedlength); 
      }
   }
   else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();

   }

   });





   if(valid != true){
      event.preventDefault();
   }

});




//////////////////////////////*******************   O N     I N P U T    ************************///////////////////////


$('[data-required]').on('input',function(event){
   data_required(this); 

});

function data_required(element){

   var txtval = $(element).val();
   if(txtval == ''){

      $(element).next('span').show();
      var txtname = $(element).attr('placeholder');
      if(typeof txtname == 'undefined')
      {$( element ).next('span').html('This field is required');}
      else
      {$( element ).next('span').html('Please enter '+txtname);}
      $( element ).next('span').css('color','red');
      $( element ).css('border-color','red');
      valid = false;
   } else {
      $( element ).next('span').css('color','#7b7e8a');
      $( element ).css('border-color','#ebedf2');
      $(element).next('span').hide();
   }

}


$('[data-min-length]').on('input',function(event){

   var val = $(this).val();
   var txtval = $(this).val().length;
   var inputedlength = $(this).attr('data-min-length');

   if(txtval==0){
   }
   else if(txtval < inputedlength){
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter miminum length '+inputedlength);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      $(this).next('span').show();
      valid = false;
   } else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();

   }
});

$('[data-required-text-min-length]').on('input',function(event){ 

   var txtval = $(this).val();
   var txtvallen = $(this).val().length;
   var reggst =/^[a-zA-Z ]+$/;
   var space = /^[a-zA-Z]+(\s[a-zA-Z]+)*?$/;
   var txtname = $(this).attr('placeholder');
   $(this).next('span').show();
   $( this ).next('span').css('color','red');
   $( this ).css('border-color','red');
   var inputedlength = $(this).attr('data-required-text-min-length');

   if(txtval == ''){
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      $( this ).next('span').html('Please enter '+txtname);
      valid = false;
   } 
   else if(!reggst.test(txtval))
   {
      $( this ).next('span').html('Enter text only');
      $(this).val($(this).val().replace(/[^a-zA-Z ]/g,''));
      setTimeout(function() { $(this).next('span').hide(); }, 2000);
      valid = false;
   }

   else if(!space.test(txtval))
   {
      $( this ).next('span').html('Remove extra space'); 
      setTimeout(function() { $(this).next('span').hide(); }, 2000);
      valid = false;
   }
   else if(txtvallen < inputedlength){
      $( this ).next('span').html('Please enter miminum length '+inputedlength);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      $(this).next('span').show();
      valid = false;

   } 
   else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();

   }
});
$('[data-required-number-min-length]').on('input',function(event){  

   var txtval = $(this).val();
   var txtvallen = $(this).val().length;
   var reggst =/^(\d|,)*\.?\d*$/;
   var txtname = $(this).attr('placeholder');
   $(this).next('span').show();
   $( this ).next('span').css('color','red');
   $( this ).css('border-color','red');
   var inputedlength = $(this).attr('data-required-number-min-length');

   if(txtval == ''){
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      $( this ).next('span').html('Please enter '+txtname);
      valid = false;
   } 
   else if(!reggst.test(txtval))
   {
      $( this ).next('span').html('Please enter numbers only');
      $(this).val($(this).val().replace(/[^0-9]/gi,''));


      valid = false;
   }
   else if (this.value.length > 6) {
      this.value = this.value.slice(0,6);  
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
   else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();

   }
});

$('[data-required-ifsc]').on('input',function(event){  

   var txtval = $(this).val();
   var txtvallen = $(this).val().length;
   var reggst =/^[A-Za-z]{4}[a-zA-Z0-9]{7}$/;
   var txtname = $(this).attr('placeholder');
   $(this).next('span').show();
   $( this ).next('span').css('color','red');
   $( this ).css('border-color','red');
   var inputedlength = $(this).attr('data-required-number-min-length');

   if(txtval == ''){
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      $( this ).next('span').html('Please enter '+txtname);
      valid = false;
   } 
   else if(!reggst.test(txtval))
   {
      $( this ).next('span').html('Enter valid IFSC');
      valid = false;
   }

   else if(txtvallen > 6 ){
      $( this ).next('span').html('Please enter maximum length 6');
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      $(this).next('span').show();
      valid = false; 

   }
   else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();

   }
});

$('[data-text-not-required]').on('input',function(event){ 


   var txtval = $(this).val();
   var txtvallen = $(this).val().length;
   var reggst =/^[a-zA-Z ]*$/;
   var space = /^[a-zA-Z]+(\s[a-zA-Z]+)*?$/;
   var txtname = $(this).attr('placeholder');
   $(this).next('span').show();
   $( this ).next('span').css('color','red');
   $( this ).css('border-color','red'); 
   var inputedlength = $(this).attr('data-text-not-required');

   if(txtval == ''){
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   } 
   else if(!reggst.test(txtval))
   {
      $( this ).next('span').html('Enter text only');
      $(this).val($(this).val().replace(/[^a-zA-Z ]/g,''));
      valid = false; 
   }
   else if(!space.test(txtval))
   {
      $( this ).next('span').html('Remove extra space'); 
      setTimeout(function() { $(this).next('span').hide(); }, 2000);
      valid = false;
   }

   else if(txtvallen < inputedlength){
      $( this ).next('span').html('Please enter miminum length '+inputedlength);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      $(this).next('span').show();
      valid = false;
   }

   else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();

   }
});


$('[data-required-number]').on('input',function(event){

   data_required_number(this);


});

function data_required_number(element){

   var txtval = $(element).val();
   var reggst =/^(\d|,)*\.?\d*$/;
   $(element).next('span').show();
   $( element ).next('span').css('color','red');
   $( element ).css('border-color','red');
   if(txtval == ''){
      $( element ).next('span').html('Required field');
      valid = false;
   }
   else if(parseFloat(txtval) < 0)
   {
      $( element ).next('span').html('Enter value greater than zero');
      valid = false;
   }
   else if(!reggst.test(txtval))
   {
      $( element ).next('span').html('Enter valid number');
      $(element).val($(element).val().replace(/[^0-9]/gi,''));
      valid = false;
   }
   else {
      $( element ).next('span').css('color','#7b7e8a');
      $( element ).css('border-color','#ebedf2');
      $(element).next('span').hide();

   }
} 



$('[data-required-quantity]').on('input',function(event){

   data_required_quantity(this);

});



function data_required_quantity(element){

   var txtval = $(element).val();
   var reggst =/^\d+$/;
   $(element).next('span').show();
   $( element ).next('span').css('color','red');
   $( element ).css('border-color','red');
   if(txtval == ''){
      $( element ).next('span').html('Required field');
      valid = false;
   }
   else if(parseFloat(txtval) < 0)
   {
      $( element ).next('span').html('Enter value greater than zero');
      valid = false;
   }
   else if(!reggst.test(txtval))
   {
      $( element ).next('span').html('Enter valid number');
      $(element).val($(element).val().replace(/[^0-9]/gi,''));
      valid = false;
   }
   else {
      $( element ).next('span').css('color','#7b7e8a');
      $( element ).css('border-color','#ebedf2');
      $(element).next('span').hide();

   }
}

$('[data-email]').on('input',function(event){


   var email = $(this).val();
   var reggst = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

   if(email == ''){  
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   } 
   else if(!reggst.test(email)) {     
      $(this).next('span').show();
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter valid '+txtname);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');

      valid = false;
   } else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
});


$('[data-required-select]').change(function(event){


   var select = $(this).next('button').attr('class');
   //alert(select);
   var txtname = $(this).attr('data-name');
   if(select != 'btn dropdown-toggle btn-light'){      
      $( this ).next('button').css('border-color','#ebedf2');
      $(this).parent().next('span').hide();

      valid = false;
   } else{
      $( this ).next('button').css('border-color','#ebedf2');
      $(this).parent().next('span').hide();
   }
});

$('[data-pan]').on('input',function(event){

   var pan = $(this).val();
   var reggst =/^([a-zA-Z]{5})(\d{4})([a-zA-Z]{1})$/;


   if(pan == ''){      
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   } 
   else if(!reggst.test(pan)) {     
      $(this).next('span').show();
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter valid '+txtname);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;
      if (this.value.length > 10) {
         this.value = this.value.slice(0,10); 
      }
   } else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
});

$('[data-mobile]').on('input',function(event){

   var mobile = $(this).val();
   var txtvallength = $(this).val().length;
   var inputedlength = 10;
   var reggst = /^\d*(?:\.\d{1,2})?$/;
   if(mobile == ''){    

      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   } 
   else  if(!reggst.test(mobile)) {     
      $(this).next('span').show();
      $(this).val($(this).val().replace(/[^0-9]/gi,''));
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter numbers only');
      $( this ).css('border-color','red');
      $( this ).next('span').css('color','red');
      valid = false; 

   }
   else if (this.value.length > 10) {
      this.value = this.value.slice(0,10); 
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();


   }   
   else if(txtvallength != inputedlength){
      $(this).next('span').show();
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter '+inputedlength+' digits' );
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
   } 
   else
   {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
});

$('[data-phone]').on('input',function(event){

   var mobile = $(this).val();
   var txtvallength = $(this).val().length;
   var inputedlength = 11;
   var reggst = /^\d*(?:\.\d{1,2})?$/;
   if(mobile == ''){ 

      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   } 


   else if(!reggst.test(mobile)) {     
      $(this).next('span').show();
      $(this).val($(this).val().replace(/[^0-9]/gi,''));
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter numbers only');
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;  
   } 

   else if(txtvallength < 8){
      $(this).next('span').show();
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter length between 8 and 11' );
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;  
   } 
   else if (this.value.length > 11) {
      this.value = this.value.slice(0,11); 
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();        

   }
   else
   {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
});

$('[data-account]').on('input',function(event){

   var mobile = $(this).val();
   var txtvallength = $(this).val().length;
   var inputedlength = 11;
   var reggst = /^\d*(?:\.\d{1,2})?$/;
   if(mobile == ''){ 

      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   } 


   else if(!reggst.test(mobile)) {     
      $(this).next('span').show();
      $(this).val($(this).val().replace(/[^0-9]/gi,''));
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter numbers only');
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;  
   } 

   else if(txtvallength < 11){
      $(this).next('span').show();
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter length between 11 and 16' );
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;  
   } 
   else if (this.value.length > 16) {
      this.value = this.value.slice(0,16); 
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();        

   }
   else
   {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
});

$('[data-gstin]').on('input',function(event){


   var gstin = $(this).val();
   var reggst =  /\d{2}[A-Z]{5}\d{4}[A-Z]{1}\d[Z]{1}[A-Z\d]{1}/;


   if(gstin == ''){      
   } 

   else if(!reggst.test(gstin)) {     
      $(this).next('span').show();
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter valid '+txtname);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;
      if (this.value.length > 15) {
         this.value = this.value.slice(0,15); 
      }
   } else if (this.value.length > 15) {
      this.value = this.value.slice(0,15); 
   }
   else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
});


$('[data-min-length-only]').on('input',function(event){

   var val = $(this).val();
   var txtval = $(this).val().length;
   var inputedlength = $(this).attr('data-min-length-only');

   if(txtval==0){
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#ebedf2');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
   else if(txtval < inputedlength){
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter miminum length '+inputedlength);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      $(this).next('span').show();
      valid = false;
   } else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();

   }
});

$('[data-max-length]').on('input',function(event){

   var txtvalue = $(this).val();
   var txtval = $(this).val().length;
   var inputedlength = $(this).attr('data-max-length');
   var space = /^[a-zA-Z0-9]+?$/;

   if(txtval=='')
   {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }

   else if(!space.test(txtvalue))
   {
      $(this).next('span').show();
      $( this ).next('span').html('Use characters and digits only'); 
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;
   }  

   else if(txtval > inputedlength){
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter maximum length '+inputedlength);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      $(this).next('span').show();
      valid = false;
      if (this.value.length > inputedlength) {
         this.value = this.value.slice(0,inputedlength); 
      }
   }
   else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();

   }

});




$('[data-gst-percent]').on('input',function(event){

   data_gst_required(this);

});
function data_gst_required(element){

   var txtval = $(element).val();
   var reggst =/^(\d|,)*\.?\d*$/;

   if(txtval == ''){
      $( element ).next('span').css('color','#7b7e8a');
      $( element ).css('border-color','#ebedf2');
      $(element).next('span').hide();
   }
   else if(parseFloat(txtval) < 0)
   {
      $( element ).next('span').html('Enter value greater than zero');
      valid = false;
   }
   else if(!reggst.test(txtval))
   {
      $( element ).next('span').html('Enter valid number');
      $(element).val($(element).val().replace(/[^0-9]/gi,''));
      valid = false;
   }
   else {
      $( element ).next('span').css('color','#7b7e8a');
      $( element ).css('border-color','#ebedf2');
      $(element).next('span').hide();

   }

}


//////////////////////////////*******************   O N     F O C U S O U T    ************************///////////////////////




$('[data-required]').on('focusout',function(event){


   var txtval = $(this).val();
   if(txtval == ''){

      $(this).next('span').show();
      var txtname = $(this).attr('placeholder');
      if(typeof txtname == 'undefined')
      {$( this ).next('span').html('This field is required');}
      else
      {$( this ).next('span').html('Please enter '+txtname);}
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;
   } else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
});

$('[data-min-length]').on('focusout',function(event){

   var val = $(this).val();
   var txtval = $(this).val().length;
   var inputedlength = $(this).attr('data-min-length');

   if(txtval==0){
   }
   else if(txtval < inputedlength){
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter miminum length '+inputedlength);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      $(this).next('span').show();
      valid = false;
   } else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();

   }
});

$('[data-required-text-min-length]').on('focusout',function(event){  

   var txtval = $(this).val();
   var txtvallen = $(this).val().length;
   var reggst =/^[a-zA-Z ]+$/;
   var space = /^[a-zA-Z]+(\s[a-zA-Z]+)*?$/;
   var txtname = $(this).attr('placeholder');
   $(this).next('span').show();
   $( this ).next('span').css('color','red');
   $( this ).css('border-color','red');
   var inputedlength = $(this).attr('data-required-text-min-length');

   if(txtval == ''){
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      $( this ).next('span').html('Please enter '+txtname);
      valid = false;
   } 
   else if(!reggst.test(txtval))
   {
      $( this ).next('span').html('Enter text only');
      $(this).val($(this).val().replace(/[^a-zA-Z ]/g,''));
      setTimeout(function() { $(this).next('span').hide(); }, 2000);
      valid = false;
   }

   else if(!space.test(txtval))
   {
      $( this ).next('span').html('Remove extra space'); 
      setTimeout(function() { $(this).next('span').hide(); }, 2000);
      valid = false;
   }
   else if(txtvallen < inputedlength){
      $( this ).next('span').html('Please enter miminum length '+inputedlength);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      $(this).next('span').show();
      valid = false;

   } 
   else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();

   }
});

$('[data-required-number-min-length]').on('focusout',function(event){  

   var txtval = $(this).val();
   var txtvallen = $(this).val().length;
   var reggst =/^(\d|,)*\.?\d*$/;
   var txtname = $(this).attr('placeholder');
   $(this).next('span').show();
   $( this ).next('span').css('color','red');
   $( this ).css('border-color','red');
   var inputedlength = $(this).attr('data-required-number-min-length');

   if(txtval == ''){
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      $( this ).next('span').html('Please enter '+txtname);
      valid = false;
   } 
   else if(!reggst.test(txtval))
   {
      $( this ).next('span').html('Enter numbers only');
      $(this).val($(this).val().replace(/[^0-9]/gi,''));

      valid = false;
   }
   else if (this.value.length > 6) {
      this.value = this.value.slice(0,6);  
   }
   else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();

   }
});

$('[data-required-ifsc]').on('focusout',function(event){  

   var txtval = $(this).val();
   var txtvallen = $(this).val().length;
   var reggst =/^[A-Za-z]{4}[a-zA-Z0-9]{7}$/;
   var txtname = $(this).attr('placeholder');
   $(this).next('span').show();
   $( this ).next('span').css('color','red');
   $( this ).css('border-color','red');
   var inputedlength = $(this).attr('data-required-number-min-length');

   if(txtval == ''){
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      $( this ).next('span').html('Please enter '+txtname);
      valid = false;
   } 
   else if(!reggst.test(txtval))
   {
      $( this ).next('span').html('Enter valid IFSC');
      valid = false;
   } 
   else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();

   }
});

$('[data-text-not-required]').on('focusout',function(event){ 


   var txtval = $(this).val();
   var txtvallen = $(this).val().length;
   var reggst =/^[a-zA-Z ]*$/;
   var space = /^[a-zA-Z]+(\s[a-zA-Z]+)*?$/;
   var txtname = $(this).attr('placeholder');
   $(this).next('span').show();
   $( this ).next('span').css('color','red');
   $( this ).css('border-color','red'); 
   var inputedlength = $(this).attr('data-text-not-required');

   if(txtval == ''){
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   } 
   else if(!reggst.test(txtval))
   {
      $( this ).next('span').html('Enter text only');
      $(this).val($(this).val().replace(/[^a-zA-Z ]/g,''));
      valid = false; 
   }
   else if(!space.test(txtval))
   {
      $( this ).next('span').html('Remove extra space'); 
      setTimeout(function() { $(this).next('span').hide(); }, 2000);
      valid = false;
   }

   else if(txtvallen < inputedlength){
      $( this ).next('span').html('Please enter miminum length '+inputedlength);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      $(this).next('span').show();
      valid = false;
   }

   else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();

   }
});

$('[data-required-number]').on('focusout',function(event){

   var txtval = $(this).val();
   var reggst =/^(\d|,)*\.?\d*$/;
   $(this).next('span').show();
   $( this ).next('span').css('color','red');
   $( this ).css('border-color','red');
   if(txtval == ''){
      $( this ).next('span').html('Required field');
      valid = false;
   }
   else if(parseFloat(txtval) < 0)
   {
      $( this ).next('span').html('Enter value greater than zero');
      valid = false;
   }
   else if(!reggst.test(txtval))
   {
      $( this ).next('span').html('Enter valid number');
      $(this).val($(this).val().replace(/[^0-9]/gi,''));
      valid = false;
   }
   else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();

   }
});

$('[data-required-quantity]').on('focusout',function(event){

   var txtval = $(this).val();
   var reggst =/^\d+$/;
   $(this).next('span').show();
   $( this ).next('span').css('color','red');
   $( this ).css('border-color','red');
   if(txtval == ''){
      $( this ).next('span').html('Required field');
      valid = false;
   }
   else if(parseFloat(txtval) < 0)
   {
      $( this ).next('span').html('Enter value greater than zero');
      valid = false;
   }
   else if(!reggst.test(txtval))
   {
      $( this ).next('span').html('Enter valid number');
      $(this).val($(this).val().replace(/[^0-9]/gi,''));
      valid = false;
   }
   else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();

   }
});

$('[data-email]').on('focusout',function(event){


   var email = $(this).val();
   var reggst = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

   if(email == ''){  
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   } 
   else if(!reggst.test(email)) {     
      $(this).next('span').show();
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter valid '+txtname);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');

      valid = false;
   } else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
});

$('[data-required-select]').on('onfocus',function(event){


   var select = $(this).next('button').attr('class');
   var txtname = $(this).attr('data-name');
   if(select == 'btn dropdown-toggle bs-placeholder btn-light'){      

      $(this).parent().next('span').show();
      $( this ).parent().next('span').html('Please select '+txtname+' from here');
      $( this ).parent().next('span').css('color','red');
      $( this ).next('button').css('border-color','red');

      valid = false;
   } else {

      $( this ).next('button').css('border-color','#ebedf2');
      $(this).parent().next('span').hide();
   }
});

$('[data-pan]').on('focusout',function(event){

   var pan = $(this).val();
   var reggst =/^([a-zA-Z]{5})(\d{4})([a-zA-Z]{1})$/;


   if(pan == ''){      
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   } 
   else if(!reggst.test(pan)) {     
      $(this).next('span').show();
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter valid '+txtname);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;
      if (this.value.length > 10) {
         this.value = this.value.slice(0,10); 
      }
   } else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
});

$('[data-mobile]').on('focusout',function(event){

   var mobile = $(this).val();
   var txtvallength = $(this).val().length;
   var inputedlength = 10;
   var reggst = /^\d*(?:\.\d{1,2})?$/;
   if(mobile == ''){    

      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   } 
   else  if(!reggst.test(mobile)) {     
      $(this).next('span').show();
      $(this).val($(this).val().replace(/[^0-9]/gi,''));
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter numbers only');
      $( this ).next('span').css('color','red');
      valid = false; 

   }
   else if (this.value.length > 10) {
      this.value = this.value.slice(0,10); 
   }   
   else if(txtvallength != inputedlength){
      $(this).next('span').show();
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter '+inputedlength+' digits' );
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
   } 
   else
   {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
});

$('[data-phone]').on('focusout',function(event){

   var mobile = $(this).val();
   var txtvallength = $(this).val().length;
   var inputedlength = 11;
   var reggst = /^\d*(?:\.\d{1,2})?$/;
   if(mobile == ''){ 

      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   } 


   else if(!reggst.test(mobile)) {     
      $(this).next('span').show();
      $(this).val($(this).val().replace(/[^0-9]/gi,''));
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter numbers only');
      $( this ).next('span').css('color','red');
      valid = false;  
   } 

   else if(txtvallength < 8){
      $(this).next('span').show();
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter length between 8 and 11' );
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;  
   } 
   else if (this.value.length > 11) {
      this.value = this.value.slice(0,11); 
   }
   else
   {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
});


$('[data-account]').on('focusout',function(event){

   var mobile = $(this).val();
   var txtvallength = $(this).val().length;
   var inputedlength = 11;
   var reggst = /^\d*(?:\.\d{1,2})?$/;
   if(mobile == ''){ 

      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   } 


   else if(!reggst.test(mobile)) {     
      $(this).next('span').show();
      $(this).val($(this).val().replace(/[^0-9]/gi,''));
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter numbers only');
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;  
   } 

   else if(txtvallength < 11){
      $(this).next('span').show();
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter length between 11 and 16' );
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;  
   } 
   else if (this.value.length > 16) {
      this.value = this.value.slice(0,16); 
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();        

   }
   else
   {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
});


$('[data-gstin]').on('focusout',function(event){


   var gstin = $(this).val();
   var reggst =  /\d{2}[A-Z]{5}\d{4}[A-Z]{1}\d[Z]{1}[A-Z\d]{1}/;


   if(gstin == ''){      
   } 

   else if(!reggst.test(gstin)) {     
      $(this).next('span').show();
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter valid '+txtname);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;
      if (this.value.length > 15) {
         this.value = this.value.slice(0,15); 
      }
   } else if (this.value.length > 15) {
      this.value = this.value.slice(0,15); 
   }
   else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
});


$('[data-min-length-only]').on('focusout',function(event){

   var val = $(this).val();
   var txtval = $(this).val().length;
   var inputedlength = $(this).attr('data-min-length-only');

   if(txtval==0){
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#ebedf2');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
   else if(txtval < inputedlength){
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter miminum length '+inputedlength);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      $(this).next('span').show();
      valid = false;
   } else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();

   }
});

$('[data-max-length]').on('focusout',function(event){

   var txtvalue = $(this).val();
   var txtval = $(this).val().length;
   var inputedlength = $(this).attr('data-max-length');
   var space = /^[a-zA-Z0-9]+?$/;

   if(txtval=='')
   {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }

   else if(!space.test(txtvalue))
   {
      $(this).next('span').show();
      $( this ).next('span').html('Use characters and digits only'); 
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      valid = false;
   }  

   else if(txtval > inputedlength){
      var txtname = $(this).attr('placeholder');
      $( this ).next('span').html('Please enter maximum length '+inputedlength);
      $( this ).next('span').css('color','red');
      $( this ).css('border-color','red');
      $(this).next('span').show();
      valid = false;
      if (this.value.length > inputedlength) {
         this.value = this.value.slice(0,inputedlength); 
      }
   }
   else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();

   }

});


$('[data-gst-percent]').on('focusout',function(event){

   var txtval = $(this).val();
   var reggst =/^(\d|,)*\.?\d*$/;

   if(txtval == ''){
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();
   }
   else if(parseFloat(txtval) < 0)
   {
      $( this ).next('span').html('Enter value greater than zero');
      valid = false;
   }
   else if(!reggst.test(txtval))
   {
      $( this ).next('span').html('Enter valid number');
      $(this).val($(this).val().replace(/[^0-9]/gi,''));
      valid = false;
   }
   else {
      $( this ).next('span').css('color','#7b7e8a');
      $( this ).css('border-color','#ebedf2');
      $(this).next('span').hide();

   }
});

function removeExtraSpaces(string){

   var reggst =/^ *$/;

   string.replace(reggst, string);


   // string = string.replace(/\s+/g,'');

   return string;}