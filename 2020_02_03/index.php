<?php

// Padroniza o padrão de saída de dados conforme a regionalidade do software.
setlocale(LC_ALL, "pt-BR");

// Declaração de variáveis.
    /*Declaração de variáveis com o tipo de dados.
        Tipos de dados no PHP.
            int ou integer - Números inteiros.
            float - Números reais.
            double - Números reais, com uma maior capacidade de armazenamento de dados.
            string - Caracteres, texto de modo geral.
            boolean/bool - Verdadeiro ou falso.
            array - Matriz de dados.
            object - Objeto.
            
            gettype() - Retorna o tipo de dado atribuido a uma variável.
                echo(gettype($valor1));
            settype() - Muda o tipo de dado de uma variável.
                settype($valor1, "float");
                
            var_dump() - Retorna toda a estrutura de dados de um elemento.
    */

    // Variáveis.
    $valor1 = (float) 0;
    $valor2 = (float) 0;
    $resultado = (double) 0;
    $operacao = (string) null;
    $checkSomar = (string) null;
    $checkSubtrair = (string) null;
    $checkMultiplicar = (string) null;
    $checkDividir = (string) null;

    // Constantes. Podemos usar o define() ou o const.
    // Por meio de define():
    define("ERRO_CAIXA_VAZIA", "<span class='msg'>Por favor, inserir dados válidos nas caixas de texto, não é possível realizar cálculos vazios!</span>");
    // Por meio de const:
    const ERRO_CARACTERE_INVALIDO = "<span class='msg'>Por favor, inserir números válidos.</span>";
    const ERRO_OPERACAO_NAO_DEFINIDA = "<span class='msg'>Por favor, selecione uma operação.</span>";

    // Verifica se o formulário foi submetido pelo botão.
    if(isset($_POST['btnCalcular'])){

        // Recebendo os dados enviados pelo formulário.
        // str_replace() permite localizar um caractere e substituir por um outro.
        $valor1 = str_replace(",", ".", $_POST['txtValor1']);
        $valor2 = str_replace(",", ".", $_POST['txtValor2']);
        
        // Tratamento para validar se a operação foi escolhida pelo usuário,
        // precisamos utilizar o isset(), pois o elemento do radio não é enviado pelo for quando não for selecionado.
        if(!isset($_POST['btnOperacao']))
            echo(ERRO_OPERACAO_NAO_DEFINIDA);
        else{
            // strtoupper - Converte um conteúdo para maiúsculo.
            // strtolower - Converte um conteúdo para maiúsculo.
            $operacao = strtolower($_POST['btnOperacao']);

            // Tratamento de erro para caixa vazia.
            // Podemos verificar a caixa com a igualdade Ex: $valor1 == ""
            // ou podemos usar a função empty()
            if(empty($valor1) || empty($valor2))
                echo(ERRO_CAIXA_VAZIA);

            // Tratamento para caracteres inválidos.
            elseif(!is_numeric($valor1) || !is_numeric($valor2))
                    echo(ERRO_CARACTERE_INVALIDO);
            else{

                // Convertendo as variáveis que viraram string para float.
                settype($valor1, "float");
                settype($valor2, "float");

                // Processamento dos cálculos.
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
        <title>Calculadora</title>
        
        <meta charset="utf-8">
        
        <style>
            h1, p {
                margin: 0px;
                padding: 0px;
            }
            
            .msg {
                width: 100%;
                height: 30px;
                border: solid 2px #000000;
                background-color: darkkhaki;
                
            }
            
            #containerCalculadora {
                width: 700px;
                height: 500px;
                border: solid 1px black;
                margin-top: 100px;
                margin-left: auto;
                margin-right: auto;
            }
            
            #containerTitulo {
                width: 700px;
                height: 100px;
                background-color: #facada;
                text-align: center;
                padding-top: 35px;
                box-sizing: border-box;
            }
            
            #containerCorpoDaCalculadora {
                width: 100%;
                height: 400px;
            }
            
            #containerValores {
                width: 100%;
                height: 150px;
                padding-top: 25px;
                box-sizing: border-box;
            }
            
            .containerValor {
                width: 300px;
                height: 50px;
                margin-left: auto;
                margin-right: auto;
                text-align: center;
                padding-top: 15px;
                box-sizing: border-box;
                font-size: 20px;
                font-family: sans-serif;
            }
            
            #containerCalculoResultado {
                width: 100%;
                height: 250px;
            }
            
            #containerCalculo {
                width: 350px;
                height: 250px;
                float: left;
            }
            
            .containerOperacao, .containerBotao {
                width: 350px;
                height: 50px;
                padding-top: 10px;
                padding-left: 10px;
                box-sizing: border-box;
                font-size: 20px;
                font-family: sans-serif;
            }
            
            #containerResultado {
                width: 350px;
                height: 250px;
                float: left;
                text-align: center;
                font-size: 40px;
                padding-top: 100px;
                box-sizing: border-box;
                background-color: skyblue;
            }
            
            .entradaDeTexto {
                height: 26px;
            }
        </style>
    </head>
    
    <body>
        <div id="containerCalculadora" >
            <div id="containerTitulo">
                <h1>Calculadora Simples</h1>
            </div>
            
            <div id="containerCorpoDaCalculadora">
                <form name="frmCalculadora" action="index.php" method="post">
                    <div id="containerValores">
                        <div class="containerValor">
                            Valor 1: <input class="entradaDeTexto" type="text" name="txtValor1" value="<?=$valor1?>">
                        </div>
                        
                        <div class="containerValor">
                            Valor 2: <input type="text" name="txtValor2" value="<?=$valor2?>">
                        </div>
                    </div>
                    
                    <div id="containerCalculoResultado">
                        <div id="containerCalculo">
                            <div class="containerOperacao">                         <!-- Opção de solução com o processamento dentro do HTML. -->
                                <input type="radio" name="btnOperacao" value="somar" <?php if($operacao == 'somar')
                                        echo('checked');
                                       ?>> Somar
                            </div>
                            
                            <div class="containerOperacao">                             <!-- Opção de solução com o processamento dentro do PHP -->
                                <input type="radio" name="btnOperacao" value="subtrair" <?=$checkSubtrair?>> Subtrair
                            </div>
                            
                            <div class="containerOperacao">                                <!-- Opção de solução com o processamento dentro do HTML utilizando ternária. -->
                                <input type="radio" name="btnOperacao" value="multiplicar" <?=$operacao == 'multiplicar' ? 'checked' : null?>> Multiplicar
                            </div>
                            
                            <div class="containerOperacao">
                                <input type="radio" name="btnOperacao" value="dividir" <?=$checkDividir?>> Dividir
                            </div>
                            
                            <div class="containerBotao">
                                <input type="submit" name="btnCalcular" value="Calcular">
                            </div>
                        </div>
                        
                        <div id="containerResultado">
                            <?php echo(round($resultado, 3))?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>