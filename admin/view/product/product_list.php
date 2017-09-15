<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>
<<<<<<< Updated upstream

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header" data-background-color="purple">
              <h4 class="title">Danh sách sản phẩm</h4>
              <p class="category">Hiển thị và thao tác với sản phẩm</p>
            </div>

            <div class="card-content table-responsive">
              <?php
                BasicLibs::getAlert();
              ?>

              <a href="?action=addProduct" style="color: #fff">
                <button type="button" class="btn btn-primary pull-left">
                  Thêm Sản Phẩm
                </button>
              </a>
              <div class="clearfix"></div>
              
              <table id="product-list" class="table table-striped table-bordered table-hover">
                <thead class="text-primary">
                  <tr>
                    <th><b>ID</b></th>
                    <th><b>Tên sản phẩm</b></th>
                    <th class="hidden-sm hidden-xs"><b>Hình ảnh</b></th>
                    <th class="hidden-xs"><b>Giá</b></th>
                    <th class="hidden-sm hidden-xs"><b>Giá giảm</b></th>
                    <th class="hidden-xs"><b>Loại</b></th>
                    <th class="hidden-xs"><b>Hiển thị</b></th>
                    <th><b>Thao tác</b></th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                    $products = new ProductsModel();
                    $data = $products -> getAllProducts();
                    if (empty($data)) {
                    } else {
                      foreach ($data as $value) {
                  ?>
                  <tr class="odd gradeX" align="center">
                    <td><?php echo $value['product_id']; ?></td>
                    <td><?php echo $value['product_name']; ?></td>
                    <td class="hidden-sm hidden-xs">
                      <img src="../../upload/products/<?php echo $value['featured_img']; ?>" height="50">
                    </td>
                    <td class="hidden-xs"><?php echo $value['price']; ?></td>
                    <td class="hidden-sm hidden-xs"><?php echo $value['discount']; ?></td>
                    <td class="hidden-xs">
                      <?php
                        $cate = new CategoriesModel();
                        $result = $cate -> getByIdCategory($value['category_id']);
                        echo $result['category_name'];
                      ?>
                    </td>
                    <td class="hidden-xs"><?php
                        if ($value['product_public'] == 1) {
                          echo 'Có';
                        } else {
                          echo 'Không';
                        } 
                      ?>
                    </td>
                    <td class="text-center">
                      <a href="?action=editProduct&id=<?php echo $value['product_id']; ?>">
                      <i class="fa fa-edit"> Sửa</i> </a> | 
                      <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này')" 
                      href="?action=deleteProduct&id=<?php echo $value['product_id']; ?>"> 
                      <i class="fa fa-trash"> Xóa</i></a>
                    </td>
                  </tr>
                  <?php }
                    } 
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#product-list').DataTable();
    });
  </script>

<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>
=======
<!-- Page Content -->
        <style type="text/css">
            #showMes {
                display: none
            }
        </style>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="margin-top-md">Product
                            <small>List</small>
                        </h1>
                    </div>
                    <div class="col-xs-12">
                        <div class="alert" id="showMes"></div>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã</th>
                                <th class="hidden-xs">Tên sản phẩm</th>
                                <th class="hidden-sm hidden-xs">Hình ảnh</th>
                                <th>Giá</th>
                                <th class="hidden-sm hidden-xs">Giá giảm</th>
                                <th class="hidden-xs">Loại</th>
                                <th class="hidden-xs">Hiển thị</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $products = new ProductsModel();
                                $data = $products -> getAllProducts();

                                if (empty($data)) {

                                } else {
                                    foreach ($data as $value) {

                            ?>
                            <tr class="odd gradeX" align="center">
                                <td rowspan="2"><?php echo $value['product_code']; ?></td>
                                <td rowspan="2" class="hidden-xs"><?php echo $value['product_name']; ?></td>
                                <td rowspan="2" class="hidden-sm hidden-xs">
                                    <img src="public/images/product/<?php echo $value['featured_img']; ?>" height="50">
                                </td>
                                <td rowspan="2"><?php echo $value['price']; ?></td>
                                <td rowspan="2" class="hidden-sm hidden-xs"><?php echo $value['discount']; ?></td>
                                <td rowspan="2" class="hidden-xs"><?php
                                        $cate = new Categories();
                                        $result = $cate -> getByIdCategory($value['category_id']);
                                        echo $result['category_name'];
                                    ?>
                                </td>
                                <td rowspan="2"><?php
                                        if ($value['product_public'] != 0) {
                                            echo 'Có';
                                        } else {
                                            echo 'Không';
                                        } 
                                    ?>
                                </td>
                                <td class="text-center">
                                    <i class="fa fa-trash-o  fa-fw"></i>
                                    <a onclick="return delConfirm('Bạn có chắc muốn xóa sản phẩm này')" 
                                    href="?action=productDel&id=<?php echo $value['product_id']; ?>"> 
                                    Delete</a>
                                </td>
                                <td class="text-center">
                                    <i class="fa fa-pencil fa-fw"></i>
                                    <a href="?action=productEdit&id=<?php echo $value['product_id']; ?>">Edit</a>
                                </td>
                            </tr>
                            <?php   }
                                } 
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- end container -->

        <!-- <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable();
            });
        </script> -->
<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>
>>>>>>> Stashed changes
