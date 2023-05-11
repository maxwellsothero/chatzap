<?php

$dados = '{
    "type": "message",
    "body": {
      "key": {
        "remoteJid": "557194160062@s.whatsapp.net",
        "fromMe": false,
        "id": "71849E6515C845F6C363"
      },
      "messageTimestamp": 1683723839,
      "pushName": "557194160062",
      "message": {
        "conversation": "_*Eduarda*_:\n\nMas o senhor ja analisou a cotação? "
      },
      "verifiedBizName": "AAPV",
      "text": {
        "messages": [
          {
            "key": {
              "remoteJid": "557194160062@s.whatsapp.net",
              "fromMe": false,
              "id": "71849E6515C845F6C363"
            },
            "messageTimestamp": 1683723839,
            "pushName": "557194160062",
            "message": {
              "conversation": "_*Eduarda*_:\n\nMas o senhor ja analisou a cotação? "
            },
            "verifiedBizName": "AAPV"
          }
        ],
        "type": "notify"
      },
      "msgContent": ""
    }
  }';

$obj =json_decode($dados);

        $tipo  = $obj->type;
        $corpo = $obj->body->key->remoteJid;
        $nome = $obj->body->verifiedBizName;
        $texto = $obj->body->message->extendedTextMessage->text;
        $texto1 = $obj->body->message->conversation;

            echo $tipo."<br>";
            echo $corpo."<br>";
            echo $nome."<br>";
            echo $texto."<br>";
            echo $texto1."<br>";