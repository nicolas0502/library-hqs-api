<?php 
class SessionVend{
    public $idVend;
    public $token;
    public $description;
    
    function __construct($idVend, $token, $description) {
        $this->idVend = $idVend;
        $this->token = $token;
        $this->description = $description;
    }

    function create(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("INSERT INTO sessions (id_vend, token, description, create_at)
            VALUES (:id_vend, :token, :description, NOW());");
            $stmt->bindParam(':id_vend', $this->idVend);
            $stmt->bindParam(':token', $this->token);
            $stmt->bindParam(':description', $this->description);
            $stmt->execute();
            return true;
        }catch(PDOException $e) {
            $result['message'] = "Error Create Session" . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }

    function delete(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("DELETE FROM sessions WHERE token = :token;");
            $stmt->bindParam(':token', $this->token);
            $stmt->execute();
            return $stmt->rowCount();
        }catch(PDOException $e) {
            $result['message'] = "Error Delete Session: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }

    function checkSessionRoles(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("SELECT s.id_vend, v.regras FROM
            sessions_vend as s
            JOIN vendedores as v ON s.id_vend = v.id
            WHERE s.token = :token;");
            $stmt->bindParam(':token', $this->token);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e) {
            $result['message'] = "Error Check Session Roles: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }
}
?>