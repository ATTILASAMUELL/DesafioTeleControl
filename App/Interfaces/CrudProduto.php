

<?php

namespace App\Interfaces;
use App\Model\Produto;

interface CrudProduto {

    function inserir(Produto $produto);
    function alterar(Produto $produto);
    function buscar();
    function deletar(Produto $produto);




}