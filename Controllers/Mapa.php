<?php 
	
	class Mapa extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if (empty($_SESSION['login'])) {
				header('location:'.base_url().'login');
			}
		}

		public function mapa()
		{
			$data['page_title'] = "Página Tienda";
			
			$this->views->getView($this,"mapa",$data);
		}

	}
 ?>