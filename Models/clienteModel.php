<?php 

	class clienteModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}	

        public function selectCliente()
        {
            $sql = "SELECT persona.nombres,
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

	}
 ?>