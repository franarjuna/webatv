var sliderEdificio;
var posEdificio2;
var mobileSize = 640;
var tabletSize = 767;
$(document).ready(function() {
	sliderEdificio = $("#slider-edificio");
	$('.close-view, .close-360').click(function(e){
        e.stopPropagation();
        $('body, html').css({'heigh': 'auto', 'overflow': 'visible'});

        $('#page').css({'position': 'static'});

        //$('.container-edificio,#ubicacion, .section-img1, .section-img2, .section-img3, .section-img4, .section-img360,.site-footer, .site-header').show('fast');
        $('body, html').scrollTop(posEdificio2)        ;
        var modal = $(this).data('modal');
        $('#'+modal).hide('fast'); 
        $('#page').css('height', 'auto');
	}); 
    $('#scroll-top').click(function(e){
        e.preventDefault();         
        scrollWindow(0, 1000, 'body'); 
    });
    $(window).click(function(){
        //$('#modal-view').hide('fast');         
    });
    gotoAnchor(); 

    $(window).resize(function(){
         loadMapster();
    });
    $('.main-menu li a').click(function(e){
        $(this).closest('.main-nav').removeClass('show-menu');
    });

    validateForm();
});

(function(){ 
    edgrid.menu('main-nav', 'main-menu');    
    var sizeWindow = getSizeWindow();
    loadMapster();
    
    var departamentos = getEdificio();  
    
    $('.dpto').on("mouseenter", function(e){ 

        var sizeWindow = getSizeWindow();

    	var inf = getInformationDep(this, departamentos);
        if (sizeWindow > tabletSize ) {                
            $('.info').removeClass('hide');
            $('.floor-info').text(inf.nombrePiso);
            $('.unit-info').text(inf.unitInfo);     
            $('.description-info').html(inf.html); 
            loadTooltip(this); 
        } 
  
	});
	$('.dpto').on("mouseout", function(e){        

        var sizeWindow = getSizeWindow();

        if (sizeWindow > tabletSize ) {                
            $('.info').addClass('hide');
            $('.floor-info').text('');
            $('.unit-info').text(''); 
            $('.description-info').html('');             
        }  
		    		
	});
	
	$('.dpto').click(function(){

        var sizeWindow = getSizeWindow();

        if (! $(this).hasClass('no-clickeable')){
    		var slide = buildItems(this, departamentos); 
            posEdificio2 = document.scrollingElement || document.documentElement ; //$('body, html').scrollTop();  
            posEdificio2 = window.pageYOffset;  
            $('#page').css({'position': 'fixed', 'top': '-'+posEdificio2+'px' });
            $('body, html').css({'height': '100%', 'overflow': 'hidden'});
            $('#modal-view').show('fast', function() {
                loadSlider(slide);
            });

            if (sizeWindow < 800) {
                var inf = getInformationDep(this, departamentos);
                var infomobile = '<div class="description-info-mobile hide"><div class="ed-container"><div class="ed-item s-55">';  
                    infomobile += '<h2 class="floor-info"></h2><h3 class="unit-info">UNIDAD 2</h3></div><div class="ed-item s-45">';   
                    infomobile += '<div class="description-info"></div></div></div></div>'; 
                $('#modal-view .content-modal').prepend(infomobile);
   
                $('#modal-view .description-info-mobile').removeClass('hide');
                $('#modal-view .floor-info').text(inf.nombrePiso);
                $('#modal-view .unit-info').text(inf.unitInfo);
                $('#modal-view .unit-info').after('<p>'+inf.description+'</p>');
                $('#modal-view .description-info').html(inf.html); 
            }  
        }
	});	

    $('.logo-360').click(function(event) {
        posEdificio2 = $('body, html').scrollTop();  
        $('body, html').css({'height': '100%', 'overflow': 'hidden'});
        $('#page').css({'position': 'fixed', 'top': '-'+posEdificio2+'px' });
        var modal360 = $('#modal-360');
        url = $(this).data('urlview');
        url = (url) ? url: '360';
        var iframe = '<iframe src="'+url+'" class="iframe" width="100%" height="100%">'+      
                 '</iframe>';
        modal360.find('.content-modal').html(iframe);
        modal360.show('fast');
    });


})();

