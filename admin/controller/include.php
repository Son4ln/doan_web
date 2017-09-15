<?php
  //nhúng file cấu hình hệ thống
  include '../../config.php';

  //nhúng kết nối database
  include $ROOT.'database/database.php';

  //nhúng thư viện
  include $ROOT.'system/libs/basic_libs.php';

  //thêm các modul
  include '../model/Categories.php';
  include '../model/Sliders.php';

  //thêm controller
  include 'app/CategoriesController.php';
  include 'app/SlidersController.php';
 
?>