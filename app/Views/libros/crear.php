<?= $cabecera ?>
Formulario de creacion
<div class="card">
	<div class="card-body">
		<h5 class="card-title">Ingresar Datos</h5>
		<p class="card-text">

		<form method="post" action="<?= site_url('/guardar') ?>" enctype="multipart/form-data">
			<div class="form-group mb-3">
				<!-- 	
			⚽
				protected $allowedFields = ['codigo','nombre','precio_compra','precio_venta','ganancia','existencia','imagen']; -->
				<label for="codigo">Codigo:</label>
				<input id="codigo" value="<?= old('codigo') ?>" class="form-control" type="number" name="codigo">
				<label for="nombre">Nombre:</label>
				<input id="nombre" value="<?= old('nombre') ?>" class="form-control" type="text" name="nombre">
				<label for="precio_compra">Precio de compra:</label>
				<input id="precio_compra" value="<?= old('precio_compra') ?>" class="form-control" type="number" name="precio_compra">
				<label for="precio_venta">Precio de venta:</label>
				<input id="precio_venta" value="<?= old('precio_venta') ?>" class="form-control" type="number" name="precio_venta">
				<label for="ganancia">Ganancia:</label>
				<input id="ganancia" value="<?= old('ganancia') ?>" class="form-control" type="number" name="ganancia">
				<label for="existencia">Existencia:</label>
				<input id="existencia" value="<?= old('existencia') ?>" class="form-control" type="number" name="existencia">

			</div>
			<div class="form-group mb-3">
				<label for="imagen">Imagen:</label>
				<input id="imagen" class="form-control" type="file" name="imagen">
			</div>
			<button class="btn btn-success" type="submit">Guardar</button>
			<a href="<?= base_url('listar') ?>" class="btn btn-info">Cancelar</a>
		</form>

		</p>
	</div>
</div>

<?= $pie ?>