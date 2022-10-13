<?php

namespace App\Model;


class Produto
{

    private $id;
    private $nome;
    private $foto;
    private $nome_arquivo;
    private $valor;
    private $descricao;
    
    
    
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

    public function getFoto(){
        return $this->foto;
    }
    public function setFoto($foto){
        $this->foto = $foto;
    }

    public function getNomeArquivo(){
        return $this->nome_arquivo;
    }
    public function setNomeArquivo($nome_arquivo){
        $this->nome_arquivo = $nome_arquivo;
    }

    public function getValor(){
        return $this->valor;
    }
    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }


}