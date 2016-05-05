<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>::Identificação::</title>
<link rel="stylesheet" href="../style.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
</head>
<body>
<h1>Identifique-se:</h1>
<div id="reloj"><h2>00:00:00</h2></div>
<form>
<input type="text" name="codigo" maxlength="8" size="20" />
<input type="submit" value="Testar" />
</form>
<div id="resultado">Resultado:</div>
<script>
var clock = setInterval(getClock, 1000);
var d = new Date();
var h = d.getHours(); if(h<10) h = "0"+h; 
var i = d.getMinutes(); if(i<10) i = "0"+i; 
var s = d.getSeconds(); if(s<10) s = "0"+s;
$("#reloj").html("<h2>"+h+":"+i+":"+s+"</h2>");
$("form").submit(function(e) {
    e.preventDefault();
	$.ajax({
	url:"decode.php",
	type:'POST',
	data: $("form").serializeArray()
}).done(function(e) { $("#resultado").html(e); });
});
function getClock() {
$.ajax({
	url:"../clock.php",
	type:'POST'
}).done(function(e) { $("#reloj h2").html(e); });
}
</script>
</body>
</html>