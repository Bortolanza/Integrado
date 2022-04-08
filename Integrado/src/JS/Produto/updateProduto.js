$('#form1').submit(function(event){
    event.preventDefault();

    const urlParam = new URLSearchParams(window.location.search);

    var idValor = urlParam.get('id')

    console.log(idValor);
    console.log($('#nome').val())
    console.log($('#valor').val())
    console.log($('#composto').is(':checked'))
    console.log($('#estoque').is(':checked'))


    updateProduto();

});



function updateProduto(){

  $.ajax({
    url: "./updateProdutoCadastro.php",
    method: 'POST',
    data: {'id':idValor,'nome': $('#nome').val(),'valor': $('#valor').val(),'estoque': $('#estoque').is(':checked'),
           'composto': $('#composto').is(':checked')},
    dataType: 'json',
    error:function(request){
      console.log(request.responseText);
    }
  }).done(function(result){
      console.log(result);
      alert('Alteração realizada');
      window.location.href = "./produto.php";
  });
  
};