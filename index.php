<?php

use GymGride\Controller\PageController;
use GymGride\Controller\MethodController;
use GymGride\Controller\TestController;

//Verfica se os gets estão vazios, para não apresentar warning
if(!isset($_GET['p']) || !isset($_GET['m'])){
    $_GET['p'] = '';
    $_GET['m'] = '';
}

//Requer composer Instalado
require 'vendor/autoload.php';

$GLOBALS['Router'] = 1;

//Redireciona quais metodos ou paginas devem ser executados
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