<h4>Seleccione una unidad</h4>
<?php 
$uri = explode("/",$_SERVER['REQUEST_URI']);
include("assets/img/pisos/".end($uri).".svg");
?>
<div style="text-align:center;font-size: 11px;">
	<div class="d-inline-block mr-4" style="
    padding-left: 15px;
    position: relative;
"><span style="display:block;background-color:#ccc;width:10px;height:10px;position: absolute;left: 0;top: 3px;"></span> Unidad disponible</div>
	<div class="d-inline-block" style="
    position: relative;
    padding-left: 15px;
"><span style="display:block;background-color:#999;width:10px;height:10px;position: absolute;top: 3px;left: 0;"></span>  Unidad reservada</div>

</div>