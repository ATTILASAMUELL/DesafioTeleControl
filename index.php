<?php

require_once 'vendor/autoload.php';

use App\Controller\Loja;
use App\DAO\DAO;
use App\Interfaces\Crud;

use App\Conexao\Conexao;



$loja = new Loja;


if(isset($_POST['conectar'])){
    $cep = $_POST['cep'];
    $loja->buscarDadosCorreios($cep);
    var_dump($cep);
    
}else{

}

if(isset($_POST['deletarItemCarrinho']))
{
    $loja->deletandoItemCarrinho();

}
if(isset($_POST['salvarCarrinho']))
{
    $loja->salvarCarrinho();
}
if(isset($_POST['listandoCarrinho']))
{
    $loja->listandoCarrinho();

}

if(isset($_POST['sair']))
{
    $loja->sairdoSistema();

}
if(isset($_POST['cadasPro'])){
    
    
    if(isset($_FILES['fileFotoProduto']))
    {
        $loja->cadastrarProduto(true);
       

    }else
    {
        $loja->cadastrarProduto(false);

    }
   

    
   
}

if(isset($_POST['login']))
{
    $email = filter_input(INPUT_POST,'emailLogin', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST,'senhaLogin', FILTER_SANITIZE_STRING);

    if(!$email or !$senha)
    {
        
        $loja->realizarLogin(false,false);

    }
    else
    {
        $array = array( 'email' => $email, 'senha' => $senha);
        $loja->realizarLogin(true, $array);
    }

}

if(isset($_POST['listar']))
{
    $loja->buscarProduto();
}


if(isset($_POST['cadastrando']))
{
    
    
    
    $nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST,'senha', FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST,'cep', FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST,'cidade', FILTER_SANITIZE_STRING);
    $inputDataNascimento = filter_input(INPUT_POST,'DataNascimento', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST,'cpf', FILTER_SANITIZE_STRING);
    $complemento = filter_input(INPUT_POST,'complemento', FILTER_SANITIZE_STRING);
    $bairro = filter_input(INPUT_POST,'bairro', FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST,'numero', FILTER_SANITIZE_STRING);
    $logradouro = filter_input(INPUT_POST,'logradouro', FILTER_SANITIZE_STRING);

    if(!$nome or !$email or !$senha or !$cep or !$cidade  or !$inputDataNascimento
    or !$cpf or !$complemento or !$bairro or !$numero  or !$logradouro)
    {
        
        $loja->fazerCadastro(false,false);

    }else{
        $array = array('nome'=> $nome, 'email' => $email, 'senha' => $senha, 'cep' => $cep, 'cidade' => $cidade, 'data_nascimento' => $inputDataNascimento,
        'cpf' => $cpf, 'complemento' => $complemento, 'bairro' => $bairro , 'numero' => $numero, 'logradouro' => $logradouro);
        
       
        $loja->fazerCadastro(true,$array);

    }
   
    

}

if(isset($_POST['fazerPedido']))
{
    $loja->fazerPedido();
    

}

if(isset($_POST['listarPedidos']))
{
    $loja->listarPedidos();
}



header("Location: http://localhost/sistema-vendas/App/View/index.php");


