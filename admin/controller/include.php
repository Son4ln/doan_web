<?php
  //nhúng file cấu hình hệ thống
  include '../../config.php';

  //nhúng kết nối database
  include $ROOT.'database/database.php';

  //nhúng thư viện
  include $ROOT.'system/libs/basic_libs.php';

  //thêm các modul
  include '../model/Categories.php';
  include '../model/clientsModel.php';
  include '../model/imagesModel.php';
  include '../model/ordersModel.php';
  include '../model/productsModel.php';
  include '../model/Sliders.php';
  include '../model/ContactInfoModel.php';
  include '../model/ContactModel.php';
  
  //thêm controller
  include 'app/CategoriesController.php';
  include 'app/OrdersController.php';
  include 'app/ProductsController.php';
  include 'app/ContactInfoController.php';
  include 'app/ContactController.php';
  include 'app/SlidersController.php';

?>