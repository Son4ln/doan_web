<?php
	class Client extends ConnectMySql{
		function createClient (){
		  parent::setConnect();
		  try {
		  	
			$createClient= "Create table clients (
								 client_id		int(11)		Auto_increment	Not null,
								 client_name	varchar(255)				Not null,
								 client_address	text				Not null,
								 client_email	varchar(255)				null,
								 client_phone	varchar(50)					not null,
								 Primary key (client_id)
								 );
								";
			$this->db->exec($createClient);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>