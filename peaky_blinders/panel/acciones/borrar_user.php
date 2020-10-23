<?php
  
  require_once("../../config/configuraciones.php");
   require_once("../../config/arrays.php");
   require_once("../../config/funciones.php");

   
if(empty($_POST["id"]) || !is_dir(ruta_user . "/$_POST[id]")):
    header("Location: ../index.php?seccion=tabla_users");
    $_SESSION["url"] = [
      "estado" => "error",
      "mensaje" => "user_inexistente",
  ];
    die();
endif;

$user = $_POST["id"]; 

borrar_user($user);

rmdir(ruta_user . "/$user");

$_SESSION["url"] = [
  "estado" => "Ok",
  "mensaje" => "user_borrado",
];
header("Location: ../index.php?seccion=tabla_users");

?>
