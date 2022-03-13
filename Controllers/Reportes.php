<?php 

	class Reportes extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function reportes()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "Reportes";
			$data['page_title'] = "Reportes";
			$data['page_name'] = "reportes";
			$this->views->getView($this,"reportes",$data);
		}

	}
 ?>