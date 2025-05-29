<?php

/* TABLAS */
$maintable = "contenido";

/* GRUPO */
$module_group = "Sistema";

/* TITULO DE SECCION */
$module_title = "Work";

/* QUE COSAS VA A LISTAR */
$list = array("contenido_nombre");

/* * ***************************************************
* Todos los campos a editar:					     *
* 	Primer array son titulos agrupadores de campos   *
* 	----->segundo son los campos                     *
* 	---------->tercero las especificaciones          *
* *************************************************** */
$fields = array(
	"contenido_nombre" => array(
		"fieldlabel" => "Nombre / Cliente", //Nombre campo
		"fieldcomponent" => "texto", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"contenido_sector" => array(
		"fieldlabel" => "Tipo de trabajo", //Nombre campo
		"fieldcomponent" => "texto", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"contenido_activo" => array(
		"fieldlabel" => "Activar", //Nombre campo
		"fieldcomponent" => "boolean", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"contenido_imagen" => array(
		"fieldlabel" => "Imagen", //Nombre campo
		"fieldcomponent" => "imagen", //Tipo de componente
		"validation" => array("required" => "required")
	),
	/*"contenido_imagen2" => array(
		"fieldlabel" => "Imagen inicial", //Nombre campo
		"fieldcomponent" => "imagen", //Tipo de componente
		"notes" => "750 x 800 pixeles", //Tipo de componente
		"validation" => array("required" => "required"), //Tipo de componente
		"options" => array("crop" => 'x750y800')
	),*/
	"contenido_slogan" => array(
		"fieldlabel" => "Subtitulo", //Nombre campo
		"fieldcomponent" => "texto", //Tipo de componente
		"validation" => array("required" => "required")
	),
	/*"contenido_sector" => array(
		"fieldlabel" => "Cliente + Trabajo realizado", //Nombre campo
		"fieldcomponent" => "texto", //Tipo de componente
		"validation" => array("required" => "required")
	),*/
	"contenido_descripcion" => array(
		"fieldlabel" => "Texto principal", //Nombre campo
		"fieldcomponent" => "textarea", //Tipo de componente
		"validation" => array("required" => "required")
	),
	"contenido_color" => array(
			"fieldlabel" => "Texto header blanco?", //Nombre campo
			"notes" => "Si no es blanco, va en negro", //Nombre campo
			"fieldcomponent" => "boolean"
	),
	"contenido_fondo" => array(
			"fieldlabel" => "Color fondo header ", //Nombre campo
			"fieldcomponent" => "colorpicker"
	),
	"contenido_orden" => array(
		"fieldlabel" => "Orden", //Nombre campo
		"fieldcomponent" => "texto", //Tipo de componente
		"validation" => array("required" => "required")
	)/*,
	"contenido_link" => array(
		"fieldlabel" => "Video (solo el link)", //Nombre campo
		"fieldcomponent" => "texto"
	),
	"fk_work-galeria1" => array(
		"fieldlabel" => "Imagenes / Damero", //Nombre campo
		"fieldcomponent" => "imagen", //Tipo de componente
		"notes" => "Imagenes con el mismo orden se transforman en damero", //Tipo de componente
		"validation" => array("required" => "required"), //Tipo de componente
		"options" => array("multiple" => true,"secondary"=>"galeria1","full"=>true)
	),
	"fk_work-galeria2" => array(
		"fieldlabel" => "Damero", //Nombre campo
		"fieldcomponent" => "imagen", //Tipo de componente
		"validation" => array("required" => "required"), //Tipo de componente
		"options" => array("multiple" => true,"secondary"=>"galeria2")
	)*/,
	"contenido_home" => array(
		"fieldlabel" => "Mostrar en home", //Nombre campo
		"fieldcomponent" => "boolean", //Tipo de componente
		"validation" => array("required" => "required")
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
			"contenido_slogan",
			"contenido_sector",
			"contenido_descripcion",
			"contenido_orden",
			"contenido_home"
		)
	),
	array(
		"titulo" => "Imagenes", //Divido el editor en subsecciones
		"opciones" => array(
			"contenido_imagen",
			"contenido_imagen2"
		)
	)/*,
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
