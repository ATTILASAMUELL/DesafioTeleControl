<?php

namespace App\Interfaces;
use App\Models\PedidoVenda as PedidoModel;


interface PedidoVenda {

    function inserir(PedidoModel $pedido);
    function alterar(PedidoModel $pedido);
    function buscar($id);
    function deletar(PedidoModel $pedido);




}