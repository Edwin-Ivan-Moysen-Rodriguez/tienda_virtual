<?php
// Inicia la sesión lo primero, antes de cualquier salida:
session_start();

// Carga la configuración y helpers:
require_once "Config/Config.php";
require_once "Helpers/Helpers.php";

// Procesa la URL como ya lo tenías:
$url      = !empty($_GET['url']) ? $_GET['url'] : 'home/home';
$arrUrl   = explode("/", $url);
$controller = $arrUrl[0];
$method     = $arrUrl[0];
$params     = "";

if (!empty($arrUrl[1]) && $arrUrl[1] !== "") {
    $method = $arrUrl[1];
}

if (!empty($arrUrl[2])) {
    for ($i = 2; $i < count($arrUrl); $i++) {
        $params .= $arrUrl[$i] . ',';
    }
    $params = trim($params, ',');
}

// Carga el autoloader y el arranque de tu framework:
require_once "Libraries/Core/Autoload.php";
require_once "Libraries/Core/Load.php";
