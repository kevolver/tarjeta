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
<div id="card">
<div id="color">
</div>
<div id="pass"></div>
</div>
<script>
var code = setInterval(getCode, 30000);
getCode();
function getCode() {
$.ajax({
	url:"code.php",
	type:'POST'
}).done(function(e) { $("#pass").html(e); });
}
</script>
</body>
</html>