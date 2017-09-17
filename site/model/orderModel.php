<?php
	class ClientOrder extends DataBase{
		function addClient($name, $address, $email, $phone) {
			$query = "INSERT INTO clients VALUES('', '$name', '$address', '$email', '$phone')";
			parent::exec($query);
		}

		function getLatesClient() {
			$query = 'SELECT * FROM clients ORDER BY client_id DESC LIMIT 1';
			$result = parent::getInstance($query);
			return $result;
		}

		function addOrder($total, $note, $client) {
			$query = "INSERT INTO orders VALUES('', NOW(), '', '$total', 0, '$note', '$client')";
			parent::exec($query);
		}

		function getLatestOrder() {
			$query = 'SELECT * FROM orders ORDER BY order_id DESC LIMIT 1';
			$result = parent::getInstance($query);
			return $result;
		}

		function getProductById($id) {
      $query = "SELECT * FROM products WHERE product_id = '$id'";
      $result = parent::getInstance($query);
      return $result;
    }

		function addOrderDetail($order, $product, $price, $discount, $quantity, $total) {
			$query = "INSERT INTO order_detail VALUES('', $order, $product, '$price', '$discount', '$quantity', '$total')";
			parent::exec($query);
		}
	}
?>