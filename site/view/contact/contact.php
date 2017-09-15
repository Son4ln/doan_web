<?php include $ROOT.'public/template/site/header.php' ?>
	<div class="row">
  	  	<div class="col-md-8 col-xs-12 col-md-offset-2 col-xs-12">
          <div class="card">
            <div class="card-content table-responsive">
              <div class="alert-form alert alert-danger hidden"></div>
              <form class="form-cate" method="post" action="?action=addContact">
				<div class="form-group">
					<label for="name">Tên người gửi</label>
					<input type="text" name="full_name" id="name" class="form-control">
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control">
				</div>

				<div class="form-group">
					<label for="subject">Vấn đề</label>
					<input type="text" name="subject" id="subject" class="form-control">
				</div>

				<div class="form-group">
					<label for="content">Nội dung</label>
					<input type="text" name="message" id="content" class="form-control">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary pull-right">Thêm</button>
				</div>
			</form>
            </div>
          </div>
  	  	  
  	  	</div>
  	  </div>
<?php include $ROOT.'public/template/site/footer.php' ?>   
