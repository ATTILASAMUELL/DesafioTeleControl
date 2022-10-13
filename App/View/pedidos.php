<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!isset($_SESSION['id']))
    {
        
        header("Location: http://localhost/sistema-vendas/App/View/principal.php");

        die();
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

    <script type="text/javascript">
        var i = setInterval(function () {
    
        clearInterval(i);
    
        // O código desejado é apenas isto:
        document.getElementById("loadingPedidoPagina").style.display = "none";
        document.getElementById("conteudoPedido").style.display = "block";
        document.getElementById("foot").style.display = "block";
        document.getElementById("menuPrincipal").style.display = "block";

        

        }, 1200);

    

    </script> 
    

    

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
 
    <?php
        include_once "include/menu.php";
    ?>

    <br>
  
    <br>
    <br>
    <br>
    <div class="d-flex justify-content-center">
        <div id="loadingPedidoPagina" class="spinner-border m-9" role="status">
        <span class="sr-only ">Loading...</span>
        </div>
    </div>
    

    <div class="container"  id="conteudoPedido" style="display: none">
        
        <div class="row" id="coln" >
        

        <div class="card" id="colunaPedidos">
            
            
        </div>
        <br>
        
        

        
        </div>
        

       

       
        </div>
    </div>

    <br>
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div id="escondDiv">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
    <?php
        include_once "include/footer.php";
    ?>
    


    



    
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

        <div class="alert alert-danger" role="alertlogin" id="sucessoCarrinho">
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

    <!-- JavaScript Atualizar Página  -->
    <script src="js/pedidos.js"></script>
        
</body>
</html>
