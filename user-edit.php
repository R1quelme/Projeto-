<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Editar usuario</title>
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
                if(!is_logado()){
                echo msg_erro("Efeteu o <a href='user-login.php'>login</a> para continuar");
                } else{
                if(!isset($_POST['usuario'])){
                    include "user-edit-form.php";
                } else {
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $tipo = $_POST['tipo'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;

                    $q = "update usuarios set usuario = '$usuario', nome = '$nome'"; // aqui é feito o update. Vai ter mais 
                    
                    if (empty($senha1) || is_null($senha1)) {
                        echo msg_aviso("Senha antiga foi mantida.");
                    } else {  
                            if($senha1 === $senha2){
                                $senha = gerarHash($senha1);
                                $q .= ", senha= '$senha'"; //aqui está o resto, por isso começa com virgula
                            } else{
                                echo msg_erro("Senhas nao conferem. A senha anterior será mantida");
                            }
                        }
                    
                        $q .= " where usuario = '" . $_SESSION['user'] . "'"; //lugar que vai ser feito o update

                        // echo msg_aviso($q);

                        if($banco->query($q)){
                            echo msg_sucesso("Usuario alterado com sucesso!");
                            logout();
                            echo msg_aviso("Por segurança, efetue o <a href='user-login.php'>login</a> novamente.");
                        } else{
                            echo msg_erro("Não foi possivel alterar os dados.");
                        }
                    }
                    echo voltar();
                }
            ?>
            
        </div>

        <?php
            require_once "rodape.php"
        ?>
    </body>
</html>