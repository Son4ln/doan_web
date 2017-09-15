<?php
  class ContactInfo extends DataBase
  {
  	//show contact info
  	function getContactInfo()
  	{
  	  $query = "select * from contact_info where info_id = 1";
  	  $result = parent::getInstance($query);
  	  return $result;
  	}

  	//update contact info
  	function updateContactInfo($address, $branch, $phone, $email, $intro, $logo)
  	{
  	  $query = "update contact_info set address = '$address', branch = '$branch', phone = '$phone', 
  	  email = '$email', introduce = '$intro', logo = '$logo' where info_id = 1";
  	  parent::exec($query);
  	}

  }

?>