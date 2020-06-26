<?php
    if(isset($_POST['modo'])){
        if($_POST['modo'] == 'visualizar'){
            if(isset($_POST['id'])){
                $id = $_POST['id'];

                require_once('conexaoBD.php');

                $conexao = conexaoMysql();

                $sqlQuerySelectUsuario = "select tblUsuario.*
                from tblUsuario
                where idUsuario = " .$id;

                // echo($sqlQuerySelect);

                $querySelectUsuario = mysqli_query($conexao, $sqlQuerySelectUsuario);

                if($rsUsuario = mysqli_fetch_assoc($querySelectUsuario)){
                    $nome = $rsUsuario['nome'];
                    $login = $rsUsuario['login'];
                    $senha = $rsUsuario['senha'];
                    $idNivelAcesso = $rsUsuario['idNivelAcesso'];
                }

                $sqlQuerySelectNivelAcesso = "select tblNivelAcesso.nomeNivel
                from tblNivelAcesso
                where idNivelAcesso = " .$idNivelAcesso;

                $querySelectNivelAcesso = mysqli_query($conexao, $sqlQuerySelectNivelAcesso);

                if($rsNivelAcesso = mysqli_fetch_assoc($querySelectNivelAcesso)){
                    $nomeNivelAcesso = $rsNivelAcesso['nomeNivel'];
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

                <div class="campoModal fonte1">Login:</div>

                <div class="campoModal fonte1">Senha:</div>

                <div class="campoModal fonte1">Nivel Acesso:</div>
            </div>

            <div id="conteinerInformacoes">
                <div class="informacaoModal fonte1"><?=$nome?></div>

                <div class="informacaoModal fonte1"><?=$login?></div>

                <div class="informacaoModal fonte1"><?=$senha?></div>

                <div class="informacaoModal fonte1"><?=$nomeNivelAcesso?></div>
            </div>
        </div>
    </body>
</html>