<?php
    if(isset($_POST['modo'])){
        if($_POST['modo'] == 'visualizar'){
            if(isset($_POST['id'])){
                $id = $_POST['id'];

                require_once('conexaoBD.php');

                $conexao = conexaoMysql();

                $sqlQuerySelectNivelAcesso = "select tblLoja.*
                from tblLoja
                where idLoja = " .$id;

                // echo($sqlQuerySelect);

                $querySelectNivelAcesso = mysqli_query($conexao, $sqlQuerySelectNivelAcesso);

                if($rsSelect = mysqli_fetch_assoc($querySelectNivelAcesso)){
                    $nomeLoja = $rsSelect['nomeLoja'];
                    $fotoLoja = $rsSelect['fotoLoja'];
                    $textoLoja = $rsSelect['textoLoja'];
                    $visibilidade = $rsSelect['visibilidade'];
                    $enderecoLoja = $rsSelect['enderecoLoja'];
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
                <div class="campoModal fonte1">Nome da Loja:</div>

                <div class="campoImagemModal fonte1">Foto da Loja:</div>

                <div class="campoModal fonte1">Visivel:</div>

                <div class="campoModal fonte1">Endereço da Loja:</div>

                <div class="campoModal fonte1">Texto:</div>
            </div>

            <div id="conteinerInformacoes">
                <div class="informacaoModal fonte1"><?=$nomeLoja?></div>

                <div class="imagemModal">
                    <img src="arquivos/<?=$fotoLoja?>" alt="<?=$fotoLoja?>">
                </div>

                <div class="informacaoModal fonte1">
                    <?php
                        if($visibilidade == 1){
                            echo('Sim');
                        }
                        else{
                            echo('Não');
                        }
                    ?>
                </div>

                <div class="informacaoModal fonte1"><?=$enderecoLoja?></div>

                <div class="informacaoTextoModal fonte1"><?=$textoLoja?></div>
            </div>
        </div>
    </body>
</html>