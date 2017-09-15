<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>

	<div class="content">
		<div class="container-fluid">
			<?php 
  	    BasicLibs::getAlert();
  	  ?>

  	  <div class="row">
  	  	<div class="col-xs-12">
  	  		<div class="card">
  	  			<div class="card-header" data-background-color="purple"">
  	  				<h4 class="title">Danh sách Banner quảng cáo</h4>
	          	<p class="category">Hiển thị và thao tác với các banner quảng cáo</p>
  	  			</div>

  	  			<div class="card-content table-responsive">
  	  				<table id="slide-list" class="table table-striped table-bordered table-hover">
  	  					<thead class="text-primary">
		              <th><b>ID</b></th>
		              <th><b>Hình ảnh</b></th>
		              <th><b>Tiêu đề</b></th>
		              <th><b>Mô tả ngắn</b></th>
		              <th><b>Link to</b></th>
		              <th><b>Thao tác</b></th>
	            	</thead>

	            	<tbody>
	            		<?php 
	            			foreach ($data as $key) {
	            		?>
	            		<tr>
	            			<td><?php echo $key['slide_id']; ?></td>
	            			<td>
	            				<center>
                        <a href="?action=updateImgSlide&id=<?php echo $key['slide_id']; ?>">
  	            				  <img src="../../upload/sliders/<?php echo $key['slide_image']; ?>" style="width: 100px;">    
                        </a>
                      </center>
	            			</td>

	            			<td>
	            				<a href="#" class="slide-title"><?php echo $key['slide_title']; ?></a>
	            			</td>

	            			<td>
	            				<a href="#" class="slide-desc"><?php echo $key['slide_description']; ?></a>
	            			</td>

	            			<td>
	            				<a href="#" class="slide-link"><?php echo $key['link']; ?></a>
	            			</td>

	            			<td>
	            				<a href="#" class="save">
	            					<i class="fa fa-edit"></i>Lưu lại 
	            				</a>
                      |
	            				<a href="?action=deleteSlide&id=<?php echo $key['slide_id']; ?>">
	            					<i class="fa fa-trash"></i>Xóa
	            				</a>
	            				<div class="message"></div>
	            			</td>
	            		</tr>

	            		<?php
	            			}
	            		?>
	            	</tbody>
  	  				</table>
  	  			</div>
  	  		</div>
  	  	</div>
  	  </div>

      <div class="add-slider">
        <div class="row">
          <div class="col-md-8 col-xs-12 col-md-offset-2">
            <div class="card">
              <div class="card-header" data-background-color="purple">
                <h4 class="title">Thêm Banner</h4>
              </div>

              <div class="card-content">
                <form enctype="multipart/form-data" method="post" id="slAdd" action="?action=addSlide">
 
                  <center><img src="../../upload/sliders/logo.png" id="review-img" style="width: 100px"></center>
                    <div class="row text-center">
                      <label class="btn btn-file btn-primary">
                        <i class="fa fa-folder"></i> <input type="file" name="slide-img" id="slide-img" style="display: none">
                      </label>        
                    </div>

                    <div class="form-group">
                      <label for="sltitle">Tiêu đề</label>                         
                      <input type="text" class="form-control" name="sltitle" id="sltitle">                        
                    </div>

                    <div class="form-group">
                      <label for="sldesc">Mô tả ngắn</label>                         
                      <input type="text" class="form-control" name="sldesc" id="sldesc">                        
                    </div>

                    <div class="form-group">
                      <label for="link-to">Link to</label>                         
                      <input type="text" class="form-control" name="link-to" id="link-to">                        
                    </div>
                    <div class="alert alert-danger hidden form-alert"></div>
                    <button type="submit" class="btn btn-primary pull-right">Thêm</button>
                    <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
      $('#slide-list').DataTable();

      $('.slide-title').editable('option', 'validate', function(v) {
        if(!v.trim()) return 'Không được để trống';
      });

      $('.slide-desc').editable('option', 'validate', function(v) {
        if(!v.trim()) return 'Không được để trống';
      });

      $('.slide-link').editable('option', 'validate', function(v) {
        if(!v.trim()) return 'Không được để trống';
      });
  	});

  	let state = {}

  	let save = document.querySelectorAll('.save');
  	for (let saveSlide of save) {
  		saveSlide.addEventListener('click', () => {
  			let td = saveSlide.parentElement;
  			let tr = td.parentElement;
  			let id = tr.children[0].textContent;
  			let title = tr.children[2].children[0].textContent;
  			let desc = tr.children[3].children[0].textContent;
  			let link = tr.children[4].children[0].textContent;
  			let tdSave = tr.children[5];
  			let message = tdSave.children[2];
  			message.innerHTML = '<span style="font-size: 13px" class="fa fa-spinner fa-pulse fa-3x fa-f"></span>';
  			$.ajax({
          url : "?action=updateSlider",
          type : "post",
          dataType:"text",
          data : {
          	id: id,
          	title: title,
          	desc: desc,
          	link: link
          },
          success : function (result){
          	message.textContent = 'saved';
          },
          error: function() {
            message.textContent = 'Lỗi kết nối';
          }
        });
  		});
  	};

    let uploadImg = document.querySelector('[name="slide-img"]');
    uploadImg.addEventListener('change', () => {
      let review = document.getElementById('review-img');
      let input = document.querySelector('[name="slide-img"]');
      let file = input.files[0];
      let reader = new FileReader();
      reader.onload = (e) => {
        review.src = e.target.result;
      }
      reader.readAsDataURL(file);
    });

    let slAdd = document.getElementById('slAdd');
    slAdd.addEventListener('submit', (e) => {
      let message = document.querySelector('.form-alert');
      let imgFile = document.getElementById('slide-img');
      let title = document.getElementById('sltitle');
      let desc = document.getElementById('sldesc');
      let link = document.getElementById('link-to');
      let html = [];

      if(imgFile.value != '') {
        let imgExt = imgFile.files[0].type;
        if (imgExt != 'image/png' && imgExt != 'image/jpg' && imgExt != 'image/jpeg') {
          let content = 'Chỉ hỗ trợ ảnh png, jpg, jpeg';
          html.push(content);
        }
      } else {
        let content = 'Hình ảnh không được để trống';
        html.push(content);
      }

      if (title.value == '') {
        let content = 'Tiêu đề không được để trống';
        html.push(content);
      }

      if (desc.value == '') {
        let content = 'Mô tả ngắn không được để trống';
        html.push(content);
      }

      if (link.value == '') {
        let content = 'Link to không được để trống';
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