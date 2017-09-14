<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>

  <?php
    $order = new OrdersModel();
    $value = $order -> getByIdOrder($id);
    if (empty($value)) {
    } else {
      $client = new ClientsModel();
      $customer = $client -> getByIdClient($value['client_id']);
  ?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header" data-background-color="purple">
              <h4 class="title">Chi tiết đơn hàng</h4>
              <p class="category">Xem chi tiết đơn hàng</p>
            </div>

            <div class="card-content table-responsive">
              <?php
                BasicLibs::getAlert();
              ?>

              <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                <table class="table">
                  <tr>
                    <td class="text-primary"><b>Mã hóa đơn:</b></td>
                    <td><?php echo $value['order_id']; ?></td>
                  </tr>

                  <tr>
                    <td class="text-primary"><b>Ngày đặt hàng:</b></td>
                    <td><?php echo date_format(date_create_from_format('Y-m-d', $value['order_date']), 'd/m/Y'); ?></td>
                  </tr>

                  <tr>
                    <td class="text-primary"><b>Ngày nhận hàng:</b></td>
                    <td><?php echo date_format(date_create_from_format('Y-m-d', $value['received_date']), 'd/m/Y'); ?></td>
                  </tr>

                  <tr>
                    <td class="text-primary"><b>Tên Khách Hàng:</b></td>
                    <td><?php echo $customer['client_name']; ?></td>
                  </tr>

                  <tr>
                    <td class="text-primary"><b>Email Khách Hàng:</b></td>
                    <td><?php echo $customer['client_email']; ?></td>
                  </tr>

                  <tr>
                    <td class="text-primary"><b>Số điện thoại:</b></td>
                    <td><?php echo $customer['client_phone']; ?></td>
                  </tr>

                  <tr>
                    <td class="text-primary"><b>Tình trạng:</b></td>
                    <td>
                      <?php if ($value['order_status'] == 1) {?>
                        <a onclick="return delConfirm ('Bạn có chắc muốn chỉnh sửa trạng thái');"
                        href="?action=updateStatusDetail&id=<?php echo $value['order_id']; ?>&status=0"><b>Đã nhận hàng</b></a>
                      <?php } else { ?>
                        <a onclick="return delConfirm ('Bạn có chắc muốn chỉnh sửa trạng thái');"
                        href="?action=updateStatusDetail&id=<?php echo $value['order_id']; ?>&status=1">
                        <b style="color: red">Chưa nhận hàng</b></a>
                      <?php } ?>
                    </td>
                  </tr>
                </table>
              </div>

              <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                <h3 class="category">Sản phẩm đặt hàng</h3>
                <table class="table table-striped table-bordered table-hover">
                  <tr class="text-primary">
                    <th class="hidden-lg hidden-md hidden-sm">Mã SP</th>
                    <th class="hidden-xs">Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Gái giảm</th>
                    <th>Thành tiền</th>
                  </tr>

                  <?php
                    $data = $order -> getAllByIdOrders($id);
                    if (empty($data)) {
                    } else {
                      foreach ($data as $detail) {
                        $product = new ProductsModel();
                        $pro = $product -> getByIdProduct($detail['product_id']);
                  ?>
                  <tr>
                    <td class="hidden-lg hidden-md hidden-sm"><?php echo $pro['product_id']; ?></td>
                    <td class="hidden-xs"><?php echo $pro['product_name']; ?></td>
                    <td><?php echo $detail['quantity']; ?></td>
                    <td><?php echo $pro['price']; ?></td>
                    <td><?php echo $pro['discount']; ?></td>
                    <td><?php echo $detail['detail_total']; ?></td>
                  </tr>
                  <?php
                      }
                    }
                  ?>

                  <tr>
                    <td colspan="4" class="text-primary"><b>Tổng tiền:</b></td>
                    <td><?php echo $value['total']; ?></td>
                  </tr>
                </table>

                <div class="row">
                  <div class="col-sm-6 col-sm-offset-4">
                    <a href="?action=listOrder" style="color: #fff">
                      <button type="button" class="btn btn-primary pull-left">
                        Danh sách hóa đơn
                      </button>
                    </a>

                    <a onclick="return confirm('Bạn có chắc muốn xóa hóa đơn này')" 
                    href="?action=deleteOrder&id=<?php echo $value['order_id']; ?>"> 
                      <button type="button" class="btn btn-primary pull-left">
                        Xóa
                      </button>
                    </a>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
    } 
  ?>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#products-list').DataTable();
    });
  </script>

<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>