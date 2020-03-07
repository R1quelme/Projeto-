<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Editar jogos</title>
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
        if (!is_logado()) {
            echo msg_erro("Efetue o <a href= 'user-login.php'>login </a> para continuar");
        } else {
            if (isset($_GET['cod'])) {
                include "jogos-editar-form.php";
            } else {
                $cod = addslashes($_POST['cod']) ?? null;
                $nome = $_POST['nome'] ?? null;
                $genero = $_POST['genero'] ?? null;
                $produtora = $_POST['produtora'] ?? null;
                $descricao = $_POST['descricao'] ?? null;
                $nota = $_POST['nota'] ?? null;
                // $capa = $_POST['capa'] ?? null;

                $q = "update jogos set cod = '$cod', nome = '$nome', genero = '$genero', produtora = '$produtora', descricao = '$descricao', nota = '$nota' where cod = '" . $_POST['cod'] . "'";
                
                // echo $q;
                // echo "<pre>";
                // print_r($_POST);
                // exit;

                if ($banco->query($q)) {
                    echo msg_sucesso("Usuario alterado com sucesso!");
                } else {
                    echo msg_erro("Nao foi possivel alterar os dados.");
                }
            }
        }


        echo voltar();

        ?>
    </div>
    <?php
    require_once "rodape.php"
    ?>
</body>

</html>