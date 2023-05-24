
<?php
// Verifica se a requisição é do tipo POST
if (in_array($_SERVER['REQUEST_METHOD'],array("GET","POST","DELETE"))) {

    // Recupera o corpo da requisição POST
    $json = file_get_contents('php://input');


        $obj = json_decode($json);       


         $msg= $obj->type;
         $corpo = explode('@',$obj->body->key->remoteJid);
         $nome = $obj->body->verifiedBizName;


        $corpomsg = ".$msg."+".$nome."+".$corpo.";

//Criamos uma função que recebe um texto como parâmetro.
function gravar($texto){
        //Variável arquivo armazena o nome e extensão do arquivo.
        $arquivo = "meu_arquivo.txt";

        //Variável $fp armazena a conexão com o arquivo e o tipo de ação.
        $fp = fopen($arquivo, "a+");

        //Escreve no arquivo aberto.
        fwrite($fp, $texto);

        //Fecha o arquivo.
        fclose($fp);
}

gravar($corpomsg);

    http_response_code(200);
        echo 'Mensagem recebida com sucesso';
        echo $corpo;
};
 