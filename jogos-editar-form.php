<?php
$q = "select a.cod as cod, nome, b.genero, c.produtora, descricao, nota from jogos a join generos b on a.genero = b.cod join produtoras c on a.produtora = c.cod where a.cod='" . $_GET['cod'] . "'";
$busca = $banco->query($q);
$reg = $busca->fetch_object();
?>

<h1>Editar Jogos</h1>
<form action="jogos-editar.php" method="POST">
    <table>
        <tr>
            <td>Cod
            <td><input type="number" name="cod" id="cod" maxlength="5" size="5" value="<?php echo $reg->cod ?>" readonly>
        <tr>
            <td>Nome
            <td><input type="text" name="nome" id="nome" maxlength="40" size="20" value="<?php echo $reg->nome ?>">
        <tr>
            <td>genero
            <td>
                <!-- <select name="genero" id="genero">
                    < ?php
                    while ($row = $registro_genero) {
                        $selected_rep = $row['cod'] == $_GET['cod'] ? 'selected="selected"' : '';

                        $opt .=  "<option $selected_rep value='" . $row["cod"] . "'>" . $row['genero'] . "</option>";
                    }
                    ?>
                </select> -->
                <input type="text" name="genero" id="genero" maxlength="10" size="10" value="<?php echo $reg->genero ?>">
        <tr>
            <td>Produtora
            <td><input type="text" name="produtora" id="produtora" maxlength="10" size="10" value="<?php echo $reg->produtora ?>">
        <tr>
            <td>Descrição
            <td><textarea type="text" name="descricao" id="descricao" cols="50" rows="7"><?php echo $reg->descricao ?></textarea>
        <tr>
            <td>Nota
            <td><input type="number" name="nota" id="nota" maxlength="5" size="5" value="<?php echo $reg->nota ?>">
                <!-- <tr><td>Capa
            <td><input type="text" name="Capa" id="Capa" maxlength="10" size="10" value="< ?php echo $reg->capa ?>"> -->
        <tr>
            <td><input type="submit" value="Salvar">
    </table>
</form>