<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>
<?php 
  $contactInfo = new ContactInfo();
  $resultContactInfo = $contactInfo -> getContactInfo();
?>
	<div class="content">
	  <div class="container-fluid">
	    <div class="row">
        <div class="col-md-8 col-xs-12 col-md-offset-2">
          <div class="card">
            <div class="card-header" data-background-color="purple">
              <h4 class="title">Thông tin liên hệ</h4>
				      <p class="category">Xem và chỉnh sửa</p>
            </div>
            <div class="card-content">
              <form enctype="multipart/form-data" method="post" action="?action=updateContactInfo" id="contact"> 
              	<center><img id="review-img" src="../../upload/<?php echo $resultContactInfo['logo']; ?>" style="width: 200px;"></center>
                <input type="hidden" name="current-img" value="<?php echo $resultContactInfo['logo']; ?>">
                <div class="row">
                  <div class="col-xs-8 col-sm-offset-2 text-center">
                    <label class="btn btn-default btn-file btn-primary">
                    <i class="fa fa-folder"></i> <input type="file" style="display: none;" name="logo" id="logo">
                    </label>
                  </div>
                </div>

                <?php
                  BasicLibs::getAlert();
                ?>

                <div class="row">
                	<div class="col-sm-3 col-sm-offset-1">
                		<label for="store-name">Tên cửa hàng:</label>                      		
                	</div>

                	<div class="col-sm-7">
                		<p><?php echo $resultContactInfo['company_name']; ?></p>         		
                	</div>
                </div>

                <div class="row">
                	<div class="col-sm-3 col-sm-offset-1">
                		<label for="address">Địa chỉ:</label>                      		
                	</div>

                	<div class="col-sm-7">
                		<input type="text" class="form-control" name="address" id="address" value="<?php echo $resultContactInfo['address']; ?>">                   		
                	</div>
                </div>

                <div class="row">
                	<div class="col-sm-3 col-sm-offset-1">
                		<label for="branch">Chi nhánh:</label>                      		
                	</div>

                	<div class="col-sm-7">
                		<input type="text" class="form-control" name="branch" id="branch" value="<?php echo $resultContactInfo['branch']; ?>">                    		
                	</div>
                </div>

                <div class="row">
                	<div class="col-sm-3 col-sm-offset-1">
                		<label for="phone">SĐT:</label>                      		
                	</div>

                	<div class="col-sm-7">
                		<input type="number" class="form-control" name="phone" id="phone" value="<?php echo $resultContactInfo['phone']; ?>">
                	</div>
                </div>

                <div class="row">
                	<div class="col-sm-3 col-sm-offset-1">
                		<label for="email">Email:</label>                      		
                	</div>

                	<div class="col-sm-7">
                		<input type="email" class="form-control" name="email" id="email" value="<?php echo $resultContactInfo['email']; ?>">                    		
                	</div>
                </div>

                <div class="row">
                	<div class="col-sm-3 col-sm-offset-1">
                		<label for="intro">Giới thiệu:</label>                      		
                	</div>

                	<div class="col-sm-7">
                		<textarea class="form-control" name="intro" id="intro"><?php echo $resultContactInfo['introduce']; ?></textarea>                    		
                	</div>
                </div>
		
            		<div class="row">
            			<div class="col-sm-11 col-xs-12">
                    <div class="alert alert-danger hidden form-alert"></div>
                  	<button type="submit" class="btn btn-primary pull-right">Cập Nhật</button>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
	  </div>
	</div>

    <script type="text/javascript">
        let uploadImg = document.querySelector('[name="logo"]');
        uploadImg.addEventListener('change', function(){
          let review = document.getElementById('review-img');
          let input = document.querySelector('[name="logo"]');
          let file = input.files[0];
          let reader = new FileReader();
          reader.onload = (e) => {
            review.src = e.target.result;
          }
          reader.readAsDataURL(file);
        });

        let contact = document.getElementById('contact');
        contact.addEventListener('submit', (e) => {
          let message = document.querySelector('.form-alert');
          let imgFile = document.getElementById('logo');
          let address = document.getElementById('address');
          let branch = document.getElementById('branch');
          let phone = document.getElementById('phone');
          let email = document.getElementById('email');
          let intro = document.getElementById('intro');
          let html = [];

          if(imgFile.value != '') {
            let imgExt = imgFile.files[0].type;
            if (imgExt != 'image/png' && imgExt != 'image/jpg' && imgExt != 'image/jpeg') {
              let content = '- Chỉ hỗ trợ ảnh png, jpg, jpeg';
              html.push(content);
            }
          }

          if (address.value == '') {
            let content = '- Địa chỉ không được bỏ trống';
            html.push(content);
          }

          if (branch.value == '') {
            let content = '- Chi nhánh không được bỏ trống';
            html.push(content);
          }

          if (phone.value == '') {
            let content = '- SĐT không được bỏ trống';
            html.push(content);
          }

          if (email.value == '') {
            let content = '- Email không được bỏ trống';
            html.push(content);
          }

          if (intro.value == '') {
            let content = '- Giới thiệu không được bỏ trống';
            html.push(content);
          }

          if (html.length > 0) {
            let mess = '';
            e.preventDefault();
            message.classList.remove('hidden');
            for(let showMess of html) {
              let alert = `<p>${showMess}</p>`;
              mess += alert;
            }
            message.innerHTML = mess;
          }
        });
    </script>
<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>	