<?php

/* TABLAS */
$maintable = "publicacion";
 
/* GRUPO */
$module_group = "Contenido";

/* TITULO DE SECCION */
$module_title = "Publicaciones";

/* QUE COSAS VA A LISTAR */
$list = array("publicacion_nombre","activo");

/* * ***************************************************
 * Todos los campos a editar:					     *
 * 	Primer array son titulos agrupadores de campos   *
 * 	----->segundo son los campos                     *
 * 	---------->tercero las especificaciones          *
 * *************************************************** */
$fields = array(
    "publicacion_nombre" => array(
        "fieldlabel" => "Nombre", //Nombre campo
        "fieldcomponent" => "texto", //Tipo de componente
        "validation" => array("required" => "required")
    ),
    "titulo" => array(
        "fieldlabel" => "Titulo", //Nombre campo
        "fieldcomponent" => "texto", //Tipo de componente
        "validation" => array("required" => "required")
    ),
    "slug" => array(
        "fieldlabel" => "URL", //Nombre campo
        "fieldcomponent" => "slug", //Tipo de componente
        "validation" => array("required" => "required")
    ),
    "categoria" => array(
        "fieldlabel" => "Categoria", //Nombre campo
        "fieldcomponent" => "radio", //Tipo de componente
        "validation" => array("required" => "required"),
        "opciones" => array('nuestras publicaciones' => "Nuestras Publicaciones")
    ),
    "imagen" => array(
        "fieldlabel" => "Imagen", //Nombre campo
        "fieldcomponent" => "imagen", //Tipo de componente
        "validation" => array("required" => "required")
    ),
    "activo" => array(
        "fieldlabel" => "Activo", //Nombre campo
        "fieldcomponent" => "boolean"
    ),
    "autores" => array(
        "fieldlabel" => "Autores", //Nombre campo
        "fieldcomponent" => "textarea"
    ),
    "donde_comprar" => array(
        "fieldlabel" => "Donde adquirirlo?", //Nombre campo
        "fieldcomponent" => "texto"
    ),
    "linkcomprar" => array(
        "fieldlabel" => "Link compra online", //Nombre campo
        "fieldcomponent" => "texto"
    ),
    "anio" => array(
        "fieldlabel" => "Año de publicacion", //Nombre campo
        "fieldcomponent" => "texto"
    ),
    "texto" => array(
        "fieldlabel" => "Texto", //Nombre campo
        "fieldcomponent" => "textarea"
    ),
    "usuario" => array(
        "fieldlabel" => "Usuario", //Nombre campo
        "fieldcomponent" => "ctrlid",
        "defaultvalue" => $_SESSION['cid']
    ),
	"contenido" => array(
		"fieldlabel" => "Texto Largo", //Nombre campo
		"fieldcomponent" => "textarea"
    ),
    "teamhead" => array(
        "fieldlabel" => "SEO", 
        "fieldcomponent" => "separador"
    ),
    "seo_description" => array(
        "fieldlabel" => "Description", //Nombre campo
        "fieldcomponent" => "textarea"
    ),
    "teamhead" => array(
        "fieldlabel" => "Galería", 
        "fieldcomponent" => "separador"
    )
);
for($a=1;$a<=6;$a++){
    $fields['imagen'.$a] = [
        "fieldlabel" => "Imagen ".$a, //Nombre campo
        "fieldcomponent" => "imagen", //Tipo de componente
    ];
}
?>
