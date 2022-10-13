<?php
namespace App\Interfaces;

use App\Model\Cliente;

interface Crud 
{

    public function inserir(Cliente $cliente);
    public function alterar(Cliente $cliente);
    public function buscar(Cliente $cliente, $tipo);
    public function deletar(Cliente $cliente);




}

?>