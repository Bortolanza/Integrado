$('#form1').submit(function(event){
    event.preventDefault();

    console.log($('#natureza').val());

    insertPessoa();
});





function insertPessoa(){
  $.ajax({
    url: "./insertPessoaCadastro.php",
    method: 'POST',
    data: {'nome': $('#nome').val(),'documento': $('#documento').val(),'natureza': $('#natureza').val(),'cliente': $('#cliente').is(':checked'),
           'fornecedor': $('#fornecedor').is(':checked'),'aniversario': $('#aniversario').val(),'comentario': $('#comentario').val(), 
           'dsemail': $('#email').val(),'dstelefone': $('#telefone').val(), 'rua': $('#rua').val(),'logradouro': $('#logradouro').val(), 'cidade': $('#cidade').val()},
    dataType: 'json',
    error:function(request){
      console.log(request.responseText);
      // alert('Valor obrigatório não preenchido');
    }
  }).done(function(event){
    console.log(event);
      console.log(event)
      location.reload();
  });
};




//'op': operacao, 'id': idValor