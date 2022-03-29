<?php

if(isset($route[1]) && $route[1] != ''){

    if($route[1] == 'create'){
        //require('models/Product.php'); -> linka o arquivo no models Product
        $product = new Product(1,'Sapato',22,' '); // adiciona em uma variavel os dados para cadastro
        $product->create();// chama a function create para criar o produto
    }elseif($route[1] == 'delete'){
        //require('models/Product.php'); -> linka o arquivo no models Product
        $product = new Product(1,'Sapato',22,' ');// adiciona em variavel os dados para deletar
        $product->delete(); // chama a function delete para deletar o produto
    }else{
        echo 'Página não encontrada';
    }

}else{
    echo 'Página não encontrada';
}
?>