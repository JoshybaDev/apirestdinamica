<?php
ini_set('display_errors',1);
ini_set('log_errors',1);
ini_set("error_log",__DIR__."/log.txt");


require_once "dd.php";
require_once "Response.php";
require_once "controllers/RoutesController.php";
require_once "controllers/GetController.php";
require_once "models/Connection.php";
require_once "models/GetModel.php";
$index = new RoutesController();
$index->index();
