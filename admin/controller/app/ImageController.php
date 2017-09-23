<?php
  class ProductImages {
    function listImg () {
      $id = $_GET['id'];
      $product = new ProductsModel();
      $img = new ImagesModel();
      $dataImg = $img -> getAllByIdImages($id);
      $dataProduct = $product -> getByIdProduct($id);
      $productName = $dataProduct['product_name'];
      $count = 0;
      include '../view/images/list.php';
    }

    function delImg () {
    	$id = $_GET['id'];
      $productId = $_GET['prodId'];
    	$img = new ImagesModel();
      try {
        $dataImg = $img -> getImgById($id);
    	  $img -> deleteByIdImage($id);
        $file = $dataImg['image'];
        $path = $GLOBALS['UPLOADPRODUCT'];
        BasicLibs::deleteFile($file, $path);
        $mess = "Xóa hình ảnh thành công";
        $action = "listImg&id=$productId";
        $lv = 'success';
        BasicLibs::setAlert($mess, $lv);
        BasicLibs::redirect($action);
      } catch(PDOException $e) {
        echo "somethings wrong here";
      }
    }

    function addImg () {
      if (isset($_FILES['add-img'])) {
        $productId = $_GET['productId'];
        $fileCount = count($_FILES['add-img']['name']);
        $path = $GLOBALS['UPLOADPRODUCT'];
        for ($i=0; $i < $fileCount; $i++) {
          if ($_FILES['add-img']['name'][$i]) {
            $time = time().$i;
            $fileName = $time.'-'.$_FILES['add-img']['name'][$i];
            $img = new ImagesModel();
            try {
              $img -> addImg($productId, $fileName);
              $source = $_FILES['add-img']['tmp_name'][$i];
              $target = $path.DIRECTORY_SEPARATOR. $fileName;
              move_uploaded_file($source, $target);
            } catch(PDOException $e) {
              echo "somethings wrong here";
              die();
            }
          }
        }

        $mess = "Thêm hình ảnh thành công";
        $action = "listImg&id=$productId";
        $lv = 'success';
        BasicLibs::setAlert($mess, $lv);
        BasicLibs::redirect($action);
      }
    }
  }
?>