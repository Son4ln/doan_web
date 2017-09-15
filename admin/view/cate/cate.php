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
    	        <h4 class="title">Danh sách loại sản phẩm</h4>
    	        <p class="category">Hiển thị và thao tác với loại sản phẩm</p>
    	      </div>

    	        <div class="card-content table-responsive">
    	          <table id="cate-list" class="table table-striped table-bordered table-hover">
    	            <thead class="text-primary bold">
    	              <th><b>ID</b></th>
    	              <th><b>Tên</b></th>
    	              <th><b>Thao tác</b></th>
    	            </thead>

    	            <tbody>
    	              <?php
    	                foreach ($data as $value) {
    	              ?>
    	              <tr>
    	            	<td><?php echo $value['category_id']; ?></td>
                    
    	            	<td data-id="<?php echo $value['category_id']; ?>">
                    <a href="#" class="cate-name">
                      <?php echo $value['category_name']; ?>
                    </a>
                    </td>
    	            	<td>
    	            		<a href="#" class="save"><i class="fa fa-edit"></i>Lưu lại</a> | 
                      <a href="?action=deleteCate&id=<?php echo $value['category_id']; ?>"><i class="fa fa-trash"></i>Xóa</a>
    	            		<div class="message"></div>
    	            	</td>	
    	              </tr>
    	              <?php } ?>
    	            </tbody>
    	          </table>
    	        </div>
    		  </div>
    		</div>
  	  </div>

  	  <div class="row">
  	  	<div class="col-md-8 col-xs-12 col-md-offset-2 col-xs-12">
          <div class="card">
            <div class="card-header" data-background-color="purple">
              <h4 class="title">Thêm loại sản phẩm</h4>
            </div>

            <div class="card-content table-responsive">
              <form class="form-cate" method="post" action="?action=addCate">
                <div class="form-group">
                  <label for="name">Tên loại sản phẩm</label>
                  <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                  <div class="alert-form alert alert-danger hidden"></div>
                  <button type="submit" class="btn btn-primary pull-right">Thêm</button>
                </div>
              </form>
            </div>
          </div>
  	  	  
  	  	</div>
  	  </div>
  	</div>
  </div>

  <script type="text/javascript">
  	$(document).ready(function() {
      $('#cate-list').DataTable();
      $('.cate-name').editable();
      $('.cate-name').editable('option', 'validate', function(v) {
        if(!v) return 'Không được để trống';
      });
  	});

  	let save = document.querySelectorAll('.save');
  	for (let saveCate of save) {
  	  saveCate.addEventListener('click', () => {
  	    let td = saveCate.parentElement;
  	    let tr = td.parentElement;
  	    let category = tr.children[1];
  	    let cateId = category.getAttribute('data-id');
  	    let cateName = category.children[0].textContent;
  	    let tdSaving = tr.children[2];
  	    let message = tdSaving.children[2];
  	    message.innerHTML = '<span style="font-size: 13px" class="fa fa-spinner fa-pulse fa-3x fa-f"></span>';
  	    $.ajax({
          url : "?action=updateCate",
          type : "post",
          dataType:"text",
          data : {
          	id: cateId,
          	name: cateName
          },
          success : function (result){
          	message.textContent = 'saved';
          },
          error: function() {
            message.textContent = 'Lỗi kết nối';
          }
        });
  	  });
  	}

  	let submit = document.querySelector('.form-cate');
  	submit.addEventListener('submit', (e) => {
  		let name = document.querySelector("[name='name']");
  		let alert = document.querySelector('.alert-form');
  		if (name.value.trim() == '') {
  			e.preventDefault();
  			alert.classList.remove('hidden');
  			alert.innerHTML = 'Vui lòng nhập tên loại sản phẩm';
  		}
  	});
  </script>

<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>