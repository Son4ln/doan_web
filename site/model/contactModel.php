<?php
  class ContactModel extends DataBase
  {
  	function addContact($full_name, $email, $subject, $message) {
      $query = "INSERT INTO contact_form VALUES ('', '$full_name', '$email', NOW(), '$subject', '$message', 0)";
      parent::exec($query);
    }

    function getContact () {
      $query = 'SELECT * FROM contact_info';
      $result = parent::getInstance($query);
      return $result;
    }
  }
?>