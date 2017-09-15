<?php
  class Products {
  	function listProducts() {
  		include '../view/product/product_list.php';
  	}

  	function addProduct() {
  		include '../view/product/product_add.php';
  	}

  	function editProduct() {
      $id = $_GET['id'];
  		include '../view/product/product_edit.php';
  	}

    function actionAddProduct() {
      $path = $GLOBALS['UPLOADPRODUCT'];

      $time = time();

      $name = $_POST['name'];
      $img = $time.'-'.$_FILES['feature']['name'];
      $price = $_POST['price'];
      $discount = $_POST['discount'];
      $description = $_POST['description'];
      $detail = $_POST['detail'];
      $public = $_POST['public'];
      $cate = $_POST['cate'];

      $add = new ProductsModel();
      try {
        $add -> addProduct($name, $img, $price, $discount, $description, $detail, $public, $cate);
      } catch(PDOException $e) {
        $mess = "Thêm thất bại";
        $action = 'addProduct';
        $lv = 'danger';
        BasicLibs::setAlert($mess, $lv);
        BasicLibs::redirect($action);
        die();
      }

      $fileLogo = $_FILES['feature'];
      BasicLibs::uploadFile($time, $fileLogo, $path);

      $mess = "Thêm thành công";
      $action = 'listProduct';
      $lv = 'success';
      BasicLibs::setAlert($mess, $lv);
      BasicLibs::redirect($action);
    }

  	function deleteProduct() {
      $id = $_GET['id'];
      $delete = new ProductsModel();
      $image = new ImagesModel();
      $order = new OrdersModel();

      try {
        $or = $order -> getAllByIdOrderDetail($id);
        if (!isset($or)) {
          $img = $image -> getAllByIdImages($id);
          if (isset($img)) {
            $delete -> deleteImage($id);
          }
        }

        $delete -> deleteProduct($id);
      } catch(PDOException $e) {
        $mess = "Xóa thất bại. Vui lòng xóa sản phẩm ở hóa đơn trước.";
        $action = 'listProduct';
        $lv = 'danger';
        BasicLibs::setAlert($mess, $lv);
        BasicLibs::redirect($action);
        die();
      }

      $mess = "Xóa thành công";
      $action = 'listProduct';
      $lv = 'success';
      BasicLibs::setAlert($mess, $lv);
      BasicLibs::redirect($action);
  	}

    function updateProduct() {
      $id = $_POST['id'];
      $path = $GLOBALS['UPLOADPRODUCT'];
      $time = time();

      if(empty($_FILES['feature']['name'])){
        $img = $_POST['current-img'];
      } else {
        $img = $time.'-'.$_FILES['feature']['name'];
      }

      $name = $_POST['name'];
      $price = $_POST['price'];
      $discount = $_POST['discount'];
      $description = $_POST['description'];
      $detail = $_POST['detail'];
      $public = $_POST['public'];
      $cate = $_POST['cate'];

      $update = new ProductsModel();
      try {
        $update -> updateProduct($id, $name, $img, $price, $discount, $description, $detail, $public, $cate);
      } catch(PDOException $e) {
        $mess = "Sửa thất bại";
        $action = 'editProduct';
        $lv = 'danger';
        BasicLibs::setAlert($mess, $lv);
        BasicLibs::redirectId($action, $id);
        die();
      }

      if(!empty($_FILES['feature']['name'])) {
        $currentImg = $_POST['current-img'];
        BasicLibs::deleteFile($currentImg,$path);
        $fileLogo = $_FILES['feature'];
        BasicLibs::uploadFile($time, $fileLogo, $path);
      }

      $mess = "Sửa thành công";
      $action = 'editProduct';
      $lv = 'success';
      BasicLibs::setAlert($mess, $lv);
      BasicLibs::redirectId($action, $id);
    }
  }
?>