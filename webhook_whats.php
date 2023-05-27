<?php
require_once("smsenvia.php");

function enviarContato($linha,$msg){
  $curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => 'ec2-54-167-150-28.compute-1.amazonaws.com:3333/message/text?key=724cdfb0-5c7f-443c-9895-d7d06d700894',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS => 'id='.$linha.'&message='.$msg.'',
CURLOPT_HTTPHEADER => array(
'Content-Type: application/x-www-form-urlencoded'
),
));

$response = curl_exec($curl);

curl_close($curl);

echo $response;     
};


// Verifica se a requisição é do tipo POST
if (in_array($_SERVER['REQUEST_METHOD'],array("GET","POST","DELETE"))) {

    // Recupera o corpo da requisição POST
    $json = file_get_contents('php://input');

    $obj =json_decode($json);

        $tipo  = $obj->type;
        $corpo = explode('@',$obj->body->key->remoteJid);
        $meuEnvio = $obj->body->key->fromMe;
        $nome = $obj->body->verifiedBizName;
        $texto = strtolower($obj->body->message->extendedTextMessage->text);
        $texto1 = strtolower($obj->body->message->conversation);
            
        if($tipo == 'message'){
                if($texto1 =='iniciar' || $texto =='iniciar' ){
                    enviarContato($corpo[0],'Qual Operação Deseja Realiza: Bloqueio( Digite 0),Desbloqueio (Digite 1).');
                                }elseif($texto1 == 0 || $texto == 0 ){
                                    bloqueio();
                                            enviarContato($corpo[0],'COMANDO DE BLOQUEIO ENVIADO');                      
                                    }elseif($texto1 == 1 || $texto == 1 ){
                                        desbloqueio();
                                        enviarContato($corpo[0],'COMANDO DE DESBLOQUEIO ENVIADO');  
                                         }else{  

                                            enviarContato($corpo[0],'Por Favor Digite Iniciar e escolha o Comando Desejado');        
                                            }
                                        }   
                                }      
                     
                    
        
               
  
