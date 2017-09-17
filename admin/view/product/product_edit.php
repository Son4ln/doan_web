<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>

<?php
  $products = new ProductsModel();
  $result = $products -> getByIdProduct($id);
?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <div class="card">
            <div class="card-header" data-background-color="purple">
              <h4 class="title">Chi tiết sản phẩm</h4>
              <p class="category">Xem và chỉnh sửa thông tin sản phẩm</p>
            </div>

            <div class="card-content">
              <?php
                BasicLibs::getAlert();
              ?>

              <form enctype="multipart/form-data" method="post" action="?action=updateProduct" id="edit-pro"> 
                <input type="hidden" name="id" value="<?php echo $result['product_id']; ?>">
                <div class="row">
                  <div class="col-md-7 col-md-offset-1 col-xs-12">
                    <center><img id="review-img" src="../../upload/products/<?php echo $result['featured_img']; ?>" style="width: 100px;"></center>
                    <input type="hidden" name="current-img" value="<?php echo $result['featured_img']; ?>">
                    <div class="row">
                      <div class="col-xs-8 col-xs-offset-2 text-center">
                        <label class="btn btn-file btn-primary">
                        <i class="fa fa-folder"></i> <input class="change-input" type="file" style="display: none;" name="feature" id="feature">
                        </label>

                        <button type="button" class="btn btn-primary" id="clear-img"><i class="fa fa-times"></i></button>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-xs-3 col-sm-offset-1">
                        <label for="name">Tên sản phẩm:</label>                         
                      </div>

                      <div class="col-xs-6">
                        <input type="text" class="form-control change-input" name="name" id="name"
                        value="<?php echo $result['product_name']; ?>">                       
                      </div>

                      <div class="col-xs-2 hidden">
                        <i class="fa fa-times close-btn"></i>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-xs-3 col-sm-offset-1">
                        <label for="price">Giá:</label>                         
                      </div>

                      <div class="col-xs-6">
                        <input type="number" class="form-control change-input" name="price" id="price"
                        value="<?php echo $result['price']; ?>">                        
                      </div>

                      <div class="col-xs-2 hidden">
                        <i class="fa fa-times close-btn"></i>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-xs-3 col-sm-offset-1">
                        <label for="discount">Giá giảm:</label>                          
                      </div>

                      <div class="col-xs-6">
                        <input type="number" class="form-control change-input" name="discount" id="discount"
                        value="<?php echo $result['discount']; ?>">                       
                      </div>

                      <div class="col-xs-2 hidden">
                        <i class="fa fa-times close-btn"></i>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-xs-3 col-sm-offset-1">
                        <label for="description">Mô tả ngắn:</label>                         
                      </div>

                      <div class="col-xs-6">
                        <textarea class="form-control change-input" name="description" id="description"
                        value=""><?php echo $result['product_description']; ?></textarea>
                      </div>

                      <div class="col-xs-2 hidden">
                        <i class="fa fa-times close-btn"></i>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-xs-3 col-sm-offset-1">
                        <label for="detail">Chi tiết:</label>                         
                      </div>

                      <div class="col-xs-6">
                        <textarea class="form-control change-input" name="detail" id="detail"
                        value=""><?php echo $result['product_detail']; ?></textarea>                       
                      </div>

                      <div class="col-xs-2 hidden">
                        <i class="fa fa-times close-btn"></i>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-xs-3 col-sm-offset-1">
                        <label for="public">Hiển thị:</label>                          
                      </div>

                      <div class="col-xs-6">
                        <select class="form-control change-input" name="public" id="public">
                          <option value="0" <?php if ($result['product_public'] == 0) { echo 'selected="selected"';} ?>>Không</option>
                          <option value="1" <?php if ($result['product_public'] == 1) { echo 'selected="selected"';} ?>>Có</option>
                        </select>                    
                      </div>

                      <div class="col-xs-2 hidden">
                        <i class="fa fa-times close-btn"></i>
                      </div>
                    </div>

                    <div class="row form-group">
                      <div class="col-xs-3 col-sm-offset-1">
                        <label for="category">Loại:</label>                          
                      </div>

                      <div class="col-xs-6">
                        <select class="form-control change-input" name="cate">
                          <?php
                            $cate = new CateModel();
                            $category = $cate -> getAllCate();
                            foreach ($category as $valueCate) {
                          ?>
                            <option value="<?php echo  $valueCate['category_id']; ?>"
                            <?php
                              if ($result['category_id'] == $valueCate['category_id']) {
                                echo 'selected="selected"';
                              }
                            ?>
                            >
                              <?php echo  $valueCate['category_name']; ?>
                            </option>
                          <?php 
                            }
                          ?>
                        </select>       
                      </div>

                      <div class="col-xs-2 hidden">
                        <i class="fa fa-times close-btn"></i>
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
                    
                    <button type="submit" disabled="disabled" class="btn btn-primary pull-left">Cập nhật</button>
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
      // lấy giá trị gốc trong input
      let dataImg = document.querySelector('[name="current-img"]').value;
      let dataName = document.querySelector('[name="name"]').value;
      let dataPrice = document.querySelector('[name="price"]').value;
      let dataDiscount = document.querySelector('[name="discount"]').value;
      let dataDescription = document.querySelector('[name="description"]').innerHTML;
      let dataDetail = document.querySelector('[name="detail"]').innerHTML;
      let dataPublic = document.querySelector('[name="public"]').value;
      let dataCate = document.querySelector('[name="cate"]').value;
      let count = 0;

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

      //trả hình ảnh lại giá trị ban đầu
      let clearImg = document.getElementById('clear-img');
      clearImg.addEventListener('click', () => {
        let review = document.getElementById('review-img');
        let input = document.querySelector('[name="feature"]');
        review.src = '../../upload/'+dataImg;
        input.value = '';
      });

      // lấy  tất cả thẻ input và reset lại giá trị ban đầu khi nhấn giấu x
      let allInput = document.querySelectorAll('.change-input');
      for (let selectInput of allInput) {
        selectInput.addEventListener('keyup', (e) => {
          let keyCode = event.keyCode;

          if (keyCode != 13 && keyCode != 9 && keyCode != 17) {

            let nameInput = selectInput.getAttribute('name');
            let ancient = e.target.parentElement.parentElement;
            let closeBtn = ancient.children[2];
            closeBtn.classList.remove("hidden");


            //hành động khi bấm dấu nhân
            ancient.children[2].addEventListener('click', () => {

                // trả giá trị lại ban đầu
              if(nameInput == 'name'){
                selectInput.value = dataName;
                closeBtn.classList.add("hidden");
              }

              if(nameInput == 'price') {
                selectInput.value = dataPrice;
                closeBtn.classList.add("hidden");
              }

              if(nameInput == 'discount') {
                selectInput.value = dataDiscount;
                closeBtn.classList.add("hidden");
              }

              if(nameInput == 'description') {
                selectInput.value = dataDescription;
                closeBtn.classList.add("hidden");
              }

              if(nameInput == 'detail') {
                selectInput.value = dataDetail;
                closeBtn.classList.add("hidden");
              }

              if(nameInput == 'public') {
                selectInput.value = dataPublic;
                closeBtn.classList.add("hidden");
              }

              if(nameInput == 'cate') {
                selectInput.value = dataCate;
                closeBtn.classList.add("hidden");
              }                
            });
          }
      
        });
      }

      //đặt 0.5s để nhận kết quả và xét điều kiện nút submit
      setInterval(() => {
        let newImg = document.querySelector('[name="feature"]').value;
        let newName = document.querySelector('[name="name"]').value.trim();
        let newPrice = document.querySelector('[name="price"]').value.trim();
        let newDiscount = document.querySelector('[name="discount"]').value.trim();
        let newDescription = document.querySelector('[name="description"]').value.trim();
        let newDetail = document.querySelector('[name="detail"]').value.trim();
        let newPublic = document.querySelector('[name="public"]').value.trim();
        let newCate = document.querySelector('[name="cate"]').value.trim();

        if(newName != dataName || newPrice != dataPrice || newDiscount != dataDiscount || newDescription != dataDescription
          || newDetail != dataDetail || newPublic != dataPublic || newCate != dataCate || newImg != '') {
          document.querySelector('[type="submit"]').disabled = false;
        } else {
          document.querySelector('[type="submit"]').disabled = true;
        }
      },500);

      let editPro = document.getElementById('edit-pro');
      editPro.addEventListener('submit', (e) => {
        let message = document.getElementById('message');
        let imgFile = document.getElementById('feature');
        let name = document.querySelector('[name="name"]').value.trim();
        let price = document.querySelector('[name="price"]').value;
        let discount = document.querySelector('[name="discount"]').value;
        let description = document.querySelector('[name="description"]').value.trim();
        let html = [];

        if(imgFile.value != '') {
          let imgExt = imgFile.files[0].type;
          if (imgExt != 'image/png' && imgExt != 'image/jpg' && imgExt != 'image/jpeg') {
            let content = 'Chỉ hỗ trợ ảnh png, jpg, jpeg';
            html.push(content);
          }
        }

        if (name == '') {
          let content = 'Tên sản phẩm không được để trống';
          html.push(content);
        }

        if (price == '' || price <= 0) {
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