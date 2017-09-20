<?php include $GLOBALS['ROOT'].'public/template/site/header.php' ?> 

<!-- Breadcrumbs -->
<div class="container">
  <ol class="breadcrumb">
    <li>
      <a href="?action=home">Trang Chủ</a>
    </li>
    <li>
      <a href="?action=productList">Sản Phẩm</a>
    </li>
    <li class="active">
      Tìm Kiếm
    </li>
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
              $searchValue = $products -> search($search);
              if (empty($searchValue)) { 
                echo 'Từ khóa tìm kiếm không có';
              } 
              else {
                foreach ($searchValue as $value) {
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
                      <a id="cart" class="product-add-to-compare add-cart" data-toggle="tooltip" data-placement="bottom" 
                      title="Thêm vào giỏ hảng" data-id="<?php echo $value['product_id']; ?>" data-name="<?php echo $value['product_name']; ?>" data-img="<?php echo $value['featured_img']; ?>"
                      data-price="<?php 
                        if ($value['discount']) {
                          echo $value['discount'];
                        } else {
                          echo $value['price'];
                        }
                      ?>">
                      <i class="fa fa-shopping-cart"></i></a>
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
            ?>
            
          </div> <!-- end row -->
        </div> <!-- end grid mode -->

        <div class="clear"></div>

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