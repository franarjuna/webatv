<?php include("header.php"); ?>
<!-- Begin page -->
<div id="wrapper">
    <?php include("top.php"); ?>
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">Configuración</h4>

                            <form role="form" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="procesarform" value="1">
                                <input type="hidden" name="<?php echo $primary; ?>" value="<?php echo intval($rs[$primary]); ?>">

                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var section = '<?php echo $section; ?>';
        var ajaxsource = '';
    </script>
    <?php include("footer.php"); ?>