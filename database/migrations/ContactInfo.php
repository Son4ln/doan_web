<?php
	class ContactInfo extends ConnectMySql{
		function createContactInfo (){
		  parent::setConnect();	
		  try {
			$createContactInfo = "Create table contact_info (
								  info_id		int(11)		Auto_increment	Not null,
								  company_name	varchar(255)				Not null,
								  address		text					Not null,
								  branch		text					Null,
								  phone			varchar(50)				Null,
								  email			varchar(128)				Null,
								  introduce		text					Null,
								  logo			varchar(128)				Not null,
								  Primary key (info_id)
								  );
								";
			$this->db->exec($createContactInfo);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>