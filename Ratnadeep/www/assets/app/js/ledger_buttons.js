var DatatablesExtensionButtons = {
   init: function () {
      var t;
      t = $("#m_table_1").DataTable({
         "scrollX": true,
         "lengthMenu": [[ 25, 50, 100, -1], [25, 50, 100, "All"]],
  

         //'rowsGroup': [1],
         /* dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
         /*buttons: ["excelHtml5", "csvHtml5", "pdfHtml5"],
         // "order": [],
         buttons: ["print", "copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],*/

      }), $("#export_print").on("click", function (e) {
         e.preventDefault(), t.button(0).trigger()
      }), $("#export_copy").on("click", function (e) {
         e.preventDefault(), t.button(1).trigger()
      }), $("#export_excel").on("click", function (e) {
         e.preventDefault(), t.button(2).trigger()
      }), $("#export_csv").on("click", function (e) {
         e.preventDefault(), t.button(3).trigger()
      }), $("#export_pdf").on("click", function (e) {
         e.preventDefault(), t.button(4).trigger()
      })
      t
         .column( '4:visible' )
         .order( 'desc' )
         .draw();
   }

};
jQuery(document).ready(function () {
   DatatablesExtensionButtons.init()
});

jQuery(document).ready(function () {

   //for cells merging 

   for(var i = 1; i<6; i++ ){
     MergeGridCells(i); 
   }
   $("[hidden=hidden]").each(function () {

    $(this).remove();

   });
change_order();
    
});


function MergeGridCells(col_id) {
   var dimension_cells = new Array();
   var dimension_col = null;
   var i = 1;
   var columnCount = $("#m_table_1 tr:first th").length;
   for (dimension_col = 1; dimension_col <= 1; dimension_col++) {
      // first_instance holds the first instance of identical td
      var first_instance = null;
      var first_instance1 = null;
      var first_instance2 = null;
      var first_instance3 = null;
      var first_instance4 = null;
      var rowspan = 1;
      // iterate through rows
      $("#m_table_1").find('tr').each(function () {

         // find the td of the correct column (determined by the dimension_col set above)
         var dimension_td = $(this).find('td:nth-child(' + dimension_col + ')');

         var dimension_td1 = $(this).find('td:nth-child(' + (parseFloat(dimension_col)+parseFloat(col_id)) + ')');
         if (first_instance === null) {
            // must be the first row
            first_instance = dimension_td;

            first_instance1 = dimension_td1; 

         } else if (dimension_td.text() === first_instance.text()) {
            // the current td is identical to the previous
            // remove the current td
            // dimension_td.remove(); // Remove this code and add the hidden property
            dimension_td.attr('hidden', true); 
            dimension_td1.attr('hidden', true); 
            ++rowspan;
             // increment the rowspan attribute of the first instance
            first_instance.attr('rowspan', rowspan);

            first_instance1.attr('rowspan', rowspan); 

         } else {
            // this cell is different from the last
            first_instance = dimension_td;
            first_instance1 = dimension_td1;

            rowspan = 1;
         }




      });
   }
}



function change_order(){

   var i = 1;
 
   $("#m_table_1").find('tr').each(function () {

     $(this).find('td:first > span').html(i);
      {
          if($(this).find('td').attr('rowspan'))
         {
             i=i+1; 
         }


         else  {
         }      
             
         
      }

   });
}



 