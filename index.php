<?php

use GymGride\Controller\PageController;
use GymGride\Controller\MethodController;
use GymGride\Controller\TestController;

require 'vendor/autoload.php';

if(isset($_GET['t'])){
    
    $controller = new TestController();
    $controller->teste();

}else {
    if(!isset($_GET['m'])){
        $p = $_GET['p'];
        $controller = new PageController();
        $controller->view($p);
    }

    $m = $_GET['m'];
    $controller = new MethodController();
    $controller->MethodController($m);

}