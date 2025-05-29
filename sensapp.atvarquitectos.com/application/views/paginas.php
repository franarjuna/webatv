<?php include("inc/header.php");?>
<?php
if($datadb!==FALSE && !empty($datadb)){
  //DATA
  function cmp($a, $b)
  {
      if ($a['orden'] == $b['orden']) {
          return 0;
      }
      return ($a['orden'] < $b['orden']) ? -1 : 1;
  }
  usort($datadb,"cmp");
  foreach($datadb as $kdb=>$dtdb){
    
    switch($dtdb['tipo']){
        case 7: // Background + Texto
            
            $addbkg = '';
            $url = '';
            if(isset($dtdb['fondo']) && is_array($dtdb['fondo'])){
                foreach($dtdb['fondo'] as $file){
                    $url = $file;
                  //echo (isset($file))?"<img src='/upfiles/".$file."' class='w-100'>":'';
                }
              }

              $bgsechover = '';
            if($dtdb['columna2']!=''){
              $bgsechover = 'bgsechover';
            }
            echo '<section id="sec'.$kdb.'" class="bgsection '.$bgsechover.' animar" ';
            if(strstr($url,'.mp4')!==FALSE && strstr($url,'.mov')!==-FALSE){
                //es video
                $addbkg='<video  autoplay loop muted playsinline id="myVideo" >';
                $addbkg.='<source src="upfiles/'.$url.'">';
                $addbkg.='</video>';
            }else{
                //es imagen
                echo ' style="background-image:url(/upfiles/'.$url.')"';
            }
            echo ' data-aos="new-animation" class="animar bgytxt">';
            //echo '<section id="sec'.$kdb.'" data-aos="new-animation" class="animar">';
            echo '<div class="centered">';
                echo '<h3 class="title" data-aos="new-animation"  id="centered'.$kdb.'">'.nl2br($dtdb['titulo2']).'</h3>';
                if($dtdb['columna1']!=''){
                    echo '<p>'.nl2br($dtdb['columna1']).'</p>';
                }
                if($dtdb['columna2']!=''){
                    echo '<a class="btnmore" href="'.$dtdb['columna3'].'">'.$dtdb['columna2'].'</a>';
                }
                
        
            echo '</div>';
            echo $addbkg;
            echo '</section>';
        break;
        case 13:
            echo '<section class="animar">';
                echo '<div class="container-fluid">';
                    echo '<div class="row quotegreen">';
                        echo '<div class="col-12">';
                            echo '<q>'.$dtdb['titulo'].'</q>';
                            echo '<p>'.nl2br($dtdb['texto']).'</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        break;
        case 6: //slider
        case 4: //slider
            echo '<section class="animar">';
                echo '<div class="container-fluid">';
                    echo '<div class="row textnpic p-0">';
                        echo '<div id="sensatvcar'.$kdb.'" class="carousel slide" data-ride="carousel">';
                            echo '<div class="carousel-inner">';
                            $x=0;
                            if(isset($dtdb['galeria']) && is_array($dtdb['galeria'])){
                                foreach($dtdb['galeria'] as $file){
                                    echo '<div class="carousel-item '.(($x == 0)?'active':'').'">
                                        <img class="d-block w-100" src="/upfiles/'.$file.'" alt="First slide">
                                    </div>';
                                    $x++;
                                }
                            }
                            echo '</div>';
                        echo '</div>';
                        echo '<a class="carousel-control-prev" href="#sensatvcar'.$kdb.'" role="button" data-slide="prev">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 61.81 50.76">
                            <g id="Capa_2" data-name="Capa 2">
                                <g id="Layer_1" data-name="Layer 1">
                                    <line class="cls-1" x1="61.81" y1="25.38" x2="1.41" y2="25.38" />
                                    <polyline class="cls-1" points="26.09 50.05 1.41 25.38 26.09 0.71" />
                                </g>
                            </g>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#sensatvcar'.$kdb.'" role="button" data-slide="next">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 61.81 50.76">
                            <g id="Capa_2" data-name="Capa 2">
                                <g id="Layer_1" data-name="Layer 1">
                                    <line class="cls-1" x1="61.81" y1="25.38" x2="1.41" y2="25.38" />
                                    <polyline class="cls-1" points="26.09 50.05 1.41 25.38 26.09 0.71" />
                                </g>
                            </g>
                        </svg>
                        <span class="sr-only">Next</span>
                    </a>';
                echo '</div>';
            echo '</section>';
        break;
        case 11:
        case 12:
          echo '<section class="animar">';
            $texto = '<div class="col-12 col-md-6">';
            $texto .= '<h4 class="title">'.nl2br($dtdb['titulo']).'</h4>';
            $texto .= '<p>'.nl2br($dtdb['texto']).'</p>';
            $texto .= '</div>';
            $imagen = '<div class="col-12 col-md-5">';
            if(isset($dtdb['galeria']) && is_array($dtdb['galeria'])){
              $imagen .= '<div id="sensatvcar'.$kdb.'" class="carousel slide" data-ride="carousel">';
              $imagen .= '<div class="carousel-inner">';
                            $x=0;
                            if(isset($dtdb['galeria']) && is_array($dtdb['galeria'])){
                                foreach($dtdb['galeria'] as $file){
                                  $imagen .= '<div class="carousel-item '.(($x == 0)?'active':'').'">
                                        <img class="d-block w-100" src="/upfiles/'.$file.'" alt="First slide">
                                    </div>';
                                    $x++;
                                }
                            }
                            $imagen .= '</div>';
                            $imagen .= '</div>';
                            $imagen .= '<a class="carousel-control-prev" href="#sensatvcar'.$kdb.'" role="button" data-slide="prev">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 61.81 50.76">
                            <g id="Capa_2" data-name="Capa 2">
                                <g id="Layer_1" data-name="Layer 1">
                                    <line class="cls-1" x1="61.81" y1="25.38" x2="1.41" y2="25.38" />
                                    <polyline class="cls-1" points="26.09 50.05 1.41 25.38 26.09 0.71" />
                                </g>
                            </g>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#sensatvcar'.$kdb.'" role="button" data-slide="next">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 61.81 50.76">
                            <g id="Capa_2" data-name="Capa 2">
                                <g id="Layer_1" data-name="Layer 1">
                                    <line class="cls-1" x1="61.81" y1="25.38" x2="1.41" y2="25.38" />
                                    <polyline class="cls-1" points="26.09 50.05 1.41 25.38 26.09 0.71" />
                                </g>
                            </g>
                        </svg>
                        <span class="sr-only">Next</span>
                    </a>';
                /*foreach($dtdb['file'] as $file){
                    $imagen .= '<img class="d-block w-100" src="/upfiles/'.$file.'">';
                }*/
            }
            $imagen .= '</div>';
            echo '<div class="container-fluid">';
                echo '<div class="row textnpic p-md-5">';
                    echo ($dtdb['tipo'] == 11)?$texto:$imagen;
                    echo '<div class="col-1"></div>';
                    echo ($dtdb['tipo'] != 11)?$texto:$imagen;
                echo '</div>';
            echo '</div>';
            echo '</section>';
        break;
        case 5:
          $link = $dtdb['video'];     
          echo '<section class="bgytxt ytvideo animar">';   
          echo '<div class="container-fluid">';
          echo '<div style="position:relative;padding-top:56.25%;">';
          

          if(strstr($link,'vimeo')!==FALSE){
            $link = str_replace("https://vimeo.com/","https://player.vimeo.com/video/",$link);//https://player.vimeo.com/video/336812660
          }else{
            $link = str_replace("https://youtu.be/","https://www.youtube.com/embed/",$link);//https://player.vimeo.com/video/336812660
          }
          
          echo '<iframe title="vimeo-player" src="'.$link.'" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allowfullscreen></iframe>';
          echo '</div>';
          echo '</div>';
          echo '</section>';
        break;
        case 18: // 	Destacado con fondo
        case 14: // 	Destacado con fondo
          $img ='';
          $img2 ='';
          $x = 0;
          if(isset($dtdb['galeria']) && is_array($dtdb['galeria'])){
            $bgrand = rand(0,1000);
            foreach($dtdb['galeria'] as $file){
              echo "<style>";
              echo ".bg".$bgrand."{
                background-image:url(/upfiles/".$file.")
              }";
              echo "</style>";
              //$img = "style='background-image:url(/upfiles/".$file.")'";
              $x++;
            }
          }
          if(isset($dtdb['galeriam']) && is_array($dtdb['galeriam'])){
            foreach($dtdb['galeriam'] as $file){
              echo "<style>
                @media (max-width: 1280px) {";
                echo ".bg".$bgrand."{
                  background-image:url(/upfiles/".$file.")
                }
              }";
              echo "</style>";
              //$img2 = "style='background-image:url(/upfiles/".$file.")'";
                $x++;
            }
          }
          echo '<section class="bgytxt animar bg'.$bgrand.'" >';
            echo '<div class="container-fluid">';
                echo '<div class="row quotebck '.(($dtdb['tipo'] == 18)?'qblanco':'').'">';
                    echo '<div class="col-12 centeredquote">';
                        echo '<q>'.$dtdb['titulo'].'</q>';
                        echo '<p>'.nl2br($dtdb['texto']).'</p>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
          echo '</section>';
        break;

        case 16: // 
          echo '<section class="bgytxt animar">';
          echo '<div class="container-fluid p-0" style="height:100vh">';
          echo '<div id="map" style="width:100%;height:100%;"></div>';
          echo '</div>';
          echo '</section>';
          $haymapa = 1;
        break;
        case 15: // 
          $x=0;
          $img ='';
          if(isset($dtdb['galeria']) && is_array($dtdb['galeria'])){
            foreach($dtdb['galeria'] as $file){
              $img = "style='background-size:cover;background-image:url(/upfiles/".$file.")'";
                $x++;
            }
          }
          $img2 ='';
          if(isset($dtdb['bkgtxt']) && is_array($dtdb['bkgtxt'])){
            foreach($dtdb['bkgtxt'] as $file){
              $img2 = "style='background-size:cover;background-image:url(/upfiles/".$file.")'";
                $x++;
            }
          }
          $img3 ='';
          if(isset($dtdb['imagen']) && is_array($dtdb['imagen'])){
            foreach($dtdb['imagen'] as $file){
              $img3 = "style='min-height:70vh;background-size:cover;background-image:url(/upfiles/".$file.")'";
                $x++;
            }
          } 

        echo '<section class=" animar" '.$img.'>';
            echo '<div class="container-fluid marginado">';
                echo '<div class="row">';
                    echo '<div class="col-12 col-md-6" '.$img3.'>';

                    echo "</div>";
                    echo '<div class="col-12 col-md-6" '.$img2.'><div class="quotewhite">';
                        echo '<q>'.$dtdb['titulo'].'</q>';
                    echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
          echo '</section>';
        break;
        case 17:
          $img ='';
          $x=0;
          if(isset($dtdb['thumbnail']) && is_array($dtdb['thumbnail'])){
            foreach($dtdb['thumbnail'] as $file){
              $img = "/upfiles/".$file;
                $x++;
            }
          } 
          $img2 ='';
          if(isset($dtdb['thumbnail2']) && is_array($dtdb['thumbnail2'])){
            foreach($dtdb['thumbnail2'] as $file){
              $img2 = "/upfiles/".$file;
                $x++;
            }
          } 
          $img3 ='';
          if(isset($dtdb['thumbnail3']) && is_array($dtdb['thumbnail3'])){
            foreach($dtdb['thumbnail3'] as $file){
              $img3 = "/upfiles/".$file;
                $x++;
            }
          } 

          echo '<section id="galeriasection">
          <div class="container-fluid">
              <div class="row p-0 gallerythumbs">
                  <div class="col-12 col-md-4 p-0"><a href="#" data-toggle="modal" data-target="#exampleModal1" ><img src="'.$img.'" class="w-100 d-block"><h6>'.$dtdb['titulo'].'</h6></a></div>
                  <div class="col-12 col-md-4 p-0"><a href="#" data-toggle="modal" data-target="#exampleModal2" ><img src="'.$img2.'" class="w-100 d-block"><h6>'.$dtdb['titulo2'].'</h6></a></div>
                  <div class="col-12 col-md-4 p-0"><a href="#" data-toggle="modal" data-target="#exampleModal3" ><img src="'.$img3.'" class="w-100 d-block"><h6>'.$dtdb['titulo3'].'</h6></a></div>
              </div>
          </div>
      </section>';
      for($a=1;$a<4;$a++){
      echo '<div class="modal fullscreen-modal" tabindex="-1" role="dialog" id="exampleModal'.$a.'">
        <div class="modal-dialog" role="document" style="background:transparent;">
          <div class="modal-content"  style="background:transparent;border:0;">
            <div class="modal-body">';
            //carrusel
            echo '<div id="carousel-thumb'.$a.'" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
            <!--Slides-->
            <div class="carousel-inner" role="listbox">';
            if(isset($dtdb['galeria'.$a]) && is_array($dtdb['galeria'.$a])){
              $x = 1;
              foreach($dtdb['galeria'.$a] as $file){
                echo '<div class="carousel-item '.($x==1?'active':'').'"><img class="d-block w-100" src="/upfiles/'.$file.'" alt="Palermo Green - Sens"></div>';
                $x++;
              }
            } 
            echo '</div>';
            //<!--/.Slides-->
            //<!--Controls-->
            echo '<a class="carousel-control-prev" href="#carousel-thumb'.$a.'" role="button" data-slide="prev"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 61.81 50.76" style="width: 30px;"><defs><style>.cls-1{fill:none;stroke:#fff;stroke-miterlimit:10;stroke-width:2px;}</style></defs><g id="Capa_2" data-name="Capa 2"><g id="Layer_1" data-name="Layer 1"><line class="cls-1" x1="61.81" y1="25.38" x2="1.41" y2="25.38"/><polyline class="cls-1" points="26.09 50.05 1.41 25.38 26.09 0.71"/></g></g></svg><span class="sr-only">Previous</span></a>';
            echo '<a class="carousel-control-next" href="#carousel-thumb'.$a.'" role="button" data-slide="next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 61.81 50.76" style="width: 30px;transform:rotate(180deg)"><defs><style>.cls-1{fill:none;stroke:#fff;stroke-miterlimit:10;stroke-width:2px;}</style></defs><g id="Capa_2" data-name="Capa 2"><g id="Layer_1" data-name="Layer 1"><line class="cls-1" x1="61.81" y1="25.38" x2="1.41" y2="25.38"/><polyline class="cls-1" points="26.09 50.05 1.41 25.38 26.09 0.71"/></g></g></svg><span class="sr-only">Next</span></a>';
            //<!--/.Controls-->
            
            echo '<ol class="carousel-indicators">';
            if(isset($dtdb['galeria'.$a]) && is_array($dtdb['galeria'.$a])){
              $x = 1;
              foreach($dtdb['galeria'.$a] as $file){
                echo '<li data-target="#carousel-thumb'.$a.'" data-slide-to="0" class="active"> <img class="d-block w-100" src="/upfiles/'.$file.'" class="img-fluid"></li>';$x++;
              }
            }
            echo '</ol></div>';
            //fin carrusel
            echo '</div>
          </div>
        </div>
      </div>';
      }
        break;


     /* case 1:
        echo '<div class="container"><div class="row detailtexts">';
          //echo (isset($dtdb['titulo']))?"<div class='col-md-12'><h4>".$dtdb['titulo']."</h4></div>":'';
          echo (isset($dtdb['columna1']))?"<div class='col-md-5 '><strong>".$dtdb['titulo']."</strong><br>".nl2br($dtdb['columna1'])."</div>":'';
          echo (isset($dtdb['columna2']))?"<div class='col-sm-6 col-md-5 offset-md-1 offset-lg-1'>".nl2br($dtdb['columna2'])."</div>":'';
        echo '</div></div>';
      break;//Texto 2 columnas
      case 2:
        echo '<div class="container"><div class="row detailtexts">';
          echo (isset($dtdb['titulo']))?"<div class='col-md-12'><h4>".$dtdb['titulo']."</h4></div>":'';
          echo (isset($dtdb['texto']))?"<div class='col-md-12'>".nl2br($dtdb['texto'])."</div>":'';
        echo '</div></div>';
        break;//Texto 1 columna
      case 7:
      echo '<div class="container"><div class="row detailtexts">';
        //echo (isset($dtdb['titulo']))?"<div class='col-md-12'><h4>".$dtdb['titulo']."</h4></div>":'';
        echo "<div class='col-sm-5 col-md-4 col-lg-4 offset-md-1 offset-lg-1 cita'>";
          if(trim($dtdb['texto'])!=''){
            echo "<span>".$dtdb['texto']."</span>";
          }
          echo "<br>";
          echo "<br>";
          echo $dtdb['titulo'];
        echo "</div>";
        echo "<div class='col-sm-6 col-md-4 col-lg-4 offset-sm-1 offset-md-1 offset-lg-1'>";
          echo nl2br($dtdb['columna1']);
        echo "</div>";
        echo '</div></div>';
        break;//cita + texto
      case 8:
      echo '<div class="container"><div class="row detailtexts">';
        echo "<div class='col-sm-6 col-md-4 col-lg-4 offset-sm-1 offset-md-1 offset-lg-1'>";
          echo "<b>".($dtdb['titulo2'])."</b>";
          echo nl2br($dtdb['columna1']);
        echo "</div>";
        echo "<div class='col-sm-5 col-md-4 col-lg-4 offset-md-1 offset-lg-1 cita'>";
          if(trim($dtdb['texto'])!=''){
            echo "<span>".$dtdb['texto']."</span>";
          }
          echo "<br>";
          echo "<br>";
          echo $dtdb['titulo'];
        echo "</div>";
        echo '</div></div>';
        break;//cita + texto
      case 11:
      echo '<div class="container"><div class="row detailtexts">';
        //echo (isset($dtdb['titulo']))?"<div class='col-md-12'><h4>".$dtdb['titulo']."</h4></div>":'';
        echo "<div class='col-sm-5 col-md-4 col-lg-4 offset-md-1 offset-lg-1 cita'>";
        if(trim($dtdb['texto'])!=''){
          echo "<span>".$dtdb['texto']."</span>";
        }
          echo "<br>";
          echo "<br>";
          echo $dtdb['titulo'];
        echo "</div>";
        echo "<div class='col-sm-6 col-md-6 col-lg-6 offset-sm-1 offset-md-1 offset-lg-1'>";
        if(isset($dtdb['file']) && is_array($dtdb['file'])){
          foreach($dtdb['file'] as $file){
            echo (isset($file))?"<img src='/upfiles/".$file."' class='w-100'>":'';
          }
        }
        echo "</div>";
        echo '</div></div>';
        break;//cita + texto
      case 12:
      echo '<div class="container"><div class="row detailtexts">';
        echo "<div class='col-sm-6 col-md-4 col-lg-4 offset-sm-1 offset-md-1 offset-lg-1'>";
        if(isset($dtdb['file']) && is_array($dtdb['file'])){
        foreach($dtdb['file'] as $file){
          echo (isset($file))?"<img src='/upfiles/".$file."' class='w-100'>":'';
        }
        }
        echo "</div>";
        echo "<div class='col-sm-5 col-md-4 col-lg-4 offset-md-1 offset-lg-1 cita'>";
        if(trim($dtdb['texto'])!=''){
          echo "<span>".$dtdb['texto']."</span>";
        }
          echo "<br>";
          echo "<br>";
          echo $dtdb['titulo'];
        echo "</div>";
        echo '</div></div>';
        break;//cita + texto
      case 13:
      echo '<div class="container"><div class="row detailtexts">';

        echo "<div class='col-sm-8 col-md-8 col-lg-8 offset-md-2 offset-lg-2 cita' style='text-align:center;'>";
        if(trim($dtdb['texto'])!=''){
          echo "<span>".$dtdb['texto']."</span>";
        }
          echo "<br>";
          echo "<br>";
          echo $dtdb['titulo'];
        echo "</div>";
        echo '</div></div>';
        break;//cita + texto
      case 3:
      echo '<div class="container-fluid"><div class="row" style="max-width:90%;margin: 0px auto;">';
      if(isset($dtdb['file']) && is_array($dtdb['file'])){
        foreach($dtdb['file'] as $file){
          echo (isset($file))?"<div class='col-md-6' style='padding-top: 15px;padding-bottom: 15px;'><img src='/upfiles/".$file."' class='w-100'></div>":'';
        }
      }
        echo '</div></div>';
      break;//Damero
      case 6:
      echo '<div class="container-fluid" style="padding:0px;"><div class="row no-gutters">';
      if(isset($dtdb['file']) && is_array($dtdb['file'])){
        foreach($dtdb['file'] as $file){
          echo (isset($file))?"<div class='col-md-12'><img src='/upfiles/".$file."' class='w-100'></div>":'';
        }
      }
        echo '</div></div>';
      break;//full
      case 4:
        echo '<div id="carousel'.$kdb.'" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2500" data-pause="false">';
          echo '<div class="carousel-inner" style="min-height:80vh;">';
        $x = 0;
        if(isset($dtdb['file']) && is_array($dtdb['file'])){
          foreach($dtdb['file'] as $file){
            echo '<div class="carousel-item '.(($x==0)?'active':'').'"><img class="d-block w-100" src="/upfiles/'.$file.'"></div>';
            $x++;
          }
        }
        echo '</div>';
        echo '<ol class="carousel-indicators">';$a=0;
        foreach($dtdb['file'] as $file){
          echo '<li data-target="#carousel'.$kdb.'" data-slide-to="'.$a.'" class="'.(($a==0)?'active':'').'"></li>';
          $a++;
        }
        echo '</ol>';

        echo '</div>';
        echo '</div>';
      break;//Slider
      case 5:
        $link = $dtdb['video'];

        echo '<div class="container">';
        echo '<div style="position:relative;padding-top:56.25%;">';
        $link = str_replace("https://vimeo.com/","https://player.vimeo.com/video/",$link);//https://player.vimeo.com/video/336812660
        echo '<iframe title="vimeo-player" src="'.$link.'" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allowfullscreen></iframe>';

        echo '</div>';
        echo '</div>';
      break;//video*/
    }
   
  }
}
 ?>

<?php include("inc/footer.php");?>
