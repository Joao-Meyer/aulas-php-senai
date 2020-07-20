<?php
/***************************************************** 
    Nome da classe: mysqlConection()
    Objetivo: Criar a conexão com o BD MYSQL
    Data da criação: 06/07/2020
    Autor: João Henrique Parizoti Meyer

    Data da modificação:
    Autor da modificação:
    Conteúdos modificados:
*****************************************************/

    // Classe para conexão com o banco de dados Mysql
    class mysqlConnection {
        // Criação dos atributos da classe
        private $server;
        private $user;
        private $password;
        private $database;

        public function __construct(){
            $this->server = "localhost";
            $this->user = "root";
            $this->password = "bcd127";
            $this->database = "dbContatos20201A";
        }

        // Método para abrir a conexão com o BD
        public function connectDatabase () {
            try{
                // Criando o objeto conexao com a classe PDO
                $conexao = new PDO('mysql:host='.$this->server.';dbname='.$this->database.';', $this->user, $this->password);
            }
            catch (PDOException $Erro) {
                echo("Erro ao abrir a conexão com o banco:<br>Linha: ".$Erro->getline()."<br>Mensagem de erro: ".$Erro->getMessage());
            }

            // Recebe o retorno da conexão
            return $conexao;
        }

        // Método para fechar a conexão com o BD
        public function closeDatabase () {
            $conexao = null;

            // mysqli_close();
        }
    }
?>