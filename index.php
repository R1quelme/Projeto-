<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Listagem de jogos</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="estilos/estilo1.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
</head> 

<body>
    <?php
       require_once "includes/banco.php";
       require_once "includes/login.php";
       require_once "includes/funcoes.php";
       $ordem = $_GET['o'] ?? "n";
       $chave = $_GET['c'] ?? "";
    ?>
    <div id="corpo">
        <?php include_once "topo.php";?>
                                                                                                                            
        <h1>Escolha seu jogo</h1><br>
       
        <form method="get" id="busca" action="index.php">
            Ordenar: 
            <a href="index.php?o=n&c=<?php echo $chave;?>">Nome</a> |
            <a href="index.php?o=p&c=<?php echo $chave;?>">Produtora</a> |
            <a href="index.php?o=n1&c=<?php echo $chave;?>">Nota Alta</a> |
            <a href="index.php?o=n2&c=<?php echo $chave;?>">Nota baixa</a> |
            <a href="index.php">Mostrar todos</a> |
            Buscar: <input type="text" name="c" size= "10"
            maxleght="40"/>
            <input type="submit" value="OK"/>
        </form>

        <table class="listagem">
        <?php
            $q = "select j.cod, j.nome, g.genero, p.produtora, j.capa from jogos j join generos g on j.genero = g.cod join produtoras p on j.produtora = p.cod ";
            
            if(!empty($chave)){
                $q .= "WHERE j.nome like '%$chave%' OR p.produtora like '%$chave%' OR g.genero like '%$chave%' ";
            }

            switch ($ordem){
                case "p":
                    $q .= "ORDER BY p.produtora";
                    break;
                case "n1":
                    $q .= "ORDER BY j.nota DESC"; //do maior pro menor
                    break;
                case "n2":
                    $q .= "ORDER BY j.nota ASC";  //O asc é opcional, do menor pro maior
                    break;
                default:
                    $q .= "ORDER BY j.nome";
                    break;
            }
            
            $busca = $banco->query($q);
            if(!$busca) {
                echo "<tr><td>Infelizmente a busca deu errado";
            } else{
                if ($busca->num_rows == 0){
                    echo "<tr><td>Nenhum registro encontrado";
                } else {
                    while($reg=$busca->fetch_object()){
                        $t = thumb($reg->capa);
                        echo "<tr><td><a href='detalhes.php?cod=$reg->cod'><img src='$t' class ='mini'/></a>";
                        echo "<td>$reg->nome";
                        echo "<br>";
                        echo "($reg->genero) ";
                        echo "$reg->produtora";
                        if(is_admin()){
                            echo "<td>";
                            echo "<a href='jogos-new-jogo.php'><i class='material-icons'>add_circle</i></a> ";
                            echo "<a href='jogos-editar.php?cod=$reg->cod' style='color: black'><i class='material-icons'>edit</i></a>  ";
                            echo "<a href='jogos-delete.php?cod=$reg->cod' style='color: black'><i class='material-icons'>delete</i></a>";
                        } elseif(is_editor()){
                            echo "<td> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
                            echo "<a href='jogos-editar.php?cod=$reg->cod'><i class='material-icons'>edit</i> ";
                        } 
                    }
                }
            }
        ?>
        </table>
    </div><br>
    <?php include_once "rodape.php";?>
</body>
</html>