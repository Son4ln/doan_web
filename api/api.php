<?php
  include '../config.php';
  include '../database/database.php';

  //include admin model
  include $ROOT.'admin/model/AdminModel.php';
  include $ROOT.'admin/model/Users.php';
  include $ROOT.'site/model/orderModel.php';

  //include client model

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

  class ClientOrderAct {
    function post() {
      $clientOrder = new ClientOrder();
      $name = $_POST['name'];
      $address = $_POST['address'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $clientOrder -> addClient($name, $address, $email, $phone);

      $latesClient = $clientOrder -> getLatesClient();
      $clientId = $latesClient['client_id'];
      $total = $_POST['total'];
      $note = $_POST['note'];
      $clientOrder -> addOrder($total, $note, $clientId);

      $latesOrder = $clientOrder -> getLatestOrder();
      $orderId = $latesOrder['order_id'];

      $product = $_POST['product'];
      foreach ($product as $key) {
        $curProduct = $clientOrder -> getProductById($key['id']);
        $productId = $key['id'];
        $price = $curProduct['price'];
        $discount = $curProduct['discount'];
        $qty = $key['quantity'];
        $productTotal = $key['price'] * $key['quantity'];
        $clientOrder -> addOrderDetail($orderId, $productId, $price, $discount, $qty, $productTotal);
      }
    }
  }

?>