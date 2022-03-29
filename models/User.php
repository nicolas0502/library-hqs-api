<?php
require ('helpers/database.php');

class User{
    //Propriedades
    public $id;
    public $name;
    public $email;
    public $pass;

    //construct

    function __construct($id, $name, $email, $pass){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->pass = $pass;
    }

    //Métodos

    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO users (name, email, pass) VALUES (:name, :email, :pass)");
            $stmt->bindParam(':name' , $this->name);
            $stmt->bindParam(':email' , $this->email);
            $stmt->bindParam(':pass' , $this->pass);
            $stmt->execute();

            echo "Cadastrado com sucesso!";

        }catch(PDOException $e) {
            echo "ERRO: " . $e->getMessage();
        }
    }

    function delete(){
        echo "Delete no Banco: " . $this->id;
    }
}
?>