<?php
    require_once('conexaoBD.php');
    $conexao = conexaoMysql();

    if(isset($_POST['btnSubmit'])){
        if($_GET['modo']){
            if($_GET['modo'] == 'inserir'){
                $nome = $_POST['txtNome'];
                $texto = $_POST['textAreaTexto'];
                $endereco = $_POST['txtEndereco'];

                session_start();
                $imagem = $_SESSION['nomeImagem'];

                $sqlQueryInsert = "
                    insert into tblLoja (
                        nomeLoja, enderecoLoja, fotoLoja, textoLoja, visibilidade
                    )
                    values ( '".$nome."', '".$endereco."', '".$imagem."', '".$texto."', '1' );
                ";

                if(mysqli_query($conexao, $sqlQueryInsert)){
                    $url = $_GET['url'];
                    header('location:' . $url);
                }
                else{
                    echo("
                        <script>
                            alert('Erro ao executar o script!);

                            window.history.back();
                        </script>
                    ");
                }
                // echo('<script>
                //     alert("'.$nome.', '.$login.', '.$senha.', '.$nivelAcesso.'");
                // // </script>');
            }
        }
    }
?>