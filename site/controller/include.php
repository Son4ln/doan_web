<?php
  //nhúng file cấu hình hệ thống
  include '../../config.php';

  //nhúng kết nối database
  include $root.'database/database.php';

  //nhúng thư viện
  include $root.'system/libs/basic_libs.php';

  //thêm các modul
  include '../model/brandsModel.php';

  //thêm controller
  include 'app/brandsController.php';
 
?>