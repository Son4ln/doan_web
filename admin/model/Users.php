<?php
	class UsersModel extends DataBase {
		function updatePass() {
			
		}

		function checkUser($name, $pass) {
			$query = "SELECT * FROM users WHERE username = '$name' and password = '$pass'";
			$result = parent::getInstance($query);
      return $result;
		}
	}
?>