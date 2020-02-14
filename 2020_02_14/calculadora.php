<?php
setlocale(LC_ALL, "pt-BR");

require_once("modulos/constantes.php");

$mensagemDeErro = (string) null;
$valor1 = (float) 0;
$valor2 = (float) 0;
$resultado = (float) 0;

    if (isset($_POST['submitCalcular'])){
        if(!isset($_POST['botaoOperacao'])){
            $mensagemDeErro = ERRO_OPERACAO_NAO_DEFINIDA;
        }
        else{
            $valor1 = str_replace(",", ".", $_POST['textValor1']);
            $valor2 = str_replace(",", ".", $_POST['textValor2']);

            if(empty($valor1) || empty($valor2)){
                $mensagemDeErro = ERRO_CAIXA_VAZIA;

                $valor1 = (float) 0;
                $valor2 = (float) 0;
                $resultado = (float) 0;

            }           
            elseif(!is_numeric($nota1) || !is_numeric($nota2)){
                $mensagemDeErro = ERRO_CARACTERE_INVALIDO;

                $valor1 = (float) 0;
                $valor2 = (float) 0;
                $resultado = (float) 0;
            }
            else{
                $mensagemDeErro = (string) null;
                
                settype($valor1, "float");
                settype($valor2, "float");
                
                switch($operacao){
                    case "somar":
                        $resultado = $valor1 + $valor2;
                        $checkSomar = "checked";
                        break;

                    case "subtrair":
                        $resultado = $valor1 - $valor2;
                        $checkSubtrair = "checked";
                        break;

                    case "multiplicar":
                        $resultado = $valor1 * $valor2;
                        $checkMultiplicar = "checked";
                        break;

                    case "dividir":
                        $resultado = $valor1 / $valor2;
                        $checkDividir = "checked";
                        break;
                }
            }
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
                    <h1>Calculadora</h1>
                </div>
                
                <div id="containerFuncao">
                    <div id="containerEntradaDeDados">
                        <form name="formCalculadora" action="calculadora.php" method="post">
                            <div class="containerInputs">
                                Valor 1:
                                <input type="text" name="textNota1" value="<?=$valor1?>">
                            </div>

                            <div class="containerInputs">
                                Valor 2:
                                <input type="text" name="textNota2" value="<?=$valor2?>">
                            </div>

                            <div class="containerInputs">
                                <input type="radio" name="botaoOperacao" value="somar">SOMAR
                            </div>

                            <div class="containerInputs">
                                <input type="radio" name="botaoOperacao" value="subtrair">SUBTRAIR
                            </div>

                            <div class="containerInputs">
                                <input type="radio" name="botaoOperacao" value="multiplicar">MULTIPLICAR
                            </div>

                            <div class="containerInputs">
                                <input type="radio" name="botaoOperacao" value="dividir">DIVIDIR
                            </div>

                            <div class="containerInputs">
                                <input type="submit" name="submitCalcular" value="Calcular">
                            </div>
                        </form>
                    </div>

                    <div id="containerResultadoMedia">  
                        <h1>Resultado: <?php echo($resultado);?></h1>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
            require_once("modulos/footer.php");
        ?>
    </body>
</html>