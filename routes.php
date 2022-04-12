<?php 

define('FOLDER', "/LP2/api/");                   //Cria uma constante de /LP2/api/ com FOLDER

$url= $_SERVER['REQUEST_URI'];                   //Armazena na variavel "url" qual é a url buscada pelo cliente
$lengthStrFolder = strlen(FOLDER);               //Mostra o valor da parte padrão da url EX: /LP2/
$urlClean = substr($url, $lengthStrFolder);      //Limpa a parte padrão da página conforme o seu tamanho armazenado em lengthStrFolder

$route = explode ("/" , $urlClean);              //Divide e url já limpa por barra 

//Carrega autoloaders
require('helpers/autoloaders.php');

//Cria objeto de resposta da api
$response = new Output();

//Checa se o controller existe
$file_path = 'controllers/' .$route[0].'Controller.php';

if(file_exists($file_path)){
    require($file_path);
}else{
    $result['message'] = "404 - Rota da API não encontrada";
    $response->out($result, 404);
}
?>