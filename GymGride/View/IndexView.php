<?php

namespace GymGride\View;
use GymGride\View\View;

class IndexView extends View 
{
    public function mostrarindex($a)
    {
        $this->mostrar();
        
        if($a == 1){
            echo '<!DOCTYPE html>';
            echo '<html xmlns="http://www.w3.org/1999/xhtml">';
            echo '<head>';
            echo '</head>';
            echo '<body>';
            echo '<div class="al alert alert-success"><p><strong>Sucesso!</strong> Cadastrado, parabéns!</p></div>';
            echo '</body>';
            echo '</html>';
        }

        if($a == 2){
            echo '<!DOCTYPE html>';
            echo '<html xmlns="http://www.w3.org/1999/xhtml">';
            echo '<head>';
            echo '</head>';
            echo '<body>';
            echo '<div class="al alert alert-danger"><p><strong>Alerta:</strong> Dados Vazios!!.</p></div>';
            echo '</body>';
            echo '</html>';
        }

        if($a == 3){
            echo '<!DOCTYPE html>';
            echo '<html xmlns="http://www.w3.org/1999/xhtml">';
            echo '<head>';
            echo '</head>';
            echo '<body>';
            echo '<div class="al alert alert-danger"><p><strong>Alerta:</strong> As senhas não se corespodem!.</p></div>';
            echo '</body>';
            echo '</html>';
        }

        if($a == 4){
            echo '<!DOCTYPE html>';
            echo '<html xmlns="http://www.w3.org/1999/xhtml">';
            echo '<head>';
            echo '</head>';
            echo '<body>';
            echo '<div class="al alert alert-danger"><p><strong>Alerta:</strong> nome , email e senha não podem conter espaço!.</p></div>';
            echo '</body>';
            echo '</html>';
        }

        if($a == 5){
            echo '<!DOCTYPE html>';
            echo '<html xmlns="http://www.w3.org/1999/xhtml">';
            echo '<head>';
            echo '</head>';
            echo '<body>';
            echo '<div class="al alert alert-danger"><p><strong>Alerta:</strong> nome tem que ser do tipo caractere!.</p></div>';
            echo '</body>';
            echo '</html>';
        }

        if($a == 6){
            echo '<!DOCTYPE html>';
            echo '<html xmlns="http://www.w3.org/1999/xhtml">';
            echo '<head>';
            echo '</head>';
            echo '<body>';
            echo '<div class="al alert alert-danger"><p><strong>Alerta:</strong> nome não pode ter comprimento maior que 10 caracteres!.</p></div>';
            echo '</body>';
            echo '</html>';
        }

        if($a == 7){
            echo '<!DOCTYPE html>';
            echo '<html xmlns="http://www.w3.org/1999/xhtml">';
            echo '<head>';
            echo '</head>';
            echo '<body>';
            echo '<div class="al alert alert-danger"><p><strong>Alerta:</strong> Email não é valido!.</p></div>';
            echo '</body>';
            echo '</html>';
        }

        if($a == 8){
            echo '<!DOCTYPE html>';
            echo '<html xmlns="http://www.w3.org/1999/xhtml">';
            echo '<head>';
            echo '</head>';
            echo '<body>';
            echo '<div class="al alert alert-danger"><p><strong>Alerta:</strong> Senha não pode ter comprimento maior que 15 caracteres!.</p></div>';
            echo '</body>';
            echo '</html>';
        }

        if($a == 9){
            echo '<!DOCTYPE html>';
            echo '<html xmlns="http://www.w3.org/1999/xhtml">';
            echo '<head>';
            echo '</head>';
            echo '<body>';
            echo '<div class="al alert alert-danger"><p><strong>Alerta:</strong> Usuario Invalido!!.</p></div>';
            echo '</body>';
            echo '</html>';
        }

        if($a == 10){
            echo '<!DOCTYPE html>';
            echo '<html xmlns="http://www.w3.org/1999/xhtml">';
            echo '<head>';
            echo '</head>';
            echo '<body>';
            echo '<div class="al alert alert-danger"><p><strong>Alerta:</strong> CPF Invalido!!.</p></div>';
            echo '</body>';
            echo '</html>';
        }
    }
}