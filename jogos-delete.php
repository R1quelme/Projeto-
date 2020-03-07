<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Deletar jogo</title>
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
        echo msg_erro('Área restrita! Voce nao é administrador');
    } else{
    ?>
        <form action="jogos-delete.php" method="POST">
            <h1>Deletar jogo</h1>
            <p>Deseja mesmo deletar o jogo?</p>
            <td><input type="submit" name="resposta" value="Sim">
            <td><input type="submit" name="resposta" value="Não">
            <td><input hidden name="codigo" value="<?= $_GET["cod"] ?>">

        </form>
        <?php
        //    print_r($_POST);
        if(in_array("Sim" or "Não", $_POST)) {
            if ($_POST["resposta"] == "Sim") {
                $cod = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_SPECIAL_CHARS);
                $queryDelete = "delete from jogos where cod=". $cod;
                // echo $queryDelete;
                // print_r($_POST);
                // exit;
                
                $exec = mysqli_query($banco, $queryDelete);
                if(mysqli_affected_rows($banco) != 0){
                header("location: jogos-delete-form.php");
                }
            } elseif ($_POST["resposta"] == "Não") {
                header("Location: index.php");
            }
        }
    }
        echo voltar();
        ?>

    </div>
    <?php include_once 'rodape.php' ?>

</body>

</html>