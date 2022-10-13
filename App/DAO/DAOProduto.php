<?php
namespace App\DAO;
use App\Interfaces\CrudProduto;
use App\Conexao\Conexao;
use App\Model\Produto;
use PDO;

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


class DAOProduto //implements CrudProduto
{
    
    function inserir(Produto $produto)
    {
        $nome = $produto->getNome();
        $foto =  $produto->getFoto();
        $valor = floatval($produto->getValor());
        $nomeArquivo = $produto->getNomeArquivo();
        $descricao = $produto->getDescricao();

        $inserindos = Conexao::Conectar();
        $prepare = $inserindos->prepare("INSERT INTO produto(nome,foto,valor,nome_arquivo,descricao) VALUES (:nome,:foto,:valor,:nome_arquivo,:descricao)");
        $prepare->bindParam(":nome",  $nome);
        $prepare->bindParam(":foto",  $foto);
        $prepare->bindParam(":valor",  $valor);
        $prepare->bindParam(":nome_arquivo",  $nomeArquivo);
        $prepare->bindParam(":descricao",  $descricao);
        $prepare->execute();


    }
    function alterar(Produto $produto)
    {

    }
    function buscar()
    {


        $query = "SELECT * FROM produto ";
        $buscando = Conexao::Conectar();
        $prepare = $buscando->prepare($query);
        $prepare->execute();
        $lista = [];
        
       
        if($prepare->rowCount()>0)
        {
            $produtos = $prepare->fetchAll(PDO::FETCH_ASSOC);
            foreach($produtos as $itens)
            {
               $lista[] =[
                   'id' =>utf8_encode( $itens['id']),
                   'nome' => utf8_encode($itens['nome'])  ,
                   'foto' =>  utf8_encode($itens['foto'])  ,
                   'valor' => utf8_encode($itens['valor']) ,
                   'nome_arquivo' =>utf8_encode( $itens['nome_arquivo'] ),
                   'descricao' => utf8_encode( $itens['descricao'])    
                

               ];
            }
            return $lista;

        }


        
    }
    function deletar(Produto $produto)
    {

    }



}