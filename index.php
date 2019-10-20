<?php

use GymGride\Controller\PageController;
use GymGride\Controller\MethodController;
use GymGride\Controller\TestController;

if(!isset($_GET['p']) || !isset($_GET['m'])){
    $_GET['p'] = '';
    $_GET['m'] = '';
}

require 'vendor/autoload.php';

$GLOBALS['Router'] = 1;

if(isset($_GET['t'])){
    
    $controller = new TestController();
    $controller->teste2();

}else {
    if(empty($_GET['m'])){
        $p = $_GET['p'];
        $controller = new PageController();
        $controller->view($p);
    }
    $m = $_GET['m'];
    $controller = new MethodController();
    $controller->MethodController($m);
    
}