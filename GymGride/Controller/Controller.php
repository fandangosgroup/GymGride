<?php

namespace GymGride\Controller;

use GymGride\View\IndexView;
use GymGride\Model\Model;

class Controller {

    public $allPost;
    public $html;

    public function ver($v)
    {
        echo "<pre>";
        print_r($v);
        echo "</pre>";
        die();
    }

    public function view($p)
    {

        $view = new IndexView;
        $view->mostrar($p);
    }
    //Captura todos os posts, tornar a variavel $allPost Global.
    public function getPost()
    {
        foreach ($_POST as $key => $value) {
            $this->allPost[$key] = $value; 
        }
        return $this->allPost;
    }

    public function trainingCrudGeneration()
    {
        $m = new Model(); // a model é abstrada, aqui vai a classe que extende a model, como vai ser outro controller
        //$user = $_SESSION['str_user'];
        $dados = $m->getAll('usuarios', '*');

        //é uma ideia para criar o html da view
        $this->html = '<tr>';
        foreach ($dados as $rows => $value) {
            $this->html .= "<td>$rows, $value</td>";
        }
        $html = $this->html .= '</tr>';
        return $html;
    }



}   
