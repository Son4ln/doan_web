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
  }
?>