<?php

namespace GymGride\View;

use GymGride\Model\AdminModel;
use GymGride\View\View;
use GymGride\Controller\UserController;

class DashboardView extends View
{
    public function Dashboard(){
        
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
}