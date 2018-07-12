<?php
    function verificaLoginCadastro($conexao)
    {
        $nome = isset( $_POST['nome'] ) ? $_POST['nome'] : null;
        $email = isset( $_POST['email'] ) ? $_POST['email'] : null;
        $senha = isset( $_POST['senha'] ) ? $_POST['senha'] : null;

        $errors = [];

        if( empty($nome) )
        {
            $errors[] = 'Informe o seu Nome';
        }
        if( empty($email) )
        {
            $errors[] = 'Informe o seu Email';
        }
        if( empty($senha) )
        {
            $errors[] = 'Informe a sua Senha';
        }
        if(count($errors) > 0){
            return $errors;
        } else {
            $mensagem = cadastrarAdministrador($nome, $email, $senha, $conexao);
            return $mensagem;
        }
    };

    function cadastrarAdministrador($nome, $email, $senha, $conexao)
    {
        $senhaHash = md5($senha);
        $sql = mysqli_query($conexao, "INSERT INTO `usuarios` (`nome`,`email`,`senha`) VALUES('$nome','$email','$senhaHash')");
    
        if($sql)
        {
            $mensagem[] = "Usuario Criado com Sucesso!";
            return $mensagem;
        }
        else 
        {
            print_r($stmt->errorInfo());
            $mensagem[] = "Falha Ao Criar o Usuario";
            return $mensagem;
        }
    };


    function loginAdmin($conexao)
    {
        $email = isset( $_POST['email'] ) ? $_POST['email'] : null;
        $senha = isset( $_POST['senha'] ) ? $_POST['senha'] : null;

        $errors = [];

        if( empty($email) )
        {
            $errors[] = 'Informe o seu Email';
        }
        if( empty($senha) )
        {
            $errors[] = 'Informe a sua Senha';
        }
        if (count($errors) > 0) {
            return $errors;
        } 
        else 
        {
            $mensagem = verificaLoginAdmin($email, $senha, $conexao);
           return $mensagem;
        }
    }


    function verificaLoginAdmin($email, $senha, $conexao)
    {
        $result = mysqli_query($conexao, "SELECT * FROM `usuarios` WHERE `email` = '$email'");
		$rows = mysqli_fetch_assoc($result);
        
        if( empty($rows) )
        {
            $errors[] = 'Email Invalido';
            return $errors;
        } 
        else 
        {
           if(md5($senha) != $rows['senha'])
           {   
               $errors[] = 'Senha Incorreta';
               return $errors;
           }
           else {       
               criaSessaoAdmin($rows);
               header('location:home.php');
           }
        }
    }

    function criaSessaoAdmin($usuario)
    {
        session_start();
        $_SESSION['usuario'] = $usuario['nome'];
        $_SESSION['id'] = $usuario['id'];
    }

    function destroySessaoAdmin()
    {

    }

    function verificaSessaoAdmin()
    {
        session_start();
        if(!isset($_SESSION['usuario']) && !isset($_SESSION['id']) || empty($_SESSION['usuario']))
        {
            header('location:login.php');
        }
    }

    function verificaSessaoLogin()
    {
        session_start();
        if(isset($_SESSION['usuario']) && isset($_SESSION['id']))
        {
            header('location:home.php');
        }
    }


    function cadastraGaleria($conexao)
    {
        $nome = isset( $_POST['nome'] ) ? $_POST['nome'] : null;
        
        $errors = [];

        if( empty($nome) )
        {
            $errors[] = 'Informe o nome da galeria';
        }
        if (count($errors) > 0) {
            return $errors; 
        } else {
            
            $sql = mysqli_query($conexao, "INSERT INTO `galerias` (`nome`) VALUES('$nome')");
            
            if( $sql )
            {
                $mensagem[] = "Galeria Criada com Sucesso!";
                return $mensagem;
            } else {
                $mensagem[] = "Falha Ao Criar a Galeria";
                return $mensagem;
            }
        }        
    }

    function consultaGalerias($conexao)
    {
        $result = mysqli_query($conexao, "SELECT * FROM `galerias`");
		$rows = mysqli_fetch_all($result);
        
        if( $rows )
        {
            return $rows;
        } 
        else 
        {
            return null;
        }
    }

    function findGaleriaById($conexao, $id)
    {

        $sql1 = mysqli_query($conexao, "SELECT * FROM `galerias` WHERE `id` = '$id'");
        $galeria = mysqli_fetch_all($sql1); 
        
        $sql2 = mysqli_query($conexao, "SELECT * FROM `fotos` WHERE `galeria_id` = '$id'");
        $fotos = mysqli_fetch_all($sql2); 

        $info = [];
        
        array_push($info, $galeria);
        array_push($info, $fotos);

        return $info;
    }

    function thumbGaleria($conexao, $id)
    {
        $sql = mysqli_query($conexao, "SELECT * FROM `fotos` WHERE `galeria_id` = '$id'");
        $rows = mysqli_fetch_all($sql);   
    
        return $rows;
    }
?>