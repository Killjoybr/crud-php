<?php
    $env = parse_ini_file('.env');
    $host = $env["HOST"];
    $port = $env["PORT"];
    $username = $env["USER"];
    $password = $env["PASSWORD"];
    $database = $env["DB"];

    $conexao = NEW PDO(
        'mysql:host='.$host.';
        port='.$port.';
        dbname='.$database,
        $username,
        $password
    );

    // var_dump($conexao);
    // var_dump($env);
?> 