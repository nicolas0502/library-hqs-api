<?php
class AuthController{

    function login(){
        $response = new Output();
        $response->allowedMethod('POST');
        $email = $_POST['email'];
        $pass = $_POST['senha'];

        $description = $_SERVER['HTTP_USER_AGENT'];

        $cliente = new Login(null, $email, sha1($pass), null);
        $clienteLogged = $cliente->login();
        
        if($clienteLogged){
            $token = md5(uniqid($clienteLogged['id'], true));
            $session = new Session($clienteLogged['id'], $token, $description);
            if($session->create()){
                $result['session']['id'] = $clienteLogged['id'];
                $result['session']['token'] = $token;
                $result['session']['email'] = $clienteLogged['email'];
                $result['session']['tipo'] = $clienteLogged['tipo'];
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

        $session = new Session(null, $token, null);
        
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