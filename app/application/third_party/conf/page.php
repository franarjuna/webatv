<?php

/* TABLAS */
$maintable = "contenido";

/* GRUPO */
$module_group = "Sistema";

/* TITULO DE SECCION */
$module_title = "Paginas";

/* QUE COSAS VA A LISTAR */
$list = array("contenido_nombre");

/* * ***************************************************
* Todos los campos a editar:					     *
* 	Primer array son titulos agrupadores de campos   *
* 	----->segundo son los campos                     *
* 	---------->tercero las especificaciones          *
* *************************************************** */
$fields = array(
	"contenido_id" => array(
		"fieldlabel" => "ID", //Nombre campo
		"fieldcomponent" => "texto", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"contenido_nombre" => array(
		"fieldlabel" => "Nombre / Cliente", //Nombre campo
		"fieldcomponent" => "texto", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"contenido_activo" => array(
		"fieldlabel" => "Activar", //Nombre campo
		"fieldcomponent" => "boolean", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"contenido_orden" => array(
		"fieldlabel" => "Orden", //Nombre campo
		"fieldcomponent" => "texto", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"contenido_link" => array(
		"fieldlabel" => "ULR (minusculas y sin espacios)", //Nombre campo
		"fieldcomponent" => "texto"
	),
	"contenido_contenido" => array(
		"fieldlabel" => "Contenido", //Nombre campo
		"fieldcomponent" => "contenido"

	)
);
/* Existen otros tipos (oculto, fijo, etc), para conocer todos ver base-printfield */


/* LOS CAMPOS QUE EDITA */
$edita = array(
	array(
		"titulo" => "", //Divido el editor en subsecciones
		"opciones" => array(
			"contenido_nombre",
			"contenido_activo",
			"contenido_link",
			"contenido_orden"
		)
	)/*,
	array(
		"titulo" => "Imagenes", //Divido el editor en subsecciones
		"opciones" => array(
			"contenido_imagen",
			"contenido_imagen2"
		)
	),
	array(
		"titulo" => "Video", //Divido el editor en subsecciones
		"opciones" => array(
			"contenido_link"
		)
	)*/
);

//$listfilters = array());

/* ORDEN POR DEFAULT */
//$orden= "ORDER BY autor_id";
$orden = "ORDER BY contenido_nombre ASC";

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
$sqlfiltro="contenido_tipo='W'";
?>
