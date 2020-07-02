<?php if(!class_exists('Rain\Tpl')){exit;}?><h1>Lista de Clientes</h1>



<table class="table table-striped table-borderlles">

	<thead class="thead-dark">
		<th>#</th><th>Nome</th><th>Telefone</th><th>Date</th>
	</thead>

	<tbody>
	<?php $counter1=-1;  if( isset($user) && ( is_array($user) || $user instanceof Traversable ) && sizeof($user) ) foreach( $user as $key1 => $value1 ){ $counter1++; ?>
		<tr>
			<td><?php echo htmlspecialchars( $value1["idclient"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td><td><?php echo htmlspecialchars( $value1["desnome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td><td><?php echo htmlspecialchars( $value1["destel"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td><td><?php echo htmlspecialchars( $value1["cdate"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>

			<td><button class="btn_vender alert-success" data-pagina_clicada="<?php echo htmlspecialchars( $value1["idclient"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Venda</button></td>
			<td><button class="btn_atualizar btn-primary">Update</button></td>
			<td><button class="btn_deletar alert-danger">Delete</button></td>
		</tr>
		
	<?php } ?>
	</tbody>

</table>
</div>



<script type="text/javascript">
 
 $(document).ready(function(){

 	$(".btn_vender").click(function(){

 		var id = $(this).data("pagina_clicada");
 		$.ajax({
 			url: "http://localhost/anne_doces/admin/compraView",
 			type: "POST",
 			dataType: "html",
 			data: {id},
 			beforeSend:function(){
 				$("#cont").html("Carregando...")
 			},
 			success:function(retorno){
 				$("#cont").html(retorno)
 			}
 		})

 	})

 });

</script>

