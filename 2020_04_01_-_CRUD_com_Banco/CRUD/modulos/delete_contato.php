<?php
    // Importa a biblioteca de conexão
     require_once('conexaoBD.php');

     // Abre a conexão com o BD
     $conexao = conexaoMysql();

     // Resgata a variável ID que foi enviada pela página principal
     $id = $_GET['id'];

     // Script de DELETE
     $queryDelete = "delete from tblcontatos where idContato = 6;"

     //Executa o script no BD
     mysqli_query($conexao, $queryDelete);
?>