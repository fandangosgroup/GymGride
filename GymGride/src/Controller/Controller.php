<?php
namespace GymGride\Controller;

use GymGride\View\IndexView;

class Controller {





    public function view(){
        $view = new IndexView;
        $view->index();
    }
}