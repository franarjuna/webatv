<div class="row">
    <div class="col-md-2 unidaddetail">
        <a class="volver">Volver</a>
        <h3>Unidad <?php echo $unidad; ?></h3>
        <p>
            <b>Superficie cubierta</b><br>
            <?php echo $info->unidad_superficie; ?> m<sup>2</sup><br>
            <b>Expansión</b><br>
            <?php echo $info->unidad_cubierto; ?> m<sup>2</sup><br>
            <b>Subtotal Unidad</b><br>
            <?php echo $info->unidad_superficie + $info->unidad_cubierto; ?> m<sup>2</sup><br>
            <b>Amenities</b><br>
            <?php echo $info->sup_amenities; ?> m<sup>2</sup><br>
            <b>Total con Amenities</b><br>
            <?php echo $info->sup_total_amenities; ?> m<sup>2</sup>
        </p>
        <?php if ($info->reservada == 1) { ?>
            <div class="reservado">RESERVADO</div>
        <?php } ?>
        <a href="<?php echo base_url(); ?>/contacto" class="masinfo">Más información</a>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-8">
        <div id="unidad<?php echo $unidad; ?>" class="carousel slide" data-ride="carousel">
            <?php if ($plano2 != '') { ?>
                <a class="carousel-control-prev" href="#unidad<?php echo $unidad; ?>" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon2" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#unidad<?php echo $unidad; ?>" role="button" data-slide="next">
                    <span class="carousel-control-next-icon2" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            <?php } ?>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo $plano; ?>" class="imagenunidad" style="width:90%;margin:0px auto;display: flex;" />
                </div>
                <?php if ($plano2 != '') { ?>
                    <div class="carousel-item">
                        <img style="width:90%;margin:0px auto;display: flex;" src="<?php echo $plano2; ?>">
                    </div>
                <?php } ?>
                <?php if ($plano3 != '') { ?>
                    <div class="carousel-item">
                        <img style="width:90%;margin:0px auto;display: flex;" src="<?php echo $plano3; ?>">
                    </div>
                <?php } ?>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#unidad<?php echo $unidad; ?>" data-slide-to="0" class="active"></li>
                <?php if ($plano2 != '') { ?>
                    <li data-target="#unidad<?php echo $unidad; ?>" data-slide-to="1"></li>
                <?php } ?>
                <?php if ($plano3 != '') { ?>
                    <li data-target="#unidad<?php echo $unidad; ?>" data-slide-to="2"></li>
                <?php } ?>
            </ol>
        </div>
    </div>
</div>