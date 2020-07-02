<?php
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'atualizar'){
            if(isset($_POST['btnSubmit'])){
                require_once('conexaoBD.php');
                $conexao = conexaoMysql();

                if($_GET['origem'] == 'admConteudo'){
                    $id = $_GET['id'];
                    $titulo = $_POST['txtTitulo'];
                    $texto = $_POST['textAreaTexto'];
                    $destino = $_POST['slctDestino'];

                    // if(){
                    //     $imagem = $_SESSION['nomeImagem'];    
                    // }

                    $sqlQueryAtualizar = "
                        update tblConteudo set
                            titulo = '".$titulo."',
                            imagem = '".$imagem."',
                            texto = '".$texto."',
                            destino = '".$destino."'
                        where idConteudo = ".$id;

                    if(mysqli_query($conexao, $sqlQueryAtualizar)){
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
                elseif($_GET['origem'] == 'pagina_usuarios'){
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

                if($_GET['origem'] == 'pagina_niveis_acesso'){
                    $id = $_GET['id'];

                    $nomeNivel = $_POST['txtNomeNivel'];
                    $acessoConteudo = $_POST['rdoAdmConteudo'];
                    $acessoFaleConosco = $_POST['rdoAdmFaleConosco'];
                    $acessoProduto = $_POST['rdoAdmProduto'];
                    $acessoUsuario = $_POST['rdoAdmUsuario'];

                    $sqlQueryAtualizarNivelAcesso = "
                        update tblNivelAcesso set
                            nomeNivel = '".$nomeNivel."',
                            acessoConteudo = '".$acessoConteudo."',
                            acessoFaleConosco = '".$acessoFaleConosco."',
                            acessoProduto = '".$acessoProduto."',
                            acessoUsuarios = '".$acessoUsuario."'

                        where idNivelAcesso = ".$id;

                    if(mysqli_query($conexao, $sqlQueryAtualizarNivelAcesso)){
                        echo("Foi ".$sqlQueryAtualizarNivelAcesso);
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
    }
?>