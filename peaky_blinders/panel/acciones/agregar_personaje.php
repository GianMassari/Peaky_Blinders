<?php
  
  require_once("../../config/configuraciones.php");
   require_once("../../config/arrays.php");
   require_once("../../config/funciones.php");

   if(empty($_POST["nombre"]) || $_FILES["imagen"]["size"] == 0):
    header("Location: ../index.php?seccion=agregar_personaje");
    $_SESSION["url"] = [
        "estado" => "error",
        "mensaje" => "datos_obligatorios",
    ];
    die();
endif;

$nombre = $_POST["nombre"];
$imagen = $_FILES["imagen"];
$descripcion = htmlentities($_POST["descripcion"]) ?? false;

if($imagen["type"] != "image/jpeg"):
    header("Location: ../index.php?seccion=agregar_personaje");
    $_SESSION["url"] = [
        "estado" => "error",
        "mensaje" => "formato_imagen_erroneo",
    ];
    die();
endif;



$nombre = tolower($nombre);

if(is_dir(RUTA_PERSONAJES . "/$nombre")):
    header("Location: ../index.php?seccion=agregar_personaje");
    $_SESSION["url"] = [
        "estado" => "error",
        "mensaje" => "personaje_ya_existe",
    ];
    die();
endif;

mkdir(RUTA_PERSONAJES . "/$nombre");

if($descripcion):
    file_put_contents(RUTA_PERSONAJES . "/$nombre/descripcion.txt",$descripcion);
endif;

move_uploaded_file($imagen["tmp_name"],RUTA_PERSONAJES . "/$nombre/$nombre.jpg");
$_SESSION["url"] = [
    "estado" => "ok",
    "mensaje" => "personaje_creado",
];
header("Location: ../index.php?seccion=tabla_personajes");
