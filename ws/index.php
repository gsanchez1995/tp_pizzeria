<?php
require 'Slim/Slim.php';
require_once 'app/libs/Array2XML.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

define("SPECIALCONSTANT", true);
require 'app/libs/connect.php';
require 'app/routes/api.php';
include_once '../clases/claseUsuario.php';
include_once '../clases/claseProducto.php';
include_once '../clases/claseVenta.php';


$app->run();