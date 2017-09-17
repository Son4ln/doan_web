<?php
  include 'api.php';

  $verb = $_SERVER['REQUEST_METHOD'];

  if(isset($_GET["url"])){
    $url=$_GET["url"]; }
  elseif (isset($_POST['url']))
  {
    $url=$_POST["url"];
  }
  
  //Phương thức get
  if ($verb == 'GET') {
    //tạo link api với phương thức get
    switch ($url) {
      case 'countOrder':
        $order = new Order();
        $order -> countOrder();
        break;

      case 'countNewOrder':
        $order = new Order();
        $order -> countNewOrder();
        break;

      case 'countContactForm':
        $contact = new Contact();
        $contact -> countContactForm();
        break;
        
      default:
      break;
    }

    //Phương thức Post
  } elseif ($verb == 'POST') {
      //tạo link api với phương thức post
      switch ($url) {
        case 'clientOrder':
          $order = new ClientOrderAct();
          $order -> post();
          break;

        default:
        break;
      }

  //Phương thức PUT
  } elseif ($verb == 'PUT') {
      //tạo link api với phương thức Put
      switch ($url) {
        case '':
      
        break;

        default:
        break;
    }

    //Phương thức DELETE
  } elseif ($verb == 'DELETE') {
      //tạo link api với phương thức DELETE
      switch ($url) {
        case '':
           
        break;

        default:
        break;
    }
  }
?>