<div id="secaoConteudo">
    <div id="conteinerConteudoPagina">
        <div id="conteinerCuriosidades">
            <h1>Curiosidades</h1>

            <?php
                require_once("conexaoBD.php");

                $conexao = conexaoMysql();

                $sqlQuerySelect = "select * from tblConteudo where destino = 'c' and visibilidade = 1;";

                $select = mysqli_query($conexao, $sqlQuerySelect);

                while($rsSelect = mysqli_fetch_assoc($select)){
                    if($rsSelect['titulo'] != null){
                        echo("
                            <h2>
                                ".$rsSelect['titulo']."
                            </h2>
                        ");
                    }
                    if($rsSelect['imagem'] != null){
                        echo("
                            <div class='conteinerImagensCuriosidades'>
                                <img src='cms/arquivos/".$rsSelect['imagem']."' alt='".$rsSelect['imagem']."'>
                            </div>
                        ");
                    }
                    echo("
                        <p class='textosSobre'>
                            <br>
                            ".$rsSelect['texto']."
                        </p>            
                    ");
                }
            ?>

            <!-- <h1>Curiosidades</h1>

            <div class="conteinerImagensCuriosidades">
                <img src="./imagens/lanchonete_doug_funny.jpg" alt="Imagem da turma do Doug na lanchonete">
            </div>

            <h2>Curiosidade</h2>

            <p>Mussum Ipsum, cacilds vidis litro abertis. Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Per aumento de cachacis, eu reclamis. Paisis, filhis, espiritis santis. Cevadis im ampola pa arma uma pindureta.</p>

            <h2>Curiosidade</h2>

            <div class="conteinerImagensCuriosidades">
                <img src="./imagens/tofu.jpg" alt="Imagem de um prato de tofu">
            </div>

            <p>Mussum Ipsum, cacilds vidis litro abertis. Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Per aumento de cachacis, eu reclamis. Paisis, filhis, espiritis santis. Cevadis im ampola pa arma uma pindureta.</p> -->
        </div>
    </div>
</div>