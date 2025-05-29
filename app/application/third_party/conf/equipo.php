<?php

/* TABLAS */
$maintable = "equipo";
 
/* GRUPO */
$module_group = "Contenido";

/* TITULO DE SECCION */
$module_title = "Contenido ATV - Equipo";

/* QUE COSAS VA A LISTAR */
$list = array("equipo_nombre","cargo","gerencia",'categoria');

/* * ***************************************************
 * Todos los campos a editar:					     *
 * 	Primer array son titulos agrupadores de campos   *
 * 	----->segundo son los campos                     *
 * 	---------->tercero las especificaciones          *
 * *************************************************** */
$fields = array(
    "equipo_nombre" => array(
        "fieldlabel" => "Nombre", 
        "fieldcomponent" => "texto", //Tipo de componente
        "validation" => array("required" => "required")
    ),
    "imagen" => array(
        "fieldlabel" => "Imagen", 
        "fieldcomponent" => "imagen", 
    ),
    "categoria" => array(
        "fieldlabel" => "Categoria", 
        "fieldcomponent" => "radio", 
        "opciones" => ['produccion'=>"Area Producción",'comercial'=>'Area Comercial','planificacion'=>'Gerente Planificación','personas'=>'Responsable de Area de personas y Cultura','administracion'=> 'Administración y finanzas','proyectual'=>'Area Proyectual','' => 'N/A'], 
    ),
    "orden" => array(
        "fieldlabel" => "Orden", 
        "fieldcomponent" => "texto"
    ),
    "cargo" => array(
        "fieldlabel" => "Cargo", 
        "fieldcomponent" => "texto"
    ),
    "texto" => array(
        "fieldlabel" => "Texto", 
        "fieldcomponent" => "textarea"
    ),
    "gerencia" => array(
        "fieldlabel" => "Es destacado?", 
        "fieldcomponent" => "boolean"
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
$orden = "ORDER BY equipo_nombre ASC";

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
