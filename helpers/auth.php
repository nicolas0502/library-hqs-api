<?php
class Auth{
    function allowedType($tipo){
        $response = new Output();
        //Verifia se possui ACCESS_TOKEN
        if(!isset($_SERVER['HTTP_ACCESS_TOKEN'])){
            $result['message'] = "ACCESS_TOKEN não informado!";
            $response->out($result, 403);
        }
        $token = $_SERVER['HTTP_ACCESS_TOKEN'];

        $session = new Session(null, $token, null);
        $user_session = $session->checkSessionRoles();
        
        //Verifica se possui sessão 
        if(!$user_session){
            $result['message'] = "Sessão não autorizada!";
            $response->out($result, 403);
        }

        //Verifica se possui papel de admin
        if($user_session['tipo'] !== $tipo){
            $result['message'] = "Sessão não possui permissão de $tipo!";
            $response->out($result, 403);
        }

        return $user_session;
    }
}
?>