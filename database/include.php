<?php
	
  //khởi tạo table
  include 'migrations/Categories.php';
  include 'migrations/ContactForm.php';
  include 'migrations/ContactInfo.php';
  include 'migrations/Images.php';
  include 'migrations/Client.php';
  include 'migrations/OrderDetail.php';
  include 'migrations/Orders.php';
  include 'migrations/Products.php';
  include 'migrations/SlideShow.php';
  include 'migrations/Users.php';

  //thêm dữ liệu mẫu


  // thêm quan hệ
  include 'relationship.php';
?>