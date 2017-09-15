<?php
  class ContactController
  {
  	function addContact() {
      if (!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])) {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $contact = new ContactModel();
        $contact -> addContact($full_name, $email, $send_date, $subject, $message);
        $action = "contact";
        BasicLibs::setAlert($mess, $lv);
        BasicLibs::redirect($action);
      } else {
        echo 'error';
      }
    }
  }
?>