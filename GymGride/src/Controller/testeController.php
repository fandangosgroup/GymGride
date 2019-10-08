<?php

use GymGride\Model\Model;
use GymGride\Controller\Controller;

require_once 'C:\Users\fabeg\Dropbox\github-projects\GymGride\vendor\autoload.php';

// $model = new Model;

// $colunas = array('nome', 'usuario', 'senha', 'nivel', 'email', 'ativo');
// $valor = array('PATO', 'PATO', 'PATO', 'PATO' , 'PATO', 'PATO');

// $sql = $model->insert('usuarios', $colunas, $valor);
// //print_r($sql);


$c = new Controller;

$s = $c->trainingCrudGeneration();

echo "$s";
