<?php

namespace GymGride\Model;
use GymGride\Model\Model;

class AdminModel extends Model 
{
    public function getAllUsers()
    {
        $stmt = $this->getAll('Usuarios', '*');

        $num = $stmt->rowCount();
        //print_r($num);
        //if($num == 1){
            $resultado = $this->getResult($stmt);
            //$this->ver($resultado);
        //}
        $array[0] = $resultado;
        $array[1] = $num;
        return $array;
    }
}