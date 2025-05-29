<?php

/* TABLAS */
$maintable = "atv";
 
/* GRUPO */
$module_group = "Contenido";

/* TITULO DE SECCION */
$module_title = "Contenido ATV - Equipo";

/* QUE COSAS VA A LISTAR */
$list = array("atv_nombre");

/* * ***************************************************
 * Todos los campos a editar:					     *
 * 	Primer array son titulos agrupadores de campos   *
 * 	----->segundo son los campos                     *
 * 	---------->tercero las especificaciones          *
 * *************************************************** */
$fields = array(
    "atv_nombre" => array(
        "fieldlabel" => "Nombre seccion", 
        "fieldcomponent" => "texto", //Tipo de componente
        "validation" => array("required" => "required")
    ),
    "imagen" => array(
        "fieldlabel" => "Imagen", 
        "fieldcomponent" => "imagen", 
    ),
    "mision" => array(
        "fieldlabel" => "Misión", 
        "fieldcomponent" => "textarea"
    ),
    "vision" => array(
        "fieldlabel" => "Visión", 
        "fieldcomponent" => "textarea"
    ),
    "cita" => array(
        "fieldlabel" => "Cita", 
        "fieldcomponent" => "textarea"
    ),
);


/* Existen otros tipos (oculto, fijo, etc), para conocer todos ver base-printfield */


/* LOS CAMPOS QUE EDITA */
$edita = array(
    array(
        "titulo" => "", //Divido el editor en subsecciones
        "opciones" => array(
        )
    )
);

//$listfilters = array());

/* ORDEN POR DEFAULT */
//$orden= "ORDER BY autor_id";
$orden = "ORDER BY atv_nombre ASC";

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
