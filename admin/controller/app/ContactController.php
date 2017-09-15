<?php
  class ContactController
  {	
  	function showContact()
  	{
      $contact = new ContactModel();
      $data = $contact -> getContact();
  		include '../view/contact/contact.php';
  	}

  	function deleteContact() 
    {
      $formId = $_GET['form_id'];
      $contact = new ContactModel();
      $contact -> deleteContact($formId);
      $mess = 'Đã xóa bài liên hệ, phản hồi';
      $lv = 'success';
      $action = "contact";
      BasicLibs::setAlert($mess, $lv);
      BasicLibs::redirect($action);
    }

    function updateContactDetail() {
      $id = $_GET['form_id'];
      $contact = new ContactModel();
      $contact -> contactDetail($id, 1);
      $action = "contactDetail";
      BasicLibs::formId($action, $id);
    }

    function contactDetail() {
      $id = $_GET['form_id'];
      include '../view/contact/contactDetail.php';
    }
  }  
?>