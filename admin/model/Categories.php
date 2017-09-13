<?php
  class CateModel extends DataBase {
    function getAllCate () {
      $query = 'SELECT * FROM categories';
      $result = parent::getList($query);
      return $result;
    }

    function deleteCategory($id) {
      $query = "DELETE FROM categories WHERE category_id = $id";
      parent::exec($query);
    }

    function updateCate($name,$id) {
      $query = "UPDATE categories SET category_name = '$name' WHERE category_id = '$id'";
      parent::exec($query);
    }

    function addCate($name) {
    	$query = "INSERT INTO categories VALUES('', '$name')";
    	parent::exec($query);
    }

    function getByIdCategory($id) {
      $query = "select * from categories where category_id = '$id'";
      $result = parent::getInstance($query);
      return $result;
    }
  }
?>