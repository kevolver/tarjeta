<?php
include "../sync.php"; //Inclui classe principal

$clock = new SyncCard(); //Instancia clock

$codigo = &$_POST['codigo']; //Código digitado passado por AJAX via POST
$term_cod = substr($codigo, 0, 2); //
$now = intval(date("U")); //Agora: timestamp completo
$term_now = substr($now, -2, 2); //Terminação de agora (últimos dois dígitos)

//CHECANDO MENOR:
if($term_now<30 && $term_now<$term_cod) $term_now+=100; //Se a terminação de agora for menor que 30 e menor que do código, adiciona 100
$diff = $term_now-$term_cod;	 //A diferença é terminação de agora menos a do código

if($diff>=0 && $diff<=30) { //Se a diferença for entre 0 e 30:
	$antes = $now-$diff; //Antes é timestamp de agora menos a diferença
	$check = $clock->decrypto($codigo, $antes); //Checa se código digitado é o mesmo que a descrypto da timestamp antes
}
else $check = false; //Senão for entre 0 e 30, já é falso.

if($check) { //Se check = true
$testada = date("H:i:s", $now); //Hora em que for testada
$timestamp = date("H:i:s", $antes); //Timestamp de antes
die("<span style=\"color:#006600\">Código válido!</span><br/>Hora testada: {$testada}<br/>Hora do token: {$timestamp}</br>Diferença: {$diff}s"); //Imprime
}

die('<span style="color:#660000">Código inválido!</span>'); //Se não bater simplesmente imprime inválido

?>