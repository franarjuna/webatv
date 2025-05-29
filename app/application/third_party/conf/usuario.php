<?php
/*TABLAS*/
$maintable="usuario";

/*GRUPO*/
$module_group="Sistema";

/*TITULO DE SECCION*/
$module_title="Usuarios de Sistema";

/*QUE COSAS VA A LISTAR*/
$list = array("usuario_nombre","usuario_apellido","usuario_mail");

/*****************************************************
* Todos los campos a editar:					     *
* 	Primer array son titulos agrupadores de campos   *
* 	----->segundo son los campos                     *
* 	---------->tercero las especificaciones          *
*****************************************************/
$fields = array(
            "usuario_nombre"=>array(
               "fieldlabel"=>"Nombre",                     //Nombre campo
               "fieldcomponent"=>"texto",               //Tipo de componente
               "restricted"=>""                                  //Restricted
            ),
            "usuario_apellido"=>array(
               "fieldlabel"=>"Apellido",                     //Nombre campo
               "fieldcomponent"=>"texto",               //Tipo de componente
               "restricted"=>""                                  //Restricted
            ),
            "usuario_password"=>array(
               "fieldlabel"=>"Password",                     //Nombre campo
               "fieldcomponent"=>"password",               //Tipo de componente
               "restricted"=>""                                  //Restricted
            ),
            "usuario_mail"=>array(
               "fieldlabel"=>"Mail",                     //Nombre campo
               "fieldcomponent"=>"texto",               //Tipo de componente
               "restricted"=>""                                  //Restricted
            ));
/*Existen otros tipos (oculto, fijo, etc), para conocer todos ver base-printfield*/


/*LOS CAMPOS QUE EDITA*/
$edita = array(
	        array(
	            "titulo"=>"",                          //Divido el editor en subsecciones
	            "opciones"=>array(
					"usuario_nombre",
	        		"usuario_apellido",
	        		"usuario_pass",
	        		"usuario_mail",
			        "fk_tipousuario_id"
	            )
	        )
);

//$listfilters = array());

/*ORDEN POR DEFAULT*/
//$orden= "ORDER BY categoria_id";
$orden= "ORDER BY usuario_nombre";

/*QUE VIEW LEVANATAN LAS ACCIONES*/
$module_action=array(
    "edit"=>'formforuser.php',
    "new"=>'formforuser.php',
    "list"=>'list.php',
    "actions"=>'actionsforuser.php',

);

/*QUE ACCIONES ESTAN HABILITADAS*/
$actions=array(
    "id" => 0,
    "edit"=>1,
    "additem"=>1,
    "delete"=>1,
    "multidelete"=>0,
    "export"=>0
);



$filtercomp=array(
    "usuario_nombre"=>array(
        "filtertype"=>"texto",
        "filterlabel"=>"Nombre",
        "filtername"=>"nombre",
        "filterfield"=>"usuario_nombre"
    )
);
?>