function loadMapster(w){   
   
   var sizeWindow = w || getSizeWindow();
   var render = $('#map'); 
   render.mapster('unbind');        



    if (sizeWindow > tabletSize) {
        var titleTooltip = 'Conocé más';
        sizeUnits = 27;
        var arrayTooltips = []; 
        for (var i = 1; i <= sizeUnits; i++) { 
            arrayTooltips.push( {
                    key: ""+i,
                    toolTip:  titleTooltip
                  })         ;
        }     
       
       render.mapster({
            fillOpacity: 0.85,
            stroke: false,
            render_highlight: {
                fillColor: 'ff0000',
                stroke: false,
                altImage: 'assets/img/hover_piso.png'
            },
            showToolTip: true,
            isSelectable: false,
            fadeInterval: 50,
            tooltipContainer: '<div id="custom-tooltip">',
            onMouseover: function(data){
                var w = getSizeWindow();
                if (w > tabletSize) {
                    var fraseEdificio = '<h2>Recorre <br>el edificio</h2><p>Y CONOCE SUS UNIDADES Y <br>CARACTERÍSTICAS</p>';
                    $('.ver-descripcion').html('');
                    
                }
            },
            onMouseout: function(data){
                var w = getSizeWindow();
                if (w > tabletSize) {
                    var fraseEdificio = '<h2>Recorre <br>el edificio</h2><p>Y CONOCE SUS UNIDADES Y <br>CARACTERÍSTICAS</p>';
                    $('.ver-descripcion').html(fraseEdificio);
                }
            },
            areas: arrayTooltips             
        });

       
    }
}

function loadTooltip(el){
    var el = $(el)
    var pos = el.position();  
    var tooltip = $("#custom-tooltip");
    if (pos) { 
        tooltip.css({'top': pos.top, 'left': pos.left});
        tooltip.css('display', 'block');
    }  
}
function getInformationDep(el, edificio){
    var dep = $(el).attr('href');      
	dep = (dep !== undefined) ? dep.split('-'): [];  
	var piso = (dep[0] !== undefined) ? dep[0].replace('#',''): '' ;
	var numDepto = (dep[1] !== undefined) ? dep[1]: '' ; 

	var departamento = edificio[piso].apartments[numDepto];
	var html = '';
	var nombrePiso = (edificio[piso].nameFloor !== undefined) ? edificio[piso].nameFloor: '';
    var unitInfo = (departamento["titleunitNumber"] !== undefined) ? departamento["titleunitNumber"]: '';         
    if (departamento !== undefined) {
        var description = (departamento['description'] !== undefined && departamento['description'] != '') ? departamento['description'] : '';
        html += description ? '<p>' + description + '</p>': '';
        html += (departamento['supcup'] !== undefined && departamento['supcup'] != '') ? '<p>Sup. Cub.<br><span>' + departamento['supcup'] + '</span></p>': '';
        html += (departamento['expansion'] !== undefined && departamento['expansion'] != '') ? '<p>EXPANsIÓN<br><span>' + departamento['expansion'] + '</span></p>': '';
        html += (departamento['suptotal'] !== undefined && departamento['suptotal'] != '') ? '<p>Sup. Total<br><span>' + departamento['suptotal'] + '</span></p>': '';      	 
	}

    return {nombrePiso: nombrePiso, unitInfo: unitInfo, html: html, description: description};
}

function buildItems(el, edificio){
	var dep = $(el).attr('href');      
    dep = (dep !== undefined) ? dep.split('-'): []; 
    var piso = (dep[0] !== undefined) ? dep[0].replace('#',''): '' ;
    var numDepto = (dep[1] !== undefined) ? dep[1]: '' ; 
    var modalView = $("#modal-view"); 
    var departamento = edificio[piso].apartments[numDepto];
    var html = '<ul id="slider-'+piso+'">';

    if (departamento !== undefined) {
        var nombrePiso = (edificio[piso].nameFloor !== undefined) ? edificio[piso].nameFloor: '';
        var unitInfo = (departamento["titleunitNumber"] !== undefined) ? departamento["titleunitNumber"]: '';
        modalView.find('.header-modal h2').html(nombrePiso+' - <span>'+unitInfo+'</span>'); 
        var directory = (departamento['directoryImages'] !== undefined) ? departamento['directoryImages']: '';
        var images = (departamento['countImages'] !== undefined) ? departamento['countImages']: '';         

        var view360 = (departamento['360view']) ? true: false; 
        var extension = 'jpg'; 

        for(var i = 1; i <= images; i++){
           //extension = (i==1) ? 'png': 'jpg';
           if (i == images && view360) {
            var url360 = (departamento['url360'] !== undefined) ? departamento['url360']: '';
            var url3602 = (departamento['url3602'] !== undefined) ? departamento['url3602']: '';
            var iframe = '<iframe src="'+url360+'" class="iframe" width="100%" height="700"></iframe>';
            var iframe2 = (url3602 != '') ? '<iframe src="'+url3602+'" class="iframe" width="100%" height="700"></iframe>': false;
            html += '<li data-thumb="assets/img/departamentos/'+ directory +'/thumb/'+i+'.jpg" ><img src="assets/img/departamentos/'+ directory +'/'+i+'.'+extension+'" alt="" /></li>';
            html += '<li data-thumb="assets/img/departamentos/'+ directory +'/thumb/360.jpg" >'+iframe+'</li>';
            html += (iframe2) ? '<li data-thumb="assets/img/departamentos/'+ directory +'/thumb/360_2.jpg" >'+iframe2+'</li>': '';
           }else{
            html += '<li data-thumb="assets/img/departamentos/'+ directory +'/thumb/'+i+'.jpg" ><img src="assets/img/departamentos/'+ directory +'/'+i+'.'+extension+'" alt="" /></li>';
           }
        } 
        html += '</ul>';     
        modalView.find('.content-modal').html('<div class="planos">'+html+'</div');
    }
    return ['slider-'+piso, images, view360];
}

