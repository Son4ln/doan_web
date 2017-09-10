<?php
	class Relationship extends ConnectMySql{
		function createRelationship (){
		  parent::setConnect();
		  // tạo quan hệ giữa User và Manage User
		  try {
			$cateToProducts = "Alter table products
							   Add constraint	category_product
							   Foreign key (category_id)
							   References categories (category_id);
							";
			$this->db->exec($cateToProducts);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }

      	  try {
			$clientToOrders = "Alter table orders
							 Add constraint	client_orders
							 Foreign key (client_id)
							 References clients (client_id);
							";
			$this->db->exec($clientToOrders);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }

      	  try {
			$oderToDetail = "Alter table order_detail
							 Add constraint	orders_detail
							 Foreign key (order_id)
							 References orders (order_id);
							";
			$this->db->exec($oderToDetail);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }

   //    	  try {
			// $userToProduct = "Alter table products
			// 				 Add constraint	user_product
			// 				 Foreign key (user_id)
			// 				 References users (user_id);
			// 				";
			// $this->db->exec($userToProduct);
		 //  }
		 //  catch(PDOException $e) {
   //      	echo $e->getMessage();
   //    	  }

      	  try {
			$productToImg = "Alter table products
							 Add constraint	image_product
							 Foreign key (image_id)
							 References images (image_id);
							";
			$this->db->exec($productToImg);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }

      	  try {
			$productsToOrder = "Alter table order_detail
							 	Add constraint	product_detail
							 	Foreign key (product_id)
							 	References products (product_id);
							";
			$this->db->exec($productsToOrder);
		  }
		  catch(PDOException $e) {
        	echo $e->getMessage();
      	  }
		}
	}
?>