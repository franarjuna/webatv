<footer>
<div class="container-fluid">
    <?php /*mobile*/?>
    <div class="row d-flex d-md-none">
      <div class="col-md-6  text-center">
        <a href="https://atvarquitectos.com/" target="_blank"><img src="<?php echo base_url();?>assets/img/logo-atv.png" class="logoblanco" /></a>
        <br>
        <br>
        <img src="<?php echo base_url();?>assets/img/logos/Leed-04.svg" style="height:29px;margin-right:6px" >
            <img src="<?php echo base_url();?>assets/img/logos/Fitwel-03.svg" style="height:24px;margin-right:6px" >
            <img src="<?php echo base_url();?>assets/img/logos/iram-02.svg" style="height:32px" >
        <ul>
            <li><a href="<?php echo $urls['proyecto'];?>">Proyecto</a></li>
            <li><a href="<?php echo $urls['unidades'];?>">Unidades</a></li>
            <li><a href="<?php echo $urls['galeria'];?>">Galería</a></li>
            <li><a href="<?php echo $urls['genesis'];?>">ATV Arquitectos</a></li>
            <li><a href="<?php echo $urls['contacto'];?>">Contacto</a></li>
          </ul>
        <p class=" text-center w-100 mb-4 mt-3 socialfooter">
        <?php include("redes.php");?>
          </p>
          <p class=" text-center mt-3 w-100" style="font-size:15px">&copy; 2020 ATV Arquitectos. <br>Todos los derechos reservados.</p>
      </div>
    </div>
    <?php /*desktop*/?>
    <div class="row d-none d-md-flex">
        <div class="col-md-2 developers">
          <a href="https://atvarquitectos.com/" target="_blank"><img src="<?php echo base_url();?>assets/img/logo-atv.png" class="logoblanco" /></a>
        </div>
        <div class="col-md-5  developers text-left">
          <div class="logosfot">
            <ul>
              <li><a href="<?php echo $urls['proyecto'];?>">Proyecto</a></li>
              <li><a href="<?php echo $urls['unidades'];?>">Unidades</a></li>
              <li><a href="<?php echo $urls['galeria'];?>">Galería</a></li>
              <li><a href="<?php echo $urls['genesis'];?>">ATV Arquitectos</a></li>
              <li><a href="<?php echo $urls['contacto'];?>">Contacto</a></li>
            </ul>
            <img src="<?php echo base_url();?>assets/img/logos/Leed-04.svg" style="height:29px" >
            <img src="<?php echo base_url();?>assets/img/logos/Fitwel-03.svg" style="height:24px" >
            <img src="<?php echo base_url();?>assets/img/logos/iram-02.svg" style="height:32px" >
        </div>
      </div>
        <div class="col-md-4  developers text-left">
          <p class=" text-left w-100 socialfooter">
          <?php include("redes.php");?>
          </p>
          <p class=" text-left w-100">&copy; 2020 ATV Arquitectos. Todos los derechos reservados.</p>
        </div>
    </div>
</div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    AOS.init();
  </script>
<script src="<?php echo base_url();?>assets/js/custom.js?t=<?php echo time();?>" crossorigin="anonymous"></script>
<script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs
      }
    });
  </script>
