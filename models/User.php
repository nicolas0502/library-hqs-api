<?php
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
            $id = $db->conn->lastInsertId();
            $result['message'] = "O Usuário foi Cadastrado Com Sucesso ";
            $result['user']['id'] = $id;
            $result['user']['name'] = $this->name;
            $result['user']['email'] = $this->email;
            $result['user']['pass'] = $this->pass;
            $response= new Output();
            $response->out($result, 200);  

        }catch(PDOException $e) {
            $result['message'] = "Error Create: " . $e->getMessage();
            $response= new Output();
            $response->out($result, 500); 
        }
    }

    function delete(){
        $db = new DataBase();
        try{
            $stmt = $db->conn->prepare("DELETE FROM users WHERE id= :id");
            $stmt->bindParam(':id' , $this->id);
            $stmt->execute();

            $result['message'] = "O Usuário foi Deletado Com Sucesso ";
            $result['user']['id'] = $this->id;
            $response= new Output();
            $response->out($result, 200);

        }catch(PDOException $e) {
            $result['message'] = "Error Delete: " . $e->getMessage();
            $response= new Output();
            $response->out($result, 500); 
        }
    }

    function update(){
        $db = new DataBase();
        try{
            $stmt = $db->conn->prepare("UPDATE users SET name=:name,email=:email, pass=:pass WHERE id= :id");
            $stmt->bindParam(':id' , $this->id);
            $stmt->bindParam(':name' , $this->name);
            $stmt->bindParam(':email' , $this->email);
            $stmt->bindParam(':pass' , $this->pass);
            $stmt->execute();

            $result['message'] = "Update de Usuário feito Com Sucesso ";
            $result['user']['id'] = $this->id;
            $result['user']['name'] = $this->name;
            $result['user']['email'] = $this->email;
            $result['user']['pass'] = $this->pass;
            $response= new Output();
            $response->out($result, 200); 

        }catch(PDOException $e) {
            $result['message'] = "Error Update: " . $e->getMessage();
            $response= new Output();
            $response->out($result, 500); 
        }
    }

    function selectAll(){
        $db = new DataBase();
        try{
            $stmt = $db->conn->prepare("SELECT * FROM users");
            $stmt->execute();
            $result= $stmt->fetchAll(PDO::FETCH_ASSOC);

            $response = new Output();
            $response->out($result);
        }catch(PDOException $e) {
            $result['message'] = "Error Select All User: " . $e->getMessage();
            $response= new Output();
            $response->out($result, 500);        
        }
    }

    function selectById(){
        $db = new DataBase();
        try{
            $stmt = $db->conn->prepare("SELECT name, email, pass FROM users WHERE id=:id");
            $stmt->bindParam(':id' , $this->id);
            $stmt->execute();
            $result= $stmt->fetch(PDO::FETCH_ASSOC);
            print_r($result);
        }catch(PDOException $e) {
            $result['message'] = "Error Select By ID: " . $e->getMessage();
            $response= new Output();
            $response->out($result, 500); 
        }
    }


}
?>