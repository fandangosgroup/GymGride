<?php

namespace GymGride\Controller;
use GymGride\Controller\Controller;

class MethodController extends Controller
{
    public function MethodController($m)
    {
        if ($m == 'login')
        {
			$mth = new UserController();
			$mth->login();
        }

        if ($m == 'cadastro')
        {
			$mth = new UserController();
			$mth->cadastro();
        }

        if ($m == 'index'){
            $mth = new TreinoController();
            $mth->index();
        }
    }   

}