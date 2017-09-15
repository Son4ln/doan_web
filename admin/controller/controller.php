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

<<<<<<< Updated upstream
    case 'listCate':
      $cate = new Categories();
      $cate -> listCategories();
      break;

    case 'listProduct':
      $product = new Products();
      $product -> listProducts();
      break;

    case 'addProduct':
      $product = new Products();
      $product -> addProduct();
      break;

    case 'editProduct':
      $product = new Products();
      $product -> editProduct();
      break;

    case 'deleteProduct':
      $product = new Products();
      $product -> deleteProduct();
      break;

    case 'actionAddProduct':
      $product = new Products();
      $product -> actionAddProduct();
      break;

    case 'updateProduct':
      $product = new Products();
      $product -> updateProduct();
      break;

    case 'listOrder':
      $order = new Orders();
      $order -> listOrders();
      break;

    case 'orderDetail':
      $order = new Orders();
      $order -> orderDetail();
      break;

    case 'deleteOrder':
      $order = new Orders();
      $order -> deleteOrder();
      break;

    case 'updateStatus':
      $order = new Orders();
      $order -> updateStatus();

    case 'updateStatusDetail':
      $order = new Orders();
      $order -> updateStatusDetail();
=======
    case 'productList':
      include '../view/product/product_list.php';
      break;
>>>>>>> Stashed changes
  
    default:
      //include lỗi 404 vào đây
      break;
  }
?>
