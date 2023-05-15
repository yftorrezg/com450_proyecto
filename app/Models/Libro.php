<?php 
namespace App\Models;
use CodeIgniter\Model;
class Libro extends Model{ // CLASE libro, hereda de la clase Model.
    protected $table      = 'libros';   // nombre de la Tabla de la BD
    protected $primaryKey = 'id';    
		// codigo, nombre, precio de compra, precio de venta, ganancia, stock, imagen
		 		protected $allowedFields = ['codigo','nombre','precio_compra','precio_venta','ganancia','existencia','imagen']; // campos de la Tabla
				 // protected $allowedFields = ['nombre','imagen']; // campos de la Tabla 
	}
	
	/* 
	se crea el modelo Libro.php en la carpeta app\Models por cada tabla de la BD, con spark seria:
	php spark make:model Libro
*/