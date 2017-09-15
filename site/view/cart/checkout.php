<?php include $ROOT.'public/template/site/header.php' ?> 

<section class="page-title text-center">
  <div class="container relative clearfix">
    <div class="title-holder">
      <div class="title-text">
        <h1 class="uppercase">Checkout</h1>
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
              <h2 class="heading uppercase mb-30">billing address</h2>

              <p class="form-row form-row-first validate-required ecommerce-invalid ecommerce-invalid-required-field" id="billing_first_name_field">
                <label for="billing_first_name">Name
                  <abbr class="required" title="required">*</abbr>
                </label>
                <input type="text" class="input-text" placeholder value name="billing_first_name" id="billing_first_name">
              </p>

              <p class="form-row form-row-wide address-field validate-required ecommerce-invalid ecommerce-invalid-required-field" id="billing_address_1_field">
                <label for="billing_address_1">Address
                  <abbr class="required" title="required">*</abbr>
                </label>
                <input type="text" class="input-text" placeholder="Street address" value name="billing_address_1" id="billing_address_1">
              </p>

              <p class="form-row form-row-first validate-required validate-email" id="billing_email_field">
                <label for="billing_email">Email Address
                  <abbr class="required" title="required">*</abbr>
                </label>
                <input type="text" class="input-text" placeholder value name="billing_email" id="billing_email">
              </p>

              <p class="form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                <label for="billing_phone">Phone
                  <abbr class="required" title="required">*</abbr>
                </label>
                <input type="text" class="input-text" placeholder value name="billing_phone" id="billing_phone">
              </p>

              <div class="clear"></div>

            </div>
            <div class="clear"></div>

            <div>
              <p class="form-row notes ecommerce-validated" id="order_comments_field">
                <label for="order_comments">Order Notes</label>
                <textarea name="order_comments" class="input-text" id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
              </p>
            </div>

            <div class="clear"></div>

          </div> <!-- end col -->


          <div class="col-md-4">
            <div class="order-review-wrap ecommerce-checkout-review-order" id="order_review">
              <h2 class="heading uppercase mb-30">Your Order</h2>
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
                    <th>Cart Subtotal</th>
                    <td>
                      <span class="amount">$1799.00</span>
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

<?php include $ROOT.'public/template/site/footer.php' ?> 