<?php

use GymGride\Controller\PageController;

require 'vendor/autoload.php';
$p = $_GET['p'];
$controller = new PageController();
$controller->view($p);


//require '/GymGride/src/Controller/testeController.php';

//require('./GymGride/src/Controller/testeController.php');
