<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/projects/crud-php/config/conexao.php');

    $sql = "SELECT * FROM usuario WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizando <?= $usuario['nome']?></title>
    <link rel="stylesheet" href="https://classless.de/classless.css">
</head>
<body>
    <form action="/projects/crud-php/src/actions/editar.php" method="post">
        <h1>Atualizando <?= $usuario['nome']?></h1>
        
        <label for="tipo">Tipo de usuário</label>
        <br>
        <select name="tipo" id="tipo">
            <option value=1 <?= $usuario['usuario_tipo'] == 'cliente' ? 'selected' : NULL ?>>Cliente</option>
            <option value=2 <?= $usuario['usuario_tipo'] == 'admin' ? 'selected' : NULL ?>>Administrador</option>
            <option value=3 <?= $usuario['usuario_tipo'] == 'cuidador' ? 'selected' : NULL ?>>Cuidador</option>
        </select>

        <br>

        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" value="<?= $usuario['nome'] ?>" placeholder="Nome">
        
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="<?= $usuario['email'] ?>" placeholder="Email">
        
        <label for="telefone">Telefone</label>
        <input type="text" id="telefone" name="telefone" value="<?= $usuario['telefone'] ?>" placeholder="Telefone" maxlength="13" pattern="\d{13}" inputmode="numeric">
        
        <label for="cpf">CPF</label>
        <input type="text" id="cpf" name="cpf" value="<?= $usuario['cpf'] ?>" placeholder="CPF" maxlength="11" pattern="\d{11}" title="Digite exatamente 11 números" inputmode="numeric">

        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

        <input type="submit" value="Atualizar usuário">
        
    </form>
</body>
</html>