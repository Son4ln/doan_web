<?php include $ROOT.'public/template/site/header.php' ?>

<section class="page-title text-center">
  <div class="container relative clearfix">
    <div class="title-holder">
      <div class="title-text">
        <h1 class="uppercase">Shopping Cart</h1>
      </div>
    </div>
  </div>
</section> <!-- end page title -->

<!-- Cart -->
<section class="section-wrap shopping-cart pt-0">
  <div class="container relative">
    <div class="row">

      <div class="col-md-12">
        <div class="table-wrap mb-30">
          <table class="shop_table cart table">
            <thead>
              <tr>
                <th class="product-name" colspan="2">Product</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-subtotal">Total</th>
              </tr>
            </thead>
            <tbody>
              <tr class="cart_item">
                <td class="product-thumbnail">
                  <a href="#">
                    <img src="img/shop/shop_item_3.jpg" alt="">
                  </a>
                </td>
                <td class="product-name">
                  <a href="#">Fashion Shorts</a>
                  <ul>
                    <li>Size: XL</li>
                    <li>Color: White</li>
                  </ul>
                </td>
                <td class="product-price">
                  <span class="amount">$1250.00</span>
                </td>
                <td class="product-quantity">
                  <div class="quantity buttons_added">
                    <input type="button" value="-" class="minus" /><input type="number" step="1" min="0" value="1" title="Qty" class="input-text qty text" /><input type="button" value="+" class="plus">
                  </div>
                </td>
                <td class="product-subtotal">
                  <span class="amount">$1250.00</span>
                </td>
                <td class="product-remove">
                  <a href="#" class="remove" title="Remove this item">
                    <i class="icon icon_close"></i>
                  </a>
                </td>
              </tr>

              <tr class="cart_item">
                <td class="product-thumbnail">
                  <a href="#">
                    <img src="img/shop/shop_item_7.jpg" alt="">
                  </a>
                </td>
                <td class="product-name">
                  <a href="#">Business Suit</a>
                  <ul>
                    <li>Size: L</li>
                    <li>Color: Black</li>
                  </ul>
                </td>
                <td class="product-price">
                  <span class="amount">$240.00</span>
                </td>
                <td class="product-quantity">
                  <div class="quantity buttons_added">
                    <input type="button" value="-" class="minus" /><input type="number" step="1" min="0" value="1" title="Qty" class="input-text qty text" /><input type="button" value="+" class="plus" />
                  </div>
                </td>
                <td class="product-subtotal">
                  <span class="amount">$240.00</span>
                </td>
                <td class="product-remove">
                  <a href="#" class="remove" title="Remove this item">
                    <i class="icon icon_close"></i>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="row">
      <div class="col-md-8">
        <div class="cart_totals">
          <h2 class="heading relative heading-small uppercase mb-30">Cart Totals</h2>

          <table class="table shop_table">
            <tbody>
              <tr class="cart-subtotal">
                <th>Cart Subtotal</th>
                <td>
                  <span class="amount">$1490.00</span>
                </td>
              </tr>
              <tr class="shipping">
                <th>Shipping</th>
                <td>
                  <span>Free Shipping</span>
                </td>
              </tr>
              <tr class="order-total">
                <th><strong>Order Total</strong></th>
                <td>
                  <strong><span class="amount">$1490.00</span></strong>
                </td>
              </tr>
            </tbody>
          </table>
          <button type="submit" name="calc_shipping" value="1" class="btn btn-md btn-dark mt-20 mb-mdm-40">Update Totals</button>

        </div>
      </div> <!-- end col cart totals -->

    </div> <!-- end row -->     

    
  </div> <!-- end container -->
</section> <!-- end cart -->  

<?php include $ROOT.'public/template/site/footer.php' ?> 