<?php

namespace App\Model;

class Carrinho
{
    private $id;
    private $cliente;
    private $produto;
    private $data;
    private $qtd;


    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getCliente(){
        return $this->cliente;
    }
    public function setCliente($cliente){
        $this->cliente = $cliente;
    }


    public function getProduto(){
        return $this->produto;
    }
    public function setProduto($produto){
        $this->produto = $produto;
    }

    public function getData(){
        return $this->data;
    }
    public function setData($data){
        $this->data = $data;
    }

    public function getQtd(){
        return $this->qtd;
    }
    public function setQtd($qtd){
        $this->qtd = $qtd;
    }

    

}