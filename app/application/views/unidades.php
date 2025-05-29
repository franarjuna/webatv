<?php
$nofloatinglogo = 1;
$headeractivo = 1;
include("inc/header.php");?>
<section class="bgsectionunidades" id="unidades">
    <div class="container-fluid mapacentrado ">
		<div class="cargaunidad"></div>
        <div class="row mapas">
            <div class="col-md-2 unidadnav">
				<div class="filtrosmobile">
					<h4>Seleccione un filtro</h4>
					<h5>Tipologías</h5>
					<ul class="unidadfilter">
						<li data-filtro="tipo:balcon"><a href="#" >Dptos con balcón terraza<span>x</span></a></li>
						<li data-filtro="tipo:dpiscina"><a href="#" >Dptos con terraza y piscina<span>x</span></a></li>
						<li data-filtro="tipo:triplex"><a href="#" >Triplex con terraza y piscina<span>x</span></a></li>
					</ul>
					<h5>Ambientes</h5>
					<ul class="unidadfilter">
						<li data-filtro="amb:3"><a href="#" >3 ambientes<span>x</span></a></li>
						<li data-filtro="amb:4"><a href="#" >4 ambientes<span>x</span></a></li>
						<li data-filtro="amb:5"><a href="#" >5 ambientes<span>x</span></a></li>
					</ul>
					<h5>Superficies</h5>
					<ul class="unidadfilter">
						<li data-filtro="sup:115-149"><a href="#" >115 a 150 m<sup>2</sup><span>x</span></a></li>
						<li data-filtro="sup:150-289"><a href="#" >150 a 290 m<sup>2</sup><span>x</span></a></li>
						<li data-filtro="sup:290-399"><a href="#" >290 a 400 m<sup>2</sup><span>x</span></a></li>
						<li data-filtro="sup:400-550"><a href="#" >400 a 550 m<sup>2</sup><span>x</span></a></li>
					</ul>
				</div>
            </div>
            <div class="col-md-5">
				<h4>Seleccione un piso</h4>
				<?php include("pisos/edificio.php");?>
            </div>
            <div class="col-md-5 pisosdiv">

			</div>
        </div>
    </div>
</section>
<script>

<?php
echo "var unidades = [];".PHP_EOL;
foreach($unidades->result() as $rss){
	echo "unidades.push({codigo:'".$rss->unidad_codigo."',tipo:'',ambientes:'".$rss->unidad_ambientes."',superficie:'".$rss->unidad_superficie."',piso:'".$rss->unidad_piso."',pileta:'".$rss->unidad_pileta."',activa:0,amb:0,sup:0,tipo:0});";
}
?> 
</script>
<?php include("inc/footer.php"); ?>