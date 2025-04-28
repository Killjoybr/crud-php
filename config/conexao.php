<?php
    $env = parse_ini_file('.env') ? parse_ini_file('.env') : parse_ini_file('../.env');
    
    if ($env == false) {
      $env = parse_ini_file('../../.env');
    }

    $host = $env["HOST"];
    $port = $env["PORT"];
    $username = $env["USER"];
    $password = $env["PASSWORD"];
    $database = $env["DB"];

    try {
      $conexao = NEW PDO(
          'mysql:host='.$host.';
          port='.$port.';
          dbname='.$database,
          $username,
          $password
      );
    } catch(Exception $e){
      echo "<h1>Erro ao carregar conexao com banco de dados</h1>";
      die();
    }

    // var_dump($conexao);
    // var_dump($env);
    // Abaixo sao os atributos do .env - coloquei para facilitar :D
    // HOST=127.0.0.1
    // PORT=3306
    // USER=root
    // PASSWORD=
    // DB=desenvolvimento
?> 
