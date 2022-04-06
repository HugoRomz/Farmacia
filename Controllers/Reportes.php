<?php 

	class Reportes extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if (empty($_SESSION['login'])) {
				header('location:'.base_url().'login');
			}
		}

		public function reportes()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "Reportes";
			$data['page_title'] = "Reportes";
			$data['page_name'] = "reportes";
			$data['page_functions_js'] = "functions_reportes.js";
			$this->views->getView($this,"reportes",$data);
		}

	}
 ?>