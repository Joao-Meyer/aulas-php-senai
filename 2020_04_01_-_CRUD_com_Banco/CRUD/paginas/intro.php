<?php
    /* Conexão com o Banco de Dados
            Temos 3 bibliotecas de conexão com o Mysql

            mysql_connect() - Biblioteca de conexão mais antiga nas versões do PHP
                (apenas conexão estruturada)
                    mysql_connect(server, user, password)
                    mysql_select_db(databaseName)

            mysqli_connect() - Biblioteca mais atualizada
                (permite realizar uma conexão de forma estruturada e orientada a objetos)
                    mysqli_connect(server, user, password, databaseName)

            PDO - Biblioteca com muito mais recursos de conexão e é específica para orientação a objetos
                (tem um nivel de segurança mais atualizado)
    */

    /* Realiza a conexão com o Banco de Dados Mysql */
    $conexao = mysqli_connect('localhost', 'root', 'bcd127', 'dbContatos20201A');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD-Contatos</title>

    <?php
        require_once('../modulos/imports.php');
    ?>
</head>
<body>
    <?php
        require_once('../modulos/header.php');
    ?>
    
    <?php
        require_once('../modulos/cadastro.php');
    ?>

    <?php
        require_once('../modulos/consulta.php');
    ?>

    <?php
        require_once('../modulos/footer.php');
    ?>
</body>
</html>