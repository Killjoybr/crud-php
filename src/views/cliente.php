<?php 
    require_once($_SERVER['DOCUMENT_ROOT'].'/projects/crud-php/config/conexao.php');
    session_start();

    if($_SESSION['tipo'] != 'cliente'){
        session_destroy();
        header('location: ../../index.php?mensagem=Você não tem permissão para acessar esta página');
    }

    $sql = "SELECT * FROM contrato WHERE cliente_id = :cliente_id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':cliente_id', $_SESSION['id']);
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Homecare</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/projects/crud-php/src/componentes/navbar.php')?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="min-height: 90vh;">

        <h1 class="h1 mb-4 text-center">Olá, <?=$_SESSION['usuario']?>!</h1>

            <!-- Main Content -->
            <div id="content" class="bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-3 bg-light border rounded">
                                <h5 class="text-center">Contratos</h5>
                                <p>Implementar leitura de contratos</p>
                                <a href="#bottom" class="btn btn-primary mt-4 d-flex justify-content-center">Solicitar contrato</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light border rounded">
                                <h5 class="text-center">Cuidadores</h5>
                                <p>Implementar leitura</p>
                                <p class="mt-4 d-flex justify-content-center"> <small>Caso tenha interesse em trocar algum cuidador(a) entre em contato por e-mail informando o motivo!</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; Sophia Homecare <br>2025</span>
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

    <?php include_once("/projects/crud-php/src/componentes/logout.php")?>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
