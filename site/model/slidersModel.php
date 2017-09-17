<?php
  /**
  * 
  */
  class SlidersModel extends DataBase {
  	function getAllSlider() {
      $query = "select * from slider";
      $result = parent::getList($query);
      return $result;
  	}
  }
?>