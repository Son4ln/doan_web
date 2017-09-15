<?php
	class AdminHome {
		function showHome() {
			$admin = new AdminModel();
			$countSlider = $admin -> countSlider();
			$countCate = $admin -> countCate();
			$coutProducts = $admin -> countProducts();
			include '../view/home.php';
		}
	}
?>