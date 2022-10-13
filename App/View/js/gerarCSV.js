
function gerarRelatorioCSV()
{
    

    dados = {
        'listar' : true
    }
    $.ajax({
        url:  'http://localhost/sistema-vendas/',
        type: 'POST',
        data: dados,
        success: function(data){
            var csv = 'codigo, nome, descricao, valor\n';
            
            
            if(data.produtos.length > 0){
            for(var i = 0 ; i < data.produtos.length; i++ )
                {
                  
                    console.log(data.produtos[i].foto)
                    csv += data.produtos[i].id;
                    csv += ','+ data.produtos[i].nome;
                    csv += ','+ data.produtos[i].descricao;
                    csv += ','+ data.produtos[i].valor;
                    csv += '\n';
                    
                }
                var hiddenElement = document.createElement('a');
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                hiddenElement.target = '_blank';
                hiddenElement.download = 'RelatorioProdutos.csv';
                hiddenElement.click();
            }
            
            
           
            
        },error: function(){
            console.log('error')

        }
    })
}
