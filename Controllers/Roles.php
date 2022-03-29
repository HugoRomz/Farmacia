<?php 

	class Roles extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function roles()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "Roles";
			$data['page_title'] = "Roles";
			$data['page_name'] = "roles";
			$data['page_functions_js'] = "functions_Roles.js";
			$this->views->getView($this,"roles",$data);
		}

		public function getRoles()
		{
			$data = $this->model->selectRoles();
			for ($i=0; $i < count($data); $i++) { 
				if ($data[$i]['status']!=0) {
              
					$data[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				}else {
					$data[$i]['status'] = '<span class="badge badge-danger">Deshabilitado</span>';
				}
				$data[$i]['options'] = '<div class="">
                <button class="btn btn-eliminar btnPermisosRol" id="btnPermisosRol"  rl="'.$data[$i]['idrol'].'" onclick="fntPermisos(this);" title="Permisos"><i class="fas fa-key"></i></button>
				<button class="btn btn-editar" id="btnEditRoles"  rl="'.$data[$i]['idrol'].'" onclick="fntEditRoles(this);" title="Editar"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-eliminar" id="btnDelRoles" rl="'.$data[$i]['idrol'].'" onclick="fntDelRoles(this);" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
				</div>';
			}
			echo json_encode($data,JSON_UNESCAPED_UNICODE);
			die();
		}
		public function getIdRol(String $idRol)
			{
				$idRol = strClean($idRol);
				if ($idRol > 0) {
					$arrData = $this->model->selectIdRol($idRol);
					if (empty($arrData)) {
						$arrResponse = array('status'=>false,'msg'=>'Datos no Encontrados.');
					}else {
						$arrResponse = array('status'=>true,'data'=>$arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
				die();
			}

		public function setRoles(){
			
            $strIdRol = intval($_POST['idRol']);
            $strNombreRol = strClean($_POST['txtNombre']);
            $strDrescripcion = strClean($_POST['txtDescripcion']);
            $intStatus= intval($_POST['selectStatus']);


            if ($strIdRol == 0) {
                $option = 1;
                $strIdRol = idRol();
                //Crear
                $request_Rol = $this->model->insertRol($strIdRol,$strNombreRol,$strDrescripcion,$intStatus);
             }else {
                //Actualizar
                $request_Rol = $this->model->updateRol($strIdRol,$strNombreRol,$strDrescripcion,$intStatus);
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

	
    public function delRol()
    {
        if ($_POST) {
            $idRol =$_POST['idRol'];
            $requestDelete = $this->model->delRol($idRol);
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