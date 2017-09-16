<?php include $GLOBALS['ROOT'].'public/template/site/header.php' ?> 

<section class="page-title text-center">
  <div class="container relative clearfix">
    <div class="title-holder">
      <div class="title-text">
        <h1 class="uppercase">Thanh Toán</h1>
      </div>
    </div>
  </div>
</section> <!-- end page title -->

<!-- Checkout -->
<section class="section-wrap checkout pt-0 pb-50">
  <div class="container relative">
    <div class="row">

      <div class="ecommerce col-xs-12">
        <form name="checkout" class="checkout ecommerce-checkout row">

          <div class="col-md-8" id="customer_details">
            <div>
              <h2 class="heading uppercase mb-30">Thông Tin Khách Hàng</h2>

              <p class="form-row form-row-first validate-required ecommerce-invalid ecommerce-invalid-required-field" id="billing_first_name_field">
                <label for="billing_first_name">Họ và Tên Khách Hàng
                  <abbr class="required" title="required">*</abbr>
                </label>
                <input type="text" class="input-text" placeholder value name="billing_first_name" id="billing_first_name">
              </p>

              <p class="form-row form-row-wide address-field validate-required ecommerce-invalid ecommerce-invalid-required-field" id="billing_address_1_field">
                <label for="billing_address_1">Địa Chỉ
                  <abbr class="required" title="required">*</abbr>
                </label>
                <input type="text" class="input-text" placeholder="Street address" value name="billing_address_1" id="billing_address_1">
              </p>

              <p class="form-row form-row-first validate-required validate-email" id="billing_email_field">
                <label for="billing_email">Email
                  <abbr class="required" title="required">*</abbr>
                </label>
                <input type="text" class="input-text" placeholder value name="billing_email" id="billing_email">
              </p>

              <p class="form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                <label for="billing_phone">SĐT
                  <abbr class="required" title="required">*</abbr>
                </label>
                <input type="text" class="input-text" placeholder value name="billing_phone" id="billing_phone">
              </p>

              <div class="clear"></div>

            </div>
            <div class="clear"></div>

            <div>
              <p class="form-row notes ecommerce-validated" id="order_comments_field">
                <label for="order_comments">Ghi Chú</label>
                <textarea name="order_comments" class="input-text" id="order_comments" placeholder="Ghi chú về đơn hàng của bạn, ví dụ: ghi chú đặc biệt để giao hàng." rows="2" cols="5"></textarea>
              </p>
            </div>

            <div class="clear"></div>

          </div> <!-- end col -->


          <div class="col-md-4">
            <div class="order-review-wrap ecommerce-checkout-review-order" id="order_review">
              <h2 class="heading uppercase mb-30">Đơn Hàng Của Bạn</h2>
              <table class="table shop_table ecommerce-checkout-review-order-table">
                <tbody>
                  <tr>
                    <th>Business Suit<span class="count"> x 1</span></th>
                    <td>
                      <span class="amount">$599.00</span>
                    </td>
                  </tr>
                  <tr>
                    <th>California Dress<span class="count"> x 1</span></th>
                    <td>
                      <span class="amount">$1299.00</span>
                    </td>
                  </tr>
                  <tr class="cart-subtotal">
                    <th>Tổng Đơn Hàng</th>
                    <td>
                      <span class="amount">$1799.00</span>
                    </td>
                  </tr>
                  <tr class="shipping">
                    <th>Phí Vận Chuyển</th>
                    <td>
                      <span>Free Shipping</span>
                    </td>
                  </tr>
                  <tr class="order-total">
                    <th><strong>Tổng Thanh Toán</strong></th>
                    <td>
                      <strong><span class="amount">$1799.00</span></strong>
                    </td>
                  </tr>
                </tbody>
              </table>

              <div id="payment" class="ecommerce-checkout-payment">
                <div class="form-row place-order">
                  <input type="submit" name="ecommerce_checkout_place_order" class="btn btn-lg" id="place_order" value="Place order">
                </div>
              </div>
            </div>
          </div> <!-- end order review -->
        </form>

      </div> <!-- end ecommerce -->

    </div> <!-- end row -->
  </div> <!-- end container -->
</section> <!-- end checkout -->

<?php include $GLOBALS['ROOT'].'public/template/site/footer.php' ?> 