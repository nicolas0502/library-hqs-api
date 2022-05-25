<?php
class AuthVend{
    function allowedRole($regra){
        $response = new Output();
        //Verifia se possui ACCESS_TOKEN
        if(!isset($_SERVER['HTTP_ACCESS_TOKEN'])){
            $result['message'] = "ACCESS_TOKEN não informado!";
            $response->out($result, 403);
        }
        $token = $_SERVER['HTTP_ACCESS_TOKEN'];

        $session = new SessionVend(null, $token, null);
        $user_session = $session->checkSessionRoles();
        
        //Verifica se possui sessão 
        if(!$user_session){
            $result['message'] = "Sessão não autorizada!";
            $response->out($result, 403);
        }

        //Verifica se possui papel de admin
        if(strpos($user_session['regras'], $regra) === false){
            $result['message'] = "Sessão não possui permissão de $regra!";
            $response->out($result, 403);
        }

        return $user_session;
    }
}
?>