<?php
namespace GymGride\Model;
use GymGride\Model\Model;

class ConfigModel extends Model 
{
    public function getData()
    {
        $email = $_SESSION['User_Email'];
        $stmt = $this->getAll('Usuarios', 'Telefone, CPF, Nivel, Senha', "Email = '$email' ");
        $resultado = $this->getResult($stmt); 
        return $resultado;
    }
}