<?php

namespace GymGride\Controller;

use GymGride\View\IndexView;


class Controller {


    public function view()
    {
        $view = new IndexView;
        $view->index();
    }

    public function getPost($num, $nameposts)
    {
        if ($num == 4){
            
            print_r($nameposts[0]);
            print_r($nameposts[1]);
            print_r($nameposts[2]);
            print_r($nameposts[3]);
            
            $$name  = $_POST["name"];
            $$email = $_POST["email"];
            $$password = $_POST["password"];
            $$passwordC = $_POST["passwordC"];
        }
        
    
    }






}   
