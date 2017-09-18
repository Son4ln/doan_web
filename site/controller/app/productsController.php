<?php
  class Products {
  	function listProducts() {
  		include '../view/product/productList.php';
  	}

    function cateProducts() {
      $cate = $_GET['cate'];
      include '../view/product/productList.php';
    }

  	function productDetail() {
      $id = $_GET['id'];
  		include '../view/product/productDetail.php';
  	}

    function searchProduct() {
      $search = $_POST['search'];     
      include '../view/search.php';
    }
  }
?>