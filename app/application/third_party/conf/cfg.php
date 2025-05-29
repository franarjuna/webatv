<?php

/* TABLAS */
$maintable = "cfg";

/* GRUPO */
$module_group = "Contenido";

/* TITULO DE SECCION */
$module_title = "Configuración General";

/* QUE COSAS VA A LISTAR */
$list = array("cfg_direccion","cfg_email");

/* * ***************************************************
* Todos los campos a editar:					     *
* 	Primer array son titulos agrupadores de campos   *
* 	----->segundo son los campos                     *
* 	---------->tercero las especificaciones          *
* *************************************************** */
$fields = array(
  "cfg_nombre" => array(
    "fieldlabel" => "Nombre", //Nombre campo
    "fieldcomponent" => "texto", //Tipo de componente
    "validation" => array("required" => "required")
  ),
  "cfg_direccion" => array(
    "fieldlabel" => "Dirección", //Nombre campo
    "fieldcomponent" => "textarea"
  ),
  "cfg_direccion2" => array(
    "fieldlabel" => "Dirección 2", //Nombre campo
    "fieldcomponent" => "textarea"
  ),
  "cfg_direccion2" => array(
    "fieldlabel" => "Dirección 2", //Nombre campo
    "fieldcomponent" => "textarea"
  ),
  "cfg_textoheader" => array(
    "fieldlabel" => "Texto Explora", //Nombre campo
    "fieldcomponent" => "textarea"
  ),
  "cfg_textowork" => array(
    "fieldlabel" => "Texto Work", //Nombre campo
    "fieldcomponent" => "textarea"
  ),
  "cfg_textoabout" => array(
    "fieldlabel" => "Texto About", //Nombre campo
    "fieldcomponent" => "textarea"
  ),
  "cfg_textofooter" => array(
    "fieldlabel" => "Texto Footer", //Nombre campo
    "fieldcomponent" => "textarea"
  ),
  "cfg_email" => array(
    "fieldlabel" => "Email de contacto", //Nombre campo
    "fieldcomponent" => "texto"
  ),
  "cfg_email2" => array(
    "fieldlabel" => "Email de contacto 2", //Nombre campo
    "fieldcomponent" => "texto"
  ),
  "cfg_emailnewprojects" => array(
    "fieldlabel" => "Email de Nuevos proyectos", //Nombre campo
    "fieldcomponent" => "texto"
  ),
  "cfg_emailexplora" => array(
    "fieldlabel" => "Email de Explora", //Nombre campo
    "fieldcomponent" => "texto"
  ),
  "cfg_emailjoin" => array(
    "fieldlabel" => "Email Join Us", //Nombre campo
    "fieldcomponent" => "texto"
  ),
  "cfg_fb" => array(
    "fieldlabel" => "Link a Facebook", //Nombre campo
    "fieldcomponent" => "texto"
  ),
  "cfg_tw" => array(
    "fieldlabel" => "Link a Twitter", //Nombre campo
    "fieldcomponent" => "texto"
  ),
  "cfg_pin" => array(
    "fieldlabel" => "Link a Pinterest", //Nombre campo
    "fieldcomponent" => "texto"
  ),
  "cfg_youtube" => array(
    "fieldlabel" => "Link a YouTube", //Nombre campo
    "fieldcomponent" => "texto"
  ),
  "cfg_vimeo" => array(
    "fieldlabel" => "Link a Vimeo", //Nombre campo
    "fieldcomponent" => "texto"
  ),
  "cfg_behance" => array(
    "fieldlabel" => "Link a Behance", //Nombre campo
    "fieldcomponent" => "texto"
  ),
  "cfg_instagram" => array(
    "fieldlabel" => "Link a Instagram", //Nombre campo
    "fieldcomponent" => "texto"
  ),
  "cfg_fondohome" => array(
    "fieldlabel" => "Fondo texto Home", //Nombre campo
    "fieldcomponent" => "imagen"
  ),
  "cfg_fondoabout" => array(
    "fieldlabel" => "Fondo texto About us", //Nombre campo
    "fieldcomponent" => "imagen"
  ),
  "cfg_fondowork" => array(
    "fieldlabel" => "Fondo texto Work", //Nombre campo
    "fieldcomponent" => "imagen"
  ),
  "cfg_fondoexplora" => array(
    "fieldlabel" => "Fondo texto Explora", //Nombre campo
    "fieldcomponent" => "imagen"
  )
);

/* LOS CAMPOS QUE EDITA */
$edita = array(
  array(
    "titulo" => "", //Divido el editor en subsecciones
    "opciones" => array(
      "cfg_direccion",
      "cfg_direccion2",
      "cfg_email",
      "cfg_email2",
      "cfg_emailnewprojects",
      "cfg_emailexplora",
      "cfg_emailjoin"
    )
  ),
  array(
    "titulo" => "Textos", //Divido el editor en subsecciones
    "opciones" => array(
      "cfg_textoheader",
      "cfg_textoabout",
      "cfg_textowork",
      "cfg_textofooter",
      "cfg_fondohome",
      "cfg_fondowork",
      "cfg_fondoabout",
      "cfg_fondoexplora"
    )
  ),
  array(
    "titulo" => "Redes Sociales", //Divido el editor en subsecciones
    "opciones" => array(
      "cfg_fb",
      "cfg_tw",
      "cfg_pin",
      "cfg_youtube",
      "cfg_vimeo",
      "cfg_behance",
      "cfg_instagram"
    )
  )
);

//$listfilters = array());

/* ORDEN POR DEFAULT */
//$orden= "ORDER BY autor_id";
$orden = "ORDER BY cfg_youtube ASC";

/* QUE VIEW LEVANATAN LAS ACCIONES */
$module_action = array(
  "edit" => 'form.php',
  "new" => 'form.php',
  "list" => 'list.php',
  "actions" => 'actions.php',
  "crop" => 'cropper.php',
  "ajax" => 'ajax.php'
);

/* QUE ACCIONES ESTAN HABILITADAS */
$actions = array(
  "id" => 0,
  "edit" => 1,
  "additem" => 0,
  "delete" => 0,
  "multidelete" => 0,
  "export" => 0
);
?>
