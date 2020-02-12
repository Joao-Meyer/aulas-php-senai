<?php

    // isset - Verifica a existência de uma variável ou objeto.
    if(isset($_GET['btnCalcular'])){

        // Resgata os valores digitados pelo usuário ($_GET).
        $n1 = $_GET['txtNota1'];

        $n2 = $_GET['txtNota2'];

        $n3 = $_GET['txtNota3'];

        $n4 = $_GET['txtNota4'];

        // Processamento do cálculo "Média".
        $media = ($n1 + $n2 + $n3 + $n4) / 4;
    }
    else {
        // Inicializa as variáveis em 0 ou vazio.
        
        $n1 = 0;
        $n2 = 0;
        $n3 = 0;
        $n4 = 0;
        $media = 0;
    }
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <title> Media </title>
        
        <meta charset="utf-8">
        
        <style>
            h1{
                color: white;
                margin: 0;
                padding: 0;
            }
            
            .janelaMedia{
                width: 700px;
                height: 500px;
                /*background-color: blue;*/
                margin: auto;
                margin-top: 150px;
                border: solid 2px black;
            }
            
            .cabecalho{
                width: inherit;
                height: 100px;
                background-color: black;
            }
            
            .dados {
                width: inherit;
                height: 300px;
                padding-top: 50px;
                box-sizing: border-box;
            }
            
            .seguraDados {
                width: 250px;
                min-height: 50px;
                height: auto;
                margin-left: auto;
                margin-right: auto;
            }
            
            .resultado {
                width: inherit;
                height: 100px;
                background-color: deepskyblue;
            }
        </style>
    </head>
    
    <body>
        <div class="janelaMedia">
            <div class="cabecalho">
                <h1> Cálculo de Médias </h1>
            </div>
            
            <div class="dados">
                <form name="frmCalculoDeMedia" action="index.php" method="get">
                    <div class="seguraDados">
                        Nota 1:
                            <input type="text" name="txtNota1" value="<?=$n1?>">

                        <br><br>

                        Nota 2:
                            <input type="text" name="txtNota2" value="<?=$n2?>">

                        <br><br>

                        Nota 3:
                            <input type="text" name="txtNota3" value="<?=$n3?>">

                        <br><br>

                        Nota 4:
                            <input type="text" name="txtNota4" value="<?=$n4?>">

                        <br><br>

                        <input type="submit" name="btnCalcular" value="Calcular">
                    </div>
                </form>
            </div>
            
            <div class="resultado">
                <h1> A média é: <?php echo($media); ?></h1>
            </div>
        </div> 
    </body>
</html>