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

      <div id="checkout-cart" class="ecommerce col-xs-12">
        <form name="checkout" class="checkout ecommerce-checkout row">
          <div class="col-md-8" id="customer_details">
            <div>
              <h2 class="heading uppercase mb-30">Thông Tin Khách Hàng</h2>
              <div class="alert alert-danger hidden" id="checkout-error"></div>

              <p class="form-row form-row-first validate-required ecommerce-invalid ecommerce-invalid-required-field" id="billing_first_name_field">
                <label for="billing_first_name">Họ và Tên Khách Hàng
                  <abbr class="required" title="required">*</abbr>
                </label>
                <input type="text" class="input-text" placeholder value name="client-name" id="billing_first_name">
              </p>

              <p class="form-row form-row-wide address-field validate-required ecommerce-invalid ecommerce-invalid-required-field" id="billing_address_1_field">
                <label for="billing_address_1">Địa Chỉ
                  <abbr class="required" title="required">*</abbr>
                </label>
                <input type="text" class="input-text" placeholder="Street address" value name="client-address" id="billing_address_1">
              </p>

              <p class="form-row form-row-first validate-required validate-email" id="billing_email_field">
                <label for="billing_email">Email
                </label>
                <input type="text" class="input-text" placeholder value name="client-email" id="client-email">
              </p>

              <p class="form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                <label for="billing_phone">SĐT
                  <abbr class="required" title="required">*</abbr>
                </label>
                <input type="text" class="input-text" placeholder value name="client-phone" id="billing_phone">
              </p>

              <div class="clear"></div>

            </div>
            <div class="clear"></div>

            <div>
              <p class="form-row notes ecommerce-validated" id="order_comments_field">
                <label for="order_comments">Ghi chú</label>
                <textarea name="order-comments" class="input-text" id="order_comments" placeholder="Ghi chú cho hóa đơn của bạn, giao hàng đặc biệt hoặc..." rows="2" cols="5"></textarea>
              </p>
            </div>

            <div class="clear"></div>

          </div> <!-- end col -->


          <div class="col-md-4">
            <div class="order-review-wrap ecommerce-checkout-review-order" id="order_review">
              <h2 class="heading uppercase mb-30">Đơn Hàng Của Bạn</h2>
              <table class="table shop_table ecommerce-checkout-review-order-table">
                <tbody id="show-checkout">
                  
                </tbody>
              </table>

              <table>
                <tr class="shipping">
                    <th>Phí Vận Chuyển</th>
                    <td>
                      <span>Thanh toán khi giao hàng</span>
                    </td>
                  </tr>
                  <tr class="order-total">
                    <th><strong>Tổng Thanh Toán</strong></th>
                    <td>
                      <strong><span id="checkout-total" class="amount"></span></strong>
                    </td>
                  </tr>
              </table>

              <div id="payment" class="ecommerce-checkout-payment">
                <div class="form-row place-order">
                  <input type="submit" id="submit-checkout" name="ecommerce_checkout_place_order" class="btn btn-lg" id="place_order" value="Thanh toán">
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

<script type="text/javascript">
  let checkout = {
    listCart: [],
    orderTotal: 0
  };

  $(document).ready(() => {
    saveCheckoutCart();
    showCheckout();
    createOrder();
  });

  function saveCheckoutCart() {
    if(localStorage.cart) {
      checkout.listCart = JSON.parse(localStorage.cart);
    }
  }

  function showCheckout() {
    let html = '';
    let checkoutTotal = 0;
    let showCart = document.getElementById('show-checkout');
    let subTotals = 0;
    let submit = document.getElementById('submit-checkout');
    let orderTotal = document.getElementById('checkout-total');
    if (checkout.listCart.length > 0) {
      submit.classList.remove('hidden');
      for (let item of checkout.listCart) {
        subTotals = item.price * item.quantity;
        checkoutTotal += subTotals;

        let content =`
          <tr>
            <th><span id="product-name">${item.name}</span><span id="quantity" class="count"> x ${item.quantity}</span></th>
            <td>
              <span id="subtotal" class="amount" style="text-align: right;">${subTotals} VNĐ</span>
            </td>
          </tr>
        `;

        html += content;
      }
    } else {
      html = '<center>Giỏ hàng trống</center>';
      submit.classList.add('hidden');
    }

    showCart.innerHTML = html;
    checkout.orderTotal = checkoutTotal;
    orderTotal.textContent = `${checkoutTotal} VNĐ`;
  }

  function createOrder() {
    let submit = document.querySelector('[name="checkout"]');
    submit.addEventListener('submit', (e) => {
      e.preventDefault();
      let error = [];
      let alertMess = '';
      let showErr = document.getElementById('checkout-error');
      let checkoutCart = document.getElementById('checkout-cart');
      let name = document.querySelector('[name="client-name"]').value.trim();
      let address = document.querySelector('[name="client-address"]').value.trim();
      let email = document.querySelector('[name="client-email"]').value.trim();
      let phone = document.querySelector('[name="client-phone"]').value.trim();
      let total = checkout.orderTotal;
      let note = document.querySelector('[name="order-comments"]').value.trim();

      if (name === '') {
        let mess = 'Vui lòng nhập họ và tên';
        error.push(mess);
      }

      if (address === '') {
        let mess = 'Vui lòng nhập địa chỉ';
        error.push(mess);
      }

      if (phone === '') {
        let mess = 'Vui lòng nhập số điện thoại';
        error.push(mess);
      }

      if (error.length > 0) {
        showErr.classList.remove('hidden');
        for (let alert of error) {
          alertMess += `<p style="margin-bottom: 0 !important;">${alert}</p>`;
        }
        showErr.innerHTML = alertMess;
        return;
      }
      checkoutCart.innerHTML = `<center>
                                  <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                                  <span class="sr-only">Loading...</span>
                                </center>
                              `;
      $.ajax({
        url: '../../api/urls.php?url=clientOrder',
        type: 'POST',
        dataType: 'text',
        data: {
          name: name,
          address: address,
          email: email,
          phone: phone,
          total: total,
          note: note,
          product: checkout.listCart
        },
        success: function(data) {
          window.localStorage.removeItem("cart");
          checkout.listCart = [];
          showCart(checkout.listCart);
          checkoutCart.innerHTML = `<center>
                                      <h2>Đơn hàng đã được gửi đi thành công. Chúng tôi sẽ liên lạc với bạn trong vòng 24h</h2>
                                       <a href="?action=home" class="btn btn-md btn-color mt-10">
                                        <span>Quay lại trang chủ</span>
                                       </a>
                                    </center>`;
        },
        error: function() {
          checkoutCart.innerHTML = `<center>
                                      <h2>Thanh toán không thành công, vui lòng kiểm tra kết nối mạng và thử lại</h2>
                                    </center>`;
        }
      });
    });
  }
</script>