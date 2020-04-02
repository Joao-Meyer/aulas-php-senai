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

    function conexaoMysql(){
        $server = 'localhost';
        $user = 'root';
        $password = 'bcd127';
        $database = 'dbContatos20201A';

        /* Realiza a conexão com o Banco de Dados Mysql */
        $conexao = mysqli_connect($server, $user, $password, $database);

        // Comando para ver se a conexão foi realizada
        //var_dump($conexao);

        return $conexao;
    }
?>