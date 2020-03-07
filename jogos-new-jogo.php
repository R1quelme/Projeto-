<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Novo jogo</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="estilos/estilo1.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <?php
    require_once "includes/banco.php";
    require_once "includes/login.php";
    require_once "includes/funcoes.php";
    ?>
    <div id="corpo">
        <?php 
        if(!is_admin()){
            echo msg_erro('Area restrita! Voce nao é administrador');
        } else
            if(!isset($_POST['nome'])){
                require "jogos-new-jogo-form.php";
                } else{
                // $cod = $_POST['cod'];
                $nome = $_POST['nome'];
                $genero = $_POST['genero'];
                $produtora = $_POST['produtora'];
                $descricao = $_POST['descricao'];
                $nota = $_POST['nota'];
                // $capa = $_POST['capa'];

        $q = "INSERT INTO `bd_games`.`jogos` (`nome`, `genero`, `produtora`, `descricao`, `nota`) VALUES ('$nome', '$genero', '$produtora', '$descricao', '$nota')";

        $res= mysqli_query($banco, $q);
        $linhas= mysqli_affected_rows($banco);
    
        if($linhas == 1) {
            echo "Registro gravado com sucesso<br/>";
            // echo "<script language='javascript'>history.back()</script>";
        }else{
            echo "Falha na gravacao do registro<br/>";
    
        }
    
        // mysqli_close($banco);

    //     if($banco->query($q)){
    //         echo msg_sucesso("adicionado");
    //     } else {
    //         echo msg_erro("Faio");
    //     }
    // }




    //         if(!isset($_POST['jogo'])){
    //             require "jogos-new-jogo-form.php";
    //         } else{
    //             $nome = $_POST['nome'] ?? null;
    //             $genero = $_POST['genero'] ?? null;
    //             $produtora = $_POST['produtora'] ?? null;
    //             $descricao = $_POST['descricao'] ?? null;
    //             $nota = $_POST['nota'] ?? null;

    //             var_dump($_POST['nome'], $_POST['genero'], $_POST['produtora'], $_POST['descricao'], $_POST['nota']);
    //             exit;

    //             // $capa = $_POST['capa'] ?? null;

    //             if(empty($nome) || empty($genero) || empty($produtora) || empty($descricao) || empty($nota)){
    //                 echo msg_erro("Todos os dados são obrigatórios!");
    //             }else{
    //             $q = "INSERT INTO jogos (nome, genero, produtora, descricao, nota) VALUES ('$nome', '$genero', '$produtora', '$descricao', '$nota')";
    //             if($banco->query($q)){
    //                 echo msg_sucesso("Jogo $nome criado");
    //             } else{
    //                 echo msg_erro("Não foi possivel criar o jogo");
    //             }
    //         }
    //     }
    // }
    } 
    echo voltar();
        ?>
    </div>
    <?php include_once 'rodape.php'?>
</body>
</html>