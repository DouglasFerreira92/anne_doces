<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div style="width:600px;margin-left:20%;">

  <div class="venda-create">
          <div class="box-header with-border">
            <h3 class="box-title">Registrar venda</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
        <?php $counter1=-1;  if( isset($cliente) && ( is_array($cliente) || $cliente instanceof Traversable ) && sizeof($cliente) ) foreach( $cliente as $key1 => $value1 ){ $counter1++; ?>  
            <div class="box-body">


              <div class="form-group">
                <input type="text"  class="hidden form-control" id="fidclient" value="<?php echo htmlspecialchars( $value1["idclient"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="fidclient" >
              </div>

              <div class="form-group">
                <label for="deslogin">Nome Cliente</label>
                <input type="text" class="form-control" id="desnome" readonly value="<?php echo htmlspecialchars( $value1["desnome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="desnome" placeholder="">
              </div>

              <div class="form-group">
                <label for="deslogin">Telefone</label>
                <input type="text" class="form-control" id="destel" readonly name="destel" value="<?php echo htmlspecialchars( $value1["destel"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>

              <div class="form-group">
                <label for="despassword">Endereco/Rua</label>
                <input type="text" class="form-control" readonly value="<?php echo htmlspecialchars( $value1["desrua"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["desnum"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="desrua" name="desrua" placeholder="Digite a senha">
              </div>


            </div>
            <!-- /.box-body -->
            
           <?php } ?> 

        <div id="venda-create">
          <div class="box box-success">

              <div class="form-group">
                <label for="deslogin">Descricao</label>
                <input type="text" class="form-control" id="desc" placeholder="Descrição do Produto">
              </div>

              <div class="form-group">
                <label for="deslogin">Quantidade</label>
                <input type="text" class="form-control" id="desqtn" name="desqtn" placeholder="Quantidade do produto">
              </div>

              <div class="form-group">
                <label for="despassword">Valor</label>
                <input type="text" class="form-control"  id="desvalor" name="desvalor" placeholder="Valor da compra">
              </div>

              <div class="box-footer">
              <button class="btn_compra btn btn-success" id="">Confirmar</button>
              </div>
              <span class="visor" class="alert-danger"></span>

        </div>
          </div>
      </div> 
    </div>           
</div>

<script type="text/javascript" src="/anne_doces/public/script/java_script/venda-create.js"></script>

<!--



  
<script type="text/javascript">
  
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

</script>
-->
