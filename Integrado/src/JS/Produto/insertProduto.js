$('#form1').submit(function(event){
    event.preventDefault();

    insertProduto();
});



function insertProduto(){
  $.ajax({
    url: "./insertProdutoCadastro.php",
    method: 'POST',
    data: {'nome': $('#nome').val(),'valor': $('#valor').val(),'estoque': $('#estoque').checked(),'composto': $('#composto').checked()},
    dataType: 'json',
    error:function(request){
      console.log(request.responseText);
    }
  }).done(function(event){
      console.log(event);
      location.reload();
  });
};




//'op': operacao, 'id': idValor