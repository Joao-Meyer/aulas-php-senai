<?php
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'inserir'){
            require_once('conexaoBD.php');
            $conexao = conexaoMysql();

            if(isset($_POST['btnEnviar'])){
                $nome = $_POST['inputNome'];
                $telefone = $_POST['inputTelefone'];
                $celular = $_POST['inputCelular'];
                $email = $_POST['inputEmail'];
                $homePage = $_POST['inputHomePage'];
                $facebook = $_POST['inputFacebook'];
                $profissao = $_POST['inputProfissao'];
                $intuito = $_POST['inputIntuito'];
                $mensagem = $_POST['inputMensagem'];
                $genero = $_POST['inputSexo'];

                $queryInsertOpiniao = "insert into tblFaleConosco (
                    nome, telefone, celular, email, homePage,
                    linkFacebook, profissao, intuito, mensagem, genero
                )
                values (
                    '".$nome."', '".$telefone."', '".$celular."', '".$email."',
                    '".$homePage."', '".$facebook."', '".$profissao."', '".$intuito."',
                    '".$mensagem."', '".$genero."'
                );";
            }
        }
    }
?>