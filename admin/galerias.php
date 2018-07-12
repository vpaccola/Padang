<?php
    require_once "funcoes.php";
    require_once "../database/conexao.php";

    verificaSessaoAdmin();
    $galerias = consultaGalerias($conexao);

    // print_r($galerias);
    
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Padang - Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<nav>
		<a href="home.php" class="nova-font"> Padang Surf </a>
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
        <h1>Galerias</h1>
        <a class="add" href="galerias/create.php"><i class="fas fa-plus"></i> Nova Galeria </a>
    </div>
    
    <div class="panel-body">
        
        <?php 

        foreach($galerias as $galeria)
        {
        ?>
        <a class="panel-thumb" href="galerias/show.php?id=<?php echo $galeria[0];?>">
        <div class="panel-thumb">
            <?php
                $galeriaImagem = thumbGaleria($conexao, $galeria[0]);
            ?>
            <div class="thumb">
                <?php if(!empty($galeriaImagem))
                {
                ?>
                    <img class="thumb-image" src="../storage/<?php echo $galeria->id?>/<?php echo $galeriaImagem[0]->path ?>" >
                <?php
                }
                ?>
                


            </div>
            <p>Nome: <?php echo $galeria[1] ?> </p>
        </div>
        </a>
        <?php
        }
        ?>
    
    </div>
    

    </div>      
    
</body>

</html>