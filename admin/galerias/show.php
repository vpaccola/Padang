<?php
    require_once "../funcoes.php";
    require_once "../../database/conexao.php";

    verificaSessaoAdmin();

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $info = findGaleriaById($pdo, $_GET['id']);
    } else {
        header('location:../galerias.php');
    }
    
    
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Padang - Admin</title>
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
    <link rel="stylesheet" type="text/css" href="../../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<nav>
		<a href="index.html" class="nova-font"> Padang Surf </a>
		<ul>
			<li></li>
			<li></li>
            <li><i class="fas fa-user"></i> <?php echo $_SESSION['usuario']?></li>
            <li><i class="fas fa-sign-out-alt"></i><a class="logout" href="logout.php"> Sair</a></li>
		</ul>	
	</nav>

    <div class="sidenav">
        <a class="sidenav-link" href="#galerias">Cadastros</a>
        <a class="li-nav-link"><li class="sidenav-li">Galeria</li></a>
        <a class="li-nav-link"><li class="sidenav-li">Foto</li></a>
    </div>

    <div class="center">
        
    <div class="panel-title">
        <h1>Galeria</h1>
        
    </div>
       
    <div class="panel-body">
    <?php 
        foreach($info[0] as $inf){
            ?>
        <h3>Nome: <?php echo $inf->nome;?></h3> 
    <?php
        }
    ?>
    <?php 
        foreach($info[1] as $inf){
            ?>

            <div class="panel-thumb">
            <div class="thumb">
                <img class="thumb-image" src="../../storage/<?php echo $_GET['id']?>/<?php echo $inf->path?>" >
            </div>
            <h3>foto: <?php echo $inf->thumb;?></h3> 
        </div>
        
    <?php
        }
    ?>
    
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
        Selecione uma imagem: <input name="imagem" type="file" />
    <br />
        <input type="submit" value="Salvar" />
    </form>

       
    </div>
        
    </div>      
    
</body>

</html>