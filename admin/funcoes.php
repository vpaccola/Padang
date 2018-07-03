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
        $sql = "insert into usuarios(nome,email,senha)values(:nome,:email,:senha)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senhaHash);
    
        if( $stmt->execute() )
        {
            $mensagem[] = "Usuario Criado com Sucesso!";
            return $mensagem;
        } else {
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
        $sql = "select * from usuarios where email = :email";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $rows = $stmt->fetchAll( \PDO::FETCH_OBJ );
        
        if( count( $rows ) <= 0 )
        {
            $errors[] = 'Email Invalido';
            return $errors;
        } 
        else 
        {
           $usuario = $rows[0];
           
           if(md5($senha) != $usuario->senha)
           {   
               $errors[] = 'Senha Incorreta';
               return $errors;
           }
           else {
               criaSessaoAdmin($usuario);
               header('location:home.php');
           }
        }
    }

    function criaSessaoAdmin($usuario)
    {
        session_start();
        $_SESSION['usuario'] = $usuario->nome;
        $_SESSION['id'] = $usuario->id;
    }

    function destroySessaoAdmin()
    {

    }

    function verificaSessaoAdmin()
    {
        session_start();
        if(!isset($_SESSION['usuario']) && !isset($_SESSION['id']))
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
            $sql = "insert into galerias(nome)values(:nome)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            if( $stmt->execute() )
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
        $sql = "select * from galerias";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $rows = $stmt->fetchAll( \PDO::FETCH_OBJ );
        
        if( count( $rows ) <= 0 )
        {
            return null;
        } 
        else 
        {
            return $rows;
        }
    }

    function findGaleriaById($conexao, $id)
    {
        $sql = "select * from galerias where id = :id";
        $stmt1 = $conexao->prepare($sql);
        $stmt1->bindParam(':id', $id);
        $stmt1->execute();

        $galeria = $stmt1->fetchAll( \PDO::FETCH_OBJ );

        $sqlFotos = "select * from fotos where galeria_id = :id";
        $stmt2 = $conexao->prepare($sqlFotos);
        $stmt2->bindParam(':id', $id);
        $stmt2->execute();

        $fotos = $stmt2->fetchAll( \PDO::FETCH_OBJ );
        $info = [];
        
        array_push($info, $galeria);
        array_push($info, $fotos);

        return $info;
    }

    function thumbGaleria($conexao, $id)
    {
        $sql = 'select path from fotos where galeria_id = :id LIMIT 1';
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $rows = $stmt->fetchAll( \PDO::FETCH_OBJ );
       return $rows;
    }
?>