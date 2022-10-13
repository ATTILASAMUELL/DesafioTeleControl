<?php
namespace App\DAO;
use App\Interfaces\Crud;
use App\Conexao\Conexao;
use App\Model\Cliente;
use PDO;

class DAO 
{
    function inserir(Cliente $cliente)
    {

    
            
        $nome = $cliente->getNome();
        $senha = password_hash($cliente->getSenha(),PASSWORD_DEFAULT);
        $cpf =  $cliente->getCpf();
        $cep =  $cliente->getCep();
        $logradouro = $cliente->getLogradouro();
        $numero = $cliente->getNumero();
        $bairro = $cliente->getBairro();
        $complemento =  $cliente->getComplemento();
        $datanascimentodata = $cliente->getDatanascimento();
        $email = $cliente->getEmail();

            
            
        
     


        $inserindo = Conexao::Conectar();
        
        $prepare = $inserindo->prepare("INSERT INTO cliente(nome,senha,cpf,cep,logradouro,numero,bairro,complemento,datanascimento,email) VALUES (:n,:se,:cp,:ce,:lo,:nu,:ba,:co,:dt,:em)");
        $prepare->bindParam(":n", $nome);
        $prepare->bindParam(":se", $senha  );
        $prepare->bindParam(":cp",  $cpf);
        $prepare->bindParam(":ce",  $cep );
        $prepare->bindParam(":lo",  $logradouro );
        $prepare->bindParam(":nu",   $numero);
        $prepare->bindParam(":ba",  $bairro );
        $prepare->bindParam(":co",  $complemento);
        $prepare->bindParam(":dt",  $datanascimentodata);
        $prepare->bindParam(":em",  $email);
        $prepare->execute();

        

        return array('data'=> $datanascimentodata);

        

        
    }
    
    function buscar(Cliente $cliente, $tipo)
    {
        if($tipo){
            $query = "SELECT * FROM cliente WHERE email = :email";
            $email = $cliente->getEmail();

            $buscando = Conexao::Conectar();
            $prepare = $buscando->prepare($query);
            $prepare->bindParam(":email", $email);
            $prepare->execute();
           
            if($prepare->rowCount()>0)
            {
    
                return true;
    
            }
            else
            {
                return false;
            }
    



        }elseif(!$tipo){
            
            
            

            $email = $cliente->getEmail();
            $senha = strval($cliente->getSenha());
            

            $query ="SELECT * FROM cliente WHERE email = :email ";
            $buscando = Conexao::Conectar();
            $prepare = $buscando->prepare($query);
            $prepare->bindParam(":email", $email);
            $prepare->execute();
           
            
            if($prepare->rowCount()>0){
                $usuario = $prepare->fetch(PDO::FETCH_ASSOC);
                $senha_prov =  strval($usuario['senha']);
                if(password_verify($senha, $senha_prov )){
                    return array('login' => 1, 'id' => $usuario['id']);
                }else
                {
                    return  array('login' => 0, 'id' => $usuario['id']);
                }

            }else
            {
                return  array('login' => 0);
            }
           
            
                
            
            
    
    
    
                
    
    
        }



        
      
       
       



        
    }

   
    function alterar(Cliente $cliente)
    {

    }
    
    function deletar(Cliente $cliente)
    {

    }



}