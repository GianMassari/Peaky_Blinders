<?php
  require_once("../../config/configuraciones.php");
  require_once("../../config/arrays.php");
  require_once("../../config/funciones.php");


 if(empty($_POST["id"]) || !is_dir(RUTA_PERSONAJES . "/" . $_POST["id"])):
    header("Location:../index.php?seccion=tabla_personajes");
    $_SESSION["url"] = [
        "estado" => "Error",
        "mensaje" => "personaje_inexistente",
      ];
    die();
endif;

$id = $_POST["id"];


if(empty($_POST["nombre"])):
    header("Location:../index.php?seccion=agregar_personaje&personaje=$id");
    $_SESSION["url"] = [
        "estado" => "Error",
        "mensaje" => "campos_obligatorios",
      ];
    die();
endif;

$nombre = $_POST["nombre"];
$descripcion = htmlentities($_POST["descripcion"]) ?? false;

$pjNuevo = tolower($nombre);


  
   check_nombre($id,$pjNuevo);

   nueva_descripcion($descripcion,$pjNuevo);

   


if(strcmp($id, $pjNuevo) !=0):
    rename(RUTA_PERSONAJES . "/$pjNuevo/$id.jpg",RUTA_PERSONAJES . "/$pjNuevo/$pjNuevo.jpg");
endif;

    if($_FILES["imagen"]["size"] > 0 && $_FILES["imagen"]["type"] == "image/jpeg"):
       
        unlink(RUTA_PERSONAJES . "/$pjNuevo/$id.jpg");
    
        move_uploaded_file($_FILES["imagen"]["tmp_name"], RUTA_PERSONAJES . "/$pjNuevo/$pjNuevo.jpg");
    
    endif;
   
    $_SESSION["url"] = [
        "estado" => "Ok",
        "mensaje" => "personaje_editado",
      ];
header("Location:../index.php?seccion=tabla_personajes");
 