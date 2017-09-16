<?php include $GLOBALS['ROOT'].'public/template/site/header.php' ?> 

<!-- Breadcrumbs -->
<div class="container">
  <ol class="breadcrumb">
    <li>
      <a href="?action=home">Trang Chủ</a>
    </li>
    <?php
      if (isset($cate)) {
    ?>
    <li>
      <a href="?action=productList">Sản Phẩm</a>\
    </li>
    <li class="active">
    <?php
      $cates = new CategoriesModel();
      $ct = $cates -> getByIdCategory($cate);
      echo $ct['category_name'];
    ?>
    </li>
    <?php
      } else {
    ?>
    <li class="active">
      Sản Phẩm
    </li>
    <?php
      }
    ?>
  </ol> <!-- end breadcrumbs -->
</div>


<!-- Catalogue -->
<section class="section-wrap pt-70 pb-40 catalogue">
  <div class="container relative">
    <div class="row">

      <div class="col-md-9 catalogue-col right mb-50">
        <div class="shop-catalogue grid-view left">

          <div class="row row-10 items-grid">
            <?php
              $products = new ProductsModel();
              if (isset($cate)) {
                $showList = $products -> getAllProductsCate($cate);
                if (empty($showList)) {
                  echo '<p>Chưa có sản phẩm.</p>';
                } else {
                  $countPro = $products->getCountProductCate($cate);
                  if($countPro[0]>=9){
                    $limit = 9;
                  }else{
                    $limit = $countPro[0];
                  }

                  $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
          
                  // tổng số trang
                  $total_page = ceil($countPro[0]/ $limit);
                  // Giới hạn current_page trong khoảng 1 đến total_page
                  if ($current_page > $total_page){
                    $current_page = $total_page;
                  }
                  else if ($current_page < 1){
                    $current_page = 1;
                  }
                  // Tìm Start
                  $start = ($current_page - 1) * $limit;
                  $showPro = $products -> getShowListCate($cate, $start, $limit);
                  foreach ($showPro as $value) {
            ?>
              <div class="col-md-4 col-xs-6">
                <div class="product-item">
                  <div class="product-img">
                    <a href="?action=productDetail&id=<?php echo $value['product_id']; ?>">
                      <img src="../../upload/products/<?php echo $value['featured_img']; ?>" alt="" style="width: 100%;">
                    </a>

                    <?php
                    if ($value['discount'] > 0) {
                    ?>
                    <div class="product-label">
                      <span class="sale">sale</span>
                    </div>
                    <?php
                      }
                    ?>
                    <div class="product-actions">
                      <a href="#" class="product-add-to-compare" data-toggle="tooltip" data-placement="bottom" title="Add to compare">
                      <i class="fa fa-exchange"></i></a>
                      <p><?php echo $value['product_description']; ?></p>                 
                    </div>

                    <a href="?action=productDetail&id=<?php echo $value['product_id']; ?>"
                    class="product-quickview">Xem chi tiết</a>
                  </div>

                <div class="product-details">
                  <h3>
                    <a class="product-title" href="?action=productDetail&id=<?php echo $value['product_id']; ?>">
                      <?php echo $value['product_name']; ?>
                    </a>
                  </h3>
                  <span class="price">
                  <?php
                    if ($value['discount'] > 0) {
                  ?>
                    <del>
                      <span><?php echo $value['price']; ?> Vnđ</span>
                    </del>

                    <ins>
                      <span class="ammount"><?php echo $value['discount']; ?> Vnđ</span>
                    </ins>
                  <?php
                    } else {
                  ?>
                    <ins>
                      <span class="ammount"><?php echo $value['price']; ?> Vnđ</span>
                    </ins>
                  <?php
                    }
                  ?>
                  </span>
                  </div>                          
                </div>
              </div>
              <?php
                }
              } 
            } else {
                $showList = $products -> getAllProducts();
                if (empty($showList)) {
                  echo '<p>Chưa có sản phẩm.</p>';
                } else {
                  $countPro = $products->getCountProduct();
                  if($countPro[0]>=9){
                    $limit = 9;
                  }else{
                    $limit = $countPro[0];
                  }

                  $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
          
                  // tổng số trang
                  $total_page = ceil($countPro[0]/ $limit);
                  // Giới hạn current_page trong khoảng 1 đến total_page
                  if ($current_page > $total_page){
                    $current_page = $total_page;
                  }
                  else if ($current_page < 1){
                    $current_page = 1;
                  }
                  // Tìm Start
                  $start = ($current_page - 1) * $limit;
                  $showPro = $products -> getShowListPro($start, $limit);
                  foreach ($showPro as $value) {
            ?>
            <div class="col-md-4 col-xs-6">
                <div class="product-item">
                  <div class="product-img">
                    <a href="?action=productDetail&id=<?php echo $value['product_id']; ?>">
                      <img src="../../upload/products/<?php echo $value['featured_img']; ?>" alt="" style="width: 100%;">
                    </a>

                    <?php
                    if ($value['discount'] > 0) {
                    ?>
                    <div class="product-label">
                      <span class="sale">sale</span>
                    </div>
                    <?php
                      }
                    ?>
                    <div class="product-actions">
                      <a href="#" class="product-add-to-compare" data-toggle="tooltip" data-placement="bottom" title="Add to compare">
                      <i class="fa fa-exchange"></i></a>
                      <p><?php echo $value['product_description']; ?></p>                 
                    </div>

                    <a href="?action=productDetail&id=<?php echo $value['product_id']; ?>"
                    class="product-quickview">Xem chi tiết</a>
                  </div>

                <div class="product-details">
                  <h3>
                    <a class="product-title" href="?action=productDetail&id=<?php echo $value['product_id']; ?>">
                      <?php echo $value['product_name']; ?>
                    </a>
                  </h3>
                  <span class="price">
                  <?php
                    if ($value['discount'] > 0) {
                  ?>
                    <del>
                      <span><?php echo $value['price']; ?> Vnđ</span>
                    </del>

                    <ins>
                      <span class="ammount"><?php echo $value['discount']; ?> Vnđ</span>
                    </ins>
                  <?php
                    } else {
                  ?>
                    <ins>
                      <span class="ammount"><?php echo $value['price']; ?> Vnđ</span>
                    </ins>
                  <?php
                    }
                  ?>
                  </span>
                  </div>                          
                </div>
              </div>
          <?php
              }
            }
          }
          ?>
          </div> <!-- end row -->
        </div> <!-- end grid mode -->

        <div class="clear"></div>

        <!-- Pagination -->
        <div class="pagination-wrap">
          <p class="result-count">Showing: <?php 
          $endV = $current_page * $limit;
          if ($endV <= $countPro[0]) {
            $end = $endV;
          } else {
            $end = $countPro[0];
          }
          echo ($start+1).' - '.$end?> of <?php echo $countPro[0];?> results</p>              
          <nav class="pagination right clear">
            <?php
              // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
              if ($current_page > 1 && $total_page > 1){
                echo '<a href="?action=productList&page='.($current_page-1).'"><i class="fa fa-angle-left"></i> </a>';
              }
               
              // Lặp khoảng giữa
              for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                  echo ' <span class="page-numbers current">'.$i.'</span>';
                }
                else{
                  echo '<a href="?action=productList&page='.$i.'"><span class="page-numbers current">'.$i.'</span> </a>';
                }
              }
               
              // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
              if ($current_page < $total_page && $total_page > 1){
                echo '<a href="?action=productList&page='.($current_page+1).'"> <i class="fa fa-angle-right"></i></a>';
              }
            ?>
          </nav>
        </div>

      </div> <!-- end col -->

      <!-- Sidebar -->
      <aside class="col-md-3 sidebar left-sidebar">

        <!-- Categories -->
        <div class="widget categories">
          <h3 class="widget-title uppercase">Loại Sản Phẩm</h3>
          <ul class="list-no-dividers">
          <?php
            $cates = new CategoriesModel();
            $showCate = $cates -> getAllCategory();
            if (empty($showCate)) {
              echo '<p>Chưa có loại sản phẩm.</p>';
            } else {
              foreach ($showCate as $category) {
          ?>
            <li>
              <a href="?action=productCate&cate=<?php echo $category['category_id']; ?>">
                <?php echo $category['category_name']; ?>
              </a>
            </li>
          <?php
              }
            }
          ?>
          </ul>
        </div>
      </aside> <!-- end sidebar -->

    </div> <!-- end row -->
  </div> <!-- end container -->
</section> <!-- end catalogue -->    

<?php include $GLOBALS['ROOT'].'public/template/site/footer.php' ?> 