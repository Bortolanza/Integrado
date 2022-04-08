const urlParam = new URLSearchParams(window.location.search);

const idValor = urlParam.get('id');

var inputsBoxes = document.querySelectorAll('.form-control')

$.ajax({
    url: "./consultaPerfil.php",
    method: 'GET',
    data: {'id': idValor},
    dataType: 'json',
    error:function(request){
      console.log(request.responseText);
    }
  }).done(function(result){

    console.log(result);
    console.log(result[0].fornecedor);

    if (result.length > 0){
        document.getElementById('nome').value = result[0].nome;
        document.getElementById('documento').value = result[0].documento;
        document.getElementById('aniversario').value = result[0].aniversario;
        document.getElementById('comentario').value = result[0].comentario;
        
        if (result[0].cliente == 'true'){
          document.getElementById('cliente').checked = true;
        }else{
          document.getElementById('cliente').checked = false;
        };
        
        if (result[0].fornecedor == 'true'){
          document.getElementById('fornecedor').checked = true;
        }else{
          document.getElementById('fornecedor').checked = false;
        };
        
        document.getElementById('natureza').value = result[0].natureza;
        document.getElementById('telefone').value = result[0].dstelefone;
        document.getElementById('email').value = result[0].dsemail;
        document.getElementById('cidade').value = result[0].cidade;
        document.getElementById('logradouro').value = result[0].logradouro;
        document.getElementById('rua').value = result[0].rua;
        
      }else{
        /*$('.tableBody').prepend('<tr class="table-light align-middle border border-dark"><td class="border">'
                                  +'NENHUM'+'</td><td class="border">'
                                  +'REGISTRO'+'</td><td class="border">'
                                  +'ENCONTRADO'+'</td><td class="border">'
                                  +'NA CONSULTA'+'</td><td class="border"><button class="btn btn-primary table-button">NÃO TEM CADASTRO</button></td></tr>')*/
      };

}); 


