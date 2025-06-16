<?php
    $sql = "SELECT usuario as u FROM usuario where id = :id"
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_REQUEST['id']);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $nomeUsuario = $usuario['nome'];
?>

<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editando - <?= $nomeUsuario?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="p-5" action="" method="post">
                    <div class="form-group">
                        <input type="text" name="nome" placeholder="nome">
                    </div>
                    <input type="email" name="email" placeholder="e-mail">
                    <input type="password" name="senha" placeholder="">
                    <br>
                    <input type="submit" value="Atualizar" class="btn btn-primary">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> -->
                <!-- <a class="btn btn-primary" href="login.html">Logout</a> -->
            </div>
        </div>
    </div>
</div>