<?php if(isset($haymapa)){?>
<script async defer  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAExyq9XnMSAZk7BiHE6hzdka5pVXpOOj8&callback=initMap">    </script>
<script>
// Initialize and add the map
function initMap() {
// The location of Uluru
var uluru = {lat: -34.583684, lng: -58.430017}; 
// The map, centered at Uluru
var map = new google.maps.Map(
  document.getElementById('map'), {zoom: 16, center: uluru,
      styles: [
        {"elementType": "geometry","stylers": [{"color": "#ffffff"}]},
        {"elementType": "labels.text.fill","stylers": [  {    "color": "#8ec3b9"  }]},
        {"featureType": "administrative.country","elementType": "geometry.stroke","stylers": [  {    "visibility": "off"  }]},
        {"featureType": "administrative.land_parcel","stylers": [  {    "visibility": "off"  }]},
        {"featureType": "administrative.land_parcel","elementType": "labels.text.fill","stylers": [  {    "color": "#64779e"  }]},
        {"featureType": "administrative.neighborhood","stylers": [  {    "visibility": "off"  }]},
        {"featureType": "administrative.province","elementType": "geometry.stroke","stylers": [  {    "color": "#4b6878"  }]},
        {"featureType": "landscape.man_made","elementType": "geometry.stroke","stylers": [  {    "visibility": "off"  }]},
        {"featureType": "landscape.natural","elementType": "geometry","stylers": [  {    "color": "#162D5F"  }]},
        {"featureType": 'poi',"stylers": [{"visibility": '#00F379'}]},{
    "featureType": "poi",
    "elementType": "labels.icon",
    "stylers": [
      {
        "color": "#00F379"
      }
    ]
  },{"featureType": 'transit.station',"stylers": [{"visibility": 'off'}]},
        {"featureType": "road","elementType": "geometry","stylers": [  {    "color": "#cccccc"  }]},
        {"featureType": "road","elementType": "labels","stylers": [  {    "visibility": "off"  }]},
        {"featureType": "road","elementType": "labels.text.fill","stylers": [  {    "color": "#cccccc"  }]},
        {"featureType": "road.arterial","stylers": [  {    "color": "#cccccc"  }]},
        {"featureType": "road.highway","elementType": "geometry","stylers": [  {    "color": "#cccccc"  }]},
        {"featureType": "road.highway","elementType": "geometry.stroke","stylers": [  {    "color": "#cccccc"  }]},
        {"featureType": "road.highway","elementType": "labels","stylers": [  {    "visibility": "off"  }]},
        {"featureType": "road.highway","elementType": "labels.text.fill","stylers": [  {    "color": "#cccccc"  }]},
        {"featureType": "road.highway","elementType": "labels.text.stroke","stylers": [  {    "color": "#cccccc"  }]},
        {"featureType": "road.local","stylers": [  {    "color": "#cccccc"  }]},
        {"featureType": "transit","elementType": "labels.text.fill","stylers": [  {    "color": "#cccccc"  }]},
        {"featureType": "transit.line","elementType": "geometry.fill","stylers": [  {    "color": "#283d6a"  }]},
        {"featureType": "transit.station","elementType": "geometry","stylers": [  {    "color": "#3a4762"  }]},
        {"featureType": "water","elementType": "geometry","stylers": [  {    "color": "#162D5F"  }]},
        {"featureType": "water","elementType": "labels.text","stylers": [  {    "visibility": "off"  }]},
        {"featureType": "water","elementType": "labels.text.fill","stylers": [  {    "color": "#162D5F"  }]}
      ]
    });
    var image = '<?php echo base_url();?>assets/img/mapa.png';
    var beachMarker = new google.maps.Marker({
      position: uluru,
      map: map,
      icon: image
    });
}
</script>
<?php }?>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/localization/messages_es.js"></script>

<script>
var form = $("#formulario");
var message = $("#message-mail");

form.validate({
submitHandler: function() {
    gtag('event', 'enviar', {
        'event_category': 'contacto',
        'event_label': 'formulario'
    });

    setTimeout($.ajax(
            {
                url : 'https://atvarquitectos.com/send.php',
                type: "POST",
                data : {
                    from: $('[name="email"]').val(),
                    fromName: $('[name="name"]').val(),
                    to: "info@atvarquitectos.com",
                    subject: "Consulta SENS PALERMO GREEN",
                    message: "Nombre: "+ $('[name="name"]').val() +"<br> E-mail: "+ $('[name="email"]').val() + "<br> Telefono: "+ $('[name="telefono"]').val() + "<br> Mensaje: " + $('[name="message"]').val()
                },
                success:function(data, status, xhr)
                {
                    if (data == "success") {
                        message.html("<div class='alert alert-success'>Contacto enviado con éxito.</div>");
                        form[0].reset();
                    } else {
                        message.html("<div class='alert alert-danger'>Error al enviar el mensaje.");
                    }
                },
                error: function(err){
                    message.html("<div class='alert alert-danger'>Error al enviar el mensaje.");
                }
            }), 0);
}
});
</script>

</body>
</html>