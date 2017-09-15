<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <div class="card">
            <div class="card-header" data-background-color="purple">
              <h4 class="title">Thêm sản phẩm</h4>
              <p class="category">Điền thông tin sản phẩm</p>
            </div>

            <div class="card-content">
              <?php
                BasicLibs::getAlert();
              ?>

              <form enctype="multipart/form-data" method="post" action="?action=actionAddProduct" id="add-pro">
                <div class="row">
                  <div class="col-md-7 col-md-offset-1 col-xs-12">
                  <center><img id="review-img" src="../../upload/sliders/logo.png" id="review-img" style="width: 100px"></center>
                    <div class="row text-center">
                      <label class="btn btn-file btn-primary">
                        <i class="fa fa-folder"></i> <input type="file" name="feature" id="feature" style="display: none">
                      </label>        
                    </div>

                    <div class="row form-group">
                      <div class="col-xs-3 col-sm-offset-1">
                        <label for="name">Tên sản phẩm: (*)</label>                         
                      </div>

                      <div class="col-xs-6">
                        <input type="text" class="form-control" name="name" id="name">                       
                      </div>

                      <div class="col-xs-2 hidden">
                        <i class="fa fa-check check-btn"></i>
                        <i class="fa fa-times false-btn"></i>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-xs-3 col-sm-offset-1">
                        <label for="price">Giá: (*)</label>                         
                      </div>

                      <div class="col-xs-6">
                        <input type="number" class="form-control" name="price" id="price">                        
                      </div>

                      <div class="col-xs-2 hidden">
                        <i class="fa fa-check check-btn"></i>
                        <i class="fa fa-times false-btn"></i>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-xs-3 col-sm-offset-1">
                        <label for="discount">Giá giảm:</label>                          
                      </div>

                      <div class="col-xs-6">
                        <input type="number" class="form-control" name="discount" id="discount">                       
                      </div>

                      <div class="col-xs-2 hidden">
                        <i class="fa fa-check check-btn"></i>
                        <i class="fa fa-times false-btn"></i>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-xs-3 col-sm-offset-1">
                        <label for="description">Mô tả ngắn: (*)</label>                         
                      </div>

                      <div class="col-xs-6">
                        <textarea class="form-control" name="description" id="description"></textarea>
                      </div>

                      <div class="col-xs-2 hidden">
                        <i class="fa fa-check check-btn"></i>
                        <i class="fa fa-times false-btn"></i>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-xs-3 col-sm-offset-1">
                        <label for="detail">Chi tiết:</label>                         
                      </div>

                      <div class="col-xs-6">
                        <textarea class="form-control" name="detail" id="detail"></textarea>                       
                      </div>

                      <div class="col-xs-2 hidden">
                        <i class="fa fa-check check-btn"></i>
                        <i class="fa fa-times false-btn"></i>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-xs-3 col-sm-offset-1">
                        <label for="slogan">Hiển thị:</label>                          
                      </div>

                      <div class="col-xs-6">
                        <select class="form-control" name="public">
                          <option value="0">Không</option>
                          <option value="1">Có</option>
                        </select>                    
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-xs-3 col-sm-offset-1">
                        <label for="category">Loại:</label>                          
                      </div>

                      <div class="col-xs-6">
                        <select class="form-control" name="cate">
                          <?php
                            $cate = new CateModel();
                            $category = $cate -> getAllCate();
                            foreach ($category as $valueCate) {
                          ?>
                            <option value="<?php echo  $valueCate['category_id']; ?>">
                              <?php echo  $valueCate['category_name']; ?>
                            </option>
                          <?php 
                            }
                          ?>
                        </select>       
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3 col-xs-12">
                  </div>
                </div>

                <div id="message" class="alert alert-danger hidden"></div>
            
                <div class="row form-group">
                  <div class="col-sm-6 col-sm-offset-4">
                    <a href="?action=listProduct" style="color: #fff">
                      <button type="button" class="btn btn-primary pull-left">
                        Danh sách sản phẩm
                      </button>
                    </a>

                    <button type="submit" class="btn btn-primary pull-left">Thêm</button>
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
    //hiển thị ảnh để xem trước
    let uploadImg = document.querySelector('[name="feature"]');
    uploadImg.addEventListener('change', () => {
      let review = document.getElementById('review-img');
      let input = document.querySelector('[name="feature"]');
      let file = input.files[0];
      let reader = new FileReader();
      reader.onload = (e) => {
        review.src = e.target.result;
      }
      reader.readAsDataURL(file);
    });

    let addPro = document.getElementById('add-pro');
    addPro.addEventListener('submit', (e) => {
      let message = document.getElementById('message');
      let imgFile = document.getElementById('feature');
      let name = document.querySelector('[name="name"]').value.trim();
      let price = document.querySelector('[name="price"]').value.trim();
      let discount = document.querySelector('[name="discount"]').value.trim();
      let description = document.querySelector('[name="description"]').value.trim();
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

      if (name == '') {
        let content = 'Tên sản phẩm không được để trống';
        html.push(content);
      }

      if (price == '' || price < 0) {
        let content = 'Giá sản phẩm không được để trống và lớn hơn 0';
        html.push(content);
      }

      if (discount < 0) {
        let content = 'Giá giảm phải lớn hơn 0';
        html.push(content);
      }

      if (description == '') {
        let content = 'Mô tả sản phẩm không được để trống';
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