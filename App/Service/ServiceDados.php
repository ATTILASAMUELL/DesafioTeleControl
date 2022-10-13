<?php
namespace App\Service;
use App\DAO\DAO;
use App\DAO\DAOProduto;
use App\DAO\DAOCarrinho;
use App\DAO\DAOPedidoVenda;
use App\Model\Cliente;
use App\Model\Produto;
use App\Model\Carrinho;
use App\Model\PedidoVenda;




class ServiceDados
{
    
    public static function  buscarCep($cep)
    {
        
        $url ='https://viacep.com.br/ws/'.$cep.'/json/';
        $resultado = json_decode(@file_get_contents($url));
        if ($resultado == FALSE)
        {
            return array( 
            "error" => 1,
            "mensagem" => "Error ao buscar o cep, verifique o cep."
            

        );
        }else{
            return array( "cep"=>$resultado->cep,
            "logradouro" => $resultado->logradouro,
            "bairro" => $resultado->bairro,
            'cidade' => $resultado->localidade,
            "error" => 0

        );
        }
      
       
            
            
            
        
    }

    public static function CadastrarUsuario(Cliente $cliente)
    {
        if($cliente->getNome())
        {

           
            
            
            $inserindo = new DAO;
            if(!$inserindo->buscar($cliente, true))
            {
                $retorno = $inserindo->inserir($cliente);

                return array('cadastrou'=> true);

            }
           

        }else
        {
            return array('cadastrou' => false);
        }
        
    }


    public static function RealizarLogin(Cliente $cliente)
    {
        $login = new DAO;
        $retorno = $login->buscar($cliente, false);

        if($retorno['login'] == 1)
        {
            if($retorno['id'] == 1){

                $email = $cliente->getEmail();
                $_SESSION['adm'] =  $email ;
    
            }
            
            $email = $cliente->getEmail();
            $_SESSION['email'] = $email ;
            $_SESSION['id'] =  $retorno['id'];
            return array('login' => 1 , 'id' => $retorno['id']) ;
        }else
        {
            return array('login' => 0);
        }
    }


    public static function SalvarProduto(Produto $produto)
    {
        if(isset($produto))
        {
            $inserirProduto = new DAOProduto;
            $inserirProduto->inserir($produto);
        }
    }

    public static function BuscarProduto()
    {
        
        $buscar = new DAOProduto;
        $resultado = $buscar->buscar();
       
        return $resultado;

    }

    public static function SalvandoCarrinho(Carrinho $carrinho)
    {
        $salvaCarrinhoDAO = new DAOCarrinho;
        $salvaCarrinhoDAO->inserir($carrinho);



    }


    public static function buscandoCarrinho()
    {
        $carrinho = new DAOCarrinho;
        $valores = $carrinho->buscar();
        return $valores;
    }


    public static function deletaritemcarrinho(Carrinho $carrinho, $cond)
    {
        if($carrinho)
        {
            $deletando = new DAOCarrinho;
            $id = $deletando->deletar($carrinho, $cond);
            return array( 'id'=> $id['id'] );
        }
    }


    public static function salvarPedidoVenda(PedidoVenda $pedidoVenda)
    {
        $pedidoVendaA = new DAOPedidoVenda;

        $salvandoPedido = $pedidoVendaA->inserir($pedidoVenda);
    }

    public static function listarPedidos(){

        $cliente =  $_SESSION['id'];
        $buscaPedido = new DAOPedidoVenda();

        $buscar = $buscaPedido->buscar($cliente);
       
        return array($buscar);
    }


}

