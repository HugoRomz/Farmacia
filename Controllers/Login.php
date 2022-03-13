<?php 

	class Login extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function login()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "Login";
			$data['page_title'] = "Login";
			$data['page_name'] = "home";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
			$this->views->getView($this,"login",$data);
		}

	}
 ?>