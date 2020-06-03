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
                        <div class="menuItemImagem">
                            <img src="./imagens/gerencia_icone_sem_fundo.png" alt="Icone da opção">
                        </div>

                        <div class="menuItemNome">Adm. Conteúdo</div>
                    </div>

                    <div class="conteinerMenuItem">
                        <div class="menuItemImagem">
                            <img src="./imagens/mensagem.png" alt="Icone da opção">
                        </div>

                        <div class="menuItemNome">Adm. Fale conosco</div>
                    </div>

                    <div class="conteinerMenuItem">
                        <div class="menuItemImagem">
                            <img src="./imagens/reparar_icon.png" alt="Icone da opção">
                        </div>

                        <div class="menuItemNome">Adm. Usuários</div>
                    </div>

                    <div class="conteinerMenuItem">
                        <div class="menuItemImagem">
                            <img src="./imagens/mensagem.png" alt="Icone da opção">
                        </div>

                        <div class="menuItemNome">Adm. Fale conosco</div>
                    </div>
                </div>

                <div id="conteinerMensagemBemVindoLogout">
                    <div id="conteinerMensagemBemVindo" class="fonte1">
                        Bem vindo, [XXXX]
                    </div>

                    <div id="conteinerLogout" class="fonte1">Logout</div>
                </div>
            </div>

            <div id="conteinerSubmenusGerenciamento">
                <div class="conteinerSubmenuItem"></div>
            </div>

            <div id="rodape">
                Desenvolvido por João Meyer
            </div>
        </div>
    </body>
</html>