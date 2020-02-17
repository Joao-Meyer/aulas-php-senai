<?php
    // Média
    function calculaMedia($nota1, $nota2, $nota3, $nota4){
        return ($nota1 + $nota2 + $nota3 + $nota4) / 4;
    }

    // Calculadora If
    function calculadoraIf($operacao, $valor1, $valor2){
        if($operacao == "somar"){
            return $valor1 + $valor2;
        }
        elseif($operacao == "subtrair"){
            return $valor1 - $valor2;
        }
        elseif($operacao == "multiplicar"){
            return $valor1 * $valor2;
        }
        elseif($operacao == "dividir"){
            return $valor1 / $valor2;
        }
    }

    // Calculadora Switch
    function calculadoraSwitch($operacao, $valor1, $valor2){
        switch($operacao){
            case "somar":
                return $valor1 + $valor2;

            case "subtrair":
                return $valor1 - $valor2;

            case "multiplicar":
                return $valor1 * $valor2;

            case "dividir":
                return $valor1 / $valor2;
        }
    }

    // Tabuada
    function tabuar($tabuada, $contador){
        $saida = (string) null;

        for($iteracao  = 1; $iteracao <= $contador; $iteracao++){
            $resultado = $tabuada * $iteracao;
            $saida .= "
            <div class='mensagensDeErro'>
                $tabuada X $iteracao = $resultado
            </div>
            ";
        }

        return $saida;
    }

    // Impar Par

    // Gera Options 0 a 500
    function geraOptionsIniciais(){
        $optionsIniciais = (string) null;

        for($i = 0; $i <= 500; $i++){
            $optionsIniciais .= "<option value='$i'> $i </option>";
        }

        return $optionsIniciais;
    }

    // Gera Options 100 a 1000
    function geraOptionsFinais(){
        $optionsFinais = (string) null;

        for($i = 100; $i <= 1000; $i++){
            $optionsFinais .= "<option value='$i'> $i </option>";
        }

        return $optionsFinais;
    }

    function pares($numeroInicial, $numeroFinal){
        $numerosPares = (string) null;

        for($numeroInicial; $numeroInicial <= $numeroFinal; $numeroInicial++){
            if(($numeroInicial % 2) == 0){
                $numerosPares .= "
                    <div class='mensagensDeErro'>
                        $numeroInicial
                    </div>
                ";
            }
        }

        return $numerosPares;
    }

    function impares($numeroInicial, $numeroFinal){
        $numerosImpares = (string) null;

        for($numeroInicial; $numeroInicial <= $numeroFinal; $numeroInicial++){
            if(($numeroInicial % 2) == 1){
                $numerosImpares .= "
                    <div class='mensagensDeErro'>
                        $numeroInicial
                    </div>
                ";
            }
        }

        return $numerosImpares;
    }
?>