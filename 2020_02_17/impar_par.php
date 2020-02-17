<?php
setlocale(LC_ALL, "pt-BR");
$mensagemDeErro = (string) null;

require_once("modulos/constantes.php");

    // Gera Options 0 a 500
    $optionsIniciais = (string) null;
    for($i = 0; $i <= 500; $i++){
        $optionsIniciais .= "<option value='$i'> $i </option>";
    }

    // Gera Options 100 a 1000
    $optionsFinais = (string) null;
    for($i = 100; $i <= 1000; $i++){
        $optionsFinais .= "<option value='$i'> $i </option>";
    }
    
    $numeroInicial = (integer) 0;
    $numeroFinal = (integer) 0;
    $numerosImpares = (string) null;
    $numerosPares = (string) null;

    if(isset($_POST['submitImparPar'])){
        $numeroInicial = $_POST['selectNumeroInicial'];
        $numeroFinal = $_POST['selectNumeroFinal'];

        if($numeroInicial == "" || $numeroFinal == ""){
            $mensagemDeErro = ERRO_NUMERO_NAO_DEFINIDO;
        }
        elseif($numeroInicial >= $numeroFinal){
            $mensagemDeErro = ERRO_CARACTERE_INVALIDO;
        }
        else{
            settype($numeroInicial, "integer");
            settype($numeroFinal, "integer");

            for($numeroInicial; $numeroInicial <= $numeroFinal; $numeroInicial++){
                if(($numeroInicial % 2) == 0){
                    $numerosPares .= "
                        <div class='mensagensDeErro'>
                            $numeroInicial
                        </div>
                    ";
                }
                else{
                    $numerosImpares .= "
                        <div class='mensagensDeErro'>
                            $numeroInicial
                        </div>
                    ";
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
            <div id="containerTitulo">
                <h1>Par ou Impar</h1>
            </div>
            
            <div id="containerFuncao">
                <div id="containerEntradaDeDados">
                    <form name="formImparPar" action="impar_par.php" method="post">
                        <div class="containerInputs">
                        Nº Inicial:
                            <select name="selectNumeroInicial">
                                <option value=""> Selecione um nº inicial </option>

                                <?php echo($optionsIniciais);?>
                            </select>
                        </div>

                        <div class="containerInputs">
                            Nº Final:
                            <select name="selectNumeroFinal">
                                <option value=""> Selecione um nº final </option>

                                <?php echo($optionsFinais);?>
                            </select>
                        </div>

                        <div class="containerInputs">
                            <input type="submit" name="submitImparPar" value="Impar Par">
                        </div>
                    </form>
                </div>

                <div class="containerResultadoImparPar">
                    <?php echo($numerosPares);?>
                </div>

                <div class="containerResultadoImparPar">
                    <?php echo($numerosImpares);?>
                </div>
            </div>
        </div>
        
        <?php
            require_once("modulos/footer.php");
        ?>
    </body>
</html>