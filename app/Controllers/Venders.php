<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Libro;
use App\Models\Venta;
use App\Models\Vender;


class Venders extends Controller{
 
	// index
	public function index()
	{

		// crear sesion carrito carrito
		$session = session();
		if (!$session->has('carrito')) {
			$session->set('carrito', []);
		}
		$datos['carrito'] = $session->get('carrito');
		
		// obtener todos los libros
		$libro = new Libro();
		$datos['libros'] = $libro->orderBy('id', 'ASC')->findAll();

		$datos['cabecera'] = view('template/cabecera');
		$datos['pie'] = view('template/pie');
		/* 
		$this->load->view("vender/vender", array(
            "carrito" => $carrito,
        )); */
		return view('vender/vender', $datos);
			}


	// obtener indice si existe
	public function obtenerIndiceSiExiste($codigoDeBarras)
	{
		$session = session();
		$carrito = $session->get('carrito');
		$indice = -1;
		foreach ($carrito as $i => $producto) {
			if ($producto['codigo'] === $codigoDeBarras) {
				$indice = $i;
				break;
			}
		}
		return $indice;
	}
	
	// agregar post
	public function agregar()
	{

		// agregar al carrito
		$codigo = $this->request->getPost('codigo');
		$cantidad = $this->request->getPost('cantidad');
		$libro = new Libro();
		$producto = $libro->where('codigo', $codigo)->first();
		if ($producto === null) {
			$session = session();
			$session->setFlashdata('mensaje', 'No existe un producto registrado con el código de barras que se proporcionó');
			return redirect()->to(base_url() . 'vender');
		} else if ($producto['existencia'] < 1) {
			$session = session();
			$session->setFlashdata('mensaje', 'No hay suficiente existencia del producto');
			return redirect()->to(base_url() . 'vender');
		} else {
			$this->agregarAlCarrito($producto, $cantidad);
			return redirect()->to(base_url() . 'vender');
		}
	}

	// agregar al carrito
	public function agregarAlCarrito($producto, $cantidad)
	{
		$session = session();
		$carrito = $session->get('carrito');
		$indice = $this->obtenerIndiceSiExiste($producto['codigo']);
		if ($indice !== -1) {
			$this->aumentarCantidad($indice, $cantidad);
		} else {
			$producto['cantidad'] = $cantidad;
			$producto['total'] = $producto['precio_venta'] * $cantidad;
			array_push($carrito, $producto);
			$session->set('carrito', $carrito);
		}
	}

	// quitar mas de una vez 
	public function quitar($indice)
	{
	
		$session = session();
		$carrito = $session->get('carrito');
		// elimina el elemento del array con el indice dado
		unset($carrito[$indice]);
		// reindexa el array
		$carrito = array_values($carrito);
		$session->set('carrito', $carrito);
		return redirect()->to(base_url() . 'vender');
	}

	// aumentar cantidad
	public function aumentarCantidad($indice, $cantidad)
	{
		$session = session();
		$carrito = $session->get('carrito');
		$carrito[$indice]['cantidad'] += $cantidad;
		$carrito[$indice]['total'] = $carrito[$indice]['precio_venta'] * $carrito[$indice]['cantidad'];
		$session->set('carrito', $carrito);
	}

	 

	// terminar venta
	public function terminarVenta()
	{
		$session = session();
		$carrito = $session->get('carrito');
		$venta = new Venta();
		$id_venta = $venta->insertarVenta($carrito);
		$venta->insertarProductosVendidos($carrito, $id_venta);
		$session->remove('carrito');
		return redirect()->to(base_url() . 'listar');
	}


	// cancelar venta
	public function cancelarVenta()
	{
		/* $session = session();
		$session->remove('carrito');
		return redirect()->to(base_url() . 'listar'); */
		// mensaje
		$session = session();
		$session->setFlashdata('mensaje', 'Venta cancelada correctamente');
		// vaciar carrito
		$session->remove('carrito');
		return redirect()->to(base_url() . 'listar');

	}
	  

}