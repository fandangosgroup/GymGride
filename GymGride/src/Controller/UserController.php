<?php 

namespace GymGride\Controller;
use GymGride\Controller\Controller;
use GymGride\Model\UserModel;

class UserController extends Controller
{
    public function login()
    {
        $post = $this->getPost();
        $email = $post['email'];
        $password = $post['password'];
            
        $user = new UserModel;
        $resultado = $user->login($email, $password);

   /*      if ($header == 1){
            echo '<h2>Cadastrado Com Sucesso!</h2>';
            echo '<h1>Cadastrado com sucesso!</h1>';
            echo '<hr>';
            echo '<form action="../Login.html" method="POST">
            Fazer Login : <input type="submit" value="Logar"> </form>';
            
            echo '<form action="../index.html" method="POST">
            Voltar ao Inicio : <input type="submit" value="Voltar"> </form>';

            echo '<hr>'; */
        //}
    }
}
/* 

if (isset($_GET['cadastro'])){
    
    $name = $post['name'];
    $email = $post['email'];
    $password = $post['password'];
    $passwordC = $post['passwordC'];
    $CPF = $post['CPF'];
    $tell = $post['tell'];

    
    $user = new userModel;
    $header = $user->cadastrar($name, $email, $password, $passwordC, $CPF, $tell); */
