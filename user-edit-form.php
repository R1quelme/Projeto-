<?php
    $q = "select usuario, nome, senha, tipo from usuarios where usuario='" . $_SESSION['user'] . "'";
    $busca = $banco->query($q);
    $reg = $busca->fetch_object();
    //Esses são os comandos para quando eu for editar, os dados atuais já aparecerem, e no formulario, o "value" faz com que eles apareçam
?>

<h1>Editar dados</h1>
<form action="user-edit.php" method="POST">
    <table>
        <tr><td>Usuário
            <td><input type="text" name="usuario" id="usuario" maxlength="10" size="10" value="<?php echo $reg->usuario?>" readonly>
        <tr><td>Nome
            <td><input type="text" name="nome" id="nome" maxlength="30" size="30" value="<?php echo $reg->nome ?>">
        <tr><td>Tipo
            <td><input type="text" name="tipo" id="tipo" value="<?php echo $reg->tipo ?>" readonly>
        <tr><td>Senha
            <td><input type="password" name="senha1" id="senha1" maxlength="10" size="10">
        <tr><td>Confirme a Senha
            <td><input type="password" name="senha2" id="senha2" maxlength="10" size="10">
        <tr><td><input type="submit" value="Salvar">
    </table>
</form><br>