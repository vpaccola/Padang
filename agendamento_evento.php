<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Padang Surf</title>
	<meta charset="utf-8">
	<!--<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Kavivanar|Pacifico" rel="stylesheet">-->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="shortcut icon" href="img/favicon.ico">
</head>


<body>
	<nav>
		<a href="index.php" class="nova-font"> Padang Surf </a>
		<ul>
			<?php if (isset($_SESSION['email'])): ?>
			<li><a href="logout_padang.php"><?=$_SESSION['nome']?>/Logout</a></li>	
			<?php endif ?>
		</ul>	
	</nav>

<?php if (isset($_SESSION['email'])): ?>
	<h2 class="nova-font">Cobertura em eventos</h2>
	<section id="contato">
	<form class="form-horizontal">
		<p class="nova-font">Preencha os campo abaixo e selcione a(s) data(s) do evento para concluir o agendamento.</p>
	<form action="confirmar_evento.php" method="post">
		<p>Endereço: </p>
		<input type="text" name="endereco" placeholder="endereco">
		<p>Data </p>
		<input type="date" name="data" placeholder="data">
		<p>hora </p>
		<input type="time" name="hora" placeholder="hora">
		<p><input type="submit" value="Enviar"></p>
		</form>
	</form>

<?php else: ?>
	<section id="contato">
	<form class="form-horizontal">
		<h2 class="nova-font">Cobertura em eventos</h2>
		<p> Nós da padang fazemos a cobertura fotográfica completa de seu evento radical, se você quiser contratar nosso serviço basta fazer login com o seu usuário e preencher os campos solicitados.</p>
		<a href="login.html" class="botao"> Login/Cadastro </a>
	</form>
<?php endif ?>

</body>
</html>
