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
			$data['page_title'] = "resetpass";
			$data['page_name'] = "resetpass";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
			$this->views->getView($this,"resetpass",$data);
		}

	}
 ?>