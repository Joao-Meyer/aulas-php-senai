<?php
    require_once('modulos/conexaoBD.php');
    $conexao = conexaoMysql();

    $dominio= $_SERVER['HTTP_HOST'];
    $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];

    $titulo =  null;
    $imagem = null;
    $texto = null;
    $destino = null;

    $sqlQuerySelect = "select * from tblConteudo order by tblConteudo.titulo";

    $select = mysqli_query($conexao, $sqlQuerySelect);

    $action = "modulos/inserir_conteudo.php?modo=inserir&url=".$url;
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
        <div id="conteinerCMS">
            <div id="conteinerCabecalho">
                <div id="conteinerNomeSistema" class="fonte2">
                    CMS - Sistema de Gerenciamento do Site
                </div>

                <div id="conteinerImagemSistema">
                    <img src="./imagens/gerencia_logo_sem_fundo.png" alt="Logo do Sistema">
                </div>
            </div>

            <div id="conteinerMenusGerenciamento">
                <div id="conteinerMenuItens">
                    <div class="conteinerMenuItem">
                        <a href="adm_conteudo.php">
                            <div class="menuItemImagem">
                                <img src="./imagens/gerencia_icone_preto_sem_fundo.png" alt="Icone da opção">
                            </div>

                            <div class="menuItemNome">Adm. Conteúdo</div>
                        </a>
                    </div>

                    <div class="conteinerMenuItem">
                        <a href="adm_produtos.php">
                            <div class="menuItemImagem">
                                <img src="./imagens/comida-rapida.png" alt="Icone da opção">
                            </div>

                            <div class="menuItemNome">Adm. Produtos</div>
                        </a>
                    </div>

                    <div class="conteinerMenuItem">
                        <a href="adm_usuarios.php">
                            <div class="menuItemImagem">
                                <img src="./imagens/reparar_icon.png" alt="Icone da opção">
                            </div>

                            <div class="menuItemNome">Adm. Usuários</div>
                        </a>
                    </div>

                    <div class="conteinerMenuItem">
                        <a href="adm_fale_conosco.php">
                            <div class="menuItemImagem">
                                <img src="./imagens/mensagem.png" alt="Icone da opção">
                            </div>

                            <div class="menuItemNome">Adm. Fale conosco</div>
                        </a>
                    </div>
                </div>

                <div id="conteinerMensagemBemVindoLogout">
                    <div id="conteinerMensagemBemVindo" class="fonte1">
                        Bem vindo, [XXXX]
                    </div>

                    <div id="conteinerLogout" class="fonte1">
                        <a href="../super.php">Logout</a>
                    </div>
                </div>
            </div>

            <div id="conteinerSubmenusGerenciamento">
                <!-- <div class="conteinerMenuItem">
                    <a href="pagina_curiosidades.php">
                        <div class="menuItemImagem">
                            <img src="./imagens/curiosidade.png" alt="Icone da opção">
                        </div>

                        <div class="menuItemNome">Curiosidades</div>
                    </a>
                </div>

                <div class="conteinerMenuItem">
                    <a href="pagina_curiosidades.php">
                        <div class="menuItemImagem">
                            <img src="./imagens/curiosidade.png" alt="Icone da opção">
                        </div>

                        <div class="menuItemNome">Curiosidades</div>
                    </a>
                </div>

                <div class="conteinerMenuItem">
                    <a href="pagina_curiosidades.php">
                        <div class="menuItemImagem">
                            <img src="./imagens/curiosidade.png" alt="Icone da opção">
                        </div>

                        <div class="menuItemNome">Curiosidades</div>
                    </a>
                </div> -->

                
                <div class="conteinerCadastro">
                    <div class="tituloCadastro">Cadastro Conteúdo</div>

                    <form action="modulos/uploadImagem.php" name="formImagem" id="formImagem" method="POST" enctype="multipart/form-data">
                        <div class="inputBox">
                            Imagem: <input type="file" name="fleImagem" id="inputImagem" accept="image/png, image/gif, image/jpg, image/jpeg" value="<?=$imagem?>">
                        </div>

                        <div id="visualizarImagem"></div>
                    </form>
                    
                    <form action="<?=$action?>" name="formAdmConteudo" id="formAdmConteudo" method="POST" enctype="multipart/form-data">
                        <div class="inputBox">
                            Titulo: <input type="text" name="txtTitulo" value="<?=$titulo?>">
                        </div>

                        <div class="inputBox">
                            Texto: 
                            <textarea name="textAreaTexto" id="" cols="30" rows="10"><?=$texto?></textarea>
                        </div>

                        <div class="inputBox">
                            Destino:
                            <select name="slctDestino">
                                <option value="c">Curiosidades</option>
                                <option value="s">Sobre a Empresa</option>
                            </select>
                        </div>
                    
                        <div class="botaoRegistrar">
                            <input type="submit" name="btnSubmit" value="Registrar">
                        </div>
                    </form>
                </div>

                <form name="formAdmFaleConoscoFiltro" action="pagina_usuarios.php?modo=filtrar" method="post">
                    Filtro:
                    <input type="radio" name="inputFiltro" value="a" checked>Todos
                    <input type="radio" name="inputFiltro" value="c">Conteúdo
                    <input type="radio" name="inputFiltro" value="f">Fale Conosco
                    <input type="radio" name="inputFiltro" value="p">Produtos
                    <input type="radio" name="inputFiltro" value="u">Usuários

                    <input type="submit" value="filtrar" name="btnFiltrar">
                </form>
                
                <!-- <div class="conteinerSubmenuItem"></div> -->
                <div class="conteinerComentario">
                    <div class="conteudoTitulo">Título</div>
                    <div class="conteudoImagem">Imagem</div>
                    <div class="conteudoDestino">Destino</div>
                    <div class="conteudoTexto">Texto</div>
                </div>

                <?php
                    while($rsSelect = mysqli_fetch_assoc($select)){
                        ?>
                            <div class="conteinerComentario">
                                <div class="conteudoTitulo"><?=$rsSelect['titulo']?></div>
                                <div class="conteudoImagem">
                                    <img src="arquivos/<?=$rsSelect['imagem']?>" class="imagens">
                                </div>
                                <div class="conteudoDestino"><?=$rsSelect['destino']?></div>
                                <div class="conteudoTexto"><?=$rsSelect['texto']?></div>

                                <a onclick="return confirm('Deseja realmente excluir o registro?');"
                                href="./modulos/deletar.php?modo=excluir&id=<?=$rsSelect['idConteudo']?>&tabela=tblUsuario&coluna=idUsuario&url=<?=$url?>">
                                    <div class="excluir"></div>
                                </a>

                                <div class="visualizar" onclick="visualizarUsuario(<?=$rsSelect['idConteudo']?>);"></div>

                                <a href="pagina_usuarios.php?modo=editar&id=<?=$rsSelect['idConteudo']?>">
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