<?php
	class Login {
		function showLogin() {
			include '../view/login.php';
		}

		function loginAct() {
			include '../view/login.php';
			if(isset($_POST['username']) && isset($_POST['pass'])) {
				$name = $_POST['username'];
				$pass = md5($_POST['pass']);

				$users = new UsersModel();
				$user = $users -> checkUser($name, $pass);
				if($user) {
					$_SESSION["doanShop-user"] = $name;
					$_SESSION["doanShop-pass"] = $pass;
					$_SESSION["doanShop-canLogin"] = $user['can_login'];
	      	$action = "home";
	      	BasicLibs::redirect($action);
				} else {
					$mess = 'Sai username hoặc password';
		      $lv = 'danger';
		      $action = "login";
		      BasicLibs::setAlert($mess, $lv);
		      BasicLibs::redirect($action);
				}
			}
		}
	}
?>