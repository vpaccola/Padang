<?php

    require_once "../funcoes.php";
    require_once "../../database/conexao.php";

    if(is_dir('../../storage/' . $_POST['id']))
    {
        $destino = '../../storage/' . $_POST['id'] . '/' . $_FILES['imagem']['name'];

        $arquivo_tmp = $_FILES['imagem']['tmp_name'];
        
        cadastraImagemNoBanco($conexao, $_POST['id'], $destino, $arquivo_tmp);

        move_uploaded_file( $arquivo_tmp, $destino  );

        header('location:show.php?id=' . $_POST['id']);
    } 
    else 
    {
        mkdir('../../storage/' . $_POST['id'], 0777, true);    

        $destino = '../../storage/' . $_POST['id'] . '/' . $_FILES['imagem']['name'];

        $arquivo_tmp = $_FILES['imagem']['tmp_name'];
        
        cadastraImagemNoBanco($$conexao, $_POST['id'], $destino, $arquivo_tmp);

        move_uploaded_file( $arquivo_tmp, $destino  );
        
        header('location:show.php?id=' . $_POST['id']);
    }
    

    function cadastraImagemNoBanco($conexao, $galeria_id, $destino, $nome)
    {
        $sql = mysqli_query($conexao, "INSERT INTO `fotos`(`galeria_id`,`path`,`thumb`) VALUES('$galeria_id','$destino','$nome')");
    }

?>