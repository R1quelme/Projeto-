<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Título da Página</title>
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
        <?php include_once "topo.php"; ?>
        <?php
        $c = $_GET['cod'] ?? 0;
        $busca = $banco->query("select * from jogos where cod='$c'");
        ?>
        <h1>Detalhes do jogo</h1>
        <table class='detalhes'>
            <?php
            if (!$busca) {
                echo "<tr><td>busca falhou! $banco->error";
            } else {
                if ($busca->num_rows == 1) {
                    $reg = $busca->fetch_object();
                    $t = thumb($reg->capa);
                    echo "<tr><td rowspan='3'><img src='$t' class='full'/>";
                    echo "<td><h2>$reg->nome</h2>";
                    echo "Nota: " . number_format($reg->nota, 1) . "/10.0"; /*ou use dessa maneira: "Nota: $reg->nota/10.0"; Dessa maneira a nota ficaria por exemplo "9.50"*/
                    if(is_admin()){
                        echo " &nbsp <i class='material-icons'>add_circle</i>  ";
                        echo "<i class='material-icons'>edit</i>  ";
                        echo "<i class='material-icons'>delete</i>";
                    } elseif(is_editor()){
                        echo " &nbsp <i class='material-icons'>edit</i> ";
                    } 
                    echo "<tr><td>$reg->descricao";
                } else {
                    echo "<tr><td>Nenhum registro encontrado";
                    // apenas fazendo um teste para o git desktop
                }
            }
            ?>
        </table>
        <!-- <a href="index.php"><i class="material-icons">arrow_back</i></a> -->
        <?php echo voltar() ?>
    </div>
    <?php include_once "rodape.php"; ?>
</body>

</html>