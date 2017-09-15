<?php
  include '../config.php';
  include '../database/database.php';

  //include admin model
  include $ROOT.'admin/model/AdminModel.php';
  include $ROOT.'admin/model/Users.php';

  //include client model

  session_start();

  class Order {
    function countOrder() {
      $admin = new AdminModel();
      $countOrder = $admin -> countOrder();
      die($countOrder[0]);
    }

    function countNewOrder() {
      $admin = new AdminModel();
      $countNewOrder = $admin -> countNewOrder();
      die($countNewOrder[0]);
    }
  }

  class Contact {
    function countContactForm() {
      $admin = new AdminModel();
      $countForm = $admin -> countContactForm();
      die($countForm[0]);
    }
  }

?>