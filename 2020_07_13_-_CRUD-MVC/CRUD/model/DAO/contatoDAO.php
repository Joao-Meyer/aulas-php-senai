<?php
/***************************************************** 
    Nome da classe: ContatoDAO()
    Objetivo: Manipular dados com o BD MYSQL referente a contatos
    Data da criação: 06/07/2020
    Autor: João Henrique Parizoti Meyer

    Data da modificação:
    Autor da modificação:
    Conteúdos modificados:
*****************************************************/

class ContatoDAO{
    private $conexao;
    private $PDOconexao;

    // Construtor da classe
    public function __construct(){
        // Import da classe de conexão
        require_once('conexaoPDO.php');
        
        // Instância da classe mysqlConection
        $this->conexao = new mysqlConnection();

        // Abre a conexão com o banco de dados
        $this->PDOconexao = $conexao->connectDatabase();
    }

    // Toda vez que o método terminar sua execução o destrutor é acionado, assim como quando a classe
    //é instânciada passar pelo construtor
    public function __destruct(){
        $this->conexao->closeDatabase();
    }
    
    // Método para INSERIR um novo contato no BD
    public function insertContato(Contato $contato){
        $sql = "insert into tblContatos
        (
            nome, endereco, bairro, cep, idEstado, telefone, celular, email, sexo, dtNasc, obs
        ) 
        values
            (
                '".$contato->getNome()."',
                '".$contato->getEndereco()."',
                '".$contato->getBairro()."',
                '".$contato->getCep()."',
                '".$contato->getIdEstado()."',
                '".$contato->getTelefone()."',
                '".$contato->getCelular()."',
                '".$contato->getEmail()."',
                '".$contato->getSexo()."',
                '".$contato->getDtNasc()."',
                '".$contato->getObs()."'
            )";

        // Executa o script sql no banco de dados
        if($this->PDOconexao->query($sql)){
            header('location:index.php');
        }
        else {
            echo("Erro ao executar o script de insert no banco de dados");
        }
    }

    // Método para ATUALIZAR um contato no BD
    public function updateContato(){

    }

    // Método para EXCLUIR um contato no BD
    public function deleteContato($idContato){
        $sql = "delete from tblContatos where idContato = ".$idContato;

        // Executa o script sql no banco de dados
        if($this->PDOconexao->query($sql)){
            header('location:index.php');
        }
        else {
            echo("Erro ao executar o script de delete no banco de dados");
        }
    }

    // Método para SELECIONAR todos os contatos no BD
    public function selectAllContatos(){
        $sql = "select * from tblContatos order by idContato desc";

        // Instância da classe mysqlConnection
        $conexao = new mysqlConnection();

        // Abre a conexão com o banco de dados
        $PDOconexao = $conexao->connectDatabase();

        // Executa o script no banco de dados e recebe o retorno dos dados
        $select = $PDOconexao->query($sql);

        $cont = 0;
        // Repetição para extrair os dados do banco e criar um objeto Contatos
        while($rsContatos = $select->fetch(PDO::FETCH_ASSOC)){
            $listContatos[] = new Contato();
            $listContatos[$cont]->setIdContato($rsContatos['idContato']);
            $listContatos[$cont]->setNome($rsContatos['nome']);
            $listContatos[$cont]->setEndereco($rsContatos['endereco']);
            $listContatos[$cont]->setBairro($rsContatos['bairro']);
            $listContatos[$cont]->setCep($rsContatos['cep']);
            $listContatos[$cont]->setIdEstado($rsContatos['idEstado']);
            $listContatos[$cont]->setTelefone($rsContatos['telefone']);
            $listContatos[$cont]->setCelular($rsContatos['celular']);
            $listContatos[$cont]->setEmail($rsContatos['email']);
            $listContatos[$cont]->setDtNasc($rsContatos['dtNasc']);
            $listContatos[$cont]->setSexo($rsContatos['sexo']);
            $listContatos[$cont]->setObs($rsContatos['obs']);

            $cont++;
        }

        // Chama o método para fechar a conexão
        $conexao->closeDatabase();

        // Valida se existe objeto para retornar para a controller,
        //se a tabela estiver vazia, o objeto não vai existir
        if(isset($listContatos)){
            return $listContatos;
        }
    }

    // Método para SELECIONAR um contato no BD
    public function selectByIdContato(){

    }
}
?>