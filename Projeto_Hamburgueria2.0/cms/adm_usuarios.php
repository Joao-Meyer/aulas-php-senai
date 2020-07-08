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
            <?php
                require_once('modulos/menu.php');
            ?>

            <div id="conteinerSubmenusGerenciamento">
                <div class="conteinerMenuItem">
                    <a href="pagina_usuarios.php">
                        <div class="menuItemImagem">
                            <img src="./imagens/do_utilizador.png" alt="Icone da opção">
                        </div>

                        <div class="menuItemNome">Usuários</div>
                    </a>
                </div>

                <div class="conteinerMenuItem">
                    <a href="pagina_niveis_acesso.php">
                        <div class="menuItemImagem">
                            <img src="./imagens/habilidades.png" alt="Icone da opção">
                        </div>

                        <div class="menuItemNome">Níveis de acesso</div>
                    </a>
                </div>
            </div>

            <div id="rodape">
                Desenvolvido por João Meyer
            </div>
        </div>
    </body>
</html>