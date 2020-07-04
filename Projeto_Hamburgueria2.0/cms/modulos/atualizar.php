<?php
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'atualizar'){
            if(isset($_POST['btnSubmit'])){
                require_once('conexaoBD.php');
                $conexao = conexaoMysql();

                if($_GET['origem'] == 'adm_conteudo'){

                    $id = $_GET['id'];
                    $imagemAntiga = $_GET['imagemAntiga'];
                    $titulo = $_POST['txtTitulo'];
                    $texto = $_POST['textAreaTexto'];
                    $destino = $_POST['slctDestino'];
                    session_start();
                    $imagem = $_SESSION['nomeImagem'];
                    
                    if($imagem != $imagemAntiga){
                        $sqlQueryAtualizar = "
                            update tblConteudo set
                                titulo = '".$titulo."',
                                imagem = '".$imagem."',
                                texto = '".$texto."',
                                destino = '".$destino."'
                            where idConteudo = ".$id;
                    }
                    else{
                        $sqlQueryAtualizar = "
                        update tblConteudo set
                            titulo = '".$titulo."',
                            texto = '".$texto."',
                            destino = '".$destino."'
                        where idConteudo = ".$id;
                    }

                    echo($sqlQueryAtualizar);

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
                elseif($_GET['origem'] == 'pagina_niveis_acesso'){
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
                else{
                    echo("Pagina de origem não encontrada!");
                }
            }
        }
    }
?>