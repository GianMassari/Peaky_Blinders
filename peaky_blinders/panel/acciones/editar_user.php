<?php
  require_once("../../config/configuraciones.php");
  require_once("../../config/arrays.php");
  require_once("../../config/funciones.php");

  
  
     if(empty($_POST["userViejo"]) || !is_dir(ruta_user . "/" . $_POST["userViejo"])):
    header("Location:../index.php?seccion=tabla_users");
    $_SESSION["url"] = [
        "estado" => "Error",
        "mensaje" => "Usuario_inexistente",
      ];
    die();
endif;

$userViejo = $_POST["userViejo"];


if(empty($_POST["user"] || empty($_POST["permiso"] || empty($_POST["email"])))):
    header("Location:../index.php?editar_usuario&user=$userViejo");
    $_SESSION["url"] = [
        "estado" => "Error",
        "mensaje" => "campos_obligatorios",
      ];
    die();
endif;
$email = $_POST["email"];
$user = $_POST["user"];
$permiso= strtolower(str_replace(" ","_", $_POST["permiso"]));
$ruta="editar_user&user=$userViejo";
check_email($userViejo,$email,$ruta);  
  
if ($permiso=="admin" || $permiso=="usuario"):
    file_put_contents(ruta_user . "/$email/permiso.txt",$permiso);
  else:
    $_SESSION["url"] = [
    "estado" => "Error",
    "mensaje" => "user_no_compatible",
  ];
  header("Location:../index.php?seccion=editar_user&user=$userViejo");
die();
endif;

 

file_put_contents(ruta_user . "/$email/email.txt",$email);
file_put_contents(ruta_user . "/$email/user.txt",$user);


   
    $_SESSION["url"] = [
        "estado" => "Ok",
        "mensaje" => "personaje_editado",
      ];
header("Location:../index.php?seccion=tabla_users");
 