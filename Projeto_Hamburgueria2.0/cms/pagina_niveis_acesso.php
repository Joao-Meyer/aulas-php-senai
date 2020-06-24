<?php
    require_once('modulos/conexaoBD.php');
    $conexao = conexaoMysql();

    $dominio= $_SERVER['HTTP_HOST'];
    $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];

    $sqlQuerySelectNiveis = "select * from tblNivelAcesso;";

    $querySelectNiveis = mysqli_query($conexao, $sqlQuerySelectNiveis);
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
                <div class="conteinerCadastro">
                    <div class="tituloCadastro">Cadastro Nivel</div>

                    Nome do novo nível:
                    <input type="text" name="txtNomeNivel" required>
                    <div class="inputBox">
                        <input type="checkbox" name="cbxAdmConteudo">Acesso ao adm. Conteúdo
                    </div>

                    <div class="inputBox">
                        <input type="checkbox" name="cbxAdmFaleConosco">Acesso ao adm. Fale Conosco
                    </div>

                    <div class="inputBox">
                        <input type="checkbox" name="cbxAdmProduto">Acesso ao adm. Produto
                    </div>

                    <div class="inputBox">
                        <input type="checkbox" name="cbxAdmUsuario">Acesso ao adm. Usuário
                    </div>
                </div>

                <form name="formAdmNiveisAcessoFiltro" action="pagina_usuarios.php?modo=filtrar" method="post">
                    Filtro:
                    <input type="radio" name="inputFiltro" value="a" checked>Todos
                    <input type="radio" name="inputFiltro" value="c">Conteúdo
                    <input type="radio" name="inputFiltro" value="f">Fale Conosco
                    <input type="radio" name="inputFiltro" value="p">Produtos
                    <input type="radio" name="inputFiltro" value="u">Usuários

                    <input type="submit" value="filtrar" name="btnFiltrar">
                </form>
                
                <div class="conteinerComentario">
                    <div class="nivelAcessoNome">Nome Nivel</div>
                    <div class="nivelAcessoPermissao">Acesso Conteúdo</div>
                    <div class="nivelAcessoPermissao">Acesso Fale Conosco</div>
                    <div class="nivelAcessoPermissao">Acesso Produto</div>
                    <div class="nivelAcessoPermissao">Acesso Usuário</div>
                </div>

                <?php
                    while($rsSelect = mysqli_fetch_assoc($querySelectNiveis)){
                        ?>
                            <div class="conteinerComentario">
                                <div class="nivelAcessoNome"><?=$rsSelect['nomeNivel']?></div>

                                <div class="nivelAcessoPermissao">
                                    <?php
                                        if($rsSelect['acessoConteudo'] == 1){
                                            echo('Sim');
                                        }
                                        else{
                                            echo('Não');
                                        }
                                    ?>
                                </div>

                                <div class="nivelAcessoPermissao">
                                    <?php
                                        if($rsSelect['acessoFaleConosco'] == 1){
                                            echo('Sim');
                                        }
                                        else{
                                            echo('Não');
                                        }
                                    ?>
                                </div>

                                <div class="nivelAcessoPermissao">
                                    <?php
                                        if($rsSelect['acessoProduto'] == 1){
                                            echo('Sim');
                                        }
                                        else{
                                            echo('Não');
                                        }
                                    ?>
                                </div>

                                <div class="nivelAcessoPermissao">
                                    <?php
                                        if($rsSelect['acessoUsuarios'] == 1){
                                            echo('Sim');
                                        }
                                        else{
                                            echo('Não');
                                        }
                                    ?>
                                </div>

                                <a onclick="return confirm('Deseja realmente excluir o registro?');"
                                href="modulos/deletar.php?modo=excluir&id=<?=$rsSelect['idNivelAcesso']?>&tabela=tblNivelAcesso&coluna=idNivelAcesso&url=<?=$url?>">
                                    <div class="excluir"></div>
                                </a>

                                <div class="visualizar" onclick="visualizarFaleConosco(<?=$rsSelect['idUsuario']?>);"></div>

                                <a href="pagina_usuarios.php?modo=editar&id=<?=$rsSelect['idUsuario']?>">
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