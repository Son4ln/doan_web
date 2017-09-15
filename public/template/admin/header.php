<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="" />
    <link rel="icon" type="image/png" href="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Dỗ An Shop</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="../../public/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../public/css/bootstrap-editable.css" rel="stylesheet"/>
    <!--  Material Dashboard CSS    -->
    <link href="../../public/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <!--     Fonts and icons     -->
    <link href="../../public/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../public/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

    <!-- nhúng js -->

    <!--   Core JS Files   -->
    <script src="../../public/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="../../public/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../public/js/material.min.js" type="text/javascript"></script>
    <!-- <script src="../../public/js/material.min.js" type="text/javascript"></script> -->

    <!--  Charts Plugin -->
    <!-- <script src="../../public/js/chartist.min.js"></script> -->

    <!--  Notifications Plugin    -->
    <!-- <script src="../../public/js/bootstrap-notify.js"></script> -->

    <!--  Google Maps Plugin    -->

    <!-- Material Dashboard javascript methods -->
    <script src="../../public/js/material-dashboard.js"></script>

    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <!-- <script src="../../public/js/demo.js"></script> -->

    <script src="../../public/js/jquery.dataTables.min.js"></script>
    <script src="../../public/js/dataTables.bootstrap.min.js"></script>
    <script src="../../public/js/bootstrap-editable.min.js"></script>
</head>

<body>

    <div class="wrapper">

        <div class="sidebar" data-color="purple" data-image="">
            <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

                Tip 2: you can also add an image using data-image tag
            -->

            <div class="logo">
                <a href="" class="simple-text">
                    Đỗ An Shop
                </a>
            </div>

            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="
                      <?php
                        if(!isset($_GET['action']) || $_GET['action'] == 'home'){
                          echo 'active';
                        }
                      
                      ?>
                    ">
                        <a href="?action=home">
                            <i class="material-icons">dashboard</i>
                            <p>Bảng Điều Khiển</p>
                        </a>
                    </li>

                    <li class="
                      <?php
                        if(isset($_GET['action'])){
                          if ($_GET['action'] == 'listSlider' || $_GET['action'] == 'updateImgSlide') {
                             echo 'active';
                          }
                        }
                      ?>
                    ">
                        <a href="?action=listSlider">
                            <i class="fa fa-file-image-o"></i>
                            <p>Sliders</p>
                        </a>
                    </li>

                    <li class="
                      <?php
                        if(isset($_GET['action'])){
                          if ($_GET['action'] == 'listCate') {
                             echo 'active';
                          }
                        }
                      ?>
                    ">
                        <a href="?action=listCate">
                            <i class="fa fa-bars"></i>
                            <p>Loại Sản Phẩm</p>
                        </a>
                    </li>

                    <li class="
                      <?php
                        if(isset($_GET['action'])){
                          if ($_GET['action'] == 'listProduct' || $_GET['action'] == 'addProduct' || $_GET['action'] == 'editProduct') {
                             echo 'active';
                          }
                        }
                      ?>
                    ">
                        <a href="?action=listProduct">
                            <i class="fa fa-cubes"></i>
                            <p>Sản Phẩm</p>
                        </a>
                    </li>

                    <li class="
                      <?php
                        if(isset($_GET['action'])){
                          if ($_GET['action'] == 'listOrder' || $_GET['action'] == 'orderDetail') {
                             echo 'active';
                          }
                        }
                      ?>
                    ">
                        <a href="?action=listOrder">
                            <i class="fa fa-shopping-cart"></i>
                            <p>Hóa Đơn</p>
                        </a>
                    </li>

                    <li class="
                      <?php
                        if(isset($_GET['action'])){
                          if ($_GET['action'] == 'contactInfo') {
                             echo 'active';
                          }
                        }
                      ?>
                    ">
                        <a href="?action=contactInfo">
                            <i class="material-icons text-gray">notifications</i>
                            <p>Thông Tin Liên Hệ</p>
                        </a>
                    </li>
                    <li class="
                      <?php
                        if(isset($_GET['action'])){
                          if ($_GET['action'] == 'contact') {
                             echo 'active';
                          }
                        }
                      ?>
                    ">
                        <a href="?action=contact">
                            <i class="material-icons">location_on</i>
                            <p>Các Liên Hệ</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Material Dashboard</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                   <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
                                   <p class="hidden-lg hidden-md">Profile</p>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Sửa mật khẩu</a>
                                    </li>
                                    <li>
                                        <a href="?action=logout">Đăng xuất</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>


                    </div>
                </div>
            </nav>