<div id="secaoConteudo">
    <div id="conteinerConteudoPagina">
        <div id="conteinerFormulario">
            <h1>ENTRE EM CONTATO CONOSCO</h1>

            <form name="formFaleConosco" action="./modulos/insertFaleConosco.php?modo=inserir" method="post">
                <div class="conteinerInput">
                    Nome:
                    <input type="text" name="inputNome" class="inputs">
                </div>

                <div class="conteinerInput">
                    Telefone:
                    <input type="text" name="inputTelefone" class="inputs">
                </div>

                <div class="conteinerInput">
                    Celular:
                    <input type="text" name="inputCelular" class="inputs">
                </div>

                <div class="conteinerInput">
                    Email:
                    <input type="email" name="inputEmail" class="inputs">
                </div>

                <div class="conteinerInput">
                    Home Page (Página pessoal):
                    <input type="url" name="inputHomePage" class="inputs">
                </div>

                <div class="conteinerInput">
                    Link do Facebook:
                    <input type="url" name="inputFacebook" class="inputs">
                </div>

                <div class="conteinerInput">
                    Profissão:
                    <input type="text" name="inputProfissao" class="inputs">
                </div>

                <div class="conteinerInput">
                    Desejo realizar uma: <p><br></p>
                    <input type="radio" name="inputIntuito" value="s" id="s">Sugestão
                    <input type="radio" name="inputIntuito" value="c" id="c">Critica
                </div>

                <!-- <div class="conteinerInputTextArea">
                    Sugestões / Críticas:
                    <textarea name="inputSugestao" cols="30" rows="10"></textarea>
                </div> -->

                <div class="conteinerInputTextArea">
                    Mensagem:
                    <textarea name="inputMensagem" cols="30" rows="10"></textarea>
                </div>

                <div class="conteinerInput">
                    Sexo: <p><br></p>
                    <input type="radio" name="inputSexo" value="m" id="m">Masculino
                    <input type="radio" name="inputSexo" value="f" id="f">Feminino
                    <input type="radio" name="inputSexo" value="x" id="x">Outro
                </div>

                <div class="conteinerInputSubmit">
                    <input type="submit" value="ENVIAR" name="btnEnviar">
                </div>
            </form>
        </div>
    </div>
</div>