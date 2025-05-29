$(document).ready(function(){
  $(document).on ("click",".eliminarbloque",function(){
    var ide = $(this).data('id');
    $('#' + ide).remove();
  });
  $(document).on ("click",".eliminafoto",function(){
    var ide = $(this).data('foto');
    $('div[data-img="' + ide + '"]').remove();
  });
  $(document).on ("click",".consulta",function(e){
    e.preventDefault();
    var ide = $(this).attr('href');
    var r = confirm("Esta seguro que desea eliminar el registro?");
    if (r == true) {
      document.location=ide;
    } else {

    }
  });
  $(".nuevomodelo").click(function(){
    var val = $("#nuevomodelo").val();
    var campo = $("#nuevomodelocampo").val();
    $.ajax({
      method: "POST",
      url: "/admin/"+section+"/ajaxmodel",
      data: { name: val,campo:campo}
    }).done(function( msg ) {
      $('.contenidodiv').append(msg);
    });
  });
});/*
$(function () {
  $('.contenidodiv').bind('change', function (e) {
    $('.fileupload').fileupload('add', {
        fileInput: $(this)
    });
});
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = '/admin/imageupload';
    $('.fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
            });
        },
        progressall: function (e, data) {
          console.log(e);
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});*/
