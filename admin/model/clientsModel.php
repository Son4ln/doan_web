<?php
  /**
  * 
  */
  class ClientsModel extends DataBase {
    function getAllClients() {
      $query = "select * from clients";
      $result = parent::getList($query);
      return $result;
    }

  	function getByIdClient($id) {
      $query = "select * from clients where client_id = '$id'";
      $result = parent::getInstance($query);
      return $result;
    }
  }
?>