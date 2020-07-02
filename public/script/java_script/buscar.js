  $(document).ready(function(){


    $("#btn_buscar").click(function(){

      var palavra = $("#id_buscar").val()
      var pagina_reg = $("#id_registro").val()
      var offset = 0 

      if(palavra == ""){
        $(".dados").html("<span class='alert alert-danger'>Campo de pesquisa não pode ser vazio</span>")
      }else{
        enviar(palavra,pagina_reg,offset)
      }
    });


    function enviar(palavra='',pagina_reg='',offset=''){

      $.ajax({

        type: "POST",
        dataType:"html",
        data:{palavra,pagina_reg,offset},
        url: "http://localhost/anne_doces/admin/search",

      }).done(function(retorno){
        
        //COLOCA O RETORNO
        $(".dados").html(retorno)

        $(".paginar").click(function(){

        //PEGA VALOR DA PAGINA CLICADA
        var pag_clicada = $(this).data("pagina_clicada")
        //TIRA 1 PARA AJUSTAR O OFFSET
        --pag_clicada
        //ATUALIZA OFFSET
        var pagina_reg = $("#id_registro").val();
        var offset_atual = pagina_reg * pag_clicada
        
        //FUNÇÃO PARA CADA BOTÃO PAGINAR
          enviar(palavra , pagina_reg , offset_atual);
        })

      })

    }

    
     $("#btn_listar").click(function(){

      //var palavra = $("#id_buscar").val()
      var pagina_reg = $("#id_registro").val()
      var offset = 0 

      enviar(palavra='',pagina_reg,offset)
      
    });

  })
