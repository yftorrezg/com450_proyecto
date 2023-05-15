<?php 
namespace App\Models;

use CodeIgniter\Model;



class Venta extends Model{
    protected $table      = 'ventas';
		
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
		/* id, fecha*/
		protected $allowedFields = ['fecha']; // campos de la Tabla

		public function insertarVenta($carrito)
		{
			// There is no data to insert. 
			if (empty($carrito)) {
				return false;
			}
			// Insert the data
			$this->insert([
				'fecha' => date('Y-m-d H:i:s')
			]);
			// Get the ID that was inserted
			$id_venta = $this->insertID();
		
			return true;
			
		}



}