<?php session_start(); 
	require_once 'database/conexao.php';
	
	if(isset($_SESSION['id']))
	{
		$result = mysqli_query($conexao, "SELECT * FROM `eventos` WHERE usuario_id = " . $_SESSION['id']); 
		$eventos = mysqli_fetch_all($result);
		
		$result2 = mysqli_query($conexao, "SELECT * FROM `sessoes` WHERE usuario_id = " . $_SESSION['id']);
		$sessoes = mysqli_fetch_all($result2);
	}
	
	?>

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
			<li><a href="#portfolio"> PORTFOLIO</a></li>
			<li><a href="#servicos"> SERVIÇOS</a></li>
			<?php if (isset($_SESSION['email'])): ?>
			<li><a href="logout_padang.php"><?=$_SESSION['nome']?>/Logout</a></li>		
			<?php else: ?>
			<li><a href="login.html"> Login/Cadastro </a></li>
			<?php endif ?>
		</ul>	
	</nav>


	<header>
		<h1 class="nova-font">Padang Surf</h1>
		<a href="marca.html" class="botao"> A mais nova plataforma para vender e comprar fotos de SURF! Saber mais...</a>
	</header>
<!--
	<selection id="galeria">

		
		<h2 class="nova-font">Galeria de Imagens</h2>
		<p>Clique no botão abaixo para ver nossa Galeria de Fotos</p>
		<a href="galeria.php" class="botao"> Ver Galeria!</a>
	</selection>
-->
	
<selection id="servicos">
<!-- Essa Div \/ está assim por que iremos utilizar imagens para demostrar os Serviços-->
		<h2 class="nova-font">Serviços</h2>
	
		<div>	
			<a href="agendamento_sessao.php" class="teste">
			<img src="img/fotografia.png"  alt="fotografia">
			<h3> Sessões fotográficas </h3>
			<p> Agendamento de sessões particular </p>
			</a>
		</div>

		<div>
			<a href="agendamento_evento.php" class="teste">
			<img src="img/fotografia.png" alt="fotografia">
			<h3 > Cobertura em Evento </h3>
			<p> Agendamento de cobertura fotografica em eventos</p>
			</a>
		</div>



<!--
		<div>
			<img src="img/films.png" alt="films"  >
			<h3>Edições de VideoClipes</h3>
			<p> Edicoes de video de esportes radicais e tal tal tal tal </p>
		</div>
-->
</selection>
<?php if(isset($eventos) && !empty($eventos)): ?>
<selection id="evt-agendados">
<h2 class="nova-font">Eventos Agendados</h2>
	<div>	
	<table >
		<tr>
			<th>Nome
			</th>
			<th>Endereco
			</th>
			<th>Data
			</th>
			<th>Hora
			</th>
		</tr>
		<?php foreach($eventos as $evento): ?>
		<tr>
		<td><?php echo $evento[1]?></td>
		<td><?php echo $evento[4]?></td>
		<td><?php echo  $data = implode("/",array_reverse(explode("-",$evento[2])));?></td>
		<td><?php echo $evento[3]?></td>
		</tr>
		<?php endforeach; ?>
		</table>
	</div>
	
</selection>
<?php endif?>


<?php if(isset($sessoes) && !empty($sessoes)): ?>
<selection id="sessoes-agendadas">
<h2 class="nova-font">Sessoes Agendadas</h2>
	<div>	
	<table >
		<tr>
			<th>Data
			</th>
			<th>Hora
			</th>
		</tr>
		<?php foreach($sessoes as $sessao): ?>
		<tr>
		<td><?php echo  $data = implode("/",array_reverse(explode("-",$sessao[1])));?></td>
		<td><?php echo $sessao[2]?></td>
		
		</tr>
		<?php endforeach; ?>
		</table>
	</div>
	
</selection>
<?php endif?>
<!-- Retirada das divs , para utilizar o css.... Portfolio será as imagens para mostrar no site, futuramente a ser atualizado... -->
<!-- Portfolio Gallery Grid -->
<!-- Portfolio Gallery Grid -->



<section id="portfolio">
		<h2 class="nova-font"> <a href="galeria.php"> PORTFÓLIO </a></h2>
<div class="row">
  <div class="column">
    <div class="content">
      <img src="img/portfolio/portfolio-2.jpg" alt="Mountains" style="width:100%">
      
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="img/portfolio/portfolio-2.jpg" alt="Lights" style="width:100%">
  
    
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="img/portfolio/portfolio-3.jpg" alt="Nature" style="width:100%">

  
    </div>
  </div>
  <div class="column">
    <div class="content">
    <img src="img/portfolio/portfolio-4.jpg" alt="Mountains" style="width:100%">

   
    </div>
  </div>
</div>
  </section>



<!--Menu inferior contendo as Redes Sociais da Padang-->
<nav>
    <ul class="icones-sociais">
       
       <li>
       		Redes Sociais
       </li> 
       <li>
            <a href="https://www.facebook.com/Padang.inc" class="facebook">
            <img src="img/facebook.png" alt="facebook">

            </a>
        </li>
        <li>
            <a href="https://www.youtube.com/user/rafaelpadang/" class="youtube">
            <img src="img/youtube.png" alt="youtube">
            </a>
        </li>
        <li>
            <a href="https://gmail.com/" class="gmail">
                <img src="img/google.png" alt="gmail">
            </a>
        </li>
        <li>
            <a href="https://www.instagram.com/padangmovie/" class="instagram">
                <img src="img/instagram.png" alt="instagram">
            </a>
        </li>
    </ul>
</nav>



<footer>
	<p>FPIN - PADANG</p>
</footer>

</body>
</html>

