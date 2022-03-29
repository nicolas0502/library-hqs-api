<?php 

define('FOLDER', "/LP2/api/"); //cria uma constante de /LP2/api/ com FOLDER

$url= $_SERVER['REQUEST_URI']; //armazena na variavel "url" qual é a url buscada pelo cliente
$lengthStrFolder = strlen(FOLDER); // mostra o valor da parte padrão da url EX: /LP2/
$urlClean = substr($url, $lengthStrFolder); //limpa a parte padrão da página conforme o seu tamanho armazenado em lengthStrFolder

$route = explode ("/" , $urlClean); //divide e url já limpa por barra 

//Automatiza o carregamento dos models
spl_autoload_register(function($class_name){
    require 'models/' . $class_name . '.php' ;
});


if($route[0] == 'user'){
    require('controllers/UserController.php'); //chama o arquico UserController caso a primeira url digitada seja user
}elseif($route[0] == 'produto'){
    require('controllers/ProdutoController.php');//chama o arquico ProdutoController caso a primeira url digitada seja produto
}else{
    echo "404 - Página não encontrada.";
}




?>