<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>::Card::</title>
<link rel="stylesheet" href="../style.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
</head>
<body>
<h1>Cartão Síncrono</h1>
<div id="reloj"><h2>00:00:00</h2></div>
<div id="card">
<div id="color">
</div>
<div id="pass"></div>
</div>
<div id="tokentime"></div>
<div id="result"><script></script></div>
<script>
var code = setInterval(getCode, 30000);
var clock = setInterval(getClock, 1000);
var d = new Date();
var h = d.getHours(); if(h<10) h = "0"+h; 
var i = d.getMinutes(); if(i<10) i = "0"+i; 
var s = d.getSeconds(); if(s<10) s = "0"+s;
$("#reloj").html("<h2>"+h+":"+i+":"+s+"</h2>");
getCode();
function getCode() {
$.ajax({
	url:"code.php",
	type:'POST'
}).done(function(e) { $("#result script").html(e); });
}
function getClock() {
$.ajax({
	url:"../clock.php",
	type:'POST'
}).done(function(e) { $("#reloj h2").html(e); });
}
</script>
</body>
</html>