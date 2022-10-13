
function cadastrarProtuto()
{
    carregarLoadingPainel()
    setTimeout(function(){
        esconderLoadingPainel()
        var form_data = new FormData(); 
        var file_data =  $('#fotoProduto')[0].files[0];
        form_data.append('fileFotoProduto', file_data);
        form_data.append('nomeProduto', $('#nomeProduto').val());
        form_data.append('descricaoProduto', $('#descricaoProduto').val());
        form_data.append('precoProduto', $('#precoProduto').val());
        form_data.append('cadasPro',true);


    
        console.log(form_data);
    

        $.ajax({
            url:  'http://localhost/sistema-vendas/',
            type: 'POST',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){

                
                if(data.error)
                {
                    limparCampoPainel();
                    carregarAlertaPainel();
                    setTimeout(function(){
                        esconderAlertaPainel();

                    },2000)

                    console.log(data.mensagem)
                }else
                {
                    limparCampoPainel()
                    carregarSucesso()
                    setTimeout(function(){
                        esconderLoadingPainel();

                    },2000)
                   
                }
                
            
                
            },error: function(){
                limparCampoPainel()
                carregarAlertaPainel();
                setTimeout(function(){
                    esconderAlertaPainel();

                },2000)


            }
        })

    },1000);

}


function listarProdutos()
{
    dados = {
        'listar' : true
    }
    $.ajax({
        url:  'http://localhost/sistema-vendas/',
        type: 'POST',
        data: dados,
        success: function(data){
            console.log("entrou listando:")
            
            
            if(data.produtos.length > 0){
            for(var i = 0 ; i < data.produtos.length; i++ )
                {

                    
                    $('#bodyTab').append("<tr><th scope='row'>1</th> <td>"+data.produtos[i].id+"</td><td>"+data.produtos[i].nome+"</td><td>"+data.produtos[i].foto+"</td><td>"+data.produtos[i].valor+"</td></tr>")
                    
                    console.log(data.produtos[i].nome_arquivo)
                    
                }
            }
            
           
            
        },error: function(){
            console.log('error')

        }
    })





}

function listarPedidos()
{

    
    
    dados = {
        'listarPedidos' : true
    }
    $.ajax({
        url:  'http://localhost/sistema-vendas/',
        type: 'POST',
        data: dados,
        success: function(data){

           
           
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
                   
                   
    
                    for(var j = 0; j<lista['itemPedido'][0].length;j++ )
                    {
                       
                        $('#bodyTabPedidos').append("<tr><th scope='row'>1</th> <td>"+ lista.idPedido +"</td><td>"+lista.endereco+"</td><td>"+lista.status+"</td>")
                    
                    
                    }
    
                   
    
                
    
                   
    
    
    
    
    
    
    
    
    
    
                }
    
            







            }else{
               
                
            }

           
        },error: function(){
            console.log('error')

        }
    })

































}

function sair()
{
    saindo = {
        'sair': true
    }

    $.ajax({
        url: 'http://localhost/sistema-vendas/',
        type:'POST',
        data: saindo,
        success: function(datas){
            if(datas.redirecionar)
            {
                window.location.href = "http://localhost/sistema-vendas/";
            }
        },
        error: function(){
        }
    });
}

function carregarLoadingPainel()
{
    var sucessoLogies =  document.getElementById('loadingPainelADM');
    sucessoLogies.style.display = "block";

}

function esconderLoadingPainel()
{
    var sucessoLogies =  document.getElementById('loadingPainelADM');
    sucessoLogies.style.display = "none";

}

function carregarSucesso()
{
    var sucessoLogies =  document.getElementById('sucessoPainel');
    sucessoLogies.style.display = "block";

    
}

function esconderSucesso()
{
    var sucessoLogies =  document.getElementById('sucessoPainel');
    sucessoLogies.style.display = "none";

    
}
function carregarAlertaPainel()
{
    var sucessoLogies =  document.getElementById('alertaPainel');
    sucessoLogies.style.display = "block";

}

function esconderAlertaPainel()
{
    var sucessoLogies =  document.getElementById('alertaPainel');
    sucessoLogies.style.display = "none";

}
function limparCampoPainel()
{
    
    nome_produto = $('#nomeProduto').val('')
    file = $('#fotoProduto').val('') 
    descricao = $('#descricaoProduto').val('')
    senha = $('#precoProduto').val('') 

}




listarProdutos(); 
