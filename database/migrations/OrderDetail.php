<?php
	class OrderDetail extends ConnectMySql{
		function createOrderDetail (){
		  parent::setConnect();	
		  try {
			$createOrderDetail = "Create table order_detail (
						 detail_id		int(11)		Auto_increment	Not null,
						 order_id		int(11)					Not null, 
						 product_id		int(11)					Not null,
						 price			int(11)					Not null,
						 discount		int(11)					Null,
						 quantity		tinyint(4)				Not null,
						 detail_total	int(11)					Not null,
						 Primary key (detail_id)
						 );
						";
			$this->db->exec($createOrderDetail);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
			
		}
	}
?>