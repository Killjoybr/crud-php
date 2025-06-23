<?php 
    require_once($_SERVER['DOCUMENT_ROOT'].'/projects/crud-php/config/conexao.php');

    $sql = "UPDATE USUARIO SET nome = :nome, email = :email, telefone = :telefone, cpf = :cpf, usuario_tipo = :tipo WHERE id = :id";

    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $_POST['nome']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':telefone', $_POST['telefone']);
        $stmt->bindParam(':cpf', $_POST['cpf']);
        $stmt->bindParam(':tipo', $_POST['tipo']);
        $stmt->bindParam(':id', $_POST['id']);

        $stmt->execute();
    } catch (exception $th) {
        // Log the error message for debugging
        error_log("Erro ao atualizar usuário: " . $th->getMessage());
        header('Location: /projects/crud-php/views/usuarios.php?msg=Erro ao atualizar usuário, DB.');
        exit();
    }

    header('Location: /projects/crud-php/src/tabela.php');

?>