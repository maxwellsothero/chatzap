<?php
// Verifica se a requisição é do tipo POST
if (in_array($_SERVER['REQUEST_METHOD'],array("GET","POST","DELETE"))) {

    // Recupera o corpo da requisição POST
    $json = file_get_contents('php://input');

      
        $obj = json_decode($json);       

         $corpomsg = $obj->type;
         $nome =$obj->body->key->pushName;

         echo $corpomsg;

    http_response_code(200);
        echo 'Mensagem recebida com sucesso';
};