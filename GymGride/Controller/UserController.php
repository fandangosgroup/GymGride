<?php 

namespace GymGride\Controller;
use GymGride\Controller\Controller;
use GymGride\Model\UserModel;
use GymGride\Controller\TreinoController;
use GymGride\View\DashboardView;
use GymGride\View\UserView;

class UserController extends Controller
{
    function pagsave(){
        // A sessão precisa ser iniciada em cada página diferente
      if (!isset($_SESSION)) session_start();
        
      // Verifica se não há a variável da sessão que identifica o usuário
      if (!isset($_SESSION['User_ID'])) {
          // Destrói a sessão por segurança
          session_destroy();
          // Redireciona o visitante de volta pro login
          header("Location: /"); exit;
      }
    }

    function create_session($resultado){
    
        // Salva os dados encontrados na sessão
        $ID_User = $resultado[0]['ID_User'];
        $User_photo = $resultado[0]['Photo'];
        $User_Nome = $resultado[0]['Nome'];
        $User_Nivel = $resultado[0]['Nivel'];
        $Token = $resultado[0]['Token'];
        
        
        // Se a sessão não existir, inicia uma
        $Session = new SessionController();
        $Session->setValue('User_ID',$ID_User);
        $Session->setValue('User_Name',$User_Nome);
        $Session->setValue('User_Nivel',$User_Nivel);
        //$Session->setValue('User_photo',$token);
        //$Session->setValue('User_Token',$token);
        print_r($_SESSION);
    }
    
    public function login()
    {
        $post = $this->getPost();
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
        
        $userView = new UserView;
        $userView->Login();
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
            $userView = UserView;
            $userView->Cadastro();
        }
    }
}
