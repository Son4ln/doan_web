<<<<<<< Updated upstream
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
                            $cate = new CategoriesModel();
                            $category = $cate -> getAllCategories();
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

                    <button type="submit" disabled="disabled" class="btn btn-primary pull-left">Thêm</button>
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
=======
<?php include '../views/admin/header.php'; ?>
<?php include '../views/admin/nav.php'; ?>
    <!-- container here -->
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Add</small>
                        </h1>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="alert" id="showMes"></div>
                    </div>

                    <div class="col-lg-12">
                        <?php echo $alert; ?>
                    </div>

                    <?php
                            $cate = new Categories();
                            $category = $cate -> getCategories();
                            $feature = new Features();
                            $features = $feature -> getFeatures();
                            $brand = new Brands();
                            $brands = $brand -> getBrands();
                            $origin = new Origin();
                            $origins = $origin -> getOrigin();
                        ?>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="?action=productAddAction" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name (*)</label>
                                <input class="form-control" type="text" id="txtName" name="txtName"  />
                                <p style="color: red"><i id="alertName"></i></p>
                            </div>
                            <div class="form-group">
                                <label>Ảnh 1 (*)</label>
                                <input type="file" class="form-control" id="fImages1" name="fImages1">
                                <p style="color: red"><i id="alertimg1"></i></p>
                            </div>
                            <div class="form-group">
                                <label>Ảnh 2 (*)</label>
                                <input type="file" class="form-control" id="fImages2" name="fImages2">
                                <p style="color: red"><i id="alertimg2"></i></p>
                            </div>
                            <div class="form-group">
                                    <label>Ảnh 3 (*)</label>
                                    <input type="file" class="form-control" id="fImages3" name="fImages3">
                                    <p style="color: red"><i id="alertimg3"></i></p>
                            </div>
                            <div class="form-group">
                                <label>Price (*)</label>
                                <input class="form-control" type="number" id="txtPrice" name="txtPrice"   />
                                <p style="color: red"><i id="alertprice"></i></p>
                            </div>
                            <div class="form-group">
                                <label>Discount (*)</label>
                                <input class="form-control" type="number" id="txtDiscount"  rows="3" name="txtDiscount">
                                <p style="color: red"><i id="alertdisc"></i></p>
                            </div>
                            <div class="form-group">
                                <label>Currency (*)</label>
                                <input type="text" class="form-control" id="txtCurrency"  rows="3" name="txtCurrency">
                                <p style="color: red"><i id="alertcerren"></i></p>
                            </div>
                            <div class="form-group">
                                <label>Mô tả (*)</label>
                                <textarea class="form-control" id="txtDesc" name="txtDesc" ></textarea>
                                <p style="color: red"><i id="alertdesc"></i></p>
                            </div>
                            <div class="form-group">
                                <label>Chi tiết (*)</label>
                                <textarea name="txtDetail" id="txtDetail" class="form-control" rows="3">

                                </textarea>
                                <p style="color: red"><i id="alertdetail"></i></p>
                                 <script>
                                    CKEDITOR.replace( 'txtDetail');
                                </script>
                            </div>
                            <div class="form-group">
                                <label>Product in stock (*)</label>
                                <input type="number" class="form-control" id="txtStock" rows="3" name="txtStock">
                                <p style="color: red"><i id="alertstock"></i></p>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="cateId">
                                    <?php foreach ($category as $valueCate) {
                                     ?>
                                    <option
                                    value="<?php echo  $valueCate['category_id']; ?>"

                                    >
                                    <?php echo  $valueCate['category_name']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Feature</label>
                                <select class="form-control" name="featureId">
                                    <?php foreach ($features as $valueFeat) {
                                     ?>
                                    <option
                                    value="<?php echo  $valueFeat['feature_id']; ?>"

                                    >
                                    <?php echo  $valueFeat['feature_name']; ?>
                                    </option>
                                    <?php } ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Brand</label>
                                <select class="form-control" name="brandId">
                                    <?php foreach ($brands as $valueBrand) {
                                     ?>
                                    <option
                                    value="<?php echo  $valueBrand['brand_id']; ?>"
                                    >
                                    <?php echo  $valueBrand['brand_name']; ?>
                                    </option>
                                    <?php } ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>Origin</label>
                                <select class="form-control" name="originId">
                                    <?php foreach ($origins as $valueOrigin) {
                                     ?>
                                    <option value="<?php echo  $valueOrigin['origin_id']; ?>"

                                    >
                                    <?php echo  $valueOrigin['name_of_origin']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                            <button type="submit" onclick="return validProduct();" class="btn btn-primary">Product Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    <!-- end container -->
<?php include '../views/admin/footer.php'; ?>

>>>>>>> Stashed changes
