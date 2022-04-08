function callPaginaPerfil(id){
  var link = "perfil.php"+"?"+id;
  window.location.href = link;
}


$('#form1').submit(function(event){
  event.preventDefault();

  $.ajax({
    url: "./consultaPessoa.php",
    method: 'GET',
    data: {'nome': $('#nome').val(),'email': $('#email').val(),'documento': $('#documento').val()},
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
        $('.tableBody').append('<tr class="table-light align-middle border border-dark"><td class="border">'
                                +result[i].idpessoa+'</td><td class="border">'
                                +result[i].nome+'</td><td class="border">'
                                +result[i].documento+'</td><td class="border">'
                                +result[i].dscontato+'</td><td class="border"><button class="btn btn-primary table-button" id="id='+(i+1)+'">Cadastro</button></td></tr>');
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