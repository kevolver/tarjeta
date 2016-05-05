<?php
include "../sync.php";

$clock = new SyncCard();

$codigo = &$_POST['codigo'];
$term_cod = substr($codigo, 0, 2);
$now = intval(date("U"));
$term_now = substr($now, -2, 2);

//CHECANDO MENOR:
if($term_now<30 && $term_now<$term_cod) $term_now+=100;
$diff = $term_now-$term_cod;	

if($diff>=0 && $diff<=30) { 
	$antes = $now-$diff;
	$check = $clock->decrypto($codigo, $antes);
}
else $check = false;

if($check) { 
$testada = date("H:i:s", $now);
$timestamp = date("H:i:s", $antes);
die("<span style=\"color:#006600\">Código válido!</span><br/>Hora testada: {$testada}<br/>Hora do token: {$timestamp}</br>Diferença: {$diff}s");
}

die('<span style="color:#660000">Código inválido!</span>');

?>