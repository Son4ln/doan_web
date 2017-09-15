<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header" data-background-color="purple">
              <h4 class="title">Danh sách hóa đơn</h4>
              <p class="category">Hiển thị và thao tác với đơn hàng</p>
            </div>

            <div class="card-content table-responsive">
              <?php
                BasicLibs::getAlert();
              ?>

              <table id="orders-list" class="table table-striped table-bordered table-hover">
                <thead class="text-primary">
                  <tr>
                    <th class="hidden-xs"><b>Order ID</b></th>
                    <th><b>Họ và Tên</b></th>
                    <th class="hidden-sm hidden-xs"><b>Ngày đặt</b></th>
                    <th class="hidden-sm hidden-xs"><b>Ngày nhận</b></th>
                    <th><b>Tổng tiền</b></th>
                    <th class="hidden-xs"><b>Tình trạng</b></th>
                    <th><b>Thao tác</b></th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                    $order = new OrdersModel();
                    $data = $order -> getAllOrders();
                    if (empty($data)) {
                    } else {
                      foreach ($data as $value) {
                        $client = new ClientsModel();
                        $customer = $client -> getByIdClient($value['client_id']);
                  ?>
                  <tr class="odd gradeX" align="center">
                    <td class="hidden-xs"><?php echo $value['order_id']; ?></td>
                    <td><?php echo $customer['client_name']; ?></td>
                    <td class="hidden-sm hidden-xs">
                      <?php echo date_format(date_create_from_format('Y-m-d', $value['order_date']), 'd/m/Y'); ?></td>
                    <td class="hidden-sm hidden-xs">
                      <?php echo date_format(date_create_from_format('Y-m-d', $value['received_date']), 'd/m/Y'); ?></td>
                    <td><?php echo $value['total']; ?></td>
                    <td class="hidden-xs">
                        <?php if ($value['order_status'] == 1) {?>
                          <a onclick="return delConfirm ('Bạn có chắc muốn chỉnh sửa trạng thái');"
                          href="?action=updateStatus&id=<?php echo $value['order_id']; ?>&status=0"><b>Đã nhận hàng</b></a>
                        <?php } else { ?>
                          <a onclick="return delConfirm ('Bạn có chắc muốn chỉnh sửa trạng thái');"
                          href="?action=updateStatus&id=<?php echo $value['order_id']; ?>&status=1">
                          <b style="color: red">Chưa nhận hàng</b></a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                      <a href="?action=orderDetail&id=<?php echo $value['order_id']; ?>">
                      <i class="fa fa-eye"></i> Xem</a> | 
                      <a onclick="return confirm('Bạn có chắc muốn xóa hóa đơn này')" 
                      href="?action=deleteOrder&id=<?php echo $value['order_id']; ?>"> 
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

  <script type="text/javascript">
    $(document).ready(function() {
      $('#orders-list').DataTable();
    });
  </script>

<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>