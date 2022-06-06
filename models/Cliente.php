<?php
class Cliente{
    public $id;
    public $nome;
    public $sobrenome;
    public $telefone;
    public $cpf;
    public $nascimento;

    function __construct($id, $nome, $sobrenome, $telefone, $cpf, $nascimento){
        $this->id = $id;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->telefone = $telefone;
        $this->cpf = $cpf;
        $this->nascimento = $nascimento;;
    }

    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO cliente (id_login, nome, sobrenome, telefone, cpf, nascimento) VALUES (:id_login, :nome, :sobrenome, :telefone, :cpf, :nascimento);");
            $stmt->bindParam(':id_login' , $this->id);
            $stmt->bindParam(':nome' , $this->nome);
            $stmt->bindParam(':sobrenome' , $this->sobrenome);
            $stmt->bindParam(':telefone' , $this->telefone);
            $stmt->bindParam(':cpf' , $this->cpf);
            $stmt->bindParam(':nascimento' , $this->nascimento);
            $stmt->execute();
            
            return true;  

        }catch(PDOException $e) {
            $result['message'] = "Error Create: " . $e->getMessage();
            $response= new Output();
            $response->out($result, 500); 
        }
    }

    function delete(){
        $db = new DataBase();
        try{
            $stmt = $db->conn->prepare("DELETE FROM cliente WHERE id_login= :id_login;");
            $stmt->bindParam(':id_login' , $this->id);
            $stmt->execute();

            return true;

        }catch(PDOException $e) {
            $result['message'] = "Error Delete: " . $e->getMessage();
            $response= new Output();
            $response->out($result, 500); 
        }
    }

    function update(){
        $db = new DataBase();
        try{
            $stmt = $db->conn->prepare("UPDATE cliente SET nome=:nome,sobrenome=:sobrenome, telefone=:telefone, cpf=:cpf, nascimento=:nascimento WHERE id_login= :id_login;");
            $stmt->bindParam(':id_login' , $this->id);
            $stmt->bindParam(':nome' , $this->nome);
            $stmt->bindParam(':sobrenome' , $this->sobrenome);
            $stmt->bindParam(':telefone' , $this->telefone);
            $stmt->bindParam(':cpf' , $this->cpf);
            $stmt->bindParam(':nascimento' , $this->nascimento);
            $stmt->execute();
            return true;

        }catch(PDOException $e) {
            $result['message'] = "Error Update: " . $e->getMessage();
            $response= new Output();
            $response->out($result, 500); 
        }
    }

    function selectAll(){
        $db = new DataBase();
        try{
            $stmt = $db->conn->prepare("SELECT * FROM cliente");
            $stmt->execute();
            $result= $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        }catch(PDOException $e) {
            $result['message'] = "Error Select All User: " . $e->getMessage();
            $response= new Output();
            $response->out($result, 500);        
        }
    }

    function selectById(){
        $db = new DataBase();
        try{
            $stmt = $db->conn->prepare("SELECT * FROM cliente WHERE id_login=:id_login;");
            $stmt->bindParam(':id' , $this->id);
            $stmt->execute();
            $result= $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e) {
            $result['message'] = "Error Select By ID: " . $e->getMessage();
            $response= new Output();
            $response->out($result, 500); 
        }
    }

    function login(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("SELECT *  FROM cliente WHERE email = :email AND senha = :senha; ");
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':senha', $this->senha);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e) {
            $result['message'] = "Error cliente Login:" . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }


}
?>