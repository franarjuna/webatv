<?php

/* TABLAS */
$maintable = "home";
 
/* GRUPO */
$module_group = "Contenido";

/* TITULO DE SECCION */
$module_title = "Contenido Home";

/* QUE COSAS VA A LISTAR */
$list = array("home_nombre");

/* * ***************************************************
 * Todos los campos a editar:					     *
 * 	Primer array son titulos agrupadores de campos   *
 * 	----->segundo son los campos                     *
 * 	---------->tercero las especificaciones          *
 * *************************************************** */
$fields = array(
    "home_nombre" => array(
        "fieldlabel" => "Nombre seccion", 
        "fieldcomponent" => "texto", //Tipo de componente
        "validation" => array("required" => "required")
    ),
    "teamhead" => array(
        "fieldlabel" => "Equipo", 
        "fieldcomponent" => "separador"
    ),
    "teamimg" => array(
        "fieldlabel" => "Imagen", 
        "fieldcomponent" => "imagen", 
    ),
    "teamtext" => array(
        "fieldlabel" => "Texto", 
        "fieldcomponent" => "textarea"
    ),
    "citahead" => array(
        "fieldlabel" => "Cita", 
        "fieldcomponent" => "separador"
    ),
    "cita" => array(
        "fieldlabel" => "Cita", 
        "fieldcomponent" => "textarea",
    ),
    "linkcita" => array(
        "fieldlabel" => "Link", 
        "fieldcomponent" => "texto"
    ),
    "projecthead" => array(
        "fieldlabel" => "Proyecto", 
        "fieldcomponent" => "separador"
    ),
    "projectimg" => array(
        "fieldlabel" => "Fondo", 
        "fieldcomponent" => "imagen", 
    ),
    "projecttexto" => array(
        "fieldlabel" => "Texto", 
        "fieldcomponent" => "textarea"
    ),
    "projectlink" => array(
        "fieldlabel" => "Link", 
        "fieldcomponent" => "texto"
    ),
    "seohead" => array(
        "fieldlabel" => "SEO", 
        "fieldcomponent" => "separador"
    ),
    "seo_description" => array(
        "fieldlabel" => "Description", //Nombre campo
        "fieldcomponent" => "textarea"
    ),
    "columnas" => array(
        "fieldlabel" => "Columnas", 
        "fieldcomponent" => "separador"
    ),
);

for($a = 1;$a <= 4;$a++){
    $fields["coltit".$a] = array(
        "fieldlabel" => "Titulo ".$a, 
        "fieldcomponent" => "texto"
    );
    $fields["coltxt".$a] = array(
        "fieldlabel" => "Texto ".$a, 
        "fieldcomponent" => "textarea"
    );
    $fields["colimg".$a] = array(
        "fieldlabel" => "Imagen ".$a, 
        "fieldcomponent" => "imagen"
    );
    $fields["collink".$a] = array(
        "fieldlabel" => "Link ".$a, 
        "fieldcomponent" => "texto"
    );
    $fields["colsep".$a] = array(
        "fieldlabel" => "-", 
        "fieldcomponent" => "separador"
    );
}


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
?>
