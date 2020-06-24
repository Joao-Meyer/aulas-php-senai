<?php
    require_once('conexaoBD.php');
    $conexao = conexaoMysql();

    if(isset($_POST['btnSubmit'])){
        if($_GET['modo']){
            if($_GET['modo'] == 'inserir'){
                $nome = $_POST['txtNomeUsuario'];
                $login = $_POST['txtLogin'];
                $senha = $_POST['txtSenha'];
                $idNivelAcesso = $_POST['slctNivelAcesso'];

                $sqlQueryInsert = "
                    insert into tblUsuario ( nome, login, senha, idNivelAcesso )
                        values ( '".$nome."', '".$login."', '".$senha."', '".$idNivelAcesso."' );
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
                // </script>');
            }
        }
    }
?>