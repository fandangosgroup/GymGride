<?php 

namespace GymGride\Controller;
use GymGride\Controller\Controller;
use GymGride\Model\UserModel;
use GymGride\Controller\TreinoController;

class UserController extends Controller
{
    public function login()
    {
        session_start();
        $post = $this->getPost();
        $email = $post['email'];
        $password = $post['password'];
            
        $user = new UserModel;
        $resultado = $user->login($email, $password);

        $t = new TreinoController;
        $t->getDados();
    }

    public function cadastro()
    {
        $post = $this->getPost();
        $name = $post['name'];
        $email = $post['email'];
        $password = $post['password'];
        $passwordC = $post['passwordC'];
        $CPF = $post['CPF'];
        $tell = $post['tell'];

    
        $user = new userModel;
        $header = $user->cadastrar($name, $email, $password, $passwordC, $CPF, $tell);

        if ($header == 1)
        {
            echo '<h2>Cadastrado Com Sucesso!</h2>';
            echo '<h1>Cadastrado com sucesso!</h1>';
            echo '<hr>';
            echo '<form action="?p=Login" method="POST">
            Fazer Login : <input type="submit" value="Logar"> </form>';
            
            echo '<form action="../index.html" method="POST">
            Voltar ao Inicio : <input type="submit" value="Voltar"> </form>';

            echo '<hr>';
        }
    }
}
