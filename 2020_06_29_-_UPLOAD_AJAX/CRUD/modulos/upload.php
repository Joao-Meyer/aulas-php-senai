<?php
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
                    // Ativa a utilização de uma variável de sessão no projeto
                    session_start();

                    // Elimina as variáveis de sessão do projeto
                    // session_destroy();

                    // Guarda o nome da foto que foi enviada para o servidor, para recuperarmos este valor
                    // no insert do BD
                    $_SESSION['nomeFoto'] = $foto;

                    echo("<img src='../modulos/arquivos/" . $foto . "'>");                              
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

?>