<?php

/* TABLAS */
$maintable = "slideratv";

/* GRUPO */
$module_group = "Contenido";

/* TITULO DE SECCION */
$module_title = "Slider Equipo";

/* QUE COSAS VA A LISTAR */
$list = array("slideratv_nombre","slideratv_activo");

/* * ***************************************************
 * Todos los campos a editar:					     *
 * 	Primer array son titulos agrupadores de campos   *
 * 	----->segundo son los campos                     *
 * 	---------->tercero las especificaciones          *
 * *************************************************** */
$fields = array(
    "slideratv_nombre" => array(
        "fieldlabel" => "Nombre", //Nombre campo
        "fieldcomponent" => "texto", //Tipo de componente
        "validation" => array("required" => "required")
    ),
    "slideratv_imagen" => array(
        "fieldlabel" => "Imagen", //Nombre campo
        "fieldcomponent" => "imagen", //Tipo de componente
        "validation" => array("required" => "required")
    ),
    "slideratv_activo" => array(
        "fieldlabel" => "Activo", //Nombre campo
        "fieldcomponent" => "boolean"
    ),
    "slideratv_blanco" => array(
        "fieldlabel" => "Texto", //Nombre campo
        "fieldcomponent" => "boolean"
    ),
    "slideratv_texto" => array(
        "fieldlabel" => "Texto", //Nombre campo
        "fieldcomponent" => "textarea"
    ),
    "slideratv_link" => array(
        "fieldlabel" => "Link", //Nombre campo
        "fieldcomponent" => "texto"
    )
);
/* Existen otros tipos (oculto, fijo, etc), para conocer todos ver base-printfield */


/* LOS CAMPOS QUE EDITA */
$edita = array(
    array(
        "titulo" => "", //Divido el editor en subsecciones
        "opciones" => array(
			"slideratv_activo",
			"slideratv_nombre",
			"slideratv_link",
			"slideratv_texto",
			"slideratv_blanco",
			"slideratv_imagen"
        )
    )
);

//$listfilters = array());

/* ORDEN POR DEFAULT */
//$orden= "ORDER BY autor_id";
$orden = "ORDER BY slideratv_nombre ASC";

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
