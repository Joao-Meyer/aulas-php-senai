<?php
setlocale(LC_ALL, "pt-BR");
require_once("modulos/constantes.php");

$tabuada = (integer) 0;
$contador = (integer) 0;
$resultado = (integer) 0;
$saida = (string) null;
$mensagemDeErro = (string) null;

    if(isset($_POST['submitTabuar'])){
        $tabuada = str_replace(",", ".", $_POST['textTabuada']);
        $contador = str_replace(",", ".", $_POST['textContador']);

        if(empty($tabuada) || empty($contador)){
            $mensagemDeErro = ERRO_CAIXA_VAZIA;
        }           
        elseif(!is_numeric($tabuada) || !is_numeric($contador)){
            $mensagemDeErro = ERRO_CARACTERE_INVALIDO;
        }
        else{
            settype($tabuada, "float");
            settype($contador, "integer");
         
            for($iteracao  = 1; $iteracao <= $contador; $iteracao++){
                $resultado = $tabuada * $iteracao;
                $saida .= "
                <div class='mensagensDeErro'>
                    $tabuada X $iteracao = $resultado
                </div>
                ";
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
            <div id="containerTitulo">
                <h1>Tabuada</h1>
            </div>
            
            <div id="containerFuncao">
                <div id="containerEntradaDeDados">
                    <form name="formTabuada" action="tabuada.php" method="post">
                        <div class="containerInputs">
                            Tabuada:
                            <input type="text" name="textTabuada" value="<?=$tabuada?>">
                        </div>

                        <div class="containerInputs">
                            Contador:
                            <input type="text" name="textContador" value="<?=$contador?>">
                        </div>

                        <div class="containerInputs">
                            <input type="submit" name="submitTabuar" value="Tabuar">
                        </div>
                    </form>
                </div>

                <div id="containerResultadoTabuada">
                    <?php echo($saida);?>
                </div>
            </div>
        </div>
        
        <?php
            require_once("modulos/footer.php");
        ?>
    </body>
</html>