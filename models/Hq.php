<?php
class Hq{
    public $id;
    public $id_vendedor;
    public $nome;
    public $valor;
    public $quantidade;
    public $descricao;
    public $imagem;

    function __construct($id, $id_vendedor, $nome, $valor, $quantidade, $descricao, $imagem){
        $this->id = $id;
        $this->id_vendedor = $id_vendedor;
        $this->nome = $nome;
        $this->valor = $valor;
        $this->quantidade = $quantidade;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
    }

    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO hqs (id_vendedor, nome, valor, quantidade, descricao,imagem) VALUES (:id_vendedor, :nome, :valor, :quantidade, :descricao, :imagem);");
            $stmt->bindParam(':id_vendedor' , $this->id_vendedor);
            $stmt->bindParam(':nome' , $this->nome);
            $stmt->bindParam(':valor' , $this->valor);
            $stmt->bindParam(':quantidade' , $this->quantidade);
            $stmt->bindParam(':descricao' , $this->descricao);
            $stmt->bindParam(':imagem' , $this->imagem);
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
            $stmt = $db->conn->prepare("DELETE FROM hqs WHERE id=:id AND id_vendedor=:id_vendedor;");
            $stmt->bindParam(':id' , $this->id);
            $stmt->bindParam(':id_vendedor' , $this->id_vendedor);
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
            $stmt = $db->conn->prepare("UPDATE hqs SET nome=:nome,valor=:valor, quantidade=:quantidade, descricao=:descricao, imagem=:imagem WHERE id=:id AND id_vendedor=:id_vendedor;");
            $stmt->bindParam(':id' , $this->id);
            $stmt->bindParam(':id_vendedor' , $this->id_vendedor);
            $stmt->bindParam(':nome' , $this->nome);
            $stmt->bindParam(':valor' , $this->valor);
            $stmt->bindParam(':quantidade' , $this->quantidade);
            $stmt->bindParam(':descricao' , $this->descricao);
            $stmt->bindParam(':imagem' , $this->imagem);
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
            $stmt = $db->conn->prepare("SELECT * FROM hqs");
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
            $stmt = $db->conn->prepare("SELECT * FROM hqs WHERE id=:id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            $result= $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e) {
            $result['message'] = "Error Select By ID: " . $e->getMessage();
            $response= new Output();
            $response->out($result, 500); 
        }
    }

    function selectByIds($id){
        $arrayIds = array_map('intval', explode(',', $id));
        $arrayIds = implode(',', $arrayIds);
        $db = new DataBase();
        try{
            $stmt = $db->conn->prepare("SELECT * FROM hqs WHERE id IN($arrayIds);");
            $stmt->execute();
            $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e) {
            $result['message'] = "Error Select By ID: " . $e->getMessage();
            $response= new Output();
            $response->out($result, 500); 
        }
    }

    function selectHqByVendedor($id){
        $db = new DataBase();
        try{
            $stmt = $db->conn->prepare("SELECT * FROM hqs WHERE id_vendedor=:id;");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e) {
            $result['message'] = "Error Select Hq By Vendedor: " . $e->getMessage();
            $response= new Output();
            $response->out($result, 500); 
        }
    }


}
?>