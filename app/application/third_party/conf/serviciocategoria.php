<?php

/* TABLAS */
$maintable = "serviciocategoria";

/* GRUPO */
$module_group = "Sistema";

/* TITULO DE SECCION */
$module_title = "Categorias de serviciocategorias";

/* QUE COSAS VA A LISTAR */
$list = array("serviciocategoria_nombre","serviciocategoria_orden");

/* * ***************************************************
 * Todos los campos a editar:					     *
 * 	Primer array son titulos agrupadores de campos   *
 * 	----->segundo son los campos                     *
 * 	---------->tercero las especificaciones          *
 * *************************************************** */
$fields = array(
    "serviciocategoria_nombre" => array(
        "fieldlabel" => "Nombre", //Nombre campo
        "fieldcomponent" => "texto", //Tipo de componente
        "validation" => array("required" => "required")
    ),
    "serviciocategoria_orden" => array(
        "fieldlabel" => "Orden", //Nombre campo
        "fieldcomponent" => "numero"
    )
);
/* Existen otros tipos (oculto, fijo, etc), para conocer todos ver base-printfield */


/* LOS CAMPOS QUE EDITA */
$edita = array(
    array(
        "titulo" => "", //Divido el editor en subsecciones
        "opciones" => array(
			"serviciocategoria_nombre",
			"serviciocategoria_orden"
        )
    )
);

//$listfilters = array());

/* ORDEN POR DEFAULT */
//$orden= "ORDER BY autor_id";
$orden = "ORDER BY serviciocategoria_id DESC";

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