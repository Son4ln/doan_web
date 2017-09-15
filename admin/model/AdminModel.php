<?php
	class AdminModel extends DataBase {
		function countSlider() {
			$query = 'SELECT COUNT(*) FROM slider';
			$result = parent::getInstance($query);
      return $result;
		}

		function countCate() {
			$query = 'SELECT COUNT(*) FROM categories';
			$result = parent::getInstance($query);
      return $result;
		}

		function countProducts() {
			$query = 'SELECT COUNT(*) FROM products';
			$result = parent::getInstance($query);
      return $result;
		}

		function countOrder() {
			$query = 'SELECT COUNT(*) FROM orders';
			$result = parent::getInstance($query);
      return $result;
		}

		function countNewOrder() {
			$query = 'SELECT COUNT(*) FROM orders WHERE order_status = 0';
			$result = parent::getInstance($query);
      return $result;
		}

		function countContactForm() {
			$query = 'SELECT COUNT(*) FROM contact_form';
			$result = parent::getInstance($query);
      return $result;
		}
	}
?>