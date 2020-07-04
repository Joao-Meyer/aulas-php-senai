<?php
    require_once('conexaoBD.php');
    $conexao = conexaoMysql();

    if(isset($_POST['btnSubmit'])){
        if($_GET['modo']){
            if($_GET['modo'] == 'inserir'){
                $titulo = $_POST['txtTitulo'];
                $texto = $_POST['textAreaTexto'];
                $destino = $_POST['slctDestino'];

                session_start();
                $imagem = $_SESSION['nomeImagem'];

                $sqlQueryInsert = "
                    insert into tblConteudo ( titulo, imagem, texto, visibilidade, destino )
                        values ( '".$titulo."', '".$imagem."', '".$texto."', '1', '".$destino."' );
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