<?php
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("CONTROLLER_PATH", ROOT. "/Controllers/");
define("MODEL_PATH", ROOT. "/Models/");
define("VIEW_PATH", ROOT. "/Views/");

require_once "Connect_data_base.php";
require_once "Router.php";
require_once MODEL_PATH. 'Model.php';
require_once VIEW_PATH. 'View.php';
require_once CONTROLLER_PATH. 'Controller.php';

Routing::buildRoute();
