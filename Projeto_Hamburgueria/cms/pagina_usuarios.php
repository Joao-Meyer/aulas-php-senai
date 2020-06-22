<!DOCTYPE html>

<html lang="pt-br">
    <head>
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
                    <form action="" name="formCadastroUsuario" method="post">
                        <input type="text" name="txtNomeUsuario" id="">
                        <input type="text" name="txtLogin" id="">
                        <input type="text" name="txtSenha" id="">
                        Nivel Acesso:
                        <input type="radio" name="radioNivelAcesso" id="">Usar Existente
                        <input type="radio" name="radioNivelAcesso" id="">Criar novo
                        
                        <select name="nivelAcesso" id="">
                            <option value="Teste"></option>
                        </select>

                        <div id="conteinerCadastroNivel">
                            <input type="text" name="txtNomeNivel" id="">
                            <input type="checkbox" name="" id="">Acesso ao adm. Conteúdo
                            <input type="checkbox" name="" id="">Acesso ao adm. Fale Conosco
                            <input type="checkbox" name="" id="">Acesso ao adm. Produto
                            <input type="checkbox" name="" id="">Acesso ao adm. Usuário
                        </div>
                        
                        <input type="submit" name="btnSubmit" value="Registrar">
                    </form>
                </div>

                <form name="formAdmFaleConoscoFiltro" action="./adm_fale_conosco.php?modo=filtrar" method="post">
                    Filtro:
                    <input type="radio" name="inputFiltro" value="a" checked>Todos
                    <input type="radio" name="inputFiltro" value="c">Conteúdo
                    <input type="radio" name="inputFiltro" value="f">Fale Conosco
                    <input type="radio" name="inputFiltro" value="p">Produtos
                    <input type="radio" name="inputFiltro" value="u">Usuários

                    <input type="submit" value="FILTRAR" name="btnFiltrar">
                </form>
                
                <!-- <div class="conteinerSubmenuItem"></div> -->
                <div class="conteinerComentario">
                    <div class="comentarioNome">Nome</div>
                    <div class="comentarioCelular">Login</div>
                    <div class="comentarioEmail">Senha</div>
                    <div class="comentarioIntuito">Nivel Acesso</div>
                </div>

                <?php
                    while($rsSelect = mysqli_fetch_assoc($select)){
                        ?>
                            <div class="conteinerComentario">
                                <div class="comentarioNome"><?=$rsSelect['nome']?></div>
                                <div class="comentarioCelular"><?=$rsSelect['celular']?></div>
                                <div class="comentarioEmail"><?=$rsSelect['email']?></div>
                                <div class="comentarioIntuito"><?php
                                                                    if($rsSelect['intuito'] == 'c'){
                                                                        echo('Crítica');
                                                                    }
                                                                    else{
                                                                        echo('Sugestão');
                                                                    }
                                                                ?></div>
                                <div class="comentarioMensagem"><?=$rsSelect['mensagem']?></div>

                                <a onclick="return confirm('Deseja realmente excluir o registro?');"
                                href="./modulos/deletar.php?modo=excluir&id=<?=$rsSelect['idFaleConosco']?>&tabela=tblFaleConosco&coluna=idFaleConosco&url=<?=$url?>">
                                    <div class="excluir"></div>
                                </a>

                                <div class="visualizar" onclick="visualizarFaleConosco(<?=$rsSelect['idFaleConosco']?>);"></div>
                            </div>
                        <?php
                        // echo($rsSelect['nome']);
                        // echo($rsSelect['telefone']);
                        // echo($rsSelect['celular']);
                        // echo($rsSelect['email']);
                        // echo($rsSelect['homePage']);
                        // echo($rsSelect['linkFacebook']);
                        // echo($rsSelect['profissao']);
                        // echo($rsSelect['intuito']);
                        // echo($rsSelect['mensagem']);
                        // echo($rsSelect['genero']);
                    }
                ?>
            </div>

            <div id="rodape">
                Desenvolvido por João Meyer
            </div>
        </div>
    </body>
</html>