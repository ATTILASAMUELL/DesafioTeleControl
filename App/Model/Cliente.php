<?php
namespace App\Model;

class Cliente
{
    private $id;
    private $nome;
    private $cpf;
    private $cep;
    private $logradouro;
    private $numero;
    private $bairro;
    private $complemento;
    private $cidade;

    private $email;
    private $senha;
    private $datanascimento;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getCep(){
        return $this->cep;
    }
    public function setCep($cep){
        $this->cep = $cep;
    }

    public function getLogradouro(){
        return $this->logradouro;
    }
    public function setLogradouro($logradouro){
        $this->logradouro = $logradouro;
    }

    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getBairro(){
        return $this->bairro;
    }
    public function setBairro( $bairro){
        $this->bairro = $bairro;
    }


    
    public function getComplemento(){
        return $this->complemento;
    }
    public function setComplemento( $complemento){
        $this->complemento = $complemento;
    }

    public function getCidade(){
        return $this->cidade;
    }
    public function setCidade( $cidade){
        $this->cidade = $cidade;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail( $email){
        $this->email = $email;
    }


    public function getSenha(){
        return $this->senha;
    }
    public function setSenha( $senha){
        $this->senha = $senha;
    }


    public function getDatanascimento(){
        return $this->datanascimento;
    }
    public function setDatanascimento( $datanascimento){
        $this->datanascimento = $datanascimento;
    }

    

}