<?php
namespace GymGride\Model;
use GymGride\Model\Model;

class ConfigModel extends Model 
{
    //Busca os dados do usuario e retorna
    public function getData()
    {
        $id = $_SESSION['User_ID'];
        $stmt = $this->getAll('Usuarios', 'Nome, Email, Telefone, CPF, Nivel, Senha', "ID_User = '$id' ");
        $resultado = $this->getResult($stmt); 
        return $resultado;
    }

    //Atualiza os dados do usuario
    public function setData($data)
    {
        $id = $_SESSION['User_ID'];
        $where = "ID_User = $id";
        
        $this->update('Usuarios', 'Nome', "'$data[name]'", $where);
        $this->update('Usuarios', 'Email', "'$data[email]'", $where);
        $this->update('Usuarios', 'Telefone', "'$data[tell]'", $where);
        //$this->update('Usuarios', 'Nome', $data['name'], $where);
    }
}