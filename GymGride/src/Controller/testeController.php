<?php

use GymGride\Controller\Controller;
use GymGride\Controller\CadastroController;

use GymGride\Controller\ValidController;

require_once 'C:\Users\fabeg\Dropbox\github-projects\GymGride\vendor\autoload.php';

// $model = new Model;

// $colunas = array('nome', 'usuario', 'senha', 'nivel', 'email', 'ativo');
// $valor = array('PATO', 'PATO', 'PATO', 'PATO' , 'PATO', 'PATO');

// $sql = $model->insert('usuarios', $colunas, $valor);
// print_r($sql);


//$c = new Controller;

//$s = $c->trainingCrudGeneration();

//echo "$s";


$control = new Controller;


$POST = $control->getPost();
$name = $POST['name'];
$email = $POST['email'];
$password = $POST['password'];
$passwordC = $POST['passwordC'];
$CPF = '08951512';
$tell = '12345';

$valid = new ValidController($name, $email , $password, $passwordC, $CPF);

if (isset($_GET['cadastro'])){
    $user = new CadastroController;
    $user ->efetuar_cadastro($email, $name, $CPF, $password, $tell);
}

if (isset($_GET['login'])){


}