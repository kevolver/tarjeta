<?php
include "../sync.php"; //Inclui a classe principal
$card = new SyncCard(); //Instancia um novo syncCard
$ts = $card->getTimestamp(); //ts = timestamp do objeto card
$time = date("d/m/Y - H:i:s", $ts); //time é Dia/Mês/Ano - Horas:minutos:segundos do timestamp do objeto $card
$hash = $card->crypto(); //hash é crypto do objeto card
die("$('#pass').html('$hash');$('#tokentime').html('<h4>Token gerado em: $time</h4>');"); //Imprime hash e também a hora de gerado
?>