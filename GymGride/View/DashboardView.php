<?php

namespace GymGride\View;

use GymGride\View\View;
use GymGride\Controller\UserController;
use GymGride\Controller\AdminController;
use GymGride\Controller\SessionController;

class DashboardView extends View
{
    
    public function Dashboard()
    {
        if (!isset($_SESSION)) session_start();
        $nivel = $_SESSION['User_Nivel'];
        
        

        switch ($nivel) {
            case 1:
                $this->Usuario();
                break;

            case 2:
                header("Location: /Personal");
                break;

            case 3:
                header("Location: /Admin");
                break;

            default:
                header("Location: /Invalido");
                break;
        }
    }
    
    public function Usuario()
    {
        $regenerate = new SessionController;
        
        
        $session = new UserController;
        $session->pagsave();


        $dados[0][0] = $_SESSION['User_Name'];
        //$dados[0][1] = $_SESSION['User_photo'];
        $dados[0][1] = '123';
        
        // $u = new AdminModel;
        // $array = $u->getAllUsers();
        // $this->ver($array);
    
        $files = $this->render('','Dashboard');
        $html = $this->replace($files, $dados);
        print_r($html);
        // print_r(session_status());
        
        // print_r(session_cache_expire());
        // print_r(session_name());
        // print_r(session_id());
       
        //     print_r(session_cache_expire());
        //     print_r(session_cache_limiter());

        //     print_r(session_cache_expire());
        //     print_r(session_cache_limiter());

        //     print_r(session_cache_expire());
        //     print_r(session_cache_limiter());

        //     print_r(session_cache_expire());
        //     print_r(session_cache_limiter());

        //     print_r(session_cache_expire());
            
        
    }

    public function Personal()
    {
        $regenerate = new SessionController;
        
        $session = new UserController;
        $session->pagsavePersonal();

        $this->mostrar('Personal');
    }

    public function Admin()
    {
        $regenerate = new SessionController;
        
        $session = new UserController;
        $session->pagsaveAdmin();

        $teste = new AdminController;
        $teste->AllUsers();
    }
}