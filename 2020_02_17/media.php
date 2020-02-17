<?php
setlocale(LC_ALL, "pt-BR");

require_once("modulos/funcoes.php");
require_once("modulos/constantes.php");

$mensagemDeErro = (string) null;

$nota1 = (float) 0;
$nota2 = (float) 0;
$nota3 = (float) 0;
$nota4 = (float) 0;
$media = (float) 0;

    if (isset($_POST['submitCalcular'])){
        $nota1 = str_replace(",", ".", $_POST['textNota1']);
        $nota2 = str_replace(",", ".", $_POST['textNota2']);
        $nota3 = str_replace(",", ".", $_POST['textNota3']);
        $nota4 = str_replace(",", ".", $_POST['textNota4']);

        if(empty($nota1) || empty($nota2) || empty($nota3) || empty($nota4)){
            $mensagemDeErro = ERRO_CAIXA_VAZIA;
        }           
        elseif(!is_numeric($nota1) || !is_numeric($nota2) || !is_numeric($nota3) || !is_numeric($nota4)){
            $mensagemDeErro = ERRO_CARACTERE_INVALIDO;
        }
        else{
            settype($nota1, "float");
            settype($nota2, "float");
            settype($nota3, "float");
            settype($nota4, "float");
            
            $media = calculaMedia($nota1, $nota2, $nota3, $nota4);
        }
    }
?>

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
        
        <div id="containerMensagensDeErro"><?php echo($mensagemDeErro);?></div>
        
        <div id="containerPagina">
            <div id="containerMedia">
                <div id="containerTitulo">
                    <h1>Cálculo de média</h1>
                </div>
                
                <div id="containerFuncao">
                    <div id="containerEntradaDeDados">
                        <form name="formCalculoDeMedia" action="media.php" method="post">
                            <div class="containerInputs">
                                Nota 1:
                                <input type="text" name="textNota1" value="<?=$nota1?>">
                            </div>

                            <div class="containerInputs">
                                Nota 2:
                                <input type="text" name="textNota2" value="<?=$nota2?>">
                            </div>

                            <div class="containerInputs">
                                Nota 3:
                                <input type="text" name="textNota3" value="<?=$nota3?>">
                            </div>

                            <div class="containerInputs">
                                Nota 4:
                                <input type="text" name="textNota4" value="<?=$nota4?>">
                            </div>

                            <div class="containerInputs">
                                <input type="submit" name="submitCalcular" value="Calcular">
                            </div>
                        </form>
                    </div>

                    <div id="containerResultadoMedia">
                        <h1>A média é: <?php echo($media);?></h1>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
            require_once("modulos/footer.php");
        ?>
    </body>
</html>