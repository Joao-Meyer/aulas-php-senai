<?php
    if(isset($_GET['origem'])){
        if($_GET['origem'] == 'admConteudo'){
            if (isset($_GET['modo'])){
                if ($_GET['modo'] == 'excluir'){
                    require_once('conexaoBD.php');
                    $conexao = conexaoMysql();
        
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
        
                        $sqlQueryDelete = "delete from tblConteudo where idConteudo = " . $id . ";";
                        
                        if(mysqli_query($conexao, $sqlQueryDelete)){
                            unlink('../arquivos/'.$_GET['imagem']);
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
        elseif($_GET['origem'] == 'pagina_lojas'){
            if (isset($_GET['modo'])){
                if ($_GET['modo'] == 'excluir'){
                    require_once('conexaoBD.php');
                    $conexao = conexaoMysql();
        
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
        
                        $sqlQueryDelete = "delete from tblLoja where idLoja = " . $id . ";";
                        
                        if(mysqli_query($conexao, $sqlQueryDelete)){
                            unlink('../arquivos/'.$_GET['imagem']);
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
    }
    else{
        if (isset($_GET['modo'])){
            if ($_GET['modo'] == 'excluir'){
                require_once('conexaoBD.php');
    
                $conexao = conexaoMysql();
    
                if(isset($_GET['id']) && isset($_GET['coluna']) && isset($_GET['tabela'])){
    
                    // echo("
                    //     <script>
                    //         alert('". $_GET['id'] . " " . $_GET['tabela'] . " " . $_GET['coluna'] ."');
    
                    //         window.history.back();
                    //     </script>
                    // ");
                    $id = $_GET['id'];
                    $tabela = $_GET['tabela'];
                    $coluna = $_GET['coluna'];
    
                    $sqlQueryDelete = "delete from " . $tabela . " where " . $coluna . " = " . $id . ";";
    
                    echo($sqlQueryDelete);
                    if(mysqli_query($conexao, $sqlQueryDelete)){
                        // echo("
                        //     <script>
                        //         alert('Registro removido com sucesso');
                        //     </script>
                        // ");
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