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

                // Ativa o uso da varável de sessão
                session_start();

                // Resgatando o nome da foto que foi enviada para o servidor pelo upload.php
                $foto = $_SESSION['nomeFoto'];

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
                    session_destroy();
                    
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