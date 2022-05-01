<?php 

	class Pedido extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if (empty($_SESSION['login'])) {
				header('location:'.base_url().'login');
			}
		}

		public function pedido()
		{
			$data['page_tag'] = "Pedidos";
			$data['page_title'] = "Pedidos";
			$data['page_name'] = "Pedidos";
			$data['page_functions_js'] = "functions_pedido.js";
			$this->views->getView($this,"pedido",$data);
		}

		public function getPedido()
		{
			$data = $this->model->selectPedido();
			for ($i=0; $i < count($data); $i++) {
			   
				if ($data[$i]['status']!=0) {
              
					$data[$i]['status'] = '<span class="badge badge-success">Pagado</span>';
				}else {
					$data[$i]['status'] = '<span class="badge badge-danger">Pendiente</span>';
				}

				$data[$i]['options'] = '<div class="">
				
				</div>';
			}
			
			echo json_encode($data,JSON_UNESCAPED_UNICODE);
			die();
		}

	// 	public function setCliente(){
			
    //         $strIdCliente = intval($_POST['idCliente']);
    //         $strNombre = strClean($_POST['txtNombreCliente']);
	// 		$strApellidos = strClean($_POST['txtApellidos']);
    //         $strTelefono = strClean($_POST['txtTelefono']);
	// 		$strEmail = strClean($_POST['txtEmailCliente']);
	// 		$strPassword = strClean($_POST['txtPassword']);
	// 		$strSelectRol = intval($_POST['selectRol']);

	// 		$strPasswordEncrypt = hash("SHA256",$strPassword);

    //         if ($strIdCliente == 0) {
    //             $option = 1;
    //             //Crear
	// 			$strIdCliente = idRol();
    //             $request_Rol = $this->model->insertCliente($strIdCliente,$strNombre,$strApellidos,$strTelefono,$strEmail,$strPasswordEncrypt,$strSelectRol);
    //          }else {
    //             //Actualizar
    //             $request_Rol = $this->model->updateCliente($strIdCliente,$strNombre,$strApellidos,$strTelefono,$strEmail,$strPasswordEncrypt,$strSelectRol);
    //             $option=2;
    //         }
      
    //         if($option == 1)
    //         {
    //             $arrResponse = array('status' => true, 'msg' => '1');

    //         }else if($option==2){
    //             $arrResponse = array('status' => true, 'msg' => '2');
    //         }
        
    //         echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
    //     die();
    // }

	
	// public function getIdCliente(String $idCliente)
	// {
	// 	$idCliente = strClean($idCliente);
	// 	if ($idCliente > 0) {
	// 		$arrData = $this->model->selectIdCliente($idCliente);
	// 		if (empty($arrData)) {
	// 			$arrResponse = array('status'=>false,'msg'=>'Datos no Encontrados.');
	// 		}else {
	// 			$arrResponse = array('status'=>true,'data'=>$arrData);
	// 		}
	// 		echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
	// 	}
	// 	die();
	// }


	// public function delCliente()
    // {
    //     if ($_POST) {
    //         $idCliente =$_POST['idCliente'];
    //         $requestDelete = $this->model->delCliente($idCliente);
    //         if($requestDelete == 'ok')
	// 			{
	// 				$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado');
	// 			}else if($requestDelete == 'exist'){
	// 				$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar.');
	// 			}else{
	// 				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar.');
	// 			}
	// 			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
	// 		}
	// 		die();
    //     }
	}
 ?>