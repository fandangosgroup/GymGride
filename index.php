<?php

use GymGride\Controller\PageController;
use GymGride\Controller\MethodController;

require 'vendor/autoload.php';
    
if(!isset($_GET['m'])){
    $p = $_GET['p'];
    $controller = new PageController();
    $controller->view($p);
}

$m = $_GET['m'];
$controller = new MethodController();
$controller->MethodController($m);