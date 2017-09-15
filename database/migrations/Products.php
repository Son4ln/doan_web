<?php
	class Products extends ConnectMySql{
		function createProducts (){
		  parent::setConnect();	
		  try {
			$createProducts = "Create table products (
							   product_id		int(11)		Auto_increment	Not null,
							   product_name	    text					Not null,
							   featured_img		text					Not null,
							   price			int(11)					Not null,
							   discount		    int(11)					Null,
							   product_description	text				Null,
							   product_detail	text					Null,
							   product_public	tinyint(1)				Not null,
							   category_id		int(11)					Not null,
							   Primary key (product_id)
							   );

							 ";
			$this->db->exec($createProducts);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>