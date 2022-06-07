<?php
class Vendedor{
    public $id;
    public $nome;
    public $sobrenome;
    public $telefone;
    public $cpf;
    public $rg;
    public $nascimento;
    public $cep;

    function __construct($id, $nome, $sobrenome, $telefone, $cpf, $rg, $nascimento, $cep){
        $this->id = $id;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->telefone = $telefone;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->nascimento = $nascimento;
        $this->cep = $cep;
    }

    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO vendedores (id_login, nome, sobrenome, telefone, cpf, rg, nascimento, cep) VALUES (:id_login, :nome, :sobrenome, :telefone, :cpf, :rg, :nascimento, :cep);");
            $stmt->bindParam(':id_login' , $this->id);
            $stmt->bindParam(':nome' , $this->nome);
            $stmt->bindParam(':sobrenome' , $this->sobrenome);
            $stmt->bindParam(':telefone' , $this->telefone);
            $stmt->bindParam(':cpf' , $this->cpf);
            $stmt->bindParam(':rg' , $this->rg);
            $stmt->bindParam(':nascimento' , $this->nascimento);
            $stmt->bindParam(':cep' , $this->cep);
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
            $stmt = $db->conn->prepare("DELETE FROM login WHERE id= :id;");
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
            $stmt = $db->conn->prepare("UPDATE vendedores SET nome=:nome,sobrenome=:sobrenome, telefone=:telefone, cpf=:cpf, rg=:rg, nascimento=:nascimento, cep=:cep WHERE id_login= :id_login;");
            $stmt->bindParam(':id_login' , $this->id);
            $stmt->bindParam(':nome' , $this->nome);
            $stmt->bindParam(':sobrenome' , $this->sobrenome);
            $stmt->bindParam(':telefone' , $this->telefone);
            $stmt->bindParam(':cpf' , $this->cpf);
            $stmt->bindParam(':rg' , $this->rg);
            $stmt->bindParam(':nascimento' , $this->nascimento);
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
            $stmt = $db->conn->prepare("SELECT * FROM vendedores WHERE id_login=:id_login;");
            $stmt->bindParam(':id_login' , $this->id);
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