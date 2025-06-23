# Iniciando com MYSQL

## Ferramentas utilizadas
- _DBeaver_ (Ferramenta para gerenciar banco de dados) Outra opção -> _MySQL Workbench_.
- _Gerador de Dados falsos_ [generatedata](https://generatedata.com/generator).
- _Git_ Para versionamento de código.
- _GitHub_ Para armazenamento do repositório git na nuvem.
- _NVim_ Editor de código.
- _XAMPP_ Para servidor http e banco de dados.
- _PHP_ Linguagem utilizada no backend, juntamente com HTML para interação do usuário.
- _Bootstrap_ - Biblioteca utilizada para estilizar as páginas e manter padronização.
- _JQuery_ - Biblioteca para facilitar manipulação do DOM e requisições assíncronas.
- _Jquery.Mask_ - Biblioteca para adicionar máscara na entrada do usuário.
- _MySQL Workbench_ - Utilizado para criar o modelo do banco de dados.

## Funcionalidades/Escopo
<details>
  <summary>Usuário</summary>

  - Criação de usuário, cada usuário pode assumir 3 papéis:
  -  cliente (que é o padrão).
  -  administrador (que deve ser incluído por um administrador do banco de dados).
  -  cuidador (que deve ser incluído e gerido por um administrador do sistema WEB).
  - Criação/Atualização de contatos de emergência, visam fornecer aos administradores e cuidadores um contato de confiança caso algo ocorra com um cliente.
  - Cadastro de endereço pelo CEP.
  - Relacionamento de Paciente x Cuidador, a ser registrado pelo administrador.
</details>

<details>
<summary>Contratos</summary>

- Criação de contratos, apenas por administradores.
</details>

<details>
<summary>Ponto</summary>

- Cuidadores poderão registrar o horário de entrada e saída para trabalharem.
</details>

## Diagrama do Banco de Dados

![Modelo de Relacionamento de Entidades do Banco de dados](./assets/MER.png)

## Trechos importantes de código

<details>
  <summary>Conexão com DB</summary>

  ```php
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
  ```
</details>

<details>
  <summary>Controle de Acesso</summary>

  ```php
  if($_SESSION['tipo'] != 'cuidador'){
    session_destroy();
    header('location: /projects/crud-php/index.php?mensagem=Você não tem permissão para acessar esta página');
  }
  ```
</details>

<details>
  <summary>Modularização de Componentes</summary>
  
  Componentes são basicamente arquivos html com seções dividas, uma div por exemplo ou trechos de lógica php como controle de acesso.
  ```php
  <?php include_once('./componentes/sidebar-admin.php')?>
  ```
</details>

<details>
  <summary>Uso de sessão</summary>

  Uso do conceito de sessão, para guardar variáveis pelo site.
  ```php
  session_start();

    $_SESSION['email'] = $_REQUEST['email'];
    $_SESSION['usuario'] = $usuario['nome'];
    $_SESSION['tipo'] = $usuario['descricao'];
    $_SESSION['id'] = $usuario['id'];

    $url = match($_SESSION['tipo']){
      'admin' => '/projects/crud-php/src/tabela.php',
      'cuidador' => '/projects/crud-php/src/views/cuidador.php',
      default => '/projects/crud-php/src/views/cliente.php'
    };

    header("location: $url");
  ```
</details>

## Considerações finais

PHP é muito versátil na WEB, um tempo atrás ouvi sobre seu uso no Wordpress e fiquei confuso, após aprender o conceito de modularização, utilizando `include`, acredito que grande parte do Wordpress possa ser replicado dessa forma, de forma mínima. 

MySQL, SGBD muito bom para modelar e com abstração das consultas e manipulação do Banco de Dados.

Noções gerais sobre desenvolvimento, o uso de frameworks e bibliotecas possibilitou agilizar o desenvolvimento do sistema.