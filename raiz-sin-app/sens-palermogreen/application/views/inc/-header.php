<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>FBDI</title>
  <meta name="description" content="Estudio FBDI &copy;">
  <meta name="author" content="Estudio FBDI &copy;">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.css?v=<?php echo time();?>">
  <link href='//fonts.googleapis.com/css?family=Open+Sans|Roboto+Condensed:300italic,400italic,700italic,400,300,700|Roboto:400,900|Montserrat:400,500,700,800,900' rel='stylesheet' type='text/css' />
  <link href="//cloud.webtype.com/css/dd3a1bc3-862f-427e-bf49-beb0a0dcd662.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
  <header>
    <div style="width:100%;background-color:#000;height:25px;">
      <ul class="headernew">
        <li><a href="/" <?php echo ($section=='')?'class="activo"':''?>>Home</a></li>
        <li><a href="/work" <?php echo ($section=='work' || $section=='detail')?'class="activo"':''?>>Work</a></li>
        <li><a href="/aboutus" <?php echo ($section=='aboutus')?'class="activo"':''?>>About Us</a></li>
        <li><a href="/explora" <?php echo ($section=='explora')?'class="activo"':''?>>Explora</a></li>
      </ul></div>
    <div class="row">
      <div class="col-md-4"><a href="/"><img src="http://www.estudiofbdi.com/img/logofbdi.png" class="logo"></a></div>
      <div class="col-md-8">

      </div>
    </div>
  </header>
