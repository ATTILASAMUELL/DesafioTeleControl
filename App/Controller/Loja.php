<?php

namespace App\Controller;
use App\Service\ServiceDados;
use App\Model\{Carrinho,PedidoVeda,Produto};
use App\Model\Cliente;
use App\Model\PedidoVenda;
use App\Conexao\Conexao;

// CORS HEADERS
header("Access-Control-Allow-Origin: *");


//Inicia a Sessão

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 



class Loja{

   
    function buscarDadosCorreios($cep)
    {
        // CORS HEADERS
        header("Access-Control-Allow-Origin: *");

        //Retorno do Json (Validação)
        header('Content-Type: application/json');

        $valor = ServiceDados::buscarCep($cep);
        print json_encode($valor);
        exit();
    }

    function fazerCadastro($condicao, $valores)
    {
        // CORS HEADERS
        header("Access-Control-Allow-Origin: *");
        //Retorno do Json (Validação)
        header('Content-Type: application/json');
        
        if($condicao)
        {
            $cliente = new Cliente;
            $cliente->setNome($valores['nome']);
            $cliente->setEmail($valores['email']);
            $cliente->setSenha($valores['senha']);
            $cliente->setCep($valores['cep']);
            $cliente->setCidade($valores['cidade']);
            $cliente->setDatanascimento($valores['data_nascimento']);
            $cliente->setCpf($valores['cpf']);
            $cliente->setComplemento($valores['complemento']);
            $cliente->setBairro($valores['bairro']);
            $cliente->setNumero($valores['numero']);
            $cliente->setLogradouro($valores['logradouro']);
           
            
            $cadastrar = ServiceDados::CadastrarUsuario($cliente);

            

            if(!$cadastrar['cadastrou'])
            {
                print json_encode(array('cadastro'=> false ));
                exit();
            }else
            {
                print json_encode(array('cadastro'=> true ));
                exit();

            }




            

        }else
        {
        
            
            print json_encode(array ('cadastro'=> false));
            exit();
        }

    }

    function realizarLogin($condicao, $valores)
    {
        if($condicao)
        {
            // CORS HEADERS
            header("Access-Control-Allow-Origin: *");
            //Retorno do Json (Validação)
            header('Content-Type: application/json');

            $cliente = new Cliente;
    
            $cliente->setEmail($valores['email']);
            $cliente->setSenha($valores['senha']);

            $Login = ServiceDados::RealizarLogin($cliente);

            if($Login['login'] == 1)
            {
                
                
                print json_encode(array('realiza' => true, 'id' => $Login['id']));
                exit();

            }else
            {
                print json_encode(array('realiza' => false));
                exit();

                
        
            }

        }else
        {
            print json_encode(array('realiza'=> false));
            exit();

        }

    }

    function cadastrarProduto($condicao){
        // CORS HEADERS
        header("Access-Control-Allow-Origin: *");
        //Retorno do Json (Validação)
        header('Content-Type: application/json');
        $nomeProduto = $_POST['nomeProduto'];
        $descricaoProduto = $_POST['descricaoProduto'];
        $precoProduto = $_POST['precoProduto'];
        $produto = new Produto;

        

        if($condicao){
            //cadastrar

            $arquivo = $_FILES['fileFotoProduto'];
            //se tiver errror
            if($arquivo['error'])
            {
                print json_encode(array('error'=> true , 'mensagem' => 'Error ao carregar arquivo'));
                exit();

            }
            if($arquivo['size'] > 2097152)
            {
                print json_encode(array('error'=> true , 'mensagem' => 'Arquivo muito grande!!'));
                exit();
            }

            $pasta = "../arquivoUpload/";
            $nomeDoarquivo = $arquivo['name'];
            $nomeNovoArquivo = uniqid();
            $extensao = strtolower(pathinfo($nomeDoarquivo, PATHINFO_EXTENSION ));
            
            if($extensao !=  'jpg'){
                print json_encode(array('error'=> true , 'mensagem' => 'Extensão do arquivo não aceita'));
                exit();

            }
            $deu_certo = move_uploaded_file($arquivo['tmp_name'], $pasta. $nomeNovoArquivo. ".". $extensao);
            $path = $pasta. $nomeNovoArquivo. ".". $extensao;

            if($deu_certo)
            {
                $produto->setNome($nomeProduto);
                $produto->setDescricao($descricaoProduto);
                $produto->setFoto($path);
                $produto->setNomeArquivo($nomeDoarquivo);
                $produto->setValor($precoProduto);

                $salvandoProduto = ServiceDados::SalvarProduto($produto);
                print json_encode(array('error'=> false , 'mensagem' => 'deu certo'));
                exit();

            }else
            {
                print json_encode(array('error'=> true , 'mensagem' => 'upload não realizado'));
                exit();

            }




            

        }
    }


