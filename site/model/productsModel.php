<?php
  /**
  * 
  */
  class ProductsModel extends DataBase {
  	function getAllProducts() {
      $query = "select * from products where product_public = 1";
      $result = parent::getList($query);
      return $result;
  	}

    function getAllProductsCate($cate) {
      $query = "select * from categories inner join products on categories.category_id = products.category_id
      where product_public = 1 and products.category_id = '$cate'";
      $result = parent::getList($query);
      return $result;
    }

    function getAllNewProducts($from, $to) {
      $query = "select * from products where product_public = 1 ORDER BY product_id DESC limit $from, $to";
      $result = parent::getList($query);
      return $result;
    }

    function getAllSaleProducts($from, $to) {
      $query = "select * from products
      where product_public = 1 and discount > 0 ORDER BY product_id DESC limit $from, $to";
      $result = parent::getList($query);
      return $result;
    }

    function getByIdProduct($id) {
      $query = "select * from products where product_id = '$id'";
      $result = parent::getInstance($query);
      return $result;
    }

    function getByIdProCategory($id) {
      $query = "select * from products where product_public = 1 and category_id = '$id'";
      $result = parent::getInstance($query);
      return $result;
    }

    function getCountProductCate($id) {
      $query = "select count(*) from products where product_public = 1 and category_id = '$id'";
      $result = parent::getInstance($query);
      return $result;
    }

    function getShowListCate($id, $from, $to) {
      $query = "select * from products where product_public = 1 and category_id = '$id' ORDER BY product_id DESC limit $from, $to";
      $result = parent::getList($query);
      return $result;
    }

    function getCountProduct() {
      $query = "select count(*) from products where product_public = 1";
      $result = parent::getInstance($query);
      return $result;
    }

    function getShowListPro($from, $to) {
      $query = "select * from products where product_public = 1 ORDER BY product_id DESC limit $from, $to";
      $result = parent::getList($query);
      return $result;
    }

    function search($sch) {
      $query = "select * from products where product_public = 1 and product_name like '%$sch%'";
      $result = parent::getList($query);
      return $result;
    }
  }
?>