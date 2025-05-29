<?php

/* TABLAS */
$maintable = "dialogo";

/* GRUPO */
$module_group = "Contenido";

/* TITULO DE SECCION */
$module_title = "Dialogos";

/* QUE COSAS VA A LISTAR */
$list = array("dialogo_nombre", "activo");

/* * ***************************************************
 * Todos los campos a editar:					     *
 * 	Primer array son titulos agrupadores de campos   *
 * 	----->segundo son los campos                     *
 * 	---------->tercero las especificaciones          *
 * *************************************************** */
$fields = array(
    "dialogo_nombre" => array(
        "fieldlabel" => "Titulo", //Nombre campo
        "fieldcomponent" => "texto", //Tipo de componente
        "validation" => array("required" => "required")
    ),
    "dialogo_autor" => array(
        "fieldlabel" => "Autor/a", //Nombre campo
        "fieldcomponent" => "texto", //Tipo de componente
        "validation" => array("required" => "required")
    ),
    "dialogotipo" => array(
        "fieldlabel" => "Categoria", //Nombre campo
        "fieldcomponent" => "radio", //Tipo de componente
        "validation" => array("required" => "required"),
        "opciones" => array("prensa" => "prensa", "novedades" => 'novedades', 'ensayos' => 'ensayos', 'miradas' => 'miradas', 'conversaciones' => 'conversaciones')
    ),
    "slug" => array(
        "fieldlabel" => "Slug", //Nombre campo
        "fieldcomponent" => "slug", //Tipo de componente
        "validation" => array("required" => "required"),
        "notes" => "Sin acentos ni espacios"
    ),
    "foto" => array(
        "fieldlabel" => "Imagen listado", //Nombre campo
        "fieldcomponent" => "imagen", //Tipo de componente
    ),
    "imagen" => array(
        "fieldlabel" => "Imagen grande", //Nombre campo
        "fieldcomponent" => "imagen"
    ),
    "activo" => array(
        "fieldlabel" => "Activo", //Nombre campo
        "fieldcomponent" => "boolean"
    ),
    "destacado" => array(
        "fieldlabel" => "Destacado en slider?", //Nombre campo
        "fieldcomponent" => "boolean"
    ),
    "fecha" => array(
        "fieldlabel" => "Fecha", //Nombre campo
        "fieldcomponent" => "fecha"
    ),
    "texto" => array(
        "fieldlabel" => "Texto", //Nombre campo
        "fieldcomponent" => "textarea"
    ),
    "tamanio" => array(
        "fieldlabel" => "Formato en listado",
        "fieldcomponent" => "radio", //Tipo de componente
        "opciones" => array(1 => "1 columna", 2 => '2 columnas', 3 => '3 columnas ( full )')
    ),
    "usuario" => array(
        "fieldlabel" => "Usuario", //Nombre campo
        "fieldcomponent" => "ctrlid",
        "defaultvalue" => $_SESSION['cid']
    ),
    "contenido" => array(
        "fieldlabel" => "Contenido", //Nombre campo
        "fieldcomponent" => "contenido",
        "tipocontenido" => "dialogo"

    ),
    "oradores" => array(
        "fieldlabel" => "Oradores", //Nombre campo
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
    "seo_title" => array(
        "fieldlabel" => "Title", //Nombre campo
        "fieldcomponent" => "texto"
    ),
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
$orden = "ORDER BY nombre ASC";

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
