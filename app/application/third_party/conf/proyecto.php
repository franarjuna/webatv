<?php

/* TABLAS */
$maintable = "proyecto";
 
/* GRUPO */
$module_group = "Contenido";

/* TITULO DE SECCION */
$module_title = "Proyectos";

/* QUE COSAS VA A LISTAR */
$list = array("proyecto_nombre","familia","slug","activo");

/* * ***************************************************
 * Todos los campos a editar:					     *
 * 	Primer array son titulos agrupadores de campos   *
 * 	----->segundo son los campos                     *
 * 	---------->tercero las especificaciones          *
 * *************************************************** */
$fields = array(
    "proyecto_nombre" => array(
        "fieldlabel" => "Nombre", //Nombre campo
        "fieldcomponent" => "texto", //Tipo de componente
        "validation" => array("required" => "required")
    ),
    "familia" => array(
        "fieldlabel" => "Familia", //Nombre campo
        "fieldcomponent" => "radio", //Tipo de componente
        "validation" => array("required" => "required"),
        "opciones" => array('sens' => "Sens",'liv'=>'Liv','urbanismo'=>'Urbanismo',''=>'Sin familia')
    ),
    "slug" => array(
        "fieldlabel" => "URL", //Nombre campo
        "fieldcomponent" => "slug", //Tipo de componente
        "validation" => array("required" => "required")
    ),
    "activo" => array(
        "fieldlabel" => "Activo", //Nombre campo
        "fieldcomponent" => "boolean"
    ),
    
    "usuario" => array(
        "fieldlabel" => "Usuario", //Nombre campo
        "fieldcomponent" => "ctrlid",
        "defaultvalue" => $_SESSION['cid']
    ),
	"contenido" => array(
		"fieldlabel" => "Contenido", //Nombre campo
		"fieldcomponent" => "contenido",
        "tipocontenido" => "proyecto"
	),
    "teamhead" => array(
        "fieldlabel" => "SEO", 
        "fieldcomponent" => "separador"
    ),
    "seo_description" => array(
        "fieldlabel" => "Description", //Nombre campo
        "fieldcomponent" => "textarea"
    )
);
/* Existen otros tipos (oculto, fijo, etc), para conocer todos ver base-printfield */


/* LOS CAMPOS QUE EDITA */
$edita = array(
    array(
        "titulo" => "", //Divido el editor en subsecciones
        "opciones" => array(
			"activo",
			"titulo",
			"dialogotipo",
			"foto",
			"fecha",
			"texto",
			"oradores"
        )
    )
);

//$listfilters = array());

/* ORDEN POR DEFAULT */
//$orden= "ORDER BY autor_id";
$orden = "ORDER BY familia, proyecto_nombre ASC";

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
