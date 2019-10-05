<?php

namespace GymGride\View;
use GymGride\View\View;

class IndexView extends View 
{
    public function index()
    {
        $name = Index;
        $this->mostrar($name);
    }
}