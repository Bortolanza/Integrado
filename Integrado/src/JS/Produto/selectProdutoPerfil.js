const urlParam = new URLSearchParams(window.location.search);

const idValor = urlParam.get('id');

var inputsBoxes = document.querySelectorAll('.form-control')

$.ajax({
    url: "./consultaProdutoPerfil.php",
    method: 'GET',
    data: {'id': idValor},
    dataType: 'json',
    error:function(request){
      console.log(request.responseText);
    }
  }).done(function(result){

    if (result.length > 0){
        
        document.getElementById('nome').value = result[0].nome;
        document.getElementById('valor').value = String(result[0].valor);
        
        if (result[0].composto == 1){
          document.getElementById('composto').checked = true;
        }else{
          document.getElementById('composto').checked = false;
        };
        
        if (result[0].estoque == 1){
          document.getElementById('estoque').checked = true;
        }else{
          document.getElementById('estoque').checked = false;
        };
        
      }else{
        /*$('.tableBody').prepend('<tr class="table-light align-middle border border-dark"><td class="border">'
                                  +'NENHUM'+'</td><td class="border">'
                                  +'REGISTRO'+'</td><td class="border">'
                                  +'ENCONTRADO'+'</td><td class="border">'
                                  +'NA CONSULTA'+'</td><td class="border"><button class="btn btn-primary table-button">NÃO TEM CADASTRO</button></td></tr>')*/
      };

}); 


