<div id="secaoConteudo">
    <div id="conteinerLojas">
        <h1>NOSSAS LOJAS</h1>

        <?php
            require_once("conexaoBD.php");

            $conexao = conexaoMysql();

            $sqlQuerySelect = "select * from tblLoja where visibilidade = 1;";

            $select = mysqli_query($conexao, $sqlQuerySelect);

            while($rsSelect = mysqli_fetch_assoc($select)){
                echo("<div class='conteinerCardLoja'>
                <div class='conteinerInformacaoCardLoja'>
                    <h2 class='nomeDaLoja'>".$rsSelect['nomeLoja']."</h2>

                    <h2 class='enderecoDaLoja'>".$rsSelect['enderecoLoja']."</h2>

                    <p class='descricaoDaLoja'>".$rsSelect['textoLoja']."</p>
                </div>

                <div class='conteinerImagemCardLoja'>
                    <img src='cms/arquivos/".$rsSelect['fotoLoja']."' alt='".$rsSelect['fotoLoja']."'>
                </div>
            </div>");
            }
        ?>

        <!-- <div class="conteinerCardLoja">
            <div class="conteinerInformacaoCardLoja">
                <h2 class="nomeDaLoja">Honker Burguer</h2>

                <h2 class="enderecoDaLoja">Rua Daora, 123, SP</h2>

                <p class="descricaoDaLoja">Mussum Ipsum, cacilds vidis litro abertis. Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Per aumento de cachacis, eu reclamis. Paisis, filhis, espiritis santis. Cevadis im ampola pa arma uma pindureta.
                Mussum Ipsum, cacilds vidis litro abertis. Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Per aumento de cachacis, eu reclamis. Paisis, filhis, espiritis santis. Cevadis im ampola pa arma uma pindureta.
                </p>
            </div>

            <div class="conteinerImagemCardLoja">
                <img src="./imagens/lanchonete_doug_funny.jpg" alt="Imagem da loja">
            </div>
        </div>

        <div class="conteinerCardLoja">
            <div class="conteinerInformacaoCardLoja">
                <h2 class="nomeDaLoja">Honker Burguer</h2>

                <h2 class="enderecoDaLoja">Rua Daora, 123, SP</h2>

                <p class="descricaoDaLoja">Mussum Ipsum, cacilds vidis litro abertis. Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Per aumento de cachacis, eu reclamis. Paisis, filhis, espiritis santis. Cevadis im ampola pa arma uma pindureta.
                Mussum Ipsum, cacilds vidis litro abertis. Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Per aumento de cachacis, eu reclamis. Paisis, filhis, espiritis santis. Cevadis im ampola pa arma uma pindureta.
                </p>
            </div>

            <div class="conteinerImagemCardLoja">
                <img src="./imagens/lanchonete_doug_funny.jpg" alt="Imagem da loja">
            </div>
        </div> -->
    </div>
</div>