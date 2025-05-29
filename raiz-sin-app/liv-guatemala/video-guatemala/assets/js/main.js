var sliderEdificio, videoLanding;
$(document).ready(function() {
    videoLanding = document.getElementById('video');
    videoLanding.play();
    sliderEdificio = $("#slider-edificio");
    $('.close-view').click(function(){
        $('body, html').css({'height': 'auto', 'overflow-y':'visible'});
         $('#modal-view').hide('slow/400/fast');
    });

    $('.close-view-especificaciones').click(function(){
        $('#modal-map-especifications').hide('slow/400/fast');
        $('body, html').css({'height': 'auto', 'overflow-y':'visible'});
    }); 
    $('.close-map-lightbox').click(function(){
        $('#modal-map-lightbox').hide('slow/400/fast');
        $('body, html').css({'height': 'auto', 'overflow-y':'visible'});
    }); 
    
    //loadSlider();
});

(function(){
    'use strict';  
    $('#map').mapster({
        fillOpacity: 1,
        stroke: false,
        render_highlight: {
            fillColor: 'ff0000',
            stroke: false,
            altImage: 'assets/img/hover_piso.png'
        },
        isSelectable: false,
        fadeInterval: 50, 
         
    });
    var departamentos = getEdificio(); 

    //$('.map').maphilight({fade: false});
    $('.dpto').on("mouseenter", function(e){ 
        $('.left-content .info').removeClass('hide');
        loadInformation(this, departamentos);
    });
    $('.dpto').on("mouseout", function(e){
        $('.left-content .info').addClass('hide');
        $('.left-content .floor-info').text('');
        $('.left-content .unit-info').text(''); 
        $('.left-content .description-info').html(''); 
                    
    });
    $("#video").on("ended", function() { 
        closeVideo();
    });
     

    var timeout;
    $('#close-video').click(function(){
         closeVideo()
    });
    $(document).on('mousemove', function (event) {
        if (timeout !== undefined) {
            window.clearTimeout(timeout);
            $('#close-video').css('display', 'block');
        }

        timeout = window.setTimeout(function () { 
            $('#close-video').css('display', 'none');
        }, 300);
    });

    $('.dpto').click(function(){
        if (! $(this).hasClass('no-clickeable')) {
            var slide = buildItems(this, departamentos); 
            var dpto = this;
            $('#modal-view').toggle('fast', function(){                
                loadInformation(dpto, departamentos);
                $('body, html').css({'height': '100vh', 'overflow-y':'hidden'})
                loadSlider(slide);          
            }); 
        }
    });

    $('#ver-especificaciones').click(function(e){
        e.preventDefault();
        $('body, html').css({'height': '100vh', 'overflow-y':'hidden'})
        $('#modal-map-especifications').toggle('fast');
    });
    $('#ver-mapa-lightbox').click(function(e){
        e.preventDefault();
        $('body, html').css({'height': '100vh', 'overflow-y':'hidden'})
        $('#modal-map-lightbox').toggle('fast');
    });

     
    
})();

function closeVideo(){
    
    
    video.pause();
    $('#modal-video').fadeOut(1000, function() {            
        $(this).remove();
    });
    $('body, html').css({'height': 'auto', 'overflow-y':'visible'});
}
function loadInformation(el, edificio){
    var dep = $(el).attr('href');      
    dep = (dep !== undefined) ? dep.split('-'): []; 
    var piso = (dep[0] !== undefined) ? dep[0].replace('#',''): '' ;
    var numDepto = (dep[1] !== undefined) ? dep[1]: '' ; 
     
    var departamento = edificio[piso].apartments[numDepto];
    var html = '';
    if (departamento !== undefined) {
        var nombrePiso = (edificio[piso].nameFloor !== undefined) ? edificio[piso].nameFloor: '';
        $('.floor-info').text(nombrePiso);
        var unitInfo = (departamento["titleunitNumber"] !== undefined) ? departamento["titleunitNumber"]: '';         
        $('.unit-info').text(unitInfo);     
        html += (departamento['description'] !== undefined && departamento['description'] != '') ? '<p>' + departamento['description'] + '</p>': '';
        html += (departamento['supcup'] !== undefined && departamento['supcup'] != '') ? '<p>Sup. Cub.<br><span>' + departamento['supcup'] + '</span></p>': '';
        html += (departamento['expansion'] !== undefined && departamento['expansion'] != '') ? '<p>EXPANsIÓN<br><span>' + departamento['expansion'] + '</span></p>': '';
        html += (departamento['suptotal'] !== undefined && departamento['suptotal'] != '') ? '<p>Sup. Total<br><span>' + departamento['suptotal'] + '</span></p>': '';  
        $('.description-info').html(html);
    }
}

