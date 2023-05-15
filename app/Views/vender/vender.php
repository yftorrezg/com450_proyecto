 <!-- cabecera -->
 <?= $cabecera ?>

 <!-- contenido -->
 <div class="col-xs-12">
 	<h1>Agregar al carrito</h1>

 	<br>

 	<form method="post" action="<?php echo base_url(); ?>agregar" enctype="multipart/form-data">
 		<div class="form-group mb-3">
 			<label for="codigo">Codigo:</label>
 			<input id="codigo" class="form-control" type="number" name="codigo">
 			<label for="cantidad">Cantidad:</label>
 			<input id="cantidad" class="form-control" type="number" name="cantidad">
 		</div>
 		<button class="btn btn-success" type="submit">Agregar</button>
 		<a href="<?php echo base_url() ?>listar" class="btn btn-info">Cancelar</a>
 		<br>
 		<br>
 	</form>

 	<table class="table table-bordered">
 		<thead>
 			<tr>
 				<th>ID</th>
 				<th>Código</th>
 				<th>Nombre</th>
 				<th>Precio de venta</th>
 				<th>Cantidad</th>
 				<th>Total</th>
 				<th>Quitar</th>
 			</tr>
 		</thead>
 		<tbody>
 			<!-- gran total -->
 			<?php
				$granTotal = 0;
				if ($carrito) {
					foreach ($carrito as $item) {
						$granTotal += $item['total'];
					}
				}
				?>
 			<!-- gran total -->

 			<?php if ($carrito) : ?>
 				<?php foreach ($carrito as $item) : ?>
 					<tr>
 						<td><?= $item['id']; ?></td>
 						<td><?= $item['codigo']; ?></td>
 						<td><?= $item['nombre']; ?></td>
 						<td><?= $item['precio_venta']; ?></td>
 						<td><?= $item['cantidad']; ?></td>
 						<td><?= $item['total']; ?></td>
						 						<td>
 							<a href="<?= base_url('quitar/' . ($item['codigo']-1)); ?>" class="btn btn-danger" type="button">Quitar</a>
 						</td>
 					</tr>
 				<?php endforeach; ?>
 			<?php endif; ?>

 		</tbody>

 	</table>
 	<!-- mostrar el total -->
 	<h3>Total: <?php echo $granTotal ?></h3>
 	<a href="<?php echo base_url() ?>terminarVenta" class="btn btn-success">Terminar venta</a>
 	<a href="<?php echo base_url() ?>cancelarVenta" class="btn btn-danger">Cancelar venta</a>
 </div>

 </div>

 <!-- pie -->
 <?= $pie ?>