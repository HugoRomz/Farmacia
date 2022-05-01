<?php 

	class loginModel extends Mysql
	{
        private $intIdUsuario;
        private $strUsuario;
        private $strPassword;
        private $strToken;

		public function __construct()
		{
			parent::__construct();
		}	

        public function loginUser(String $usuario,String $password)
        {
            $this->strUsuario = $usuario;
            $this->strPassword = $password;

         $sql = "SELECT persona.idpersona,
                        persona.status,
                        rol.nombrerol 
                FROM persona,rol 
                WHERE email_user = '$this->strUsuario' 
                    AND password = '$this->strPassword'
                    AND rol.idrol = persona.idrol
                    AND persona.status!= 0";
            
            $request = $this->select($sql);
            return $request;
        }

        public function sessionLogin(int $idUser)
        {
            $this->intIdUsuario = $idUser;
            $sql = "SELECT p.*,
                          r.idrol,
                          r.nombrerol
                    FROM persona p
                    INNER JOIN rol r
                    ON p.idrol = r.idrol
                    WHERE p.idpersona = $this->intIdUsuario";
            $request = $this->select($sql);
            return $request;
        }

        public function getUserEmail(string $strEmail)
    {
        $this->strUsuario = $strEmail;
        $sql = "SELECT * FROM persona WHERE email_user = '$this->strUsuario' and status = 1";
        $request = $this->select($sql);
        return $request;
    }

        public function setTokenUser(int $idpersona,string $token){
        
        $this->intIdUsuario = $idpersona;
        $this->strToken = $token;

        $sql = "UPDATE persona SET token = ? WHERE idpersona = $this->intIdUsuario";
        $arrData = array($this->strToken);
        $request = $this->update($sql,$arrData);
        return $request;
    }

    public function getUsuario(string $email, string $token)
    {
        $this->strUsuario = $email;
        $this->strToken = $token;
        $sql = "SELECT idpersona FROM persona WHERE email_user = '$this->strUsuario' and 
        token = '$this->strToken' and status = 1";
        $request = $this->select($sql);
        return $request;
    }

    public function insertPassword(int $idpersona, string $password)
    {
        $this->intIdUsuario = $idpersona;
        $this->strPassword = $password;
        $sql = "UPDATE persona SET password = ?, token = ? WHERE idpersona = $this->intIdUsuario";
        $arrData = array($this->strPassword,"");
        $request = $this->update($sql,$arrData);
        return $request;

    }

	}
 ?>