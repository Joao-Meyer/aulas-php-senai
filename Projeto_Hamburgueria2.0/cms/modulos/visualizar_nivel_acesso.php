<?php
    if(isset($_POST['modo'])){
        if($_POST['modo'] == 'visualizar'){
            if(isset($_POST['id'])){
                $id = $_POST['id'];

                require_once('conexaoBD.php');

                $conexao = conexaoMysql();

                $sqlQuerySelectNivelAcesso = "select tblNivelAcesso.*
                from tblNivelAcesso
                where idNivelAcesso = " .$id;

                // echo($sqlQuerySelect);

                $querySelectNivelAcesso = mysqli_query($conexao, $sqlQuerySelectNivelAcesso);

                if($rsNivelAcesso = mysqli_fetch_assoc($querySelectNivelAcesso)){
                    $nomeNivel = $rsNivelAcesso['nomeNivel'];
                    $conteudo = $rsNivelAcesso['acessoConteudo'];
                    $faleConosco = $rsNivelAcesso['acessoFaleConosco'];
                    $produto = $rsNivelAcesso['acessoProduto'];
                    $usuarios = $rsNivelAcesso['acessoUsuarios'];
                }
            }
        }
    }
?>

<html>
    <head>
        <title>Visualizar Contatos</title>

        <?php
            require_once('imports.php');
        ?>
    </head>

    <body>
        <a class="fechar"></a>

        <div id="conteudoModal">
            <div class="tituloModal fonte2">Informações</div>

            <div id="conteinerCampoModal">
                <div class="campoModal fonte1">Nome:</div>

                <div class="campoModal fonte1">Acesso ao adm. Conteúdo:</div>

                <div class="campoModal fonte1">Acesso ao adm. Fale Conosco:</div>

                <div class="campoModal fonte1">Acesso ao adm. Produto:</div>

                <div class="campoModal fonte1">Acesso ao adm. Usuários:</div>
            </div>

            <div id="conteinerInformacoes">
                <div class="informacaoModal fonte1"><?=$nomeNivel?></div>

                <div class="informacaoModal fonte1">
                    <?php
                        if($conteudo == 1){
                            echo('Sim');
                        }
                        else{
                            echo('Não');
                        }
                    ?>
                </div>

                <div class="informacaoModal fonte1">
                    <?php
                        if($faleConosco == 1){
                            echo('Sim');
                        }
                        else{
                            echo('Não');
                        }
                    ?>
                </div>

                <div class="informacaoModal fonte1">
                    <?php
                        if($produto == 1){
                            echo('Sim');
                        }
                        else{
                            echo('Não');
                        }
                    ?>
                </div>

                <div class="informacaoModal fonte1">
                    <?php
                        if($usuarios == 1){
                            echo('Sim');
                        }
                        else{
                            echo('Não');
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>