<?php 

	class Carrito extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if (empty($_SESSION['login'])) {
				header('location:'.base_url().'login');
			}
		}

		public function carrito()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "Carrito";
			$data['page_title'] = "Página Carrito";
			$data['page_functions_js'] = "functions_carrito.js";
		    $this->views->getView($this,"carrito",$data);
		}
	
	
	}
 ?>