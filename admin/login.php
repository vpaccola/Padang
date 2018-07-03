<?php
    require_once "funcoes.php";
    require_once "../database/conexao.php";

    verificaSessaoLogin();

    if( $_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $mensagem = loginAdmin($pdo);
    }
      
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Padang Admin- Login</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    
<div style="height: 100px;width: 500px;margin:auto;margin-top: 60px">
        <?php 
            if(isset($mensagem)){
                if(count($mensagem) > 0){
                    foreach ($mensagem as $mens ){
                        echo $mens . "<br>";
                    }
                }
            }
        ?>
    </div>
 
    <div class="form-area">
		<p class="nova-font" id="logo"> PADANG SURF </p><br><br>
		
		<form action="login.php" method="post">
                
            <p>Email: </p>
			<input type="text" name="email" placeholder="Email">

			<p>Senha: </p>
			<input type="password" name="senha" placeholder="Password">

			<input type="submit" value="Acessar">
        </form>
    </div>    
</body>
</html>