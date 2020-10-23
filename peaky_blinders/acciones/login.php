<?php
require_once("../config/configuraciones.php");
require_once("../config/funciones.php");

if(empty($_POST["email"]) || empty($_POST["contraseña"])):
    
    header("Location: ../index.php?seccion=login");
    $_SESSION["url"] = [
        "estado" => "error",
        "mensaje" => "campos_obligatorios",
    ];
    die();
endif;

$email = $_POST["email"];
$contraseña = $_POST["contraseña"];

if(!is_dir(ruta_user. "/$email")):
    header("Location: ../index.php?seccion=login");
    $_SESSION["url"] = [
        "estado" => "error",
        "mensaje" => "usuario_incorrecto_o_inexistente",
    ];
    die();
endif;


$contraseñabd = file_get_contents(ruta_user . "/$email/contraseña.txt");

if(!password_verify($contraseña, $contraseñabd)):
    header("Location: ../index.php?seccion=login");
    $_SESSION["url"] = [
        "estado" => "error",
        "mensaje" => "usuario_incorrecto_o_inexistente",
    ];
    die();
endif;

$permiso = file_get_contents(ruta_user . "/$email/permiso.txt");
$user = file_get_contents(ruta_user . "/$email/user.txt");

$_SESSION["user"] = [
    "user" => $user,
    "permiso" => $permiso,
    "email" => $email,
];


if($permiso == "admin"):
    $url = "../panel/index.php?";
    $_SESSION["url"] = [
        "estado" => "ok",
        "mensaje" => "logueado_correctamente",
    ];
else:
    $url = "../index.php?";
    $_SESSION["url"] = [
        "estado" => "ok",
        "mensaje" => "logueado_correctamente",
    ];
endif;

header("Location:$url");