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

							$arrData = $this->model->sessionLogin($_SESSION['idUser']);
							$_SESSION['userData'] = $arrData;

							$idrol = $requestUser['nombrerol'];

							$arrResponse = array('status' => true, 'msg' => $idrol);

							
						}else{
							$arrResponse = array('status' => false, 'msg' => 'Usuario Inactivo');
						}
					}				
				}
				sleep(1);
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		public function loginRegister(){
			
            // $strIdCliente = intval($_POST['idCliente']);
            $strNombre = strClean($_POST['txtNombreRegister']);
			$strApellidos = "Marroquín";
            $strTelefono = "+52 ";
			$strEmail = strClean($_POST['txtEmailRegister']);
			$strPassword = strClean($_POST['txtPasswordRegister']);

			$strPasswordEncrypt = hash("SHA256",$strPassword);

            if ($strEmail != "") {
                $option = 1;
                //Crear
				$strIdCliente = idRol();

                $request_Rol = $this->model->insertCliente($strIdCliente,$strNombre,$strApellidos,$strTelefono,$strEmail,$strPasswordEncrypt);
             }else {
				$option =2;
			 }
      
            if($option == 1)
            {
                $arrResponse = array('status' => true, 'msg' => '1');

            } if($option == 2)
            {
                $arrResponse = array('status' => false, 'msg' => '2');

            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

		public function resetPass(){
			if ($_POST) {
				
				
				if (empty($_POST['txtEmailReset'])) {
					$arrResponse = array('status' => false,'msg' => 'Error de datos' );
				}else {
					
					$token = token();
					$strEmail = strtolower(strClean($_POST['txtEmailReset']));
					$arrData = $this->model->getUserEmail($strEmail);
	
					if (empty($arrData)) {
						
						$arrResponse = array('status' => false,'msg' => 'No existe el Usuario' );
					}else {
						$idpersona = $arrData['idpersona'];
						$nombreUsuario = $arrData['nombres'].' '.$arrData['apellido'];
						$url_recovery = base_url().'login/confirmUser/'.$strEmail.'/'.$token;
	
						$requestUpdate = $this->model->setTokenUser($idpersona,$token);
	
						$data = array('nombreUsuario' => $nombreUsuario,
												 'email' => $strEmail,
												 'asunto' => 'Recuperar cuenta - ',
												 'url_recovery' => $url_recovery);
					
	
						if ($requestUpdate) {
	
							$sendEmail = sendEmailLocal($data,'email_cambioPassword');
	
							if($sendEmail){
								$arrResponse = array('status' => true,'msg' => 'Se ha enviado un email a tu cuenta de correo para cambiar la contraseña' );
							}else{
								$arrResponse = array('status' => false,'msg' => 'No es posible realizar el proceso, intente mas tarde.' );
							}
						}else {
							$arrResponse = array('status' => false,'msg' => 'No es posible realizar el proceso, intente mas tarde.' );
						}
					}
				}
		
				sleep(1);
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			
			}
			die();
		}
	
		public function confirmUser(string $params)
		{
			if(empty($params)){
				header('Location: '.base_url());
			}else{
				$arrParams = explode(',',$params);
				$strEmail = $arrParams[0];
				$strToken = $arrParams[1];
				$arrResponse = $this->model->getUsuario($strEmail,$strToken);
				if(empty($arrResponse)){
					header("Location: ".base_url());
				}else{
					$data['page_tag'] = "Cambiar contraseña"; 
					$data['page_name'] = "cambiar_contrasenia";
					$data['page_title'] = "Cambiar Contraseña <small> Farmacia </small>";
					$data['email_user'] = $strEmail;
					$data['token'] = $strToken;
					$data['idpersona'] = $arrResponse['idpersona'];
					$data['page_function_js']="function_login.js";
					$this->views->getView($this,"cambiar_password",$data);
				}
			}
			sleep(1);
			die();
		}

		public function setPassword() {
            

			if(empty($_POST['idpersona'])  || empty($_POST['txtEmail']) || empty($_POST['txtToken']) || empty($_POST['txtPassword2']) || empty($_POST['txtPasswordConfirm2'])){
	
				$arrResponse = array('status' => false, 'msg' => 'Error de datos' );
			   
									 
			}else {
				$intIdusuario = intval($_POST['idpersona']);
				$strPassword = $_POST['txtPassword2'];
				$strPasswordConfirm = $_POST['txtPasswordConfirm2'];
				$strEmail = strClean($_POST['txtEmail']);
				$strToken = strClean($_POST['txtToken']);
			
				
					if($strPassword != $strPasswordConfirm){
					 $arrResponse = array('status' => false, 'msg' => 'Las contraseñas no son iguales.' );
					}
					else{
						$arrResponseUser = $this->model->getUsuario($strEmail,$strToken);
						if(empty($arrResponseUser)){
							$arrResponse = array('status' => false, 'msg' => 'Error de datos.' );
						}else{
							$strPassword = hash("SHA256",$strPassword);
							$requestPass = $this->model->insertPassword($intIdusuario,$strPassword);
						if($requestPass)
						{
							$arrResponse = array('status' => true, 'msg' => 'Contraseña actualizada con éxito.' );
						}else{
							$arrResponse = array('status' => false, 'msg' => 'No es posible realizar el proceso, intente nuevamente más tarde.' );
						}
						}
					}
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}

	}
 ?>