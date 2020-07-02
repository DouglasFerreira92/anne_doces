 $(document).ready(function(){

    $("#logar").click(function(){
      var login = $('#login').val()
      var password = $('#senha').val()
      if(login != '' && password != '')
      {
        $.ajax({
          url:"http://localhost/anne_doces/admin/logar",
          type:"POST",
          dataType:"html",
          data:{login,password},
          beforeSend:function(){
            $("#visor").html("<span class='alert-success'>Carregando...</span>")
          },
          success:function(retorno){
            $(location).attr('href',retorno);
          },
          error:function(){
            $("#visor").html("<span class='alert-danger'>Usuário inexistente ou senha inválida</span>")
          }
        });

      }else if(login == ''){
        $("#visor").html("<span class='alert-danger'>Login não pode ser vazio</span>")
        $("#login").css("border-color","red")
        $("#senha").css("border-color","")
      }else if(password == ''){
        $("#visor").html("<span class='alert-danger'>Senha não pode ser vazia</span>")
        $("#senha").css("border-color","red")
        $("#login").css("border-color","")
      }

    });


  });
