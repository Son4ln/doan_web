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

              <form enctype="multipart/form-data" method="post" action="?action=actionAddProduct">
                <div class="row">
                  <div class="col-md-7 col-md-offset-1 col-xs-12">
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
                        <label for="name">Ảnh đại diện: (*)</label>                         
                      </div>

                      <div class="col-xs-6">
                        <input type="file" name="feature" id="feature">                   
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
                        <label for="description">Mô tả ngắn:</label>                         
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

<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>