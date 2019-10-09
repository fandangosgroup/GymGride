<?php 
namespace GymGride\Controller;

use GymGride\Controller\Controller;


class UserController extends Controller
{
    public function autenticar()
    {
        $this->getPost(4, 'name, email, password, passwordC');
    }
}
    
    $valid = new ValidController($name, $email, $password, $passwordC, $CPF);
    $valid->Validar();


if (isset($_GET['login'])){

    $user = new userModel;
    $resultado = $user->login($email, $password);
    print_r($resultado);
}


if (isset($_GET['cadastro'])){
     
    $user = new Cadastro;
    $classname = "name";
    $user->__set($classname, $name);
    $classname = "email";
    $user->__set($classname, $email);
    $classname = "password";
    $user->__set($classname, $password);

    $header = $user->efetuar_cadastro();

    if ($header == 1){
        echo '<h2>Cadastrado Com Sucesso!</h2>';
        echo '<h1>Cadastrado com sucesso!</h1>';
        echo '<hr>';
        echo '<form action="../Login.html" method="POST">
        Fazer Login : <input type="submit" value="Logar"> </form>';
        
        echo '<form action="../index.html" method="POST">
        Voltar ao Inicio : <input type="submit" value="Voltar"> </form>';

        echo '<hr>';
    } 
}


