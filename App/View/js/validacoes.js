

function logando()
{
    carregaLoadinge()

    
    

    setTimeout(function(){
        escondeLoadinge()
       
        
        

        
        
    
    

        var realizaLogin = true;

        console.log(realizaLogin)
        
        valores = {
            'emailLogin': $('#login').val(),
            'senhaLogin': $('#senhalogin').val(),
            'login': true
        }
        console.log(valores)

        if(valores['emailLogin'].length < 5 || valores['senhaLogin'].length < 5 )
        {
            

            realizaLogin = false
            carregaAlertaLogin()
            
        

            setTimeout(function(){
                
                escondeAlertaLogin()


                

            

               
                
                console.log('entrou aqui 2 set')
                

                limparCamposLogin()
                
            },3000);


        }  


            

        
        console.log('entrou aqui 1 set')


        console.log(realizaLogin)

        if(realizaLogin)
        {
            console.log(valores)

            $.ajax({
                url: 'http://localhost/sistema-vendas/',
                type:'POST',
                data: valores,
                success: function(datas){
                    
                    console.log(datas);
                        
                    setTimeout(function(){
                        escondeLoadinge()

                        console.log('Entrou aqui REALIZA LOGIN')
            
                            
                            
                        if(datas.realiza)
                        {
                            carregaSucessoLogin()
                            setTimeout(function(){
                                escondeSucessoLogin();
                                
                                if(datas.id == 1)
                                {
            
                                        
                                
            
                                    limparCamposLogin()
            
                                    setTimeout(function(){
                                        esconderModalLogin()
                                        window.location.href = "http://localhost/sistema-vendas/App/View/paineladministrativo.php";
                                



                                    },1000);
                                    
                                    
                                   
                                }
                                   
            
                                    
                                limparCamposLogin()
                                setTimeout(function(){
                                    console.log("modal sair")
                                    esconderModalLogin()
                                    document.location.reload(true);
                                    listandocarrinhoo();



                                },1000);
                                    

                                   
                                    
                                    
                                    
                                    
                                    

                                
                                
                               
                                
                            },2000);
                            
                            
            
                        }else
                        {
                            carregaAlertaLogin()
                            setTimeout( function(){
                                escondeAlertaLogin()


                            },2000);
        
                            console.log('não logado')
                        }
            
            
                        },2000); // Esse milisegundo (1000) é tempo em milisegundo
                        escondeAlertaLogin();
                        limparCamposLogin()
                        escondeSucessoLogin()
                    },
                    error: function(){
                        escondeLoadinge();
                        carregaAlertaLogin();
                       
                        setTimeout(function(){
                            //escondeAlertaLogin()
        
                            
                            
                            
            
            
            
            
                        },3000); // Esse milisegundo (1000) é tempo em milisegundo
                       
                        limparCamposLogin()
                        
            
                    }
            
                })
            
        
        
        
        
    
            

            
            
            

        }

    },2000);
    
    
  
   
    
}


 function carregaAlertaLogin()
{
    var alertaLogin =  document.getElementById('alertalogin');
    alertaLogin.style.display = "block";

}
function escondeAlertaLogin()
{
    var alerta =  document.getElementById('alertalogin');
    alerta.style.display = "none";

}
function carregaLoadinge()
{
    var loadLogin =  document.getElementById('loadinglogin');
    loadLogin.style.display = "block";

}
function escondeLoadinge()
{
    var loadLoginEs =  document.getElementById('loadinglogin');
    loadLoginEs.style.display = "none";
}

function carregaSucessoLogin()
{
    var sucessoLogi =  document.getElementById('sucessologin');
    sucessoLogi.style.display = "block";
    
}

function escondeSucessoLogin()
{
    var sucessoLogies =  document.getElementById('sucessologin');
    sucessoLogies.style.display = "none";
}

function esconderModalLogin(){

    
    $("[data-dismiss=modal]").trigger({ type: "click" });

}

function pedidosRedi()
{
    window.location.href = "http://localhost/sistema-vendas/App/View/pedidos.php";
                                

}

function limparCamposLogin()
{
    email = $('#login').val('')
    senha = $('#senhalogin').val('') 
}


function listandocarrinhoo()
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

listandocarrinhoo();