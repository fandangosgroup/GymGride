<?php

namespace GymGride\Controller;
use GymGride\Controller\Controller;
use GymGride\Model\AdminModel;
use GymGride\View\AdminView;

class AdminController extends Controller 
{
    public function AllUsers() 
    {
        $adminModel = new AdminModel;
        $array = $adminModel->getAllUsers();
        
        $users = $array[0];
        $num = $array[1];

        $adminView = new AdminView;
        $adminView->Adminrender($users, $num);
        
    }
}