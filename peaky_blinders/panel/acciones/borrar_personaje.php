<?php
  
  require_once("../../config/configuraciones.php");
   require_once("../../config/arrays.php");
   require_once("../../config/funciones.php");

   
if(empty($_POST["id"]) || !is_dir(RUTA_PERSONAJES . "/$_POST[id]")):
    header("Location: ../index.php?seccion=tabla_personajes");
    $_SESSION["url"] = [
        "estado" => "error",
        "mensaje" => "personaje_inexistente",
    ];
    die();
endif;

$personaje = $_POST["id"]; 

unlink(RUTA_PERSONAJES . "/$personaje/$personaje.jpg");

if(file_exists(RUTA_PERSONAJES . "/$personaje/descripcion.txt")):
    unlink(RUTA_PERSONAJES . "/$personaje/descripcion.txt");
endif;

rmdir(RUTA_PERSONAJES . "/$personaje");
$_SESSION["url"] = [
    "estado" => "ok",
    "mensaje" => "personaje_borrado",
];
header("Location: ../index.php?seccion=tabla_personajes");

?>
