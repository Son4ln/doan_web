<?php
  //nhúng file cấu hình hệ thống
  include '../../config.php';

  //nhúng kết nối database
  include $ROOT.'database/database.php';

  //nhúng thư viện
  include $ROOT.'system/libs/basic_libs.php';

  //thêm các modul
  include '../model/contactModel.php';
  include '../model/categoriesModel.php';
  include '../model/productsModel.php';
  include '../model/imagesModel.php';
  include '../model/slidersModel.php';

  //thêm controller
  include 'app/contactController.php';
  include 'app/productsController.php';
 
?>