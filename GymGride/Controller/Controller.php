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

    public function clearHTML($data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = strip_tags ($value);
        }
        return $data;
    }

    function pagsave(){
        // A sessão precisa ser iniciada em cada página diferente
      if (!isset($_SESSION)) session_start();
        
      $nivel = 1;
      // Verifica se não há a variável da sessão que identifica o usuário
      if (!isset($_SESSION['User_ID']) || ($nivel != $_SESSION['User_Nivel'])) {
          // Destrói a sessão por segurança
          session_destroy();
          // Redireciona o visitante de volta pro login
          header("Location: /Invalido"); exit;
      }
    }

    function pagsavePersonal(){
        // A sessão precisa ser iniciada em cada página diferente
      if (!isset($_SESSION)) session_start();
        
      $nivel = 2;
      // Verifica se não há a variável da sessão que identifica o usuário
      if (!isset($_SESSION['User_ID']) || ($nivel != $_SESSION['User_Nivel'])) {
          // Destrói a sessão por segurança
          session_destroy();
          // Redireciona o visitante de volta pro login
          header("Location: /Invalido"); exit;
      }
    }

    function pagsaveAdmin(){
        // A sessão precisa ser iniciada em cada página diferente
      if (!isset($_SESSION)) session_start();
        
      $nivel = 3;
      // Verifica se não há a variável da sessão que identifica o usuário
      if (!isset($_SESSION['User_ID']) || ($nivel != $_SESSION['User_Nivel'])) {
          // Destrói a sessão por segurança
          session_destroy();
          // Redireciona o visitante de volta pro login
          header("Location: /Invalido"); exit;
      }
    }



}   
