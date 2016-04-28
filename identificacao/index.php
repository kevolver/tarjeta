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
<form>
<input type="text" name="codigo" maxlength="8" size="20" />
<input type="submit" value="Testar" />
</form>
<div id="resultado">Resultado:</div>
<script>
$("form").submit(function(e) {
    e.preventDefault();
	$.ajax({
	url:"decode.php",
	type:'POST',
	data: $("form").serializeArray()
}).done(function(e) { $("#resultado").html(e); });
});
</script>
</body>
</html>