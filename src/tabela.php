<?php
  session_start();
  $_SESSION['tipo'] !== 'admin' ? header('location: ../index.php?mensagem=Acesso negado!') : NULL; 

  require_once($_SERVER['DOCUMENT_ROOT'] . '/projects/crud-php/config/conexao.php');

  $sql = 'SELECT u.*, c.descricao 
        FROM usuario as u 
            LEFT JOIN usuario_tipo as c ON u.usuario_tipo = c.id';

  $usuarios = $conexao->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SH Admin</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once('./componentes/sidebar-admin.php')?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php include_once('./componentes/navbar.php') ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Usuários</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>CPF</th>
                                            <th>Nome</th>
                                            <th>Telefone</th>
                                            <th>E-mail</th>
                                            <th>Endereço</th>
                                            <th>Tipo</th>
                                            <th>Editar</th>
                                            <th>Excluir</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>CPF</th>
                                            <th>Nome</th>
                                            <th>Telefone</th>
                                            <th>E-mail</th>
                                            <th>Endereço</th>
                                            <th>Tipo</th>
                                            <th>Editar</th>
                                            <th>Excluir</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      <?php foreach($usuarios as $usuario):?>
                                          <tr>
                                            <td><?= $usuario['cpf'] ? $usuario['cpf'] : 'Sem Cadastro'?></td>
                                            <td><?= $usuario['nome'] ? $usuario['nome'] : 'Sem Cadastro'?></td>
                                            <td><?= $usuario['telefone'] ? $usuario['telefone'] : 'Sem Cadastro'?></td>
                                            <td><?= $usuario['email'] ? $usuario['email'] : 'Sem Cadastro'?></td>
                                            <td><?= $usuario['endereco_id']? '<a href="./actions/endereco.php?id=' . $usuario['id']. '">' . '<span>Visualizar</span> </a>': 'Sem Cadastro'?></td>
                                            <td><?= $usuario['descricao'] ? $usuario['descricao'] : 'Sem Cadastro'?></td>
                                            <td><?= '<a href="./views/atualizar-cliente.php?id=' . $usuario['id']. '">' . '<i class="fa fa-pen"></i> </a>'?></td>
                                            <td><?= '<a href="./actions/excluir.php?id=' . $usuario['id'] . '">' . '<i class="fa fa-trash"></i> </a>'?></td>
                                          </tr>
                                      <?php endforeach?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include_once('./componentes/logout.php')?>
    <?php include_once('./componentes/acessibilidade.php')?>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="../vendor/datatables/jquery.dataTables.min.js"></script> -->
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.3.2/b-3.2.3/b-html5-3.2.3/datatables.min.css" rel="stylesheet" integrity="sha384-kDT1hNe+pLyKFbR+gvYVmwu7AEP6qBjX+vND/y8ZAUuknVO+UKvw4adBpPn29fCi" crossorigin="anonymous">
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha384-VFQrHzqBh5qiJIU0uGU5CIW3+OWpdGGJM9LBnGbuIH2mkICcFZ7lPd/AAtI7SNf7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" integrity="sha384-/RlQG9uf0M2vcTw3CX7fbqgbj/h8wKxw7C3zu9/GxcBPRKOEcESxaxufwRXqzq6n" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.3.2/b-3.2.3/b-html5-3.2.3/datatables.min.js" integrity="sha384-Yn1k4h20l7Rc86PGfgWOK8SZMufb1EcbI7snl5OrrWoMQTUBMrMbE69hxAcEb7k3" crossorigin="anonymous"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
