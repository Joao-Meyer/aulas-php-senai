<?php
    if(isset($_POST['modo'])){
        if($_POST['modo'] == 'visualizar'){
            if(isset($_POST['id'])){
                $id = $_POST['id'];

                require_once('conexaoBD.php');

                $conexao = conexaoMysql();

                $sqlQuerySelect = "select tblcontatos.*, tblestados.nome as nomeEstado, tblestados.sigla
                from tblestados, tblcontatos
                where tblestados.idestado = tblcontatos.idestado
                and tblContatos.idContato = " .$id;

                $selectContato = mysqli_query($conexao, $sqlQuerySelect);

                if($rsContato = mysqli_fetch_assoc($selectContato)){
                    $nome = $rsContato['nome'];
                    $endereco = $rsContato['endereco'];
                    $bairro = $rsContato['bairro'];
                    $cep = $rsContato['cep'];
                    $telefone = $rsContato['telefone'];
                    $celular = $rsContato['celular'];
                    $email = $rsContato['email'];
                    $estado = $rsContato['nomeEstado'] . " - " . $rsContato['sigla'];
                    $dataNascimento = explode("-", $rsContato['dtNasc']);
                    $dataNascimento = $dataNascimento[2] . "/" . $dataNascimento[1] . "/" . $dataNascimento[0];
                    $sexo = $rsContato['sexo'];
                    $obs = $rsContato['obs'];
                }
            }
        }

    }
?>

<html>
    <head>
        <title>Visualizar Contatos</title>

        <?php
            require_once('./imports.php');
        ?>
    </head>

    <body>
        <div id="conteudoContato">
            <div id="nomes">
                <div class="nomeInformacao">Nome:</div>
            <!-- </tr> -->
                <div class="nomeInformacao">Endereco:</div>

                <div class="nomeInformacao">Bairro:</div>

                <div class="nomeInformacao">CEP:</div>

                <div class="nomeInformacao">Estado:</div>

                <div class="nomeInformacao">Telefone:</div>

                <div class="nomeInformacao">Celular:</div>

                <div class="nomeInformacao">Email:</div>

                <div class="nomeInformacao">Data Nascimento:</div>

                <div class="nomeInformacao">Sexo:</div>
            <!-- <tr> -->
                <div class="nomeInformacao">Obs:</div>
            <!-- </tr> -->

            <!-- <tr> -->
                <!-- <td></td> -->
            </div>

            <div id="informacoes">
                <div class="informacao"><?=$nome?></div>

                <div class="informacao"><?=$endereco?></div>

                <div class="informacao"><?=$bairro?></div>

                <div class="informacao"><?=$cep?></div>

                <div class="informacao"><?=$telefone?></div>

                <div class="informacao"><?=$celular?></div>

                <div class="informacao"><?=$email?></div>

                <div class="informacao"><?=$estado?></div>

                <div class="informacao"><?=$dataNascimento?></div>

                <div class="informacao"><?=$sexo?></div>

                <div class="informacao"><?=$obs?></div>
            </div>
        </div>
    </body>
</html>