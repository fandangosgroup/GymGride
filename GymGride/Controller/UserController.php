<?php 

namespace GymGride\Controller;
use GymGride\Controller\Controller;
use GymGride\Model\UserModel;
use GymGride\View\UserView;

class UserController extends Controller
{
    //Cria uma session com os dados do banco
    function create_session($resultado){
    
        // Salva os dados encontrados na sessão
        $ID_User = $resultado[0]['ID_User'];
        $User_photo = $resultado[0]['Photo'];
        $User_Nome = $resultado[0]['Nome'];
        $User_Nivel = $resultado[0]['Nivel'];
        $User_email = $resultado[0]['Email'];
        //$Token = $resultado[0]['Token'];
        
        
        // Se a sessão não existir, inicia uma
        $Session = new SessionController();
        $Session->setValue('User_ID',$ID_User);
        $Session->setValue('User_Name',$User_Nome);
        $Session->setValue('User_Nivel',$User_Nivel);
        $Session->setValue('User_Email',$User_email);
        $Session->setValue('Tempo',time());
        $Session->setValue('Refresh',time());
        //$Session->setValue('User_photo',$token);
        //$Session->setValue('User_Token',$token);

    }
    
    //Limpa os posts, verifica e faz o login, valida o token e nivel e cria a session.
    public function login()
    {
        $post = $this->getPost();
        $this->clearHTML($post);
        $email = $post['email'];
        $password = $post['password'];

        $user = new UserModel;
        $resultado = $user->login($email, $password);
        
        if ($resultado != false){
            $user->setToken($resultado);
        }
        
        $bool = $user->getToken();

        if ($bool){
            $this->create_session($resultado);
        }
       
        $user->getNivel();
        $userView = new UserView;
        $userView->Login();

    }

    //Limpa os posts, valida os campos, verifica e faz o cadastro.
    public function cadastro()
    {
        $post = $this->getPost();
        $post = $this->clearHTML($post);
        $name = $post['name'];
        $email = $post['email'];
        $password = $post['password'];
        $passwordC = $post['passwordC'];
        $CPF = $post['CPF'];
        $tell = $post['tell'];

        $Valida = new ValidController($name, $email, $password, $passwordC, $CPF);
        $Valida->Validar();
        
        $user = new userModel;
        $header = $user->cadastrar($name, $email, $password, $CPF, $tell);

        if ($header == 1)
        {
            $userView = new UserView;
            $userView->Cadastro();
        }
    }
}
