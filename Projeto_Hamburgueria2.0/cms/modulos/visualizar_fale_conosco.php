<?php
    if(isset($_POST['modo'])){
        if($_POST['modo'] == 'visualizar'){
            if(isset($_POST['id'])){
                $id = $_POST['id'];

                require_once('conexaoBD.php');

                $conexao = conexaoMysql();

                $sqlQuerySelect = "select *
                from tblFaleConosco
                where idFaleConosco = " .$id;

                // echo($sqlQuerySelect);

                $selectFaleConosco = mysqli_query($conexao, $sqlQuerySelect);

                if($rsFaleConosco = mysqli_fetch_assoc($selectFaleConosco)){
                    $nome = $rsFaleConosco['nome'];
                    $telefone = $rsFaleConosco['telefone'];
                    $celular = $rsFaleConosco['celular'];
                    $email = $rsFaleConosco['email'];
                    $homePage = $rsFaleConosco['homePage'];
                    $linkFace = $rsFaleConosco['linkFacebook'];
                    $profissao = $rsFaleConosco['profissao'];
                    $intuito = $rsFaleConosco['intuito'];
                    $mensagem = $rsFaleConosco['mensagem'];
                    $genero = $rsFaleConosco['genero'];
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

                <div class="campoModal fonte1">Telefone:</div>

                <div class="campoModal fonte1">Celular:</div>

                <div class="campoModal fonte1">Email:</div>

                <div class="campoModal fonte1">Home page (página pessoal):</div>

                <div class="campoModal fonte1">Link do facebook:</div>

                <div class="campoModal fonte1">Profissão:</div>

                <div class="campoModal fonte1">Intuito:</div>

                <div class="campoModal fonte1">Mensagem:</div>

                <div class="campoModal fonte1">Genero:</div>
            </div>

            <div id="conteinerInformacoes">
                <div class="informacaoModal fonte1"><?=$nome?></div>

                <div class="informacaoModal fonte1"><?=$telefone?></div>

                <div class="informacaoModal fonte1"><?=$celular?></div>

                <div class="informacaoModal fonte1"><?=$email?></div>

                <div class="informacaoModal fonte1"><?=$homePage?></div>

                <div class="informacaoModal fonte1"><?=$linkFace?></div>

                <div class="informacaoModal fonte1"><?=$profissao?></div>

                <div class="informacaoModal fonte1"><?php
                                                                    if($intuito == 'c'){
                                                                        echo('Crítica');
                                                                    }
                                                                    else{
                                                                        echo('Sugestão');
                                                                    }
                                                                ?></div>

                <div class="informacaoModal fonte1"><?=$mensagem?></div>

                <div class="informacaoModal fonte1"><?php
                                                                    if($genero == 'm'){
                                                                        echo('Masculino');
                                                                    }
                                                                    elseif($genero == 'f'){
                                                                        echo('Feminino');
                                                                    }
                                                                    else{
                                                                        echo('Outro');
                                                                    }
                                                                ?></div>
            </div>
        </div>
    </body>
</html>