<?php

namespace App\Model;

class PedidoVenda
{

    private $id;
    private $cliente;
    private $listapedidos;
    private $total;
    private $data;
    private $status; // P: PEDIDO , E: ENVIADO  ,  E: ENTREGUE


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

    public function getListaPedido(){
        return $this->listapedidos;
    }
    public function setListaPedido($listapedidos){
        $this->listapedidos = $listapedidos;
    }


    public function getTotal(){
        return $this->total;
    }
    public function setTotal($total){
        $this->total = $total;
    }

    public function getData(){
        return $this->data;
    }
    public function setData($data){
        $this->data = $data;
    }

    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status){
        $this->status = $status;
    }




    


}