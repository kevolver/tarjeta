<?php
include "../sync.php";
$card = new SyncCard();
$hash = $card->crypto();
die($hash);
?>