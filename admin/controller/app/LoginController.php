<?php
	class Login {
		function updateUser() {
			$name = $_SESSION["doanShop-user"];
			$pass = $_SESSION["doanShop-pass"];
			$users = new UsersModel();
			$user = $users -> checkUser($name, $pass);
			include '../view/update_user.php';
		}

		function updateUserAct() {
			$oldName = $_SESSION["doanShop-user"];
			$oldPass = $_SESSION["doanShop-pass"];
			$users = new UsersModel();
			$user = $users -> checkUser($oldName, $oldPass);
			$id = $user['user_id'];
			$name = $_POST['username'];

			if(md5($_POST['pass']) != $oldPass) {
				$mess = 'Nhập mật khẩu cũ sai';
		    $lv = 'danger';
	      $action = "updateUser";
	      BasicLibs::setAlert($mess, $lv);
	      BasicLibs::redirect($action);
	      die();
			} else {
				$pass = md5($_POST['pass']);
				if(!empty($_POST['new-pass']) && !empty($_POST['repass'])) {
					$newPass = $_POST['new-pass'];
					$rePass = $_POST['repass'];

					if($newPass == $rePass) {
						$users -> updateUser($id, $name, md5($newPass));
						$action = "logout";
	      		BasicLibs::redirect($action);
	      		die();
					} else {
						$mess = 'Nhập lại mật khẩu mới sai';
				    $lv = 'danger';
			      $action = "updateUser";
			      BasicLibs::setAlert($mess, $lv);
			      BasicLibs::redirect($action);
			      die();
					}
				} else {
					if($name != $oldName) {
						$users -> updateUser($id, $name, $pass);
						$action = "logout";
	      		BasicLibs::redirect($action);
	      		die();
					}
					$action = "updateUser";
		      BasicLibs::redirect($action);
				}
			}
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
	      	die();
				} else {
					$mess = 'Sai username hoặc password';
		      $lv = 'danger';
		      $action = "login";
		      BasicLibs::setAlert($mess, $lv);
		      BasicLibs::redirect($action);
		      die();
				}
			}
		}
	}
?>