<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <title>Doug Funni's Burgers</title>
    
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div id="containerCabecalho">
        <div id="cabecalho">
            <div id="logo"></div>

            <nav id="menu">
                <ul>
                    <li class="menuItem">Menu</li>

                    <li class="menuItem">Menu</li>

                    <li class="menuItem">Menu</li>

                    <li class="menuItem">Menu</li>

                    <li class="menuItem">Menu</li>

                    <li class="menuItem">Menu</li>

                    <li class="menuItem">Menu</li>
                </ul>
            </nav>

            <div id="campoDeLogin">
                <form action="" method="post">
                    <div id="containerUsuario">
                        <div id="textoUsuario">Usuário:</div>

                        <div id="campoUsuario"></div>
                    </div>

                    <div id="containerSenha">
                        <div id="textoSenha">Senha:</div>

                        <div id="campoSenha"></div>
                    </div>

                    <div class="conteinerBotao">
                        <button type="submit" class="botaoSubmit"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>  

    <div id="conteudoPagina">
        <?php
            require_once('modulos/menu.php');
        ?>
    </div>
</body>
</html>