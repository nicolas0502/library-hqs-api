<?php

class VendedorController{

    function create(){
        $response= new Output();
        $response->allowedMethod('POST');
        //Entradas
        $nome= $_POST['nome'];
        $sobrenome= $_POST['sobrenome'];
        $email= $_POST['email'];
        $telefone= $_POST['telefone'];
        $cpf= $_POST['cpf'];
        $rg= $_POST['rg'];
        $nascimento= $_POST['nascimento'];
        $senha= $_POST['senha'];
        $cep= $_POST['cep'];
        $tipo = "vendedor";
        
        $login = new Login(null, $email, sha1($senha), $tipo);
        $id = $login->create();

        //Processamento ou Persistencia
        $vendedor = new Vendedor($id, $nome, $sobrenome, $telefone, $cpf, $rg, $nascimento, $cep);       
        $vendedor->create();   

        //Saída
        $result['message'] = "O Cadastro Foi Feito Com Sucesso!";
        $result['vendedor']['id'] = $id;
        $result['vendedor']['nome'] = $nome;
        $result['vendedor']['sobrenome'] = $sobrenome;
        $result['vendedor']['email'] = $email;
        $result['vendedor']['telefone'] = $telefone;
        $result['vendedor']['cpf'] = $cpf;
        $result['vendedor']['rg'] = $rg;
        $result['vendedor']['nascimento'] = $nascimento;
        $result['vendedor']['senha'] = $senha;
        $result['vendedor']['cep'] = $cep;
        $result['vendedor']['tipo'] = $tipo;
        
        $response->out($result);
    }

    function delete(){
        $response= new Output();
        $response->allowedMethod('POST');

        $id = $_POST['id'];

        $vendedor = new Vendedor($id, null, null, null, null, null, null, null);         
        $vendedor->delete();

        $result['message'] = "O Vendedor foi Deletado Com Sucesso!";
        $result['vendedor']['id'] = $id;
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
        $rg= $_POST['rg'];
        $nascimento= $_POST['nascimento'];
        $cep= $_POST['cep'];
        
        $vendedor = new Vendedor($id, $nome, $sobrenome,$telefone, $cpf, $rg, $nascimento, $cep);   
        $vendedor->update();

        $result['message'] = "A Edição Foi Feita Com Sucesso!";
        $result['vendedor']['id'] = $id;
        $result['vendedor']['nome'] = $nome;
        $result['vendedor']['sobrenome'] = $sobrenome;
        $result['vendedor']['telefone'] = $telefone;
        $result['vendedor']['cpf'] = $cpf;
        $result['vendedor']['rg'] = $rg;
        $result['vendedor']['nascimento'] = $nascimento;
        $result['vendedor']['cep'] = $cep;
        $response->out($result); 
    }

    function selectAll(){
        $response= new Output();
        $response->allowedMethod('GET');
        $vendedor = new Vendedor(null, null, null, null, null, null, null, null);       
        $result= $vendedor->selectAll();

        $response->out($result);
    }

    function selectById(){
        $response= new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $vendedor = new Vendedor($id, null, null, null,null, null, null, null);       
        $result= $vendedor->selectById();

        $response->out($result);
    }
}

?>