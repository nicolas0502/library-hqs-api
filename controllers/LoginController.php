<?php
class LoginController{

    function delete(){
        // somente o usuário logado pode deletar seu perfil
        $response = new Output();
        $response->allowedMethod('POST');
        $id = $_POST['id'];
        $login = new login($id, null, null, null);
        $login->delete();
        $result['message'] = "login deletado com sucesso!";
        $result['login']['id'] = $id;
        $response->out($result);
    }

    function update(){
        // somente o usuário logado pode editar seu perfil
        $response = new Output();
        $response->allowedMethod('POST');
        $id = $_POST['id'];
        $email = $_POST['email']; 
        $senha = $_POST['senha'];
        $login = new login($id, $email, sha1($senha),null);
        $login->update();
        $result['message'] = "login atualizado com sucesso!";
        $result['login']['id'] = $id;
        $result['login']['email'] = $email;
        $response->out($result);
    }

    function selectAll(){
        // somente adm logado pode ver os usuarios cadastrados
        $response = new Output();
        $response->allowedMethod('GET');
        $login = new login(null, null, null, null);
        $result = $login->selectAll();
        $response->out($result);
    }

    function selectById(){
        //so o proprio usuario logado ou um admin logado
        $response = new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $login = new login($id, null, null, null);
        $result = $login->selectById();
        $response->out($result);
    }

}
?>