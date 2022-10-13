<?php
namespace App\DAO;

use App\Conexao\Conexao;
use App\Model\PedidoVenda;
use PDO;



if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


class DAOPedidoVenda

{
    function inserir(PedidoVenda $pedido)
    {

        $fkCliente = $pedido->getCliente();
        $itensPedido =  json_encode($pedido->getListaPedido());
        $total = $pedido->getTotal();
        $dataPedido = $pedido->getData();
        $status = $pedido->getStatus();



        
        $inserindo = Conexao::Conectar();
        $prepare = $inserindo->prepare("INSERT INTO   pedido_venda(fk_cliente, itens_pedido, total, dataPedido, statu) VALUES (:fkcli,:itens,:total ,:dat,:stat)");
        $prepare->bindParam(":fkcli", $fkCliente);
        $prepare->bindParam(":itens", $itensPedido  );
        $prepare->bindParam(":total", $total  );
        $prepare->bindParam(":dat", $dataPedido  );
        $prepare->bindParam(":stat", $status  );
        $prepare->execute();

    }
    function alterar(PedidoVenda $pedido)
    {

    }
    function buscar($id)
    {
        
        $query = "SELECT ped_vd.id AS ped_id, ped_vd.itens_pedido AS ped_item , ped_vd.total AS ped_total, ped_vd.dataPedido AS ped_data, cli.logradouro AS cli_log  ,ped_vd.statu as ped_sta, cli.cep AS cli_ce FROM pedido_venda AS ped_vd INNER JOIN cliente AS cli ON (cli.id = ped_vd.fk_cliente ) WHERE ped_vd.fk_cliente = :valor";

       
        
        $buscando = Conexao::Conectar();
        $prepare = $buscando->prepare($query);
        $prepare->bindParam(":valor", $id);
        $prepare->execute();
        $lista = [];
        
       
        if($prepare->rowCount()>0)
        {
            $produtos = $prepare->fetchAll(PDO::FETCH_ASSOC);
            
            
            foreach($produtos as $itens)
            {
               $lista[] =[
                   'idPedido' => utf8_encode( $itens['ped_id']),
                   'itens_pedido' => [utf8_encode($itens['ped_item'])],
                   'total' =>utf8_encode( $itens['ped_total'] ) ,
                   'status' => utf8_encode( $itens['ped_sta'])  ,
                   'dataPed' =>utf8_encode( $itens['ped_data']),
                   'endereco' => utf8_encode($itens['cli_log']),
                    'cep' => utf8_encode($itens['cli_ce'])
                

               ];
            
            
        }
    }
    
        return $lista;
        

        
    }
    function deletar(PedidoVenda $pedido)
    {
        
    }




}
