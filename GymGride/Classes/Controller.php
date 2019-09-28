<?php 
include_once "Cadastro.php";
include_once "Login.php";
include_once "PDO.php";
include_once "Usuario.php";
    $name  = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordC = $_POST["passwordC"];
    
    try{
        if(strstr($name, " ") || (strstr($email, " ") || (strstr($password, " ")))){
            throw new Exception('nome , email e senha não podem conter espaço!<br />');
        }else{
        
        }
    }catch(Exception $g){
        echo $g->getMessage();
        die();
    }

    try{
        if(is_numeric($name)){
            throw new Exception('nome tem que ser do tipo caractere!<br />');
        }else{
            
        }
    }catch(Exception $g){
        echo $g->getMessage();
        die();
    }

    try{
        if(strlen($name) > 10){
            throw new Exception('nome não pode ter comprimento maior que 10 caracteres!<br />');
        }else{
        
        }
    }catch(Exception $g){
        echo $g->getMessage();
        die();
    }

    try{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new Exception('Email não é valido!<br />');
        }else{
        
        }
    }catch(Exception $g){
        echo $g->getMessage();
        die();
    }

    try{
        if(strlen($password) > 15){
            throw new Exception('Senha não pode ter comprimento maior que 15 caracteres!<br />');
        }else{
        
        }
    }catch(Exception $g){
        echo $g->getMessage();
        die();
    }


if (isset($_GET['login'])){

    if (empty($email) || (empty($password))){
        die("ERROR!:> Dados Vazios!");
    }


    $user = new Login;
    $classname = "email";
    $user->__set($classname, $email);
    $classname = "password";
    $user->__set($classname, $password);

    $user->efetuar_login();

}


if (isset($_GET['cadastro'])){
    
    if ($password != $passwordC){
        die("Senha incompativel");
    }

    if (empty($name) || (empty($email) || (empty($password)))){
        die("ERROR!:> Dados Vazios!");
    }

    //echo "$name";
    //echo "$email";
    //echo "$password";

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


