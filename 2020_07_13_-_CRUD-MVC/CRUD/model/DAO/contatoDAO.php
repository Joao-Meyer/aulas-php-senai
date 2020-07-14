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

        echo($sql);
    }

    // Método para ATUALIZAR um contato no BD
    public function updateContato(){

    }

    // Método para EXCLUIR um contato no BD
    public function deleteContato(){

    }

    // Método para SELECIONAR todos os contatos no BD
    public function selectAllContatos(){

    }

    // Método para SELECIONAR um contato no BD
    public function selectByIdContato(){

    }
}
?>