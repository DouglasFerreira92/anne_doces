<?php if(!class_exists('Rain\Tpl')){exit;}?>


<div style="width:600px;margin-left:20%;margin-top:5%;">
        <div class="venda-create">
          <h1>Criar uma venda</h1>
          <div class="box box-success">

              <div class="form-group">
                <input type="text"  class="hidden form-control" id="fidclient" value="0" name="fidclient" >
              </div>
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
              <button class="btn_compra btn btn-success" >Confirmar</button>
              </div>
              <span class="visor" class="alert-danger"></span>

          </div>
        </div>
</div>        
