<?php
  class Orders {
  	function listOrders() {
  		include '../view/order/order_list.php';
  	}
  
    function orderDetail() {
      $id = $_GET['id'];
      include '../view/order/order_detail.php';
    }

  	function deleteOrder() {
      $id = $_GET['id'];
      $delete = new OrdersModel();
      try {
        $detail = $delete -> getAllByIdOrders($id);
        if (isset($detail)) {
          $delete -> deleteOrderDetail($id);
        }
        
        $delete -> deleteOrder($id);
      } catch(PDOException $e) {
        $mess = "Xóa thất bại. Lỗi trong quá trình xóa.";
        $action = 'listOrder';
        $lv = 'danger';
        BasicLibs::setAlert($mess, $lv);
        BasicLibs::redirect($action);
        die();
      }

      $mess = "Xóa thành công";
      $action = 'listOrder';
      $lv = 'success';
      BasicLibs::setAlert($mess, $lv);
      BasicLibs::redirect($action);
  	}

    function updateStatus() {
      $id = $_GET['id'];
      $status = $_GET['status'];
      $update = new OrdersModel();
      try {
        if ($status == 1) {
          $update -> updateDate($id, $status);
        } else {
          $update -> updateStatus($id, $status);
        }
      } catch(PDOException $e) {
        $mess = "Sửa thất bại";
        $action = 'listOrder';
        $lv = 'danger';
        BasicLibs::setAlert($mess, $lv);
        BasicLibs::redirect($action);
        die();
      }

      $mess = "Sửa thành công";
      $action = 'listOrder';
      $lv = 'success';
      BasicLibs::setAlert($mess, $lv);
      BasicLibs::redirect($action);
    }

    function updateStatusDetail() {
      $id = $_GET['id'];
      $status = $_GET['status'];
      $update = new OrdersModel();
      try {
        if ($status == 1) {
          $update -> updateDate($id, $status);
        } else {
          $update -> updateStatus($id, $status);
        }
      } catch(PDOException $e) {
        $mess = "Sửa thất bại";
        $action = 'orderDetail';
        $lv = 'danger';
        BasicLibs::setAlert($mess, $lv);
        BasicLibs::redirectId($action, $id);
        die();
      }

      $mess = "Sửa thành công";
      $action = 'orderDetail';
      $lv = 'success';
      BasicLibs::setAlert($mess, $lv);
      BasicLibs::redirectId($action, $id);
    }
  }
?>