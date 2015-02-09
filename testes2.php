<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="js/jquery-1.11.0.js"></script>
  <title>Document</title>


  <script>
  $(document).ready(function() {

       
var endereco = 'testes.php',
    dados = document.querySelector(".dados");

$.ajax({
   dataType: "json",
   cache:false,
   url: endereco,
   beforeSend: function() {
      $("h2").html("Carregando...");
   },
   complete: function(res) {
        var meuJSON = JSON.parse(res.responseText);

        for (var cont = 0; cont < meuJSON.length; cont++) {
          console.log(meuJSON[cont].nome);
          console.log(meuJSON[cont].login);
          console.log(meuJSON[cont].senha); 
            dados.innerHTML += "<li>" + meuJSON[cont].nome + "</li>";

        }

        $("h2").html("Dados carregados");
    }
});

  });
  </script>
</head>
<body>


<h2>Esperando</h2>
  
  
<ul class="dados">
  
</ul>
  
</body>
</html>