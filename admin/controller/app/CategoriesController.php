<?php
  class Categories {
  	function listCategories() {
  		$cate = new CateModel();
  		$data = $cate -> getAllCate();
  		include '../view/cate/cate.php';
  	}

  	function deleteCate() {
  		$cateId = $_GET['id'];
  		$cate = new CateModel();

      try {
  		  $cate -> deleteCategory($cateId);
      } catch(PDOException $e)  {
        $mess = 'Không thể xóa loại sản phẩm này, vui lòng xóa hết sản phẩm liên quan trước khi xóa';
        $lv = 'danger';
        $action = "listCate";
        BasicLibs::setAlert($mess, $lv);
        BasicLibs::redirect($action);
        die();
      }

  		$mess = 'Đã xóa loại sản phẩm thành công';
      $lv = 'success';
      $action = "listCate";
      BasicLibs::setAlert($mess, $lv);
      BasicLibs::redirect($action);
  	}

    function updateCategory() {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $cate = new CateModel();
      $cate -> updateCate($name,$id);
    }

    function addCategory() {
      if (!empty($_POST['name'])) {
        $name = $_POST['name'];
        $cate = new CateModel();
        $check = $cate -> getCateByName($name);
        if ($check[0] == 0) {
          $cate -> addCate($name);
          $mess = 'Đã thêm loại sản phẩm thành công';
          $lv = 'success';
          $action = "listCate";
          BasicLibs::setAlert($mess, $lv);
          BasicLibs::redirect($action);
        } else {
          $mess = 'Loại sản phẩm này đã tồn tại';
          $lv = 'danger';
          $action = "listCate";
          BasicLibs::setAlert($mess, $lv);
          BasicLibs::redirect($action);
        }
      } else {
        echo 'Something wrong here';
      }
    }
  
  }
?>