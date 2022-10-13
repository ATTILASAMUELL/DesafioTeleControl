<?php

namespace App\Interfaces;
use App\Model\Carrinho;

interface CarrinhoCrud {

    function inserir(Carrinho $carrinho);
    function alterar(Carrinho $carrinho);
    function buscar(Carrinho $carrinho);
    function deletar(Carrinho $carrinho);




}