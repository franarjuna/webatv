<?php

/* TABLAS */
$maintable = "unidad";

/* GRUPO */
$module_group = "Sistema";

/* TITULO DE SECCION */
$module_title = "Unidades";

/* QUE COSAS VA A LISTAR */
$list = array("fk_proyecto_id","unidad_codigo","unidad_nombre","unidad_piso","reservada");

/* * ***************************************************
* Todos los campos a editar:					     *
* 	Primer array son titulos agrupadores de campos   *
* 	----->segundo son los campos                     *
* 	---------->tercero las especificaciones          *
* *************************************************** */
$fields = array(
	"unidad_nombre" => array(
		"fieldlabel" => "Nombre", //Nombre campo
		"fieldcomponent" => "texto", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"fk_proyecto_id" => array(
		"fieldlabel" => "Proyecto", //Nombre campo
		"fieldcomponent" => "select", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"unidad_codigo" => array(
		"fieldlabel" => "Codigo", //Nombre campo
		"fieldcomponent" => "texto", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"unidad_piso" => array(
		"fieldlabel" => "Piso", //Nombre campo
		"fieldcomponent" => "texto", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"unidad_superficie" => array(
		"fieldlabel" => "Superficie Cubierta", //Nombre campo
		"fieldcomponent" => "texto", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"unidad_cubierto" => array(
		"fieldlabel" => "Expansión", //Nombre campo
		"fieldcomponent" => "texto", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"unidad_360" => array(
		"fieldlabel" => "Link 360", //Nombre campo
		"fieldcomponent" => "texto"
	),
	"reservada" => array(
		"fieldlabel" => "Reservada", //Nombre campo
		"fieldcomponent" => "boolean", //Tipo de componente
		"validation" => array("required" => "required")
	)
);
/* Existen otros tipos (oculto, fijo, etc), para conocer todos ver base-printfield */


/* LOS CAMPOS QUE EDITA */
$edita = array(
	array(
		"titulo" => "", //Divido el editor en subsecciones
		"opciones" => array(
			"unidad_nombre",
			"unidad_codigo",
			"unidad_superficie",
			"unidad_cubierto",
			"reservada"
		)
	)
);

//$listfilters = array());

/* ORDEN POR DEFAULT */
//$orden= "ORDER BY autor_id";
$orden = "ORDER BY unidad_piso";

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
//$sqlfiltro="";
?>
