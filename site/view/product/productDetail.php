<?php include $ROOT.'public/template/site/header.php' ?> 

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
      Chi Tiết Sản Phẩm
    </li>
  </ol> <!-- end breadcrumbs -->
</div>


<!-- Single Product -->
<section class="section-wrap single-product">
  <div class="container relative">
    <div class="row">

      <div class="col-sm-6 col-xs-12 mb-60">

        <div class="flickity flickity-slider-wrap mfp-hover" id="gallery-main">

          <div class="gallery-cell">
            <a href="img/shop/single_img_1.jpg" class="lightbox-img">
              <img src="img/shop/single_img_1.jpg" alt="" />
              <i class="icon arrow_expand"></i>
            </a>
          </div>
          <div class="gallery-cell">
            <a href="img/shop/single_img_2.jpg" class="lightbox-img">
              <img src="img/shop/single_img_2.jpg" alt="" />
              <i class="icon arrow_expand"></i>
            </a>
          </div>
          <div class="gallery-cell">
            <a href="img/shop/single_img_3.jpg" class="lightbox-img">
              <img src="img/shop/single_img_3.jpg" alt="" />
              <i class="icon arrow_expand"></i>
            </a>
          </div>
          <div class="gallery-cell">
            <a href="img/shop/single_img_4.jpg" class="lightbox-img">
              <img src="img/shop/single_img_4.jpg" alt="" />
              <i class="icon arrow_expand"></i>
            </a>
          </div>
          <div class="gallery-cell">
            <a href="img/shop/single_img_5.jpg" class="lightbox-img">
              <img src="img/shop/single_img_5.jpg" alt="" />
              <i class="icon arrow_expand"></i>
            </a>
          </div>
        </div> <!-- end gallery main -->

        <div class="gallery-thumbs">

          <div class="gallery-cell">
            <img src="img/shop/single_img_1.jpg" alt="" />
          </div>
          <div class="gallery-cell">
            <img src="img/shop/single_img_2.jpg" alt="" />
          </div>
          <div class="gallery-cell">
            <img src="img/shop/single_img_3.jpg" alt="" />
          </div>
          <div class="gallery-cell">
            <img src="img/shop/single_img_4.jpg" alt="" />
          </div>
          <div class="gallery-cell">
            <img src="img/shop/single_img_5.jpg" alt="" />
          </div>

        </div> <!-- end gallery thumbs -->

      </div> <!-- end col img slider -->

      <div class="col-sm-6 col-xs-12 product-description-wrap">
        <h1 class="product-title">Summer Dress</h1>
        <span class="price">
          <ins>
            <span class="ammount">$1250.00</span>
          </ins>
        </span>
        <p class="product-description">A-ha Shop is a very slick and clean e-commerce template with endless possibilities. Creating an awesome clothes store with this Theme is easy than you can imagine</p>

        <ul class="product-actions clearfix">
          
          <li>
            <a href="#" class="btn btn-color btn-lg add-to-cart left"><span>Add to Cart</span></a>
          </li>                
          <li>
            <div class="quantity buttons_added">
              <input type="button" value="-" class="minus" /><input type="number" step="1" min="0" value="1" title="Qty" class="input-text qty text" /><input type="button" value="+" class="plus" />
            </div>
          </li>          
        </ul>

        <div class="product_meta">
          <span class="sku">SKU: <a href="#">111763</a></span>
          <span class="posted_in">Category: <a href="#">Accessories</a></span>
          <span class="tagged_as">Tags: <a href="#">Elegant</a>, <a href="#">Bag</a></span>
        </div>
      </div> <!-- end col product description -->
    </div> <!-- end row -->

    <!-- tabs -->
    <div class="row">
      <div class="col-md-12">
        <div class="tabs tabs-bb">
          <ul class="nav nav-tabs">                                 
            <li class="active">
              <a href="#tab-description" data-toggle="tab">Description</a>
            </li>
          </ul> <!-- end tabs -->
          
          <!-- tab content -->
          <div class="tab-content">
            
            <div class="tab-pane fade in active" id="tab-description">
              <p>
              We possess within us two minds. So far I have written only of the conscious mind. I would now like to introduce you to your second mind, the hidden and mysterious subconscious. Our subconscious mind contains such power and complexity that it literally staggers the imagination.And finally the subconscious is the mechanism through which thought impulses which are repeated regularly with feeling and emotion are quickened, charged. Our subconscious mind contains such power and complexity that it literally staggers the imagination.And finally the subconscious is the mechanism through which thought impulses.
              </p>
            </div>
          </div> <!-- end tab content -->

        </div>
      </div> <!-- end tabs -->
    </div> <!-- end row -->

    
  </div> <!-- end container -->
</section> <!-- end single product -->

<?php include $ROOT.'public/template/site/footer.php' ?> 