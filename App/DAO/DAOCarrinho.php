<?php
namespace App\DAO;

use App\Conexao\Conexao;
use App\Model\Carrinho;
use PDO;

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


class DAOCarrinho
{


    function inserir(Carrinho $carrinho)
    {
        $cliente = intval( $carrinho->getCliente());
        $produto = intval( $carrinho->getProduto());
        $qtd = intval( $carrinho->getQtd());
        $date = date('Y-m-d');

        $inserindo = Conexao::Conectar();
        $prepare = $inserindo->prepare("INSERT INTO  carrinho(fk_clientee, fk_produtoo, dat, qtd) VALUES (:cliente,:produto, :dat , :qtd)");
        $prepare->bindParam(":cliente", $cliente);
        $prepare->bindParam(":produto", $produto  );
        $prepare->bindParam(":dat", $date  );
        $prepare->bindParam(":qtd", $qtd  );
        $prepare->execute();


    }
    function alterar(Carrinho $carrinho)
    {

    }
    function buscar()
    {
       
        $idCliente = $_SESSION['id'];
        $query = "SELECT * , car.id  AS id_carrinho , prod.id as id_produto FROM carrinho AS car INNER JOIN  produto  AS prod ON (prod.id = car.fk_produtoo) WHERE car.fk_clientee = :id ";
        //$query = "SELECT * FROM carrinho WHERE fk_clientee = :id";
        $buscando = Conexao::Conectar();
        $prepare = $buscando->prepare($query);
        $prepare->bindParam(":id", $idCliente);
        $prepare->execute();
        $lista = [];


        
        
        if($prepare->rowCount()>0)
        {
            $carrinho = $prepare->fetchAll(PDO::FETCH_ASSOC);
            
            
            foreach($carrinho as $itens)
            {
               $lista[] =[
                   'id' => utf8_encode($itens['id_carrinho']),
                   'nome' =>utf8_encode( $itens['nome']),
                   'qtd' => utf8_encode($itens['qtd'])  ,
                   'valor' => utf8_encode( $itens['valor'])  ,
                   'descricao' => utf8_encode(($itens['descricao'])),
                   'foto' =>utf8_encode( $itens['foto'] ),
                   'id_produto' =>utf8_encode( $itens['id_produto'])
                   
                  
                

               ];
            }
            return $lista;

        }

    }
    function deletar(Carrinho $carrinho, $cond)
    {
        


        if($cond)
        {
            $id = $carrinho->getId();
            $query =  "DELETE FROM carrinho WHERE carrinho.id = :id";
            $buscando = Conexao::Conectar();
            $prepare = $buscando->prepare($query);
            $prepare->bindParam(":id", $id);
            $prepare->execute();
            return array( 'id'=> $id);
            

        }else{
            $id = $carrinho->getCliente();

            $query =  "DELETE FROM carrinho WHERE carrinho.fk_clientee  = :id";
            $buscando = Conexao::Conectar();
            $prepare = $buscando->prepare($query);
            $prepare->bindParam(":id", $id);
            $prepare->execute();

            return array( 'id'=> $id);



        }

        

        



    }



}



