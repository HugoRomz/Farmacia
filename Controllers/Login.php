<?php 

	class Login extends Controllers{
		public function __construct()
		{
			session_start();
			if (isset($_SESSION['login'])) {
				header('location:'.base_url().'dashboard');
			}
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

		public function loginUser()
		{
			if ($_POST) {
				if (empty($_POST['txtEmail']) || empty($_POST['txtPassword'])) {
					$arrResponse = array('status' => false, 'msg' => 'Error de Datos');
				}else {
					$strUsuario = strtolower (strClean($_POST['txtEmail']));
					$strPassword = hash("SHA256",$_POST['txtPassword']);
					$requestUser = $this->model->loginUser($strUsuario,$strPassword);
				
					if (empty($requestUser)) {
						$arrResponse = array('status' => false, 'msg' => 'El Usuario o la contraseña son incorrectos');
					}else{
						$arrData = $requestUser;
						if ($arrData['status'] == 1) {

							$_SESSION['idUser'] = $arrData['idpersona'];
							$_SESSION['login'] = true;

							$arrResponse = array('status' => true, 'msg' => 'ok');
							
						}else{
							$arrResponse = array('status' => false, 'msg' => 'Usuario Inactivo');
						}
					}				
				}
				sleep(2);
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

	}
 ?>