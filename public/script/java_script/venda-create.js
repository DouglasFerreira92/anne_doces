  
$(document).ready(function(){

  $(".btn_compra").click(function(){

    var fidclient = $("#fidclient").val()
    var descricao = $("#desc").val()
    var desqtn = $("#desqtn").val()
    var desvalor = $("#desvalor").val()

    if(descricao == '' || desqtn == '' || desvalor=='')
    {
      alert("Você precisa preencher todos os campos")
    }else{
      $.ajax({
        url: "http://localhost/anne_doces/admin/compraInsert",
        type: "POST",
        dataType:"html",
        data: {descricao,desqtn,desvalor,fidclient},
        beforeSend:function(){
          $(".visor").html("Carregando...")
        },
        success:function(retorno){
          $(".venda-create").html(retorno)
        },
        error:function(){
          $(".visor").html("Não foi possivel cadastrar")
        }
      });
    }

   
  })
  
});