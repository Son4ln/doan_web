<?php include $GLOBALS['ROOT'].'public/template/site/header.php' ?> 

<!-- Breadcrumbs -->

<?php
  $products = new ProductsModel();
  $value = $products -> getByIdProduct($id);
  if (empty($value)) {
?>
<div class="container">
  <ol class="breadcrumb">
    <li>
      <a href="?action=home">Trang Chủ</a>
    </li>
    <li>
      <a href="?action=productList">Sản Phẩm</a>
    </li>
  </ol> <!-- end breadcrumbs -->
</div>

<section class="section-wrap single-product">
  <div class="container relative">
    <div class="row">
      <p>Sản phẩm không tồn tại.</p>
    </div>
  </div>
</section>
<?php
  } else {
?>
<div class="container">
  <ol class="breadcrumb">
    <li>
      <a href="?action=home">Trang Chủ</a>
    </li>
    <li>
      <a href="?action=productList">Sản Phẩm</a>
    </li>
    <li class="active">
      <?php echo $value['product_name']; ?>
    </li>
  </ol> <!-- end breadcrumbs -->
</div>


<!-- Single Product -->
<section class="section-wrap single-product">
  <div class="container relative">
    <div class="row">
      <div class="col-sm-6 col-xs-12 mb-60">

        <div class="flickity flickity-slider-wrap mfp-hover" id="gallery-main">
        <?php
          $image = new ImagesModel();
          $countImg = $image -> countImage($id);
          if ($countImg[0] == 0) {
        ?>
          <div class="gallery-cell">
            <a href="../../upload/products/<?php echo $value['featured_img']; ?>" class="lightbox-img">
              <img src="../../upload/products/<?php echo $value['featured_img']; ?>" alt="" />
            </a>
          </div>
        <?php
          } else {
            $showImage = $image -> getByIdImage($id);
            foreach ($showImage as $image) {
        ?>

          <div class="gallery-cell">
            <a href="../../upload/products/<?php echo $image['image']; ?>" class="lightbox-img">
              <img src="../../upload/products/<?php echo $image['image']; ?>" alt="" />
              <i class="icon arrow_expand"></i>
            </a>
          </div>
        <?php
            }
          }
        ?>
        </div> <!-- end gallery main -->

        <div class="gallery-thumbs">
          <?php
            $image = new ImagesModel();
            $countImg = $image -> countImage($id);
            if ($countImg[0] == 0) {
          ?>
            <div class="gallery-cell">
              <img src="../../upload/products/<?php echo $value['featured_img']; ?>" alt="" />
            </div>
          <?php
            } else {
              $showImage = $image -> getByIdImage($id);
              foreach ($showImage as $image) {
          ?>
          <div class="gallery-cell">
            <img src="../../upload/products/<?php echo $image['image']; ?>" alt="" />
          </div>
          <?php
              }
            }
          ?>

        </div> <!-- end gallery thumbs -->

      </div> <!-- end col img slider -->

      <div class="col-sm-6 col-xs-12 product-description-wrap">
        <h1 class="product-title"><?php echo $value['product_name']; ?></h1>
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
        <p class="product-description"><?php echo $value['product_description']; ?></p>

        <ul class="product-actions clearfix">
          
          <li>
            <a href="?action=addToCart&id=<?php echo $value['product_id']; ?>"
            class="btn btn-color btn-lg add-to-cart left"><span>Thêm vào giỏ hàng</span></a>
          </li>                
          <li>
            <div class="quantity buttons_added">
              <input type="button" value="-" class="minus" /><input type="number" step="1" min="0" value="1" title="Qty" class="input-text qty text" /><input type="button" value="+" class="plus" />
            </div>
          </li>          
        </ul>

        <div class="product_meta">
          <span class="posted_in">Loại sản phẩm:
            <?php
            $cates = new CategoriesModel();
            $showCate = $cates -> getByIdCategory($value['category_id']);?>
            <a href="?action=productCate&cate=<?php echo $showCate['category_id']; ?>">
              <?php echo $showCate['category_name']; ?>
            </a>
          </span>
        </div>
      </div> <!-- end col product description -->
    </div> <!-- end row -->

    <!-- tabs -->
    <div class="row">
      <div class="col-md-12">
        <div class="tabs tabs-bb">
          <ul class="nav nav-tabs">                                 
            <li class="active">
              <a href="#tab-description" data-toggle="tab">Chi Tiết</a>
            </li>
          </ul> <!-- end tabs -->
          
          <!-- tab content -->
          <div class="tab-content">
            
            <div class="tab-pane fade in active" id="tab-description">
              <p>
              <?php echo $value['product_detail']; ?>
              </p>
            </div>
          </div> <!-- end tab content -->

        </div>
      </div> <!-- end tabs -->
    </div> <!-- end row -->

    
  </div> <!-- end container -->
</section> <!-- end single product -->
<?php
 }
?>

<?php include $GLOBALS['ROOT'].'public/template/site/footer.php' ?> 