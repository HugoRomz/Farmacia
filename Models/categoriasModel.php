<?php 

	class categoriasModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}	

        public function selectCategorias()
        {
            $sql = "SELECT * FROM categoria";

            $request = $this->select_all($sql);
            return $request;
        }

		
		public function insertCategorias($strIdCategorias,$strNombreCategorias,$strDescripcion)
		{
			$query_insert = "INSERT INTO categoria(idcategoria,nombre,descripcion) VALUES(?,?,?)";
			$arrData = array($strIdCategorias,$strNombreCategorias,$strDescripcion);
			$request_insert = $this->insert($query_insert, $arrData);
			return $request_insert;
		}

		public function updateCategorias(String $strIdCategorias,String $strNombreCategorias,String $strDescripcion)
    {
        $this->idCategorias = $strIdCategorias;
        $this->nombre = $strNombreCategorias;
        $this->descripcion = $strDescripcion;
        
        $sql = "UPDATE categoria SET nombre=?,descripcion=? WHERE idcategoria = $this->idCategorias";
        $arrData = array($this->nombre,$this->descripcion);
        $request = $this->update($sql, $arrData);
        return $request;
    }


		public function selectIdCategorias($idCategorias)
		{
			$sql = "SELECT * FROM categoria WHERE idcategoria = $idCategorias";
			$request = $this->select($sql);
			return $request;
		}
		public function delCategorias($idCategorias)
    {
        $sql = "DELETE FROM categoria WHERE idcategoria = $idCategorias";
        $request = $this->delete($sql);
        return $request;
    }
		
	}
 ?>