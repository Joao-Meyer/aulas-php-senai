<div id="conteinerSecaoConsulta">
    <div id="conteinerTituloConsulta">
        Consulta de Contatos
    </div>

    <table id="conteinerConsulta">
        <tr>
            <td>Nome</td>

            <td>Celular</td>

            <td>Estado</td>

            <td>Email</td>

            <td>Opções</td>
        </tr>

        <?php
            //Script para selecionar todos os clientes
            $querySelect = "select tblContatos.idContato, tblContatos.nome as nomeContato,
                            tblContatos.celular, tblContatos.email,

                            tblEstados.sigla, tblEstados.nome as nomeEstado

                            from tblContatos, tblEstados
                            
                            where tblEstados.idEstado = tblContatos.idEstado
                            
                            order by tblContatos.idContato desc;";

            //Envia o script para o BD
            $selectContatos = mysqli_query($conexao, $querySelect);

            //Estrutura de repetição para listar os contatos na lista,
            //utilizamos a função mysqli_fetch_asssoc() para transformar
            //o resultado do BD em um ArrayList.
            while ($rsContatos = mysqli_fetch_assoc($selectContatos)){
                ?>
                    <tr class="tblLinhas">
                        <td class="tblColunas"><?=$rsContatos['nomeContato']?></td>
                        <td class="tblColunas"><?=$rsContatos['celular']?></td>
                        <td class="tblColunas"><?=$rsContatos['sigla'] . ' - ' . $rsContatos['nomeEstado']?></td>
                        <td class="tblColunas"><?=$rsContatos['email']?></td>
                        <td class="tblColunas">
                            <div class="tblImagens">
                                <a onclick="return confirm('Deseja realmente excluir o registro?');"
                                href="../modulos/delete_contato.php?modo=excluir&id=<?=$rsContatos['idContato']?>">
                                    <div class="excluir"></div>
                                </a>

                                <!-- <a href="../paginas/intro.php?modo=consultaEditar&id=<?=$rsContatos['idContato']?>"> -->
                                    <div class="visualizar" onclick="visualizarContato(<?=$rsContatos['idContato']?>);"></div>
                                <!-- </a> -->

                                <a href="../paginas/intro.php?modo=consultaEditar&id=<?=$rsContatos['idContato']?>">
                                    <div class="editar"></div>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php
            }
        ?>

        <tr>
            <td></td>

            <td></td>

            <td></td>

            <td></td>

            <td></td>
        </tr>
    </table>
</div>