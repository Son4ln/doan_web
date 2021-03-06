<?php

  //thêm các modul & controller
  include 'include.php';

  //sử dụng thư viện trait
  //gọi function bằng cú pháp <Tên Trait>::<Tên function> thay thế cho phương thức extends
  //Session start
  session_start();

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

    case 'search':
      $search = new Products();
      $search -> searchProduct();
      break;

    case 'about':
      $contact = new ContactController();
      $contact -> showContact();
      break;

    case 'productList':
      $product = new Products();
      $product -> listProducts();
      break;

    case 'productCate':
      $product = new Products();
      $product -> cateProducts();
      break;

    case 'productDetail':
      $product = new Products();
      $product -> productDetail();
      break;

    case 'cart':
      include '../view/cart/cart.php';
      break;

    case 'checkout':
      include '../view/cart/checkout.php';
      break;

    case 'contact':
      include '../view/contact/contact.php';
      break;

    case 'addContact':
      $contact = new ContactController();
      $contact -> addContact();
      break;

    default:
      //include giao diện lỗi 404 không tìm thấy link website vào đây
      break;
  }
?>
