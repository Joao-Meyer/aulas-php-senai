<?php
/***************************************************** 
    Nome da classe: ContatoClass()
    Objetivo: Criar o Objeto de Contatos (GET e SET)
    Data da criação: 06/07/2020
    Autor: João Henrique Parizoti Meyer

    Data da modificação:
    Autor da modificação:
    Conteúdos modificados:
*****************************************************/
class Contato{
    // Atributos da Classe contato
    private $idContato;
    private $nome;
    private $endereco;
    private $bairro;
    private $cep;
    private $idEstado;
    private $telefone;
    private $celular;
    private $email;
    private $dtNasc;
    private $sexo;
    private $obs;
    
    // Construtor da classe
    public function __construct(){
    }

    // Get IdContato
    public function getIdContato(){
        return $this->idContato;
    }

    // Set IdContato
    public function setIdContato($idContato){
        $this->idContato = $idContato;
    }

    // Get nome
    public function getNome(){
        return $this->nome;
    }

    // Set nome
    public function setNome($nome){
        $this->nome = $nome;
    }

    // Get endereco
    public function getEndereco(){
        return $this->endereco;
    }

    // Set endereco
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    // Get bairro
    public function getBairro(){
        return $this->bairro;
    }

    // Set bairro
    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    // Get cep
    public function getCep(){
        return $this->cep;
    }

    // Set cep
    public function setCep($cep){
        $this->cep = $cep;
    }

    // Get estado
    public function getEstado(){
        return $this->estado;
    }

    // Set estado
    public function setEstado($estado){
        $this->estado = $estado;
    }

    // Get telefone
    public function getTelefone(){
        return $this->telefone;
    }

    // Set telefone
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    // Get celular
    public function getCelular(){
        return $this->celular;
    }

    // Set celular
    public function setCelular($celular){
        $this->celular = $celular;
    }

    // Get email
    public function getEmail(){
        return $this->email;
    }

    // Set email
    public function setEmail($email){
        $this->email = $email;
    }

    // Get dtNasc
    public function getDtNasc(){
        return $this->dtNasc;
    }

    // Set dtNasc
    public function setDtNasc($dtNasc){
        $this->dtNasc = $dtNasc;
    }

    // Get sexo
    public function getSexo(){
        return $this->sexo;
    }

    // Set sexo
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }

    // Get obs
    public function getObs(){
        return $this->obs;
    }

    // Set obs
    public function setObs($obs){
        $this->obs = $obs;
    }

    // Get idEstado
    public function getIdEstado(){
        return $this->idEstado;
    }

    // Set idEstado
    public function setIdEstado($idEstado){
        $this->idEstado = $idEstado;
    }
}
?>