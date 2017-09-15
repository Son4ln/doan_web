<?php
  class ConnectMySql {

    public $database = "doan_shop";
    var $db = null;
    function createDataBase(){
      try {

        $this->db = new PDO("mysql:dbname=;host=localhost", "root", "" );
        $this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

        $deldb = "drop database IF EXISTS $this->database";
        $this->db->exec($deldb);

        $createdb = "CREATE DATABASE $this->database CHARACTER SET utf8 COLLATE utf8_general_ci";
        $this->db->exec($createdb);
     
      } catch(PDOException $e) {
        echo $e->getMessage();
      }
    }

    function setConnect () {
      $this->db = new PDO("mysql:dbname=$this->database;host=localhost", "root", "" );
      $this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      //Error Handling
    }
  }

  $dataBase = new ConnectMySql();
  $dataBase -> createDataBase();

  //include lớp con kế thừa lớp database
  include "include.php";

  //khai báo object
  //khai báo migrate
  $contactInfo = new ContactInfo();
  $cate = new Categories();
  $contactForm = new ContactForm();
  $img = new Images();
  $client = new Client();
  $orderDetail = new OrderDetail();
  $orders = new Orders();
  $products = new Products();
  $slideShow = new SlideShow();
  $users = new Users();
  $rela = new Relationship();

  //khai báo seeder

  //sử dụng phương thức của lớp con
  //sử dụng migrate
  $contactInfo -> createContactInfo();
  $cate -> createCategories();
  $contactForm -> createContactForm();
  $img -> createImages();
  $orderDetail -> createOrderDetail();
  $orders -> createOrders();
  $client -> createClient();
  $products -> createProducts();
  $slideShow -> createSlideShow();
  $users -> createUsers();
  $rela -> createRelationship();

  //sử dụng seeder
  echo "Created Database";
?>