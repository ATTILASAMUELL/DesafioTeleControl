carregaProdutos();

$(document).ready(function(){
    listandocarrinho()
        
        
    setInterval(()=>{
        
      
        
        

    }, 1000);
        
})  

function carregaProdutos()
{
    console.log('isaac')

    dados = {
        'listar' : true
    }
    $.ajax({
        url:  'http://localhost/sistema-vendas/',
        type: 'POST',
        data: dados,
        success: function(data){
            console.log("entrou listando:")
            $('#coluna').empty();
            
            
            if(data.produtos.length > 0){
            for(var i = 0 ; i < data.produtos.length; i++ )
                {
                    $('#coluna').append('<div class="card-group"><div class="card m-1" style="width: 18rem;"><img class="card-img-top" src="'+data.produtos[i].foto+'"  height="150" width="150" alt="Card image cap"><div class="card-body"><h5 maxlength="17" class="card-title">'+data.produtos[i].nome+ '</h5><p class="card-text" maxlength="19">'+data.produtos[i].descricao+ ' </p><a  class="btn btn-primary" id="taga" maxlength="7">R$ '+data.produtos[i].valor+ '</a><button  onClick="adicionarCarrinho('+data.produtos[i].id+')" class="btn btn-success" id="btnCar">Adicionar</button></div></div>')
                    

                    //$('#coluna').append('<div class="card-group"><div class="card m-1" style="width: 18rem;"><img class="card-img-top" src="'+data.produtos[i].foto+'"  height="150" width="190" alt="Card image cap"><div class="card-body"><h5 maxlength="17" class="card-title">'+data.produtos[i].nome+ '</h5><p class="card-text" maxlength="19">'+data.produtos[i].descricao+ ' </p><a  class="btn btn-primary" maxlength="7">R$ '+data.produtos[i].valor+ '</a><button  onClick="listandocarrinho()" class="btn btn-success">Adicionar Carrinho</button></div></div>')

                  
                    //console.log(data.produtos[i].nome_arquivo)
                    //console.log(data.produtos[i].nome)
                    
                }
            }
            
           
            
        },error: function(){
            console.log('error')

        }
    })
}


function adicionarCarrinho(id)
{
    if(id){
        
        listandocarrinho();

        dados = {
            'salvarCarrinho' : true,
            'id' : id
        }
        $.ajax({
            url:  'http://localhost/sistema-vendas/',
            type: 'POST',
            data: dados,
            success: function(data){
                console.log(data);
                listandocarrinho()
            
                
            
                
            },error: function(){
                console.log('error')

            }
        })

    }else
    {
        $('#exampleModal2').modal('show')
        //$("#exampleModal2").modal();
       
    }
    

}

function listandocarrinho()
{
    $('#carADD').empty();
    listarCa = {
        'listandoCarrinho' : true,
        
    }
    $.ajax({
        url:  'http://localhost/sistema-vendas/',
        type: 'POST',
        data: listarCa,
        success: function(data){
            console.log('listando:')
            console.log(data.valores);
            var soma = 0.0;
            var totalSpan = 0;
            if(data.error == false && data.valores !=  null ){
                $('#resuCarrinho').hide();
                
                for(var i = 0 ; i < data.valores.length; i++ )
                {

                    soma += +data.valores[i].valor;
                    totalSpan += +data.valores[i].qtd;
                    console.log(totalSpan);
                    
                   

                    
                    $('#carADD').append('<div class="col-sm-6"><div class="card"> <div class="card-body">  <h5 class="card-title">'+ data.valores[i].nome +'</h5> <img class="card-img-top" src="'+data.valores[i].foto+'" height="100px" width="100px" alt="Card image cap"> <p class="card-text">'+ data.valores[i].descricao + '</p> <p class="card-text">'+'Qtd:'+ data.valores[i].qtd+'</p> <a onclick="deletarCarrinho('+ data.valores[i].id +')" class="btn btn-danger">Tirar</a></div></div></div>')

                  
                    $('#iconeCarrinho').text(totalSpan);

                }
                
                if(soma.length < 0){
                    console.log('vazio')
                }else{
                    $('#totalCarrinho').show();
                    $('#CancelarCarrinho').show();
                    var totalforma = soma.toLocaleString();
                    var convercao = totalforma.toString();
                    console.log(soma.toLocaleString())
                    $('#totalCarrinho').text( 'Comprar   R$: '+convercao)

                }

                //console.log(convertendo.number.toLocaleString())
            }else{
                $('#iconeCarrinho').text("");
                $('#resuCarrinho').show();
                $('#resuCarrinho').val('Carrinho vazio')
                $('#totalCarrinho').hide();
                $('#CancelarCarrinho').hide();
                
            }
           
            
           
            
        },error: function(){
            console.log('error')

        }
    })
}

function deletarCarrinho(id)
{
    if(id)
    {
        
        deletarCarri = {
            'deletarItemCarrinho' : true,
            'idCarr' : id
            
        }
        $.ajax({
            url:  'http://localhost/sistema-vendas/',
            type: 'POST',
            data: deletarCarri,
            success: function(data){
                listandocarrinho()

                
               
                
               
                
            },error: function(){
                console.log('error')
                listandocarrinho()
    
            }
        })

























    }

}


function fazerPedido()
{
    aparecerLoading()

    setTimeout(function(){
        escondeLoading()
        dados = {
            'fazerPedido' : true
        }
        $.ajax({
            url:  'http://localhost/sistema-vendas/',
            type: 'POST',
            data: dados,
            success: function(data){
                if(data.pedido)
                {
                    apareceSucessoCarrinho()

                    setTimeout(function(){
                        escondeSucessoCarrinho
                        
                        listandocarrinho();
                        setTimeout(function(){
                            $(location).attr('href', 'http://localhost/sistema-vendas/App/View/pedidos.php');
                        


                        },2200)

                        
                            
                        
                          

                       
                        
                              
                        
    
                    },1500)
                    
                }
               
               
                
            },error: function(){
                apareceAlertaCarrinho()

                    setTimeout(function(){
                        escondeAlertaCarrinho()
                        listandocarrinho();
                        
    
                    },2000)
                
    
            }
        })
    

    },2000)

    
    
}


function aparecerLoading()
{
    var sucessoLogi =  document.getElementById('loadingCarrinho');
    sucessoLogi.style.display = "block";
}

function escondeLoading()
{
    var sucessoLogi =  document.getElementById('loadingCarrinho');
    sucessoLogi.style.display = "none";

}

function apareceSucessoCarrinho()
{
    var sucessoLogi =  document.getElementById('sucessoCarrinho');
    sucessoLogi.style.display = "block";

}

function escondeSucessoCarrinho()
{
    var sucessoLogi =  document.getElementById('sucessoCarrinho');
    sucessoLogi.style.display = "none";

}

function apareceAlertaCarrinho()
{
    var sucessoLogi =  document.getElementById('AlertaCarrinho');
    sucessoLogi.style.display = "block";

}
function escondeAlertaCarrinho()
{
    var sucessoLogi =  document.getElementById('AlertaCarrinho');
    sucessoLogi.style.display = "none";

}
listandocarrinho()

function sair()
{
    valores = {
        'sair': true
    }

    $.ajax({
        url: 'http://localhost/sistema-vendas/',
        type:'POST',
        data: valores,
        success: function(datas){
            console.log(datas);
            if(datas.redirecionar)
            {
                window.location.href = "http://localhost/sistema-vendas/";
            }
        },
        error: function(){
        }
    });
}




























   
   



