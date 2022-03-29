<?php

if(isset($route[1]) && $route[1] != ''){

    if($route[1] == 'create'){
        $name= $_POST['name'];
        $email= $_POST['email'];
        $pass= $_POST['pass'];
        
        $user = new User(null,$name,$email,$pass );     //adiciona em uma variavel os dados para cadastro
        $user->create();                                // chama a function create para criar o usuario
    }elseif($route[1] == 'delete'){
        $id = $_POST['id'];
        $user = new User($id, null, null, null);         //adiciona em uma variavel os dados para delete
        $user->delete();                                //chama a function create para criar o usuario
    }elseif($route[1] == 'update'){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $user = new User($id, $name, $email, $pass);         //adiciona em uma variavel os dados para delete
        $user->update();
    }else{
        echo 'Página não encontrada';
    }

}else{
    echo 'Página não encontrada';
}

//require('models/User.php'); -> linka o arquivo no models User
//require('models/User.php'); -> linka o arquivo no models User
?>