function loadSlider(slide){ 
    var sizeWindow = getSizeWindow();
	sliderEdificio = slide[0] || sliderEdificio; 
    thumbnails = (slide[1] > 1 || slide[2] ) ? true : false;
	newSlide = $('#'+slide);
    adaptiveHeight = (sizeWindow < 640) ? false: true;
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
                controls: true,
                prevHtml: '',
                nextHtml: '',         
                rtl:false,
                adaptiveHeight:false,         
                vertical:false, 
                //vThumbWidth:100,         
                //thumbItem:10, 
                gallery: thumbnails,
                //galleryMargin: 5,
                thumbMargin: 5,  
                enableTouch:true,
                enableDrag:true,
                freeMove:true,
                swipeThreshold: 40,
         
                responsive : [],
         
                onBeforeStart: function (el) {},
                onSliderLoad: function (el) {},
                onBeforeSlide: function (el) {},
                onAfterSlide: function (el) {},
                onBeforeNextSlide: function (el) {},
                onBeforePrevSlide: function (el) {}
            });
}

function gotoAnchor(){

    $('.goto').click(function(e){ 
        e.preventDefault();
        var idTo = $(this).data('goto');
        var section = $('#'+idTo);
        var pos = section.offset();
        scrollWindow(pos.top, 1000, this); 
    });   
     
}
function scrollWindow(topScroll, time, elem){
 
    var time = time || 500;     
    var top = topScroll || 0;             
    $('html, body').animate({
        scrollTop: top
    }, time);
     
}

//mapas
function initMap(){
    var mapId = document.getElementById('mymap');
    var latlng =  {lat: -34.580002, lng: -58.432074};
    var style = getStyleMap();
    var map =  new google.maps.Map(mapId, {
        zoom: 17,
        center: latlng,
        scrollwheel: false, 
        styles: style
    });

    var image = {
        url: 'assets/img/icono-mapa.svg',
        scaledSize: new google.maps.Size(210, 120), // scaled size  
    };
    var marker = new google.maps.Marker({
        position: latlng,
        draggable: true,
        animation: google.maps.Animation.DROP,
        icon: image,
        map: map
    });
}

function getStyleMap(){
    return [
        {
            "featureType": "all",
            "elementType": "all",
            "stylers": [
                {
                    "saturation": -100
                },
                {
                    "gamma": 0.5
                }
            ]
        }
    ];
}

function getSizeWindow(){
    var size = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    return size;
}

function validateForm(){ 

    $('#formulario').validate({
            rules: {
                name: "required", 
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                name: "Ingrese su nombre", 
                email: "Por favor ingrese un email valido", 
            },
            submitHandler: function(form) {                 
                $(form).find('.loader').show('fast');
                $.ajax({
                    url: form.action,
                    type: 'post',
                    data: $(form).serialize(),
                     
                    success: function(data, textStatus, xhr) {                         
                        
                        if (xhr.status === 200) { 
                            $(form).find('input[type="text"], input[type="email"], #message-textarea').val('');
                            $(form).find('#message-textarea').parent('div').append('<span class="success formulario-enviado">Se envio correctamente !</span>'); //.html('<span></span>');
                            setTimeout(function(){ $(form).find('.formulario-enviado').remove(); }, 5000);
                        }
                        $(form).find('.loader').hide('fast');
                    },
                    complete: function(xhr, textStatus) {
                        $(form).find('.loader').hide('fast');  
                        if (xhr.status === 422) {
                            $.each(xhr.responseJSON, function(index, val) {
                                var nameInput = $(form).find('input[name="'+index+'"]');
                                var label = '<label id="'+index+'-error" class="error" for="'+index+'">'+val+'</label>';
                                nameInput.parent('div').append(label);
                                
                            });
                        }else if (xhr.status === 500) {
                            var nameInput = $(form).find('#message-textarea');
                            var label = '<span class="error" >Ocurrio un error al enviar el formulario, intentelo nuevamente</span>';
                            nameInput.parent('div').append(label);
                        }
                    } 
                });   
                
                return false;        
                 
            },

        });
}