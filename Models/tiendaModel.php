<?php 
require_once("productosModel.php");
	class tiendaModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
            $this->objProductos = new productosModel();
		}	
        public function getProductos()
		{
			return $this->objProductos->selectProductosFull();
		}
	}
 ?>