<?php
class AuthController{

    function login(){
        $response = new Output();
        $response->allowedMethod('POST');

        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $description = $_SERVER['HTTP_USER_AGENT'];

        $cliente = new Cliente(null, null, null, $email, null, null, null, sha1($pass));
        $clienteLogged = $cliente->login();
        
        if($clienteLogged){
            $token = md5(uniqid($clienteLogged['id'], true));
            $session = new SessionUser($clienteLogged['id'], $token, $description);
            if($session->create()){
                $result['session']['token'] = $token;
                $result['session']['email'] = $clienteLogged['email'];
                $result['session']['roles'] = $clienteLogged['roles'];
                $response->out($result);
            }
        }else{
            $result['message'] = "Usuário ou Senha Inválidos!";
            $response->out($result, 403);
        }
    }

    function logout(){
        $response = new Output();
        $response->allowedMethod('POST');

        $token = $_POST['token'];

        $session = new SessionUser(null, $token, null);
        
        if($session->delete()){
            $result['message'] = "Sessão encerrada! Volte sempre!";
            $response->out($result);
        }else{
            $result['message'] = "Sessão não encontrada!";
            $response->out($result, 403);
        }
    }
}
?>