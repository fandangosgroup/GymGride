<?php 

namespace GymGride\Controller;
use GymGride\Controller\Controller;
use GymGride\Model\userModel;

class UserController extends Controller
{
    public function autenticar()
    {
        $post = $this->getPost();
        
        //$valid = new ValidController($name, $email, $password, $passwordC, $CPF);
        //$valid->Validar();


        if (isset($_GET['login'])){

            $email = $post['email'];
            $password = $post['password'];
            
            $user = new userModel;
            $resultado = $user->login($email, $password);
            print_r($resultado);
        }


        if (isset($_GET['cadastro'])){
            
            $name = $post['name'];
            $email = $post['email'];
            $password = $post['password'];
            $passwordC = $post['passwordC'];
            $CPF = $post['CPF'];
            $tell = $post['tell'];
        
            
            $user = new userModel;
            $header = $user->cadastrar($name, $email, $password, $passwordC, $CPF, $tell);

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
    }
}
