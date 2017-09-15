<?php
  class Sliders {
    function listSlider() {
      $slide = new SliderModel();
      $data = $slide -> getAllSlide();
      include '../view/slider/slider.php';
    }

    function delSlider() {
      $id = $_GET['id'];
      $slide = new SliderModel();

      $data = $slide -> getSlideById($id);
      $path = $GLOBALS['UPLOADSLIDE'];
      BasicLibs::deleteFile($data['slide_image'], $path);

      $slide -> deleteSlider($id);
      $mess = 'Đã xóa slider thành công';
      $lv = 'success';
      $action = "listSlider";
      BasicLibs::setAlert($mess, $lv);
      BasicLibs::redirect($action);

    }

    function updateSlider() {
      $title = $_POST['title'];
      $desc = $_POST['desc'];
      $link = $_POST['link'];
      $id = $_POST['id'];
      $slide = new SliderModel();
      $slide -> updateSlide($title, $desc, $link, $id);
    }

    function updateImg() {
      $id = $_GET['id'];
      $slide = new SliderModel();
      $data = $slide -> getSlideById($id);
      include '../view/slider/update-img.php';
    }

    function updateImgAct() {
      $id = $_POST['slide-id'];
      $time = time();
      
      if(!empty($_FILES['slide-img']['name'])) {
        $file_ext = strtolower(end(explode('.',$_FILES['slide-img']['name'])));
        $expensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$expensions) === false){
         echo "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
         die();
        }

        $img = $time.'-'.$_FILES['slide-img']['name'];
      } else {
        $img = $_POST['curr-img'];
      }

      $slide = new SliderModel();
      $slide -> updateSlideImg($img, $id);

      $file = $_FILES['slide-img'];
      $path = $GLOBALS['UPLOADSLIDE'];
      BasicLibs::uploadFile($time, $file, $path);

      if (!empty($_FILES['slide-img']['name'])) {
        BasicLibs::deleteFile($_POST['curr-img'], $path);
      }

      $mess = 'Đã cập nhập banner thành công';
      $lv = 'success';
      $action = "updateImgSlide&id=$id";
      BasicLibs::setAlert($mess, $lv);
      BasicLibs::redirect($action);
    }

    function addSlider() {
      $time = time();
      if($_FILES['slide-img']['name']) {
        $file_ext = strtolower(end(explode('.',$_FILES['slide-img']['name'])));
        $expensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$expensions) === false){
         echo "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
         die();
        }

        $img = $time.'-'.$_FILES['slide-img']['name'];
      } else {
        echo "Somethings Wrong here!!!";
        die();
      }

      $title = $_POST['sltitle'];
      if(!$title) {
        echo "Somethings Wrong here!!!";
        die();
      }

      $desc = $_POST['sldesc'];
      if(!$desc) {
        echo "Somethings Wrong here!!!";
        die();
      }

      $linkTo = $_POST['link-to'];
      if(!$linkTo) {
        echo "Somethings Wrong here!!!";
        die();
      }

      $slide = new SliderModel();
      $slide -> addSlider($img, $title, $desc, $linkTo);

      $file = $_FILES['slide-img'];
      $path = $GLOBALS['UPLOADSLIDE'];
      BasicLibs::uploadFile($time, $file, $path);

      $mess = 'Đã thêm slider thành công';
      $lv = 'success';
      $action = "listSlider";
      BasicLibs::setAlert($mess, $lv);
      BasicLibs::redirect($action);
    }
  }
?>