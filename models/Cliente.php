<?php
class Cliente{
    public $id;
    public $nome;
    public $sobrenome;
    public $email;
    public $telefone;
    public $cpf;
    public $nascimento;
    public $senha;

    function __construct($id, $nome, $sobrenome, $email, $telefone, $cpf, $nascimento, $senha){
        $this->id = $id;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->cpf = $cpf;
        $this->nascimento = $nascimento;
        $this->senha = $senha;
    }

    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO cliente (nome, sobrenome, email, telefone, cpf, nascimento, senha, regras) VALUES (:nome, :sobrenome, :email, :telefone, :cpf, :nascimento, :senha), 'cliente';");
            $stmt->bindParam(':nome' , $this->nome);
            $stmt->bindParam(':sobrenome' , $this->sobrenome);
            $stmt->bindParam(':email' , $this->email);
            $stmt->bindParam(':telefone' , $this->telefone);
            $stmt->bindParam(':cpf' , $this->cpf);
            $stmt->bindParam(':nascimento' , $this->nascimento);
            $stmt->bindParam(':senha' , $this->senha);
            $stmt->execute();

            $id = $db->conn->lastInsertId();
            
            return $id;  

        }catch(PDOException $e) {
            $result['message'] = "Error Create: " . $e->getMessage();
            $response= new Output();
            $response->out($result, 500); 
        }
    }

    function delete(){
        $db = new DataBase();
        try{
            $stmt = $db->conn->prepare("DELETE FROM cliente WHERE id= :id;");
            $stmt->bindParam(':id' , $this->id);
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
            $stmt = $db->conn->prepare("UPDATE cliente SET nome=:nome,sobrenome=:sobrenome, email=:email, telefone=:telefone, cpf=:cpf, nascimento=:nascimento, senha=:senha WHERE id= :id;");
            $stmt->bindParam(':id' , $this->id);
            $stmt->bindParam(':nome' , $this->nome);
            $stmt->bindParam(':sobrenome' , $this->sobrenome);
            $stmt->bindParam(':email' , $this->email);
            $stmt->bindParam(':telefone' , $this->telefone);
            $stmt->bindParam(':cpf' , $this->cpf);
            $stmt->bindParam(':nascimento' , $this->nascimento);
            $stmt->bindParam(':senha' , $this->senha);
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
            $stmt = $db->conn->prepare("SELECT * FROM cliente WHERE id=:id;");
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


}
?>