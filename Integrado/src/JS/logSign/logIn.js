$('#form1').submit(function(event){
    event.preventDefault();

    ConsultatUsuario();
});

function ConsultatUsuario(){
  $.ajax({
    url: "./src/PHP/Home/selectUsuario.php",
    method: 'POST',
    data: {'usuario': $('#usuario').val(),'senha':$('#senha').val()},
    dataType: 'json',
    error:function(request){
      console.log(request.responseText);
    }
  }).done(function(){
    window.location.href = "./src/PHP/Home/home.php";
  });
};