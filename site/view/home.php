<?php include $GLOBALS['ROOT'].'public/template/site/header.php' ?>

<!-- Hero Slider -->
    <section class="section-wrap nopadding">
      <div class="container">
        <div class="entry-slider">
          <div class="flexslider" id="flexslider-hero">
            <ul class="slides clearfix">
            <?php
              $sliders = new SlidersModel();
              $showSlider = $sliders -> getAllSlider();
              if (empty($showSlider)) {
              } else {
                foreach ($showSlider as $slide) {
            ?>
              <li>
                <img src="../../upload/sliders/<?php echo $slide['slide_image']; ?>" alt="aa" style="width: 100%; height: 536px;">
                <div class="hero-holder text-center right-align">
                  <div class="hero-lines">
                    <h1 class="hero-heading white"><?php echo $slide['slide_title']; ?></h1>
                    <h4 class="hero-subheading white"><?php echo $slide['slide_description']; ?></h4>
                  </div>
                  <a href="<?php echo $slide['link']; ?>" class="btn btn-lg btn-white"><span>Xem chi tiết</span></a>
                </div>
              </li>
            <?php
                }
              }
            ?>
            </ul>
          </div>
        </div> <!-- end slider -->
      </div>
    </section> <!-- end hero slider -->

    <!-- New Arrivals -->
    <section class="section-wrap new-arrivals pb-40">
      <div class="container">

        <div class="row heading-row">
          <div class="col-md-12 text-center">
            <h2 class="heading uppercase"><small>New Arrivals</small></h2>
          </div>
        </div>

        <div class="row row-10">
        <?php
          $products = new ProductsModel();
          $showNew = $products -> getAllNewProducts(0, 4);
          if (empty($showNew)) {
            echo '<p>Chưa có sản phẩm.</p>';
          } else {
            foreach ($showNew as $value) {
        ?>     
          <div class="col-md-3 col-xs-6">
            <div class="product-item">
              <div class="product-img">
                <a href="?action=productDetail&id=<?php echo $value['product_id']; ?>">
                  <img src="../../upload/products/<?php echo $value['featured_img']; ?>" alt="">
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
      </div>
    </section> <!-- end new arrivals -->

    <!-- Best Sellers -->
    <section class="section-wrap pb-0">
      <div class="container">

        <div class="row heading-row">
          <div class="col-md-12 text-center">
            <h2 class="heading uppercase"><small>Best Sellers</small></h2>
          </div>
        </div>

        <div class="row row-10">              
        <?php
          $products = new ProductsModel();
          $showSale = $products -> getAllSaleProducts(0, 4);
          if (empty($showSale)) {
            echo '<p>Chưa có sản phẩm khuyến mãi.</p>';
          } else {
            foreach ($showSale as $sale) {
        ?>  
          <div class="col-md-3 col-xs-6 animated-from-left">
            <div class="product-item">
              <div class="product-img">
                <a href="?action=productDetail&id=<?php echo $sale['product_id']; ?>">
                  <img src="../../upload/products/<?php echo $sale['featured_img']; ?>" alt="">
                </a>

                <div class="product-label">
                  <span class="sale">sale</span>
                </div>

                <div class="product-actions">
                  <a id="cart" class="product-add-to-compare add-cart" data-toggle="tooltip" data-placement="bottom" 
                      title="Thêm vào giỏ hảng" data-id="<?php echo $sale['product_id']; ?>" data-name="<?php echo $sale['product_name']; ?>" data-img="<?php echo $sale['featured_img']; ?>"
                      data-price="<?php 
                        if ($sale['discount']) {
                          echo $sale['discount'];
                        } else {
                          echo $sale['price'];
                        }
                      ?>">
                  <i class="fa fa-shopping-cart"></i></a>
                  <p><?php echo $sale['product_description']; ?></p>                  
                </div>
                <a href="?action=productDetail&id=<?php echo $sale['product_id']; ?>"
                class="product-quickview">Xem chi tiết</a>
              </div>

              <div class="product-details">
                <h3>
                  <a class="product-title"
                  href="?action=productDetail&id=<?php echo $sale['product_id']; ?>">
                  <?php echo $sale['product_name']; ?></a>
                </h3>
                <span class="price">
                  <del>
                    <span><?php echo $sale['price']; ?> Vnđ</span>
                  </del>
                  <ins>
                    <span class="ammount"><?php echo $sale['discount']; ?> Vnđ</span>
                  </ins>
                </span>
              </div>                          
            </div>
          </div>        
        <?php
            }
          }
        ?>
        </div> <!-- end row -->
      </div>
    </section> <!-- end best sellers -->           

<?php include $GLOBALS['ROOT'].'public/template/site/footer.php' ?> 