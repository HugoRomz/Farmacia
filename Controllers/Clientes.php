<?php 

	class Clientes extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function clientes()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "Clientes";
			$data['page_title'] = "Clientes";
			$data['page_name'] = "clientes";
			$this->views->getView($this,"clientes",$data);
		}

	}
 ?>