var isMobile = false; //initiate as false
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
  isMobile = true;
 }
$(document).ready(function(){
    $('.navbars').click(function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $('.navmenu').removeClass('active');
        }else{
            $(this).addClass('active');
            $('.navmenu').addClass('active');
        }
    });

    $( window ).resize(function() {
      var wh = $(window).height();
      var mapacentrado = $('.mapacentrado').height();
      var margen = wh - mapacentrado;
      margen = (margen/2);
      if(margen < 100){
        margen = 100;
      }else{
        margen = margen + 40;
      }
      
      var ww = $(window).width();
      if(ww < 700){
        margen = 100;
      }
      $('.mapacentrado').css('margin-top', margen + 'px');
    });

    var uprendidas = [];
    $(window).scroll(); 

    var wh = $(window).height();
    var mapacentrado = $('.mapacentrado').height();
    var margen = wh - mapacentrado;
    margen = (margen/2);
    if(margen < 100){
      margen = 100;
    }else{
      margen = margen + 40;
    }
    var ww = $(window).width();
    if(ww < 700){
      margen = 100;
    }
    $('.mapacentrado').css('margin-top', margen + 'px');

    $('.unidadfilter li').click(function(e){
      e.preventDefault();
      if($(this).hasClass("active")){
        $(this).removeClass("active");
      }else{
        $(this).addClass("active");
      }
      $('.pisos').removeClass("active");
      var piso1 = 0;
      var piso2 = 0;
      var piso3 = 0;
      var piso4 = 0;
      var piso5 = 0;
      var piso6 = 0;
      var amb = [];
      var sup = [];
      var tipo = [];
      for(x = 0;x<unidades.length;x++){
        unidades[x].activa = 0;
      }
      $('.unidadfilter li.active').each(function(){
        var filtro = $(this).data("filtro");
        //piso1 = 1;
        var splitfiltro = filtro.split(":");
        if(splitfiltro[0] == 'sup'){
          sup.push(splitfiltro[1]);
        }else if(splitfiltro[0] == 'amb'){
          amb.push(splitfiltro[1]);
        }else if(splitfiltro[0] == 'tipo'){
          tipo.push(splitfiltro[1]);
        }
      });
      for(x = 0;x<unidades.length;x++){
        for(y = 0;y<amb.length;y++){
          if(unidades[x].ambientes == amb[y]){
            unidades[x].activa = 1;
            unidades[x].amb = 1;

            /*eval("evalpiso = piso" + unidades[x].piso);
            if(filtrado!=1 || (filtrado==1 && evalpiso!=0) ){
              eval("piso" + unidades[x].piso + " = piso" + unidades[x].piso + " + 1");
            }*/
          }
        }
        for(y = 0;y<sup.length;y++){
          var rango = sup[y].split("-");
          var min = Number(rango[0]);
          var max = Number(rango[1]);
          var supu = Number(unidades[x].superficie);
          if(supu >= min && supu <= max){
            unidades[x].activa = 1;
            unidades[x].sup = 1;
          }
        }
        for(y = 0;y<tipo.length;y++){
          if(tipo[y] == 'triplex' && unidades[x].piso == 6){
            unidades[x].activa = 1;
            unidades[x].tipo = 1;
          }else if(tipo[y] == 'balcon' && unidades[x].piso < 5){
            unidades[x].activa = 1;
            unidades[x].tipo = 1;
          }else if(tipo[y] == 'dpiscina' && unidades[x].pileta == 1 && unidades[x].piso != 6){
            unidades[x].activa = 1;
            unidades[x].tipo = 1; 
          }
        }
      }
      for(x = 0;x<unidades.length;x++){
        if(unidades[x].activa == 1){
          if((sup.length == 0 || (sup.length > 0 && unidades[x].sup == 1)) &&  (amb.length == 0 || (amb.length > 0 && unidades[x].amb == 1)) &&  (tipo.length == 0 || (tipo.length > 0 && unidades[x].tipo == 1))){
            eval("piso" + unidades[x].piso + " = piso" + unidades[x].piso + " + 1");
          }
          
        }
      }

      /*var filtrado = 0;
      for(a = 0;a<filtros.length;a++){
        if(filtros[a].tipo == 'tipo'){
          if(filtros[a].valor == 'balcon'){
            var piso1 = piso1 + 1;
            var piso2 = piso2 + 1;
            var piso3 = piso3 + 1;
            var piso4 = piso4 + 1;
            filtrado = 1;
          }else if(filtros[a].valor == 'dpiscina'){
            var piso4 = piso4 + 1;
            filtrado = 1;
          }else if(filtros[a].valor == 'triplex'){
            var piso6 = piso6 + 1;
            filtrado = 1;
          }
        }else if(filtros[a].tipo == 'amb'){
          for(x = 0;x<unidades.length;x++){
            if(unidades[x].ambientes == filtros[a].valor){
              eval("evalpiso = piso" + unidades[x].piso);
              if(filtrado!=1 || (filtrado==1 && evalpiso!=0) ){
                eval("piso" + unidades[x].piso + " = piso" + unidades[x].piso + " + 1");
              }
            }
          }
        }else if(filtros[a].tipo == 'sup'){
          var rango = filtros[a].valor.split("-");
          var min = Number(rango[0]);
          var max = Number(rango[1]);
          for(x = 0;x<unidades.length;x++){
            var supu = Number(unidades[x].superficie);
            if(supu >= min && supu <= max){
              eval("evalpiso = piso" + unidades[x].piso);
              if(filtrado!=1 || (filtrado==1 && evalpiso!=0) ){
                eval("piso" + unidades[x].piso + " = piso" + unidades[x].piso + " + 1");
              }
            }
          }
        }
      }*/
      if(piso1 > 0){
        $("#piso1").addClass("active");
      }
      if(piso2 > 0){
        $("#piso2").addClass("active");
      }
      if(piso3 > 0 ){
        $("#piso3").addClass("active");
      }
      if(piso4 > 0){
        $("#piso4").addClass("active");
      }
      if(piso5 > 0 ){
        $("#piso5").addClass("active");
      }
      if(piso6 > 0 ){
        $("#piso6").addClass("active");
      }
      

    });

    $('.bgsechover').hover(function(){
      $(this).css("background-repeat","no-repeat");
      $(this).css("background-blend-mode","multiply");
      $(this).css("background-color","rgba(0, 0, 0, 0.6)");
    },function(){
      $(this).css("background-blend-mode","unset");
      //$(this).css("background-color","none");
    });

    $(document).on("click",".pisos",function(){
      $('.pisos').removeClass("active2");
      $(this).addClass("active2");
      var ide = $(this).attr("id");
      $('.pisosdiv').fadeOut(300);
        $.ajax({url: "pisos/" + ide, success: function(result){
          $('.pisosdiv').html(result).fadeIn(500);
          for(x = 0;x<unidades.length;x++){
            if(unidades[x].reservada == 1){
              $('#u' + unidades[x].codigo).addClass("blocked");
            }else if(unidades[x].activa == 1){
              
              $('#u' + unidades[x].codigo).addClass("active");
            }
          }
        }});
    });
    $(document).on("click",".volver",function(){
      $('.cargaunidad').fadeOut(300,function(){
        $('.cargaunidad').html('');
      });
      $('.mapas').fadeIn(500);
    });
    $(document).on("click",".unidades",function(){
      var ide = $(this).attr("id");
      $('.cargaunidad').fadeOut(300);
        $.ajax({url: "unidad/" + ide, success: function(result){
          $('.cargaunidad').html(result).fadeIn(500);
          var alto = $('.imagenunidad').height();
          alto = 990;
          //alto = alto + 100;
          $('.cargaunidad').css('height', alto + 'px');

          $('.mapas').fadeOut(500);
          $('.cargaunidad').fadeIn(500);
        }});
    });

    $('.form-control').blur(function(){
      if($(this).val() == ''){
        $(this).parent().removeClass("active");
      }
    });
    $('.form-control').focus(function(){
      $(this).parent().addClass("active");
    });


});
$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 120) {
      $("#header").addClass("active");
      $(".floatatvlogo").fadeOut(300);
    }else{
      if(!$("#header").hasClass("activofijo")){
        $("#header").removeClass("active");
      }
      
      $(".floatatvlogo").fadeIn(300);
    }
  });

  document.addEventListener('aos:in', ({ detail }) => {
    var ide = detail.id;
    var element = document.getElementById(ide);
    element.classList.add("active");
  });
  
  document.addEventListener('aos:out', ({ detail }) => {
    var ide = detail.id;
    var element = document.getElementById(ide);
    element.classList.remove("active");
  });
