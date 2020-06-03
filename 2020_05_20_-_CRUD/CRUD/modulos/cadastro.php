<div id="conteinerSecaoCadastro">
    <div id="conteinerCadastro">
        <div id="conteinerTituloCadastro">
            CADASTRO DE CONTATO
        </div>

        <form name="formCadastro" action="../modulos/insert_contato.php?modo=inserir" method="post">
            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Nome:
                </div>

                <!-- 
                    placeholder - Permite colocar uma label dentro da caixa para informar o usuário

                    required - Permite fazer a validação de caixa vazia pelo HTML5

                    pattern - Permite criar validações com formatos de máscara
                        Ex - pattern="[0-9]{3} [0-9]{4}-[0-9]{4}" - Mascara de telefone

                    <input type =
                                    "tel" - Indica a digitação de um telefone na caixa
                                    "email" - Indica a digitação de um email na caixa
                                    "url" -  Indica a digitação de uma url valida na caixa
                                    "number" - Indica a digitação de números na caixa
                                    "range" - Indica a seleção de números por meio duma barra horizontal
                                    "color" - Indica a escolha de uma cor por uma seleção e retorna um hexadecimal

                                    "date" - exibe um calendário a ser utilizado
                                    "month" - exibe um calendário de apenas meses
                                    "week" - exibe um calendário com base nas semanas
                                    Obs: date, month e week não funcionam em todos os navegadores
                 -->

                <div class="conteinerEntradaCampo">
                    <input type="text" name="inputNome" class="formataInput" placeholder="Insira o Nome" required value="<?=$nome?>">
                </div>
            </div>

            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Endereço:
                </div>

                <div class="conteinerEntradaCampo">
                    <input type="text" name="inputEndereco" class="formataInput" value="<?=$endereco?>">
                </div>
            </div>

            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Bairro:
                </div>

                <div class="conteinerEntradaCampo">
                    <input type="text" name="inputBairro" class="formataInput" value="<?=$bairro?>">
                </div>
            </div>

            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Cep:
                </div>

                <div class="conteinerEntradaCampo">
                    <input type="text" name="inputCep" class="formataInput" value="<?=$cep?>">
                </div>
            </div>

            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Estado:
                </div>

                <div class="conteinerEntradaCampo">
                    <select name="selectEstado">
                        <option value="">Selecione um estado</option>

                        <?php
                            if(isset($_GET['modo'])){
                                if($_GET['modo'] == 'consultaEditar'){
                                    ?>
                                        <option value="<?=$idEstado?>" selected>
                                            <?=$nomeEstado?>
                                        </option>
                                    <?php
                                }
                                else {
                                    ?>
                                        <option value="" selected>
                                            <?=$nomeEstado?>
                                        </option>
                                    <?php
                                }
                            }
                            
                            // Script para listar todos os estados em ordem crescente pelo nome
                            $querySelectEstados = "select tblEstados.* from tblEstados order by tblEstados.nome";

                            // Executa script no banco de dados
                            $selectEstados = mysqli_query($conexao, $querySelectEstados);

                            /*
                                fetch - converte os resultados do BD usando um método de fetch para conseguirmos trabalhar os dados no PHP
                                    mysqli_fetch_array() - Converte os dados vindos do banco em um array

                                    mysqli_fetch_assoc() - Converte os dados vindos do banco em um array e os guarda num formato mais seguro

                                    mysqli_fetch_object() - Converte os dados vindos do banco em um objeto

                                RS (Record Set) - dados
                            */

                            // Estrutura de repetição para carregar os dados no objeto select
                            while($rsEstados = mysqli_fetch_assoc($selectEstados)){
                        ?>
                              <option value="<?=$rsEstados['idEstado']?>"><?=$rsEstados['nome']?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Telefone:
                </div>

                <div class="conteinerEntradaCampo">
                    <input type="text" name="inputTelefone" class="formataInput" value="<?=$telefone?>">
                </div>
            </div>

            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Celular:
                </div>

                <div class="conteinerEntradaCampo">
                    <input type="text" name="inputCelular" class="formataInput" value="<?=$celular?>">
                </div>
            </div>

            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Email:
                </div>

                <div class="conteinerEntradaCampo">
                    <input type="text" name="inputEmail" class="formataInput" value="<?=$email?>">
                </div>
            </div>

            <div class="conteinerCampoCadastro nomeGrande">
                <div class="conteinerNomeCampo">
                    Data Nascimento:
                </div>

                <div class="conteinerEntradaCampo">
                    <input type="text" name="inputDataNascimento" class="formataInput" value="<?=$dataNascimento?>">
                </div>
            </div>

            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Sexo:
                </div>

                <div class="conteinerEntradaCampo">
                    <input type="radio" value="f" name="inputSexo" <?php if($sexo == 'f') echo('checked') ?> >Feminino
                    <input type="radio" value="m" name="inputSexo" <?php echo $sexo == 'm' ? 'checked' : '' ?> >Masculino
                </div>
            </div>

            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Obs:
                </div>

                <div class="conteinerEntradaCampo">
                    <textarea name="textAreaObs" class="textAreaObs" value="<?=$obs?>"></textarea>
                </div>
            </div>

            <button type="submit" name="buttonSubmit" id="buttonSubmit">SALVAR</button>
        </form>
    </div>
</div>