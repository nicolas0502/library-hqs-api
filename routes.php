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

//Checa se o controller e a action existe na rota
if(!isset($route[0]) || !isset($route[1])) {
    $result['message'] = "404 - Rota da API não encontrada";
    $response->out($result, 404);
}

$controller_name = $route[0];
$action = str_replace('-', '', $route[1]);

$controller_path = 'controllers/'. $controller_name .'Controller.php';

//Checa se o arquivo do controller existe
if(file_exists($controller_path)) {
    $controller_class_name = $controller_name. 'Controller';
    $controller = new $controller_class_name();
    //Checa se o action do controller existe
    if(method_exists($controller, $action)) {
        $controller->$action();
    }
}   

$result['message'] = "404 - Rota da API não encontrada";
$response->out($result, 404);
?>