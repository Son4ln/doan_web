<?php
  class ContactModel extends DataBase
  {
  	function addContact($full_name, $email, $send_date, $subject, $message) {
      $query = "INSERT INTO contact_form VALUES ('', '$full_name', '$email', NOW(), '$subject', '$message')";
      parent::exec($query);
    }
  }
?>