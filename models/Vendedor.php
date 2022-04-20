<?php
class Vendedor{
    public $id;
    public $nome;
    public $sobrenome;
    public $email;
    public $telefone;
    public $cpf;
    public $rg;
    public $nascimento;
    public $senha;
    public $cep;

    function __construct($id, $nome, $sobrenome, $email, $telefone, $cpf, $rg, $nascimento, $senha, $cep){
        $this->id = $id;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->nascimento = $nascimento;
        $this->senha = $senha;
        $this->cep = $cep;
    }

    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO vendedores (nome, sobrenome, email, telefone, cpf, rg, nascimento, senha, cep) VALUES (:nome, :sobrenome, :email, :telefone, :cpf, :rg, :nascimento, :senha, :cep);");
            $stmt->bindParam(':nome' , $this->nome);
            $stmt->bindParam(':sobrenome' , $this->sobrenome);
            $stmt->bindParam(':email' , $this->email);
            $stmt->bindParam(':telefone' , $this->telefone);
            $stmt->bindParam(':cpf' , $this->cpf);
            $stmt->bindParam(':rg' , $this->rg);
            $stmt->bindParam(':nascimento' , $this->nascimento);
            $stmt->bindParam(':senha' , $this->senha);
            $stmt->bindParam(':cep' , $this->cep);
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
            $stmt = $db->conn->prepare("DELETE FROM vendedores WHERE id= :id;");
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
            $stmt = $db->conn->prepare("UPDATE vendedores SET nome=:nome,sobrenome=:sobrenome, email=:email, telefone=:telefone, cpf=:cpf, rg=:rg, nascimento=:nascimento, senha=:senha, cep=:cep WHERE id= :id;");
            $stmt->bindParam(':id' , $this->id);
            $stmt->bindParam(':nome' , $this->nome);
            $stmt->bindParam(':sobrenome' , $this->sobrenome);
            $stmt->bindParam(':email' , $this->email);
            $stmt->bindParam(':telefone' , $this->telefone);
            $stmt->bindParam(':cpf' , $this->cpf);
            $stmt->bindParam(':rg' , $this->rg);
            $stmt->bindParam(':nascimento' , $this->nascimento);
            $stmt->bindParam(':senha' , $this->senha);
            $stmt->bindParam(':cep' , $this->cep);
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
            $stmt = $db->conn->prepare("SELECT * FROM vendedores");
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
            $stmt = $db->conn->prepare("SELECT * FROM vendedores WHERE id=:id;");
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