<?php
require_once("../config/configuraciones.php");
require_once("../config/funciones.php");

if(empty($_POST["email"]) || empty($_POST["contraseña"])):

    header("Location: ../index.php?seccion=register");
    $_SESSION["url"] = [
        "estado" => "error",
        "mensaje" => "campos_obligatorios",
    ];
    die();
endif;

$email = $_POST["email"];
$contraseña = $_POST["contraseña"];

if(strlen($contraseña)<=6):
    header("Location: ../index.php?seccion=register");
    $_SESSION["url"] = [
        "estado" => "error",
        "mensaje" => "contraseña_minima_6_caracteres",
    ];
    die();
endif;

$NuevoUser = explode("@",$email)[0];
$user = empty($_POST["user"]) ? $NuevoUser : $_POST["user"];

if(is_dir(ruta_user . "/$email")):
    header("Location: ../index.php?seccion=register");
    $_SESSION["url"] = [
        "estado" => "error",
        "mensaje" => "usuario_ya_existe",
    ];
    die();
endif;

mkdir(ruta_user . "/$email");

file_put_contents(ruta_user . "/$email/email.txt",$email);
file_put_contents(ruta_user . "/$email/user.txt",$user);
file_put_contents(ruta_user . "/$email/permiso.txt","usuario");


$contraseña = password_hash($contraseña, PASSWORD_DEFAULT);
file_put_contents(ruta_user . "/$email/contraseña.txt",$contraseña);

header("Location: ../index.php?seccion=login");
$_SESSION["url"] = [
    "estado" => "ok",
    "mensaje" => "registrado con exito",
];