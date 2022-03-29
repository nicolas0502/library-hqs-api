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
        $db = new DataBase();
        try{
            $stmt = $db->conn->prepare("DELETE FROM users WHERE id= :id");
            $stmt->bindParam(':id' , $this->id);
            $stmt->execute();

            echo "Deletado com sucesso!";

        }catch(PDOException $e) {
            echo "ERRO: " . $e->getMessage();
        }
    }
}
?>