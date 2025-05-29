<?php

/* TABLAS */
$maintable = "aboutus";
$redir = "aboutus";

/* GRUPO */
$module_group = "Contenido";

/* TITULO DE SECCION */
$module_title = "About Us";

/* QUE COSAS VA A LISTAR */
$list = array("aboutus_nombre","aboutus_titulo","aboutus_activo");

/* * ***************************************************
 * Todos los campos a editar:					     *
 * 	Primer array son titulos agrupadores de campos   *
 * 	----->segundo son los campos                     *
 * 	---------->tercero las especificaciones          *
 * *************************************************** */
$fields = array(
    "aboutus_nombre" => array(
        "fieldlabel" => "Nombre", //Nombre campo
        "fieldcomponent" => "texto", //Tipo de componente
        "validation" => array("required" => "required")
    ),
    "aboutus_imagen" => array(
        "fieldlabel" => "Imagen", //Nombre campo
        "fieldcomponent" => "imagen", //Tipo de componente
		"crop" => "o|x750|x1500",
        "validation" => array("required" => "required")
    ),
    "aboutus_texto" => array(
        "fieldlabel" => "Texto", //Nombre campo
        "fieldcomponent" => "textarea"
    ),
    "aboutus_activo" => array(
        "fieldlabel" => "Activo", //Nombre campo
        "fieldcomponent" => "boolean"
    ),
    "aboutus_destacado" => array(
        "fieldlabel" => "Destacado", //Nombre campo
        "fieldcomponent" => "boolean"
    ),
    "aboutus_titulo" => array(
        "fieldlabel" => "Titulo", //Nombre campo
        "fieldcomponent" => "texto"
    ),
	"aboutus_orden" => array(
        "fieldlabel" => "Orden", //Nombre campo
        "fieldcomponent" => "numero"
    )
);

/* LOS CAMPOS QUE EDITA */
$edita = array(
    array(
        "titulo" => "", //Divido el editor en subsecciones
        "opciones" => array(
			"aboutus_activo",
			"aboutus_nombre",
			"aboutus_destacado",
			"aboutus_titulo",
			"aboutus_texto",
			"aboutus_imagen",
			"aboutus_orden"
        )
    )
);

//$listfilters = array());

/* ORDEN POR DEFAULT */
//$orden= "ORDER BY autor_id";
$orden = "ORDER BY aboutus_nombre ASC";

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
    "additem" => 1,
    "delete" => 1,
    "multidelete" => 0,
    "export" => 0
);
?>