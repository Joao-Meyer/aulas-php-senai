<?php
    // Verifica se existe a variável modo
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'atualizar'){
            // Import da biblioteca de conexão
            require_once('conexaoBD.php');

            // Abre a conexão com o BD
            $conexao = conexaoMysql();

            // Valida se o formulário foi submetido pelo usuário
            if(isset($_POST['buttonSubmit'])){
                // A variável foi enviada pelo Form da página index que é a PK do registro que precisa atualizar
                $id = $_GET['id'];
    
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

                $queryUpdateEstados = "update tblContatos set 
                                                                nome = '".$nome."',
                                                                endereco = '".$endereco."',
                                                                bairro = '".$bairro."',
                                                                cep = '".$cep."',
                                                                idEstado = ".$idEstado.",
                                                                telefone = '".$telefone."',
                                                                celular = '".$celular."',
                                                                email = '".$email."',
                                                                sexo = '".$sexo."',
                                                                dtNasc = '".$dataNascimentoAmericana."',
                                                                obs = '".$obs."'
                                                                
                                                                where idContato = " . $id;
                echo($queryUpdateEstados);
                if(mysqli_query($conexao, $queryUpdateEstados)){
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
        }
    }    
?>