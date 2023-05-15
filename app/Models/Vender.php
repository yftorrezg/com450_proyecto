<?php 
namespace App\Models;

use CodeIgniter\Model;

class Vender extends Model{
    protected $table      = 'productos_vendidos';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
		/* id, id_libros, cantidad, precio, id_venta  */
		protected $allowedFields = ['id_libros','cantidad','precio_venta','id_venta']; // campos de la Tabla

		public function insertar($datos){
			$libro = new Libro();
			$producto = $libro->where('codigo', $datos['codigo'])->first();
			$datos = [
				'id_libros' => $producto['id'],
				'cantidad' => $datos['cantidad'],
				'precio_venta' => $producto['precio_venta'],
				'id_venta' => $datos['id_venta']
			];
			$this->insert($datos);
		}

		public function totalCarrito($carrito)
		{
			$total = 0;
			foreach ($carrito as $item) {
				$total += $item['total'];
			}
			return $total;
		}

		public function insertarVenta($carrito)
		{
			$venta = new Venta();
			$venta->save([
				'total' => $this->totalCarrito($carrito)
			]);
			return $venta->insertID();
		}

		public function insertarProductosVendidos($carrito, $id_venta)
		{
			foreach ($carrito as $item) {
				$datos = [
					'id_libros' => $item['id'],
					'cantidad' => $item['cantidad'],
					'precio_venta' => $item['precio_venta'],
					'id_venta' => $id_venta
				];
				$this->insert($datos);
			}
		}

		public function obtenerVentas()
		{
			$ventas = $this->select('ventas.id, ventas.total, ventas.created_at, libros.nombre')
				->join('libros', 'libros.id = productos_vendidos.id_libros')
				->join('ventas', 'ventas.id = productos_vendidos.id_venta')
				->findAll();
			return $ventas;
		}
	
		public function obtenerVenta($id)
		{
			$venta = $this->select('ventas.id, ventas.total, ventas.created_at, libros.nombre')
				->join('libros', 'libros.id = productos_vendidos.id_libros')
				->join('ventas', 'ventas.id = productos_vendidos.id_venta')
				->where('ventas.id', $id)
				->findAll();
			return $venta;
		}

		 
	}