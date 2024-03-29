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
        $tipo= "cliente";

        $login = new Login(null, $email, sha1($senha), $tipo);
        $id = $login->create();
        
        //Processamento ou Persistencia
        $cliente = new Cliente($id, $nome, $sobrenome, $telefone, $cpf, $nascimento);       
        $cliente->create();   

        //Saída
        $result['message'] = "O Cadastro Foi Feito Com Sucesso!";
        $result['cliente']['id'] = $id;
        $result['cliente']['nome'] = $nome;
        $result['cliente']['sobrenome'] = $sobrenome;
        $result['cliente']['email'] = $email;
        $result['cliente']['telefone'] = $telefone;
        $result['cliente']['cpf'] = $cpf;
        $result['cliente']['nascimento'] = $nascimento;
        $result['cliente']['tipo'] = $tipo;
        
        $response->out($result);
    }

    function delete(){
        $response= new Output();
        $response->allowedMethod('POST');

        $id = $_POST['id'];

        $cliente = new Cliente($id, null, null, null, null, null);         
        $cliente->delete();

        $result['message'] = "O Cliente foi Deletado Com Sucesso!";
        $result['cliente']['id'] = $id;
        $response->out($result);
    }

    function update(){
        $response= new Output();
        $response->allowedMethod('POST');
        
        $id = $_POST['id'];
        $nome= $_POST['nome'];
        $sobrenome= $_POST['sobrenome'];
        $telefone= $_POST['telefone'];
        $cpf= $_POST['cpf'];
        $nascimento= $_POST['nascimento'];
        
        $cliente = new Cliente($id, $nome, $sobrenome, $telefone, $cpf, $nascimento);   
        $cliente->update();

        $result['message'] = "A Edição Foi Feita Com Sucesso!";
        $result['cliente']['id'] = $id;
        $result['cliente']['nome'] = $nome;
        $result['cliente']['sobrenome'] = $sobrenome;
        $result['cliente']['telefone'] = $telefone;
        $result['cliente']['cpf'] = $cpf;
        $result['cliente']['nascimento'] = $nascimento;
        $response->out($result); 
    }

    function selectAll(){
        $response= new Output();
        $response->allowedMethod('GET');
        $cliente = new Cliente(null, null, null, null, null, null);       
        $result= $cliente->selectAll();

        $response->out($result);
    }

    function selectById(){
        $response= new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $cliente = new Cliente($id, null, null, null,null, null);       
        $result= $cliente->selectById();

        $response->out($result);
    }
}

?>