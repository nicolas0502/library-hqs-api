<?php

class UserController{

    function create(){
        $response= new Output();
        $response->allowedMethod('POST');
        //Entradas
        $name= $_POST['name'];
        $email= $_POST['email'];
        $pass= $_POST['pass'];
        
        //Processamento ou Persistencia
        $user = new User(null,$name,$email,$pass);       
        $id = $user->create();   

        //Saída
        $result['message'] = "O Usuário foi Cadastrado Com Sucesso ";
        $result['user']['id'] = $id;
        $result['user']['name'] = $name;
        $result['user']['email'] = $email;
        $result['user']['pass'] = $pass;
        
        $response->out($result);
    }

    function delete(){
        $response= new Output();
        $response->allowedMethod('POST');

        $id = $_POST['id'];

        $user = new User($id, null, null, null);         
        $user->delete();

        $result['message'] = "O Usuário foi Deletado Com Sucesso ";
        $result['user']['id'] = $id;
        $response->out($result);
    }

    function update(){
        $response= new Output();
        $response->allowedMethod('POST');
        
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        
        $user = new User($id, $name, $email, $pass);   
        $user->update();

        $result['message'] = "Update de Usuário feito Com Sucesso ";
        $result['user']['id'] = $id;
        $result['user']['name'] = $name;
        $result['user']['email'] = $email;
        $result['user']['pass'] = $pass;
        $response->out($result); 
    }

    function selectAll(){
        $response= new Output();
        $response->allowedMethod('GET');
        $user = new User(null, null, null, null);       
        $result= $user->selectAll();

        $response->out($result);
    }
}
?>

