<?php
  /**
  * 
  */
  class OrdersModel extends DataBase {
  	function getAllOrders() {
      $query = "select * from orders";
      $result = parent::getList($query);
      return $result;
  	}

    function getByIdOrder($id) {
      $query = "select * from orders where order_id = '$id'";
      $result = parent::getInstance($query);
      return $result;
    }

    function getAllByIdOrders($id) {
      $query = "select * from order_detail where order_id = '$id'";
      $result = parent::getList($query);
      return $result;
    }

    function getAllByIdOrderDetail($id) {
      $query = "select * from order_detail where product_id = '$id'";
      $result = parent::getList($query);
      return $result;
    }

    //update order
    function updateStatus($id, $status) {
      $query = "update orders set order_status = '$status' where order_id = '$id'";
      parent::exec($query);
    }

    //delete order
    function deleteOrderDetail($id) {
      $detail = "delete from order_detail where order_id = '$id'";
      parent::exec($detail);
    }

    function deleteOrder($id) {
      $query = "delete from orders where order_id = '$id'";
      parent::exec($query);
    }
  }
?>