<?php
    // Verifica se existe a variável modo
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'inserir'){
            // Import da biblioteca de conexão
            require_once('conexaoBD.php');

            // Abre a conexão com o BD
            $conexao = conexaoMysql();

            // Valida se o formulário foi submetido pelo usuário
            if(isset($_POST['buttonSubmit'])){

                // Resgatando dados fornecidos pelo usuário pelo método POST
                $nome = $_POST['inputNome'];
                $endereco = $_POST['inputEndereco'];
                $bairro = $_POST['inputBairro'];
                $cep = $_POST['inputCep'];
                $telefone = $_POST['inputTelefone'];
                $celular = $_POST['inputCelular'];
                $email = $_POST['inputEmail'];
                $dataNascimento = explode("/", $_POST['inputDataNascimento']);

                // Conversão da data brasileira para o padrão americano, pois o BD só aceita o padrão americano AA-MM-DD
                $dataNascimentoAmericana = $dataNascimento[2]."-".$dataNascimento[1]."-".$dataNascimento[0];
                $sexo = $_POST['inputSexo'];
                $obs = $_POST['textAreaObs'];
                $idEstado = $_POST['selectEstado'];

                // Código para fazer o upload de arquivos - Início

                // Valida se o que está chegando é um arquivo válido, size maior que 0 e type de arquivo
                //diferente de vazio
                if($_FILES['fleFoto']['size'] > 0 && $_FILES['fleFoto']['type'] != ""){       

                    // Nome da pasta que foi criada para colocar os arquivos upados
                    $diretorioArquivo = "arquivos/";

                    // Tamanho do arquivo, convertendo o tamanho em Bytes para KB
                    $arquivoSize = round($_FILES['fleFoto']['size']/1024);

                    // Lista de extensões que serão permitidas no upload
                    $arquivosPermitidos = array("image/jpeg", "image/jpg", "image/gif", "image/png");

                    // Guardamos o tipo de arquivo quie foi escolhido pelo usuário
                    $arquivoType = $_FILES['fleFoto']['type'];

                    // Valida se a extensão do arquivo é permitido no upload
                    if(in_array($arquivoType, $arquivosPermitidos)){
                        // Valida se o tamanho do arquivo é de até 2MB
                        if($arquivoSize <= 2000){
                            // Guardamos o nome do arquivo utilizando a função pathinfo, que permite
                            //desvincular o nome do arquivo da extesão
                            $nomeArquivo = pathinfo($_FILES['fleFoto']['name'], PATHINFO_FILENAME);

                            // Guarda a extensão do nome do arquivo
                            $extensaoArquivo = pathinfo($_FILES['fleFoto']['name'], PATHINFO_EXTENSION);

                            // Estamos gerando um nome de arquivo único para fazer upload no servidor.
                            //Para isso utilizamos os comandos:
                            //  uniqid() que gera uma sequência aleatória com base em uma configuração de hardware 
                            //  time() que pega a hora, minuto e segundo e coloca junto com o uniqid()
                            //  md5() para fazer a criptografia do nome do arquivo
                            //      existem outras formas de criptografia, tais como:
                            //          md5()                                        
                            //          sha1()
                            //          hash(tipo de criptografia, variavel)
                            $nomeArquivoCripty = md5($nomeArquivo . uniqid(time()));

                            $foto = $nomeArquivoCripty . "." . $extensaoArquivo;

                            // Pasta temporária que o form disponibilizou o arquivo a ser upado para o servidor
                            $arquivoTemp = $_FILES['fleFoto']['tmp_name'];

                            // Move para o servidor o arquivo da pasta temporária para o diretório
                            //criado no servidor, alterando o nome do arquivo original para o nome
                            //criptografado.
                            if(move_uploaded_file($arquivoTemp, $diretorioArquivo.$foto)){
                                echo("Arquivo movido com sucesso.");

                                $queryInsertEstados = "insert into tblContatos
                                    (
                                        nome, endereco, bairro, cep, idEstado, telefone, celular, email, sexo, dtNasc, obs, imagem
                                    ) 
                                    values
                                        (
                                            '".$nome."', '".$endereco."', '".$bairro."', '".$cep."', ".$idEstado.",
                                            '".$telefone."', '".$celular."', '".$email."', '".$sexo."', '".$dataNascimentoAmericana."',
                                            '".$obs."', '".$foto."'
                                        )";
                                
                                if(mysqli_query($conexao, $queryInsertEstados)){
                                    echo("
                                        <script>
                                            alert('Registro inserido com sucesso');
                                            location.href = '../paginas/intro.php';
                                        </script>
                                    ");
                                }
                                else {
                                    echo("
                                        <script>
                                            alert('Erro ao executar o script!);
                                            // Permite volar a pagina anterior sem perder
                                            //os dados digitados no formulário
                                            window.history.back();
                                        </script>
                                    ");
                                }                
                            }
                            else{
                                echo("Falha na movimentação do arquivo.");
                            }
                        }
                        else {
                        echo("Não é permitido arquivos maiores que 2MB.");
                        }
                    }
                    else{
                        echo("Arquivo selecionado não é permitido no sistema.");
                    }
                }
                else {
                    echo("Arquivo inválido na escolha da imagem.");
                }
                // Código para fazer o upload de arquivos - Fim

                // $queryInsertEstados = "insert into tblContatos
                //     (
                //         nome, endereco, bairro, cep, idEstado, telefone, celular, email, sexo, dtNasc, obs
                //     ) 
                //     values
                //         (
                //             '".$nome."', '".$endereco."', '".$bairro."', '".$cep."', ".$idEstado.",
                //             '".$telefone."', '".$celular."', '".$email."', '".$sexo."', '".$dataNascimentoAmericana."', '".$obs."'
                //         )";
                
                // if(mysqli_query($conexao, $queryInsertEstados)){
                //     echo("
                //         <script>
                //             alert('Registro inserido com sucesso');
                //             location.href = '../paginas/intro.php';
                //         </script>
                //     ");
                // }
                // else {
                //     echo("
                //         <script>
                //             alert('Erro ao executar o script!);
                //             // Permite volar a pagina anterior sem perder
                //             //os dados digitados no formulário
                //             window.history.back();
                //         </script>
                //     ");
                // }
            }
        }
    }    
?>