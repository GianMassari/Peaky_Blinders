<?php 
require_once("../config/configuraciones.php");
  require_once("../config/arrays.php");
  require_once("../config/funciones.php");

  
     if(empty($_POST["userViejo"]) || !is_dir(ruta_user . "/" . $_POST["userViejo"])):
    header("Location:../index.php?seccion=editar_perfil");
    $_SESSION["url"] = [
        "estado" => "Error",
        "mensaje" => "Usuario_inexistente",
      ];
    die();
endif;

$userViejo = $_POST["userViejo"];


if(empty($_POST["user"] || empty($_POST["email"]))):
    header("Location:../index.php?editar_perfil");
    $_SESSION["url"] = [
        "estado" => "Error",
        "mensaje" => "campos_obligatorios",
      ];
    die();
endif;
$email = $_POST["email"];
$user = $_POST["user"];

$ruta="editar_perfil";
check_email($userViejo,$email,$ruta); 

file_put_contents(ruta_user . "/$email/email.txt",$email);
file_put_contents(ruta_user . "/$email/user.txt",$user);

    $_SESSION["url"] = [
        "estado" => "Ok",
        "mensaje" => "personaje_editado",
      ];
      $_SESSION["user"]["email"]=$email;
      $_SESSION["user"]["user"]=$user;
header("Location:../index.php?seccion=editar_perfil");
 