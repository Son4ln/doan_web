<?php
  class ContactModel extends DataBase
  {
  	function addContact($full_name, $email, $send_date, $subject, $message, $status) {
      $query = "INSERT INTO contact_form VALUES ('', '$full_name', '$email', NOW(), '$subject', '$message', 0)";
      parent::exec($query);
    }
  }
?>