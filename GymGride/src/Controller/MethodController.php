<?php

namespace GymGride\Controller;
use GymGride\Controller\Controller;

class MethodController extends Controller
{
    public function MethodController($m)
    {
        if ($m == 'login'){
			$mth = new UserController();
			$mth->login();
        }

        if ($m == 'index'){
            $mth = new TreinoController();
            $mth->index();
        }
    }   

}