function buildItems(el, edificio){
    
    var dep = $(el).attr('href');      
    dep = (dep !== undefined) ? dep.split('-'): []; 
    var piso = (dep[0] !== undefined) ? dep[0].replace('#',''): '' ;
    var numDepto = (dep[1] !== undefined) ? dep[1]: '' ; 
    var modalView = $("#modal-view"); 
    var departamento = edificio[piso].apartments[numDepto];
    var class_slider = (numDepto == 'accesos') ? 'piso-3': '';
    var html = '<ul id="slider-'+piso+'" class="'+class_slider+'">';

    if (departamento !== undefined) {
        
        var nombrePiso = (edificio[piso].nameFloor !== undefined) ? edificio[piso].nameFloor: '';
        var unitInfo = (departamento["titleunitNumber"] !== undefined) ? departamento["titleunitNumber"]: '';
        modalView.find('.header-modal h2').html(nombrePiso+' - <span>'+unitInfo+'</span>'); 
        var directory = (departamento['directoryImages'] !== undefined) ? departamento['directoryImages']: '';
        var images = (departamento['countImages'] !== undefined) ? departamento['countImages']: '';
        $('#edificio-small').attr('src', 'assets/img/departamentos/'+ directory +'/edificio.png');
        var extension = 'jpg';
        var ps = 'ps';
        
        for(var i = 1; i <= images; i++){
           if (numDepto == 'accesos') {
              var items = [12,13,14];
              
              extension = (items.indexOf(i) > 0) ? 'jpg': 'png';
           }else{
               extension = (i==1) ? 'png': 'jpg';             
           }            
           var bgimage = 'assets/img/departamentos/'+ directory +'/'+ps+i+'.'+extension;
           html += '<li data-thumb="assets/img/departamentos/'+ directory +'/thumb/'+i+'.jpg" ><div style="background-image: url('+bgimage+')"></div></li>';  
        } 
        html += '</ul>';    
        modalView.find('.planos').html(html);
    }
    return 'slider-'+piso;
}

function loadSlider(slide){ 
    sliderEdificio = slide || sliderEdificio;
    newSlide = $('#'+slide);
    newSlide.lightSlider({
                item: 1,
                autoWidth: false, 
                slideMargin: 10,         
                addClass: '',
                mode: "slide",
                useCSS: true,
                cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
                easing: 'linear', //'for jquery animation',//// 
                loop: true,
                slideEndAnimation: true,
                pause: 2000,         
                keyPress: true, 
                prevHtml: '',
                nextHtml: '',         
                rtl:false,
                adaptiveHeight:false,         
                vertical:false, 
                vThumbWidth:100,         
                thumbItem:15, 
                gallery: true,
                galleryMargin: 0,
                thumbMargin: 0,  
                currentPagerPosition: 'middle',
                enableTouch:true,
                enableDrag:true,
                freeMove:true,
                swipeThreshold: 40,
         
                responsive : [],
                controls: false,
                onSliderLoad: function() {
                    //$('#image-gallery').removeClass('cS-hidden');
                }  
            });
    if (newSlide.hasClass('piso-3')) {
        newSlide.goToSlide(3);        
    }
}

