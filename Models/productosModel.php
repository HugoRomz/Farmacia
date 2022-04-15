<?php 

	class productosModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}	

        public function selectProductos()
        {
            $sql = "SELECT  producto.idproducto,
                            producto.nombrep,
                            categoria.nombre,
                            producto.descripcion,
                            producto.stock,
                            producto.caducidad,
                            producto.precio 
                    FROM producto,categoria 
                    WHERE producto.idcategoria = categoria.idcategoria;";

            $request = $this->select_all($sql);
            return $request;
        }

		
		public function insertProductos($strIdProducto,$strNombreProductos,$strSelectCategorias,$strDescricion,$intStock,$strCaducidad,$intPrecio)
		{
			$query_insert = "INSERT INTO producto(idproducto,nombrep,idcategoria,descripcion,stock,caducidad,precio) VALUES(?,?,?,?,?,?,?)";
			$arrData = array($strIdProducto,$strNombreProductos,$strSelectCategorias,$strDescricion,$intStock,$strCaducidad,$intPrecio);
			$request_insert = $this->insert($query_insert, $arrData);
			return $request_insert;
		}

		public function updateProductos(int $strIdProducto,String $strNombreProductos,String $strSelectCategorias,String $strDescricion,int $intStock,String $strCaducidad,float $intPrecio)
    {
        $this->idProducto = $strIdProducto;
        $this->NombreProductos = $strNombreProductos;
        $this->SelectCategorias = $strSelectCategorias;
		$this->Descricion = $strDescricion;
		$this->Stock = $intStock;
		$this->Caducidad = $strCaducidad;
        $this->Precio = $intPrecio;
        
        $sql = "UPDATE producto SET nombrep=?,idcategoria=?,descripcion=?,stock=?,caducidad=?,precio=? WHERE idproducto = $this->idProducto";
        $arrData = array($this->NombreProductos,$this->SelectCategorias,$this->Descricion,$this->Stock,$this->Caducidad,$this->Precio);
        $request = $this->update($sql, $arrData);
        return $request;
    }


		public function selectIdProductos($idProducto)
		{
			$sql = "SELECT * FROM producto WHERE idproducto = $idProducto";
			$request = $this->select($sql);
			return $request;
		}
		public function delProducto($idProductos)
    {
        $sql = "DELETE FROM producto WHERE idproducto = $idProductos";
        $request = $this->delete($sql);
        return $request;
    }
		
	}
 ?>