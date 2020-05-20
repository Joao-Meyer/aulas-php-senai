<?php
    // Verifica se a variável modo existe no GET
    if (isset($_GET['modo'])){
        // Valida se o conteúdo da variável é para excluir
        if ($_GET['modo'] == 'excluir'){
            // Importa a biblioteca de conexão
            require_once('conexaoBD.php');

            // Abre a conexão com o BD
            $conexao = conexaoMysql();

            if(isset($_GET['id'])){
                // Resgata a variável ID que foi enviada pela página principal
                $id = $_GET['id'];

                // Script de DELETE
                $queryDelete = "delete from tblcontatos where idContato = " . $id . ";";

                //Executa o script no BD
                if(mysqli_query($conexao, $queryDelete)){
                    // Redireciona para a página index
                    header('location:../paginas/intro.php');
                }
            }
        }        
    }
?>