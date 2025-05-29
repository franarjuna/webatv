$(document).ready(function(){
  $("#datatable").DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 150,
        "ajax": {
            "url": ajaxsource,
            "data": function ( d ) {
                //d.myKey = "datatable";
                // d.custom = $('#myInput').val();
                // etc
            }
        }
    });
  //var a=$("#datatable-buttons").DataTable({lengthChange:!1,buttons:["copy","excel","pdf"]});
  //$("#key-table").DataTable({keys:!0}),$("#responsive-datatable").DataTable(),$("#selection-datatable").DataTable({select:{style:"multi"}}),a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")
});
