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

	// 	public function updateCliente(int $strIdCliente,String $strNombre,String $strApellidos,int $strTelefono,String $strEmail,String $strPassword,int $strSelectRol)
    // {
    //     $this->idCliente = $strIdCliente;
    //     $this->nombre = $strNombre;
    //     $this->apellido = $strApellidos;
	// 	$this->telefono = $strTelefono;
	// 	$this->email = $strEmail;
	// 	$this->passwor = $strPassword;
    //     $this->selectRol = $strSelectRol;
        
    //     $sql = "UPDATE persona SET nombres=?,apellido=?,telefono=?,email_user=?,password=?,idrol=? WHERE idpersona = $this->idCliente";
    //     $arrData = array($this->nombre,$this->apellido,$this->telefono,$this->email,$this->passwor,$this->selectRol);
    //     $request = $this->update($sql, $arrData);
    //     return $request;
    // }


		public function selectIdProductos($idProducto)
		{
			$sql = "SELECT * FROM producto WHERE idproducto = $idProducto";
			$request = $this->select($sql);
			return $request;
		}
	// 	public function delCliente($idCliente)
    // {
    //     $sql = "DELETE FROM persona WHERE idpersona = $idCliente";
    //     $request = $this->delete($sql);
    //     return $request;
    // }
		
	}
 ?>