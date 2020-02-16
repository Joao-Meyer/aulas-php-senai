<?php
setlocale(LC_ALL, "pt-BR");
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
        
        <div id="containerPagina">
        <div class="containerInputs">
                            Tabuada:
                            <select name="selectTabuada">
                                <option value=""> Selecione a tabuada </option>

                                
                            </select>
                        </div>

                        <div class="containerInputs">
                            Contador:
                            <select name="selectContador">
                                <option value=""> Selecione um contador </option>

                                <option value="SP"> Soa Poula </option>

                                <option value="RJ"> Erre Jóta </option>
                            </select>
        </div>
        
        <?php
            require_once("modulos/footer.php");
        ?>
    </body>
</html>