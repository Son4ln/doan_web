<?php

  //session start
  session_start();

  //thêm các modul & controller
  include 'include.php';

  //sử dụng thư viện trait
  //gọi function bằng cú pháp <Tên Trait>::<Tên function> thay thế cho phương thức extends

  // lấy action
  if(isset($_GET["action"])){
    $action=$_GET["action"]; }
  elseif (isset($_POST['action']))
  {
    $action=$_POST["action"];
  }
  else{
    $action="home";
  }
  
  //khởi tạo action
  switch ($action) {
    case 'home':
      include '../view/home.php';
      break;

    case 'listCate':
      $cate = new Categories();
      $cate -> listCategories();
      break;

    case 'deleteCate':
      $cate = new Categories();
      $cate -> deleteCate();
      break;

    case 'updateCate':
      $cate = new Categories();
      $cate -> updateCategory();
      break;

    case 'addCate':
      $cate = new Categories();
      $cate -> addCategory();
      break;

    case 'listSlider':
      $slider = new Sliders();
      $slider -> listSlider();
      break;

    case 'deleteSlide':
      $slider = new Sliders();
      $slider -> delSlider();
      break;

    case 'updateSlider':
      $slider = new Sliders();
      $slider -> updateSlider();
      break;

    case 'updateImgSlide':
      $slider = new Sliders();
      $slider -> updateImg();
      break;

    case 'updateImgSlideAct':
      $slider = new Sliders();
      $slider -> updateImgAct();
      break;

    case 'addSlide':
      $slider = new Sliders();
      $slider -> addSlider();
      break;
  
    default:
      //include lỗi 404 vào đây
      break;
  }
?>
