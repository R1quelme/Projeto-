<!DOCTYPE html>
<?php
    require_once "includes/banco.php";
    require_once "includes/login.php";
    require_once "includes/funcoes.php";
?>
<html lang="pt-br">
<head>
    <title>Login de usuario</title>
    <meta charset="UTF-8" />
    
    <link rel="stylesheet" href="estilos/style.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div>
        <?php
            $u = $_POST['usuario'] ?? null; 
            $s = $_POST['senha'] ?? null;

                if(is_null($u) || is_null($s)){ //basta que um dos dois seja null que o usuario sera direcionado para o formulario
                    require "user-login-form.php";
                } else {
                    $q = "SELECT usuario, nome, senha, tipo FROM usuarios WHERE usuario = '$u' LIMIT 1";
                    $busca = $banco->query($q);
                        if(!$busca){
                            echo msg_erro('Falha ao acessar o banco!');
                        } else{
                            if($busca->num_rows > 0){
                                $reg = $busca->fetch_object();
                            if (testarHash($s, $reg->senha)){
                                header("Location: index.php");
                                $_SESSION['user'] = $reg->usuario;
                                $_SESSION['nome'] = $reg->nome;
                                $_SESSION['tipo'] = $reg->tipo;
                                $_SESSION['valida_estudonauta'] = '1';
                            } else {
                                echo msg_erro('Senha inválida');
                            }
                        } else{
                            echo msg_erro('Usuario nao existe');
                        }

                }
                echo voltar();
            }
        ?>
    </div>
</body>
</html>