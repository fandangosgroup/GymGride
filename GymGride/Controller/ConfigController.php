<?php
namespace GymGride\Controller;
use GymGride\Controller\Controller;
use GymGride\Model\ConfigModel;
use GymGride\View\ConfigView;

class ConfigController extends Controller 
{
    public function ViewConfig()
    {
        $ViewModel = new ConfigModel;
        $data = $ViewModel->getData();
        
        $ViewConfig = new ConfigView;
        $ViewConfig->MostrarConfig($data);
    }
}