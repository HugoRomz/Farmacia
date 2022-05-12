<?php 

	class Resetpass extends Controllers{
		public function __construct()
		{
			parent::__construct();
			
		}

		public function resetpass()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "resetpass";
			$this->views->getView($this,"resetpass",$data);
		}

	}
 ?>