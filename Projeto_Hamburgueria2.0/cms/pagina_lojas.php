<?php
    require_once('modulos/conexaoBD.php');
    $conexao = conexaoMysql();

    $dominio= $_SERVER['HTTP_HOST'];
    $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];

    if(isset($_POST['btnFiltrar'])){
        if($_GET['modo']){
            if($_GET['modo'] == 'filtrar'){
                $filtro = $_POST['inputFiltro'];

                switch($filtro){
                    case "v":
                        $sqlQuerySelect = "select * from tblLoja
                            where tblLoja.visibilidade = 1
                            order by tblLoja.nomeLoja";
                    break;

                    case "n":
                        $sqlQuerySelect = "select * from tblLoja
                            where tblLoja.visibilidade = 0
                            order by tblLoja.nomeLoja";
                    break;

                    default:
                        $sqlQuerySelect = "select * from tblLoja order by tblLoja.nomeLoja";
                    break;
                }
            }
        }
    }
    else{
        $sqlQuerySelect = "select * from tblLoja order by tblLoja.nomeLoja";
    }

    $nome =  null;
    $imagem = null;
    $texto = null;
    $endereco = null;

    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'editar'){
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $querySelectConteudo = "
                    select *
                    from tblLoja
                    where tblLoja.idLoja = ".$id;
                
                $selectDados = mysqli_query($conexao, $querySelectConteudo);

                if($rsDados = mysqli_fetch_assoc($selectDados)){
                    $idLoja = $rsDados['idLoja'];
                    $nome =  $rsDados['nomeLoja'];
                    $imagemAntiga = $rsDados['fotoLoja'];
                    $imagem = $imagemAntiga;
                    $texto = $rsDados['textoLoja'];
                    $endereco = $rsDados['enderecoLoja'];

                    $action = "modulos/atualizar.php?modo=atualizar&origem=pagina_lojas&imagemAntiga=".$imagemAntiga."&id=".$idLoja."&url=".$url;
                }
            }
        }   
    }
    else{
        $action = "modulos/inserir_loja.php?modo=inserir&url=".$url;
    }

    $select = mysqli_query($conexao, $sqlQuerySelect);
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CMS</title>

        <?php
            require_once('modulos/imports.php');
        ?>
    </head>

    <body>
        <div id="modal">
            <div id="modalConteudo">
            </div>
        </div>

        <div id="conteinerCMS">
            <?php
                require_once('modulos/menu.php');
            ?>

            <div id="conteinerSubmenusGerenciamento">
                <div class="conteinerCadastro">
                    <div class="tituloCadastro">Cadastro Conteúdo</div>

                    <form action="modulos/uploadImagem.php" name="formImagem" id="formImagem" method="POST" enctype="multipart/form-data">
                        <div class="inputBox">
                            Imagem: <input type="file" name="fleImagem" id="inputImagem" accept="image/png, image/gif, image/jpg, image/jpeg" value="<?=$imagem?>">
                        </div>

                        <div id="visualizarImagem">
                            <?php
                                if($imagem != null){
                                    echo("<img src='arquivos/" . $imagem . "'>");
                                }
                            ?>
                        </div>
                    </form>
                    
                    <form action="<?=$action?>" name="formAdmConteudo" id="formAdmConteudo" method="post" enctype="multipart/form-data">
                        <div class="inputBox">
                            Nome da Loja: <input type="text" name="txtNome" value="<?=$nome?>">
                        </div>

                        <div class="inputBox">
                            Endereco: <input type="text" name="txtEndereco" value="<?=$endereco?>">
                        </div>

                        <div class="inputBox">
                            Texto: 
                            <textarea name="textAreaTexto" id="" cols="30" rows="10"><?=$texto?></textarea>
                        </div>
                    
                        <div class="botaoRegistrar">
                            <input type="submit" name="btnSubmit" value="Registrar">
                        </div>
                    </form>
                </div>

                <form name="formAdmFaleConoscoFiltro" action="pagina_lojas.php?modo=filtrar" method="post">
                    Filtro:
                    <input type="radio" name="inputFiltro" value="a" checked>Todos
                    <input type="radio" name="inputFiltro" value="v">Visivel
                    <input type="radio" name="inputFiltro" value="n">Não visivel
                    <input type="submit" value="filtrar" name="btnFiltrar">
                </form>
                
                <!-- <div class="conteinerSubmenuItem"></div> -->
                <div class="conteinerComentario">
                    <div class="lojaNome">Nome</div>
                    <div class="lojaImagem">Imagem</div>
                    <div class="lojaEndereco">Endereço</div>
                    <div class="lojaTexto">Texto</div>
                    <div class="conteudoVisivel">Visivel</div>
                </div>

                <?php
                    while($rsSelect = mysqli_fetch_assoc($select)){
                        ?>
                            <div class="conteinerComentario">
                                <div class="lojaNome"><?=$rsSelect['nomeLoja']?></div>
                                <div class="lojaImagem">
                                    <img src="arquivos/<?=$rsSelect['fotoLoja']?>" class="imagens">
                                </div>
                                <div class="lojaEndereco"><?=$rsSelect['enderecoLoja']?></div>
                                <div class="lojaTexto"><?=$rsSelect['textoLoja']?></div>
                                <div class="conteudoVisivel">
                                    <?php
                                        if( ($rsSelect['visibilidade']) == '1' ){
                                            echo("<img src='imagens/positivo.png' onclick=".'"'."mudarVisibilidade('".$rsSelect['idLoja']."','".$rsSelect['visibilidade']."', 'pagina_lojas', '".$url."')".'"'." class='visibilidadeIcone coloreVerde'>");
                                        }
                                        else{
                                            echo("<img src='imagens/negativo.png' onclick=".'"'."mudarVisibilidade('".$rsSelect['idLoja']."','".$rsSelect['visibilidade']."', 'pagina_lojas', '".$url."')".'"'." class='visibilidadeIcone coloreVermelho'>");
                                        }
                                    ?>
                                </div>

                                <a onclick="return confirm('Deseja realmente excluir o registro?');"
                                href="./modulos/deletar.php?modo=excluir&id=<?=$rsSelect['idLoja']?>&imagem=<?=$rsSelect['fotoLoja']?>&origem=pagina_lojas&url=<?=$url?>">
                                    <div class="excluir"></div>
                                </a>

                                <div class="visualizar" onclick="visualizarLoja(<?=$rsSelect['idLoja']?>);"></div>

                                <a href="pagina_lojas.php?modo=editar&id=<?=$rsSelect['idLoja']?>">
                                    <div class="editar"></div>
                                </a>
                            </div>
                        <?php
                    }   
                ?>
            </div>

            <div id="rodape">
                Desenvolvido por João Meyer
            </div>
        </div>
    </body>
</html>