<?php include $GLOBALS['ROOT'].'public/template/site/header.php' ?>

<!-- Hero Slider -->
    <section class="section-wrap nopadding">
      <div class="container">
        <div class="entry-slider">
          <div class="flexslider" id="flexslider-hero">
            <ul class="slides clearfix">
              <li>
                <img src="../../public/img/slider/1.jpg" alt="">
                <div class="img-holder img-1"></div>
                <div class="hero-holder text-center right-align">
                  <div class="hero-lines">
                    <h1 class="hero-heading white">Collection 2017</h1>
                    <h4 class="hero-subheading white uppercase">HOT AND FRESH TRENDS OF THIS YEAR</h4>
                  </div>
                  <a href="#" class="btn btn-lg btn-white"><span>Shop Now</span></a>
                </div>
              </li>
              <li>
                <img src="../../public/img/slider/2.jpg" alt="">
                <div class="img-holder img-2"></div>
                <div class="hero-holder text-center">
                  <div class="hero-lines">
                    <h1 class="hero-heading white large">Winter Sales</h1>
                  </div>
                  <a href="#" class="btn btn-lg btn-white"><span>Shop Now</span></a>
                </div>
              </li>
              <li>
                <img src="../../public/img/slider/3.jpg" alt="">
                <div class="img-holder img-3"></div>
                <div class="hero-holder left-align">
                  <div class="hero-lines">
                    <h1 class="hero-heading white">Autumn 2017</h1>
                    <p class="white">A-ha Theme is the Best E-Commerce solution</p>
                    <p class="white">Packed with tons of features and unique styles</p>
                  </div>
                  <a href="#" class="btn btn-lg btn-white"><span>Shop Now</span></a>
                </div>
              </li>
              <li>
                <img src="../../public/img/slider/4.jpg" alt="">
                <div class="img-holder img-4"></div>
                <div class="hero-holder text-center right-align">
                  <div class="hero-lines">
                    <h1 class="hero-heading white">Summer 2017</h1>
                    <p class="white">A-ha Theme is the Best E-Commerce solution</p>
                    <p class="white">Packed with tons of features and unique styles</p>
                  </div>
                  <a href="#" class="btn btn-lg btn-white"><span>Shop Now</span></a>
                </div>
              </li>
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