    function buscarProduto()
    {
        
        // CORS HEADERS
        header("Access-Control-Allow-Origin: *");

        //Retorno do Json (Validação)
        header('Content-Type: application/json');

        $produtos = ServiceDados::BuscarProduto();
        //array('produtos'=>$produtos)
        
        print json_encode(['produtos' => $produtos]);
        
        exit();


    }



    function salvarCarrinho()
    {
        // CORS HEADERS
        header("Access-Control-Allow-Origin: *");
        //Retorno do Json (Validação)
        header('Content-Type: application/json');

        $id = $_POST['id'];
        $cliente = $_SESSION['id'];

       

        if($cliente !=  1)
        {
                
            $carrinho = new Carrinho;
            $carrinho->setCliente($cliente);
            $carrinho->setProduto($id);
            $carrinho->setQtd(1);


            $salvandoCarrinho = ServiceDados::SalvandoCarrinho($carrinho);

            print json_encode(array('idP'=>$id, 'idC' => $cliente));
            exit();

        }else{
            print json_encode(array('idP'=>$id, 'idC' => $cliente));
            exit();
            

        }

    


    }

    function listandoCarrinho()
    {
        // CORS HEADERS
        header("Access-Control-Allow-Origin: *");
        //Retorno do Json (Validação)
        header('Content-Type: application/json');
        
        $id = $_SESSION['id'];

        if($id)
        {
            $itens = ServiceDados::buscandoCarrinho();
            print json_encode(array('valores'=> $itens , 'error' => false));
            
            exit();

        }else
        {
            print json_encode(array('error'=> true));
            exit();
            

        }
        



        


    }
    function deletandoItemCarrinho()
    {
        // CORS HEADERS
        header("Access-Control-Allow-Origin: *");
        $id = $_POST['idCarr'];

        $carrinhoC = new Carrinho;
        $carrinhoC->setId($id);

        $deletando = new ServiceDados;
        $deletando-> deletaritemcarrinho( $carrinhoC, true);
    }

    function fazerPedido()
    {
        // CORS HEADERS
        header("Access-Control-Allow-Origin: *");
        //Retorno do Json (Validação)
        header('Content-Type: application/json');

        $usuario = $_SESSION['id'];
        $listaPedi = [];
        $total = 0.0;
        $data = date("Y-m-d H:i:s");

        $pedidoVenda = new PedidoVenda;


        $pegaritens = ServiceDados::buscandoCarrinho();

        foreach($pegaritens as $itens)
        {
            $listaPedi[] =[
                'id_produto' => $itens['id_produto'],
                'nome_produto' =>  $itens['nome'],
                'quantidade' => $itens['qtd'],
                'valor' =>  $itens['valor']

            ];

            $total += $itens['valor'];
            

        };

        $pedidoVenda->setCliente($usuario);
        $pedidoVenda->setListaPedido($listaPedi);
        $pedidoVenda->setTotal($total);
        $pedidoVenda->setData($data);
        $pedidoVenda->setStatus("Pedido");

        $salvarpedidoVenda = ServiceDados::salvarPedidoVenda($pedidoVenda);

        $id = $_SESSION['id'];

        $carrinhoC = new Carrinho;
        $carrinhoC->setCliente($id);

        $deletando =ServiceDados::deletaritemcarrinho($carrinhoC, false);
        



        print json_encode(array('pedido'=>  true , 'id' => $id  ));
        exit();


    }


    function listarPedidos()
    {
        // CORS HEADERS
        header("Access-Control-Allow-Origin: *");
        //Retorno do Json (Validação)
        header('Content-Type: application/json');

        
        $pedidosFeito = ServiceDados::listarPedidos();


        
        print json_encode(array('valores' => $pedidosFeito  ));
        exit();



    }


    function sairdoSistema()
    {
        // CORS HEADERS
        header("Access-Control-Allow-Origin: *");
        //Retorno do Json (Validação)
        header('Content-Type: application/json');

        //destroi seções
        session_destroy();

        print json_encode(array('redirecionar'=>true));
        exit();
        
        
    }

}