<?php
 require_once("../../config/configuraciones.php");
 require_once("../../config/arrays.php");
 require_once("../../config/funciones.php");


if(empty($_POST["email"]) || empty($_POST["contraseña"])):

    header("Location: ../index.php?seccion=agregar_user");
    $_SESSION["url"] = [
        "estado" => "error",
        "mensaje" => "campos_obligatorios",
    ];
    die();
endif;

$email = $_POST["email"];
$contraseña = $_POST["contraseña"];

if(strlen($contraseña)<6):
    header("Location: ../index.php?seccion=agregar_user");
    $_SESSION["url"] = [
        "estado" => "error",
        "mensaje" => "contraseña_minima_6_caracteres",
    ];
    die();
endif;

$NuevoUser = explode("@",$email)[0];
$user = empty($_POST["user"]) ? $NuevoUser : $_POST["user"];

if(is_dir(ruta_user . "/$email")):
    header("Location: ../index.php?seccion=agregar_user");
    $_SESSION["url"] = [
        "estado" => "error",
        "mensaje" => "usuario_ya_existe",
    ];
    die();
endif;




$permiso= strtolower(str_replace(" ","_", $_POST["permiso"]));

if(empty($_POST["permiso"])):
    $permiso="usuario";
    
elseif ($permiso=="admin" || $permiso=="usuario"):
    $permiso=$permiso;
    else:
    $_SESSION["url"] = [
    "estado" => "Error",
    "mensaje" => "user_no_compatible",
  ];
  header("Location:../index.php?seccion=agregar_user");
  die();
endif;

mkdir(ruta_user . "/$email");
file_put_contents(ruta_user . "/$email/permiso.txt",$permiso);
file_put_contents(ruta_user . "/$email/email.txt",$email);
file_put_contents(ruta_user . "/$email/user.txt",$user);
$contraseña = password_hash($contraseña, PASSWORD_DEFAULT);
file_put_contents(ruta_user . "/$email/contraseña.txt",$contraseña);

header("Location: ../index.php?seccion=tabla_users");
$_SESSION["url"] = [
    "estado" => "ok",
    "mensaje" => "usuario_creado",
];