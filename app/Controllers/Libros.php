<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Libro;

class Libros extends Controller
{


	public function index()
	{
		$libro = new Libro(); // se crea un objeto de la clase Libro
		$datos['libros'] = $libro->orderBy('id', 'ASC')->findAll(); // se obtienen todos los registros de la tabla libros

		$datos['cabecera'] = view('template/cabecera'); // se carga la vista cabecera 
		$datos['pie'] = view('template/pie'); // se carga la vista pie 
		return view('libros/listar', $datos); // se carga la vista listar con los datos
	}

	
	public function crear()
	{
		$datos['cabecera'] = view('template/cabecera');
		$datos['pie'] = view('template/pie');
		return view('libros/crear', $datos);
	}

	/* ⚽
	protected $allowedFields = ['codigo','nombre','precio_compra','precio_venta','ganancia','existencia','imagen'];
	 */


	public function guardar()
	{
		$libro = new Libro();

		// validacion de los campos
		$validacion = $this->validate([
			'nombre' => 'required|min_length[3]',
			'imagen' => [
				'uploaded[imagen]',
				'mime_in[imagen,image/jpg,image/jpeg,image/png]',
				'max_size[imagen,1024]',
			],
			'codigo' => 'required|min_length[1]',
			'precio_compra' => 'required|min_length[1]',
			'precio_venta' => 'required|min_length[1]',
			'ganancia' => 'required|min_length[1]',
			'existencia' => 'required|min_length[1]'
		]);

		if (!$validacion) {
			$session = session(); // variable sesion, pa mostrar el msj de error
			$session->setFlashData('mensaje', 'Revise la información');
			//return $this->response->redirect(site_url('/listar'));
			return redirect()->back()->withInput(); // regresa a la pagina anterior
		}
 
		// asignacion de campos a variables 
		$nombre = $this->request->getVar('nombre'); 
		$codigo = $this->request->getVar('codigo');
		$precio_compra = $this->request->getVar('precio_compra');
		$precio_venta = $this->request->getVar('precio_venta');
		$ganancia = $precio_venta - $precio_compra;
		$existencia = $this->request->getVar('existencia');

		if ($imagen = $this->request->getFile('imagen')) {
			$nuevoNombre = $imagen->getRandomName();
			$imagen->move('../public/uploads/', $nuevoNombre);
			$datos = [
				'nombre' => $this->request->getVar('nombre'),
				'codigo' => $this->request->getVar('codigo'),
				'precio_compra' => $this->request->getVar('precio_compra'),
				'precio_venta' => $this->request->getVar('precio_venta'),
				'ganancia' => $ganancia,
				'existencia' => $this->request->getVar('existencia'),
				'imagen' => $nuevoNombre
			];
			$libro->insert($datos); // se inserta el registro en la tabla 
		}

		return $this->response->redirect(site_url('/listar'));
	}


	public function borrar($id = null)
	{
		$libro = new Libro();
		$datosLibro = $libro->where('id', $id)->first(); // se obtiene el registro del libro
		$ruta = '../public/uploads/' . $datosLibro['imagen']; // se obtiene la ruta de la imagen
		if (file_exists($ruta)) {
			unlink($ruta); // se borra la imagen
		}
		$libro->where('id', $id)->delete($id); // se borra el registro del libro, por el id de la tabla libros. 
		return $this->response->redirect(site_url('/listar')); // se redirecciona a la vista listar
	}


	public function editar($id = null)
	{
		$libro = new Libro();
		$datos['libro'] = $libro->where('id', $id)->first(); 
		$datos['cabecera'] = view('template/cabecera');
		$datos['pie'] = view('template/pie');
		return view('libros/editar', $datos); // se carga la vista editar con los datos
	}


	public function actualizar()
	{
		$libro = new Libro();
		$datos = [
			'nombre' => $this->request->getVar('nombre'),
			'codigo' => $this->request->getVar('codigo'),
			'precio_compra' => $this->request->getVar('precio_compra'),
			'precio_venta' => $this->request->getVar('precio_venta'),
			'ganancia' => $this->request->getVar('ganancia'),
			'existencia' => $this->request->getVar('existencia')
		];
		$id = $this->request->getVar('id');
		$validacion = $this->validate([
			'nombre' => 'required|min_length[3]',
			'codigo' => 'required|min_length[1]',
			'precio_compra' => 'required|min_length[1]',
			'precio_venta' => 'required|min_length[1]',
			'ganancia' => 'required|min_length[1]',
			'existencia' => 'required|min_length[1]'
		]);
		if (!$validacion) {
			$session = session();
			$session->setFlashData('mensaje', 'Revise la información');
			//return $this->response->redirect(site_url('/listar'));
			return redirect()->back()->withInput();
		}

		$libro->update($id, $datos);
		$validacion = $this->validate([
			'imagen' => [
				'uploaded[imagen]',
				'mime_in[imagen,image/jpg,image/jpeg,image/png]',
				'max_size[imagen,1024]',
			]
		]);
		if ($validacion) {
			if ($imagen = $this->request->getFile('imagen')) {
				$datosLibro = $libro->where('id', $id)->first();
				$ruta = '../public/uploads/' . $datosLibro['imagen'];
				if (file_exists($ruta)) {
					unlink($ruta);
				}
				$nuevoNombre = $imagen->getRandomName();
				$imagen->move('../public/uploads/', $nuevoNombre);
				$datos = ['imagen' => $nuevoNombre];
				$libro->update($id, $datos);
			}
		}
		return $this->response->redirect(site_url('/listar'));
	}
}
