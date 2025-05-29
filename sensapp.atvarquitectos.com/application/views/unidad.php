<div class="row">
    <div class="col-md-2 unidaddetail">
        <a class="volver">< Volver</a>
        <h3>Unidad <?php echo $unidad;?></h3>
        <p>
            <b>Superficie cubierta</b><br>
            <?php echo $info->unidad_superficie;?> m<sup>2</sup><br>
            <b>Extensión</b><br>
            <?php echo $info->unidad_cubierto;?> m<sup>2</sup>
        </p>
        <p>
            <b>Superficie total</b><br>
            <?php echo $info->unidad_superficie + $info->unidad_cubierto;?> m<sup>2</sup>
        </p>
        <a href="/contacto" class="masinfo">Más información</a>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-8">
    <div id="unidad<?php echo $unidad;?>" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="<?php echo $plano;?>"  style="width:90%;" />
            </div>
            <?php if($plano2!=''){?>
            <div class="carousel-item">
                <img style="width:90%;" src="<?php echo $plano2;?>">
            </div>
            <?php }?>
            <?php if($plano3!=''){?>
            <div class="carousel-item">
                <img style="width:90%;" src="<?php echo $plano3;?>">
            </div>
            <?php }?>
        </div>
        <a class="carousel-control-prev" href="#unidad<?php echo $unidad;?>" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#unidad<?php echo $unidad;?>" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <ol class="carousel-indicators">
            <li data-target="#unidad<?php echo $unidad;?>" data-slide-to="0" class="active"></li>
            <?php if($plano2!=''){?>
            <li data-target="#unidad<?php echo $unidad;?>" data-slide-to="1"></li>
            <?php }?>
            <?php if($plano3!=''){?>
            <li data-target="#unidad<?php echo $unidad;?>" data-slide-to="2"></li>
            <?php }?>
        </ol>
    </div>
    </div>
</div>
