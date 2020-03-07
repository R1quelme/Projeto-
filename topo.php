<?php
    echo "<p class='pequeno'>";
    if(empty($_SESSION['user'])) {
        echo "<a href='user-login.php'>Entrar</a>"; //se o usuario ainda nao estiver cadastro ele é mandado para a pagina user-login
    } else {
        echo "Olá, <strong>" . $_SESSION['nome'] . "</strong> | "; //se estiver cadastrado, essa mensagem aparece 
        echo "<a href='user-edit.php' color=blue> Meus Dados </a>| ";
        if (is_admin()){
            echo "<a href='user-new.php'>Novo usuário</a> | ";
            echo "<a href='jogos-new-jogo.php'>Novo jogo</a> | ";
        }

        echo "<a href='user-logout.php'>Sair</a>";
        // echo " (usuário do tipo ".$_SESSION['tipo'] .")";
    }
    
    echo "</p>";