<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

  <link href="../../public/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../../public/css/material-dashboard.css" rel="stylesheet"/>
  <link href="../../public/css/font-awesome.min.css" rel="stylesheet">

  <script src="../../public/js/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="../../public/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="../../public/js/material.min.js" type="text/javascript"></script>
  <script src="../../public/js/material-dashboard.js"></script>
</head>
<body>
	<div class="content">
  	<div class="container-fluid">
  		<div class="row">
  	  	<div class="col-md-6 col-xs-12 col-md-offset-3 col-xs-12">
          <div class="card">
            <div class="card-header" data-background-color="purple">
              <h4 class="title"><i class="fa fa-key" aria-hidden="true"></i> Đăng Nhập</h4>
            </div>

            <div class="card-content table-responsive">
              <form class="form-cate" method="post" action="?action=login">
              	<?php
                	BasicLibs::getAlert();
              	?>
                <div class="form-group">
                  <label for="name">Username</label>
                  <input type="text" name="username" id="username" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="name">Password</label>
                  <input type="password" name="pass" id="pass" class="form-control" required>
                </div>

                <div class="form-group">
                  <div class="alert-form alert alert-danger hidden"></div>
                  <button type="submit" class="btn btn-primary pull-right">Đăng nhập</button>
                </div>
              </form>
            </div>
          </div>
  	  	  
  	  	</div>
  	  </div>
  	</div>
  </div>
</body>
</html>