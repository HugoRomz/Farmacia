<?php 

	class Cliente extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function cliente()
		{
			$data['page_id'] = 2;
			$data['page_tag'] = "Clientes";
			$data['page_title'] = "Clientes";
			$data['page_name'] = "clientes";
			$data['page_functions_js'] = "functions_Cliente.js";
			$this->views->getView($this,"cliente",$data);
		}

		public function getCliente()
		{
			$data = $this->model->selectCliente();
			for ($i=0; $i < count($data); $i++) {
			   
				if ($data[$i]['status']!=0) {
              
					$data[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				}else {
					$data[$i]['status'] = '<span class="badge badge-danger">Deshabilitado</span>';
				}


				$data[$i]['options'] = '<div class="">
				<button class="btn btn-editar" id="btnEditCliente"  onclick="fntEditCliente(this);" title="Editar"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-eliminar" id="btnDelCliente" onclick="fntDelCliente(this);" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
				</div>';
			}
			
			echo json_encode($data,JSON_UNESCAPED_UNICODE);
			die();
		}

	}
 ?>