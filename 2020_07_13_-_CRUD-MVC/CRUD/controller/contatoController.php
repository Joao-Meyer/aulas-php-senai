<?php
/***************************************************** 
    Nome da classe: ContatoController()
    Objetivo: Criar toda a regra de negócio para o sistema (Ela vai intermediar a 
    View e a Model)
    Data da criação: 13/07/2020
    Autor: João Henrique Parizoti Meyer

    Data da modificação:
    Autor da modificação:
    Conteúdos modificados:
*****************************************************/

class ContatoController{

    // Construtor
    public function __construct(){        
        // Import dda classe contato DAO
        require_once('model/DAO/contatoDAO.php');
        
        // Import da classe
        require_once('model/contatoClass.php');
    }

    // Inserir um novo contato
    public function inserirContato(){
        // Valida qual método de requisição está chegando pelo HTTP (POST, GET, PUT/PUSH e DELETE)
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Recebendo dados do formulário (POST)
            $nome = $_POST['inputNome'];
            $endereco = $_POST['inputEndereco'];
            $bairro = $_POST['inputBairro'];
            $cep = $_POST['inputCep'];
            $telefone = $_POST['inputTelefone'];
            $celular = $_POST['inputCelular'];
            $email = $_POST['inputEmail'];
            $dataNascimento = explode("/", $_POST['inputDataNascimento']);
            $dataNascimentoAmericana = $dataNascimento[2]."-".$dataNascimento[1]."-".$dataNascimento[0];
            $sexo = $_POST['inputSexo'];
            $obs = $_POST['textAreaObs'];
            // $idEstado = $_POST['selectEstado'];

            $contato = new Contato();

            $contato->setNome($nome);
            $contato->setEndereco($endereco);
            $contato->setBairro($bairro);
            $contato->setCep($cep);
            $contato->setTelefone($telefone);
            $contato->setCelular($celular);
            $contato->setEmail($email);
            $contato->setDtNasc($dataNascimentoAmericana);
            $contato->setSexo($sexo);
            $contato->setObs($obs);
            $contato->setIdEstado(1);

            // Instância da classe DAO
            $contatoDAO = new ContatoDAO();

            // Chama o método para inserir o contato no BD
            $contatoDAO->insertContato($contato);
        }
    }

    // Atualizar um contato
    public function atualizarContato(){

    }

    // Excluir um contato
    public function excluirContato($id){
        // Instância da classe ContatoDAO
        $contatoDAO = new ContatoDAO();

        // Chama o método para excluir o registro do Banco de Dados
        $contatoDAO->deleteContato($id);
    }

    // Listar um contato
    public function listarContato(){
        // Instância da classe contato
        $listContatoDAO = new ContatoDAO();

        return $listContatoDAO->selectAllContatos();
    }

    // Buscar um contato
    public function buscarContato(){

    }

    // Listar contatos em JSON (Para API ou para )
}
?>