<?php
  /**
  * 
  */
  class ProductsModel extends DataBase {
  	function getAllProducts() {
      $query = "select * from products";
      $result = parent::getList($query);
      return $result;
  	}

    function getAllProductsPublic() {
      $query = "select * from products where product_public = 1";
      $result = parent::getList($query);
      return $result;
    }

    function getByIdProduct($id) {
      $query = "select * from products where product_id = '$id'";
      $result = parent::getInstance($query);
      return $result;
    }

    //add product
    function addProduct($name, $img, $price, $discount, $description, $detail, $public, $cate) {
      $query = "insert into products values(
        '', '$name', '$img', '$price', '$discount', '$description', '$detail', '$public', '$cate')";
      parent::exec($query);
    }

    //update product
    function updateProduct($id, $name, $img, $price, $discount, $description, $detail, $public, $cate) {
      $query = "update products set product_name = '$name', featured_img = '$img', price = '$price', 
      discount = '$discount', product_description = '$description', product_detail = '$detail', product_public = '$public',
      category_id = '$cate' where product_id = '$id'";
      parent::exec($query);
    }

    //delete Product
    function deleteImage($id) {
      $image = "delete from images where product_id = '$id'";
      parent::exec($image);
    }

    function deleteProduct($id) {
      $query = "delete from products where product_id = '$id'";
      parent::exec($query);
    }
  }
?>