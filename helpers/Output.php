<?php
class Output{
    function out ($result = [], $code = 200){
        header('Content-type: application/json; charset=utf-8');
        http_response_code($code);
        echo json_encode($result);
        die;
    }
}
?>