<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>
<?php 
  $contactInfo = new ContactModel();
  $resultContactInfo = $contactInfo -> getContactDetail($id);
?>
	<div class="content">
	  <div class="container-fluid">
	    <div class="row">
        <div class="col-md-8 col-xs-12 col-md-offset-2 col-xs-12">
          <div class="card">
            <div class="card-content table-responsive">
              <div class="alert-form alert alert-danger hidden"></div>
              <form class="form-cate" method="post" action="?action=addContact">
                <div class="form-group">
                  <label for="name">Tên người gửi</label>
                  <input type="text" name="full_name" id="name" class="form-control" value="<?php echo $resultContactInfo['full_name']?>" readonly>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control" value="<?php echo $resultContactInfo['email']?>" readonly>
                </div>

                <div class="form-group">
                  <label for="subject">Vấn đề</label>
                  <input type="text" name="subject" id="subject" class="form-control" value="<?php echo $resultContactInfo['subject']?>" readonly>
                </div>

                <div class="form-group">
                  <label for="content">Nội dung</label>
                  <textarea class="form-control" readonly><?php echo $resultContactInfo['full_name']?></textarea>
                </div>

                <div class="form-group">
                  <a href="?action=deleteContact&form_id=<?php echo $resultContactInfo['form_id']; ?>" class="btn btn-primary pull-right"><i class="fa fa-trash"></i> Xóa</a>
                  <a href="?action=contact" class="btn btn-primary pull-right"><i class="fa fa-undo"></i> Trở Về</a>
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
    </script>
<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>	