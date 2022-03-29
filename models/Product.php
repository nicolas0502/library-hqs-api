<?php

class Product{
    //Propriedades
    public $id;
    public $name;
    public $value;
    public $description;

    //construct

    function __construct($id, $name, $value, $description){
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->description = $description;
    }

    //Métodos

    function create(){
        echo "Produto cadastra: " . $this->name . " e " . $this->id;
    }

    function delete(){
        echo "Produto delete: " . $this->value;
    }
}
?>