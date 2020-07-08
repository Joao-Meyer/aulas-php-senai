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
                    <a href="pagina_conteudos.php">
                        <div class="menuItemImagem">
                            <img src="./imagens/conteudo.png" alt="Icone da opção">
                        </div>

                        <div class="menuItemNome">Conteúdos</div>
                    </a>
                </div>

                <div class="conteinerMenuItem">
                    <a href="pagina_lojas.php">
                        <div class="menuItemImagem">
                            <img src="./imagens/loja.png" alt="Icone da opção">
                        </div>

                        <div class="menuItemNome">Lojas</div>
                    </a>
                </div>
            </div>

            <div id="rodape">
                Desenvolvido por João Meyer
            </div>
        </div>
    </body>
</html>