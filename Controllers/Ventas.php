<?php 

	class Ventas extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function ventas()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "Ventas";
			$data['page_title'] = "Puntos de Venta";
			$data['page_name'] = "ventas";
			$this->views->getView($this,"ventas",$data);
		}

	}
 ?>