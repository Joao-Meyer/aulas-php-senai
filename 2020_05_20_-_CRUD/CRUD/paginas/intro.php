<?php
    // Declaração das variáveis que serão utilizadas
    $idEstado = 0;
    $nome = null;
    $endereco = null;
    $bairro = null;
    $cep = null;
    $telefone = null;
    $celular = null;
    $email = null;
    $dataNascimentoBrasileiro = null;
    $sexo = null;
    $obs = null;

    // Variável para ser colocada no action do Form, conforme a ação para inserir um registro novo
    $action = "../modulos/insert_contato.php?modo=inserir";
    echo('Mudou o action para '.$action);

    // Import da biblioteca de conexão
    require_once('../modulos/conexaoBD.php');

    // Abre a conexão com o BD
    $conexao = conexaoMysql();

    // Verifica se a variável modo existe (Ela foi enviada no CLICK do editar)
    //na listagem dos dados
    if(isset($_GET['modo'])){
        // Valida se a ação de modo é para buscar um registro no BD
        if($_GET['modo'] == 'consultaEditar'){
            if(isset($_GET['id'])){
                // Resgata o id do registro para buscar no BD
                $id = $_GET['id'];

                // Script para buscar no banco de dados pelo ID
                // $querySelectContato = "select * from tblContatos where idContato = " . $id;

                $querySelectContato = "
                    select tblContatos.*,

                    tblEstados.nome as nomeEstado

                    from tblContatos, tblEstados
                    
                    where tblEstados.idEstado = tblContatos.idEstado
                    
                    and tblContatos.idContato = ".$id;
                ;
                
                // Executa o script no BD
                $selectDados = mysqli_query($conexao, $querySelectContato);

                // Transforma o resultado do BD em um Array para manipular os dados
                if($rsListContatos = mysqli_fetch_assoc($selectDados)){
                    // Recuperar os dados do BD e guargar em variáveis locais para
                    //colocar nas caixar do form
                    $idContato = $rsListContatos['idContato'];
                    $nome = $rsListContatos['nome'];
                    $endereco = $rsListContatos['endereco'];
                    $bairro = $rsListContatos['bairro'];
                    $cep = $rsListContatos['cep'];
                    $estado = $rsListContatos['idEstado'];
                    $telefone = $rsListContatos['telefone'];
                    $celular = $rsListContatos['celular'];
                    $email = $rsListContatos['email'];

                    $dataNascimento = explode('-', $rsListContatos['dtNasc']);
                    $dataNascimentoBrasileiro = $dataNascimento[2] . "/" . $dataNascimento[1] . "/" . $dataNascimento[0];

                    $sexo = strtolower($rsListContatos['sexo']);
                    $obs = $rsListContatos['obs'];

                    // Guardamos os dados do estado referentes ao contato
                    $idEstado = $rsListContatos['idEstado'];
                    $nomeEstado = $rsListContatos['nomeEstado'];

                    // Ação que será colocada no Form para atualizar o registro que está sendo visualizado,
                    //estamos enviando para a página update o id do registro
                    $action = "../modulos/update_contato.php?modo=atualizar&id=".$rsListContatos['idContato'];
                    echo('Mudou o action para '.$action);
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD-Contatos</title>

    <?php
        require_once('../modulos/imports.php');
    ?>
</head>
<body>
    <?php
        require_once('../modulos/header.php');
    ?>
    
    <?php
        require_once('../modulos/cadastro.php');
    ?>

    <?php
        require_once('../modulos/consulta.php');
    ?>

    <?php
        require_once('../modulos/footer.php');
    ?>
</body>
</html>