<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header" data-background-color="purple">
            <i class="fa fa-file-image-o"></i>
          </div>

          <div class="card-content">
            <p class="category">Sliders</p>
            <h3 class="title"><?php echo $countSlider[0]; ?> <small>Sliders</small></h3>
          </div>

          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-link"></i> <a href="?action=listSlider">Tới Sliders</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header" data-background-color="purple">
            <i class="fa fa-bars"></i>
          </div>

          <div class="card-content">
            <p class="category">Loại sản phẩm</p>
            <h3 class="title"><?php echo $countCate[0]; ?> <small>Loại</small></h3>
          </div>

          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-link"></i> <a href="?action=listCate">Tới Loại sản phẩm</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header" data-background-color="purple">
            <i class="fa fa-cubes"></i>
          </div>

          <div class="card-content">
            <p class="category">Sản phẩm</p>
            <h3 class="title"><?php echo $coutProducts[0]; ?> <small>Sản phẩm</small></h3>
          </div>

          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-link"></i> <a href="?action=listProduct">Tới Sản phẩm</a>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header" data-background-color="purple">
            <i class="fa fa-shopping-cart"></i>
          </div>

          <div class="card-content">
            <p class="category">Hóa đơn mới</p>
            <h3 class="title new-orders"></h3>
          </div>

          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-link"></i> <a href="?action=listOrder">Tới Hóa đơn</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header" data-background-color="purple">
            <i class="fa fa-shopping-cart"></i>
          </div>

          <div class="card-content">
            <p class="category">Hóa đơn</p>
            <h3 class="title orders"></h3>
          </div>

          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-link"></i> <a href="?action=listOrder">Tới Hóa đơn</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header" data-background-color="purple">
            <i class="fa fa-phone"></i>
          </div>

          <div class="card-content">
            <p class="category">Liên hệ mới</p>
            <h3 class="title contact-form"></h3>
          </div>

          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-link"></i> <a href="?action=contact">Tới Liên hệ</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>        
</div>

<script type="text/javascript">
  $(document).ready(function() {
    countOrder();
    countNewOrder();
    countForm();
  });
  // nhận giá trị lên tục từ db
  setInterval(() => {
    countOrder();
    countNewOrder();
    countForm();
  },3000);

  function countOrder() {
    let countOrder = document.querySelector('.orders');
    $.ajax({
      url : "../../api/urls.php?url=countOrder",
      type : "get",
      dataType:"text",
      data : {},
      success : function (result){
        countOrder.innerHTML = `${result} <small>Hóa đơn</small>`;
      },
      error: function() {
        countOrder.innerHTML = '???';
      }
    });
  }

  function countNewOrder() {
    let countNewOrder = document.querySelector('.new-orders');
    $.ajax({
      url: '../../api/urls.php?url=countNewOrder',
      type: 'get',
      dataType: 'text',
      data: {},
      success: function(result) {
        countNewOrder.innerHTML = `${result} <small>Hóa đơn mới</small>`;
      },
      error: function(result) {
        countNewOrder.innerHTML = '???';
      }
    });
  }

  function countForm() {
    let contactForm = document.querySelector('.contact-form');
    $.ajax({
      url: '../../api/urls.php?url=countContactForm',
      type: 'get',
      dataType: 'text',
      data: {},
      success: function(result) {
        contactForm.innerHTML = `${result} <small>Liên hệ mới</small>`;
      },
      error: function (result) {

      }
    });
  }
</script>

<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>