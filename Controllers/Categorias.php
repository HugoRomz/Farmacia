<?php 

	class Categorias extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function categorias()
		{
			$data['page_id'] = 1;
			$data['page_tag'] = "Categorias";
			$data['page_title'] = "Página Categorias";
			$data['page_functions_js'] = "functions_categorias.js";
		    $this->views->getView($this,"categorias",$data);
		}
		public function getCategorias()
		{
			$data = $this->model->selectCategorias();
			for ($i=0; $i < count($data); $i++) {
				$data[$i]['options'] = '<div class="">
				<button class="btn btn-editar" id="btnEditCategorias" rl="'.$data[$i]['idcategoria'].'" onclick="fntEditCategorias(this);" title="Editar"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-eliminar" id="btnDelCategorias" rl="'.$data[$i]['idcategoria'].'" onclick="fntDelCategorias(this);" title="Eliminar"><i class="fas fa-trash-alt"></i></button>

				</div>';
			}
			
			echo json_encode($data,JSON_UNESCAPED_UNICODE);
			die();
		}
		
	public function getIdCategorias(String $idCategorias)
	{
		$idCategorias = strClean($idCategorias);
		if ($idCategorias > 0) {
			$arrData = $this->model->selectIdCategorias($idCategorias);
			if (empty($arrData)) {
				$arrResponse = array('status'=>false,'msg'=>'Datos no Encontrados.');
			}else {
				$arrResponse = array('status'=>true,'data'=>$arrData);
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	public function getSelectCategorias()
		{
			$htmlOptions = "";
			$data = $this->model->selectCategoria();
			if (count($data) > 0 ) {
				for ($i=0; $i < count($data); $i++) { 	
						$htmlOptions .= '<option value="'.$data[$i]['idcategoria'].'">'.$data[$i]['nombre'].'</option>';					
				}
			}
			echo $htmlOptions;
			die();
		}

		
		public function setCategorias(){
			
            $strIdCategorias = intval($_POST['idCategorias']);
            $strNombreCategorias = strClean($_POST['txtNombreCategorias']);
			$strDescripcion = strClean($_POST['txtAreaCategoria']);


            if ($strIdCategorias == 0) {
                $option = 1;
                //Crear
				$strIdCategorias = idRol();
                $request_Rol = $this->model->insertCategorias($strIdCategorias,$strNombreCategorias,$strDescripcion);
             }else {
                //Actualizar
                $request_Rol = $this->model->updateCategorias($strIdCategorias,$strNombreCategorias,$strDescripcion);
                $option=2;
            }
      
            if($option == 1)
            {
                $arrResponse = array('status' => true, 'msg' => '1');

            }else if($option==2){
                $arrResponse = array('status' => true, 'msg' => '2');
            }
        
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        die();
    }
	public function delCategorias()
    {
        if ($_POST) {
            $idCategorias =$_POST['idCategorias'];
            $requestDelete = $this->model->delCategorias($idCategorias);
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