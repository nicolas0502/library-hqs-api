<?php

class ClienteController{

    function create(){
        $response= new Output();
        $response->allowedMethod('POST');
        //Entradas
        $nome= $_POST['nome'];
        $sobrenome= $_POST['sobrenome'];
        $email= $_POST['email'];
        $telefone= $_POST['telefone'];
        $cpf= $_POST['cpf'];
        $nascimento= $_POST['nascimento'];
        $senha= $_POST['senha'];
        
        //Processamento ou Persistencia
        $cliente = new Cliente(null,$nome, $sobrenome, $email, $telefone, $cpf, $nascimento, $senha);       
        $id = $cliente->create();   

        //Saída
        $result['message'] = "O Cliente foi Cadastrado Com Sucesso ";
        $result['cliente']['id'] = $id;
        $result['cliente']['nome'] = $nome;
        $result['cliente']['sobrenome'] = $sobrenome;
        $result['cliente']['email'] = $email;
        $result['cliente']['telefone'] = $telefone;
        $result['cliente']['cpf'] = $cpf;
        $result['cliente']['nascimento'] = $nascimento;
        $result['cliente']['senha'] = $senha;
        
        $response->out($result);
    }

    function delete(){
        $response= new Output();
        $response->allowedMethod('POST');

        $id = $_POST['id'];

        $cliente = new Cliente($id, null, null, null, null, null, null, null);         
        $cliente->delete();

        $result['message'] = "O Clinete foi Deletado Com Sucesso ";
        $result['user']['id'] = $id;
        $response->out($result);
    }

    function update(){
        $response= new Output();
        $response->allowedMethod('POST');
        
        $id = $_POST['id'];
        $nome= $_POST['nome'];
        $sobrenome= $_POST['sobrenome'];
        $email= $_POST['email'];
        $telefone= $_POST['telefone'];
        $cpf= $_POST['cpf'];
        $nascimento= $_POST['nascimento'];
        $senha= $_POST['senha'];
        
        $cliente = new Cliente($id, $nome, $sobrenome, $email, $telefone, $cpf, $nascimento, $senha);   
        $cliente->update();

        $result['message'] = "Update do Cliente foi feito Com Sucesso ";
        $result['cliente']['id'] = $id;
        $result['cliente']['nome'] = $nome;
        $result['cliente']['sobrenome'] = $sobrenome;
        $result['cliente']['email'] = $email;
        $result['cliente']['telefone'] = $telefone;
        $result['cliente']['cpf'] = $cpf;
        $result['cliente']['nascimento'] = $nascimento;
        $result['cliente']['senha'] = $senha;
        $response->out($result); 
    }

    function selectAll(){
        $response= new Output();
        $response->allowedMethod('GET');
        $cliente = new Cliente(null, null, null, null, null, null, null, null);       
        $result= $cliente->selectAll();

        $response->out($result);
    }

    function selectById(){
        $response= new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $cliente = new Cliente($id, null, null, null,null, null, null, null);       
        $result= $cliente->selectById();

        $response->out($result);
    }
}

?>