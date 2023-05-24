<?php

$dados = '{
    "type": "message",
    "body": {
      "key": {
        "remoteJid": "558596570932@s.whatsapp.net",
        "fromMe": true,
        "id": "C708653DD2B4C404BD2A1815B473C0A9"
      },
      "messageTimestamp": 1683820254,
      "pushName": "Meta Vip Rastreamento",
      "message": {
        "conversation": "Start",
        "messageContextInfo": {
          "deviceListMetadata": {
            "recipientKeyHash": "laC5c4rP/75UxA==",
            "recipientTimestamp": "1682542426"
          },
          "deviceListMetadataVersion": 2
        }
      },
      "verifiedBizName": "Meta Vip Rastreamento",
      "text": {
        "messages": [
          {
            "key": {
              "remoteJid": "558596570932@s.whatsapp.net",
              "fromMe": false,
              "id": "C708653DD2B4C404BD2A1815B473C0A9"
            },
            "messageTimestamp": 1683820254,
            "pushName": "Meta Vip Rastreamento",
            "message": {
              "conversation": "Start",
              "messageContextInfo": {
                "deviceListMetadata": {
                  "recipientKeyHash": "laC5c4rP/75UxA==",
                  "recipientTimestamp": "1682542426"
                },
                "deviceListMetadataVersion": 2
              }
            },
            "verifiedBizName": "Meta Vip Rastreamento"
          }
        ],
        "type": "notify"
      },
      "msgContent": ""
    }
  }';

$obj =json_decode($dados);

        $tipo  = $obj->type;
        $corpo = explode('@',$obj->body->key->remoteJid);
        $meuEnvio = $obj->body->key->fromMe;
        $nome = $obj->body->verifiedBizName;
       // $texto = $obj->body->message->extendedTextMessage->text;
        $texto1 = $obj->body->message->conversation;

            echo "Tipo:  ".$tipo."<br>";

            if($meuEnvio){
                    echo "Mensagem de Resposta <br>";
                }else{
                    echo "Mensagem de Pergunta <br>";
                };
            //echo $meuEnvio."<br>";
            echo $corpo[0]."<br>";
            echo "Nome:  ".$nome."<br>";
         //   echo $texto."<br>";
            echo "Mensagem:  ".strtolower($texto1)."<br>";


            

           function  enviarContato($linha,$msg){
                        $curl = curl_init();
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'localhost:3333/message/text?key=max',
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

          if($texto1 =='Start'){
            enviarContato($corpo[0],'Digite o Numero do Imei ou ID');

          }else{
            enviarContato($corpo[0],'Não Consigo entender');
          }
          