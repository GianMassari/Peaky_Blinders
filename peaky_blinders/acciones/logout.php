<?php

session_start();
session_destroy();
$_SESSION["url"] = [
    "estado" => "ok",
    "mensaje" => "Cerro_sesion",
];
header("Location: ../index.php?");
