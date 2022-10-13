
function efetuarcadastro()
{
    var autoriza = true;
    carregaLoading()

    setTimeout(function(){
        var alerta =  document.getElementById('loading');
        alerta.style.display = "none";

    
   
        dados = {
            'nome' : $('#inputNome').val(),
            'email' :  $('#inputEmail4').val(),
            'senha' :  $('#inputPassword4').val(),
            'cep' :    $("#cep").val() ,
            'cidade' : $('#cidade').val(),
            'DataNascimento' :  $('#dataN').val() ,
            'cpf' : $('#cpf').val(),
            'complemento' : $('#complemento').val(),
            'bairro' : $('#bairro').val(),
            'numero' : $('#numero').val(),
            'logradouro' : $('#logradouro').val(),
            'cadastrando' : true
        }

        if(dados['nome'].length < 5  || dados['email'].length < 5 
        || dados['senha'].length < 5  || dados['cep'].length < 5
        || dados['cidade'].length < 5 || dados['DataNascimento'].length < 5
        || dados['cpf'].length < 5 || dados['complemento'].length < 5
        || dados['bairro'].length < 5 || dados['numero'].length < 2
        || dados['logradouro'].length < 5 || dados['cadastrando'].length < 5
        )
        {
            console.log("parou aqui validação 1")
            
            autoriza = false
            var mensagem = "Digite os dados corretamente";
            carregaAlerta(mensagem)
            limparDadosCadastro();
            setTimeout(function(){
                escondeAlerta();
                
                
            
        
            },2000);
            
            
        }

        console.log(dados['nome']);
        console.log(dados['email']);
        console.log(dados['senha']);
        console.log(dados['cep']);
        console.log(dados['cidade']);
        console.log(dados['DataNascimento']);
        console.log(dados['cpf'])
        console.log(dados['complemento'])
        console.log(dados['bairro'])
        console.log(dados['numero'])
        console.log(dados['logradouro'])


        
        if(autoriza){
            $.ajax({
                url: 'http://localhost/sistema-vendas/',
                type:'POST',
                data: dados,
                success: function(data){
                    setTimeout(function(){
                        
                        if(data.cadastro)
                        {
                            carregaSucesso();
                            setTimeout(function(){
                                limparDadosCadastro();
                                $('#sucesso').hide();
                                $("#exampleModal1").html(data.items); 

                            },2000)
                            
                        } else{
                            console.log("parou aqui validação 2")
                            var mensagem = "Digite os dados corretamente";
                            carregaAlerta(mensagem)
                            setTimeout(function(){
                                limparDadosCadastro();
                                escondeAlerta();

                            },2100)
                            
                        }
        
                        
                        
                        console.log(data);
                        
                        
        
        
        
        
                    },2000); // Esse milisegundo (1000) é tempo em milisegundo
                    
                   // $("#exampleModal1").html(data.items); 
                    //document.location.reload(true);
                },
                error: function(){
                    var mensagem = "Digite os dados corretamente";
                    carregaAlerta(mensagem)
                
                    setTimeout(function(){
                        limparDadosCadastro();
                        escondeAlerta();
                       
                        
                        
                        
        
        
        
        
                    },2000); // Esse milisegundo (1000) é tempo em milisegundo
                    
                }
        
            })

        }


    },2000)
    
    
    
}

function limparDadosCadastro()
{
    nome =  $('#inputNome').val('') 
    email = $('#inputEmail4').val('')
    senha = $('#inputPassword4').val('') 
    cep = $('#cep').val('')  
    cidade = $('#cidade').val('') 
    dataNasc =  $('#inputPassword4').val('') 

    cpf = $('#dataN').val('') 
    complemento = $('#complemento').val('')  
    bairro = $('#bairro').val('') 
    numero =  $('#numero').val('') 
    logradouro =  $('#logradouro').val('') 
    
}

function mascaraCpf()
{
    var cpf = document.getElementById('cpf');
    if(cpf.value.length == 3 || cpf.value.length == 7)
    {
        cpf.value+= ".";
        
    }else if (cpf.value.length == 11){
        cpf.value += "-";
    }
}

function mascaraData()
{
    var data = document.getElementById('dataN');
    if(data.value.length == 2 || data.value.length == 5)
    {
        data.value+= "/";
        
    }
    

}


function mascEbuscaAPI()
{
    
    var cep = $('#cep').val();
    console.log(cep)
    

    
   
    
    if(cep.length == 9 )
    {   
        carregaLoading()
        dados = {
            'cep' :  $('#cep').val(),
            'conectar' : true
        }
        console.log(dados)
        

        $.ajax({
            url: 'http://localhost/sistema-vendas/',
            type:'POST',
            data: dados,
            success: function(data){
                console.log('te')
                console.log(data);
                
                
                setTimeout(function(){
                    var load =  document.getElementById('loading');
                    load.style.display = "none";
                    
                    console.log(data);
                    if(data.logradouro != undefined)
                    {
                        var logradouro = data.logradouro;
                        var bairro = data.bairro;
                        var cidade = data.cidade;
                        document.getElementById("logradouro").value += logradouro;
                        document.getElementById("cidade").value += cidade;
                        document.getElementById("bairro").value += bairro;

                    }else
                    {
                        var mensagem = "Digite os dados corretamente";
                        carregaAlerta(mensagem)
                        setTimeout(function(){
                            document.getElementById("cep").value += "";
                            $('#alerta').hide();
                            
                        },2000)

                    }
                    

    
    
    
                },1000); // Esse milisegundo (1000) é tempo em milisegundo
            },
            error: function(){
                carregaLoading()
                var mensagem = "Digite os dados corretamente";
                carregaAlerta(mensagem)
                setTimeout(function(){
                    var load =  document.getElementById('loading');
                    load.style.display = "none";
                    document.getElementById("cep").value += "";
                    $('#alerta').hide();
                    
                },2000)
    
            }
    
        })
    }


    else if (cep.length == 5)
    {
       document.getElementById("cep").value += "-";  
    }

    
}
function carregaAlerta($mensagem)
{
    var alerta =  document.getElementById('alerta');
    alerta.style.display = "block";
    alerta.value = $mensagem

}
function escondeAlerta()
{
    var alerta =  document.getElementById('alerta');
    alerta.style.display = "none";

}
function carregaLoading()
{
    var load =  document.getElementById('loading');
    load.style.display = "block";

}
function escondeLoading()
{
    var load =  document.getElementById('loading');
    load.style.display = "none";
}

function carregaSucesso()
{
    var sucesso =  document.getElementById('sucesso');
    sucesso.style.display = "block";
    
}

function escondeSucesso()
{
    var sucesso =  document.getElementById('sucesso');
    sucesso.style.display = "none";
}