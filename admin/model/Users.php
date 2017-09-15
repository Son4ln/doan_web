<?php
	class UsersModel extends DataBase {
		function updateUser($id, $name, $pass) {
			$query = "UPDATE users SET username = '$name', password = '$pass' WHERE user_id ='$id'";
			parent::exec($query);
		}

		function checkUser($name, $pass) {
			$query = "SELECT * FROM users WHERE username = '$name' and password = '$pass'";
			$result = parent::getInstance($query);
      return $result;
		}
	}
?>