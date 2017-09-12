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
  
    default:
      //include lỗi 404 vào đây
      break;
  }
?>
