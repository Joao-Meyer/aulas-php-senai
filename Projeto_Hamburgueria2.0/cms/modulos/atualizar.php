<?php
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'atualizar'){
            require_once('conexaoBD.php');

            $conexao = conexaoMysql();

            if(isset($_POST['btnSubmit'])){
                $id = $_GET['id'];

                $nome = $_POST['txtNomeUsuario'];
                $login = $_POST['txtLogin'];
                $senha = $_POST['txtSenha'];
                $idNivelAcesso = $_POST['slctNivelAcesso'];

                $sqlQueryAtualizarUsuario = "
                    update tblUsuario set
                        nome = '".$nome."',
                        login = '".$login."',
                        senha = '".$senha."',
                        idNivelAcesso = '".$idNivelAcesso."'

                    where idUsuario = ".$id;

                if(mysqli_query($conexao, $sqlQueryAtualizarUsuario)){
                    $url = $_GET['url'];
                    echo($url);
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
            }
        }
    }
?>