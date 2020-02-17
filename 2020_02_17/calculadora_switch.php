<?php
setlocale(LC_ALL, "pt-BR");

require_once("modulos/funcoes.php");
require_once("modulos/constantes.php");

$mensagemDeErro = (string) null;
$valor1 = (float) 0;
$valor2 = (float) 0;
$resultado = (float) 0;
$operacao = (string) null;

    if (isset($_POST['submitCalcular'])){
        if(!isset($_POST['botaoOperacao'])){
            $mensagemDeErro = ERRO_OPERACAO_NAO_DEFINIDA;
        }
        else{
            $valor1 = str_replace(",", ".", $_POST['textValor1']);
            $valor2 = str_replace(",", ".", $_POST['textValor2']);
            $operacao = strtolower($_POST['botaoOperacao']);

            if(empty($valor1) || empty($valor2)){
                $mensagemDeErro = ERRO_CAIXA_VAZIA;
            }           
            elseif(!is_numeric($valor1) || !is_numeric($valor2)){
                $mensagemDeErro = ERRO_CARACTERE_INVALIDO;
            }
            else{
                $mensagemDeErro = (string) null;

                settype($valor1, "float");
                settype($valor2, "float");
                
                $resultado = calculadoraSwitch($operacao, $valor1, $valor2);
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
                    <h1>Calculadora Switch</h1>
                </div>
                
                <div id="containerFuncao">
                    <div id="containerEntradaDeDados">
                        <form name="formCalculadora" action="calculadora_switch.php" method="post">
                            <div class="containerInputs">
                                Valor 1:
                                <input type="text" name="textValor1" value="<?=$valor1?>">
                            </div>

                            <div class="containerInputs">
                                Valor 2:
                                <input type="text" name="textValor2" value="<?=$valor2?>">
                            </div>

                            <div class="containerInputs">
                                <input type="radio" name="botaoOperacao" value="somar" <?=$operacao =="somar" ? 'checked' : '' ?>>SOMAR
                            </div>

                            <div class="containerInputs">
                                <input type="radio" name="botaoOperacao" value="subtrair" <?=$operacao =="subtrair" ? 'checked' : '' ?>>SUBTRAIR
                            </div>

                            <div class="containerInputs">
                                <input type="radio" name="botaoOperacao" value="multiplicar" <?=$operacao =="multiplicar" ? 'checked' : '' ?>>MULTIPLICAR
                            </div>

                            <div class="containerInputs">
                                <input type="radio" name="botaoOperacao" value="dividir" <?=$operacao =="dividir" ? 'checked' : '' ?>>DIVIDIR
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