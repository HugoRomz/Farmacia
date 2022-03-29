<?php 

	class permisosModel extends Mysql
	{
		public $intIdPermiso;
		public $intIdRol;
		public $intModuloId;
		public $r;
		public $w;
		public $u;
		public $d;

		public function __construct()
		{
			parent::__construct();
		}	

        public function selectModulos()
        {
            $sql = "SELECT * FROM modulo WHERE status !=0";

            $request = $this->select_all($sql);
            return $request;
        }
		public function selectPermisosRol(int $idRol)
        {
			$this->intIdRol = $idRol;
            $sql = "SELECT * FROM permisos WHERE idrol = $this->intIdRol";
            $request = $this->select_all($sql);
            return $request;
        }
		public function deletePermisos(int $idrol)
		{
			$this->intRolid = $idrol;
			$sql = "DELETE FROM permisos WHERE idrol = $this->intRolid";
			$request = $this->delete($sql);
			return $request;
		}

		public function insertPermisos(int $idrol, int $idmodulo, int $r, int $w, int $u, int $d){
			$this->intRolid = $idrol;
			$this->intModuloid = $idmodulo;
			$this->r = $r;
			$this->w = $w;
			$this->u = $u;
			$this->d = $d;
			$query_insert  = "INSERT INTO permisos(idrol,moduloid,r,w,u,d) VALUES(?,?,?,?,?,?)";
        	$arrData = array($this->intRolid, $this->intModuloid, $this->r, $this->w, $this->u, $this->d);
        	$request_insert = $this->insert($query_insert,$arrData);		
	        return $request_insert;
		}
		

	}
 ?>