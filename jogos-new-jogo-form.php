
<!-- < ?php
$_POST['nome'];
$_POST['genero'];
$_POST['genero'];
$_POST['descricao'];
$_POST['nota'];

var_dump($_POST['nome'], $_POST['genero'], $_POST['genero'], $_POST['descricao'], $_POST['nota']);
?> -->

<h1>Adicionar Jogo</h1>
<form action="jogos-new-jogo.php" method="post">
    <table>
        <tr>
            <td>Nome<td><input type="text" name="nome" id="nome" maxlength="40" size="20">
        <tr>
            <td>genero<td><input type="number" name="genero" id="genero" maxlength="10" size="10">
        <tr>
            <td>Produtora<td><input type="number" name="produtora" id="produtora" maxlength="10" size="10">
        <tr>
            <td>Descrição<td><textarea type="text" name="descricao" id="descricao" cols="50" rows="7"></textarea>
        <tr>
            <td>Nota<td><input type="number" name="nota" id="nota" maxlength="5" size="5">
        <!-- <tr>
            <td>Capa<td><input type="varchar" name="capa" id="capa" maxlength="20" size="20"> -->
        <tr>
            <td><input type="submit" value="Salvar">

    </table>
</form>