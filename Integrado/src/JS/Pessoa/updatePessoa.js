$('#form1').submit(function(event){
    event.preventDefault();

    const urlParam = new URLSearchParams(window.location.search);

    var idValor = urlParam.get('id')

    console.log(idValor);
    console.log($('#nome').val())
    console.log($('#documento').val())
    console.log($('#natureza').val())
    console.log($('#cliente').is(':checked'))
    console.log($('#fornecedor').is(':checked'))
    console.log($('#aniversario').val())
    console.log($('#comentario').val())
    console.log($('#email').val())
    console.log($('#telefone').val())
    console.log($('#rua').val())
    console.log($('#logradouro').val())
    console.log($('#cidade').val())

    updatePessoa();

});


function updatePessoa(){

  $.ajax({
    url: "./updatePessoaCadastro.php",
    method: 'POST',
    data: {'id':idValor,'nome': $('#nome').val(),'documento': $('#documento').val(),'natureza': $('#natureza').val(),'cliente': $('#cliente').is(':checked'),
           'fornecedor': $('#fornecedor').is(':checked'),'aniversario': $('#aniversario').val(),'comentario': $('#comentario').val(), 'dsemail': $('#email').val(),
           'dstelefone': $('#telefone').val(), 'rua': $('#rua').val(),'logradouro': $('#logradouro').val(), 'cidade': $('#cidade').val()},
    dataType: 'json',
    error:function(request){
      console.log(request.responseText);
    }
  }).done(function(result){
      console.log(result);
      alert('Alteração realizada');
      window.location.href = "./pessoa.php";
  });
};