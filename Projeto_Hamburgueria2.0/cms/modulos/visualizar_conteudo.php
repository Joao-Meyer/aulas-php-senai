<?php
    if(isset($_POST['modo'])){
        if($_POST['modo'] == 'visualizar'){
            if(isset($_POST['id'])){
                $id = $_POST['id'];

                require_once('conexaoBD.php');

                $conexao = conexaoMysql();

                $sqlQuerySelectNivelAcesso = "select tblConteudo.*
                from tblConteudo
                where idConteudo = " .$id;

                // echo($sqlQuerySelect);

                $querySelectNivelAcesso = mysqli_query($conexao, $sqlQuerySelectNivelAcesso);

                if($rsSelect = mysqli_fetch_assoc($querySelectNivelAcesso)){
                    $titulo = $rsSelect['titulo'];
                    $imagem = $rsSelect['imagem'];
                    $texto = $rsSelect['texto'];
                    $visibilidade = $rsSelect['visibilidade'];
                    $destino = $rsSelect['destino'];
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
                <div class="campoModal fonte1">Titulo:</div>

                <div class="campoImagemModal fonte1">Imagem:</div>

                <div class="campoModal fonte1">Visivel:</div>

                <div class="campoModal fonte1">Destino:</div>

                <div class="campoModal fonte1">Texto:</div>
            </div>

            <div id="conteinerInformacoes">
                <div class="informacaoModal fonte1"><?=$titulo?></div>

                <div class="imagemModal">
                    <img src="arquivos/<?=$imagem?>" alt="<?=$imagem?>">
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

                <div class="informacaoModal fonte1">
                    <?php
                        if($destino == 'c'){
                            echo('Curiosidades');
                        }
                        else{
                            echo('Sobre a Empresa');
                        }
                    ?>
                </div>

                <div class="informacaoTextoModal fonte1"><?=$texto?></div>
            </div>
        </div>
    </body>
</html>