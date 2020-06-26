<?php
    require_once('conexaoBD.php');
    $conexao = conexaoMysql();

    if(isset($_POST['btnSubmit'])){
        if($_GET['modo']){
            if($_GET['modo'] == 'inserir'){
                $nomeNivel = $_POST['txtNomeNivel'];
                $acessoConteudo = $_POST['rdoAdmConteudo'];
                $acessoFaleConosco = $_POST['rdoAdmFaleConosco'];
                $acessoProduto = $_POST['rdoAdmProduto'];
                $acessoUsuario = $_POST['rdoAdmUsuario'];

                $sqlQueryInsert = "
                    insert into tblNivelAcesso ( nomeNivel, acessoConteudo, acessoFaleConosco,
                                                 acessoProduto, acessoUsuarios )
                        values ( '".$nomeNivel."', '".$acessoConteudo."', '".$acessoFaleConosco."',
                         '".$acessoProduto."', '".$acessoUsuario."' );
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
            }
        }
    }
?>