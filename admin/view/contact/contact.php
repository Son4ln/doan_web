<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>

  <div class="content">
  	<div class="container-fluid">
  	  <?php 
  	    BasicLibs::getAlert();
  	  ?>
  	  <div class="row">
    		<div class="col-lg-12 col-md-12">
    		  <div class="card">
    		  	<div class="card-header" data-background-color="purple">
              <h4 class="title">Danh sách các liên hệ</h4>
              <p class="category">Hiển thị và thao tác với các liên hệ, phản hồi của khách hàng</p>
            </div>

            <div class="card-content table-responsive">
              <table id="contact-list" class="table table-striped table-bordered table-hover">
                <thead class="text-primary">
                  <th>ID</th>
                  <th>Tên</th>
                  <th>Email</th>
                  <th>Ngày Gửi</th>
                  <th>Chủ Đề</th>
                  <th>Nội Dung</th>
                  <th>Thao tác</th>
                </thead>

                <tbody>
                  <?php
                    foreach ($data as $value) {
                  ?>
                  <tr>
    	            	<td><?php echo $value['form_id']; ?></td>
    	            	<td><?php echo $value['full_name']; ?></td>
    	            	<td><?php echo $value['email']; ?></td>
                    <td><?php echo $value['send_date']; ?></td> 
                    <td><?php echo $value['subject']; ?></td> 
                    <td><?php echo $value['message']; ?></td>
                    <td>
                      <a href="?action=deleteContact&form_id=<?php echo $value['form_id']; ?>"><i class="fa fa-trash"></i> Xóa</a>
                      <div class="message">    
                      </div>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
    		  </div>
    		</div>
  	  </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#contact-list').DataTable();
    });
  </script>

<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>