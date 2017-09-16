<?php
  class ContactController
  {
  	function addContact() {
      $full_name = $_POST['full_name'];
      $email = $_POST['email'];
      $subject = $_POST['subject'];
      $message = $_POST['message'];

      $contact = new ContactModel();
      try {
        $contact -> addContact($full_name, $email, $subject, $message);
      } catch(PDOException $e) {
        $mess = "Gửi thất bại";
        $action = 'contact';
        $lv = 'danger';
        BasicLibs::setAlert($mess, $lv);
        BasicLibs::redirect($action);
        die();
      }
      $mess = "Gửi thành công";
      $action = 'contact';
      $lv = 'success';
      BasicLibs::setAlert($mess, $lv);
      BasicLibs::redirect($action);
    }
  }
?>