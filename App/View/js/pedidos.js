




function carregarPedidos()
{
    $('#colunaPedidos').empty();
    
    dados = {
        'listarPedidos' : true
    }
    $.ajax({
        url:  'http://localhost/sistema-vendas/',
        type: 'POST',
        data: dados,
        success: function(data){

            //console.log(data.valores[0][0].itens_pedido)
            
           
            //console.log(data.valores[0])
           
            console.log(data.valores[0].length)
           
            if(data.valores[0].length > 0)
            {
                for(var i = 0 ; i < data.valores[0].length; i++)
                {
                    itens = data.valores[0][i].itens_pedido; 
                    itemfo = []
                    lista = {
                        'idPedido': "",
                        'endereco' : "",
                        "status": "",
                        "total":"",
                        "data":"",
                        "cep":"",
    
                        
    
                        
                    }
                    lista['idPedido']+= data.valores[0][i].idPedido;
                    lista['endereco']= data.valores[0][i].endereco;
                    lista['status']= data.valores[0][i].status;
                    lista['total']= data.valores[0][i].total;
                    lista['data']= data.valores[0][i].dataPed;
                    lista['cep']= data.valores[0][i].cep;
    
                   
                    
    
                    
    
                    const con = JSON.parse(itens)
                    itemfo.push(con)
    
                    lista['itemPedido'] = itemfo;
                    //console.log(lista['itemPedido'])
    
                    //console.log(lista)
                   
    
                    for(var j = 0; j<lista['itemPedido'][0].length;j++ )
                    {
                        //console.log(lista['itemPedido'][0][j].id_produto)
                        //console.log(lista['itemPedido'][0][j].valor)
                        //console.log(lista.status)
                        //console.log(lista.total)
    
                        $('#colunaPedidos').append('<h5 class="card-header">Pedido: '+'#'+ lista.idPedido  +'</h5><div class="card-body">  <h5 class="card-title">'+ lista['itemPedido'][0][j].nome_produto    +'</h5>  <p class="card-text"><strong>Endereço de Entrega:</strong>'+ lista.endereco+'</p> <p class="card-text"><strong>Qtd:</strong>'+lista['itemPedido'][0][j].quantidade +  '</p>    <p class="card-text"><strong>Preço:</strong> '+ lista['itemPedido'][0][j].valor +'</p>    <p class="card-text"><strong>Data do pedido: '+ lista.data +'</strong> </p>  <br>     <p> ---------------------------------------------------------------------------------------------------------------- </p>')
    
                    }
    
                   
    
                
    
                    //console.log(lista['itemPedido'][0].length)
                    $('#colunaPedidos').append('<a  class="btn btn-primary">Contate a Empresa</a><a  class="btn btn-danger">Total: R$'+lista.total+'</a><a  class="btn btn-success">Rastrear</a>')
                   
    
    
    
    
    
    
    
    
                    //lista={}
    
    
                }
    
               //console.log(lista)







            }else{
                $('#coln').append(' <div class="d-flex justify-content-center"><p class="h4">Nenhum Pedido Feito</p></div>')
                $('#colunaPedidos').hide()
                $('#escondDiv').hide();
               
                
            }

           
        },error: function(){
            console.log('error')

        }
    })


}



carregarPedidos();