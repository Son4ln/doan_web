<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>
	<div class="content">
  	<div class="container-fluid">
  		<div class="row">
  	  	<div class="col-md-8 col-xs-12 col-md-offset-2 col-xs-12">
          <div class="card">
            <div class="card-header" data-background-color="purple">
              <h4 class="title"><i class="fa fa-key" aria-hidden="true"></i> Đổi thông tin</h4>
            </div>

            <div class="card-content table-responsive">
              <form class="form-user" method="post" action="?action=updateUserAct">
              	<?php
                	BasicLibs::getAlert();
              	?>
                <div class="form-group">
                  <label for="name">Username</label>
                  <input type="text" name="username" id="username" class="form-control" required value="<?php echo $user['username']; ?>">
                </div>

                <div class="form-group">
                  <label for="pass">Mật khẩu cũ</label>
                  <input type="password" name="pass" id="pass" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="new-pass">Mật khẩu mới</label>
                  <input type="password" name="new-pass" id="new-pass" class="form-control">
                </div>

                <div class="form-group">
                  <label for="repass">Nhập lại mật khẩu mới</label>
                  <input type="password" name="repass" id="repass" class="form-control">
                </div>

                <div class="form-group">
                  <div class="alert-form alert alert-danger hidden"></div>
                  <button type="submit" class="btn btn-primary pull-right">Cập nhập</button>
                </div>
              </form>
            </div>
          </div>
  	  	  
  	  	</div>
  	  </div>
  	</div>
  </div>

  <script type="text/javascript">
    let state = {
      pass: ''
    };
    let form = document.querySelector('.form-user');
    form.addEventListener('submit', (e) => {
      let newPass = document.getElementById('new-pass');
      let rePass = document.getElementById('repass');
      let mess = document.querySelector('.alert-form');
      if (newPass.value != rePass.value) {
        e.preventDefault();
        mess.classList.remove('hidden');
        mess.textContent = 'Nhập lại mật khẩu mới sai';
      };
    });

  </script>
<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>