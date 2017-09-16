<?php
  /**
  * 
  */
  class ImagesModel extends DataBase {
  	function getAllImages() {
      $query = "select * from products where product_public = 1";
      $result = parent::getList($query);
      return $result;
  	}

    function getByIdImage($id) {
      $query = "select * from images where product_id = '$id'";
      $result = parent::getList($query);
      return $result;
    }

    function countImage($id) {
      $query = "select count(*) from images where product_id = '$id'";
      $result = parent::getInstance($query);
      return $result;
    }
  }
?>