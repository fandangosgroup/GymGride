<?php
namespace GymGride\Controller;
use GymGride\Controller\Controller;

class SessionController extends Controller{

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

    public static function setValue($var, $value){
        $_SESSION[$var] = $value;
    }

    public static function getValue($var){
        if (isset($_SESSION[$var])){
            return $_SESSION[$var];
        }
    }

    public static function logout() {
        $_SESSION = array();
        session_destroy();
    }
}