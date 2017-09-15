<?php
  /**
  * 
  */
  class ImagesModel extends DataBase {
    function getAllImages() {
      $query = "select * from images";
      $result = parent::getList($query);
      return $result;
    }

  	function getAllByIdImages($id) {
      $query = "select * from images where product_id = '$id'";
      $result = parent::getList($query);
      return $result;
    }

    function deleteByIdImage($id) {
      $query = "select * from images where image_id = '$id'";
      parent::exec($query);
    }
  }
?>