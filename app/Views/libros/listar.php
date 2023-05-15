<?= $cabecera ?>

<a class="btn btn-success" href="<?= base_url('crear') ?>">Crear nuevo</a>
<br><br>

<table class="table table-light">
	<thead class="thead-light">
		<tr>
			<!--⚽
	protected $allowedFields = ['codigo','nombre','precio_compra','precio_venta','ganancia','existencia','imagen'];
	-->
			<th>Id</th>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Precio de compra</th>
			<th>Precio de Venta</th>
			<th>Ganancia</th>
			<th>Existencia</th>
			<th>Imagen</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
	<tbody>
		<?php if ($libros) : ?>
			<?php foreach ($libros as $lib) : ?>
				<tr>
					<td><?= $lib['id']; ?></td>
					<td><?= $lib['codigo']; ?></td>
					<td><?= $lib['nombre']; ?></td>
					<td><?= $lib['precio_compra']; ?></td>
					<td><?= $lib['precio_venta']; ?></td>
					<td><?= $lib['ganancia']; ?></td>
					<td><?= $lib['existencia']; ?></td>
					<td><img class="img-thumbnail" src="<?= base_url('/uploads/' . $lib['imagen']); ?>" alt="portada_libro" width="100px"></td>
					<td>
						<a href="<?= base_url('editar/' . $lib['id']); ?>" class="btn btn-primary" type="button">Editar</a>
						<a href="<?= base_url('borrar/' . $lib['id']); ?>" class="btn btn-danger" type="button">Borrar</a>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	</tbody>
</table>
<?= $pie ?>