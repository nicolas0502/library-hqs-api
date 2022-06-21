<?php

class HqController{

    function create(){
        $response= new Output();
        $response->allowedMethod('POST');

        $auth = new Auth();
        $user_session = $auth->allowedType('vendedor');

        //Entradas
        $nome= $_POST['nome'];
        $valor= $_POST['valor'];
        $quantidade= $_POST['quantidade'];
        $descricao= $_POST['descricao'];
        $imagem= $_POST['imagem'];
        $id_vendedor = $user_session['id_user'];        
        
        //Processamento ou Persistencia
        $hq = new Hq(null, $id_vendedor, $nome, $valor, $quantidade, $descricao, $imagem);       
        $id = $hq->create();   

        //Saída
        $result['message'] = "A HQ foi Cadastrada Com Sucesso!";
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

        $auth = new Auth();
        $user_session = $auth->allowedType('vendedor');

        $id_vendedor = $user_session['id_user']; 
        $id= $_POST['id'];

        $hq = new Hq($id, $id_vendedor, null, null, null, null, null);         
        $hq->delete();

        $result['message'] = "A HQ foi Deletada Com Sucesso!";
        $result['hq']['id'] = $id;
        $response->out($result);
    }

    function update(){
        $response= new Output();
        $response->allowedMethod('POST');

        $auth = new Auth();
        $user_session = $auth->allowedType('vendedor');
        
        $id = $_POST['id'];
        $id_vendedor = $user_session['id_user'];
        $nome= $_POST['nome'];
        $valor= $_POST['valor'];
        $quantidade= $_POST['quantidade'];
        $descricao= $_POST['descricao'];
        $imagem= $_POST['imagem'];
        
        $hq = new Hq($id, $id_vendedor, $nome, $valor, $quantidade, $descricao, $imagem);   
        $hq->update();

        $result['message'] = "A Edição Da HQ Foi Feita Com Sucesso!";
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
        $hq = new Hq(null,null, null, null, null, null, null);       
        $result= $hq->selectAll();

        $response->out($result);
    }

    function selectById(){
        $response= new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $hq = new Hq($id, null, null, null, null, null, null);       
        $result= $hq->selectById();

        $response->out($result);
    }

    function selectByIds(){
        $response= new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $hq = new Hq(null, null, null, null, null, null, null);       
        $result= $hq->selectByIds($id);

        $response->out($result);
    }

    function selectHqByVendedor(){
        $response= new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $hq = new Hq(null, null, null, null, null, null, null);       
        $result= $hq->selectHqByVendedor($id);

        $response->out($result);
    }
}

?>