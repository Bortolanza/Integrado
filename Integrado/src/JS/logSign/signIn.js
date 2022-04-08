$('#form1').submit(function(event){
    event.preventDefault();

    insertUsuario();
    window.location.href = "http://localhost/";
});

var loc = window.location.pathname;
console.log(loc);

function insertUsuario(){
  $.ajax({
    url: "./insertUsuario.php",
    method: 'POST',
    data: {'usuario': $('#usuario').val(),'senha':$('#usuario').val(),'nome': $('#nome').val()},
    dataType: 'json',
    error:function(request){
      console.log(request.responseText);
    }
  });
};