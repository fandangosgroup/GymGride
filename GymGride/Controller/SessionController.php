<?php
namespace GymGride\Controller;
use GymGride\Controller\Controller;

class SessionController extends Controller{

    //Construcy que verifica se existe uma sessão, se não existir cria uma, e verifica quanto tempo o usuario
    //Esta logado, e regenera o ID a cada 1Min e 40s
    public function __construct(){
        if (!session_id()){     
            session_start();
            session_regenerate_id();
        }

        if (isset($_SESSION['User_ID'])){
            $tempo = $_SESSION['Tempo'];
            $Refresh = $_SESSION['Refresh'];
          
            if ($Refresh < time() - 100) {
                session_regenerate_id();
                $_SESSION['Refresh'] = time();
            }
    
            if ($tempo < time() - 3600) {
                $this->logout();
            }
        }
       
    }

    //Set um valor na session
    public static function setValue($var, $value){
        $_SESSION[$var] = $value;
    }

    //pega um valor da session
    public static function getValue($var){
        if (isset($_SESSION[$var])){
            return $_SESSION[$var];
        }
    }

    //Destroy a session
    public static function logout() {
        $_SESSION = array();
        session_destroy();
    }
}