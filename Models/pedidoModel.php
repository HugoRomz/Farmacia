<?php 

	class pedidoModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}	

        public function selectPedido()
        {
            $sql = "SELECT pedido.idpedido,
                           persona.nombres,
                           pedido.fecha,
                           pedido.monto,
                           pedido.tipopagoid,
                           pedido.status 
                    FROM pedido,persona 
                    WHERE persona.idpersona = pedido.idpersona;";

            $request = $this->select_all($sql);
            return $request;
        }

		
		public function insertarCarrito(String $idpersona,int $idproducto,String $precio,String $imagen)
		{
			$query_insert = "INSERT INTO detalle_temp(idpersona,idproducto,precio,cantidad,imagen,status) VALUES(?,?,?,1,?,1)";
			$arrData = array($idpersona,$idproducto,$precio,$imagen);
			$request_insert = $this->insert($query_insert, $arrData);
			return $request_insert;
		}
        	// 	public function selectIdProductos($idProducto)
	// 	{
	// 		$sql = "SELECT * FROM producto WHERE idproducto = $idProducto";
	// 		$request = $this->select($sql);
	// 		return $request;
	// 	}
        
        public function selectCarrito($idpersona)
        {
            $sql = "SELECT det.id,
                           det.idpersona,
                           p.nombrep,
                           det.precio,
                           det.cantidad,
                           det.imagen,
                           det.status 
                    FROM detalle_temp as det,
                         producto as p 
                    WHERE det.idproducto = p.idproducto
                      AND det.idpersona =$idpersona";

            $request = $this->select_all($sql);
            return $request;
        }

        
		public function delPedido($idCarrito)
        {
            $sql = "DELETE FROM detalle_temp WHERE id = $idCarrito";
            $request = $this->delete($sql);
            return $request;
        }
        
	// 	public function updateProductos(int $strIdProducto,String $strNombreProductos,String $strSelectCategorias,String $strDescricion,int $intStock,String $strCaducidad,float $intPrecio)
    // {
    //     $this->idProducto = $strIdProducto;
    //     $this->NombreProductos = $strNombreProductos;
    //     $this->SelectCategorias = $strSelectCategorias;
	// 	$this->Descricion = $strDescricion;
	// 	$this->Stock = $intStock;
	// 	$this->Caducidad = $strCaducidad;
    //     $this->Precio = $intPrecio;
        
    //     $sql = "UPDATE producto SET nombrep=?,idcategoria=?,descripcion=?,stock=?,caducidad=?,precio=? WHERE idproducto = $this->idProducto";
    //     $arrData = array($this->NombreProductos,$this->SelectCategorias,$this->Descricion,$this->Stock,$this->Caducidad,$this->Precio,);
    //     $request = $this->update($sql, $arrData);
    //     return $request;
    // }
    // public function updateProductosImg(int $strIdProducto,String $strNombreProductos,String $strSelectCategorias,String $strDescricion,int $intStock,String $strCaducidad,float $intPrecio,String $imgDefault)
    // {
    //     $this->idProducto = $strIdProducto;
    //     $this->NombreProductos = $strNombreProductos;
    //     $this->SelectCategorias = $strSelectCategorias;
	// 	$this->Descricion = $strDescricion;
	// 	$this->Stock = $intStock;
	// 	$this->Caducidad = $strCaducidad;
    //     $this->Precio = $intPrecio;
    //     $this->imagen = $imgDefault;
        
    //     $sql = "UPDATE producto SET nombrep=?,idcategoria=?,descripcion=?,stock=?,caducidad=?,precio=?,imagen=? WHERE idproducto = $this->idProducto";
    //     $arrData = array($this->NombreProductos,$this->SelectCategorias,$this->Descricion,$this->Stock,$this->Caducidad,$this->Precio,$this->imagen);
    //     $request = $this->update($sql, $arrData);
    //     return $request;
    // }

    


		
	}
 ?>