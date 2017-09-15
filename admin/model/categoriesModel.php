<?php
  /**
  * 
  */
  class CategoriesModel extends DataBase {
    function getAllCategories() {
      $query = "select * from categories";
      $result = parent::getList($query);
      return $result;
    }

  	function getByIdCategory ($id) {
      $query = "select * from categories where category_id = '$id'";
      $result = parent::getInstance($query);
      return $result;
    }
  }
?>