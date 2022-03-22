<?php 

	class rolesModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}	
		public function selectRoles()
        {
            $sql = "SELECT * FROM rol;";
            $request = $this->select_all($sql);
            return $request;
        }

		public function insertRol($strIdRol,$strNombreRol,$strDrescripcion,$intStatus)
		{
			$query_insert = "INSERT INTO rol(idrol,nombrerol,descripcion,status) VALUES(?,?,?,?)";
			$arrData = array($strIdRol,$strNombreRol,$strDrescripcion,$intStatus);
			$request_insert = $this->insert($query_insert, $arrData);
			return $request_insert;
		}
		
		public function selectIdRol($idRol)
		{
			$sql = "SELECT * FROM rol WHERE idrol = $idRol";
			$request = $this->select($sql);
			return $request;
		}

		public function updateRol(int $strIdRol,String $strNombreRol,String $strDrescripcion, int $intStatus)
    {
        $this->idRol = $strIdRol;
        $this->nombreRol = $strNombreRol;
        $this->descripcion = $strDrescripcion;
        $this->status = $intStatus;
        
        $sql = "UPDATE rol SET nombrerol=?,descripcion=?,status=? WHERE idrol = $this->idRol";
        $arrData = array($this->nombreRol,$this->descripcion,$this->status);
        $request = $this->update($sql, $arrData);
        return $request;
    }

    public function delRol($idRol)
    {
        $sql = "DELETE FROM rol WHERE idrol = $idRol";
        $request = $this->delete($sql);
        return $request;
    }

	}
 ?>