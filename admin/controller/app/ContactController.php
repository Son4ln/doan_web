<?php
  class ContactController
    {	
    	function showContact()
    	{
        $contact = new ContactModel();
        $data = $contact -> getContact();
    		include '../view/contact/contact.php';
    	}

    	function deleteContact() {
      $formId = $_GET['form_id'];
      $contact = new ContactModel();
      $contact -> deleteContact($formId);
      $mess = 'Đã xóa bài liên hệ, phản hồi';
      $lv = 'success';
      $action = "contact";
      BasicLibs::setAlert($mess, $lv);
      BasicLibs::redirect($action);
    }
  }  
?>