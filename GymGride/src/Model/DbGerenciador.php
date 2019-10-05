<?php
namespace GymGride\Model;

class DbGerenciador {
    static private $hostname = 'localhost';
    static private $username = 'root';
    static private $senha = '';

    /*function __construct($hostname , $username , $senha){
        $this->hostname = $hostname;
        $this->username = $username;
        $this->senha = $senha;
    }*/
    function __set($classname, $value)
    {
       switch($classname){
            case "hostname":
                if (explode('.', $value, 3)){
                   $this->hostname = $value;
                }else{
                    echo "ip invalido";
                }
            case "username":
                //validacoes
            case "senha":
                //validaoes
            default:
            die("Erro no __Set");
        }
    
    
            
    }

    function __get($classname)
    {
        switch ($classname) {
            case 'hostname':
                return $this->hostname;
                break;
            case 'username':
                return $this->username;
                break;
            case 'senha':
                return $this->senha;
            default:
                die();
                break;
        }
    }

    public function db_connect(){
        try {
            $con = new \PDO("mysql:host=localhost;dbname=secure_login", "root", "");
            $con->exec("set names utf8");
            return $con;
        }

        catch (PDOException $e) {
            print "Erro!:" . $e->getMessage() . "<br>";
        }
    }

    public function db_insert($con,$name,$email,$senha){
        try {
            $sql = "INSERT INTO usuarios VALUES (NULL, 'Usuário', :name, SHA1(:senha), :email, 1, 1, NOW( ));";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
        }

        catch (PDOException $e) {
                print "Erro!:" . $e->getMessage() . "<br>";
        }
    }

    public function db_select($con,$email,$senha){
        try {
            $sql = "SELECT id, nome, nivel FROM usuarios WHERE email = :email AND senha = SHA1(:senha)";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
        }

        catch (PDOException $e) {
            print "Erro!:" . $e->getMessage() . "<br>";
        }
        
        return $stmt;
    }

    public function db_close(){
        $con = null;
    }

    public function db_check($stmt){
        $num = $stmt->rowCount();
        return $num;
    }

    public function db_session($stmt){
        $resultado = $stmt->fetchAll();
        return $resultado;
    }
}
