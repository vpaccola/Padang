<?php
    require_once 'database/conexao.php';

    session_start();
    
    $usuario_id = $_SESSION['id'];
    $nome = $_POST['nome']; 
    $endereco = $_POST['endereco'];
    $data = $_POST['data'];
    $hora = $_POST['hora']; 

    $sql = mysqli_query($conexao, "INSERT INTO `eventos` (`nome`,`usuario_id`,`endereco`,`data`,`hora`) VALUES('$nome','$usuario_id','$endereco','$data', '$hora')");

    if($sql)
    {
        echo "<span class='sucess'>Cadastro do Evento Realizado com sucesso</span>";
        echo "<meta http-equiv=refresh content='1;url=\\padang'>";
    }else
    {
         echo "Falha ao realizar o cadastro do evento";
    }
?>