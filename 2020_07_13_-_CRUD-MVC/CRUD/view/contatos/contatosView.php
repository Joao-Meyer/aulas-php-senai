  
<script>
    
    //Devemos sempre iniciar o JQuery por essa function
    $(document).ready(function(){
        
        //Function que será acionada no click do botao para visualizar
            $('.pesquisar').click(function(){
            //chama a div modal pelo efeito fadeIn
            $('#modal').fadeIn(1000); 
            });
        

    });
    
    
    //Function para abrir um arquivo dentro da modal
    function visualizarContato(idContato)
    {
        $.ajax({
            //Define o verbo a ser utilizado na requisição
            type: "POST", 
            //Página a ser chamada
            url: "bd/visualizarContato.php",
            //Não é obrigatório, mas precisamos qdo iremos passar parametros para a página
            data: {modo:'visualizar',id:idContato},
            //Ação de sucesso do carregamento da página, enviamos o conteudo da página para a modal
            success: function (dados){
                $('#modalConteudo').html(dados);
                //console.log(dados);
            }
            
            
            
        });
    }

</script>

<!-- Modal para ser carregada no visualizar de um registro -->
<div id="modal">
    <div id="modalConteudo">
    
    </div>
</div>        

<!-- Formulário de cadastro de contatos -->
<div id="conteinerSecaoCadastro">
    <div id="conteinerCadastro">
        <div id="conteinerTituloCadastro">
            CADASTRO DE CONTATO
        </div>

        <form name="formCadastro" action="router.php?controller=contatos&modo=inserir" method="post">
            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Nome:
                </div>

                <div class="conteinerEntradaCampo">
                    <input type="text" name="inputNome" class="formataInput" placeholder="Insira o Nome" required value="">
                </div>
            </div>

            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Endereço:
                </div>

                <div class="conteinerEntradaCampo">
                    <input type="text" name="inputEndereco" class="formataInput" value="">
                </div>
            </div>

            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Bairro:
                </div>

                <div class="conteinerEntradaCampo">
                    <input type="text" name="inputBairro" class="formataInput" value="">
                </div>
            </div>

            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Cep:
                </div>

                <div class="conteinerEntradaCampo">
                    <input type="text" name="inputCep" class="formataInput" value="">
                </div>
            </div>

            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Estado:
                </div>

                <div class="conteinerEntradaCampo">
                    <select name="selectEstado">
                        
                        <option value="" selected>
                            Selecione um item
                        </option>
                        
                        <option value=""></option>
                        
                    </select>
                </div>
            </div>

            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Telefone:
                </div>

                <div class="conteinerEntradaCampo">
                    <input type="text" name="inputTelefone" class="formataInput" value="">
                </div>
            </div>

            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Celular:
                </div>

                <div class="conteinerEntradaCampo">
                    <input type="text" name="inputCelular" class="formataInput" value="">
                </div>
            </div>

            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Email:
                </div>

                <div class="conteinerEntradaCampo">
                    <input type="text" name="inputEmail" class="formataInput" value="">
                </div>
            </div>

            <div class="conteinerCampoCadastro nomeGrande">
                <div class="conteinerNomeCampo">
                    Data Nascimento:
                </div>

                <div class="conteinerEntradaCampo">
                    <input type="text" name="inputDataNascimento" class="formataInput" value="">
                </div>
            </div>

            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Sexo:
                </div>

                <div class="conteinerEntradaCampo">
                    <input type="radio" value="f" name="inputSexo" checked >Feminino
                    <input type="radio" value="m" name="inputSexo" >Masculino
                </div>
            </div>

            <div class="conteinerCampoCadastro">
                <div class="conteinerNomeCampo">
                    Obs:
                </div>

                <div class="conteinerEntradaCampo">
                    <textarea name="textAreaObs" class="textAreaObs" value=""></textarea>
                </div>
            </div>

            <button type="submit" name="buttonSubmit" id="buttonSubmit">SALVAR</button>
        </form>
    </div>
</div>

<!-- Tela de consulta de dados -->
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
                // Import da classe controller
                require_once('controller/contatoController.php');

                // Instancia a controller
                $listContatosController = new ContatoController();

                // Chama o método para listar todos os contatos
                $dadosContatos = $listContatosController->listarContato();

                $cont =0;

                while($cont < count($dadosContatos)){
            ?>
                    <tr class="tblLinhas">
                        <td class="tblColunas"><?=$dadosContatos[$cont]->getNome()?></td>
                        <td class="tblColunas"><?=$dadosContatos[$cont]->getCelular()?></td>
                        <td class="tblColunas"><?=$dadosContatos[$cont]->getIdEstado()?></td>
                        <td class="tblColunas"><?=$dadosContatos[$cont]->getEmail()?></td>
                        <td class="tblColunas">
                            <div class="tblImagens">
                                <a onclick="return confirm('Deseja realmente excluir o registro?');"
                                href="router.php?controller=contatos&modo=excluir&id=<?=$dadosContatos[$cont]->getIdContato()?>">
                                    <div class="excluir"></div>
                                </a>

                                    <div class="visualizar" onclick="visualizarContato(<?=$dadosContatos[$cont]->getIdContato()?>);"></div>

                                <a href="../paginas/intro.php?modo=consultaEditar&id=<?=$dadosContatos[$cont]->getIdContato()?>">
                                    <div class="editar"></div>
                                </a>
                            </div>
                        </td>
                    </tr>
            <?php
                    $cont++;
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