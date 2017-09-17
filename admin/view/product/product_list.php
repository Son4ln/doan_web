<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>

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
                      <img src="../../upload/products/<?php echo $value['featured_img']; ?>" style="width: 100px;">
                    </td>
                    <td class="hidden-xs"><?php echo $value['price']; ?></td>
                    <td class="hidden-sm hidden-xs"><?php echo $value['discount']; ?></td>
                    <td class="hidden-xs">
                      <?php
                        $cate = new CateModel();
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
                      <i class="fa fa-edit"></i> Sửa</a> | 
                      <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này')" 
                      href="?action=deleteProduct&id=<?php echo $value['product_id']; ?>"> 
                      <i class="fa fa-trash"></i> Xóa</a>
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