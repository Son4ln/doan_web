<?php include $GLOBALS['ROOT'].'public/template/site/header.php' ?>

<section class="page-title text-center">
  <div class="container relative clearfix">
    <div class="title-holder">
      <div class="title-text">
        <h1 class="uppercase">Giỏ Hàng</h1>
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
                <th class="product-name" colspan="2">Tên sản phẩm</th>
                <th class="product-price">Đơn giá</th>
                <th class="product-quantity">Số lương</th>
                <th class="product-subtotal">Tổng cộng</th>
              </tr>
            </thead>
            <tbody class="cart-tbody">
              
            </tbody>
          </table>
        </div>
      </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="row">
      <div class="col-md-8">
        <div class="cart_totals">
          <h2 class="heading relative heading-small uppercase mb-30">Tổng Giỏ Hàng</h2>

          <table class="table shop_table">
            <tbody>
              <tr class="cart-subtotal">
                <th>Tổng Giỏ Hàng</th>
              </tr>
              <tr class="shipping">
                <th>Phí Vận Chuyển</th>
                <td>
                  <span>Thu khi giao hàng</span>
                </td>
              </tr>
              <tr class="order-total">
                <th><strong>Tổng Thanh Toán</strong></th>
                <td>
                  <strong><span class="amount total-order"></span></strong>
                </td>
              </tr>
            </tbody>
          </table>

          <a href="?action=checkout" id="cart-checkout" class="btn btn-md btn-color mt-20 mb-mdm-40"><span>Thanh Toán</span></a>
        </div>
      </div> <!-- end col cart totals -->

    </div> <!-- end row -->     

    
  </div> <!-- end container -->
</section> <!-- end cart -->

<?php include $ROOT.'public/template/site/footer.php' ?>

<script type="text/javascript">
  let stateCartPage = {
    listCart: []
  };

  $(document).ready(() => {
    saveStateCart();
    showAllCart();
    removeItem();
  });

  function saveStateCart() {
    if(localStorage.cart) {
      stateCartPage.listCart = JSON.parse(localStorage.cart);
    }
  }

  function showAllCart() {
    let count = 0;
    let html = '';
    let totals = 0;
    let cartBody = document.querySelector('.cart-tbody');
    let totalOrder = document.querySelector('.total-order');
    let cartCheckout = document.getElementById('cart-checkout');
    if (stateCartPage.listCart.length > 0) {
      cartCheckout.classList.remove('disabled');
      for (let item of stateCartPage.listCart) {
        let itemPriceTotal = item.price * item.quantity;
        let content = `
          <tr class="cart_item">
            <td class="product-thumbnail">
              <a href="#">
                <img src="../../upload/products/${item.img}" alt="">
              </a>
            </td>
            <td class="product-name">
              ${item.name}
            </td>
            <td class="product-price">
              <span class="amount">${item.price} VNĐ</span>
            </td>
            <td class="product-quantity">
              <div class="quantity buttons_added">
                <input type="number" data-index="${count}" step="1" min="1" value="${item.quantity}" title="Qty" class="input-text qty text" />
              </div>
            </td>
            <td class="product-subtotal">
              <span class="amount price-total">${itemPriceTotal} VNĐ</span>
            </td>
            <td class="product-remove">
              <a class="remove" data-index="${count}" title="Remove this item">
                <i class="icon icon_close"></i>
              </a>
            </td>
          </tr>
        `;

        html += content;
        totals += itemPriceTotal;
        count ++;
      }
    } else {
      html = `
        <tr>
          <td colspan="5"><center><h2>Giỏ hàng trống</h2></center></td>
        </tr>
      `;

      cartCheckout.classList.add('disabled');
    }
    

    cartBody.innerHTML = html;
    totalOrder.textContent = `${totals} VNĐ`;
    removeItem();
    updateTotalPage();
  }

  function removeItem() {
    let delItem = document.querySelectorAll('.remove');
    for (let item of delItem) {
      item.addEventListener('click', (e) => {
        let index = e.target;
        if (e.target.getAttribute('class') != 'remove') {
          index = e.target.parentElement;
        }

        let position = index.getAttribute('data-index');
        stateCartPage.listCart.splice(position, 1);
        localStorage.setItem('cart', JSON.stringify(stateCartPage.listCart));
        showAllCart();
        showCart(stateCartPage.listCart);
      });
    }
  }

  function updateTotalPage() {
    let quantity = document.querySelectorAll('.qty');
    for (let qty of quantity) {
      qty.addEventListener('keyup', (e) => {
        let subTotals = e.target.parentElement.parentElement.parentElement.children[4].children[0];
        let position = e.target.getAttribute('data-index');
        let totalOrder = document.querySelector('.total-order');
        let totalCart = 0;
        let total = 0;

        stateCartPage.listCart[position].quantity = e.target.value.trim();
        localStorage.setItem('cart', JSON.stringify(stateCartPage.listCart));
        total = stateCartPage.listCart[position].price * stateCartPage.listCart[position].quantity;
        subTotals.textContent = `${total} VNĐ`;
        for (let item of stateCartPage.listCart) {
          totalCart += item.quantity * item.price;
        }

        totalOrder.textContent = `${totalCart} VNĐ`;
        showCart(stateCartPage.listCart);
      });
    }
  }
</script>
