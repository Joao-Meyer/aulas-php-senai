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
                    <?php
                        if($_SESSION['acessoConteudo'] == '1'){
                            echo("
                                <div class='conteinerMenuItem'>
                                    <a href='adm_conteudo.php'>
                                        <div class='menuItemImagem'>
                                            <img src='./imagens/gerencia_icone_preto_sem_fundo.png' alt='Icone da opção'>
                                        </div>
            
                                        <div class='menuItemNome'>Adm. Conteúdo</div>
                                    </a>
                                </div>
                            ");
                        }

                        if($_SESSION['acessoProduto'] == '1'){
                            echo("
                                <div class='conteinerMenuItem'>
                                    <a href='adm_produtos.php'>
                                        <div class='menuItemImagem'>
                                            <img src='./imagens/comida-rapida.png' alt='Icone da opção'>
                                        </div>
            
                                        <div class='menuItemNome'>Adm. Produtos</div>
                                    </a>
                                </div>
                            ");
                        }

                        if($_SESSION['acessoUsuarios'] == '1'){
                            echo("
                                <div class='conteinerMenuItem'>
                                    <a href='adm_usuarios.php'>
                                        <div class='menuItemImagem'>
                                            <img src='./imagens/reparar_icon.png' alt='Icone da opção'>
                                        </div>
            
                                        <div class='menuItemNome'>Adm. Usuários</div>
                                    </a>
                                </div>
                            ");
                        }

                        if($_SESSION['acessoFaleConosco'] == '1'){
                            echo("
                                <div class='conteinerMenuItem'>
                                    <a href='adm_fale_conosco.php'>
                                        <div class='menuItemImagem'>
                                            <img src='./imagens/mensagem.png' alt='Icone da opção'>
                                        </div>
            
                                        <div class='menuItemNome'>Adm. Fale conosco</div>
                                    </a>
                                </div>
                            ");
                        }
                    ?>
                </div>

                <div id="conteinerMensagemBemVindoLogout">
                    <div id="conteinerMensagemBemVindo" class="fonte1">
                        Bem vindo, 
                        <?php
                            echo($_SESSION['nomeUsuario']);
                        ?>
                    </div>

                    <div id="conteinerLogout" class="fonte1">
                        <a href="../super.php">Logout</a>
                    </div>
                </div>
            </div>