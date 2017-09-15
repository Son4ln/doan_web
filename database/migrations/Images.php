<?php
	class Images extends ConnectMySql{
		function createImages (){
		  parent::setConnect();	
		  try {
			$createImages = "Create table images (
							 image_id		int(11)		Auto_increment	Not null,
							 product_id		int(11)						Not Null, 
							 image		text							Null,
							 Primary key (image_id)
							 );
							";
			$this->db->exec($createImages);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>