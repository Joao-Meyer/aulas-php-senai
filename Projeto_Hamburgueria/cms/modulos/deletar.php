<?php
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
?>