<?php
  /**
  * 
  */
  class BrandsModel extends DataBase
  {
  	function getAllBrands () {
      try{
        $query = "select brand_public from brands";
        $result = parent::getList($query);
        return $result;
      } catch(PDOException $e) {
          $mess = 'Không tìm thấy';
          BasicLibs::setAlert($mess);
        }
  	}
  }
?>