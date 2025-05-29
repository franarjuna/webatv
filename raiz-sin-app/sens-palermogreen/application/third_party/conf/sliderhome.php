<?php

/* TABLAS */
$maintable = "sliderhome";

/* GRUPO */
$module_group = "Contenido";

/* TITULO DE SECCION */
$module_title = "Slider Home";

/* QUE COSAS VA A LISTAR */
$list = array("sliderhome_nombre","sliderhome_activo");

/* * ***************************************************
 * Todos los campos a editar:					     *
 * 	Primer array son titulos agrupadores de campos   *
 * 	----->segundo son los campos                     *
 * 	---------->tercero las especificaciones          *
 * *************************************************** */
$fields = array(
    "sliderhome_nombre" => array(
        "fieldlabel" => "Nombre", //Nombre campo
        "fieldcomponent" => "texto", //Tipo de componente
        "validation" => array("required" => "required")
    ),
    "sliderhome_imagen" => array(
        "fieldlabel" => "Imagen", //Nombre campo
        "fieldcomponent" => "imagen", //Tipo de componente
        "validation" => array("required" => "required")
    ),
    "sliderhome_activo" => array(
        "fieldlabel" => "Activo", //Nombre campo
        "fieldcomponent" => "boolean"
    ),
    "sliderhome_blanco" => array(
        "fieldlabel" => "Texto blanco?", //Nombre campo
        "notes" => "Si no es blanco, va en negro", //Nombre campo
        "fieldcomponent" => "boolean"
    ),
    "sliderhome_texto" => array(
        "fieldlabel" => "Texto", //Nombre campo
        "fieldcomponent" => "textarea"
    ),
    "sliderhome_link" => array(
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
			"sliderhome_activo",
			"sliderhome_nombre",
			"sliderhome_link",
			"sliderhome_texto",
			"sliderhome_blanco",
			"sliderhome_imagen"
        )
    )
);

//$listfilters = array());

/* ORDEN POR DEFAULT */
//$orden= "ORDER BY autor_id";
$orden = "ORDER BY sliderhome_nombre ASC";

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
