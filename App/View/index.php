<?php
// CORS HEADERS


header("Access-Control-Allow-Origin: *");

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja ATTILA</title>
    <link rel="stylesheet" href="css/loading.css">
    <link rel="icon" href="img/logo.png" type="imagem/gif">
    

    

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        var i = setInterval(function () {
            console.log('aqque')
    
        clearInterval(i);
    
        // O código desejado é apenas isto:
        
        document.getElementById("foot").style.display = "block";
        document.getElementById("menuPrincipal").style.display = "block";

        

        

        }, 1200);

    

    </script> 
</head>
<body>
    <?php
        include_once "include/menu.php";
    ?>

    <br>
   
    <br>
    <br>
    <br>
    

    <div class="container">
        
        <div class="row" id="coluna">

            

           
            <br>
            
        </div>
    </div>

    <?php
        include_once "include/footer.php";
    ?>



        <!-- Modal CADASTRO -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <!-- inicio formulario -->
        <form>
        <div class="form-row">
            
             <div class="form-group col-md-6">
            <label for="inputEmail4">Nome</label>
            <input type="email" minlength="10" maxlength="60"  class="form-control" id="inputNome" placeholder="Nome">
            </div>
            
            <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email"   minlength="5" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-12">
            <label for="inputPassword4">Senha</label>
            <input type="password" minlength="10" maxlength="30" class="form-control" id="inputPassword4" placeholder="Senha">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputCpf">CPF</label>
            <input type="text" onkeyup="mascaraCpf()" minlength="14"  maxlength="14" class="form-control" id="cpf" placeholder="CPF">
            </div>

            <div class="form-group col-md-6">
            <label for="inputDataNascimento">Data de nascimento</label>
            <input type="text" onkeyup="mascaraData()" minlength="10" maxlength="10" class="form-control" id="dataN" placeholder="Data de Nascimento">
            </div>
           
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputCEP">CEP</label>
            <input  onkeyup="mascEbuscaAPI()" maxlength="9" type="text" class="form-control" id="cep" placeholder="Cep">
            </div>
        
            <div class="form-group col-md-6">
            <label for="inputLogradouro">Logradouro</label>
            <input  type="text" class="form-control" id="logradouro" maxlength="35" placeholder="Rua dos Bobos, nº 0">
            </div>
            
        </div>
      
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="input">Cidade</label>
            <input type="text"  maxlength="10" class="form-control" id="cidade" placeholder="Cidade">
            </div>

            <div class="form-group col-md-6">
            <label for="inputNumero">Número</label>
            <input type="text"  maxlength="10" class="form-control" id="numero" placeholder="Número">
            </div>
           
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputComplemento">Complemento</label>
            <input type="text"  maxlength="35" class="form-control" id="complemento" placeholder="Complemento">
            </div>

            <div class="form-group col-md-6">
            <label for="inputBairro">Bairro</label>
            <input type="text"  maxlength="27" class="form-control" id="bairro" placeholder="Bairro">
            </div>
           
        </div>
        <div class="d-flex justify-content-center">
            <div id="loading" class="spinner-border m-9" role="status">
            <span class="sr-only ">Loading...</span>
            </div>
        </div>
        <br>
        <div class="alert alert-success" role="alert" id="sucesso">
        Seja Bem-vindo a Loja Attila!!!
        </div>

        <div class="alert alert-danger" role="alert" id="alerta">
        Digite corretamente os campos!!!
        </div>

        

        </form>



        <!-- fim do formulario -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button"  onclick="efetuarcadastro()" class="btn btn-primary">Cadastrar</button>
            
        </div>
        </div>

    </div>
    </div>



    
        <!-- Modal LOGIN -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <!-- inicio formulario -->
        <form>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="email" class="form-control" id="login" placeholder="Email">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Senha</label>
            <div class="col-sm-10">
            <input type="password"  class="form-control" id="senhalogin" placeholder="Senha">
            </div>
        </div>

        <!-- Loading e alertas... -->

        <div class="d-flex justify-content-center">
            <div id="loadinglogin" class="spinner-border m-9" role="status">
            <span class="sr-only ">Loading...</span>
            </div>
        </div>
        <br>
        <div class="alert alert-success" role="alertlogin" id="sucessologin">
        Seja Bem-vindo a Loja Attila!!!
        </div>

        <div class="alert alert-danger" role="alertlogin" id="alertalogin">
        Digite corretamente os campos!!!
        </div>

        </form>



        <!-- fim do formulario -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button"  onclick="logando()" class="btn btn-primary">Login</button>
            
        </div>
        </div>
    </div>
    </div>








        <!-- Modal Carrinho -->
        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Carrinho:</h5>
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <p class="card-text justify-content-center" id="resuCarrinho">Carrinho vazio</p> 
        <!-- inicio carrinho valores -->
        <div class="row" id="carADD">
        
        


        
        <!-- fim do carrinho valores -->
        </div>
        <!-- Loading e alertas... -->
        <br>

        <div class="d-flex justify-content-center">
            <div id="loadingCarrinho" class="spinner-border m-9" role="status">
            <span class="sr-only ">Loading...</span>
            </div>
        </div>
        <br>
        <div class="alert alert-success" role="alertlogin" id="sucessoCarrinho">
        Pedido feito com Sucesso !!!
        </div>

        <div class="alert alert-danger" role="alertlogin" id="AlertaCarrinho">
        Pedido não realizado, tente novamente mais tarde!!!
        </div>

        <div class="modal-footer">
            <button type="button" id="CancelarCarrinho" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button"  onclick="fazerPedido()" id="totalCarrinho"  class="btn btn-success">Comprar</button>
            
        </div>
        </div>
    </div>
    </div>

    <!-- fim modal carrinho -->

    <br>
    <br>
    <br>
    



    
    

    


    <!-- jQuery (online) -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <!-- JavaScript Validação  Login -->
    <script src="js/validacoes.js"></script>

    <!-- JavaScript Validação CADASTRO -->
    <script src="js/cadastro.js"></script>

    <!-- JavaScript Atualizar Página  -->
    <script src="js/principal.js"></script>
        
</body>
</html>
