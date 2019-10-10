<?php

namespace GymGride\View;

abstract class View 
{
    public function mostrar($name)
    {
         header("location: /GymGride/src/View/$name.html");
    }
    public function goIndex(){
    	header("location: /GymGride/src/View/index.html");
    }
}