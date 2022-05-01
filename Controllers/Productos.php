<?php 

	class Productos extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if (empty($_SESSION['login'])) {
				header('location:'.base_url().'login');
			}
		}

		public function productos()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "Productos";
			$data['page_title'] = "Productos en venta";
			$data['page_name'] = "productos";
			$data['page_functions_js'] = "functions_productos.js";
			$this->views->getView($this,"productos",$data);
		}
		public function getProductos()
		{
			$data = $this->model->selectProductos();

			for ($i=0; $i < count($data); $i++) {
			   
				if ($data[$i]['stock']<=0) {
					$data[$i]['status'] = '<span class="badge badge-danger">Sin Stock</span>';
				}else{
					$data[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				}

				$data[$i]['options'] = '<div class="">
				<button class="btn btn-editar" id="btnEditProductos" rl="'.$data[$i]['idproducto'].'" onclick="fntEditProductos(this);" title="Editar"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-eliminar" id="btnDelProductos" rl="'.$data[$i]['idproducto'].'"onclick="fntDelProductos(this);" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
			
				
				
				</div>';
			}
			
			echo json_encode($data,JSON_UNESCAPED_UNICODE);
			die();
		}

		public function setProductos(){
			
            $strIdProducto = intval($_POST['idProducto']);
            $strNombreProductos = strClean($_POST['txtNombreProductos']);
			$strSelectCategorias = strClean($_POST['selectCategorias']);
            $strDescricion = strClean($_POST['txtDescricion']);
			$intStock = intval($_POST['numberStock']);
			$strCaducidad = strClean($_POST['dateCaducidad']);
			$intPrecio = strClean($_POST['txtPrecio']);

			$foto = $_FILES['imagen'];
			$nombre_foto = $foto['name'];
			$type = $foto['type'];
			$url_temp = $foto['tmp_name'];
			$imgDefault = 'default.png';

			if ($nombre_foto != '') {
				$imgDefault = 'img_'.md5(date('d-m-Y H:m:s')).'.jpg';
			}

            if ($strIdProducto == 0) {
                $option = 1;
                //Crear
				$strIdProducto = idRol();
                $request_Rol = $this->model->insertProductos($strIdProducto,$strNombreProductos,$strSelectCategorias,$strDescricion,$intStock,$strCaducidad,$intPrecio,$imgDefault);
             }else {
                //Actualizar
				if ($nombre_foto != '') {
					$request_Rol = $this->model->updateProductosImg($strIdProducto,$strNombreProductos,$strSelectCategorias,$strDescricion,$intStock,$strCaducidad,$intPrecio,$imgDefault);
					$option=2;
				}else {
					$request_Rol = $this->model->updateProductos($strIdProducto,$strNombreProductos,$strSelectCategorias,$strDescricion,$intStock,$strCaducidad,$intPrecio);
					$option=2;
				}
            }
      
            if($option == 1)
            {
                $arrResponse = array('status' => true, 'msg' => 'Guardado Correcto');
				if ($nombre_foto != ''){uploadImage($foto,$imgDefault);}
            }else if($option==2){
                $arrResponse = array('status' => true, 'msg' => 'Editado');
            }
        
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }

	
	public function getIdProductos(String $idProducto)
	{
		$idProducto = strClean($idProducto);
		if ($idProducto > 0) {
			$arrData = $this->model->selectIdProductos($idProducto);
			if (empty($arrData)) {
				$arrResponse = array('status'=>false,'msg'=>'Datos no Encontrados.');
			}else {
				$arrResponse = array('status'=>true,'data'=>$arrData);
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}


	public function delProductos()
    {
        if ($_POST) {
            $idProductos =$_POST['idProductos'];
            $requestDelete = $this->model->delProducto($idProductos);
            if($requestDelete == 'ok')
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado');
				}else if($requestDelete == 'exist'){
					$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar.');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
        }
	}
 ?>