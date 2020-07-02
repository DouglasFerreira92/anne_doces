<?php if(!class_exists('Rain\Tpl')){exit;}?><h1>Venda Cadastrada</h1>
<table class="table table-striped table-borderlles">

	<thead class="thead-dark">

		<th>ID venda</th><th>Cliente</th><th>Descricao</th><th>Quantia</th><th>Valor</th><th>Data Compra</th>

	</thead>

	<tbody>

	<?php $counter1=-1;  if( isset($result) && ( is_array($result) || $result instanceof Traversable ) && sizeof($result) ) foreach( $result as $key1 => $value1 ){ $counter1++; ?>	
		<tr>
			<td><?php echo htmlspecialchars( $value1["idcompra"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td><td><strong><?php if( isset($value1["desnome"]) ){ ?><?php echo htmlspecialchars( $value1["desnome"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?></strong></td><td><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td><td><?php echo htmlspecialchars( $value1["desqtn"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td><td><strong>R$ <?php echo htmlspecialchars( $value1["desvalor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></td><td><?php echo htmlspecialchars( $value1["vdate"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
		</tr>
	<?php } ?>

	</tbody>

</table>
</div>
