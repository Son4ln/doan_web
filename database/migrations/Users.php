<?php
	class Users extends ConnectMySql{
		function createUsers (){
		  parent::setConnect();	
		  try {
		  	parent::setConnect();
			$createUsers = "Create table users (
							user_id		int(11)		Auto_increment	Not null,
							email			varchar(128)				Not null,
							password		varchar(255)				Not null,
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