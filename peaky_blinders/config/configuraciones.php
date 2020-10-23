<?php
session_start();
date_default_timezone_set("America/Argentina/Buenos_Aires");
error_reporting(E_ALL);
ini_set("display_errors",1);
define("RUTA_PERSONAJES", __DIR__ . "/../personajes");
ini_set("upload_max_filesize","10M");
define("ruta_user", __DIR__ . "/../user");
