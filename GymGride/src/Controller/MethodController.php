<?php

namespace GymGride\Controller;
use GymGride\Controller\Controller;

class MethodController extends Controller
{
    public function MethodController($m)
    {
        if ($m == 'autenticar'){
			$mth = new UserController();
			$mth->autenticar();
        }
        
        //if ($m == '')
   
    
    }   

}