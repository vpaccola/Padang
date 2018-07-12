<?php

require_once 'database/conexao.php';

session_start();

$usuario_id = $_SESSION['id'];
$data = $_POST['data'];
$hora = $_POST['hora']; 

$sql = mysqli_query($conexao, "INSERT INTO `sessoes` (`usuario_id`,`data`,`hora`) VALUES('$usuario_id','$data', '$hora')");

if($sql)
{
    echo "<span class='sucess'>Cadastro do Sessão Realizado com sucesso</span>";
    echo "<meta http-equiv=refresh content='1;url=\\padang'>";
}else
{
     echo "Falha ao realizar o cadastro da Sessão";
}

?>