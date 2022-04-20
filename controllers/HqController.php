<?php

class HqController{

    function create(){
        $response= new Output();
        $response->allowedMethod('POST');
        //Entradas
        $nome= $_POST['nome'];
        $valor= $_POST['valor'];
        $quantidade= $_POST['quantidade'];
        $descricao= $_POST['descricao'];
        $imagem= $_POST['imagem'];
        
        //Processamento ou Persistencia
        $hq = new Hq(null,$nome, $valor, $quantidade, $descricao, $imagem);       
        $id = $hq->create();   

        //Saída
        $result['message'] = "O HQ foi Cadastrado Com Sucesso ";
        $result['hq']['id'] = $id;
        $result['hq']['nome'] = $nome;
        $result['hq']['valor'] = $valor;
        $result['hq']['quantidade'] = $quantidade;
        $result['hq']['descricao'] = $descricao;
        $result['hq']['imagem'] = $imagem;
        
        $response->out($result);
    }

    function delete(){
        $response= new Output();
        $response->allowedMethod('POST');

        $id = $_POST['id'];

        $hq = new Hq($id, null, null, null, null, null);         
        $hq->delete();

        $result['message'] = "O HQ foi Deletado Com Sucesso ";
        $result['user']['id'] = $id;
        $response->out($result);
    }

    function update(){
        $response= new Output();
        $response->allowedMethod('POST');
        
        $id = $_POST['id'];
        $nome= $_POST['nome'];
        $valor= $_POST['valor'];
        $quantidade= $_POST['quantidade'];
        $descricao= $_POST['descricao'];
        $imagem= $_POST['imagem'];
        
        $hq = new Hq($id, $nome, $valor, $quantidade, $descricao, $imagem);   
        $hq->update();

        $result['message'] = "Update do HQ foi feito Com Sucesso ";
        $result['hq']['id'] = $id;
        $result['hq']['nome'] = $nome;
        $result['hq']['valor'] = $valor;
        $result['hq']['quantidade'] = $quantidade;
        $result['hq']['descricao'] = $descricao;
        $result['hq']['imagem'] = $imagem;
        $response->out($result); 
    }

    function selectAll(){
        $response= new Output();
        $response->allowedMethod('GET');
        $hq = new Hq(null, null, null, null, null, null);       
        $result= $hq->selectAll();

        $response->out($result);
    }

    function selectById(){
        $response= new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $hq = new Hq($id, null, null, null,null, null);       
        $result= $hq->selectById();

        $response->out($result);
    }
}

?>