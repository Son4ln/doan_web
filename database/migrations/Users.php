<?php
	class Users extends ConnectMySql{
		function createUsers (){
		  parent::setConnect();	
		  try {
		  	parent::setConnect();
			$createUsers = "Create table users (
							user_id		int(11)		Auto_increment	Not null,
							username			varchar(128)				Not null,
							password		varchar(255)				Not null,
							can_login	tinyint(1)							Not null,
							Primary key (user_id)
							);
						";
			$this->db->exec($createUsers);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>