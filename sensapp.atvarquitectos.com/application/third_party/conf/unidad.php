<?php

/* TABLAS */
$maintable = "unidad";

/* GRUPO */
$module_group = "Sistema";

/* TITULO DE SECCION */
$module_title = "Unidades";

/* QUE COSAS VA A LISTAR */
$list = array("unidad_codigo", "unidad_nombre", "unidad_piso", "reservada");

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
	"sup_amenities" => array(
		"fieldlabel" => "Superficie Amenities", //Nombre campo
		"fieldcomponent" => "texto", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"sup_total_amenities" => array(
		"fieldlabel" => "Superficie Total c/Amenities", //Nombre campo
		"fieldcomponent" => "texto", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"unidad_cubierto" => array(
		"fieldlabel" => "Expansión", //Nombre campo
		"fieldcomponent" => "texto", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"reservada" => array(
		"fieldlabel" => "Reservada", //Nombre campo
		"fieldcomponent" => "boolean", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"plano1" => array(
		"fieldlabel" => "Plano 1", //Nombre campo
		"fieldcomponent" => "imagen", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"plano2" => array(
		"fieldlabel" => "Plano 2", //Nombre campo
		"fieldcomponent" => "imagen", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"plano3" => array(
		"fieldlabel" => "Plano 3", //Nombre campo
		"fieldcomponent" => "imagen", //Tipo de componente
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
