<?php
namespace GymGride\Controller;
use GymGride\Controller\Controller;

class SessionController extends Controller{

    public function __construct(){
        if (!session_id()){     
            session_start();
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