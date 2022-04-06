<?php 

	class clienteModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}	

        public function selectCliente()
        {
            $sql = "SELECT persona.idpersona,
						   persona.nombres,
						   persona.apellido,
						   persona.telefono,
						   persona.email_user,
						   persona.password,
						   rol.nombrerol,
						   persona.status 
				    FROM persona,rol 
					WHERE persona.idrol = rol.idrol AND persona.status!=0;";

            $request = $this->select_all($sql);
            return $request;
        }

		
		public function insertCliente($strIdCliente,$strNombre,$strApellidos,$strTelefono,$strEmail,$strPassword,$strSelectRol)
		{
			$query_insert = "INSERT INTO persona(idpersona,nombres,apellido,telefono,email_user,password,idrol,status) VALUES(?,?,?,?,?,?,?,1)";
			$arrData = array($strIdCliente,$strNombre,$strApellidos,$strTelefono,$strEmail,$strPassword,$strSelectRol);
			$request_insert = $this->insert($query_insert, $arrData);
			return $request_insert;
		}

		public function updateCliente(int $strIdCliente,String $strNombre,String $strApellidos,int $strTelefono,String $strEmail,String $strPassword,int $strSelectRol)
    {
        $this->idCliente = $strIdCliente;
        $this->nombre = $strNombre;
        $this->apellido = $strApellidos;
		$this->telefono = $strTelefono;
		$this->email = $strEmail;
		$this->passwor = $strPassword;
        $this->selectRol = $strSelectRol;
        
        $sql = "UPDATE persona SET nombres=?,apellido=?,telefono=?,email_user=?,password=?,idrol=? WHERE idpersona = $this->idCliente";
        $arrData = array($this->nombre,$this->apellido,$this->telefono,$this->email,$this->passwor,$this->selectRol);
        $request = $this->update($sql, $arrData);
        return $request;
    }


		public function selectIdCliente($idCliente)
		{
			$sql = "SELECT * FROM persona WHERE idpersona = $idCliente";
			$request = $this->select($sql);
			return $request;
		}
		public function delCliente($idCliente)
    {
        $sql = "DELETE FROM persona WHERE idpersona = $idCliente";
        $request = $this->delete($sql);
        return $request;
    }
		
	}
 ?>