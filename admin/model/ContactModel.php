<?php
  class ContactModel extends DataBase {
    function getContact () {
      $query = 'SELECT * FROM contact_form';
      $result = parent::getList($query);
      return $result;
    }

    function deleteContact($form_id) {
      $query = "DELETE FROM contact_form WHERE form_id = $form_id";
      parent::exec($query);
    }

    function contactDetail($id, $status) {
      $query = "update contact_form set status = '$status' where form_id = '$id'";
      parent::exec($query);
    }

    function getContactDetail ($id) {
      $query = "SELECT * FROM contact_form WHERE form_id = '$id'";
      $result = parent::getInstance($query);
      return $result;
    }
  }
?>