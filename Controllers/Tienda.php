<?php 
	
	class Tienda extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if (empty($_SESSION['login'])) {
				header('location:'.base_url().'login');
			}
		}

		public function tienda()
		{
			$data['page_title'] = "Página Productos Tienda";
			$data['page_content'] = "Página de productos con paginación";
			$data['productos'] = $this->model->getProductos();
			$this->views->getView($this,"tienda",$data);
		}

	}
 ?>