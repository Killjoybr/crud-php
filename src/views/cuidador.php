<?php
    session_start();
    if($_SESSION['tipo'] != 'cuidador'){
        session_destroy();
        header('location: /projects/crud-php/index.php?mensagem=Você não tem permissão para acessar esta página');
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de ponto</title>
    <link href="/projects/crud-php/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="/projects/crud-php/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/projects/crud-php/src/componentes/navbar.php")?>

    <div class="container-fluid">
        <h1 class="h1 mb-4 text-center">Olá, <?=$_SESSION['usuario']?>!</h1>

        <div class="">
            <div class="p-3 bg-light border rounded">
                <h5 class="text-center">Registro de ponto</h5>
                <p class="mt-4 text-center">Horário atual: <span id="horario">Carregando...</span></p>
                <p class="mt-2 text-center"><span id="data">Carregando...</span></p>
                <button id="entrada" class="btn btn-primary mt-4 d-flex justify-content-center">Registrar entrada</button>
                <button id="saida" class="btn btn-primary mt-4 d-flex justify-content-center">Registrar saída</button>
            </div>
        </div>      
    </div>

    <?php include_once($_SERVER['DOCUMENT_ROOT']."/projects/crud-php/src/componentes/logout.php")?>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/projects/crud-php/src/componentes/scripts.php")?>

    <script>
        // Função para atualizar o horário e a data
        function atualizarHorario() {
            const agora = new Date();
            const opcoesHora = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
            const opcoesData = { year: 'numeric', month: '2-digit', day: '2-digit' };

            document.getElementById('horario').textContent = agora.toLocaleTimeString('pt-BR', opcoesHora);
            document.getElementById('data').textContent = agora.toLocaleDateString('pt-BR', opcoesData);
        }

        // Atualiza o horário e a data a cada segundo
        setInterval(atualizarHorario, 1000);
        atualizarHorario(); // Chamada inicial para exibir imediatamente

        // Código exemplo, atualizar para cadastrar o ponto
        $.ajax({
            url: '/projects/crud-php/src/controllers/cuidadorController.php',
            type: 'POST',
            data: { action: 'getRegistroPonto' },
            success: function(response) {
                const registros = JSON.parse(response);
                if (registros.length > 0) {
                    registros.forEach(registro => {
                        console.log(`Entrada: ${registro.entrada}, Saída: ${registro.saida}`);
                    });
                } else {
                    console.log('Nenhum registro encontrado.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Erro ao buscar registros:', error);
            }
        });
    </script>
</body>
</html>