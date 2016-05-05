<?php
include "../sync.php";
$card = new SyncCard();
$ts = $card->getTimestamp();
$time = date("d/m/Y - H:i:s", $ts);
$hash = $card->crypto();
die("$('#pass').html('$hash');$('#tokentime').html('<h4>Token gerado em: $time</h4>');");
?>