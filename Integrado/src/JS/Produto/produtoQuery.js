function callPaginaPerfil(id){
    var link = "perfilProduto.php"+"?"+id;
    window.location.href = link;
  }
  
  
  $('#form1').submit(function(event){
    event.preventDefault();
  
    $.ajax({
      url: "./consultaProduto.php",
      method: 'GET',
      data: {'nome': $('#nome').val(),},
      dataType: 'json',
      error:function(request){
        console.log(request.responseText);
      }
    }).done(function(result){
      console.log(result);
  
      $('.tableBody tr').remove();    
  
      var table = document.getElementById("table-1");
      if (result.length > 0){
        for (var i = 0; i < result.length; i++){

          if (result[i].estoque == 1){
            result[i].estoque = 'Sim';
          }else{
            result[i].estoque = 'Não';
          }

          if (result[i].composto == 1){
            result[i].composto = 'Sim';
          }else{
            result[i].composto = 'Não';
          }

          $('.tableBody').append('<tr class="table-light align-middle border border-dark"><td class="border">'
                                  +result[i].idproduto+'</td><td class="border">'
                                  +result[i].nome+'</td><td class="border">'
                                  +result[i].composto+'</td><td class="border">'
                                  +result[i].estoque+'</td><td class="border"><button class="btn btn-primary table-button" id="id='+(result[i].idproduto)+'">Cadastro</button></td></tr>');
          table.classList.remove("invisible");
        };
  
        var cadButtons = document.querySelectorAll(".table-button");
        cadButtons.forEach(cadButton =>{
          cadButton.addEventListener('click',function(event){
            callPaginaPerfil(event.target.id);
          });
        });         
      }else{
        table.classList.add("invisible");                             
        alert('Nenhum registro encontrado!');   
      };
    });
  });