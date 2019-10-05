<?php

namespace GymGride\Model;

use GymGride\Model\Model;

class userModel extends Model
{
    public function login($email, $senha)
    {
        $stmt = $this->getAll('usuarios', 'id, nivel, nome', "email = '$email' and senha = SHA1($senha)");
        $resultado = $this->getResult($stmt);
        return $resultado;
    }
}