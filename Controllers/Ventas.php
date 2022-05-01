<?php 

	class Ventas extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if (empty($_SESSION['login'])) {
				header('location:'.base_url().'login');
			}
		}

		public function ventas()
		{
			$data['page_tag'] = "Ventas";
			$data['page_title'] = "Puntos de Venta";
			$data['page_name'] = "ventas";
			$data['page_functions_js'] = "functions_ventas.js";
			$this->views->getView($this,"ventas",$data);
		}

	}
 ?>