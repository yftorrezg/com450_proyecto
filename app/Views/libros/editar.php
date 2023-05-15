<?= $cabecera ?>

Editar informacion
<div class="card">
	<div class="card-body">
		<h5 class="card-title">Ingresar Datos</h5>
		<p class="card-text">

			<!--⚽
	protected $allowedFields = ['codigo','nombre','precio_compra','precio_venta','ganancia','existencia','imagen'];
	-->
		<form method="post" action="<?= site_url('/actualizar') ?>" enctype="multipart/form-data"> <!-- view: listar -->
			<input type="hidden" name="id" value="<?= $libro['id'] ?>">
			<div class="form-group mb-3">
				<label for="codigo">Codigo:</label>
				<input id="codigo" class="form-control" type="text" name="codigo" value="<?= $libro['codigo'] ?>">
				<label for="nombre">Nombre:</label>
				<input id="nombre" class="form-control" type="text" name="nombre" value="<?= $libro['nombre'] ?>">
				<label for="precio_compra">Precio de compra:</label>
				<input id="precio_compra" class="form-control" type="text" name="precio_compra" value="<?= $libro['precio_compra'] ?>">
				<label for="precio_venta">Precio de venta:</label>
				<input id="precio_venta" class="form-control" type="text" name="precio_venta" value="<?= $libro['precio_venta'] ?>">
				<label for="ganancia">Ganancia:</label>
				<input id="ganancia" class="form-control" type="text" name="ganancia" value="<?= $libro['ganancia'] ?>">
				<label for="existencia">Existencia:</label>
				<input id="existencia" class="form-control" type="text" name="existencia" value="<?= $libro['existencia'] ?>">
				
			</div>
			<div class="form-group mb-3">
				<label for="imagen">Imagen:</label>
				<br>
				<img class="img-thumbnail" src="<?= base_url('/uploads/' . $libro['imagen']); ?>" alt="portada_libro" width="100px">
				<input id="imagen" class="form-control" type="file" name="imagen" value="<?= $libro['imagen'] ?>">
			</div>
			<button class="btn btn-success" type="submit">Actualizar</button>
			<a href="<?= base_url('listar') ?>" class="btn btn-info">Cancelar</a>
		</form>
		</p>
	</div>
</div>

<?= $pie ?>