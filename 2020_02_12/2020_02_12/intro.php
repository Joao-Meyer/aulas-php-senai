
<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <title>Exercicios</title>
        <meta charset="utf-8">
        
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">        
    </head>
    
    <body>
        <?php
            require_once("modulos/menu.php");
        ?>
        
        <div id="containerPagina">
            <div id="containerMedia">
                <div id="containerTitulo">
                    <h1>Cálculo de média</h1>
                </div>
                
                <div id="containerFuncao">
                    <div id="containerEntradaDeDados">
                        <form name="formCalculoDeMedia" action="intro.php" method="post">
                            <div class="containerInputs">
                                Nota 1:
                                <input type="text" name="textNota1" value="nota1">
                            </div>

                            <div class="containerInputs">
                                Nota 2:
                                <input type="text" name="textNota1" value="nota2">
                            </div>

                            <div class="containerInputs">
                                Nota 3:
                                <input type="text" name="textNota1" value="nota3">
                            </div>

                            <div class="containerInputs">
                                Nota 4:
                                <input type="text" name="textNota1" value="nota4">
                            </div>

                            <div class="containerInputs">
                                <input type="submit" name="submitCalcular" value="Calcular">
                            </div>
                        </form>
                    </div>

                    <div id="containerResultadoMedia">
                        <h1>A média é: </h1>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
            require_once("modulos/footer.php");
        ?>
    </body>
</html>